<?php
Class Search Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('product_name',$keyword);
        $query  =   $this->db->get('product');
        return $query->result();
    }
}   
?>