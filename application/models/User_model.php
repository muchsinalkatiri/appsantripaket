<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	$this->db->select('*');
    $this->db->from('data_user');
    $this->db->join('role', 'data_user.role_id = role.id_role', 'left');
    return $this->db->get();
    // return $this->db->get('data_santri');
  }

  public function get_data_by_id($id_user)
  {
         // Inner Join dengan table Categories
    $this->db->get('data_user');

    $query = $this->db->get_where('data_user', array('data_user.id_user' => $id_user));

    return $query->row();
  }

  public function get_role_by_id($id_role)
  {
         // Inner Join dengan table Categories
    $this->db->get('role');

    $query = $this->db->get_where('role', array('role.id_role' => $id_role));

    return $query->row();
  }

  public function get_role()
  {
      $this->db->select('*');
      $this->db->from('role');
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