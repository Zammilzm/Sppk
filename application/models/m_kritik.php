<?php 

class M_kritik extends CI_Model{
	function data_kritik(){
		return $this->db->get('kritiksaran');
	}

	function tambah_kritik($data,$table){
		$this->db->insert($table,$data);
	}

}
