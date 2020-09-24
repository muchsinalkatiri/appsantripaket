<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->model('laporan_model');
		// $this->load->helper('MY');

	}

	public function index()
	{

		$data['page_title'] = 'Backup, Restore, Custom';


		$this->load->view('v_setting/first',$data);
		
	}

	public function Backup(){
		 $this->load->dbutil();

        $prefs = array(     
            'format'      => 'sql',             
            'filename'    => "apptazkia".date("Ymd-His").'.sql'
            );

        $backup =& $this->dbutil->backup($prefs); 

        $db_name = "apptazkia".date("Ymd-His") .'.sql';
        $save = FCPATH.'assets/db/'.$db_name;
        $this->load->helper('file');
        write_file($save, $backup); 


        $this->load->helper('download');
        force_download($db_name, $backup);

	}

	public function Custom(){
		$custom_query= $this->input->post('custom_query');

		if ($this->db->query($custom_query)) {
	      $this->session->set_flashdata('msg',
				'<div class="alert alert-success">
				<h5> <span class=" fa fa-check" ></span> Query Berhasil dieksekusi.</h5>
			</div>');    
			redirect('setting');
	    }else{
	      $this->session->set_flashdata('msg',
				'<div class="alert alert-danger">
				<h5> <span class=" fa fa-cross" ></span> Query gagal di eksekusi.</h5>
			</div>');    
			redirect('setting');
	    }
	}
	
}