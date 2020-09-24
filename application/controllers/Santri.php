<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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


	public function detail($nis)
	{
		$data['page_title'] = 'Data Santri';

		$data['santri']=$this->santri_model->get_data_by_id($nis);
		$this->load->view('v_santri/detail',$data);
	}

	public function cetakpdf($nis)
	{
		$data['page_title'] = 'Cetak PDF';

		$data['santri']=$this->santri_model->get_data_by_id($nis);

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-santri.pdf";
		$this->pdf->load_view('v_santri/profil_santri', $data);
				// $this->load->view('v_santri/profil_santri',$data);

	}

	private $filename = "import_data"; // Kita tentukan nama filen

	public function upload_excel(){
		if(!$this->session->userdata('logged_in')) 
			redirect();

    	$data = array(); // Buat variabel $data sebagai array
    
	    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
	      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	      $upload = $this->santri_model->upload_file($this->filename);
	      
	      if($upload['result'] == "success"){ // Jika proses upload sukses
	        // Load plugin PHPExcel nya
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	        
	        $excelreader = new PHPExcel_Reader_Excel2007();
	        $loadexcel = $excelreader->load('uploads/excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
	        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	        
	        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
	        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
	        $data['sheet'] = $sheet; 
	      }else{ // Jika proses upload gagal
	        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
	      }
	    }
	    
		$data['page_title'] = 'Upload Excel';
		$this->load->view('v_santri/upload_excel',$data);
  }

    public function import(){
  	if(!$this->session->userdata('logged_in') ) 
			redirect();
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('uploads/excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nis'=>$row['A'], // Insert data nis dari kolom A di excel
          'nama_santri'=>$row['B'], // Insert data nama dari kolom B di excel
          'alamat'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'asrama_id'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
          'total_paket_diterima'=>$row['E'], // Insert data alamat dari kolom D di excel
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    
    
    $upload = $this->santri_model->insert_multiple($data);
		if ($upload) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Excel Berhasil di upload.</h5>
			</div>');    
			redirect('santri');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Excel gagal di upload.</h5>
			</div>');    
			redirect('santri');
		}
  }

	public function create()
	{
		$data['page_title'] = 'Tambah Data Santri';
		// Must login

		$data['asrama']=$this->santri_model->get_asrama()->result();

		$this->form_validation->set_rules('nis','Nis','required|numeric|is_unique[data_santri.nis]',
			array(
				'required'=>'Form Nis Wajib di isi.',
				'numeric'=>'nis harus diisi dengan angka',
				// 'exact_length'=>'nis harus berjumlah 10 angka',
				'is_unique' =>'Nis %s sudah ada')
			);
		$this->form_validation->set_rules('nama_santri','Nama Santri','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[3]',
			array(
				'required'=>'Form Alamat Wajib di isi.',
				'min_length'=>'Alamat yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('total_paket_diterima','Total Paket Diterima','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				// 'min_length'=>'Nama yang anda masukan kurang panjang.',
				));

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_santri/create',$data);
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
	public function update($nis = NULL)
	{
		$data['page_title'] = 'Edit Data Santri';
		// Must login
		if(!$this->session->userdata('logged_in')) 
			redirect();

		$where = array('NIS' => $nis);
		$data['santri']=$this->santri_model->get_data_by_id($nis);

		$data['asrama']=$this->santri_model->get_asrama()->result();


		// if($this->input->post('nis') != $data['santri']->NIS) {
		// 	$is_unique =  '|is_unique[data_santri.nis]';
		// } else {
		// 	$is_unique =  '';
		// }

		// $this->form_validation->set_rules('nis','Nis','required|numeric|'.$is_unique,
		// 	array(
		// 		'required'=>'Form Nis Wajib di isi.',
		// 		'numeric'=>'nis harus diisi dengan angka',
		// 		// 'exact_length'=>'nis harus berjumlah 10 angka',
		// 		'is_unique' =>'Nis %s sudah ada')
		// 	);
		$this->form_validation->set_rules('nama_santri','Nama Santri','required|min_length[3]',
			array(
				'required'=>'Form Nama Wajib di isi.',
				'min_length'=>'Nama yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[3]',
			array(
				'required'=>'Form Alamat Wajib di isi.',
				'min_length'=>'Alamat yang anda masukan kurang panjang.',
				));
		$this->form_validation->set_rules('total_paket_diterima','Total Paket Diterima','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				// 'min_length'=>'Nama yang anda masukan kurang panjang.',
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_santri/update',$data);
		}
		else{
			$nis= $this->input->post('nis');
			$nama_santri = $this->input->post('nama_santri');
			$alamat = $this->input->post('alamat');
			$asrama_id = $this->input->post('asrama');
			$total_paket = $this->input->post('total_paket_diterima');

			$data = array(
				'NIS'=>$nis,
				'nama_santri' => $nama_santri,
				'alamat'=> $alamat,
				'asrama_id' => $asrama_id,
				'total_paket_diterima' => $total_paket,
				);
			$where = array(
				'NIS' => $nis
				);

			// echo $this->input->post('nis');

			$update = $this->santri_model->update($where,$data,'data_santri');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> '.$nis.' berhasil di perbarui.</h5>
				</div>');    
				redirect('santri');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> '.$nis.' gagal disimpan.</h5>
				</div>');    
				redirect('santri');
			}	
		}
	}
	public function delete($nis=null){
		if(!$this->session->userdata('logged_in')) 
			redirect();
		
		$where = array('nis' => $nis);
		$delete = $this->santri_model->delete($where,'data_santri');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> '.$nis.' Berhasil Dihapus.</h5>
			</div>');    
			redirect('santri');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> '.$nis.' Gagal Dihapus.</h5>
			</div>');    
			redirect('santri');
		}
	}

		public function exportExcel(){
			$data['santri']=$this->santri_model->get_all_data()->result();

			require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
			require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
			
			// require(APPPATH.'third_party/PHPExcel/PHPExcel.php');
			// require(APPPATH.'third_party/PHPExcel/PHPExcel/Writer/Excel2007.php');

			$object = new PHPExcel();
			$object->getProperties()->setCreator("data Santri");
			$object->getProperties()->setLastModifiedBy("Muchsin");
			$object->getProperties()->setTitle("Daftar Santri");

			$object->setActiveSheetIndex()->setTitle(0);

			$object->getActiveSheet()->setCellValue('A1', 'NIS');
			$object->getActiveSheet()->setCellValue('B1', 'Nama Santri');
			$object->getActiveSheet()->setCellValue('C1', 'Alamat');
			$object->getActiveSheet()->setCellValue('D1', 'Asrama');
			$object->getActiveSheet()->setCellValue('E1', 'Total Paket Diterima');

			$baris = 2;
			// $no = 1;

			foreach ($data['santri'] as $datasantri) {
				$object->getActiveSheet()->setCellValue('A'.$baris, $datasantri->NIS);
				$object->getActiveSheet()->setCellValue('B'.$baris, $datasantri->nama_santri);
				$object->getActiveSheet()->setCellValue('C'.$baris, $datasantri->alamat);
				$object->getActiveSheet()->setCellValue('D'.$baris, $datasantri->asrama_id);
				$object->getActiveSheet()->setCellValue('E'.$baris, $datasantri->total_paket_diterima);

				$baris++;
			}
			$fileName ="Data_santri".'.xlsx';
			$object->getActiveSheet()->setTitle('Data Santri');

			// echo $datasantri->total_paket_diterima.'<br>';
			header('Conten-Type: Application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Conten-Disposition: attachment;filename="'.$fileName.'"');
			header('Cache-Control: max-age=0');

			$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
			$writer->save('php://output');

			exit;
	}

	public function exportExcel2(){
		require(APPPATH.'third_party/phpoffice/vendor/autoload.php');


		$data['santri']=$this->santri_model->get_all_data()->result();

		 $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'NIS')
                      ->setCellValue('B1', 'Nama Santri')
                      ->setCellValue('C1', 'Alamat')
                      ->setCellValue('D1', 'Asrama')
                      ->setCellValue('E1', 'Total Paket Diterima');

			$kolom = 2;
         	$nomor = 1;

         foreach($data['santri'] as $datasantri) {

// echo $datasantri->NIS;
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $datasantri->NIS)
                           ->setCellValue('B' . $kolom, $datasantri->nama_santri)
                           ->setCellValue('C' . $kolom, $datasantri->alamat)
                           ->setCellValue('D' . $kolom, $datasantri->asrama_id)
                           ->setCellValue('E' . $kolom, $datasantri->total_paket_diterima);

               $kolom++;
               $nomor++;

          }
          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="Data_Santri.xlsx"');
		  header('Cache-Control: max-age=0');

		  $writer->save('php://output');
		}
}
