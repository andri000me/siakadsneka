<?php
class Count extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('count_m');
        $this->load->model('konfigurasi_m');
    }


   
    public function hitung() {
        $data['jumlah_mapel'] = $this->count_m->hitungmapel();
        $data['jumlah_wali'] = $this->count_m->hitungwali_client();
        $data['jumlah_hakmapel'] = $this->count_m->hitunghakmapel_client();
        $data['jumlah_kompetensi'] = $this->count_m->hitungkompetensi_client();
        $data['jumlah_absensi'] = $this->count_m->hitungabsensi_client();
        $data['jumlah_hakabsensi'] = $this->count_m->hitunghakabsensi_client();

        $data['jumlah_eskul'] = $this->count_m->hitungeskul_client();
        $data['jumlah_hakeskul'] = $this->count_m->hitunghakeskul_client();
        
        echo json_encode($data);
       
    }


   
   
}