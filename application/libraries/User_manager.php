<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* User Class
*
* @package		Orion
* @subpackage	Libraries
* @category		Users
* @author		Waldir Bertazzi Junior
* @link 		http://waldir.org/
* @link 		https://github.com/waldirbertazzijr/codeigniter-user
*/

class User_manager {
	
	public $session_vars				= array();
	public $system_type               	= 0;	
	public $table               		= '';
	public $table_meta               	= '';
	public $table_user_permissions		= '';
	public $table_permission         	= '';
	private $CI;

	function __construct($users_table){
		$this->CI =& get_instance();
        
		$this->system_type 				= $users_table['system_type'];	
		$this->table 					= $users_table['table'];
		$this->table_meta               = $users_table['table_meta'];
		$this->table_user_permissions	= $users_table['table_user_permissions'];
		$this->table_permission         = $users_table['table_permission'];
        if($this->system_type == 1 ){
			$this->session_vars['login'] 		= 'shop_login';
			$this->session_vars['logged'] 		= 'shop_logged';
			$this->session_vars['pw']			= 'shop_pw';
		} elseif ($this->system_type == 2){
			$this->session_vars['login'] 		= 'login';
			$this->session_vars['logged'] 		= 'logged';
			$this->session_vars['pw']			= 'pw';
		}
		// checks if the database library is loaded
		if(!isset($this->CI->db)){
			show_error("You need the database library to use the User Library. Please check your configuration.");
		}

		// load session and bcrypt library.
		$this->CI->load->library(array('session', 'bcrypt'));
	}

	/**
	* Creates a new user and return its ID
	*
	* @return int ID
	* @param String full user name
	* @param String full user password
	* @param Bool is user active?
	* @param Array array of int permissions
	* @author Waldir Bertazzi Junior
	**/
	function save_user($full_name, $login, $password, $email, $active = 1, $permissions=array(),$shop_code=null) {        
		
		// first we must check if is a valid insert
		if( ! $this->login_exists($login,$shop_code) && $full_name!= "") {
	
			// generate the hashed password
			$hashed_password = $this->CI->bcrypt->hash($password);
			// This login is fine, proceed
			if ($this->system_type = 1)
				$insert_arr =  array('name'=>$full_name, 'login'=>$login, 'email'=>$email, 'password'=>$hashed_password, 'active'=>$active,'shop_code'=>$shop_code);
			else if ($this->system_type = 2)
				$insert_arr =  array('name'=>$full_name, 'login'=>$login, 'email'=>$email, 'password'=>$hashed_password, 'active'=>$active);

			if ( $this->CI->db->insert($this->table, $insert_arr) ) {                
				// Saved successfully
				$new_user_id = $this->CI->db->insert_id();

				// Add the permissions
				$this->add_permission($new_user_id, $permissions);

				// Return the new user id
				return $new_user_id;
			}
		} else {
			// Login already exists or full name is empty
			return false;
		}
	}

	function shop_exists($shop_code)
	{
		$exists = $this->CI->db->get_where('shops', array('shop_code'=>$shop_code));
		$shop_exists = $exists->num_rows();
		if($shop_exists != 0)
			return -1;
		else return 1;
	}
    
	// Delete the user
	function delete_user($user_id){
		return $this->CI->db->delete($this->table, array('id'=>$user_id));
	}
	
	// Updates arbitrary user login information
	function update_login($new_login, $user_id) {
		// update the database
		return $this->CI->db->update($this->table, array('login'=>$new_login), array('id'=>$user_id));
	}
	
	// Updates arbitrary user password
	function update_pw($new_pw, $user_id) {
		$new_pw = $this->CI->bcrypt->hash($new_pw);
		
		// update the database
		$sts = $this->CI->db->update($this->table, array('password'=>$new_pw), array('id'=>$user_id));
		
		return $sts;
	}

	// Check if there is already a login with that name
	function login_exists($login_name,$shop_code){
		if ($shop_code != null)
			$exists = $this->CI->db->get_where($this->table, array('shop_code'=>$shop_code,'login'=>$login_name));
		else 
			$exists = $this->CI->db->get_where($this->table, array('login'=>$login_name));
		return ($exists->num_rows() != 0);
	}

	// Checks if user already has the permission on database
	function user_has_permission($user_id, $permission_id){
		$result = $this->CI->db->get_where($this->table_user_permissions, array('user_id' => $user_id, 'permission_id' =>$permission_id));
		return ( $result->num_rows() == 1 );
	}

	// Links a permission with a user
	function add_permission($user_id, $permissions) {
		// If array received we must call this recursively
		if(is_array($permissions)) {
			if(sizeof($permissions) == 0) {
				return FALSE;
			}
			// Foreach permission in the array call this function recursively
			foreach($permissions as $permission) {
				$this->add_permission($user_id, $permission);
			}
		} else {
			// Check if user already has this permission
			if( ! $this->user_has_permission($user_id, $permissions) ) {
				return $this->CI->db->insert($this->table_user_permissions, array('user_id'=>$user_id, 'permission_id'=>$permissions));
			} else {
				// User already has this permission
				return TRUE;
			}
		}
	}

	// Creates a new permission
	function save_permission($permission_name, $permission_description){
		$exists = $this->CI->db->get_where($this->table_permission, array('name'=>$permission_name));
		if( $exists->num_rows() >= 1 ) {
			return $exists->row()->id;
		} else { 
			$insert = $this->CI->db->insert($this->table_permission, array('name'=>$permission_name, 'description'=>$permission_description));
			if($insert) {
				return $this->CI->db->insert_id();
			} else {
				return FALSE;
			}
		}
	}

	// Gets all users with a selected permission
	function get_users_with_permission($permission_name){
		$permission = $this->CI->db->get_where($this->table_permission, array('name'=>$permission_name))->row();
		if(sizeof($permission) == 0) {
			return FALSE;
		} else {
			return $this->CI->db->get_where($this->table_user_permissions, array('permission_id'=>$permission->id))->result();
		}
	}

	// Add (and saves to database) a custom user information
	function set_custom_field($user_id, $name, $value){
		$field = $this->CI->db->get_where($this->table_meta, array('user_id'=>$user_id, 'name'=>$name));
		if($field->num_rows() == 0){
			return $this->db->insert($this->table_meta, array('user_id'=>$user_id, 'name'=>$name, 'value'=>$value));
		} else {
			return $this->db->update($this->table_meta, array('user_id'=>$user_id, 'name'=>$name, 'value'=>$value), array('user_id'=>$user_id));
		}
	}
	
	// Add (and saves to database) a custom user information
	function get_custom_field($user_id, $name, $value){
		$field = $this->CI->db->get_where($this->table_meta, array('user_id'=>$user_id, 'name'=>$name));
		if($field->num_rows() == 0){
			return FALSE;
		} else {
			return $field->row()->value;
		}
	}

}
