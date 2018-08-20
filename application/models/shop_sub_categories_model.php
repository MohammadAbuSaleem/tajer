<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_sub_categories_model extends CI_Model {
	
	// Get All Sub Categories that are Defiend By Master Website
	//=====================================================
	function load_sub_categories()
	{
		$this->db->select('*');
		$this->db->from('sub_categories');		
		$this->db->order_by('name_en');		
		$query =$this->db->get();
		return $query->result();
	}

	// Get All Categories That Related to the selected Shop
	//=====================================================
	function load_categories_by_sub_id($sub_category_id){
		$this->db->select('category_id');
		$this->db->from('sub_categories');		
		$this->db->where('id' ,$sub_category_id);
		$query =$this->db->get();		
		return $query->result()[0];
	} 

	// Get All Sub Categories That Related to the selected Shop
	//=====================================================
	function load_shop_sub_categories($shop_code,$category_id = null){
		if ($category_id != null )
			$this->db->where('category_id' ,$category_id);
		$this->db->select('*');
		$this->db->from('shop_sub_categories');
		$this->db->where('shop_code' ,$shop_code);
		$query =$this->db->get();
		return $query->result();

	} 
	// Get Name Of The Given Sub Category
	//=====================================================
	function load_shop_sub_category_name($cat_id,$sub_cat_id){
		$this->db->select('*');
		$this->db->from('sub_categories');
		$this->db->where('id' ,$sub_cat_id);
		$this->db->where('category_id' ,$cat_id);
		$query =$this->db->get();		
		return $query->result()[0];
	}

	//Add Sub Category To Shop
	//=====================================================
	function add_shop_sub_category($shop_code,$sub_category_id){
		$category_id = $this->load_categories_by_sub_id($sub_category_id)->category_id;		
		$this->db->set('shop_code',$shop_code);
		$this->db->set('category_id',$category_id);
		$this->db->set('sub_category_id',$sub_category_id);		
		$this->db->insert('shop_sub_categories');
	}

	// Update Alternative Name Of Sub Category for the Shop
	//=====================================================
	function update_shop_sub_category_name($data){
		$this->db->set('mask_name_en',$data['mask_name_en'] );
		$this->db->set('mask_name_ar',$data['mask_name_ar'] );
		$this->db->where('category_id', $data['category_id']);
		$this->db->where('sub_category_id', $data['sub_category_id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->update('shop_sub_categories');
	}

	// Delete Sub Category Of the Selected Shop
	//=====================================================
	function delete_shop_sub_category($data){
		$this->db->where('category_id', $data['category_id']);
		$this->db->where('sub_category_id', $data['sub_category_id']);
		$this->db->where('shop_code', $data['shop_code']);
		$this->db->delete('shop_sub_categories');
	}

}

/* End of file shop_sub_categories_model.php */
/* Location: ./application/models/shop_sub_categories_model.php */
?>