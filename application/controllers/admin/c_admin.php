<?php

class C_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("login"));
		// }
		$this->load->helper('text');
		$this->load->model('m_saranLahan');
		$this->load->model('m_alternatif');
		$this->load->model('m_kriteria');
		$this->load->model('m_kritik');
		$this->load->helper('url');
	}
	public function index() {
		//$data['username'] = $this->session->userdata('username');
		$data['alternatif'] = $this->m_alternatif->tampil_lahan();
		$this->load->view('admin/index',$data);
	}


	public function form_tambah_lahan(){
		$this->load->view('admin/tambah_lahan');
	}

	public function daftar_verifikasi(){
		$data['alternatif'] = $this->m_saranLahan->data_lahan();
		$this->load->view('admin/verifikasi_lahan',$data);
	}
	public function kriteria(){
		$data['kriteria'] = $this->m_kriteria->data_kriteria()->result();
		$this->load->view('admin/kriteria',$data);
	}

	public function kritik(){
		$data['kritik'] = $this->m_kritik->data_kritik()->result();
		$this->load->view('admin/kritik_saran',$data);
	}

	public function preferensi(){
		$data['kriteria'] = $this->m_kriteria->data_kriteria();
		$this->load->view('admin/verifikasi_lahan',$data);
	}


	public function tambah_lahan(){
		$kriteria = $this->m_kriteria->data_kriteria()->result();
		$kec = $this->input->post('kec');
		$alamat = $this->input->post('alamat');
		$ketinggian = $this->input->post('ketinggian');
		$harga = $this->input->post('harga');
		$luas = $this->input->post('luas');
		$suhu = $this->input->post('suhu');
		$akses = $this->input->post('akses');
	
		
		$data = array(
			'id_kecamatan' => $kec,
			'alamat' => $alamat,
			'ketinggian' => $ketinggian,
			'suhu' => $suhu,
			'akses' => $akses,
			'harga' => $harga,
			'luas' => $luas,
			'status' => 'Disetujui'
			);
		$this->m_alternatif->tambah_lahan($data,'saran_lahan');
		redirect('admin/c_admin/index');
	}

	public function logout() {
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('level');
		// session_destroy();
		// redirect('auth');

	}
}
?>