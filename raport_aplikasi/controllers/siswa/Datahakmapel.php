<?php
class Datahakmapel extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('hakmapel_m');
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');
        
    }

    public function index() {
    	   $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        $this->data['data_guru'] = $this->hakmapel_m->get_data_guru();
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['data_mapel'] = $this->hakmapel_m->get_data_mapel($this->konfigurasi_m->konfig_tahun_client());

    	//Load Data View Data Wali
    	$this->data['subview'] = 'siswa/datahakmapel/index';
    	$this->load->view('siswa/admindesain', $this->data);
    	
    }


    public function ajax_list()
    {
        $list = $this->hakmapel_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $hakmapel) {
            $no++;
            
            $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
            $kelastahun = substr($hakmapel->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $hakmapel->kelas_nama))));
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



            if ($hakmapel->haknilai_status == 1) {
                $status = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-xs btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            if ($hakmapel->haknilai_kelas == NULL) {
                $namakelas = '<span class="label label-default tooltips" data-placement="top" data-original-title="Kelas Telah Dihapus">EMPTY</span>';
            } else {
                $namakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="'. $hakmapel->kelas_kk .' - '.$hakmapel->kelas_tahun.'">'.$datakelas.'</span>'; 
            }

             if ($hakmapel->haknilai_mapel == NULL) {
                $namamapel = '<span class="label label-default tooltips" data-placement="top" data-original-title="Mata Pelajaran Telah Dihapus">Mapel Telah Dihapus </span>';
            } else {
                $namamapel = $hakmapel->mapel_nama; 
            }

            if ($hakmapel->haknilai_kirim == 1) {
                $kirim = '<i class="fa fa-circle font-red-pink tooltips" data-placement="top" data-original-title="Nilai Belum Dikirim"> </i>';
            } else {
                $kirim = '<span class="fa fa-circle font-yellow-saffron tooltips" data-placement="top" data-original-title="Nilai Sudah Dikirim"></span>'; 
            }


              if ($hakmapel->haknilai_metode == 1) {
                $metode = '<span class="label bg-red">BERPROSES</span>';
            } else {
                $metode = '<span class="label bg-yellow">RAPORT</span>';
            }




            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$hakmapel->haknilai_id.'">';
            $row[] = $no;
            $row[] =  '<a href="javascript:;">'. $hakmapel->guru_nama.'</a>';
            $row[] = $namamapel;
            $row[] = $namakelas;
            $row[] =  '<span class="label bg-blue-hoki tooltips"> P: <b>'. $hakmapel->haknilai_kkm.'</b> - K: <b>'. $hakmapel->haknilai_kkm2.'</b></span>';
            $row[] =  $metode;
            $row[] = $kirim;      
            $row[] = $status;
            //$row[] = $hakmapel->dob;
 
            //add html for action
            //$row[] = '<a href="javascript:void()" onclick="edit_data('."'".$hakmapel->haknilai_id."'".')" class="btn btn-sm blue"><i class="fa fa-edit"></i> Edit</a><a href="javascript:void()" onclick="delete_data('."'".$hakmapel->haknilai_id."'".')" class="btn default btn-sm red"><i class="fa fa-trash-o"></i> Delete</a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->hakmapel_m->count_all(),
                        "recordsFiltered" => $this->hakmapel_m->count_filtered(),
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
    
    

  
 
}