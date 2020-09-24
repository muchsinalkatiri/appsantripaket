<?php defined('BASEPATH') OR exit('No direct script access allowed');

class db_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  public function get_5paket_teratas()
  {
    $this->db->select('*');
    $this->db->from('data_paket');
    $this->db->order_by("tanggal_diterima");
    $this->db->limit(5);
    return $this->db->get();
  }


  public function get_paket_sita()
  {
    $this->db->query("SELECT COUNT(id_paket) as total_sita FROM data_paket");
     return $this->db->get();
  }


}