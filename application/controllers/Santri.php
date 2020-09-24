<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('santri_model');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Santri';
		// Must login

		$data['santri']=$this->santri_model->get_all_data()->result();
		$this->load->view('v_santri/read',$data);
	}
	
}
