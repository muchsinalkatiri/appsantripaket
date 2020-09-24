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

  public function get_data_by_id($id)
  {
         // Inner Join dengan table Categories
    $this->db->get('data_santri');

    $query = $this->db->get_where('data_santri', array('data_santri.id_santri' => $id));

    return $query->row();
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

}