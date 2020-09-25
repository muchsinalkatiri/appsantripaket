<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('user_model');
		// $this->load->helper('MY');

	}

	public function data_user()
	{

		$data['page_title'] = 'Data user';

		$data['user']=$this->user_model->get_all_data()->result();

		$this->load->view('v_user/list_user',$data);
		
	}
	public function role()
	{

		$data['page_title'] = 'Data Role';

		$data['user']=$this->user_model->get_role()->result();
// print_r($data['user']);
		$this->load->view('v_user/list_role',$data);
		
	}

	public function delete_user($id_user=null){
		if(!$this->session->userdata('logged_in')) 
			redirect();
		
		$where = array('id_user' => $id_user);
		$delete = $this->user_model->delete($where,'data_user');
		if ($delete) {
			$this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Data Berhasil Dihapus.</h5>
			</div>');    
			redirect('user/data_user');

		}else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Data Gagal Dihapus.</h5>
			</div>');    
			redirect('user/data_user');
		}
	}

	public function exportExcel2(){
		require(APPPATH.'third_party/phpoffice/vendor/autoload.php');


		$data['user']=$this->user_model->get_all_data()->result();

		 $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'Nama User')
                      ->setCellValue('B1', 'Username')
                      ->setCellValue('C1', 'Nama Role')
                      ->setCellValue('D1', 'Menu');

			$kolom = 2;
         	$nomor = 1;

         foreach($data['user'] as $datauser) {

// echo $datasantri->NIS;
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $datauser->nama_user)
                           ->setCellValue('B' . $kolom, $datauser->username)
                           ->setCellValue('C' . $kolom, $datauser->nama_role)
                           ->setCellValue('D' . $kolom, $datauser->menu);

               $kolom++;
               $nomor++;

          }
          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="Data_user.xlsx"');
		  header('Cache-Control: max-age=0');

		  $writer->save('php://output');
		}


	public function create_user()
	{
		$data['page_title'] = 'Tambah Data Santri';
		// Must login

		$data['user']=$this->user_model->get_role()->result();


		$this->form_validation->set_rules('nama_user','Nama User','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));
		$this->form_validation->set_rules('username','Username','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));
		$this->form_validation->set_rules('password','Password','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_user/create_user',$data);
		}
		else{
			$nama_user= $this->input->post('nama_user');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$role_id = $this->input->post('nama_role');

			$data = array(
				'nama_user'=>$nama_user,
				'username' => $username,
				'password'=> $password,
				'level'=> '0',
				'role_id' => $role_id,
				);
			$insert = $this->user_model->create('data_user',$data);

			if ($insert) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Data berhasil ditambahkan.</h5>
				</div>');    
				redirect('user/data_user');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> Data gagal ditambahkan.</h5>
				</div>');    
				redirect('user/data_user');
			}	
		}
	}

	public function update_user($id_user = NULL)
	{
		$data['page_title'] = 'Edit Data User';
		// Must login

		$where = array('id_user' => $id_user);
		$data['datauser']=$this->user_model->get_data_by_id($id_user);

		$data['role']=$this->user_model->get_role()->result();

		$this->form_validation->set_rules('nama_user','Nama User','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));
		$this->form_validation->set_rules('username','Username','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));
		$this->form_validation->set_rules('password','Password','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));


		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_user/update_user',$data);
		}
		else{
			$nama_user= $this->input->post('nama_user');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$role_id = $this->input->post('nama_role');

			$data = array(
				'nama_user'=>$nama_user,
				'username' => $username,
				'password'=> $password,
				'level'=> '0',
				'role_id' => $role_id,
				);
			$where = array(
				'id_user' => $id_user
				);

			// echo $this->input->post('nis');

			$update = $this->user_model->update($where,$data,'data_user');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Data berhasil di perbarui.</h5>
				</div>');    
				redirect('user/data_user');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> Data gagal disimpan.</h5>
				</div>');    
				redirect('user/data_user');
			}	
		}
	}
		public function update_role($id_role = NULL)
	{
		$data['page_title'] = 'Edit Data Role';
		// Must login

		$where = array('id_role' => $id_role);
		$data['role']=$this->user_model->get_role_by_id($id_role);

		// $data['role']=$this->user_model->get_role()->result();

		$this->form_validation->set_rules('nama_role','Nama Role','required',
			array(
				'required'=>'Form ini Wajib di isi.',
				));



		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_user/update_role',$data);
		}
		else{
			$hak1= $this->input->post('hak1');
			$hak2= $this->input->post('hak2');
			$hak3= $this->input->post('hak3');
			$hak4= $this->input->post('hak4');
			$hak5= $this->input->post('hak5');
			$hak6= $this->input->post('hak6');
			$hak7= $this->input->post('hak7');

			if($hak1 != ''){
				$hak1= $this->input->post('hak1').',';
			}
			if($hak2 != ''){
				$hak2= $this->input->post('hak2').',';
			}
			if($hak3 != ''){
				$hak3= $this->input->post('hak3').',';
			}
			if($hak4 != ''){
				$hak4= $this->input->post('hak4').',';
			}
			if($hak5 != ''){
				$hak5= $this->input->post('hak5').',';
			}
			if($hak6 != ''){
				$hak6= $this->input->post('hak6').',';
			}
			if($hak7 != ''){
				$hak7= $this->input->post('hak7').',';
			}

			$menu = $hak1.''.$hak2.''.$hak3.''.$hak4.''.$hak5.''.$hak6.''.$hak7;


		$data = array(
				'menu'=>$menu,
				);
			$where = array(
				'id_role' => $id_role
				);

			// echo $this->input->post('nis');

			$update = $this->user_model->update($where,$data,'role');

			if ($update) {
				$this->session->set_flashdata('msg',
					'<div class="alert alert-success">
					<h5> <span class=" fa fa-check" ></span> Data berhasil di perbarui.</h5>
				</div>');    
				redirect('user/role');
			}else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger">
					<h5> <span class=" fa fa-cross" ></span> Data gagal disimpan.</h5>
				</div>');    
				redirect('user/role');
			}	
		}
	}
}