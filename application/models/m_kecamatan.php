<?php 

class M_kecamatan extends CI_Model{
	function data_kec(){
		return $this->db->get('kecamatan');
	}
}