<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_products_model extends CI_Model {

	function get_products($shop_code , $filters = array())
	{
		$this->db->select('*');
		$this->db->from('shop_products');

		if(!empty($filters['product_id']))
			$this->db->where('id' ,$filters['product_id']);

		$this->db->where('shop_code' ,$shop_code);
		$query =$this->db->get();
		return $query->result();
	}

	function add_product_details()
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

		$this->db->set('category_id',$data['category_id'] );
		$this->db->set('sub_category_id',$data['sub_category_id'] );
		$this->db->set('name_en',$data['name_en'] );
		$this->db->set('name_ar',$data['name_ar'] );
		$this->db->set('description_en',$data['description_en'] );
		$this->db->set('description_ar',$data['description_ar'] );
		$this->db->set('manufacturer',$data['manufacturer'] );
		$this->db->set('price',$data['price'] );
		$this->db->set('product_link',$data['product_link'] );
		$this->db->set('id', $data['id']);
		$this->db->set('shop_code', $data['shop_code']);
		$this->db->insert('shop_products');
	}
	function update_product_details()
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

		$this->db->set('category_id',$data['category_id'] );
		$this->db->set('sub_category_id',$data['sub_category_id'] );
		$this->db->set('name_en',$data['name_en'] );
		$this->db->set('name_ar',$data['name_ar'] );
		$this->db->set('description_en',$data['description_en'] );
		$this->db->set('description_ar',$data['description_ar'] );
		$this->db->set('manufacturer',$data['manufacturer'] );
		$this->db->set('price',$data['price'] );
		$this->db->set('product_link',$data['product_link'] );
		$this->db->where('id', $data['id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->update('shop_products');
	}
	function update_product_discount()
	{

		$data['is_discount']			=$this->input->post('activate_discount');
		$data['discount_start_date']	=date_format(date_create($this->input->post('start_date')),"Y-m-d H:i:s");
		$data['discount_end_date']		=date_format(date_create($this->input->post('end_date')),"Y-m-d H:i:s");
		$data['discount_price']			=$this->input->post('discount_price');
		$data['id']						=$this->input->post('id');
		$data['shop_code']				=$this->shop_code;
		$this->db->set('is_discount',$data['is_discount'] );
		$this->db->set('discount_start_date',$data['discount_start_date'] );
		$this->db->set('discount_end_date',$data['discount_end_date'] );
		$this->db->set('discount_price',$data['discount_price'] );

		$this->db->where('id', $data['id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->update('shop_products');
	}

	function update_product_stock($data)
	{				
		$this->db->set('in_stock',$data['in_stock'] );
		$this->db->set('stock_count',$data['stock_count'] );
		$this->db->where('id', $data['id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->update('shop_products');
	}
	function toggle_product_active($data){
		$this->db->set('is_active',$data['is_active'] );
		$this->db->where('id', $data['id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->update('shop_products');
	}
	function delete_product_image($data)
	{				
		$this->db->where('id', $data['id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->delet('shop_product_photos');
	}
	

}

/* End of file shop_products_model.php */
/* Location: ./application/models/shop_products_model.php */
?>
