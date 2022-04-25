<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vitamin extends CI_Controller {

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
		$this->template->load('data/template','kader/kegiatan/formVitamin', $send);
	}

	public function cekBalita($balita)
	{
		$send = [
			'balita' => $this->db->select('*')->from('tabel_user')->join('tb_balita','tabel_user.id_user = tb_balita.id_user')->where('tabel_user.id_user',$balita)->get()->row()
		];
		// tanggal lahir
		$tanggal = new DateTime($send['balita']->tgl_lahir);
		// tanggal hari ini
		$today = new DateTime('today');
		// tahun
		$y = $today->diff($tanggal)->y;
		// bulan
		$m = $today->diff($tanggal)->m;
		// hari
		$d = $today->diff($tanggal)->d;
		$bl = $y*24;
		$usia = $m+$bl;
		$send['usia'] = $usia;
		
		echo json_encode($send);
	}

	public function simpan()
	{
		$send = [
			'id_balita' 		=> $this->input->post('balita'),
			'id_kader'			=> '1',
			'umur'				=> $this->input->post('umur'),
			'jenis_vitamin'		=> $this->input->post('vitamin'),
			'tgl_diberikan'		=> $this->input->post('tglPemberian'),
			'keterangan'		=> $this->input->post('keterangan')
		];

		$this->m->simpan('tb_vitamin',$send);
		$session['berhasil'] = "Data Pemberian Vitamin Berhasil Disimpan";
		$this->session->set_userdata($session);
		redirect('kader/Vitamin');
	}


}
