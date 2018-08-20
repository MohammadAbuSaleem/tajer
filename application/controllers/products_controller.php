<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_controller extends CI_Controller {

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
		$this->load->model('products_model');	
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
		// do nothing
	}

	function go_product()
	{
		$this->product_id = $this->uri->segment(3);
		$root ="Main_pages/Products/";

		// Initiation Contents Arrays
		//========================================
		$product_details_arr 		= array();		


		$this->product_details_data['product_id'] 		= $product_details_arr['product_id'] = $this->product_id;

		$product_details_arr['product_details_data'] 	= $this->products_model->get_product_details($this->product_id)[0];
		$product_details_arr['product_images_data'] 	= $this->products_model->get_product_images($this->product_id, $product_details_arr['product_details_data']->shop_code);

			
		$this->data['sections']['product_details'] 		= $this->load->view($root.'product_details',$product_details_arr,true);
		$this->data['sections']['related_products'] 	= $this->load->view($root.'related_products','',true);
		$this->data['sections']['description_review'] 	= $this->load->view($root.'description_review','',true);
		$this->data['product_id'] = $this->product_id;
		$this->template->load('main_template',$root.'products',$this->data);
	}
}

/* End of file products_controller.php */
/* Location: ./application/controllers/products_controller.php */
?>