<?php
class Dashboard extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //$this->load->model('article_m');
        
    }

    public function index() {
         //$this->output->enable_profiler(TRUE);
        $this->db->cache_set_path($this->config->item('cache_path'));
        $this->db->cache_on();
    	if ($this->konfigurasi_m->konfig_semester_client() == 'genap') {
            $semester1 = '2';
            $semester2 = '4';
            $semester3 = '6';
        } else {
            $semester1 = '1';
            $semester2 = '3';
            $semester3 = '5';
        }
        $this->data['char_rangking_kelas'] = $this->rangking_m->get_ranking_kelas($this->konfigurasi_m->konfig_tahun_client(),$semester1,$semester2,$semester3);
    	//Load Data View Dashboard
        $this->data['jumlahsiswaaktif'] = $this->count_m->hitungsiswaaktif();
        $this->data['jumlahguruaktif']  = $this->count_m->hitungguruaktif();
        $this->data['jumlahkelasaktif'] = $this->count_m->hitungkelasaktif();
    	$this->data['subview'] = 'siswa/dashboard/index';
    	$this->load->view('siswa/admindesain', $this->data);
    	
    }
    
   
}