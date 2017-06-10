<?php 

class M_akses extends CI_Model{
	function data_akses(){
		return $this->db->get('akses');
	}
}