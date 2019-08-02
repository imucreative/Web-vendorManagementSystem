<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PHPMailer_library {

	public function __construct(){
		log_message('Debug', 'PHPMailer class is loaded.');
	}

	public function load(){
		require_once('template/PHPMailer-master/src/PHPMailer.php');
		require_once('template/PHPMailer-master/src/SMTP.php');
		require_once('template/PHPMailer-master/src/Exception.php');

		$objMail = new PHPMailer\PHPMailer\PHPMailer();
		return $objMail;
	}
}
