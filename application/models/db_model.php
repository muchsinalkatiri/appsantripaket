<?php defined('BASEPATH') OR exit('No direct script access allowed');

class db_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  public function get_5paket()
  {
    $this->db->select('*');
    $this->db->from('data_paket');
    $this->db->order_by("tanggal_diterima");
    return $this->db->get();
  }

}