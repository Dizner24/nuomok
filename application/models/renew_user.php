<?php
class Renew_user extends CI_Model
{
	function fetch_all()
	{
		$query = $this->db->get("user");
		return $query->result();
	}
	
	public function renew_user($data) {
		
		
		
        // Inserting into your table
        $this->db->insert('user', $data);
        // Return the id of inserted row
        return $idOfInsertedData = $this->db->insert_id();
    }
	
	
}