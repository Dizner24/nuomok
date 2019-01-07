<?php
Class Search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Search');
    }

    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->search->search($keyword);
		$this->load->view('templates/header');
        $this->load->view('contents/search',$data);
		$this->load->view('templates/footer');
    }

}
?>