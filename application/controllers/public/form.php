<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form extends CI_Controller {

	function __construct(){ //perintah untuk memanggil model 
		parent::__construct();
		$this->load->model('user/User_model','userM');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function show()
	{
		$this->load->view('public/header');	
		$this->load->view('public/form');
		$this->load->view('public/footer');
	}

	public function proses()
	{
		$data = $this->input->post();
		$create = $this->userM->create($data);
		if($create){
			echo "Sukses";
		}

	}
	public function tampil()
	{
		
		$data['list'] = $this->userM->get();
		$this->load->view('public/header');	
		$this->load->view('public/form_list',$data);
		$this->load->view('public/footer');
	}

	public function detail($id)
	{
		$database = $this->userM->get($id)[0];
		$data{'detail'} = $database;
		//echo "<pre>";
		//var_dump($data);
		$this->load->view('public/header');
		$this->load->view('public/form_detail', $data);
		$this->load->view('public/footer');
	}
}
