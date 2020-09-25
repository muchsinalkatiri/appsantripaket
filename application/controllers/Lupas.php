<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupas extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->model('lupas_model');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Dashboard';
		// Must login

		$data['paket']=$this->db_model->get_5paket_teratas()->result();
		// $data['paket_sita']=$this->db_model->get_paket_sita()->result();
		$this->load->view('v_db',$data);
	}

	public function tampil(){
		$data['page_title'] = 'Lupas';
		// Must login

		// $data['paket']=$this->db_model->get_5paket_teratas()->result();
		// $data['paket_sita']=$this->db_model->get_paket_sita()->result();
		$this->load->view('v_home/v_lupas_tampilan',$data);

	}

	public function action_lupas(){

				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Berhasil, Silahkan menghubungi admin untuk meminta link.</h5>
				</div>');    
				redirect('lupas/tampil');
	}
	
}
