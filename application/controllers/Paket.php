<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Paket extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('paket_model');
		// $this->load->helper('MY');

	}

	public function index()
	{
		$data['page_title'] = 'Data Paket';
		// Must login

		$data['paket']=$this->paket_model->get_all_data_masuk()->result();
		$data['paket2']=$this->paket_model->get_all_data_keluar()->result();
		// print_r($data['paket']);
		$this->load->view('v_paket/read',$data);
	}

	public function sita($id_paket){
		$data = array(
				'status_paket'=>'Disita',
				);
			$where = array(
				'id_paket' => $id_paket
				);

			// echo $this->input->post('nis');

			$update = $this->paket_model->update($where,$data,'data_paket');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Data berhasil di perbarui.</h5>
				</div>');    
				redirect('paket');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> Data gagal disimpan.</h5>
				</div>');    
				redirect('paket');
			}	
	}
	public function diambil($id_paket){
		$data = array(
				'status_paket'=>'Diambil',
				);
			$where = array(
				'id_paket' => $id_paket
				);

			// echo $this->input->post('nis');

			$update = $this->paket_model->update($where,$data,'data_paket');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Data berhasil di perbarui.</h5>
				</div>');    
				redirect('paket');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> Data gagal disimpan.</h5>
				</div>');    
				redirect('paket');
			}	
	}


	public function exportExcel1(){
		require(APPPATH.'third_party/phpoffice/vendor/autoload.php');


		$data['paket']=$this->paket_model->get_all_data_masuk()->result();

		 $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'Nama Paket')
                      ->setCellValue('B1', 'Tanggal Terima')
                      ->setCellValue('C1', 'Kategori')
                      ->setCellValue('D1', 'Penerima')
                      ->setCellValue('E1', 'Asrama')
                      ->setCellValue('F1', 'Gedung')
                      ->setCellValue('G1', 'Pengirim Paket')
                      ->setCellValue('H1', 'Isi Paket Disita')
                      ->setCellValue('I1', 'Status Paket');

			$kolom = 2;
         	$nomor = 1;

         foreach($data['paket'] as $datapaket) {

// echo $datasantri->NIS;
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $datapaket->nama_paket)
                           ->setCellValue('B' . $kolom, $datapaket->tanggal_diterima)
                           ->setCellValue('C' . $kolom, $datapaket->nama_kategori)
                           ->setCellValue('D' . $kolom, $datapaket->nama_santri)
                           ->setCellValue('E' . $kolom, $datapaket->nama_asrama)
                           ->setCellValue('F' . $kolom, $datapaket->gedung)
                           ->setCellValue('G' . $kolom, $datapaket->pengirim_paket)
                           ->setCellValue('H' . $kolom, $datapaket->isi_paket_sita)
                           ->setCellValue('I' . $kolom, $datapaket->status_paket);

               $kolom++;
               $nomor++;

          }
          // echo $datapaket->status_paket ;
          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="Data_Paket_masuk.xlsx"');
		  header('Cache-Control: max-age=0');

		  $writer->save('php://output');
		}


	public function exportExcel2(){
		require(APPPATH.'third_party/phpoffice/vendor/autoload.php');


		$data['paket']=$this->paket_model->get_all_data_keluar()->result();

		 $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'Nama Paket')
                      ->setCellValue('B1', 'Tanggal Terima')
                      ->setCellValue('C1', 'Kategori')
                      ->setCellValue('D1', 'Penerima')
                      ->setCellValue('E1', 'Asrama')
                      ->setCellValue('F1', 'Gedung')
                      ->setCellValue('G1', 'Pengirim Paket')
                      ->setCellValue('H1', 'Isi Paket Disita')
                      ->setCellValue('I1', 'Status Paket');

			$kolom = 2;
         	$nomor = 1;

         foreach($data['paket'] as $datapaket) {

// echo $datasantri->NIS;
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $datapaket->nama_paket)
                           ->setCellValue('B' . $kolom, $datapaket->tanggal_diterima)
                           ->setCellValue('C' . $kolom, $datapaket->nama_kategori)
                           ->setCellValue('D' . $kolom, $datapaket->nama_santri)
                           ->setCellValue('E' . $kolom, $datapaket->nama_asrama)
                           ->setCellValue('F' . $kolom, $datapaket->gedung)
                           ->setCellValue('G' . $kolom, $datapaket->pengirim_paket)
                           ->setCellValue('H' . $kolom, $datapaket->isi_paket_sita)
                           ->setCellValue('I' . $kolom, $datapaket->status_paket);

               $kolom++;
               $nomor++;

          }
          // echo $datapaket->status_paket ;
          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="Data_Paket_keluar.xlsx"');
		  header('Cache-Control: max-age=0');

		  $writer->save('php://output');
		}

	public function delete($id_paket=null){
		if(!$this->session->userdata('logged_in')) 
			redirect();
		
		$where = array('id_paket' => $id_paket);
		$delete = $this->paket_model->delete($where,'data_paket');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('paket');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('paket');
		}
	}
		public function create()
	{
		$data['page_title'] = 'Tambah Data Paket';
		// Must login

		$data['kategori']=$this->paket_model->get_kategori()->result();
		$data['santri']=$this->paket_model->get_santri()->result();
		$data['asrama']=$this->paket_model->get_asrama()->result();

		$this->form_validation->set_rules('nama_paket','Nama Paket','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));
		$this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_paket/create',$data);
		}
		else{
			$nis= $this->input->post('nis');
			$nama_santri = $this->input->post('nama_santri');
			$alamat = $this->input->post('alamat');
			$asrama_id = $this->input->post('asrama');
			$total_paket = $this->input->post('total_paket_diterima');

			$data = array(
				'nis'=>$nis,
				'nama_santri' => $nama_santri,
				'alamat'=> $alamat,
				'asrama_id' => $asrama_id,
				'total_paket_diterima' => $total_paket,
				);
			$insert = $this->santri_model->create('data_santri',$data);

			if ($insert) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> '.$nis.' berhasil ditambahkan.</h5>
				</div>');    
				redirect('santri');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> '.$nis.' gagal ditambahkan.</h5>
				</div>');    
				redirect('santri');
			}	
		}
	}
}