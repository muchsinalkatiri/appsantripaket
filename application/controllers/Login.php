<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));

		$this->load->model('login_model');
		$this->load->library('form_validation');
		// $this->load->helper('MY');

	}

	public function index(){

		$data['page_title'] = 'Log In Mahasiswa';

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('v_home/v_login');
		} else {
			
			// Get username
			$username = $this->input->post('username');
			// Get & encrypt password
			$password = md5($this->input->post('password'));

			// Login user
			$cek_user = $this->login_model->login('data_user', array('username' => $username), array('password' => $password));
			if($cek_user != FALSE){
				foreach ($cek_user as $apps) {
					$session_data = array(
						'id_user' => $apps->id_user,
						'username' => $apps->username,
						'password' => $apps->password,
						'username' => $apps->username,
						'level' => $apps->level,
						'logged_in' => true,
						);
					$this->session->set_userdata($session_data);
					redirect('dashboard');
				}
			}

			else {
				// Set message
				$this->session->set_flashdata('msg','
					<div class="col-sm-12" >
						<div id="notifications">
							<div  class="text-xs font-weight-bold text-danger text-uppercase mb-1">Username atau Password yang anda masukan salah</div>
						</div>
					</div>');    

				redirect('login');
			}		
		}
	}

	public	function logout(){
		$this->session->sess_destroy();
		redirect();
	}

}
