<?php
class Rangking extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('rangking_m');
        $this->load->model('indikatornilai_m');
        $this->load->model('siswa_m');
        
    }

    public function rangkingkelas() {
    	
    	//Load Data View Rangking Kelas
      if (count($this->wali_m->statuswali())) {
        $this->data['subview'] = 'guru/rangking/rangkingkelas';
      } else {
        $this->data['subview'] = 'guru/accessdenied/Rangkingkelas_wali';
      }
    	
    	$this->load->view('guru/admindesain', $this->data);
    	
    }




     public function ajax_list_rank()
    {

      $dataangkatan = substr($this->indikatornilai_m->tahunkelaswali(), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rank_semester') == 5 || $this->input->post('rank_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('rank_semester') == 3 || $this->input->post('rank_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('rank_semester') == 1 || $this->input->post('rank_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        if ($this->input->post('semester_cari') == '') {
          $list = $this->rangking_m->get_datatables_data_rank('', '');
        } else {
          $list = $this->rangking_m->get_datatables_data_rank($this->indikatornilai_m->datakelaswali(), $this->input->post('semester_cari'));
        
        }

        
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $rank) {
            $no++;


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$rank->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$rank->siswa_nis.'</span>';
            $row[] = $rank->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$rank->siswa_kelas .'-'. $rank->kelas_kk.'-'.$rank->kelas_tahun.'">'. $rank->kelas_nama.'</span>';
            //$row[] =  $rank->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $rank->siswa_absen. '</span>';
            //$row[] = '<span class="label label-warning tooltips" data-placement="top" data-original-title="Angkatan : '.$rank->kelas_tahun.'">'.$rank->kelas_nama.'</span>';
            $row[] = $rank->JUMLAH_K;
            $row[] = $rank->RATA_RATA_K;
            $row[] = '<span class="label bg-yellow">
                  <i class="icon-badge"></i> <b>'.$rank->RANK_K.'</b></span>';
            $row[] = $rank->JUMLAH_P;
            $row[] = $rank->RATA_RATA_P;
            $row[] = '<span class="label bg-blue">
                  <i class="icon-badge"></i> <b>'.$rank->RANK_P.'</b></span>';
            $row[] = $rank->JUMLAH_SEMUA;
            $row[] = $rank->RATA_RATA_SEMUA;
            $row[] = '<span class="label label-warning">
                  <i class="icon-badge"></i> <b>'.$rank->RANK_SEMUA.'</b></span>';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->rangking_m->count_all_data_rank($this->indikatornilai_m->datakelaswali(), $this->input->post('semester_cari')),
                        "recordsFiltered" => $this->rangking_m->count_filtered_data_rank($this->indikatornilai_m->datakelaswali(), $this->input->post('semester_cari')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

   


    
   
}