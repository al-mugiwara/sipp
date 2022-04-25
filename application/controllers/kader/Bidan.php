<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Modelumum','m');	
	}

	public function index()
	{
		$send = [
			'bidan'		=> $this->m->getData('tabel_user')
		];
		$this->template->load('data/template','kader/bidan/dataBidan',$send);
	}

	public function form($metode){
		if($metode == 'add'){
			$this->template->load('data/template','kader/bidan/formBidan');
		}else if($metode =='edit'){
			$send['data'] = $this->m->edit('tabel_user','id_user',$this->uri->segment(5))->row();
			$this->template->load('data/template','kader/bidan/formBidan',$send);
		}
	}

	public function simpan($metode)
	{
		$send = [
			'nama'     		=> $this->input->post('nama'),
			'password' 		=> md5($this->input->post('password')),
			'alamat'   		=> $this->input->post('alamat'),
			'no_hp'	   		=> $this->input->post('noHp'),
			'tgl_lahir'		=> $this->input->post('tglLahir'),
			'hak_akses'		=> 'b',
			'jenis_kelamin'	=> $this->input->post('jenisKelamin'),
			'username'		=> $this->input->post('username'),
			'instansi'		=> $this->input->post('instansi'),
			'jabatan'		=> "Bidan"
		];

		if($metode == 'add'){
			$this->m->simpan('tabel_user',$send);
			$session['berhasil'] = "Data Bidan Berhasil Disimpan";
			$this->session->set_userdata($session);
		}else if($metode == 'edit'){
			$this->m->simpanEdit('tabel_user','id_user',$this->uri->segment(5),$send);
			$session['berhasil'] = "Data Bidan Berhasil Diedit";
			$this->session->set_userdata($session);
		}

		redirect('kader/Bidan','refresh');
	}

	public function hapus($idUser){
		$this->m->hapus('tabel_user','id_user',$idUser);
		echo json_encode(['status' => TRUE]);
	}
}
