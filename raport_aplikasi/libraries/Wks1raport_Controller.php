<?php
class Wks1raport_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = 'Sistem Informasi Nilai Raport V.1';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		

		// Login check
		$exception_uris = array(
			'user/login', 
			'user/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE ) {
				redirect('user/login');
			} elseif ($this->session->userdata('user_level') != 4 ) {
				redirect('user/denied');
			}
		}
		
		
	
	}
}