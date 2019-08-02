<?php
	ini_set('display_errors',0);
	class Catalog extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model('Vendor_model', 'vendor');
			$this->load->model('Catalog_model', 'catalog');
			
			if(!$this->session->userdata('userId')){
				redirect('auth/logout');
			}
			
		}
		
		function index(){
			$data['result']=  $this->vendor->selectAll()->result();
            $this->template->load('template', 'vendor/data', $data);
		}

		//==================================================================================================
		
		function post(){
			if(isset($_POST['submit'])){
                $vendorId       = strtoupper($this->input->post('vendorId'));
                $catalog	= $this->uploadCatalog();
				//print_r($this->upload->display_errors());
				if($this->upload->display_errors()){
					$error = "error";
                    redirect('vendor/edit/'.$vendorId."/".$error);
				}else{
					$this->catalog->simpan($catalog);
					redirect('vendor/edit/'.$vendorId);
				}
				
			}
		}
		
		
		function delete(){
            $vendorId   = $this->uri->segment(3);
            $catalogId  = $this->uri->segment(4);
			if(!empty($catalogId)){
				$this->catalog->hapus($catalogId);
			}
			redirect('vendor/edit/'.$vendorId);
		}
		
		//==================================================================================================
		
		function uploadCatalog(){
			$config['upload_path']		= "./uploads/catalog/";
			$config['allowed_types']	= "jpg|jpeg|png|xlsx|xls|doc|docs|pdf";
			$config['max_size']			= 10240; //1mb
			$this->load->library('upload', $config);
			
			$this->upload->do_upload('catalog');
			$upload	= $this->upload->data();
			return $upload['file_name'];
		}
		
		

    }