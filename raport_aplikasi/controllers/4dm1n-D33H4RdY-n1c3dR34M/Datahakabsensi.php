<?php
class Datahakabsensi extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('hakabsensi_m');
        $this->load->model('konfigurasi_m');
        $this->load->model('wali_m');

    }

    


    public function index() {

        $this->data['data_guru'] = $this->hakabsensi_m->get_data_guru();
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

        //Load Data View Data Absensi Hak Absensi
        $this->data['subview'] = 'admin/dataabsensi/hakabsensi';
        $this->load->view('admin/admindesain', $this->data);
        
    }

   
    public function cek() {
        $this->db->select('hakabsensi_id, guru_kode, guru_nama, kelas_nama, kelas_kk, hakabsensi_status');
        $this->db->from('raport_hakabsensi');
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_hakabsensi.hakabsensi_kodeguru', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_hakabsensi.hakabsensi_kelas', 'left');
       $query = $this->db->get();
       
        dump($this->db->last_query());
    }
    
    public function ajax_list()
    {
        $list = $this->hakabsensi_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $hakabsensi) {
            $no++;
            
             $datatahun = substr($this->konfigurasi_m->konfig_tahun(), 0, 4);
            $kelastahun = substr($hakabsensi->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $hakabsensi->kelas_nama))));
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
            
            if ($hakabsensi->kelas_nama == NULL ) {
                $datakelas = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="'. $hakabsensi->kelas_kk .' - '. $hakabsensi->kelas_tahun.'">'.$datakelas.'</span>';
            }

            if ($hakabsensi->hakabsensi_status == 1) {
                $status = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-xs btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$hakabsensi->hakabsensi_id.'">';
            $row[] = $no;
            $row[] = '<a href="javascript:;">'.$hakabsensi->guru_nama.'</a>';
            //$row[] =  $hakabsensi->guru_nama;
            $row[] = $datakelas;
            
            //$row[] =  $hakabsensi->guru_pk;
           
            $row[] = $status;
            //$row[] = $hakabsensi->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$hakabsensi->hakabsensi_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void()" onclick="delete_data('."'".$hakabsensi->hakabsensi_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i> Delete</a> ';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->hakabsensi_m->count_all(),
                        "recordsFiltered" => $this->hakabsensi_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }


   public function ajax_tambah()
    {
        $this->_validate();
        $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        //$semester_admin = $this->konfigurasi_m->konfig_semester();
        $data = array(
              
               'hakabsensi_kodeguru' => htmlspecialchars($this->input->post('hakabsensi_kodeguru')),
               'hakabsensi_kelas' => htmlspecialchars($this->input->post('hakabsensi_kelas')),
               'hakabsensi_tahunajaran' => $tahun_ajaran_admin,
               //'hakabsensi_semester' => $semester_admin,
               'hakabsensi_status' => htmlspecialchars($this->input->post('hakabsensi_status')),
               
               
            );
        $this->hakabsensi_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
        $this->_validate_validkelas();
         $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        //$semester_admin = $this->konfigurasi_m->konfig_semester();
        $data = array(

               'hakabsensi_kodeguru' => htmlspecialchars($this->input->post('hakabsensi_kodeguru')),
               'hakabsensi_kelas' => htmlspecialchars($this->input->post('hakabsensi_kelas')),
               'hakabsensi_tahunajaran' => $tahun_ajaran_admin,
               //'hakabsensi_semester' => $semester_admin,
               'hakabsensi_status' => htmlspecialchars($this->input->post('hakabsensi_status')),
               
               
            );
        $this->hakabsensi_m->update(array('hakabsensi_id' => $this->input->post('hakabsensi_id')), $data);
        echo json_encode(array("status" => TRUE));
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



     private function _validate_validkelas()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['edit_error'] = array();
        $data['status'] = TRUE;


        if (count($this->validkelas($this->input->post('hakabsensi_kelas'))) <= 0 ) {
            $data['inputerror'][] = 'hakabsensi_kelas';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kelas : <b>'. $this->get_kelas($this->input->post('hakabsensi_kelas'),$this->input->post('hakabsensi_kelascek')).'</b>, tidak masuk dalam daftar kelas pada tahun ajaran:<b> '.$this->konfigurasi_m->konfig_tahun().'</b>, segera untuk <b>mereload halaman page</b>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    public function ajax_delete($id)
    {
        $this->hakabsensi_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->hakabsensi_m->ajax_multiple_delete($ids);  
    }

     public function ajax_edit($id)
    {   

        $data = $this->hakabsensi_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

     public function datakelas()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('hakabsensi_id');
        $this->db->where('hakabsensi_kelas', $this->input->post('hakabsensi_kelas'));        
        !$id || $this->db->where('hakabsensi_id !=', $id);
        $this->db->where('hakabsensi_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        //$this->db->where('hakabsensi_semester', $this->konfigurasi_m->konfig_semester());
        $datasiswa = $this->hakabsensi_m->get();
    
        return $datasiswa;
    }


     private function get_data_kelas($id) {

         $query = $this->db->query('SELECT kelas_nama FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
           
        }

        return $row->kelas_nama;
    }

    private function get_guru($id) {
         $query = $this->db->query('SELECT guru_nama FROM raport_hakabsensi LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_hakabsensi.hakabsensi_kodeguru WHERE hakabsensi_kelas="'.$this->db->escape_str($id).'" AND hakabsensi_tahunajaran="'.$this->konfigurasi_m->konfig_tahun().'"');
       
        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }


     private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
         if (count($this->datakelas())) {
            $data['inputerror'][] = 'hakabsensi_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf kelas : <b>'. $this->get_kelas($this->input->post('hakabsensi_kelas'),$this->input->post('hakabsensi_kelascek')).'</b>, sudah memiliki penginput data hak absensi yaitu : <b>'. $this->get_guru($this->input->post('hakabsensi_kelas')).'</b>.';
            $data['status'] = FALSE;
        }
       
        

         if($this->input->post('hakabsensi_kelas') == '')
        {
            $data['inputerror'][] = 'hakabsensi_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('hakabsensi_kodeguru') == '')
        {
            $data['inputerror'][] = 'hakabsensi_kodeguru';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

        

       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
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