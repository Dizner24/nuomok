<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
public function __construct()
{
parent::__construct();
}
public function login($username,$password){
	$this->db->where("username",$username);
	$this->db->where("password",$password);
	
	$query=$this->db->get("user");
	if($query->num_rows()>0){
		foreach($query->result() as $rows)
	{
	
	$newdata = array(
		'user_id' => $rows->id,
		'user_name' => $rows->username,
		'user_email' => $rows->email,
		'user_fname' => $rows->fname,
		'user_lname' => $rows->lname,
		'address'	=> $rows->address,
		'mobile'	=> $rows->mobile,
		'logged_in' => TRUE
		);
		
	}
	$this->session->set_userdata($newdata);
	return true;
	}
	return false;
	}

	

	

	public function delete_user($id){
		$this->db->where(['id' => $id]);
		$result = $this->db->delete('user');
		$this->load->view('templates/header');
		$this->load->view('contents/deleted');
		$this->load->view('templates/footer');
		
	}
	
	
	public function delete_product($product_id){
		$this->db->where(['product_id' => $product_id]);
		$result = $this->db->delete('product');
		$this->load->view('templates/header');
		$this->load->view('contents/deleted');
		$this->load->view('templates/footer');
		
	}
	
	
	
public function add_user(){
	$data=array(
		'username' => $this->input->post('user_name'),
		'email' => $this->input->post('email_address'),
		'password' => md5($this->input->post('password'))
	);
	$this->db->insert('user',$data);
	}


public function admin_data(){
	$data=array(
		'hello' => $this->input->post('hello')
		
	);
	$this->db->insert('admin_data',$data);
	
	}
}
?>