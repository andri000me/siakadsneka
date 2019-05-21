<?php
class Count extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('count_m');
        $this->load->model('konfigurasi_m');
    }


   
    public function hitung() {
        $data['jumlah_mapel'] = $this->count_m->hitungmapel();
        $data['jumlah_wali'] = $this->count_m->hitungwali();
        $data['jumlah_hakmapel'] = $this->count_m->hitunghakmapel();
        $data['jumlah_kompetensi'] = $this->count_m->hitungkompetensi();
        $data['jumlah_absensi'] = $this->count_m->hitungabsensi();
        $data['jumlah_hakabsensi'] = $this->count_m->hitunghakabsensi();
        $data['jumlah_eskul'] = $this->count_m->hitungeskul();
        $data['jumlah_hakeskul'] = $this->count_m->hitunghakeskul();

        $data['tahun_admin'] = $this->konfigurasi_m->getaktivasi('aktivasi_tahun_ajaran_admin');
        $data['semester_admin'] = strtoupper($this->konfigurasi_m->getaktivasi('aktivasi_semester_admin'));

        
        echo json_encode($data);
       
    }


   
   
}