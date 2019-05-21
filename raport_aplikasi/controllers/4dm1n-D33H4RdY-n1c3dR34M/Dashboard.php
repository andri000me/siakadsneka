<?php
class Dashboard extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //$this->load->model('article_m'); 
    }

    public function index() {
        //$this->output->enable_profiler(TRUE);
        $this->db->cache_set_path($this->config->item('cache_path'));
        $this->db->cache_on();
    	
    	//Load Data View Dashboard
        if ($this->konfigurasi_m->konfig_semester() == 'genap') {
            $semester1 = '2';
            $semester2 = '4';
            $semester3 = '6';
        } else {
            $semester1 = '1';
            $semester2 = '3';
            $semester3 = '5';
        }
        $this->data['char_rangking_kelas'] = $this->rangking_m->get_ranking_kelas($this->konfigurasi_m->konfig_tahun(),$semester1,$semester2,$semester3);
        $this->data['jumlahsiswaaktif'] = $this->count_m->hitungsiswaaktif();
        $this->data['jumlahguruaktif']  = $this->count_m->hitungguruaktif();
        $this->data['jumlahkelasaktif'] = $this->count_m->hitungkelasaktif();
        $this->data['jumlahabsensi']    = $this->count_m->hitungkelasaktif();

    	$this->data['subview'] = 'admin/dashboard/index';
    	$this->load->view('admin/admindesain', $this->data);
    }


    public function halo2() {
        echo $this->statistik->tampil_statistik();
    }

    private function ambilIP() {
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif(isset($_SERVER['REMOTE_ADDR'])) $ip = $_SERVER['REMOTE_ADDR'];
        else $ip = "0";
        return $ip;
    }
}