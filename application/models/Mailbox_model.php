<?php

class Mailbox_model extends Ci_Model{
    
    public $table	= 'dtremail';
    

    //==================================================================================================
    
    function selectAll(){
		$this->db->where('delete', 0);
		$this->db->order_by('id', 'DESC');
		$query	= $this->db->get($this->table);
		return $query;
    }

    public function simpan($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function getEmailById($id){
		$this->db->where('id', $id);
		$query	= $this->db->get($this->table);
		return $query;
	}


}