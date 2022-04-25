<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Modelumum','m');
	}
	
	public function index()
	{
		$send = [
			'pengumuman'	=> $this->m->getData('pengumuman')
		];
		$this->template->load('data/template','kader/pengumuman/dataPengumuman', $send);
	}

	public function form($metode)
	{
		if($metode == 'add'){
		$this->template->load('data/template','kader/pengumuman/formPengumuman');	
		}
	}

	public function simpan($metode)
	{
		$config['upload_path'] 		= 'assets/images';
		$config['allowed_types'] 	= '*';
		$config['encrypt_name'] 	= TRUE;
		$this->load->library('upload',$config);
		if($this->upload->do_upload('Gambar')){
			$uploadData = $this->upload->data();
			$namaFile	= $uploadData['file_name'];
		}

		$send = [
			'id_kader'			=> 1,
			'tgl_pengumuman' 	=> $this->input->post('tgl_pengumuman'),
			'isi_pengumuman'	=> $this->input->post('isi_pengumuman'),
			'gambar'			=> $namaFile,
			'status'			=> $this->input->post('status')
		];

		$this->m->simpan('pengumuman',$send);
		redirect('kader/Pengumuman','refresh');


	}
}
