<?php
class Shopping_cart_model extends CI_Model
{
	function fetch_all()
	{	
		$query = $this->db->get("product");
		
		return $query->result();
	}
	
	public function product_insert($data) {
		
		
		
        // Inserting into your table
        $this->db->insert('product', $data);
        // Return the id of inserted row
        return $idOfInsertedData = $this->db->insert_id();
    }
	
	
}