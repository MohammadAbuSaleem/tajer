<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

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
		$this->load->library('user_manager' , $users_table);
		$this->load->model('main_model','main_model');
		if ($this->user->validate_session())
		{
			$this->is_logged_in = 1;
			$this->id  = $this->user->user_data->id;
			$this->name  = $this->user->user_data->name;
			$this->email  = $this->user->user_data->email;
			$this->username  = $this->user->user_data->login;
			$this->active  = $this->user->user_data->active;	
		}
		// User Data 
		//========================================
		$this->data['userdata']['is_logged_in']	= $this->is_logged_in ;	
		$this->data['userdata']['id'] 			= $this->id;
		$this->data['userdata']['name'] 		= $this->name;
		$this->data['userdata']['email'] 		= $this->email;
		$this->data['userdata']['username'] 	= $this->username;
		$this->data['userdata']['active'] 		= $this->active;
		$this->data['userdata']['first_name']	= ucfirst (explode(' ', $this->name)[0]);
	}


	public function index()
	{
		// Initiation Contents Arrays
		//========================================
		$common_stores_arr 			= array();
		$common_products_arr 		= array();
		$advertise_banner_arr 		= array();
		$best_sellers_arr 			= array();
		$premium_selling_cards_arr 	= array();
		$suggested_stores_arr 		= array();		
		$suggested_products_arr 	= array();
		$brands_banner_arr 			= array();


		// Page Content 
		//========================================
		$this->data['sections']['slider'] = $this->load->view('Main_pages/Home/slider','',true);
		$this->data['sections']['common_stores'] = $this->load->view('Main_pages/Home/common_stores','',true);
		$common_products_arr['common_products_data'] = $this->get_common_products();
		$this->data['sections']['common_products'] = $this->load->view('Main_pages/Home/common_products',$common_products_arr,true);
		$this->data['sections']['advertise_banner'] = $this->load->view('Main_pages/Home/advertise_banner','',true);
		$this->data['sections']['best_sellers'] = $this->load->view('Main_pages/Home/best_sellers','',true);
		$this->data['sections']['premium_selling_cards'] = $this->load->view('Main_pages/Home/premium_selling_cards','',true);
		$this->data['sections']['suggested_stores'] = $this->load->view('Main_pages/Home/suggested_stores','',true);
		$this->data['sections']['suggested_products'] = $this->load->view('Main_pages/Home/suggested_products','',true);
		$this->data['sections']['brands_banner'] = $this->load->view('Main_pages/Home/brands_banner','',true);

		$this->template->load('main_template','Main_pages/Home/home',$this->data);	
	}
	public function get_common_products(){
		$data 		= array();
		$counter	=0;
		$data = $this->main_model->load_common_products();
		foreach($data as $index => $product )
		{
			
			if (!empty($return_data)&&!empty ($data[ $index-1]) && !empty ($return_data[ $counter-1]))
				if( $product->product_id ==$return_data[$counter-1]->product_id)
				{
					if (empty($return_data[$counter-1]->file_name_2))
					$return_data[$counter-1]->file_name_2 = $product->file_name;
					continue;
				}
			$return_data[] 	= (object) array();
			$return_data[$counter]->id =  $product->id;
			$return_data[$counter]->shop_code =  $product->shop_code;
			$return_data[$counter]->category_id =  $product->category_id;
			$return_data[$counter]->sub_category_id =  $product->sub_category_id;
			$return_data[$counter]->name_en =  $product->name_en;
			$return_data[$counter]->name_ar =  $product->name_ar;
			$return_data[$counter]->price =  $product->price;
			$return_data[$counter]->is_discount =  $product->is_discount;
			$return_data[$counter]->discount_price =  $product->discount_price;
			$return_data[$counter]->discount_start_date =  $product->discount_start_date;
			$return_data[$counter]->discount_end_date =  $product->discount_end_date;
			$return_data[$counter]->product_id =  $product->product_id;
			$return_data[$counter]->file_name =  $product->file_name;
			$counter++;
		}
		return $return_data;
	}
}

/* End of file main_controller.php */
/* Location: ./application/controllers/main_controller.php */
?>
