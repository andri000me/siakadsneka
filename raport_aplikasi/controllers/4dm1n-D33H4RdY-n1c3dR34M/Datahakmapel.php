<?php
class Datahakmapel extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('hakmapel_m');
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');
        
    }

    public function index() {
    	   $this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

        $this->data['data_guru'] = $this->hakmapel_m->get_data_guru();
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['data_mapel'] = $this->hakmapel_m->get_data_mapel_global();

    	//Load Data View Data Wali
    	$this->data['subview'] = 'admin/datahakmapel/index';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

    public function cek() {

        $this->db->select('haknilai_id,guru_nama,mapel_nama,kelas_nama,kelas_kk, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kirim,haknilai_status');
        $this->db->from('raport_haknilai');
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_haknilai.haknilai_kodeguru', 'left');
        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = raport_haknilai.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_haknilai.haknilai_kelas', 'left');
         $this->db->distinct();
       $query = $this->db->get();
       
     dump($this->db->last_query());
    }

    public function ajax_list()
    {
        $list = $this->hakmapel_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $hakmapel) {
            $no++;
            
            $datatahun = substr($this->konfigurasi_m->konfig_tahun(), 0, 4);
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
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$hakmapel->haknilai_id."'".')" class="btn btn-sm blue"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void()" onclick="delete_data('."'".$hakmapel->haknilai_id."'".')" class="btn default btn-sm red"><i class="fa fa-trash-o"></i> Delete</a> ';
         
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

    public function ajax_edit($id)
    {   

        $data = $this->hakmapel_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

    public function ajax_add()
    {
        $this->_validate();
        $this->_validate_validkelas();
        if ($this->input->post('haknilai_kkm') == 80) {
            $kkm2 = '3.00';
        } else if ($this->input->post('haknilai_kkm') == 75) {
            $kkm2 = '2.75';
        } 
        
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        //$semester_admin = $this->konfigurasi_m->konfig_semester();
        $data = array(
               'haknilai_id' => $this->input->post('haknilai_id'),
               'haknilai_kodeguru' => htmlspecialchars($this->input->post('haknilai_kodeguru')),
               'haknilai_mapel' => htmlspecialchars($this->input->post('haknilai_mapel')),
               'haknilai_kelas' => htmlspecialchars($this->input->post('haknilai_kelas')),
               'haknilai_kkm' => htmlspecialchars($this->input->post('haknilai_kkm')),
               'haknilai_kkm2' => htmlspecialchars($this->input->post('haknilai_kkm2')),
               'haknilai_tahunajaran' => $tahun_ajaran_admin,
               //'haknilai_semester' => $semester_admin,
               'haknilai_metode' => htmlspecialchars($this->input->post('haknilai_metode')),
               'haknilai_status' => htmlspecialchars($this->input->post('haknilai_status')),
               
            );
        $this->hakmapel_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
        $this->_validate_validkelas();
         $this->_validate2();
        if ($this->input->post('haknilai_kkm') == 80) {
            $kkm2 = '3.00';
        } else if ($this->input->post('haknilai_kkm') == 75) {
            $kkm2 = '2.75';
        }

        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        //$semester_admin = $this->konfigurasi_m->konfig_semester(); 
        $data = array(
                'haknilai_id' => $this->input->post('haknilai_id'),
               'haknilai_kodeguru' => htmlspecialchars($this->input->post('haknilai_kodeguru')),
               'haknilai_mapel' => htmlspecialchars($this->input->post('haknilai_mapel')),
               'haknilai_kelas' => htmlspecialchars($this->input->post('haknilai_kelas')),
               'haknilai_kkm' => htmlspecialchars($this->input->post('haknilai_kkm')),
               'haknilai_kkm2' => htmlspecialchars($this->input->post('haknilai_kkm2')),
               'haknilai_tahunajaran' => $tahun_ajaran_admin,
               //'haknilai_semester' => $semester_admin,
               'haknilai_metode' => htmlspecialchars($this->input->post('haknilai_metode')),
               'haknilai_status' => htmlspecialchars($this->input->post('haknilai_status')),
                
            );
        $this->hakmapel_m->update(array('haknilai_id' => $this->input->post('haknilai_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->_validate3($id);
        $this->hakmapel_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));

         $this->hakmapel_m->ajax_multiple_delete_hakmapel($ids);  
    }

    private function kodeguru()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('haknilai_id');
        $this->db->where('haknilai_kodeguru', $this->input->post('haknilai_kodeguru'));
        !$id || $this->db->where('haknilai_id !=', $id);

        $kodeguru = $this->hakmapel_m->get();
    
        return $kodeguru;
    }

     private function namakelas()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('haknilai_id');
        $this->db->where('haknilai_kelas', $this->input->post('haknilai_kelas'));
        !$id || $this->db->where('haknilai_id !=', $id);
        $namakelas = $this->hakmapel_m->get();
    
        return $namakelas;
    }

    private function duplicate_mapel()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('haknilai_id');
        $this->db->where('haknilai_kelas', $this->input->post('haknilai_kelas'));
        $this->db->where('haknilai_mapel', $this->input->post('haknilai_mapel'));
        !$id || $this->db->where('haknilai_id !=', $id);
        $this->db->where('haknilai_tahunajaran =', $this->konfigurasi_m->konfig_tahun());
        //$this->db->where('haknilai_semester =', $this->konfigurasi_m->konfig_semester());
        $duplicate_mapel = $this->hakmapel_m->get();
    
        return $duplicate_mapel;
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


    private function get_mapel($id) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->mapel_nama;
           
        }
        return $row->mapel_nama;
        
    }

     private function get_kelas($id,$kelascek) {
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

     private function get_status_kirim($id) {
        $query = $this->db->query('SELECT haknilai_kirim FROM raport_haknilai WHERE haknilai_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->haknilai_kirim;
           
        }

        return $row->haknilai_kirim;

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
    
    

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['edit_error'] = array();
        $data['status'] = TRUE;
       

        if (count($this->duplicate_mapel())) {
           $data['inputerror'][] = 'haknilai_mapel';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Mapel <b>'.$this->get_mapel($this->input->post('haknilai_mapel')). '</b> yang anda pilih, sudah tersedia pada kelas : <b>'.$this->get_kelas($this->input->post('haknilai_kelas'), $this->input->post('haknilai_kelascek')).'</b>.';
            $data['status'] = FALSE;
        }

       
       
        if($this->input->post('haknilai_kodeguru') == '')
        {
            $data['inputerror'][] = 'haknilai_kodeguru';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('haknilai_kelas') == '')
        {
            $data['inputerror'][] = 'haknilai_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>nama kelas</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('haknilai_mapel') == '')
        {
            $data['inputerror'][] = 'haknilai_mapel';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>nama mapel</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('haknilai_kkm') == '')
        {
            $data['inputerror'][] = 'haknilai_kkm';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>KKM PENGETAHUAN</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('haknilai_kkm2') == '')
        {
            $data['inputerror'][] = 'haknilai_kkm2';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>KKM KETERAMPILAN</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('haknilai_metode') == '')
        {
            $data['inputerror'][] = 'haknilai_metode';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>metode penilaian</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('haknilai_metode') !== '2' && $this->input->post('haknilai_metode') !== '1' && trim($this->input->post('haknilai_metode') !== '') && trim($this->input->post('haknilai_metode') !== NULL))
        {
            $data['inputerror'][] = 'haknilai_metode';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Maaf <b>data metode</b> yang anda masukkan <b>Tidak Valid</b>.';
            $data['status'] = FALSE;
        }

        

       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_validkelas()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['edit_error'] = array();
        $data['status'] = TRUE;


        if (count($this->validkelas($this->input->post('haknilai_kelas'))) <= 0 ) {
            $data['inputerror'][] = 'haknilai_kelas';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kelas : <b>'. $this->get_kelas($this->input->post('haknilai_kelas'), $this->input->post('haknilai_kelascek')).'</b>, tidak masuk dalam daftar kelas pada tahun ajaran:<b> '.$this->konfigurasi_m->konfig_tahun().'</b>, segera untuk <b>mereload halaman page</b>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate2()
    {
        $data = array();
        $data['edit_error'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
       


         if($this->get_status_kirim($this->input->post('haknilai_id')) == 2)
        {
            $data['edit_error'][] = 'Data Tidak Bisa Diedit, Karena <b>Status Nilai Sudah Terkirim';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validate3($id)
    {
        $data = array();
        $data['edit_error'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
       


         if($this->get_status_kirim($id) == 2)
        {
            $data['edit_error'][] = 'Data Tidak Bisa Diedit, Karena <b>Status Nilai Sudah Terkirim';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
    
 
}