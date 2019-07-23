<?php
    ini_set('display_errors',0);
	class Category extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model('Category_model', 'category');
			
			if(!$this->session->userdata('userId')){
				redirect('auth/logout');
			}
			
		}
		
		function index(){
			//$data['result']=  $this->category->select_all()->result();
            //$this->template->load('template', 'category/data', $data);
            $this->template->load('template', 'category/data');
        }
        
        public function ajax_list(){
            $list = $this->category->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $category) {
                $no++;
                $row = array();
                $row[] = '<center>'.$no.'</center>';
                $row[] = $category->name;

                //add html for action
                $row[] = '<center><a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="editCategory('."'".$category->categoryId."'".')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="deleteCategory('."'".$category->categoryId."'".')"><i class="fa fa-trash"></i></a></center>';
            
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->category->count_all(),
                "recordsFiltered" => $this->category->count_filtered(),
                "data" => $data
            );
            //output to json format
            echo json_encode($output);
        }
		
		//==================================================================================================
		
        public function ajax_add(){
            $this->_validate();
            $data = array(
                'name' => strtoupper($this->input->post('name'))
            );
            $insert = $this->category->save($data);
            echo json_encode(array("status" => TRUE));
        }

        public function ajax_edit(){
            $categoryId = $this->uri->segment(3);
            $data = $this->category->getById($categoryId);
            echo json_encode($data);
        }

        public function ajax_update(){
            $this->_validate();
            $data = array(
                'categoryId' => $this->input->post('categoryId'),
                'name' => strtoupper($this->input->post('name'))
            );
            $this->category->update($data);
            echo json_encode(array("status" => TRUE));
        }
    
        public function ajax_delete(){
            $data = array(
                'categoryId' => $this->uri->segment(3),
                'delete' => '1'
            );
            $this->category->deleteById($data);
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
            
            if($data['status'] === FALSE){
                echo json_encode($data);
                exit();
            }
        }
		
	}
