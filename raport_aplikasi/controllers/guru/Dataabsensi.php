<?php
class Dataabsensi extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('absensi_m');
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');

    }

    


    public function tambahdata() {

      
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        if (count($this->absensi_m->statusabsensi())) {
          $this->data['subview'] = 'guru/dataabsensi/tambah';
        } else {
          $this->data['subview'] = 'guru/accessdenied/Absensi';
        }
        //Load Data View Data Absensi
        
        $this->load->view('guru/admindesain', $this->data);
        
    }

    

    public function lihatdata() {

      
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Absensi
        $this->data['subview'] = 'guru/dataabsensi/index';
        $this->load->view('guru/admindesain', $this->data);
        
    }

    public function hakabsensi() {

         $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        
        //Load Data View Data Absensi Hak Absensi
        $this->data['subview'] = 'guru/dataabsensi/hakabsensi';
        $this->load->view('guru/admindesain', $this->data);
        
    }

   
    public function ajax_list()
    {
        $list = $this->absensi_m->get_datatables_guru();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $absensi) {
            $no++;
            
            if ($absensi->absensi_keterangan == 'SAKIT') {
                $dataabsensi = '<span class="badge bg-red-sunglo label-sm">SAKIT</span>';
            } elseif ($absensi->absensi_keterangan == 'IZIN') {
                $dataabsensi = '<span class="badge bg-green-jungle label-sm"> IZIN </span>';
            } elseif ($absensi->absensi_keterangan == 'ALPA') {
                $dataabsensi = '<span class="badge bg-blue-chambray label-sm"> ALPA </span>';
            } 
            
           
            if ($absensi->absensi_nis == NULL ) {
                $datanis = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datanis = '<span class="label bg-blue-hoki">'. $absensi->absensi_nis.'</span>';
            }

            if ($absensi->siswa_nama == NULL ) {
                $datanama = '<span class="label bg-grey">DATA SISWA TELAH DIHAPUS</span>';
            } else {
                $datanama = $absensi->siswa_nama;
            }

             $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
            $kelastahun = substr($absensi->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $absensi->kelas_nama))));
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


              if ($absensi->kelas_nama == NULL ) {
                $datakelas = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="Penginput : '. $absensi->guru_nama .'- Angkatan : '.$absensi->kelas_tahun.'">'.$datakelas.'</span>';
            }


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$absensi->absensi_id.'">';
            $row[] = $no;
            $row[] = $datanis;
            $row[] =  $datanama;
            $row[] = $datakelas;
            $row[] =  $dataabsensi;
            //$row[] =  $absensi->guru_pk;
           
            $row[] = $this->data_tanggal($absensi->absensi_waktu);
            //$row[] = $absensi->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$absensi->absensi_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_data('."'".$absensi->absensi_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a>
                  ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->absensi_m->count_all_guru(),
                        "recordsFiltered" => $this->absensi_m->count_filtered_guru(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }


    public function ajax_list_all()
    {
        $list = $this->absensi_m->get_datatables_guru_all();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $absensi) {
            $no++;
            
            if ($absensi->absensi_keterangan == 'SAKIT') {
                $dataabsensi = '<span class="badge bg-red-sunglo label-sm">SAKIT</span>';
            } elseif ($absensi->absensi_keterangan == 'IZIN') {
                $dataabsensi = '<span class="badge bg-green-jungle label-sm"> IZIN </span>';
            } elseif ($absensi->absensi_keterangan == 'ALPA') {
                $dataabsensi = '<span class="badge bg-blue-chambray label-sm"> ALPA </span>';
            } 
            
           
            if ($absensi->absensi_nis == NULL ) {
                $datanis = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datanis = '<span class="label bg-blue-hoki">'. $absensi->absensi_nis.'</span>';
            }

            if ($absensi->siswa_nama == NULL ) {
                $datanama = '<span class="label bg-grey">DATA SISWA TELAH DIHAPUS</span>';
            } else {
                $datanama = $absensi->siswa_nama;
            }

             $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
            $kelastahun = substr($absensi->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $absensi->kelas_nama))));
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


              if ($absensi->kelas_nama == NULL ) {
                $datakelas = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="Penginput : '. $absensi->guru_nama .'- Angkatan : '.$absensi->kelas_tahun.'">'.$datakelas.'</span>';
            }


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$absensi->absensi_id.'">';
            $row[] = $no;
            $row[] = $datanis;
            $row[] =  $datanama;
            $row[] = $datakelas;
            $row[] =  $dataabsensi;
            //$row[] =  $absensi->guru_pk;
           
            $row[] = $this->data_tanggal($absensi->absensi_waktu);
            //$row[] = $absensi->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->absensi_m->count_all_guru_all(),
                        "recordsFiltered" => $this->absensi_m->count_filtered_guru_all(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    private function validkelas($did)
    {

          $datakelas3 = $this->konfigurasi_m->konfig_tahun_client();
          $datakelas2 = (substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4) + 1);
          $datakelas1 = (substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4) +2);

         $set_kelas_1= $datakelas1.'/'.($datakelas1+1);
         $set_kelas_2 = $datakelas2.'/'.($datakelas2+1);
         $set_kelas_3 = $this->konfigurasi_m->konfig_tahun_client();
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
        $tahun_ajaran_client = $this->konfigurasi_m->konfig_tahun_client();
        $semester_client = $this->konfigurasi_m->konfig_semester_client();
        $data = array(
               'absensi_nis' => htmlspecialchars($this->input->post('absensi_nis')),
               'absensi_kodeguru' => $this->session->userdata('user_login'),
               //'absensi_kelas' => htmlspecialchars($this->input->post('absensi_kelas')),
               'absensi_keterangan' => htmlspecialchars($this->input->post('absensi_keterangan')),
               'absensi_waktu' => htmlspecialchars($this->input->post('absensi_waktu')),
               'absensi_tahunajaran' => $tahun_ajaran_client,
               'absensi_semester' => $semester_client,
               
            );
        $this->absensi_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
        $this->_validate_validkelas();
        $tahun_ajaran_client = $this->konfigurasi_m->konfig_tahun_client();
        $semester_client = $this->konfigurasi_m->konfig_semester_client();
        $data = array(
               'absensi_nis' => htmlspecialchars($this->input->post('absensi_nis')),
               'absensi_kodeguru' => $this->session->userdata('user_login'),
               //'absensi_kelas' => htmlspecialchars($this->input->post('absensi_kelas')),
               'absensi_keterangan' => htmlspecialchars($this->input->post('absensi_keterangan')),
               'absensi_waktu' => htmlspecialchars($this->input->post('absensi_waktu')),
               'absensi_tahunajaran' => $tahun_ajaran_client,
               'absensi_semester' => $semester_client,
               
               
            );
        $this->absensi_m->update(array('absensi_id' => $this->input->post('absensi_id')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_delete($id)
    {
        $this->_validate_hapus($this->get_datakelas($id));
        $this->absensi_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_multiple_delete(){
           $ids = (explode( ',', $this->input->get_post('ids') ));
          foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->_validate_hapus_multiple($this->get_datakelas($did));
            $this->_validate_hapus($this->get_datakelas($did));
          }
        
         $this->absensi_m->ajax_multiple_delete_absensi($ids);  
    }

    

     public function ajax_edit($id)
    {   

        $data = $this->absensi_m->get_datasiswa_absensi($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

     public function cari_siswa_aktif( $id = NULL) {

      $tmp  = '';
        $data   = $this->absensi_m->get_data_siswa_aktif_saring($id);
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
    
        $id = $this->input->post('absensi_id');
        $this->db->where('absensi_nis', $this->input->post('absensi_nis'));
        $this->db->where('absensi_waktu', $this->input->post('absensi_waktu'));        
        !$id || $this->db->where('absensi_id !=', $id);
        $datasiswa = $this->absensi_m->get();
    
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

     private function cari_kelas() {
        $datakelas3 = $this->konfigurasi_m->konfig_tahun_client();
        $datakelas2 = (substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4) + 1);
        $datakelas1 = (substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4) +2);
        
        $set_kelas_1= $datakelas1.'/'.($datakelas1+1);
        $set_kelas_2 = $datakelas2.'/'.($datakelas2+1);
        $set_kelas_3 = $this->konfigurasi_m->konfig_tahun_client();
        $tmp  = '';
        $data3   = $this->wali_m->get_data_kelas_saring_guru($set_kelas_3);
        $data2   = $this->wali_m->get_data_kelas_saring_guru($set_kelas_2);
        $data1  = $this->wali_m->get_data_kelas_saring_guru($set_kelas_1);
        


         if(!empty($data1)){
          $tmp .= '<optgroup label="Angkatan '.$set_kelas_1.'">';
            
            foreach($data1 as $row) {
                 $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
                $tmp .= "<option value='".$row->kelas_code."'>X".$kelasku."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
           $tmp .= "";
            
        }

           if(!empty($data2)){
            
            $tmp .= '<optgroup label="Angkatan '.$set_kelas_2.'">';
           
            foreach($data2 as $row) {
                $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
                $tmp .= "<option value='".$row->kelas_code."'>XI".$kelasku."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
            $tmp .= "";
            
        }


        if(!empty($data3)){
            
            $tmp .= '<optgroup label="Angkatan '.$set_kelas_3.'">';
           
            foreach($data3 as $row) {
                $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));
                $tmp .= "<option value='".$row->kelas_code."'>XII".$kelasku."</option>";
            }

             $tmp .= "</optgroup>";
        } else {
            $tmp .= "";
            
        }


     
        return $tmp;

     }

     private function get_kelas($id, $kelascek) {
        $query = $this->db->query('SELECT kelas_nama,kelas_tahun FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();
        $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
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


        if (count($this->validkelas($this->input->post('absensi_kelas'))) <= 0 ) {
            $data['inputerror'][] = 'absensi_kelas';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kelas : <b>'. $this->get_kelas($this->input->post('absensi_kelas'),$this->input->post('absensi_kelascek')).'</b>, tidak masuk dalam daftar kelas pada tahun ajaran:<b> '.$this->konfigurasi_m->konfig_tahun_client().'</b>, segera untuk <b>mereload halaman page</b>.';
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
            $data['inputerror'][] = 'absensi_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data siswa dengan nama : <b>'. $this->get_data_siswa($this->input->post('absensi_nis')).'</b>, sudah memiliki data absensi pada hari: <b>'. $this->data_tanggal($this->input->post('absensi_waktu')).'</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('absensi_kelas') == '')
        {
            $data['inputerror'][] = 'absensi_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('absensi_nis') == '')
        {
            $data['inputerror'][] = 'absensi_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('absensi_waktu') == '')
        {
            $data['inputerror'][] = 'absensi_waktu';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>waktu absen</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('absensi_keterangan') == '')
        {
            $data['inputerror'][] = 'absensi_keterangan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>keterangan absen</b>.';
            $data['status'] = FALSE;
        }

        if ($this->absensi_m->statusabsensi_cek($this->input->post('absensi_kelas')) !== 1 && trim($this->input->post('absensi_nis') !== '') && trim($this->input->post('absensi_nis') !== NULL) && trim($this->input->post('absensi_nis') !== '-') && trim($this->input->post('absensi_waktu') !== '') && trim($this->input->post('absensi_waktu') !== NULL) && trim($this->input->post('absensi_waktu') !== '-') && trim($this->input->post('absensi_keterangan') !== '') && trim($this->input->post('absensi_keterangan') !== NULL) && trim($this->input->post('absensi_keterangan') !== '-') && trim($this->input->post('absensi_kelas') !== '') && trim($this->input->post('absensi_kelas') !== NULL) && trim($this->input->post('absensi_kelas') !== '-')) {
          $data['inputerror'][] = 'absensi_keterangan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b> saat ini anda <b>tidak memiliki hak</b> untuk mengakses/menginput <b>data absensi siswa</b> pada kelas : <b>'.$this->get_namakelas($this->input->post('absensi_kelas')).'</b>:<b>'.$this->get_tahunkelas($this->input->post('absensi_kelas')).'</b> tahun ajaran : <b>'.$this->konfigurasi_m->konfig_tahun_client().'</b>.';
            $data['status'] = FALSE;
        }

       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    private function _validate_hapus($datahapus)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

        if ($this->absensi_m->statusabsensi_cek($datahapus) !== 1) {
          $data['inputerror'][] = 'absensi_keterangan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b> saat ini anda <b>tidak memiliki hak</b> untuk mengakses/menginput <b>data absensi siswa</b> pada kelas : <b>'.$this->get_namakelas($this->get_datakelas($datahapus)).'</b>:<b>'.$this->get_tahunkelas($this->get_datakelas($datahapus)).'</b> tahun ajaran : <b>'.$this->konfigurasi_m->konfig_tahun_client().'</b>.';
            $data['status'] = FALSE;
        }

       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_hapus_multiple($datahapus)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
           if ($this->input->post('ids') == '') {
             $data['inputerror'][] = 'absensi_hapus';
             $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data yang akan dihapus !!!.';
            $data['status'] = FALSE;
          }
       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     
    private function get_namaguru() {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    private function get_namakelas($id) {
        $query = $this->db->query('SELECT kelas_nama FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
         
         return $row->kelas_nama;

        } else {
         
         return FALSE;
        
        }

    }

    private function get_tahunkelas($kelas) {
        $query = $this->db->query('SELECT kelas_tahun FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($kelas).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tahun;
           
        }

        return $row->kelas_tahun;

    }


    private function get_datakelas($datahapus) {
        $query = $this->db->query('SELECT siswa_kelas FROM raport_absensi LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_absensi.absensi_nis WHERE absensi_id="'.$this->db->escape_str($datahapus).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_kelas;
         return $row->siswa_kelas;           
        
        } else {

         return ' '; 
        }

        

    }


    private function data_tanggal($data) {

        $timezone = config_item('erapor_timezone');
            if (function_exists ( 'date_default_timezone_set' ))
                date_default_timezone_set ( $timezone );
                // input tanggal hari ini
            //$datatanggal = $this->ambiltanggal();
        //$tanggalku = $datatanggal['datatanggal'];
        //$tanggal_now = date('Y/m/d');
        //$tanggal_absensi = substr($tanggalku,0,10);

            $tanggal = date($data);
            
            // konversi ke fungsi tanggal
            $ts_absensi = strtotime ( $tanggal );
            // tanggal dipecah menurut hari bulan tahun
            $hari_absensi = date ( 'w', $ts_absensi );
            $tgl_absensi = date ( 'd', $ts_absensi );
            $bln_absensi = date ( 'm', $ts_absensi );
            $thn_absensi = date ( 'Y', $ts_absensi );


            
            // pemberian nama hari Indonesia
            switch ($hari_absensi) {
                case 0 :
                    {
                        $hari_absensi = 'Minggu';
                    }
                    break;
                case 1 :
                    {
                        $hari_absensi = 'Senin';
                    }
                    break;
                case 2 :
                    {
                        $hari_absensi = 'Selasa';
                    }
                    break;
                case 3 :
                    {
                        $hari_absensi = 'Rabu';
                    }
                    break;
                case 4 :
                    {
                        $hari_absensi = 'Kamis';
                    }
                    break;
                case 5 :
                    {
                        $hari_absensi = "Jum'at";
                    }
                    break;
                case 6 :
                    {
                        $hari_absensi = 'Sabtu';
                    }
                    break;
                // pemberian nama default jika tidak ada nama bulan
                default :
                    {
                        $hari_absensi = 'Tidak Terdeteksi';
                    }
                    break;
            }
            // pemberian nama bulan Indonesia
            switch ($bln_absensi) {
                case 1 :
                    {
                        $bln_absensi = 'Januari';
                    }
                    break;
                case 2 :
                    {
                        $bln_absensi = 'Februari';
                    }
                    break;
                case 3 :
                    {
                        $bln_absensi = 'Maret';
                    }
                    break;
                case 4 :
                    {
                        $bln_absensi = 'April';
                    }
                    break;
                case 5 :
                    {
                        $bln_absensi = 'Mei';
                    }
                    break;
                case 6 :
                    {
                        $bln_absensi = "Juni";
                    }
                    break;
                case 7 :
                    {
                        $bln_absensi = 'Juli';
                    }
                    break;
                case 8 :
                    {
                        $bln_absensi = 'Agustus';
                    }
                    break;
                case 9 :
                    {
                        $bln_absensi = 'September';
                    }
                    break;
                case 10 :
                    {
                        $bln_absensi = 'Oktober';
                    }
                    break;
                case 11 :
                    {
                        $bln_absensi = 'November';
                    }
                    break;
                case 12 :
                    {
                        $bln_absensi = 'Desember';
                    }
                    break;
                // pemberian nama default jika tidak ada nama bulan
                default :
                    {
                        $bln_absensi = 'Tidak Terdeteksi';
                    }
                    break;
            }

            return $hari_absensi .', '.$tgl_absensi.' '.$bln_absensi.' '.$thn_absensi;



           
    }
   
}