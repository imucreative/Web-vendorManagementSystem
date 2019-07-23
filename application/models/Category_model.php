<?php
class Category_model extends Ci_Model{
    
    public $table	= 'dtbcategory';
    var $column_order = array('categoryId','name',null); //set column field database for datatable orderable
	var $column_search = array('categoryId','name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('name' => 'desc'); // default order 
	
    //==================================================================================================
	
    private function _get_datatables_query(){
        $this->db->where('delete',0);
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
        $this->db->where('categoryId', $data['categoryId']);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function deleteById($data){
        $this->db->where('categoryId', $data['categoryId']);
        $this->db->update($this->table, $data);
		return $this->db->affected_rows();
    }
    
    public function getById($categoryId){
		$this->db->from($this->table);
		$this->db->where('categoryId',$categoryId);
		$query = $this->db->get();
		return $query->row();
	}

	function selectAll(){
		$this->db->where('delete', 0);
		$query		= $this->db->get($this->table);
		return $query;
	}
	
	function getCategoriByCategoryId($categoryId){
		$this->db->where('delete', 0);
		$this->db->where('categoryId', $categoryId);
		$query	= $this->db->get($this->table);
		return $query;
		
	}
    


	
}
