<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemBumil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Modelumum','m');
	}
	
	public function index()
	{
		$send = [
			'bumil' => $this->db->select('*')->from('tabel_user')->join('tb_bumil','tabel_user.id_user = tb_bumil.id_user')->get()
		];
		$this->template->load('data/template','kader/kegiatan/formPemBumil', $send);
	}

	public function cekBumil($bumil)
	{
		$send = [
			'bumil' => $this->db->select('*')->from('tabel_user')->join('tb_bumil','tabel_user.id_user = tb_bumil.id_user')->where('tabel_user.id_user',$bumil)->get()->row()
		];
			
		echo json_encode($send);
	}

	public function simpan()
	{
		$send = [
			'id_balita' 			=> $this->input->post('balita'),
			'id_kader'				=> '1',
			'umur'					=> $this->input->post('umur'),
			'tgl_pemeriksaan'		=> $this->input->post('tglPemeriksaan'),
			'panjang_badan'			=> $this->input->post('panjangBadan'),
			'lingkar_kepala'		=> $this->input->post('lingkarKepala'),
			'berat_badan'			=> $this->input->post('beratBadan'),
			'status_penimbangan'	=> $this->input->post('statusPenimbangan'),
			'keterangan'			=> $this->input->post('keterangan')
		];

		$this->m->simpan('pem_balita',$send);
		$session['berhasil'] = "Data Pemeriksaan Balita Berhasil Disimpan";
		$this->session->set_userdata($session);
		redirect('kader/PemBalita');
	}


}
