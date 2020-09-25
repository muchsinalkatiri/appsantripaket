<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('db_model');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Dashboard';
		// Must login

		$data['paket']=$this->db_model->get_5paket_teratas()->result();
		$data['kategori']=$this->db_model->get_paket_kategori()->result();
		$data['bulan']=$this->db_model->get_paket_bulan()->result();
		// $data['paket_sita']=$this->db_model->get_paket_sita()->result();
		$this->load->view('v_db',$data);
		// print_r($this-)
	}
	
}
