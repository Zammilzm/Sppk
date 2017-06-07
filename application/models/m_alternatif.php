<?php 

class M_alternatif extends CI_Model{
	function data_lahan(){
		return $this->db->get('alternatif');
	}

	function saran_lahan(){
		$this->db->select('*');
		$this->db->from('saran_lahan');
		$this->db->join('kecamatan', 'saran_lahan.id_kecamatan = kecamatan.id');
		return $this->db->get();
	}

	function tampil_lahan(){
		$this->db->select('*');
		$this->db->from('saran_lahan');
		$this->db->join('kecamatan', 'saran_lahan.id_kecamatan = kecamatan.id');
		$this->db->where('status','Disetujui');
		$query = $this->db->get();
		return $query->result(); 
	}

	public function jumlah_lahan(){
		$query = $this->db->query("SELECT * FROM alternatif");
		return $query->num_rows();
	}

	function tambah_lahan($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_lahan($where,$table){	
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->join('kecamatan', 'alternatif.id_kecamatan = kecamatan.id');
		$this->db->where('id_alternatif',$where);
		$query = $this->db->get();
		return $query->result(); 	
	}
	
	function detail_lahan($id){	
		$this->db->select('*');
		$this->db->from('alternatif');
		$this->db->join('kecamatan', 'alternatif.id_kecamatan = kecamatan.id');
		$this->db->where('id_alternatif',$id);
		$query = $this->db->get();
		return $query->result(); 	
	}
	function update_lahan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	


	function detail_verifikasi($id){	
		$this->db->select('*');
		$this->db->from('saran_lahan');
		$this->db->join('kecamatan', 'saran_lahan.id_kecamatan = kecamatan.id');
		$this->db->where('id_saran',$id);
		$query = $this->db->get();
		return $query->result(); 	
	}

	//untuk lahan yang di filter dulu
	public function cari_lahan($luas,$harga,$ketinggian,$suhu,$akses){
		$this->db->select('*');
		$this->db->from('saran_lahan');
		$this->db->join('kecamatan', 'saran_lahan.id_kecamatan = kecamatan.id');
		$this->db->where('golKetinggian',$ketinggian);
		$this->db->where('golSuhu ',$suhu);
		$this->db->where('golHarga',$harga);
		$this->db->where('golLuas ',$luas);
		$this->db->where('golAkses',$akses);
		$query = $this->db->get();
		return $query->result();
	}

	function hapus_lahan($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// public function jumlah_alternatif($kec,$akses,$ketinggian,$suhu,$curahHujan){
	// 	$this->db->select('*');
	// 	$this->db->from('alternatif');
	// 	$this->db->where('kecamatan',$kec);
	// 	$this->db->where('ketinggian >',$ketinggian);
	// 	//$this->db->where('suhu >',$suhu);
	// 	$this->db->where('curah_hujan >',$curahHujan);
	// 	$this->db->where('akses_jalan',$akses);
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
	// }
}
