<?php
class User_model extends CI_Model{
    
	public $table	= "dtbusers";
	public $tableStatus	= "dtbstatususer";
    var $column_order = array('userId','name','username','status',null); //set column field database for datatable orderable
	var $column_search = array('userId','name','username','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('name' => 'desc'); // default order 
	
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
	
	//==================================================================================================
	
    private function _get_datatables_query(){
		$this->db->where('delete',0);
		//$this->db->where('status!=', 1);
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item){ // loop column
			if($_POST['search']['value']){ // if datatable send POST for search
				if($i===0){ // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i){ //last loop
                    $this->db->group_end(); //close bracket
                }
			}
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
    }
    
    function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
    
    //==================================================================================================

    
    public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

    public function update($data){
        $this->db->where('userId', $data['userId']);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function deleteById($data){
        $this->db->where('userId', $data['userId']);
        $this->db->update($this->table, $data);
		return $this->db->affected_rows();
    }
    
    public function getById($userId){
		$this->db->from($this->table);
		$this->db->where('userId',$userId);
		$query = $this->db->get();
		return $query->row();
	}

	function selectAll(){
		$this->db->where('delete', 0);
		$query		= $this->db->get($this->table);
		return $query;
	}

	function selectAllStatus(){
		$this->db->where('delete', 0);
		//$this->db->where('statusId!=', 1);
		$query		= $this->db->get($this->tableStatus);
		return $query;
	}
	
	function getStatusNameByStatusId($statusId){
		$this->db->where('delete', 0);
		$this->db->where('statusId', $statusId);
		$query	= $this->db->get($this->tableStatus);
		//print_r($this->db->last_query());
		//die();
		return $query;
		
	}

	function getUserByUserId($userId){
		$this->db->where('delete', 0);
		$this->db->where('userId', $userId);
		$query	= $this->db->get($this->table);
		return $query;
		
	}
	
    
}
