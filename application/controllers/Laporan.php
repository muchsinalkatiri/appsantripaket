<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('laporan_model');
		// $this->load->helper('MY');

	}

	public function laporandatapaket()
	{
		$tgl1 = null;
		$tgl2 = null;
		$data['page_title'] = 'Laporan Data Paket';
		// Must login

		$tgl1= $this->input->post('tgl1');
		$tgl2= $this->input->post('tgl2');
		if($tgl1 == null && $tgl2 == null){
			$data['laporan']=$this->laporan_model->get_all_data()->result();
		// print_r($data['laporan']);
		}
		elseif ($tgl1 != null && $tgl2 != null) {
			$data['laporan']=$this->laporan_model->get_data_antara_tanggal($tgl1, $tgl2)->result();
			
		}

		$this->load->view('v_laporan/first',$data);
		
	}
	public function laporan_kategori_dan_sita(){
		
		$data['page_title'] = 'Laporan Data Kategori dan Paket Disita';

		$data['laporan_kategori']=$this->laporan_model->get_jumlah_kategori()->result();
		// print_r($data['laporan_kategori']);
		$this->load->view('v_laporan/v_laporan_kategori_paket_sita',$data);
	}

	public function laporankategori($id_kategori){
		
		$data['page_title'] = 'Laporan Kategori Paket';
		
			$data['kategori']=$this->laporan_model->get_data_paket_by_kategori($id_kategori)->result();
		// print_r($data['kategori']);
		$this->load->view('v_laporan/v_laporan_kategori',$data);
		// echo $id_kategori;
	}

	public function laporanpaketsita(){
		
		$data['page_title'] = 'Laporan Paket Disita';
		
			$data['kategori']=$this->laporan_model->get_data_paket_by_status_disita()->result();
		// print_r($data['kategori']);
		$this->load->view('v_laporan/v_laporan_paket_disita',$data);
		// echo $id_kategori;
	}
}