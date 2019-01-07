<?php

class User_photo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('contents/useris', array('error' => ' ' ));
	}

	function do_upload()
	{
		$usr = $this->session->userdata('user_name');
		$config['upload_path'] = './myassets/user_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$config['file_name'] = $usr;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('contents/useris', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('templates/header');
			$this->load->view('contents/useris', $data);
			$this->load->view('templates/footer');
		}
	}
}
?>