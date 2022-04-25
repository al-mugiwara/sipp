<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Modelumum','m');
	}
	
	public function index()
	{
		$send = [
			'balita'	=> $this->db->select('*')->from('tabel_user')->join('tb_balita', 'tabel_user.id_user=tb_balita.id_user')->get()
		];
		$this->template->load('data/template','kader/balita/dataBalita', $send);
	}

	public function form($metode)
	{
		if($metode == 'add'){
		$this->template->load('data/template','kader/balita/formBalita');	
		} else if($metode =='edit'){
			$send ['data']= $this->db->select('*')->from('tabel_user')->join('tb_balita', 'tabel_user.id_user=tb_balita.id_user')->where('tabel_user.id_user',$this->uri->segment(5))->get()->row();
			$this->template->load('data/template','kader/balita/formBalita', $send);
		}
	}
	public function simpan($metode)
	{
		$send = [
			'nama' 			=> $this->input->post('nama'),
			'password' 		=> md5($this->input->post('password')),
			'alamat' 		=> $this->input->post('alamat'),
			'no_hp' 		=> $this->input->post('noHp'),
			'tgl_lahir'	 	=> $this->input->post('tanggalLahir'),
			'hak_akses' 	=> 'bl',
			'jenis_kelamin' => $this->input->post('jeniskelamin'),
			'username' 		=> $this->input->post('username'),
			'instansi' 		=> 'Non Instansi',
			'jabatan' 		=> 'Balita'
		];
		$send2=[
		 		'nama_ayah'		=> $this->input->post('namaAyah'),
		 		'nama_ibu'		=> $this->input->post('namaIbu'),
		 		'tempat_lahir'	=> $this->input->post('tempatLahir'),
		 		'berat_lahir'	=> $this->input->post('beratLahir'),
		 		'anak_ke'		=> $this->input->post('anakKe'),
		 		'status_kia'	=> $this->input->post('statusKia'),
		 	];
		 if ($metode=='add'){
		 	$this->m->simpan('tabel_user', $send);
		 	$send2['id_user'] = $this->db->insert_id();
		 	$this->m->simpan('tb_balita',$send2);
		 	$session['berhasil'] = "Data Balita Berhasil Disimpan";
		 	$this->session->set_userdata($session);
		 } else if ($metode == 'edit'){
		 	$this->m->simpanEdit('tabel_user','id_user',$this->uri->segment(5),$send);
		 	$this->m->simpanEdit('tb_balita','id_user',$this->uri->segment(5),$send2);
		 	$session['berhasil'] = "Data Balita Berhasil Disimpan";
		 	$this->session->set_userdata($session);
		 }

		 redirect('kader/Balita', 'refresh');
	}

	public function hapus($id_user){
		$this->m->hapus('tabel_user','id_user',$id_user);
		$this->m->hapus('tb_balita','id_user',$id_user);
		echo json_encode(['status'=> TRUE]);
	}
}
