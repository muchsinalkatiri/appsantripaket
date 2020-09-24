<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	$this->db->select('data_santri.*, data_asrama.gedung,  data_asrama.nama_asrama');
    $this->db->from('data_santri');
    $this->db->join('data_asrama', 'data_santri.asrama_id = data_asrama.id_asrama', 'left');
    return $this->db->get();
    // return $this->db->get('data_santri');
  }

  public function get_data_by_id($nis)
  {
         // Inner Join dengan table Categories
    $this->db->get('data_santri');

    $query = $this->db->get_where('data_santri', array('data_santri.nis' => $nis));

    return $query->row();
  }

  public function get_asrama()
  {
      $this->db->select('*');
      $this->db->from('data_asrama');
      return $this->db->get();
  }

  public function create($table, $data){
    if ($this->db->insert($table,$data)) {
      return true;
    }else{
      return false;
    }
  }

  public function update($where,$data,$table){
    if($this->db->update($table, $data, $where)){
      return true;
    }else{
      return false;
    }
  } 

  public function delete($where,$table){
    $this->db->where($where);
    if ($this->db->delete($table)) {
      return true;
    }else{
      return false;
    }
  }

     // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './uploads/excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;

    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

    public function insert_multiple($data){
    if($this->db->insert_batch('data_santri', $data)){
      return true;
    }else{
      return false;
    }
  }


}