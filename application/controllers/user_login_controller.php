<?php

/**
 * User Controller
 * This controller fully demonstrates the user class.
 *
 * @package User
 * @author Waldir Bertazzi Junior
 * @link http://waldir.org/
 **/
class user_login_controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$users_table = array(
				'system_type'				=>	2,
				'table' 					=> 'users',
				'table_meta' 				=> 'users_meta',
				'table_user_permissions'	=> 'users_permissions',
				'table_permission' 			=> 'permissions');
		// Load the Library
		$this->load->library('user' , $users_table);       
		$this->load->library('user_manager' , $users_table);
	}
	
	function index()
	{		
		// If user is already logged in, send it to private page
		$this->user->on_valid_session('');		
		// Loads the login view		
		$this->template->load('user_auth_template','Users_auth/user_login');
	}
	
	function private_page(){
		// if user tries to direct access it will be sent to login
		$this->user->on_invalid_session('user_login_controller');
		
		// ... else he will view home
		$this->load->view('home');
	}
	
	function validate()
	{
		// Receives the login data
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		
		/* 
		 * Validates the user input
		 * The user->login returns true on success or false on fail.
		 * It also creates the user session.
		*/
		if($this->user->login($login, $password)){
			// Success
			redirect('');
		} else {
			// Oh, holdon sir.			
			$this->template->load('user_auth_template','Users_auth/user_login');	
		}
	}
	
	// Simple logout function
	function logout()
	{
		// Removes user session and redirects to login
		$this->user->destroy_user('login');
	}

	function user_signup(){
		// If user is already logged in, send it to private page
		$this->user->on_valid_session('');
		
		// Loads the login view		
		$this->template->load('user_auth_template','Users_auth/user_signup');	
		
	}

	function validate_signup()
	{
		extract($this->input->post());			
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|alpha_numeric_spaces');			
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
		// Is there any problem with the given date ? 
		if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_auth_template','Users_auth/user_signup');			
        }
        else
        {
           	$inserted['status'] = $this->user_manager->save_user($full_name, $username, $password,$email, 1 ,array(2));
           	if ($inserted['status'] == false)
           		$inserted['status'] = 0;           	
           	if ($inserted['status'] != 0){ 
	            $this->user->login($username, $password);
	            $this->user->set_custom_field($this->user->get_id(), 'phone',	$this->input->post('phone'));
	            redirect('');	            
	        }else {
	        	$this->template->load('user_auth_template','Users_auth/user_signup',$inserted);			
	        	
	        }			
        }		
	}
}
?>
