<?php

Class Login extends CI_Model {

// Insert registration data in database
	public function signup($data) {

// Query to check whether username already exist or not
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$data['user_name']);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

// Query to insert data in database
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

// Read data using username and password
	public function login($data) {

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

// Read data from database to show data in admin page
	public function read_user_information($username) {


		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

}

?>