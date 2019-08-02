<?php
class Catalog_model extends Ci_Model{
    
    public $table	= 'dtbcatalog';
    

    //==================================================================================================
    
    function selectAllByVendor($vendorId){
		$this->db->where('delete', 0);
		$this->db->where('vendorId', $vendorId);
		$query		= $this->db->get($this->table);
		return $query;
    }

    function simpan($catalog){
        $vendorId       = strtoupper($this->input->post('vendorId'));
        $name           = strtoupper($this->input->post('name'));
		
			$data	= array(
                'vendorId'	=> $vendorId,
                'name'		=> $name,
				'file'		=> $catalog
			);
		
		$this->db->insert($this->table, $data);
	}
	
	function hapus($catalogId){
		$data	= array(
			'delete'	=> 1
		);
		$this->db->where('catalogId', $catalogId);
		$this->db->update($this->table, $data);
	}

}