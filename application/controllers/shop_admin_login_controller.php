<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_admin_login_controller extends CI_Controller {

	var $data = array();
	public function __construct()
	{
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
		$root ="Shop_admin_panel/Auth/";			
		// If user is already logged in, send it to private page
		$this->user->on_valid_session(base_url().'index.php/shop_admin_panel_main');		
		// Loads the login view		
		$this->template->load('shop_auth_template',$root.'shop_auth');
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
			$this->user->get_shop_permissions();
			var_dump($this->user->shop_user_permission);			
			redirect('shop_admin_panel_main');
		} else {

			// Oh, holdon sir.			
			$this->template->load('shop_auth_template','Shop_admin_panel/Auth/shop_auth');	
		}
	}

}

/* End of file shop_admin_login.php */
/* Location: ./application/controllers/shop_admin_login.php */