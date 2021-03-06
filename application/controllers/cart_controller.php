<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller {

	var $is_logged_in 	= 0;
	var $id 			= null;
	var $name 			= null;
	var $email 			= null;
	var $username 		= null;
	var $active 		= null;
	var $data 			= array();

	public function __construct()
	{
		parent::__construct();
		// Load the Library
		$users_table = array(
				'system_type'				=>	2,
				'table' 					=> 'users',
				'table_meta' 				=> 'users_meta',
				'table_user_permissions'	=> 'users_permissions',
				'table_permission' 			=> 'permissions');
		$this->load->library('user' , $users_table);    	
		if ($this->user->validate_session())
		{
			$this->is_logged_in = 1;
			$this->id  			= $this->user->user_data->id;
			$this->name  		= $this->user->user_data->name;
			$this->email  		= $this->user->user_data->email;
			$this->username  	= $this->user->user_data->login;
			$this->active  		= $this->user->user_data->active;
		}
		// User Data 
		//========================================	
		$this->data['userdata']['is_logged_in']		= $this->is_logged_in ;	
		$this->data['userdata']['id'] 				= $this->id;
		$this->data['userdata']['name'] 			= $this->name;
		$this->data['userdata']['email'] 			= $this->email;
		$this->data['userdata']['username'] 		= $this->username;
		$this->data['userdata']['active'] 			= $this->active;
		$this->data['userdata']['first_name']		= ucfirst (explode(' ', $this->name)[0]);	
	}

	public function index()
	{
		//do nothing
	}

	public function add_to_cart(){
		$root ="Main_pages/Cart/";	
		$this->data['sections']['cart_list'] 	= $this->load->view($root.'cart_list','',true);
		$this->data['sections']['related_products'] 	= $this->load->view($root.'related_products','',true);
		$this->template->load('main_template',$root.'cart',$this->data);
	}

}

/* End of file cart_controller.php */
/* Location: ./application/controllers/cart_controller.php */
?>