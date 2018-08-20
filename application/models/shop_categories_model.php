<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_categories_model extends CI_Model {

	// Get All Categories that are Defiend By Master Website
	//=====================================================
	function load_categories()
	{
		$this->db->select('*');
		$this->db->from('categories');		
		$this->db->order_by('name_en');		
		$query =$this->db->get();
		return $query->result();
	}
	// Get All Categories That Related to the selected Shop
	//=====================================================
	function load_shop_categories($shop_code){
		$this->db->select('*');
		$this->db->from('shop_categories');
		$this->db->where('shop_code' ,$shop_code);
		$query =$this->db->get();
		return $query->result();
	} 
	// Get Name Of The Given Category
	//=====================================================
	function load_shop_category_name($cat_id){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('id' ,$cat_id);
		$query =$this->db->get();
		return $query->result()[0];
	}

	//Add Category To Shop
	//=====================================================
	function add_shop_category($shop_code,$category_id){
		$this->db->set('shop_code',$shop_code);
		$this->db->set('category_id',$category_id);
		$this->db->insert('shop_categories');
	}

	// Update Alternative Name Of Category for the Shop
	//=====================================================
	function update_shop_category_name($data){
		$this->db->set('mask_name_en',$data['mask_name_en'] );
		$this->db->set('mask_name_ar',$data['mask_name_ar'] );
		$this->db->where('category_id', $data['category_id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->update('shop_categories');
	}
	// Delete Category Of the Selected Shop
	//=====================================================
	function delete_shop_category($data){
		$this->db->where('category_id', $data['category_id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->delete('shop_categories');
	}

}

/* End of file shop_categories_model.php */
/* Location: ./application/models/shop_categories_model.php */
