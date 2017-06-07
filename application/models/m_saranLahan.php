<?php 

class M_saranLahan extends CI_Model{

	//daftar lahan saran dari user
	function data_lahan(){
		$this->db->select('*');
		$this->db->from('saran_lahan');
		$this->db->join('kecamatan', 'saran_lahan.id_kecamatan = kecamatan.id');
		$this->db->where('status','Menunggu');
		$query = $this->db->get();
		return $query->result(); 
	}

	//penambahan sraan lahan oleh user
	function tambah_lahan($data,$table){
		$this->db->insert($table,$data);
	}

	//detail data lahan untuk admin
	function detail_verifikasi($id){	
		$this->db->select('*');
		$this->db->from('saran_lahan');
		$this->db->join('kecamatan', 'saran_lahan.id_kecamatan = kecamatan.id');
		$this->db->where('id_alternatif',$id);
		$query = $this->db->get();
		return $query->result(); 	
	}


	//verifikasi lahan oleh admin
	function verifikasi_lahan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	


}
