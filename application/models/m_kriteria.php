<?php 

class M_kriteria extends CI_Model{
	function data_kriteria(){
		return $this->db->get('kriteria');
	}

	public function jumlah_kriteria(){
		$query = $this->db->query("SELECT * FROM kriteria");
		return $query->num_rows();
	}

	function edit_kriteria($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}
