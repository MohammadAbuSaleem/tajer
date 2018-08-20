<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	function load_common_products(){
		$query = "
				SELECT
				    `images`.`id`,
				    `product`.`shop_code`,
				    `category_id`, 
				    `sub_category_id`, 
				    `name_en`, 
				    `name_ar`, 
				    `price`, 
				    `is_discount`, 
				    `discount_price`, 
				    `discount_start_date`, 
				    `discount_end_date`, 
				    `product_id`, 
				    `file_name`
				FROM
				    shop_product_photos as images

				    LEFT JOIN ( SELECT 
				    				s1.*
								FROM 
									shop_products as s1
								LEFT JOIN 
									shop_products AS s2
							    ON 
							    	s1.id = s2.id 
								limit 6
								) as product
				    ON (product.id = images.product_id)";		
		$query = $this->db->query($query);
		return $query->result();
	}

}

/* End of file main_model.php */
/* Location: ./application/models/main_model.php */