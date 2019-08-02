<?php
class Vendor_model extends Ci_Model{
    
	public $table			= 'dtbvendor';
	public $tableCatalog	= 'dtbcatalog';
    

    //==================================================================================================
    
    function selectAll(){
		$this->db->where('delete', 0);
		$query		= $this->db->get($this->table);
		return $query;
    }
    
    function getVendorById($vendorId){
		$this->db->where('delete', 0);
		$this->db->where('vendorId', $vendorId);
		$query	= $this->db->get($this->table);
		return $query;
	}
	
	

    function simpan($catalog){
        $vendorId       = strtoupper($this->input->post('vendorId'));
        $categoryId     = strtoupper($this->input->post('categoryId'));
        $name           = strtoupper($this->input->post('name'));
        $description    = strtoupper($this->input->post('description'));
        $address        = strtoupper($this->input->post('address'));
        $telp           = strtoupper($this->input->post('telp'));
        $fax		    = strtoupper($this->input->post('fax'));
		$email		    = strtoupper($this->input->post('email'));
		$npwp		    = strtoupper($this->input->post('npwp'));
		
			$data	= array(
                'vendorId'      => $vendorId,
                'categoryId'    => $categoryId,
                'name'          => $name,
                'description'   => $description,
				'address'		=> $address,
                'telp'			=> $telp,
                'fax'			=> $fax,
				'email'			=> $email,
				'npwp'			=> $npwp
			);
		
		$this->db->insert($this->table, $data);
		//$insertId = $this->db->insert_id();

			$dataCatalog	= array(
				'vendorId'	=> $vendorId,
				'name'		=> $name,
				'file'		=> $catalog,
				'delete'	=> 0
			);
		$this->db->insert($this->tableCatalog, $dataCatalog);
	}
    
	function update($catalog){
        $vendorId       = strtoupper($this->input->post('vendorId'));
        $categoryId     = strtoupper($this->input->post('categoryId'));
        $name           = strtoupper($this->input->post('name'));
        $description    = strtoupper($this->input->post('description'));
        $address        = strtoupper($this->input->post('address'));
        $telp           = strtoupper($this->input->post('telp'));
        $fax		    = strtoupper($this->input->post('fax'));
		$email		    = strtoupper($this->input->post('email'));
		$npwp		    = strtoupper($this->input->post('npwp'));
		
		//if($catalog == null){
			$data	= array(
                'vendorId'      => $vendorId,
                'categoryId'    => $categoryId,
                'name'          => $name,
                'description'   => $description,
				'address'		=> $address,
                'telp'			=> $telp,
                'fax'			=> $fax,
				'email'			=> $email,
				'npwp'			=> $npwp
			);
		/*
		}else{
			$data	= array(
                'vendorId'      => $vendorId,
                'categoryId'    => $categoryId,
                'name'          => $name,
                'description'   => $description,
				'address'		=> $address,
                'telp'			=> $telp,
                'fax'			=> $fax,
				'email'			=> $email,
				'npwp'			=> $npwp,
				'catalog'		=> $catalog
			);
		}
		*/
		
		$this->db->where('vendorId', $this->input->post('vendorId'));
		$this->db->update($this->table, $data);
	}
	
	function hapus($vendorId){
		$data	= array(
			'delete'	=> 1
		);
		$this->db->where('vendorId', $vendorId);
		$this->db->update($this->table, $data);
	}

}