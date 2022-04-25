<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bumil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Modelumum','m');	
	}

	public function index()
	{
		$send = [
			'bumil'		=> $this->db->select('*')->from('tabel_user')->join('tb_bumil','tabel_user.id_user=tb_bumil.id_user')->get()
		];
		$this->template->load('data/template','kader/bumil/dataBumil',$send);
	}

	public function form($metode){
		if($metode == 'add'){
			$this->template->load('data/template','kader/bumil/formBumil');
		}else if($metode =='edit'){
			$send['data'] = $this->db->select('*')->from('tabel_user')->join('tb_bumil','tabel_user.id_user=tb_bumil.id_user')->where('tabel_user.id_user',$this->uri->segment(5))->get()->row();
			$this->template->load('data/template','kader/bumil/formBumil',$send);
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
			'hak_akses'		=> 'bm',
			'jenis_kelamin'	=> 'p',
			'username'		=> $this->input->post('username'),
			'instansi'		=> 'Non Instansi',
			'jabatan'		=> "Ibu Hamil"
		];
		$send2=[
			'nama_suami'	=> $this->input->post('namaSuami'),
			'pendidikan'	=> $this->input->post('pendidikan'),
			'agama'			=> $this->input->post('agama'),
			'goldar'		=> $this->input->post('goldar'),
			'pekerjaan'		=> $this->input->post('pekerjaan'),
			'status_kia'	=> $this->input->post('statusKia'),
		];

		if($metode == 'add'){
			$this->m->simpan('tabel_user',$send);
			$send2['id_user'] = $this->db->insert_id();
			$this->m->simpan('tb_bumil',$send2);
			$session['berhasil'] = "Data Ibu Hamil Berhasil Disimpan";
			$this->session->set_userdata($session);
		}else if($metode == 'edit'){
			$this->m->simpanEdit('tabel_user','id_user',$this->uri->segment(5),$send);
			$this->m->simpanEdit('tb_bumil','id_user',$this->uri->segment(5),$send2);
			$session['berhasil'] = "Data Ibu Hamil Berhasil Diedit";
			$this->session->set_userdata($session);
		}

		redirect('kader/Bumil','refresh');
	}

	public function hapus($idUser)
	{
		$this->m->hapus('tabel_user','id_user',$idUser);
		$this->m->hapus('tb_bumil','id_user',$idUser);
		echo json_encode(['status' => TRUE]);
	}

	public function simpanhamil()
	{
		$send = [
			'id_bumil'	=> $this->input->post('idUser'),
			'hamil_ke'	=> $this->input->post('hamilke')		
		];
		$this->m->simpan('tb_hamil',$send);
		$session['berhasil'] = "Data Kehamilan Berhasil Disimpan";
		$this->session->set_userdata($session);
		redirect('kader/Bumil');
	}
}
