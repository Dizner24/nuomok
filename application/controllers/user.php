<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->library('form_validation');
$this->load->model('user_model');
$this->load->model('Shopping_cart_model');

}
public function index(){
if(($this->session->userdata('user_id')!="")){
	$this->welcome();
	} else {
		$this->load->view('templates/header');
		$this->load->view('contents/index');
		$this->load->view('templates/footer');
	}
}
public function welcome(){
	$this->load->view("templates/header");
	$this->load->view("contents/logged");
	$this->load->view("templates/footer");
	}

	public function foto(){
	$this->load->view("templates/header");
	$this->load->view("contents/foto");
	$this->load->view("templates/footer");
	}
public function product_insert()
    {   
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_name', 'Pavadinimas', 'trim|required|is_unique[product.product_name]|min_length[10]|max_length[255]|xss_clean');
		$this->form_validation->set_rules('product_price', 'Kaina', 'required|is_numeric|xss_clean');
		
		
		$this->form_validation->set_message('is_unique[product.product_name]', '<font color="red">Skelbimas tokiu pavadinimu jau egzistuoja</font>');
		$this->form_validation->set_message('min_length', '<font color="red">Pavadinimas negali b&#363ti trumpesnis negu 10 simboliai.</font>');
		$this->form_validation->set_message('max_length', '<font color="red">Pavadinimas negali b&#363ti ilgesnis negu 255 simboliai.</font>');
		$this->form_validation->set_message('is_numeric', '<font color="red">Kaina nurodoma tik skaiciais!</font>');
	
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
		$this->load->view('contents/useris');
		$this->load->view('templates/footer');
		} else {
	
	
        if (!empty($_POST)) {
            $product_name = $this->input->post('product_name');
            $product_image = $this->input->post('product_image');
            $product_price = $this->input->post('product_price');
			$category_id = $this->input->post('category_id');
            $owner = $this->input->post('owner');
            if ($product_name && $product_price && $owner && $category_id) {
                $this->load->model('Shopping_cart_model');
                $data = array(
                    'product_name' => $product_name,
                    'product_image' => $product_image,
                    'product_price' => $product_price,
                    'owner' => $owner,
					'category_id'	=> $category_id
                );
                $product_id = $this->Shopping_cart_model->product_insert($data);
            }
        } 
		$this->load->view('templates/header');
        $this->load->view('templates/done'); 
        $this->load->view('templates/footer'); }
    }
public function renew_user(){
		
	$user_fname = $_POST['user_fname'];
	$this->db->set('user_fname', $user_fname);
	
	
	$user_lname = $_POST['user_lname'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	
	
//	if (!empty($_POST)) {
//		$user_fname = $this->db->update('user_fname');
//		$user_lname = $this->input->post('user_lname');
//		$address = $this->input->post('address');
//		$mobile = $this->input->post('mobile');
//		if ($user_fname && $user_lname && $address && $mobile){
//			$this->load->model('renew_user');
//			$data = array(
//				'user_fname' => $user_fname,
//				'user_lname' => $user_lname,
//				'address' => $address,
//				'mobile' => $mobile
//			);
//			$id = $this->renew_user->renew_user($data);
//		}
//	}
	$this->load->view('template/header');
	$this->load->view('contents/useris');
	$this->load->view('templates/footer');
}	
	
public function admin_data(){
	if (!empty($_POST)){
		$hello = $this->input->post('hello');

		if ($hello){
			$this->load->model('user_model');
			$data = array(
			'hello'	=> $hello,
			);
			
			
			$product_id = $this->user_model->admin_data($data);
		}
	}
		$this->load->view('templates/header');
        $this->load->view('contents/useris'); 
        $this->load->view('templates/footer'); 
}
	
	
	
public function login(){
	
	
	$email=$this->input->post('email');
	$password=md5($this->input->post('pass'));
	

	$result=$this->user_model->login($email,$password);
	if($result) $this->welcome();
	else 		$this->index();
	}
	

	
	
public function thank(){
	$this->load->view('templates/header');
	$this->load->view('templates/thank');
	$this->load->view('templates/footer');
	}

	public function done(){
	$this->load->view('templates/header');
	$this->load->view('templates/done');
	$this->load->view('templates/footer');
	}
	

	
public function registration(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('user_name', 'Vartotojo vardas', 'trim|required|is_unique[user.username]|alpha_numeric|min_length[4]|xss_clean');
	$this->form_validation->set_rules('email_address', 'El. pa&#353tas', 'trim|required|valid_email|is_unique[user.email]');
	$this->form_validation->set_rules('password', 'Slapta&#382odis', 'trim|required|min_length[4]|max_length[32]');
	$this->form_validation->set_rules('con_password', 'Pakartokite slapta&#382od&#303', 'trim|required|matches[password]');
	
	$this->form_validation->set_message('is_unique[user.email]', '<font color="red">Vartotojas &#353iuo el. pa&#353tu arba vartotojo vardu jau egzistuoja.</font>');
	$this->form_validation->set_message('is_unique[user.username]', '<font color="red">Vartotojas &#353iuo el. pa&#353tu arba vartotojo vardu jau egzistuoja.</font>');
	$this->form_validation->set_message('matches', '<font color="red">Slapta&#382od&#382iai nesutampa.</font>');
	$this->form_validation->set_message('min_length', '<font color="red">Vartotojo vardas ir/arba slapta&#382odis negali b&#363ti trumpesnis negu 4 simboliai.</font>');
	$this->form_validation->set_message('valid_email', '<font color="red">Turite &#303vesti tinkam&#261 el. pa&#353to adres&#261.</font>');
	$this->form_validation->set_message('max_length', '<font color="red">Slapta&#382odis negali b&#363ti ilgesnis negu 32 simboliai.</font>');
	
	
	if($this->form_validation->run() == FALSE){
		$this->load->view('templates/header');
		$this->load->view('contents/loging');
		$this->load->view('templates/footer');
		} else {
			$this->user_model->add_user();
			$this->thank();
		}
	}

	
	public function delete_user($id){
		$this->load->model('user_model');
		$this->user_model->delete_user($id);
	}
	
	public function delete_product($product_id){
		$this->load->model('user_model');
		$this->user_model->delete_product($product_id);
		
		
		
	}
	
	
public function logout(){
	$newdata = array(
	'user_id' => '',
	'user_name' =>'',
	'user_email' =>'',
	'logged_in' => FALSE,
	);
	$this->session->unset_userdata($newdata);
	$this->session->sess_destroy();
	$this->load->view('templates/header');
	$this->load->view('contents/index');
	$this->load->view('templates/footer');
	}


public function reg(){

	$this->load->view('templates/header');
	$this->load->view('templates/reg');
	$this->load->view('templates/footer');
	}
	
	public function kontaktai(){

	$this->load->view('templates/header');
	$this->load->view('contents/contact');
	$this->load->view('templates/footer');
	}
	public function useris(){

	$this->load->view('templates/header');
	$this->load->view('contents/useris');
	$this->load->view('templates/footer');
	}
	
	public function admin(){

	$this->load->view('templates/header');
	$this->load->view('contents/admin');
	$this->load->view('templates/footer');
	}
	public function loging(){

	$this->load->view('templates/header');
	$this->load->view('contents/loging');
	$this->load->view('templates/footer');
	}
	
	public function automobiliai(){

	$this->load->view('templates/header');
	$this->load->view('contents/automobiliai');
	$this->load->view('templates/footer');
	}
	public function dronai(){

	$this->load->view('templates/header');
	$this->load->view('contents/dronai');
	$this->load->view('templates/footer');
	}
	public function irankiai(){

	$this->load->view('templates/header');
	$this->load->view('contents/irankiai');
	$this->load->view('templates/footer');
	}
	public function motociklai(){

	$this->load->view('templates/header');
	$this->load->view('contents/motociklai');
	$this->load->view('templates/footer');
	}
	public function vaikams(){

	$this->load->view('templates/header');
	$this->load->view('contents/vaikams');
	$this->load->view('templates/footer');
	}
	public function sportas(){

	$this->load->view('templates/header');
	$this->load->view('contents/sportas');
	$this->load->view('templates/footer');
	}
	public function ivairus(){

	$this->load->view('templates/header');
	$this->load->view('contents/ivairus');
	$this->load->view('templates/footer');
	}
	public function konsoles(){

	$this->load->view('templates/header');
	$this->load->view('contents/konsoles');
	$this->load->view('templates/footer');
	}
	
	public function naujienos(){

	$this->load->view('templates/header');
	$this->load->view('contents/naujienos');
	$this->load->view('templates/footer');
	}
	public function main(){

	$this->load->view('templates/header');
	$this->load->view('contents/main');
	$this->load->view('templates/footer');
	}
	
	
	
	public function apie(){

	$this->load->view('templates/header');
	$this->load->view('contents/apie');
	$this->load->view('templates/footer');
	

	}
	public function search(){

	$this->load->view('templates/header');
	$this->load->view('contents/search');
	$this->load->view('templates/footer');
	}
	public function jusudarbai(){

	$this->load->view('templates/header');
	$this->load->view('contents/jusudarbai');
	$this->load->view('templates/footer');
	}
	
	
	
	
    
}
?>