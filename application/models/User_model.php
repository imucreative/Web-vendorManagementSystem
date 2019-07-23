<?php
class User_model extends CI_Model{
    
	public $table	= "dtbusers";
	
	function chekLogin($username, $password){
		$this->db->where('delete',0);
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$user	= $this->db->get($this->table);
		return $user;
	}
	
	function updateProfil() {
		$userId     = $this->input->post('userId', TRUE);
		$password   = $this->input->post('password', TRUE);
		$status		= $this->input->post('status', TRUE);
		$data = array(
			'password'	=> md5($password),
			'status'	=> $status
		);
		$this->db->where('userId', $userId);
		$this->db->update($this->table, $data);
	}
	
	function chek_user($username){
		$this->db->where('delete',0);
		$this->db->where('username', $username);
		$user	= $this->db->get($this->table);
		return $user;
	}
	
	
    
}
