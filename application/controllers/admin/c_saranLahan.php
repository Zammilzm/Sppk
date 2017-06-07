<?php
session_start();
class C_saranLahan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('text');
		$this->load->model('m_alternatif');
		$this->load->model('m_kecamatan');
		$this->load->model('m_saranLahan');
		$this->load->helper('url');
	}
	public function index() {
		$data['alternatif'] = $this->m_saranLahan->data_lahan();
		$this->load->view('admin/verifikasi_lahan',$data);
	}

	public function detail_verifikasi($id){
		$data['alternatif'] = $this->m_saranLahan->detail_verifikasi($id);
		$this->load->view('admin/detail_verifikasi',$data);
	}

	public function verifikasi($id,$status){
		// echo $id;
		// echo "<br>".$status;
		//ubah status lahan
		$data = array('status' => $status);
		$where = array('id_alternatif' => $id);
		$this->m_saranLahan->verifikasi_lahan($where,$data,'saran_lahan');

		//tambah lahan ke tabel alternatif jika sudah disetujui
		if ($status=='disetujui') {
			echo $id;
			$data = $this->m_saranLahan->data_verifikasi($id);
			$data = array(
				'id_kecamatan' => $data[0]['id_kecamatan'],
				'alamat' => $data[0]['alamat'],
				'ketinggian' => $data[0]['ketinggian'],
				'suhu' => $data[0]['suhu'],
				'akses' => $data[0]['akses'],
				'harga' => $data[0]['harga'],
				'luas' => $data[0]['luas']
				);
			$this->m_alternatif->tambah_lahan($data,'alternatif');
		}

		redirect('admin/c_saranLahan');

	}
}
?>