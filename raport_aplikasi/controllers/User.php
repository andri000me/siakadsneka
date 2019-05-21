<?php
class User extends Login_Controller
{
	
	public function __construct ()
	{
		parent::__construct();
		$this->load->model('konfigurasi_m');
		
	}
	
	public function login ()
	{
		//Redirect a user if he's already logged in
		$sukses = 'user/success';

		$this->user_m->loggedin() == FALSE || redirect($sukses);
		
		// Set form
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong>Warning! </strong>', '<br></div>');
		
		
		// Process form
		if ($this->form_validation->run() == TRUE) {
			// We can login and redirect
			if ($this->user_m->login() == TRUE) {
				
					redirect($sukses);
					
			} else {
				$this->session->set_flashdata('error', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong>Warning! </strong>Kombinasi user dan password yang anda masukkan belum benar.</div>');
				redirect('user/login', 'refresh');
			}
		}
		

		// Load view
		//$this->data['subview'] = 'login/components/index';
		$this->load->view('login/login');
	}

	public function locked() {

		$sukses = 'user/success';
		$this->user_m->lockedin() == FALSE || redirect($sukses);



		// Set form
		if ($this->user_m->loggedin() == FALSE) {
				$rules = $this->user_m->rules;
				
			} else {
				$rules = $this->user_m->rules_locked;
			}
		
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong>Warning! </strong>', '<br></div>');
		
		if ($this->form_validation->run() == TRUE) {
			// We can login and redirect
			if ($this->user_m->loggedin() == FALSE) {
						if ($this->user_m->login() == TRUE) {
						
							redirect($sukses);
							
					} else {
						$this->session->set_flashdata('error', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong>Warning! </strong>Password yang anda masukkan belum benar.</div>');
						redirect('user/locked', 'refresh');
					}
				
			} else {
						if ($this->user_m->locked() == TRUE) {
						
							redirect($sukses);
							
					} else {
						$this->session->set_flashdata('error', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><strong>Warning! </strong>Password yang anda masukkan belum benar.</div>');
						redirect('user/locked', 'refresh');
					}
			}
			
		}

			if ($this->user_m->loggedin() == FALSE) {
				$this->load->view('login/login'); 
				
			} else {
				$this->load->view('login/locked'); 
			}
		
			
		
		
	}


	public function success() {
		$admin = '4dm1n-D33H4RdY-n1c3dR34M/dashboard';
        $wks1 = 'wks1/dashboard';
        $guru = 'guru/dashboard';
        $siswa = 'siswa/dashboard';

        if ($this->session->userdata('user_level') == 1) {
                    redirect($siswa);
                } else if ($this->session->userdata('user_level') == 2) {
                    redirect($guru);
                }  else if ($this->session->userdata('user_level') == 4) {
                    redirect($wks1);
                }  else if ($this->session->userdata('user_level') == 5) {
                    redirect($admin);
                }   else  {
                    $this->user_m->logout();
					redirect('user/login');
                }
	}


	public function denied ()
	{
		$this->load->view('denied');
	}

	public function lockuser()
	{
		$this->user_m->lockuser();
		redirect('user/locked');
	}


	public function logout ()
	{
		$this->user_m->logout();
		redirect('user/login');
	}

	
}