<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class promethee extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_alternatif');
		$this->load->helper('url');
	}

	function index(){
		$this->load->view('member/index.php');
	}
	// function index(){
	// 	$data['alternatif'] = $this->m_alternatif->data_lahan()->result();
	// 	$this->load->view('alternatif',$data);
	// }

	// public function tambah_lahan(){
	// 	$this->load->view('form_tambah_lahan');
	// }

	// public function pilih_lahan(){
	// 	$this->load->view('form_pilih_lahan');
	// }
	// public function pilihan_lahan(){
	// 	$kec = $this->input->post('kec');
	// 	$desa = $this->input->post('desa');
	// 	$ketinggian = $this->input->post('ketinggian');
	// 	$harga = $this->input->post('harga');
	// 	$luas = $this->input->post('luas');
	// 	$akses = $this->input->post('aksesJalan');
	// 	$suhu = $this->input->post('suhu');
	// 	$data['alternatif']=$this->m_alternatif->pilih_lahan($kec,$desa,$ketinggian,$harga,$luas,$akses,$suhu);
	// 	$this->load->view('pilihan_lahan',$data);
	// }
}
