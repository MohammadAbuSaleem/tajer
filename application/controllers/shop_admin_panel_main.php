<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_admin_panel_main extends CI_Controller {

	var $shop_code 	= null;
	var $user_name 	= null;
	var $data 		= array();
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
		$this->load->library('user_manager' , $users_table);
		// if user tries to direct access it will be sent to login
		$this->user->on_invalid_session('shop_admin_login_controller');
		$this->shop_code 			= $this->session->userdata('shop_code');
		$this->user_name 			= $this->user->get_name();
		$this->data['user_name'] 	= $this->user_name;
		$this->load->model('shop_categories_model','shop_categories');
		$this->load->model('shop_sub_categories_model','shop_sub_categories');
	}
	public function index()
	{	

		$root = 'Shop_admin_panel/Home';
		$this->template->load('shop_admin_panel_template',$root.'/home',$this->data);		
	}

	public function go_messages()
	{				
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/Home/messages',$this->data);		
	}

	// Categories Functions
	// ========================================================================================
	public function go_categories()
	{						
		$shop_categories = $this->shop_categories->load_shop_categories($this->shop_code);
		//set up categories data array
		foreach($shop_categories as $id => $shop_category){			
			$x = $this->shop_categories->load_shop_category_name($shop_category->category_id);
			$this->data['categories'][$shop_category->id]['category_id'] = $shop_category->category_id;
			$this->data['categories'][$shop_category->id]['name_en'] = $x->name_en;
			$this->data['categories'][$shop_category->id]['name_ar'] = $x->name_ar;
			$this->data['categories'][$shop_category->id]['mask_name_en'] = $shop_category->mask_name_en;
			$this->data['categories'][$shop_category->id]['mask_name_ar'] = $shop_category->mask_name_ar;	
		}				
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/categories',$this->data);		
	}

	public function go_add_categories()
	{
		$shop_categories = $this->shop_categories->load_shop_categories($this->shop_code);
		$website_categories = $this->shop_categories->load_categories();		

		$this->data['website_categories'] 	= $website_categories;
		$this->data['shop_categories'] 		= $shop_categories;
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/add_categories',$this->data);
	}
	public function add_categories(){
		$new_categories = $this->input->post('new_categories');
		if (!empty($new_categories))
			foreach ($new_categories as $cat_id ){
				$this->shop_categories->add_shop_category($this->shop_code,$cat_id);
			}	
		$this->go_categories();		
	}

	public function go_update_categories()
	{	
		$this->data['category_id'] = $this->input->post('cat_id');		
		$this->data['mask_name_en'] = $this->input->post('mask_name_en');	
		$this->data['mask_name_ar'] = $this->input->post('mask_name_ar');	
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/update_categories',$this->data);
	}

	public function update_category()
	{
		$data['mask_name_en']=$this->input->post('mask_name_en');
		$data['mask_name_ar']=$this->input->post('mask_name_ar');
		$data['category_id']=$this->input->post('category_id');
		$data['shop_code']=$this->shop_code;
		$this->shop_categories->update_shop_category_name($data);
		$this->go_categories();	
	}

	public function go_delete_categories()
	{
		$this->data['category_id'] = $this->input->post('cat_id');				
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/delete_categories',$this->data);
	}

	public function delete_category(){
		$data['category_id']=$this->input->post('category_id');
		$data['shop_code']=$this->shop_code;
		$this->shop_categories->delete_shop_category($data);
		$this->go_categories();	
	}

	// Sub Categoris Functions
	// ========================================================================================
	public function go_sub_categories()
	{						
		$shop_sub_categories = $this->shop_sub_categories->load_shop_sub_categories($this->shop_code);		
		//set up categories data array
		foreach($shop_sub_categories as $id => $shop_sub_category){			
			$x = $this->shop_sub_categories->load_shop_sub_category_name($shop_sub_category->category_id ,$shop_sub_category->sub_category_id);
			$this->data['sub_categories'][$shop_sub_category->category_id][$shop_sub_category->sub_category_id]['category_id'] = $shop_sub_category->category_id;
			$this->data['sub_categories'][$shop_sub_category->category_id][$shop_sub_category->sub_category_id]['name_en'] = $x->name_en;
			$this->data['sub_categories'][$shop_sub_category->category_id][$shop_sub_category->sub_category_id]['name_ar'] = $x->name_ar;
			$this->data['sub_categories'][$shop_sub_category->category_id][$shop_sub_category->sub_category_id]['mask_name_en'] = $shop_sub_category->mask_name_en;
			$this->data['sub_categories'][$shop_sub_category->category_id][$shop_sub_category->sub_category_id]['mask_name_ar'] = $shop_sub_category->mask_name_ar;	
		}
		$shop_categories = $this->shop_categories->load_shop_categories($this->shop_code);				
		//set up categories data array
		foreach($shop_categories as $id => $shop_category){			
			$x = $this->shop_categories->load_shop_category_name($shop_category->category_id);
			$this->data['categories'][$shop_category->id]['category_id'] = $shop_category->category_id;
			$this->data['categories'][$shop_category->id]['name_en'] = $x->name_en;
			$this->data['categories'][$shop_category->id]['name_ar'] = $x->name_ar;
			$this->data['categories'][$shop_category->id]['mask_name_en'] = $shop_category->mask_name_en;
			$this->data['categories'][$shop_category->id]['mask_name_ar'] = $shop_category->mask_name_ar;	
		}	

		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/sub_categories',$this->data);		
	}
	public function go_add_sub_categories()
	{
		$website_categories 	= $this->shop_categories->load_categories();
		$website_sub_categories = $this->shop_sub_categories->load_sub_categories();		
		$shop_categories 		= $this->shop_categories->load_shop_categories($this->shop_code);
		$shop_sub_categories 	= $this->shop_sub_categories->load_shop_sub_categories($this->shop_code);		

		$this->data['website_categories'] 		= $website_categories;
		$this->data['website_sub_categories'] 	= $website_sub_categories;
		$this->data['shop_categories'] 			= $shop_categories;
		$this->data['shop_sub_categories'] 		= $shop_sub_categories;
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/add_sub_categories',$this->data);
	}
	public function add_sub_categories(){
		$new_sub_categories = $this->input->post('new_sub_categories');
		if (!empty($new_sub_categories))
			foreach ($new_sub_categories as $sub_cat_id ){
				$this->shop_sub_categories->add_shop_sub_category($this->shop_code,$sub_cat_id);
			}	
		$this->go_sub_categories();		
	}

	public function go_update_sub_categories()
	{	
		$this->data['cat_id'] = $this->input->post('cat_id');
		$this->data['sub_cat_id'] = $this->input->post('sub_cat_id');
		$this->data['mask_name_en'] = $this->input->post('mask_name_en');	
		$this->data['mask_name_ar'] = $this->input->post('mask_name_ar');	
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/update_sub_categories',$this->data);
	}

	public function update_sub_category()
	{
		$data['mask_name_en']=$this->input->post('mask_name_en');
		$data['mask_name_ar']=$this->input->post('mask_name_ar');
		$data['sub_category_id']=$this->input->post('sub_category_id');
		$data['category_id']=$this->input->post('category_id');
		$data['shop_code']=$this->shop_code;
		$this->shop_sub_categories->update_shop_sub_category_name($data);
		$this->go_sub_categories();	
	}

	public function go_delete_sub_categories()
	{
		$this->data['category_id'] = $this->input->post('cat_id');
		$this->data['sub_category_id'] = $this->input->post('sub_cat_id');
		$this->template->load('shop_admin_panel_template','Shop_admin_panel/E_commerce/delete_sub_categories',$this->data);
	}

	public function delete_sub_category(){
		$data['category_id']=$this->input->post('category_id');
		$data['sub_category_id']=$this->input->post('sub_category_id');
		$data['shop_code']=$this->shop_code;
		$this->shop_sub_categories->delete_shop_sub_category($data);
		$this->go_sub_categories();	
	}



}

/* End of file shop_admin_panel_main.php */
/* Location: ./application/controllers/shop_admin_panel_main.php */
?>