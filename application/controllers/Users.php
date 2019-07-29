<?php
	ini_set('display_errors',0);
	class Users extends CI_Controller{
		
		function __construct() {
			parent::__construct();
            $this->load->model('User_model', 'users');
            $this->load->model('Vendor_model', 'vendor');
			
			if(!$this->session->userdata('userId')){
				redirect('auth/logout');
			}
			
		}
		
		function index(){
            $data['status']	= $this->users->selectAllStatus()->result();
            //$data['vendor']	= $this->vendor->selectAll()->result();
            $this->template->load('template', 'users/data', $data);
		}

		public function ajax_list(){
            $list = $this->users->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $users) {
				
				$stat	= $this->users->getStatusNameByStatusId($users->status)->row();

                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
				$row[] = $users->name;
                $row[] = $users->username;
                $row[] = '<center>'.$stat->name.'</center>';

                //add html for action
                $row[] = '<center><a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="editUsers('."'".$users->userId."'".')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="deleteUsers('."'".$users->userId."'".')"><i class="fa fa-trash"></i></a></center>';
            
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->users->count_all(),
                "recordsFiltered" => $this->users->count_filtered(),
                "data" => $data
            );
            //output to json format
            echo json_encode($output);
        }
		
		//==================================================================================================
		
        public function ajax_add(){
            $this->_validate();
            $data = array(
				'name' => strtoupper($this->input->post('name')),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
                'status' => strtoupper($this->input->post('status')),
			);
            $insert = $this->users->save($data);
            echo json_encode(array("status" => TRUE));
        }

        public function ajax_edit(){
            $userId		= $this->uri->segment(3);
			$dataUser	= $this->users->getById($userId);
            $statusUser	= $this->users->getStatusNameByStatusId($dataUser->status)->row();
			$data = array(
				'dataUser'=>$dataUser,
                'statusUser'=>$statusUser->name,
			);
			//$data['statusName']	= $statusUser->name;
			//print_r($vendorName->name);
			//die();

            echo json_encode($data);
        }

        public function ajax_update(){
            $this->_validate();
            $data = array(
                'userId' => $this->input->post('userId'),
				'name' => strtoupper($this->input->post('name')),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
            );
            $this->users->update($data);
            echo json_encode(array("status" => TRUE));
        }
    
        public function ajax_delete(){
            $data = array(
                'userId' => $this->uri->segment(3),
                'delete' => '1'
            );
            $this->users->deleteById($data);
            echo json_encode(array("status" => TRUE));
        }
		
        //==================================================================================================
        
        private function _validate(){
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('name') == ''){
                $data['inputerror'][] = 'name';
                $data['error_string'][] = 'Name is required';
                $data['status'] = FALSE;
			}
			if($this->input->post('username') == ''){
                $data['inputerror'][] = 'username';
                $data['error_string'][] = 'Username is required';
                $data['status'] = FALSE;
			}
			if($this->input->post('password') == ''){
                $data['inputerror'][] = 'password';
                $data['error_string'][] = 'Password is required';
                $data['status'] = FALSE;
			}
			
            
            if($data['status'] === FALSE){
                echo json_encode($data);
                exit();
            }
        }

    }
