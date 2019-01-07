<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('contents/admin', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/atliktidarbai/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('contents/admin', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('templates/header');
			$this->load->view('contents/admin', $data);
			$this->load->view('templates/footer');
		}
	}
}
?>