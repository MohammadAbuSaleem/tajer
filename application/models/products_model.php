<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
	function get_product_details($product_id , $filters = array())
	{
		$this->db->select('*');
		$this->db->from('shop_products');
		$this->db->where('id' ,$product_id);
		$query =$this->db->get();
		return $query->result();
	}

	function get_product_images($product_id , $shop_code ,$filters = array())
	{
		$this->db->select('*');
		$this->db->from('shop_product_photos');
		$this->db->where('product_id' ,$product_id);
		$this->db->where('shop_code' ,$shop_code);
		$query =$this->db->get();
		return $query->result();
	}	

}

/* End of file products_model.php */
/* Location: ./application/models/products_model.php */
?>