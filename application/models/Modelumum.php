<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelumum extends CI_Model {

  function getData($tabel)
  {
  	$this->db->select('*');
  	$this->db->from($tabel);
  	$query = $this->db->get();
  	return $query;
  }

  function simpan($tabel,$data)
  {
  	$this->db->insert($tabel,$data);
  } 

  function edit($tabel,$where,$id)
  {
  	$this->db->from($tabel);
  	$this->db->where($where,$id);
  	$query = $this->db->get();
  	return $query;
  }

  function simpanEdit($tabel,$where,$id,$data)
  {
  	$this->db->where($where,$id);
  	$this->db->update($tabel,$data);
  }

  function hapus($tabel,$where,$id)
  {
    $this->db->where($where,$id);
    $this->db->delete($tabel);
  }


 
	

}

/* End of file Modelumum.php */
/* Location: ./application/models/Modelumum.php */