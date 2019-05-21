<?php
class Datapesertaeskul extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('pesertaeskul_m');
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');

    }

    

    public function index() {
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['data_eskul'] = $this->cari_eskul();
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Absensi
        $this->data['subview'] = 'guru/datapesertaeskul/index';
        $this->load->view('guru/admindesain', $this->data);
        
    }

  
    
    public function ajax_list()
    {
        $list = $this->pesertaeskul_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $pesertaeskul) {
            $no++;
            
            
           
            if ($pesertaeskul->pesertaeskul_nis == NULL ) {
                $datanis = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datanis = '<span class="label bg-blue-hoki">'. $pesertaeskul->pesertaeskul_nis.'</span>';
            }

             if ($pesertaeskul->pesertaeskul_status == 1) {
                $status = '<span class="label btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            if ($pesertaeskul->siswa_nama == NULL ) {
                $datanama = '<span class="label bg-grey">DATA SISWA TELAH DIHAPUS</span>';
            } else {
                $datanama = $pesertaeskul->siswa_nama;
            }

             $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
            $kelastahun = substr($pesertaeskul->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $pesertaeskul->kelas_nama))));
            $dataakhir = ($kelastahun - $datatahun);

            if ($dataakhir == 0) {
                $datakelas = 'XII'.$kelasku;
             } elseif ($dataakhir == 1) {
                 $datakelas = 'XI'.$kelasku;
             } elseif ($dataakhir == 2) {
                 $datakelas = 'X'.$kelasku;
             } else {
                $datakelas = 'XII'.$kelasku;
             }


              if ($pesertaeskul->kelas_nama == NULL ) {
                $datakelasku = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datakelasku = '<span  class="label label-primary tooltips" data-placement="top" data-original-title="'.$pesertaeskul->siswa_kelas .' - '. $pesertaeskul->kelas_kk.' - '.$pesertaeskul->kelas_tahun.'">'. $datakelas.'</span>';
            }


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$pesertaeskul->pesertaeskul_id.'">';
            $row[] = $no;
            $row[] = $datanis;
            $row[] =  $datanama;
            $row[] = '<span class="label bg-yellow">'.$pesertaeskul->eskul_nama.'</span>';
            $row[] = $datakelasku;
            //$row[] =  $dataabsensi;
            //$row[] =  $pesertaeskul->guru_pk;
            
            $row[] = $status;
            //$row[] = $pesertaeskul->dob;
 
            //add html for action
            //$row[] = '<a href="javascript:void()" onclick="edit_data('."'".$pesertaeskul->pesertaeskul_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a><a href="javascript:void()" onclick="delete_data('."'".$pesertaeskul->pesertaeskul_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->pesertaeskul_m->count_all(),
                        "recordsFiltered" => $this->pesertaeskul_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }



     private function cari_kelas() {
        $datakelas3 = $this->konfigurasi_m->konfig_tahun_client();
        $datakelas2 = (substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4) + 1);
        $datakelas1 = (substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4) +2);
        
        $set_kelas_1= $datakelas1.'/'.($datakelas1+1);
        $set_kelas_2 = $datakelas2.'/'.($datakelas2+1);
        $set_kelas_3 = $this->konfigurasi_m->konfig_tahun_client();
        $tmp  = '';
        $data3   = $this->wali_m->get_data_kelas_saring($set_kelas_3);
        $data2   = $this->wali_m->get_data_kelas_saring($set_kelas_2);
        $data1  = $this->wali_m->get_data_kelas_saring($set_kelas_1);
        


         if(!empty($data1)){
          $tmp .= '<optgroup label="Angkatan '.$set_kelas_1.'">';
            
            foreach($data1 as $row) {
                 $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
                $tmp .= "<option value='".$row->kelas_code."'>X".$kelasku."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            
        }

           if(!empty($data2)){
            
            $tmp .= '<optgroup label="Angkatan '.$set_kelas_2.'">';
           
            foreach($data2 as $row) {
                $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
                $tmp .= "<option value='".$row->kelas_code."'>XI".$kelasku."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            
        }


        if(!empty($data3)){
            
            $tmp .= '<optgroup label="Angkatan '.$set_kelas_3.'">';
           
            foreach($data3 as $row) {
                $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
                $tmp .= "<option value='".$row->kelas_code."'>XII".$kelasku."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            
        }


     
        return $tmp;

     }


     private function cari_eskul() {
       
        
        $data1  = $this->pesertaeskul_m->get_data_eskul();
        
        $tmp  = '';

         if(!empty($data1)){
            $tmp .= '<optgroup label="Eskul Non Wajib - TH: '.$this->konfigurasi_m->konfig_tahun_client().'">';
            
            foreach($data1 as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
           $tmp .= '<optgroup label="Eskul Non Wajib - TH: '.$this->konfigurasi_m->konfig_tahun_client().'">';
            $tmp .= "<option value=''>Data Eskul Kosong</option>";
             $tmp .= "</optgroup>";
            
        }

           
     
        return $tmp;

     }



   
}