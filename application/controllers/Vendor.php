<?php
	ini_set('display_errors',0);
	class Vendor extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model('Vendor_model', 'vendor');
			$this->load->model('Catalog_model', 'catalog');
			$this->load->model('Category_model', 'category');
			
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
				$catalog	= $this->uploadCatalog();
				//print_r($this->upload->display_errors());
				if($this->upload->display_errors()){
					$data['gagalInputCatalog']	= "* Required document only & Space Min 10Mb";
					$this->template->load('template','vendor/post', $data);
				}else{
					$this->vendor->simpan($catalog);
					redirect('vendor');
				}
				
			}else{
				$data['category']	= $this->category->selectAll()->result();
				$this->template->load('template','vendor/post', $data);
			}
		}
		
		
		function edit(){
			
			if(isset($_POST['submit'])){
				$catalog	= $this->uploadCatalog();
				$this->vendor->update($catalog);
				redirect('vendor');

			}else{
				$vendorId				= $this->uri->segment(3);
				$data['row']			= $this->vendor->getVendorById($vendorId)->row();
				$data['category']		= $this->category->selectAll()->result();
				$data['catalog']		= $this->catalog->selectAllByVendor($data['row']->vendorId)->result();
				$this->template->load('template', 'vendor/edit', $data);
			}
		}

		function display(){
			$vendorId			= $this->uri->segment(3);
			$data['row']		= $this->vendor->getVendorById($vendorId)->row();
			$data['category']	= $this->category->getCategoriByCategoryId($data['row']->categoryId)->row();
			$data['catalog']		= $this->catalog->selectAllByVendor($data['row']->vendorId)->result();
			$this->template->load('template', 'vendor/display', $data);
		}
		
		function delete(){
			$vendorId = $this->uri->segment(3);
			if(!empty($vendorId)){
				$this->vendor->hapus($vendorId);
			}
			redirect('vendor');
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



		function tambah_rating(){
			if ($this->input->post('rating')!=''){
				$data = array('rating'=>$this->input->post('rating'));
				$where = array('vendorId' => $this->input->post('vendorId'));
			$this->model_app->updateRating('dtbvendor', $data, $where);
			}
		}
		
		

    }