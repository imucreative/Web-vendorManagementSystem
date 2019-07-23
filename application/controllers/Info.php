<?php
    ini_set('display_errors',0); 
	class Info extends CI_Controller{
		
		function __construct() {
			parent::__construct();
            $this->load->model('Info_model', 'info');
            $this->load->model('User_model', 'user');
			
			if(!$this->session->userdata('userId')){
				redirect('auth/logout');
			}
			
		}
		
		function index(){
            if (isset($_POST['submit'])){
				//$image		= $this->uploadImage();
				//print_r($image);
				//die();
				$this->info->updateInfo();
				redirect('info');
			}else{
                $data['row']    =  $this->info->getInfo()->row();
                $this->template->load('template', 'info', $data);
            }
        }

        function profile(){
			$this->template->load('template', 'profile');
		}
		
		function saveProfile(){
            
            if (isset($_POST['submit'])){
				$this->user->updateProfil();
				redirect("auth/logout");
            }
            
		}

		function uploadImage(){
			$config['upload_path']		= "./uploads/";
			$config['allowed_types']	= "jpg|png|jpeg";
			$config['file_name']		= $this->infoId;
			$config['overwrite']		= true;
			$config['max_size']			= 1024; //1mb
			$this->load->library('upload', $config);
			
			$this->upload->do_upload('userfile');
			$upload	= $this->upload->data("file_name");
			return $upload;
		}

    }

    