<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_M extends MY_Model {

	protected $table = 'raport_options';
	protected $primary_id = 'option_name';
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_option_data($id) {

      	$query = $this->db->query('SELECT option_data FROM raport_options WHERE option_name = "'.$this->db->escape_str($id).'"');
	
		$dataoption = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($dataoption )) {
			foreach ($query->result()  as $munculoption) {
				$array['option_data'] = $munculoption->option_data;
			}
		}
	
		return $array;      
    
	}

	 public function konfig_tahun() {

        $data = $this->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_tahun_ajaran_admin'];
    }

    public function konfig_tahun_client() {

        $data = $this->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_tahun_ajaran_client'];
    }

    public function konfig_semester() {

        $data = $this->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_admin'];
    }

    public function konfig_semester_client() {

        $data = $this->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_client'];
    }

     public function konfig_sekolah() {

        $data = $this->get_option_data('profile_sekolah');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['sekolah_nama'];
    }

      public function getaktivasi($dataku) {
        $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = unserialize($data['option_data']);
        return $dataoption[$dataku];
    }


     public function bobot_nilai($bobot_nilai) {

        $data = $this->get_option_data('bobot_nilai');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption[$bobot_nilai];
    }




	





}
