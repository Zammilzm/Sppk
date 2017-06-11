<?php
// session_start();
class C_alternatif extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// if ($this->session->userdata('username')=="") {
		// 	redirect('auth');
		// }
		$this->load->helper('text');
		$this->load->model('m_kriteria');
		$this->load->model('m_alternatif');
		$this->load->model('m_kecamatan');
		$this->load->helper('url');
	}
	public function index() {
		//$data['username'] = $this->session->userdata('username');
		$data['alternatif'] = $this->m_alternatif->tampil_lahan();
		$this->load->view('member/daftar_lahan',$data);
	}


	public function form_tambah_lahan(){
		$this->load->view('member/tambah_lahan');
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
			'status' => 'Menunggu'
			);
		$this->m_alternatif->tambah_lahan($data,'saran_lahan');
		redirect('member/c_member/daftar_lahan');
	}

	function detail($id){
		$data['alternatif'] = $this->m_alternatif->detail_lahan($id);
		$this->load->view('member/detail_lahan',$data);
	}

	function update(){
	$id = $this->input->post('id');
	$kec = $this->input->post('kec');
	$alamat = $this->input->post('alamat');
	$harga = $this->input->post('harga');
	$luas = $this->input->post('luas');
	$ketinggian = $this->input->post('ketinggian');
	$suhu = $this->input->post('suhu');
	$akses = $this->input->post('akses');

	$data = array(
		'alamat' => $alamat,
		'id_kecamatan' => $kec,
		'harga' => $harga,
		'luas' => $luas,
		'ketinggian' => $ketinggian,
		'suhu' => $suhu,
		'akses' => $akses
	);

	$where = array(
		'id_alternatif' => $id
	);

	$this->m_alternatif->update_lahan($where,$data,'alternatif');
	redirect('admin/c_alternatif');
	}

	function hapus($id){
		$where = array('id_alternatif' => $id);
		$this->m_alternatif->hapus_lahan($where,'alternatif');
		redirect('admin/c_alternatif');
	}

}
?>