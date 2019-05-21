<?php
class Datasiswa extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->model('password_siswa_m');
        $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->load->library("PHPExcel");
        $this->load->library('tanggal');
        $this->load->model('konfigurasi_m');
        $this->real_path = realpath('raport_files/foto/siswa/real/');
        $this->full_path = realpath('raport_files/foto/siswa/full/');
        $this->thumb_path = realpath('raport_files/foto/siswa/thumbnail/');
        
    }

    

    public function siswaaktif() {
        $this->data['data_angkatan_aktif'] = $this->siswa_m->get_data_angkatan_aktif();
        $this->data['data_kelas_aktif'] = $this->siswa_m->get_data_kelas_aktif();

        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        //Load Data View Data Siswa Aktif
        $this->data['subview'] = 'siswa/datasiswa/siswaaktif';
        $this->load->view('siswa/admindesain', $this->data);
        
    }

   


    public function siswatidakaktif() {

         $this->data['data_angkatan'] = $this->siswa_m->get_data_angkatan();
        $this->data['data_kelas'] = $this->siswa_m->get_data_kelas();

          $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        
        //Load Data View Data Siswa Tidak Aktif
        $this->data['subview'] = 'siswa/datasiswa/siswatidakaktif';
        $this->load->view('siswa/admindesain', $this->data);
        
    }

    

     public function lihat_data_siswa($id)
    {   
      
        $data = $this->siswa_m->get_data_siswa($id);
        
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }


   

    public function ajax_list_siswa_aktif()
    {
        $list = $this->siswa_m->get_datatables_siswa_aktif();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            
            if ($siswa->siswa_status == 1) {
                $status = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif</span>';
            } elseif ($siswa->siswa_status == 2) {
                $status = '<span class="label label-primary">Alumni</span>';
            } elseif ($siswa->siswa_status == 3) {
                $status = '<span class="label label-info">Pindah</span>';
            } elseif ($siswa->siswa_status == 4) {
                $status = '<span class="label label-success">ALM</span>';
            } else {
                $status = '<span class="label label-danger"> Keluar</span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$siswa->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span>';
            $row[] = $siswa->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .'-'. $siswa->kelas_kk.'">'. $siswa->kelas_nama.'</span>';
            //$row[] =  $siswa->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $siswa->siswa_absen. '</span>';
            $row[] =  $siswa->kelas_tahun;
            $row[] =  $status;
           
            //$row[] = $siswa->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="lihat_data_siswa('."'".$siswa->siswa_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i> Lihat Data</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->siswa_m->count_all_siswa_aktif(),
                        "recordsFiltered" => $this->siswa_m->count_filtered_siswa_aktif(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }


    public function ajax_list_siswa_tidak_aktif()
    {
        $list = $this->siswa_m->get_datatables_siswa_tidak_aktif();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            
            if ($siswa->siswa_status == 1) {
                $status = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif</span>';
            } elseif ($siswa->siswa_status == 2) {
                $status = '<span class="label label-primary">Alumni</span>';
            } elseif ($siswa->siswa_status == 3) {
                $status = '<span class="label label-info">Pindah</span>';
            } elseif ($siswa->siswa_status == 4) {
                $status = '<span class="label label-success">ALM</span>';
            } else {
                $status = '<span class="label label-danger"> Keluar</span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$siswa->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span>';
            $row[] = $siswa->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .'-'. $siswa->kelas_kk.'">'. $siswa->kelas_nama.'</span>';
            //$row[] =  $siswa->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $siswa->siswa_absen. '</span>';
            $row[] =  $siswa->kelas_tahun;
            $row[] =  $status;
           
            //$row[] = $siswa->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="lihat_data_siswa('."'".$siswa->siswa_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i> Lihat Data</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->siswa_m->count_all_siswa_tidak_aktif(),
                        "recordsFiltered" => $this->siswa_m->count_filtered_siswa_tidak_aktif(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }


    

     public function cari_kelas( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_saring($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->kelas_code."'>".$row->kelas_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

     public function cari_kelas_aktif( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_aktif_saring($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->kelas_code."'>".$row->kelas_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

      

    
}