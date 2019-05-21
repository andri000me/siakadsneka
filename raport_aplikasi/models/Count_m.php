<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Count_M extends MY_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	

	public function hitungsiswaaktif()
    {

        $query = $this->db->query('SELECT count(siswa_id) as jumlah FROM raport_siswa WHERE siswa_status="1"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungguruaktif()
    {

        $query = $this->db->query('SELECT count(guru_id) as jumlah FROM raport_guru WHERE guru_status="1"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungkelasaktif()
    {

        $query = $this->db->query('SELECT count(kelas_code) as jumlah from raport_kelas WHERE kelas_status="aktif"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    



	public function hitungmapel()
    {

        $query = $this->db->query('SELECT count(mapel_nama) as jumlah FROM raport_mapel');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungwali()
    {

        $query = $this->db->query('SELECT count(wali_kelas) as jumlah FROM raport_wali WHERE wali_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungwali_client()
    {

        $query = $this->db->query('SELECT count(wali_kelas) as jumlah FROM raport_wali WHERE wali_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }



    public function hitunghakmapel()
    {

        $query = $this->db->query('SELECT count(haknilai_id) as jumlah FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitunghakmapel_client()
    {

        $query = $this->db->query('SELECT count(haknilai_id) as jumlah FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }


     public function hitungkompetensi()
    {

        $query = $this->db->query('SELECT count(kompetensi_id) as jumlah FROM raport_kompetensi WHERE kompetensi_semester="'.$this->konfigurasi_m->konfig_semester().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungkompetensi_client()
    {

        $query = $this->db->query('SELECT count(kompetensi_id) as jumlah FROM raport_kompetensi WHERE kompetensi_semester="'.$this->konfigurasi_m->konfig_semester_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

     public function hitungabsensi()
    {

        $query = $this->db->query('SELECT count(absensi_id) as jumlah FROM raport_absensi WHERE absensi_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'" AND absensi_semester="'.$this->konfigurasi_m->konfig_semester().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungabsensi_client()
    {

        $query = $this->db->query('SELECT count(absensi_id) as jumlah FROM raport_absensi WHERE absensi_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'" AND absensi_semester="'.$this->konfigurasi_m->konfig_semester_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitungabsensi_admin()
    {

        $query = $this->db->query('SELECT count(absensi_id) as jumlah FROM raport_absensi WHERE absensi_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'" AND absensi_semester="'.$this->konfigurasi_m->konfig_semester().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

     public function hitungabsensi_bp()
    {

        $query = $this->db->query('SELECT count(absensi_id) as jumlah FROM raport_absensi WHERE absensi_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'" AND absensi_semester="'.$this->konfigurasi_m->konfig_semester_client().'" AND absensi_kodeguru="'.$this->session->userdata('user_login').'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

     public function hitunghakabsensi()
    {

        $query = $this->db->query('SELECT count(hakabsensi_id) as jumlah FROM raport_hakabsensi WHERE hakabsensi_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function hitunghakabsensi_client()
    {

        $query = $this->db->query('SELECT count(hakabsensi_id) as jumlah FROM raport_hakabsensi WHERE hakabsensi_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }


     public function hitungeskul()
    {

        $query = $this->db->query('SELECT count(eskul_id) as jumlah FROM raport_eskul WHERE eskul_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

     public function hitungeskul_client()
    {

        $query = $this->db->query('SELECT count(eskul_id) as jumlah FROM raport_eskul WHERE eskul_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

     public function hitunghakeskul()
    {

        $query = $this->db->query('SELECT count(hakeskul_id) as jumlah FROM raport_hakeskul WHERE hakeskul_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }


     public function hitunghakeskul_client()
    {

        $query = $this->db->query('SELECT count(hakeskul_id) as jumlah FROM raport_hakeskul WHERE hakeskul_tahunajaran= "'.$this->konfigurasi_m->konfig_tahun_client().'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }









}
