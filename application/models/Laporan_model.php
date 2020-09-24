<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}


  function get_all_data() { //ambil data mahasiswa dari table barang yang akan di generate ke datatable

  	$this->db->select('data_paket.*, data_kategori_paket.*,  data_santri.nama_santri as nama_santri, data_santri.NIS as nis, data_asrama.nama_asrama as nama_asrama, data_asrama.gedung as gedung');
    $this->db->from('data_paket');
    $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
    $this->db->join('data_santri', 'data_paket.penerima_paket_id = data_santri.nis', 'left');
    $this->db->join('data_asrama', 'data_paket.asrama_id = data_asrama.id_asrama', 'left');
        	// $this->db->where(' tanggal_diterima >= date(2020-09-04)');
		// $this->db->where('tanggal_diterima >=','2020-09-04');
    return $this->db->get();
    // return $this->db->get('data_santri');
  }

  function get_data_antara_tanggal($tgl1,$tgl2){
  	$this->db->select('data_paket.*, data_kategori_paket.*,  data_santri.nama_santri as nama_santri, data_santri.NIS as nis, data_asrama.nama_asrama as nama_asrama, data_asrama.gedung as gedung');
    $this->db->from('data_paket');
    $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
    $this->db->join('data_santri', 'data_paket.penerima_paket_id = data_santri.nis', 'left');
    $this->db->join('data_asrama', 'data_paket.asrama_id = data_asrama.id_asrama', 'left');
    $this->db->where('tanggal_diterima >=', $tgl1);
    $this->db->where('tanggal_diterima <=', $tgl2);
    	// $this->db->where(' tanggal_diterima >= date(2020-09-04)');
		// $this->db->where( 'tanggal_diterima <= date(2020-09-29)');
    	// $this->db->where_between("tanggal_diterima, 2020-09-04, 2020-09-29");
    // $this->db->join('data_asrama', 'data_santri.asrama_id = data_asrama.id_asrama', 'left');
    return $this->db->get();
  }

  function get_jumlah_kategori(){
  	$this->db->select('COUNT(kategori_paket_id) as jumlah, nama_kategori, id_kategori');
    $this->db->from('data_paket');
    $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
        	// $this->db->where(' tanggal_diterima >= date(2020-09-04)');
		$this->db->group_by('kategori_paket_id');
    return $this->db->get();
  }

    public function get_data_paket_by_kategori($id_kategori)
  {
         // Inner Join dengan table Categories
  	$this->db->select('*');
    $this->db->from('data_paket');
    // $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
        	
    $this->db->where('kategori_paket_id ', $id_kategori);
    return $this->db->get();
  }
    public function get_data_paket_by_status_disita()
  {
         // Inner Join dengan table Categories
  	$this->db->select('*');
    $this->db->from('data_paket');
    // $this->db->join('data_kategori_paket', 'data_paket.kategori_paket_id = data_kategori_paket.id_kategori', 'left');
        	
    $this->db->where('status_paket' , 'Disita' );
    return $this->db->get();
  }
}