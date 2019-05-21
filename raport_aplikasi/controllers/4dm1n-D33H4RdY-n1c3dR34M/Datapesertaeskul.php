<?php
class Datapesertaeskul extends Adminraport_Controller {

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
        $this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

        //Load Data View Data Absensi
        $this->data['subview'] = 'admin/datapesertaeskul/index';
        $this->load->view('admin/admindesain', $this->data);
        
    }

  

    public function cek() {
        $this->db->select('pesertaeskul_id,pesertaeskul_nis,siswa_nama,siswa_kelas,kelas_nama,kelas_tahun,pesertaeskul_status,pesertaeskul_status, eskul_nama, kelas_kk');
        $this->db->from('raport_pesertaeskul');
        $this->db->join('raport_eskul', 'raport_eskul.eskul_id = raport_pesertaeskul.pesertaeskul_dataeskul', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_pesertaeskul.pesertaeskul_kelas', 'left');
        $this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_pesertaeskul.pesertaeskul_nis', 'left');
        $this->db->where('pesertaeskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
         $query = $this->db->get();
       
        dump($this->db->last_query());
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

             $datatahun = substr($this->konfigurasi_m->konfig_tahun(), 0, 4);
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
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$pesertaeskul->pesertaeskul_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_data('."'".$pesertaeskul->pesertaeskul_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a>
                  ';
         
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

    private function validkelas($did)
    {

          $datakelas3 = $this->konfigurasi_m->konfig_tahun();
          $datakelas2 = (substr($this->konfigurasi_m->konfig_tahun(), 0, 4) + 1);
          $datakelas1 = (substr($this->konfigurasi_m->konfig_tahun(), 0, 4) +2);

         $set_kelas_1= $datakelas1.'/'.($datakelas1+1);
         $set_kelas_2 = $datakelas2.'/'.($datakelas2+1);
         $set_kelas_3 = $this->konfigurasi_m->konfig_tahun();
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query('SELECT DISTINCT `kelas_nama`,`kelas_code`,`kelas_tahun` FROM `raport_kelas` WHERE (`kelas_tahun` = "'.$set_kelas_1.'" OR `kelas_tahun` = "'.$set_kelas_2.'" OR `kelas_tahun` = "'.$set_kelas_3.'") AND `kelas_code`="'.$this->db->escape_str($did).'"');
        //$query = $this->db->get();
        
        return $query->row();
    }


   public function ajax_tambah()
    {
        $this->_validate();
        $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $data = array(
               'pesertaeskul_nis' => htmlspecialchars($this->input->post('pesertaeskul_nis')),
               //'pesertaeskul_kelas' => htmlspecialchars($this->input->post('pesertaeskul_kelas')),
               'pesertaeskul_dataeskul' => htmlspecialchars($this->input->post('pesertaeskul_dataeskul')),
               'pesertaeskul_tahunajaran' => $tahun_ajaran_admin,
               'pesertaeskul_status' => 1,
               
            );
        $this->pesertaeskul_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate_update();
        $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $semester_admin = $this->konfigurasi_m->konfig_semester();
        $data = array(
               'pesertaeskul_nis' => htmlspecialchars($this->input->post('pesertaeskul_nis')),
               //'pesertaeskul_kelas' => htmlspecialchars($this->input->post('pesertaeskul_kelas')),
               'pesertaeskul_dataeskul' => htmlspecialchars($this->input->post('pesertaeskul_dataeskul')),
               'pesertaeskul_tahunajaran' => $tahun_ajaran_admin,
               'pesertaeskul_status' => htmlspecialchars($this->input->post('pesertaeskul_status')),
               
               
            );
        $this->pesertaeskul_m->update(array('pesertaeskul_id' => $this->input->post('pesertaeskul_id')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_delete($id)
    {
        $this->pesertaeskul_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->pesertaeskul_m->ajax_multiple_delete($ids);  
    }

     public function ajax_edit($id)
    {   

        $data = $this->pesertaeskul_m->get_datapeserta_eskul($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

     public function cari_siswa_aktif( $id = NULL) {

      $tmp  = '';
        $data   = $this->pesertaeskul_m->get_data_siswa_aktif_saring($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->siswa_nis."'>".$row->siswa_nis." - ".$row->siswa_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

     private function datasiswa()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('pesertaeskul_id');
        $this->db->where('pesertaeskul_nis', $this->input->post('pesertaeskul_nis'));
        $this->db->where('pesertaeskul_dataeskul', $this->input->post('pesertaeskul_dataeskul'));        
        !$id || $this->db->where('pesertaeskul_id !=', $id);
        $this->db->where('pesertaeskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $datasiswa = $this->pesertaeskul_m->get();
    
        return $datasiswa;
    }


     private function get_data_siswa($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');
        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;
    }

    private function get_data_eskul($id) {
        $query = $this->db->query('SELECT eskul_nama FROM raport_eskul WHERE eskul_id="'.$this->db->escape_str($id).'"');
        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->eskul_nama;
           
        }

        return $row->eskul_nama;
    }

     private function cari_kelas() {
        $datakelas3 = $this->konfigurasi_m->konfig_tahun();
        $datakelas2 = (substr($this->konfigurasi_m->konfig_tahun(), 0, 4) + 1);
        $datakelas1 = (substr($this->konfigurasi_m->konfig_tahun(), 0, 4) +2);
        
        $set_kelas_1= $datakelas1.'/'.($datakelas1+1);
        $set_kelas_2 = $datakelas2.'/'.($datakelas2+1);
        $set_kelas_3 = $this->konfigurasi_m->konfig_tahun();
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
            $tmp .= '<optgroup label="Eskul Non Wajib - TH: '.$this->konfigurasi_m->konfig_tahun().'">';
            
            foreach($data1 as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
           $tmp .= '<optgroup label="Eskul Non Wajib - TH: '.$this->konfigurasi_m->konfig_tahun().'">';
            $tmp .= "<option value=''>Data Eskul Kosong</option>";
             $tmp .= "</optgroup>";
            
        }

           
     
        return $tmp;

     }

     private function get_kelas($id, $kelascek) {
        $query = $this->db->query('SELECT kelas_nama,kelas_tahun FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();
        $datatahun = substr($this->konfigurasi_m->konfig_tahun(), 0, 4);
            $kelastahun = substr($row->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
            $dataakhir = ($kelastahun - $datatahun);

            if ($dataakhir == 0) {
                $datakelas = 'XII'.$kelasku;
             } elseif ($dataakhir == 1) {
                 $datakelas = 'XI'.$kelasku;
             } elseif ($dataakhir == 2) {
                 $datakelas = 'X'.$kelasku;
             } else {
                $datakelas = $kelascek;
             }
         $row->kelas_nama;
           
        }

        return $datakelas.' : '.$row->kelas_tahun;

    }
    
      private function _validate_validkelas()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['edit_error'] = array();
        $data['status'] = TRUE;


        if (count($this->validkelas($this->input->post('pesertaeskul_kelas'))) <= 0 ) {
            $data['inputerror'][] = 'pesertaeskul_kelas';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kelas : <b>'. $this->get_kelas($this->input->post('pesertaeskul_kelas'),$this->input->post('pesertaeskul_kelascek')).'</b>, tidak masuk dalam daftar kelas pada tahun ajaran:<b> '.$this->konfigurasi_m->konfig_tahun().'</b>, segera untuk <b>mereload halaman page</b>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
         
       
        if (count($this->datasiswa())) {
            $data['inputerror'][] = 'pesertaeskul_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data siswa dengan nama : <b>'. $this->get_data_siswa($this->input->post('pesertaeskul_nis')).'</b>, sudah mengikuti eskul : <b>'. $this->get_data_eskul($this->input->post('pesertaeskul_dataeskul')).'</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pesertaeskul_kelas') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('pesertaeskul_nis') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pesertaeskul_dataeskul') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_dataeskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>data eskul</b>.';
            $data['status'] = FALSE;
        }

      
       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validate_update()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
          if (count($this->datasiswa())) {
            $data['inputerror'][] = 'pesertaeskul_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data siswa dengan nama : <b>'. $this->get_data_siswa($this->input->post('pesertaeskul_nis')).'</b>, sudah mengikuti eskul : <b>'. $this->get_data_eskul($this->input->post('pesertaeskul_dataeskul')).'</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pesertaeskul_kelas') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('pesertaeskul_nis') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pesertaeskul_dataeskul') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_dataeskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>data eskul</b>.';
            $data['status'] = FALSE;
        }
      

         if($this->input->post('pesertaeskul_status') == '')
        {
            $data['inputerror'][] = 'pesertaeskul_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>status peserta</b>.';
            $data['status'] = FALSE;
        }

      
       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }



   
}