<?php
class Gururaport_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();
		$this->data['meta_title'] = 'Sistem Informasi Nilai Raport V.1';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('statistik');
		$this->load->model('user_m');
		$this->load->model('count_m');
		$this->load->model('rangking_m');
		$this->load->model('konfigurasi_m');
		$this->load->model('kelas_m');
		$this->load->model('siswa_m');
		$this->load->model('wali_m');
		$this->load->model('absensi_m');
		

		$this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
		$this->data['jumlah_mapel'] = $this->count_m->hitungmapel();
		$this->data['jumlah_wali'] = $this->count_m->hitungwali_client();
		$this->data['jumlah_hakmapel'] = $this->count_m->hitunghakmapel_client();
		$this->data['jumlah_kompetensi'] = $this->count_m->hitungkompetensi();
		$this->data['jumlah_absensi'] = $this->count_m->hitungabsensi_bp();
		$this->data['jumlah_absensi_all'] = $this->count_m->hitungabsensi_client();
		$this->data['jumlah_hakabsensi'] = $this->count_m->hitunghakabsensi_client();
		$this->data['jumlah_eskul'] = $this->count_m->hitungeskul_client();
		$this->data['jumlah_hakeskul'] = $this->count_m->hitunghakeskul_client();


		$this->data['namakelas'] = $this->siswa_m->namakelaswali();
		$this->data['angkatankelas'] = $this->siswa_m->angkatankelaswali();
		$this->data['namaguru'] = $this->siswa_m->namaguruwali();

		$this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
		$this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

		$this->data['login_statistik'] =  $this->statistik->tampil_statistik();


		// Login check
		$exception_uris = array(
			'user/login', 
			'user/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE ) {
				redirect('user/login');
			} elseif ($this->user_m->lockedin() == FALSE) {
				redirect('user/locked');
			} elseif ($this->session->userdata('user_level') != 2 ) {
				redirect('user/denied');
			}
		}
		
		
	
	}

	


}