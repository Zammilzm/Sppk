<?php

class C_member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// if ($this->session->userdata('username')=="") {
		// 	redirect('auth');
		// }
		$this->load->helper('text');
		$this->load->model('m_alternatif');
		$this->load->model('m_kriteria');
		$this->load->model('m_kritik');
		$this->load->helper('url');
	}
	public function index() {
		$this->load->view('member/index');
	}

	public function login(){
		$this->load->view('login_form');
	}

	//form daftar lahan
	public function daftar_lahan(){
		$data['alternatif'] = $this->m_alternatif->tampil_lahan();
		$this->load->view('member/daftar_lahan',$data);
	}

	//form tambah lahan
	public function form_tambah_lahan(){
		$this->load->view('member/tambah_lahan');
	}

	//pilih lahan
	public function pilih_lahan(){
		$data['kriteria'] = $this->m_kriteria->data_kriteria()->result();
		$this->load->view('member/pilih_kriteria',$data);
		//$this->load->view('member/pilih_lahan');
	}

	//pilih kriteria 
	public function pilih_kriteria(){
		$data['kriteria'] = $this->m_kriteria->data_kriteria()->result();
		$this->load->view('member/pilih_kriteria',$data);
	}

	//tambah lahan
	public function tambah_lahan(){
		$kriteria = $this->m_kriteria->data_kriteria()->result();
		$kec = $this->input->post('kec');
		$alamat = $this->input->post('alamat');
		$ketinggian = $this->input->post('ketinggian');
		$harga = $this->input->post('harga');
		$luas = $this->input->post('luas');
		$suhu = $this->input->post('suhu');
		$akses = $this->input->post('akses');
		for ($i=0; $i < count($kriteria); $i++) { 
			if ($kriteria[$i]['kriteria']=='akses') {
				if ($akses==$kriteria[$i]['gol1']) {
					$golAkses = 1;
				} else if($akses==$kriteria[$i]['gol2']){
					$golAkses = 2;
				}else{
					$golAkses = 3;
				}
			} else if($kriteria[$i]['kriteria']=='harga') {
				if ($harga>=$kriteria[$i]['gol1']) {
					$golHarga = 1;
				} else if($harga>=$kriteria[$i]['gol2']){
					$golHarga = 2;
				}else{
					$golHarga = 3;
				}
			}else if ($kriteria[$i]['kriteria']=='suhu') {
				if ($suhu>=$kriteria[$i]['gol1']) {
					$golSuhu = 1;
				} else if($suhu>=$kriteria[$i]['gol2']){
					$golSuhu = 2;
				}else{
					$golSuhu = 3;
				}
			}else if ($kriteria[$i]['kriteria']=='luas') {
				if ($ketinggian<=$kriteria[$i]['gol1']) {
					$golLuas = 1;
				} else if($ketinggian<=$kriteria[$i]['gol2']){
					$golLuas = 2;
				}else{
					$golLuas = 3;
				}
			}else {
				if ($ketinggian<=$kriteria[$i]['gol1']) {
					$golKetinggian = 1;
				} else if($ketinggian<=$kriteria[$i]['gol2']){
					$golKetinggian = 2;
				}else{
					$golKetinggian = 3;
				}
			}
			
		}

		$data = array(
			'kecamatan' => $kec,
			'alamat' => $alamat,
			'ketinggian' => $ketinggian,
			'suhu' => $suhu,
			'akses' => $akses,
			'harga' => $harga,
			'luas' => $luas,
			'golKetinggian' => $ketinggian,
			'golSuhu' => $suhu,
			'golAkses' => $akses,
			'golHarga' => $harga,
			'golluas' => $luas
			);
		$this->m_alternatif->tambah_lahan($data,'saran_lahan');
		redirect('admin/c_admin/index');
	}

	//form kritik saran
	public function kritik_saran(){
		$this->load->view('member/saran_kritik');
	}



	//tambah lahan
	public function tambah_saran(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$kritik = $this->input->post('kritik');
		$saran = $this->input->post('saran');
		$data = array(
			'nama' => $nama,
			'email' => $email,
			'saran' => $saran,
			'kritik' => $kritik
			);
		$this->m_kritik->tambah_kritik($data,'kritikSaran');
		redirect('member/C_member/index');
	}

	public function logout() {
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('level');
		// session_destroy();
		// redirect('auth');

	}
}
?>