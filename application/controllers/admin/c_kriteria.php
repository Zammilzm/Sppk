<?php
session_start ();
class C_kriteria extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// if ($this->session->userdata('username')=="") {
		// 	redirect('auth');
		// }
		$this->load->helper('text');
		$this->load->model('m_kriteria');
		$this->load->model('m_alternatif');
		$this->load->helper('url');
	}
	public function index() {
		//$data['username'] = $this->session->userdata('username');
		$data['kriteria'] = $this->m_kriteria->data_kriteria()->result();
		$this->load->view('admin/kriteria',$data);
	}


	public function form_tambah_kriteria(){
		$this->load->view('admin/tambah_kriteria');
	}

	public function ubah_kriteria(){
		$id = $this->input->post('id');
		$kriteria = $this->input->post('kriteria');
		$bobot = $this->input->post('bobot');
		$tipe = $this->input->post('tipe');
		$min_max = $this->input->post('minmax');
		$p = $this->input->post('p');
		$q = $this->input->post('q');
		$g = $this->input->post('g');
		$gol1 = $this->input->post('gol1');
		$gol2 = $this->input->post('gol2');
		$gol3 = $this->input->post('gol3');
		$data = array(
			'kriteria' => $kriteria,
			'bobot' => $bobot,
			'min_max' => $min_max,
			'tipe_preferensi' => $tipe,
			'p' => $p,
			'q' => $q,
			'g' => $g,
			'gol1' => $gol1,
			'gol2' => $gol2,
			'gol3' => $gol3
			);
		$where = array(
		'id_kriteria' => $id
	);

		$this->m_kriteria->update($where,$data,'kriteria');
		redirect('admin/c_kriteria');
	}

	function edit($id){
		$where = array('id_kriteria' => $id);
		$data['kriteria'] = $this->m_kriteria->edit_kriteria($where,'kriteria')->result();
		$this->load->view('admin/ubah_kriteria',$data);
	}

	public function logout() {
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('level');
		// session_destroy();
		// redirect('auth');

	}
}
?>