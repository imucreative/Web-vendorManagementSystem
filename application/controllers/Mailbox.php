<?php
    ini_set('display_errors',0);
	class Mailbox extends CI_Controller{
		
		function __construct() {
			parent::__construct();
			$this->load->model('Vendor_model', 'vendor');
            $this->load->model('Category_model', 'category');
            $this->load->model('Mailbox_model', 'mailbox');
			$this->load->library('phpmailer_library');
			
			if(!$this->session->userdata('userId')){
				redirect('auth/logout');
			}
			
        }
        
        function index(){
            $data['result']=  $this->mailbox->selectAll()->result();
            $this->template->load('template', 'mailbox/sendmail', $data);
        }
		
		function compose(){
            $id         = $this->uri->segment(3);
            $from       = $this->input->post('from', TRUE);
            $to         = $this->input->post('to', TRUE);
            $cc         = $this->input->post('cc', TRUE);
            $subject    = $this->input->post('subject', TRUE);
            $message    = $this->input->post('message', TRUE);
            $status     = $this->input->post('status', TRUE);
            $vendorId   = $this->input->post('vendorId', TRUE);
            $attachment	= $this->uploadAttachment();

            $data = array(
                'vendorId'  => $vendorId,
                'date'      => date('Ymd'),
				'time'      => date('H:m:d'),
                'sendFrom'  => $from,
                'sendTo'    => $to,
                'sendCc'    => $cc,
                'subject'   => $subject,
                'message'   => $message,
                'attachment' => $attachment['file_name']
            );
            
            if(isset($_POST['submit'])){
                //echo $this->upload->display_errors();
                //if(isset($id)){
                    $this->mailbox->simpan($data);
                    
                    $dataEmail = array(
                        'emailPrusahaan'    => get_data_info('email'),
                        'from'              => $from,
                        'to'                => $to,
                        'cc'                => $cc,
                        'subject'           => $subject,
                        'message'           => $message,
						'attachment'	    => $attachment['full_path']
                    );
                    $this->sendEmail($dataEmail);

                    redirect('mailbox/sendmail');
                //}else{
                    //$data['result']=  $this->mailbox->selectAll()->result();
                    //$data['error']=  "<font color='red'> | Message must be send from master vendor</font>";
                    //$this->template->load('template', 'mailbox/sendmail', $data);
                //}
				
			}else{
                if(isset($id)){
					$data['row']        = $this->vendor->getVendorById($id)->row();
					$data['email']      = $this->vendor->selectAll()->result();
					$this->template->load('template', 'mailbox/compose', $data);
				}else{
					redirect('mailbox/sendmail');
				}
			}
        }

       

        function sendMail(){
            $data['result']=  $this->mailbox->selectAll()->result();
            $this->template->load('template', 'mailbox/sendmail', $data);
        }

        function detail(){
            $id = $this->uri->segment(3);
            $data['row']    =  $this->mailbox->getEmailById($id)->row();
            $data['vendor'] = $this->vendor->getVendorById($data['row']->vendorId)->row();
            $this->template->load('template', 'mailbox/detail', $data);
        }

        //==================================================================================================
        
        function uploadAttachment(){
			$config['upload_path']		= "./uploads/email/";
			$config['allowed_types']	= "jpg|jpeg|png|xlsx|xls|doc|docs|pdf";
			$config['max_size']			= 10240; //10mb
			$this->load->library('upload', $config);
			
			$this->upload->do_upload('attachment');
			$upload	= $this->upload->data();
			return $upload;
        }

        function a(){
			echo APPPATH;
		}
		
		public function sendEmail($data){
			//USE PHPMailer
			//aktifkan izin keamanan aplikasi gmail
            //https://myaccount.google.com/lesssecureapps?pli=1
			$mail = $this->phpmailer_library->load();
			$mail->isSMTP();
			$mail->Host			= 'smtp.gmail.com';
			$mail->SMTPAuth		= true;
			$mail->Username		= 'trustjaya.cv@gmail.com';
			$mail->Password		= 'trust010994jaya';
			$mail->SMTPSecure	= 'ssl';
			$mail->Port			= 465;
			
			$mail->setFrom($data['from']);		//from
			//$mail->addReplyTo($data['to']);	//reply-to
			$mail->addAddress($data['to']);		//to
			$mail->addCC($data['cc']);			//cc
			$mail->addBCC($data['emailPrusahaan']);		//bcc
			
			$mail->Subject = $data['subject'];
			$mail->isHTML(true);
			$mailContent = $data['message'];
			$mail->Body = $mailContent;
			
			//$attachment	= $this->uploadAttachment();
            $mail->addAttachment($data['attachment']);
			
			if(!$mail->send()){
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}else{
				$this->template->load('template', 'mailbox/sendmail');
			}
			

		}
		
		public function tesEmail($data){
            //aktifkan izin keamanan aplikasi gmail
            //https://myaccount.google.com/lesssecureapps?pli=1
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => "ssl://smtp.googlemail.com",
                'smtp_port' => 587,
                'smtp_user' => 'trustjaya.cv@gmail.com', //isi dengan alamat email/ username email gmail
                'smtp_pass' => 'trust010994jaya', //isi dengan password gmail
                'mailtype' => 'html',
                'charset' => 'utf-8',
				'newline' => "\r\n",
                'wordwrap' => TRUE
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($data['from']);
            $this->email->to($data['to']);
            $this->email->cc($data['cc']);
            $this->email->subject($data['subject']);
            $this->email->message($data['message']);
            
            $attachment	= $this->uploadAttachment();
            $this->email->attach($attachment['full_path']);

            if($this->email->send()){
                $this->template->load('template', 'mailbox/sendmail');
            }else{
                show_error($this->email->print_debugger());
            }
        }
		
        
    }
