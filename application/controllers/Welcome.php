<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function email() {
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 587,
			'smtp_user' => 'muda3332@gmail.com',   
			'smtp_pass' => 'nzcx raaz qqza mqzl',           
			'charset'   => 'utf-8',
			'mailtype'  => 'html',
			'newline'   => "\r\n",
			'wordwrap' => TRUE,
        	'smtp_crypto' => 'tls'
		  ];
	
			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->to("syaipuddinmudapane@gmail.com");
			$this->email->from('muda3332@gmail.com','Posyandu | Pamujirahayu');
			$this->email->subject('Kode Konfirmasi');
			$this->email->message('Silahkan Konfirmasi code ini - hahaha');

			if ($this->email->send()) {
				echo "Email sent successfully.";
			} else {
				// Output the error message
				echo "Email sending failed: " . $this->email->print_debugger();
			}

		// echo "tested";
	}
}
