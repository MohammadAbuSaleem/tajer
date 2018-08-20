<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_signup_controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$users_table = array(
				'system_type'				=>	1,
				'table' 					=> 'shop_users',
				'table_meta' 				=> 'shop_users_meta',
				'table_user_permissions'	=> 'shop_users_permissions',
				'table_permission' 			=> 'shop_permissions');
		// Load the Library
		$this->load->library('user' , $users_table);       
		$this->load->library('user_manager' ,$users_table);
	}

	public function index()
	{		
		
	}

	function user_signup(){
		// If user is already logged in, send it to private page
		$this->user->on_valid_session('');		
		// Loads the login view		
		$this->template->load('user_auth_template','Users_auth/shop_signup');
	}

	function validate_signup()
	{
		extract($this->input->post());			
		$this->form_validation->set_rules('shop_name', 'Shop Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('shop_code', 'Shop Code', 'required|alpha_numeric');
		$this->form_validation->set_rules('username', 'Admin Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('admin_name', 'Admin Name', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
		// Is there any problem with the given date ? 
		if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_auth_template','Users_auth/shop_signup');			
        }
        else
        {	
        	$inserted['status'] = $this->user_manager->shop_exists($shop_code);
        	if ($inserted['status'] == 1 )
           	{
           		$inserted['status'] = $this->user_manager->save_user($admin_name, $username, $password,$email, 1 ,array(1),$shop_code);
           		 $this->user_manager->create_shop($admin_name, $username, $password,$email, 1 ,array(1),$shop_code)
           	}
           	if ($inserted['status'] == false)
           		$inserted['status'] = 0;           	
           	if ($inserted['status'] > 0)
           	{ 
	            /*$this->user->login($username, $password);
	            $this->user->set_custom_field($this->user->get_id(), 'phone',	$this->input->post('phone'));*/
	            redirect('');	            
	        }else {
	        	$this->template->load('user_auth_template','Users_auth/shop_signup',$inserted);			
	        	
	        }			
        }		
	}
}

/* End of file shop_signup_controller.php */
/* Location: ./application/controllers/shop_signup_controller.php */