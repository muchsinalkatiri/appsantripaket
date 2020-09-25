<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data_masuk() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	$this->db->select('data_paket.*, data_kategori_paket.*,  data_santri.nama_santri as nama_santri, data_santri.NIS as nis, data_asrama.nama_asrama as nama_asrama, data_asrama.gedung as gedung');
    $this->db->from('data_paket');
    $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
    $this->db->join('data_santri', 'data_paket.penerima_paket_id = data_santri.nis', 'left');
    $this->db->join('data_asrama', 'data_paket.asrama_id = data_asrama.id_asrama', 'left');
    $this->db->where('status_paket', 'Belum Diambil');
    return $this->db->get();
    // return $this->db->get('data_santri');
  }
  function get_all_data_keluar() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

    $this->db->select('data_paket.*, data_kategori_paket.*,  data_santri.nama_santri as nama_santri, data_santri.NIS as nis, data_asrama.nama_asrama as nama_asrama, data_asrama.gedung as gedung');
    $this->db->from('data_paket');
    $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
    $this->db->join('data_santri', 'data_paket.penerima_paket_id = data_santri.nis', 'left');
    $this->db->join('data_asrama', 'data_paket.asrama_id = data_asrama.id_asrama', 'left');
    $this->db->where('status_paket', 'Diambil');
    $this->db->or_where('status_paket', 'Disita');
    return $this->db->get();
    // return $this->db->get('data_santri');
  }

  public function get_data_by_id($id_paket)
  {
         // Inner Join dengan table Categories
    $this->db->get('data_paket');

    $query = $this->db->get_where('data_paket', array('data_paket.id_paket' => $id_paket));

    return $query->row();
  }

  public function get_kategori()
  {
      $this->db->select('*');
      $this->db->from('data_kategori_paket');
      return $this->db->get();
  }
  public function get_santri()
  {
      $this->db->select('nis,nama_santri');
      $this->db->from('data_santri');
      return $this->db->get();
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


}