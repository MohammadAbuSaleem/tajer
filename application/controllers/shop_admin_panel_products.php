<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_admin_panel_products extends CI_Controller {

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
		$this->load->model('shop_products_model','shop_products');
		$this->load->model('shop_categories_model','shop_categories');		
		$this->load->model('shop_sub_categories_model','shop_sub_categories');				
        $this->load->model('file');
	}

	public function index()
	{
		$this->go_products();
	}

	public function go_products()
	{
		$filters = array();
		$this->data['products'] = $this->shop_products->get_products($this->shop_code,$filters);

		$root = 'Shop_admin_panel/E_commerce/Products/';
		$this->template->load('shop_admin_panel_template',$root.'products',$this->data);
	}
	public function go_add_product()
	{		
		$this->data['shop_categories'] 	=$this->get_shop_categories_object();						
		$root = 'Shop_admin_panel/E_commerce/Products/';
		$this->template->load('shop_admin_panel_template',$root.'add_product',$this->data);
	}
	public function add_product()
	{
		//Validations ::
		$this->form_validation->set_rules('name_en', 'Name (En)', 'required');
		$this->form_validation->set_rules('name_ar', 'Name (Ar)', 'required');
		$this->form_validation->set_rules('manufacturer', 'Manufacturer', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');

		
		if ($this->form_validation->run() == FALSE)
        {  
        	$this->data['shop_categories'] 	=$this->get_shop_categories_object();						      
        	$root = 'Shop_admin_panel/E_commerce/Products/';				
			$this->template->load('shop_admin_panel_template',$root.'add_product',$this->data);
        }	
        else
        {       
			$data['category_id']		=$this->input->post('category_id');
			$data['sub_category_id']	=$this->input->post('sub_category_id');
			$data['name_en']			=$this->input->post('name_en');
			$data['name_ar']			=$this->input->post('name_ar');
			$data['description_en']		=$this->input->post('description_en');
			$data['description_ar']		=$this->input->post('description_ar');
			$data['manufacturer']		=$this->input->post('manufacturer');
			$data['price']				=$this->input->post('price');
			$data['product_link']		=$this->input->post('product_link');
			$data['id']					=$this->input->post('id');
			$data['shop_code']			=$this->shop_code;
			$this->shop_products->add_product_details($data);
			$this->go_products();
		}	
	}


	public function go_update_product()
	{
		$product_id = $this->input->post('product_id');
		$this->data['product']	= $this->shop_products->get_products($this->shop_code , array('product_id' =>$product_id) )[0];			
		$this->data['shop_categories'] 	=$this->get_shop_categories_object();		
		$this->data['selected_category'] = $this->data['product']->category_id;	
		$root = 'Shop_admin_panel/E_commerce/Products/';
		$this->template->load('shop_admin_panel_template',$root.'update_product',$this->data);
	}
	


	public function update_product()
	{
		//Validations ::
		$this->form_validation->set_rules('name_en', 'Name (En)', 'required');
		$this->form_validation->set_rules('name_ar', 'Name (Ar)', 'required');
		$this->form_validation->set_rules('manufacturer', 'Manufacturer', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');

		
		if ($this->form_validation->run() == FALSE)
        {
        	$product_id = $this->input->post('id');
			$this->data['product'] = $this->shop_products->get_products($this->shop_code , array('product_id' =>$product_id) )[0];	
            $root = 'Shop_admin_panel/E_commerce/Products/';
			$this->template->load('shop_admin_panel_template',$root.'update_product',$this->data);
        }	
        else
        {       
			$data['category_id']		=$this->input->post('category_id');
			$data['sub_category_id']	=$this->input->post('sub_category_id');
			$data['name_en']			=$this->input->post('name_en');
			$data['name_ar']			=$this->input->post('name_ar');
			$data['description_en']		=$this->input->post('description_en');
			$data['description_ar']		=$this->input->post('description_ar');
			$data['manufacturer']		=$this->input->post('manufacturer');
			$data['price']				=$this->input->post('price');
			$data['product_link']		=$this->input->post('product_link');
			$data['id']					=$this->input->post('id');
			$data['shop_code']			=$this->shop_code;
			$this->shop_products->update_product_details($data);
			$this->go_products();
		}	
	}

	public function go_update_product_discount()
	{
		$product_id = $this->input->post('product_id');
		$this->data['product'] = $this->shop_products->get_products($this->shop_code , array('product_id' =>$product_id) )[0];
		$root = 'Shop_admin_panel/E_commerce/Products/';
		$this->template->load('shop_admin_panel_template',$root.'discount',$this->data);
	}


	public function update_product_discount()
	{
		$this->form_validation->set_rules('discount_price', 'Discount_Price', 'required|numeric');
		if(!empty($this->input->post('activate_discount')))
		{
			$data['activate_discount']		=$this->input->post('activate_discount');
			$data['start_date']				=$this->input->post('start_date');
			$data['end_date']				=$this->input->post('end_date');
			$data['discount_price']			=$this->input->post('discount_price');
		}
		else 		
		{
			$data['activate_discount']		=0;
			$data['start_date']				=null;
			$data['end_date']				=null;
			$data['discount_price']			=null;
		}	
		if ($data['activate_discount'] == 1){	  		
			if ($this->form_validation->run() == FALSE)
	        {
	        	$product_id = $this->input->post('id');
				$this->data['product'] = $this->shop_products->get_products($this->shop_code , array('product_id' =>$product_id) )[0];
	            $root = 'Shop_admin_panel/E_commerce/Products/';
				$this->template->load('shop_admin_panel_template',$root.'discount',$this->data);
	        }	
	        else
	        { 	        	
				$data['id']				=$this->input->post('id');
				$data['shop_code']		=$this->shop_code;
				$this->shop_products->update_product_discount($data);
				$this->go_products();
			}	
		}
		else if ($data['activate_discount'] == 0)
		{			
			$data['id']				=$this->input->post('id');
			$data['shop_code']		=$this->shop_code;
			$this->shop_products->update_product_discount($data);
			$this->go_products();

		}	
	}

	public function go_update_product_stock()
	{
		$product_id = $this->input->post('product_id');
		$this->data['product'] = $this->shop_products->get_products($this->shop_code , array('product_id' =>$product_id) )[0];		

		$root = 'Shop_admin_panel/E_commerce/Products/';
		$this->template->load('shop_admin_panel_template',$root.'stock',$this->data);
	}

	public function update_product_stock()
	{		
		$data['in_stock']		=$this->input->post('in_stock');
		$data['stock_count']	=$this->input->post('stock_count');
		$data['id']				=$this->input->post('id');
		$data['shop_code']		=$this->shop_code;
		$this->shop_products->update_product_stock($data);
		$this->go_products();		
	}

	public function toggle_product_active()
	{			
		$data['is_active']		=$this->input->post('is_active');		
		$data['id']				=$this->input->post('id');
		$data['shop_code']		=$this->shop_code;
		$this->shop_products->toggle_product_active($data);
		echo 1;	
	}

	function get_shop_categories_object(){
		$data	= (array) $this->shop_categories->load_shop_categories($this->shop_code);		
		foreach($data as $index => $shop_category){
			$data[$index]->name_en =$this->shop_categories->load_shop_category_name($shop_category->category_id)->name_en;
			$data[$index]->name_ar =$this->shop_categories->load_shop_category_name($shop_category->category_id)->name_ar;			
		}
		$data =(object)$data;
		return $data;
	}

	function get_shop_sub_categories_object($cat_id){
		$data	= (array) $this->shop_sub_categories->load_shop_sub_categories($this->shop_code,$cat_id);		

		foreach($data as $index => $shop_sub_category){
			$data[$index]->name_en =$this->shop_sub_categories->load_shop_sub_category_name($shop_sub_category->category_id,$shop_sub_category->sub_category_id)->name_en;
			$data[$index]->name_ar =$this->shop_sub_categories->load_shop_sub_category_name($shop_sub_category->category_id,$shop_sub_category->sub_category_id)->name_ar;			
		}		
		$data =(object)$data;
		return $data;
	}

	function get_shop_sub_categories_ajax(){
		$cat_id = $this->input->post('cat_id');
		$data	= (array) $this->shop_sub_categories->load_shop_sub_categories($this->shop_code,$cat_id);		

		foreach($data as $index => $shop_sub_category){
			$data[$index]->name_en =$this->shop_sub_categories->load_shop_sub_category_name($shop_sub_category->category_id,$shop_sub_category->sub_category_id)->name_en;
			$data[$index]->name_ar =$this->shop_sub_categories->load_shop_sub_category_name($shop_sub_category->category_id,$shop_sub_category->sub_category_id)->name_ar;			
		}		
		$data =(object)$data;
		echo json_encode($data);		
	}

	public function go_manage_product_images()
	{
		$product_id = $this->input->post('product_id');
		$this->data['product']	= $this->shop_products->get_products($this->shop_code , array('product_id' =>$product_id) )[0];			
		$this->data['shop_code'] = $this->shop_code;
        // If file upload form submitted
        if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                
                // File upload configuration
                if (!file_exists('uploads/'.$this->shop_code)) {
				    mkdir('uploads/'.$this->shop_code, 0777, true);
				}
                $uploadPath = 'uploads/'.$this->shop_code;
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);                
                // Upload file to server

                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['shop_code'] = $this->input->post('shop_code');
                    $uploadData[$i]['product_id'] = $this->input->post('product_id');
                }
            }
            
            if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->file->insert($uploadData);
                
                // Upload status message
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        
        // Get files data from the database
        $this->data['files'] = $this->file->getRows($this->shop_code,$product_id);
		$root = 'Shop_admin_panel/E_commerce/Products/';
		$this->template->load('shop_admin_panel_template',$root.'product_photos',$this->data);
	}
	public function delete_product_image_ajax()
	{		
		$data['id']				=$this->input->post('id');
		$data['shop_code']		=$this->shop_code;
		$this->shop_products->delete_product_image($data);		
		$return = array('status' => 1);
		return json_encode($return);
	}



}

/* End of file shop_admin_panel_products.php */
/* Location: ./application/controllers/shop_admin_panel_products.php */
?>