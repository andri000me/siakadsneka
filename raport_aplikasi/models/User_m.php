<?php
class User_M extends MY_Model
{
	
	protected $_table_name = 'raport_users';
	protected $_order_by = 'user_id';
	public $rules = array(
		'user_login' => array(
			'field' => 'user_login', 
			'label' => 'Username', 
			'rules' => 'trim|required|xss_clean'
		), 
		'user_password' => array(
			'field' => 'user_password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		),

	);

		public $rules_locked = array(
		
		'user_password' => array(
			'field' => 'user_password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		),

	);
	
	function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
		$user = $this->get_by(array(
			'user_login' => $this->input->post('user_login'),
			'user_password' => $this->hash($this->input->post('user_password')),
		), TRUE);

		$dataguru = $this->get_by_datauser_guru(array(
			'user_login' => $this->input->post('user_login'),
			'user_password' => $this->hash($this->input->post('user_password')),
		), TRUE);

		$datasiswa = $this->get_by_datauser_siswa(array(
			'user_login' => $this->input->post('user_login'),
			'user_password' => $this->hash($this->input->post('user_password')),
		), TRUE);

		
		if (count($user)) {
			// Log in user

			$this->load->library('statistik');
			$this->statistik->tambah_statistik();
	

			if ($user->user_level == 5 || $user->user_level == 2) {
				
				if ($user->user_level == 2) {

					if ($this->konfigurasi_m->getaktivasi('aktivasi_login_guru') == '1') {
							
						$data = array(
						'user_id' => $user->user_id,
						'user_login' => $user->user_login,
						'user_password' => $user->user_password,
						'user_nama' => $dataguru->guru_nama,
						'user_photo' => $dataguru->guru_foto,
						'user_level' => $user->user_level,
						'user_status' => $user->user_status,
						'user_notlocked' => TRUE,
						'loggedin' => TRUE,
						);

					$this->session->set_userdata($data);

					} else {
							$this->hapus_session();
							$this->session->set_flashdata('error', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="fa  fa-info-circle"></i><strong > Info:</strong> Maaf saat ini <b>fitur login</b> untuk <b>guru</b> sedang dinonaktifkan oleh <b>Admin</b>.</div>');
							redirect('user/login', 'refresh');
					}
				} else {

					$data = array(
				'user_id' => $user->user_id,
				'user_login' => $user->user_login,
				'user_password' => $user->user_password,
				'user_nama' => $dataguru->guru_nama,
				'user_photo' => $dataguru->guru_foto,
				'user_level' => $user->user_level,
				'user_status' => $user->user_status,
				'user_notlocked' => TRUE,
				'loggedin' => TRUE,
				);
				$this->session->set_userdata($data);

				}

				
			} else {

				if ($this->konfigurasi_m->getaktivasi('aktivasi_login_siswa') == '1') {
					

							$data = array(
						'user_id' => $user->user_id,
						'user_login' => $user->user_login,
						'user_password' => $user->user_password,
						'user_nama' => $datasiswa->siswa_nama,
						'user_photo' => $datasiswa->siswa_foto,
						'user_level' => $user->user_level,
						'user_status' => $user->user_status,
						'user_notlocked' => TRUE,
						'loggedin' => TRUE,
					);
					$this->session->set_userdata($data);

				} else {
						$this->hapus_session();
						$this->session->set_flashdata('error', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="fa  fa-info-circle"></i><strong> Info:</strong> Maaf saat ini <b>fitur login</b> untuk <b>siswa</b> sedang dinonaktifkan oleh <b>Admin</b>.</div>');
						redirect('user/login', 'refresh');
				}
				
			}

			
			
		}
	}

	public function locked()
	{
		$user = $this->get_by(array(
			'user_login' => $this->session->userdata('user_login'),
			'user_password' => $this->hash($this->input->post('user_password')),
		), TRUE);

		$dataguru = $this->get_by_datauser_guru(array(
			'user_login' => $this->session->userdata('user_login'),
			'user_password' => $this->hash($this->input->post('user_password')),
		), TRUE);

		$datasiswa = $this->get_by_datauser_siswa(array(
			'user_login' => $this->session->userdata('user_login'),
			'user_password' => $this->hash($this->input->post('user_password')),
		), TRUE);

		
		if (count($user)) {
			// Log in user


	

			if ($user->user_level == 5 || $user->user_level == 2) {
				
				if ($user->user_level == 2) {

					if ($this->konfigurasi_m->getaktivasi('aktivasi_login_guru') == '1') {
							
						$data = array(
						'user_id' => $user->user_id,
						'user_login' => $user->user_login,
						'user_password' => $user->user_password,
						'user_nama' => $dataguru->guru_nama,
						'user_photo' => $dataguru->guru_foto,
						'user_level' => $user->user_level,
						'user_status' => $user->user_status,
						'user_notlocked' => TRUE,
						'loggedin' => TRUE,
						);

					$this->session->set_userdata($data);

					} else {
							$this->hapus_session();
							$this->session->set_flashdata('error', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="fa  fa-info-circle"></i><strong > Info:</strong> Maaf saat ini <b>fitur login</b> untuk <b>guru</b> sedang dinonaktifkan oleh <b>Admin</b>.</div>');
							redirect('user/login', 'refresh');
					}
				} else {

					$data = array(
				'user_id' => $user->user_id,
				'user_login' => $user->user_login,
				'user_password' => $user->user_password,
				'user_nama' => $dataguru->guru_nama,
				'user_photo' => $dataguru->guru_foto,
				'user_level' => $user->user_level,
				'user_status' => $user->user_status,
				'user_notlocked' => TRUE,
				'loggedin' => TRUE,
				);
				$this->session->set_userdata($data);

				}

				
			} else {

				if ($this->konfigurasi_m->getaktivasi('aktivasi_login_siswa') == '1') {
					

							$data = array(
						'user_id' => $user->user_id,
						'user_login' => $user->user_login,
						'user_password' => $user->user_password,
						'user_nama' => $datasiswa->siswa_nama,
						'user_photo' => $datasiswa->siswa_foto,
						'user_level' => $user->user_level,
						'user_status' => $user->user_status,
						'user_notlocked' => TRUE,
						'loggedin' => TRUE,
					);
					$this->session->set_userdata($data);

				} else {
						$this->hapus_session();
						$this->session->set_flashdata('error', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button><i class="fa  fa-info-circle"></i><strong> Info:</strong> Maaf saat ini <b>fitur login</b> untuk <b>siswa</b> sedang dinonaktifkan oleh <b>Admin</b>.</div>');
						redirect('user/login', 'refresh');
				}
				
			}

			
			
		}
	}



	public function logout ()
	{
		
		$this->session->sess_destroy();
	}

	public function hapus_session()
	{
		
		
		$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'user_login' => $this->session->userdata('user_login'),
				'user_password' => $this->session->userdata('user_password'),
				'user_photo' => $this->session->userdata('user_photo'),
				'user_level' => $this->session->userdata('user_level'),
				'user_status' => $this->session->userdata('user_status'),
				'user_notlocked' => TRUE,
				'loggedin' => TRUE,
			);
		
		$this->session->unset_userdata($data);
		
		
	}


	public function lockuser() {
		$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'user_login' => $this->session->userdata('user_login'),
				'user_password' => $this->session->userdata('user_password'),
				'user_photo' => $this->session->userdata('user_photo'),
				'user_level' => $this->session->userdata('user_level'),
				'user_status' => $this->session->userdata('user_status'),
				'user_notlocked' => FALSE,
				'loggedin' => TRUE,
			);
		
					$this->session->set_userdata($data);
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function lockedin()
	{
		return (bool) $this->session->userdata('user_notlocked');
	}

	private function get_by_datauser_guru($where){
		$this->db->select('guru_nama, guru_foto');
		$this->db->from('raport_guru');
		$this->db->join('raport_users', 'raport_users.user_login=raport_guru.guru_kode', 'left');
		$this->db->where($where);
		return $this->db->get()->row();
	}

	private function get_by_datauser_siswa($where){
		$this->db->select('siswa_nama, siswa_foto');
		$this->db->from('raport_siswa');
		$this->db->join('raport_users', 'raport_users.user_login=raport_siswa.siswa_nis', 'left');
		$this->db->where($where);
		return $this->db->get()->row();
	}
	
	public function get_new(){
		$user = new stdClass();
		$user->user_login='';
		$user->user_password = '';
		$user->user_photo = '';
		$user->user_level = '';
		$user->user_status = '';
		return $user;
	}

	

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}