<?php
    ini_set('display_errors',0);
	class Auth extends CI_Controller{
		
		//public $table	= "dtbusers";
		
		function __construct() {
			parent::__construct();
			$this->load->model('User_model', 'user');
		}
		
		function index(){
			if(isset($_POST['submit'])){
				// proses login
				$username	= $this->input->post('username');
				$password	= $this->input->post('password');
                $chek		= $this->user->chekLogin($username, $password);
                
                //print_r($chek->num_rows());
                //die();

				if($chek->num_rows() > 0){
					$this->session->set_userdata($chek->row_array());
					redirect('home');
				}else{
					$data['error'] = "<div class='alert alert-danger'>
						<button data-dismiss='alert' class='close'>&times;</button>
						<i class='fa fa-times-circle'></i> Please check username & password.
					</div>";
					
					$this->load->view('login', $data);
				}
			}else{
				$this->load->view('login');
			}
		}
		
		function logout(){
			$this->session->sess_destroy();
			redirect('auth');
		}
		
		
	}
