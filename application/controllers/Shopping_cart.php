<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_cart extends CI_Controller {

	function index()
	{
		$this->load->model("Shopping_cart_model");
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$this->load->view("templates/header");
		$this->load->view("contents/shopping_cart", $data);
		$this->load->view("templates/footer");

	}
	function automobiliai()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'automobiliai');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="automobiliai";
		$this->load->view("templates/header");
		$this->load->view("contents/automobiliai", $data);
		$this->load->view("templates/footer");
	}
	function dronai()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'dronai');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="dronai";
		$this->load->view("templates/header");
		$this->load->view("contents/dronai", $data);
		$this->load->view("templates/footer");
	}
		
	function irankiai()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'irankiai');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="irankiai";
		$this->load->view("templates/header");
		$this->load->view("contents/irankiai", $data);
		$this->load->view("templates/footer");
	}
	function motociklai()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'motociklai');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="motociklai";
		$this->load->view("templates/header");
		$this->load->view("contents/motociklai", $data);
		$this->load->view("templates/footer");
	}
	function vaikams()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'vaikams');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="vaikams";
		$this->load->view("templates/header");
		$this->load->view("contents/vaikams", $data);
		$this->load->view("templates/footer");
	}
	function sportas()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'sportas');
		$this->db->like('product_name', '');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="sportas";
		$this->load->view("templates/header");
		$this->load->view("contents/sportas", $data);
		$this->load->view("templates/footer");
	}
	function search()
	{
		$this->load->model("Shopping_cart_model");
		$searchterm = $_POST['keyword'];
		$this->db->like('product_name', $searchterm);
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="sportas";
		$this->load->view("templates/header");
		$this->load->view("contents/search", $data);
		$this->load->view("templates/footer");
		
	}
	function ivairus()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'ivairus');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="ivairus";
		$this->load->view("templates/header");
		$this->load->view("contents/ivairus", $data);
		$this->load->view("templates/footer");
	}
	function konsoles()
	{
		$this->load->model("Shopping_cart_model");
		$auto = $this->db->where('category_id', 'konsoles');
		$data["product"] = $this->Shopping_cart_model->fetch_all();
		$category_id="konsoles";
		$this->load->view("templates/header");
		$this->load->view("contents/konsoles", $data);
		$this->load->view("templates/footer");
	}
	

	function add()
	{
		$this->load->library("cart");
		$data = array(
			"id"	=> $_POST["product_id"],
			"name"	=> $_POST["product_name"],
			"qty"	=> $_POST["quantity"],
			"price"	=> $_POST["product_price"]
		);
		$this->cart->insert($data); //return rowid
		echo $this->view();
	}
	function load()
	{
		echo $this->view();
	}
	
	function remove()
	{
		$this->load->library("cart");
		$row_id = $_POST["row_id"];
		$data = array(
			'rowid'	=> $row_id,
			'qty'	=> 0
		);
		$this->cart->update($data);
		echo $this->view();
	}
	function clear()
	{
		$this->load->library("cart");
		$this->cart->destroy();
		echo $this->view();
	}
	
	function view()
	{
		$this->load->library("cart");
		$output = '';
		$output .= '
		<h3>Rezervacijų sąrašas</h3><br />
		<div class="table-responsive">
			<div align="right">
				<button type="button" id="clear_cart" class="btn btn-warning">Išvalyti sąrašą</button>
			</div>
			<br />
			<table class="table table-bordered">
				<tr>
					<th width="40%">Pavadinimas</th>
					<th width="20%">Trukmė</th>
					<th width="15%">Kaina už dieną</th>
					<th width="15%">Viso</th>
					<th width="10%"></th>
				</tr>	
		';
		$count = 0; 
		foreach($this->cart->contents() as $items)
		{
			$count++;
			$output .= '
			<tr>
				<td>'.$items["name"].'</td>
				<td>'.$items["qty"].' diena (-os)</td>
				<td>'.$items["price"].' €</td>
				<td>'.$items["subtotal"].' €</td>
				<td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Išimti</button></td>
			</tr>
			';
		}
		$output .= '
			<tr>
				<td colspan="4" align="right">Viso</td>
				<td>'.$this->cart->total().' €</td>
			</tr>
			</table>
			</div>
		';
		
		if($count == 0)
		{
			$output = '<h3 align="center">Neturite užrezervuotų prekių</h3>';
		}
		return $output;
	}
	
	
	public function productform(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_name', 'Pavadinimas', 'trim|required|is_unique[product.product_name]|min_length[10]|xss_clean');
		
		
		$this->form_validation->set_message('is_unique[product.product_name]', '<font color="red">Skelbimas tokiu pavadinimu jau egzistuoja</font>');
		$this->form_validation->set_message('min_length', '<font color="red">Pavadinimas negali b&#363ti trumpesnis negu 10 simboliai.</font>');
		
		if($this->form_validation->run() == FALSE){
		$this->load->view('templates/header');
		$this->load->view('contents/useris');
		$this->load->view('templates/footer');
		} else {
			$this->Shopping_cart_model->product_insert($data);
			$this->thank();
	}
	
	
	
	}
		
		
	
	
	
	
}