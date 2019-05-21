<?php
class Datawali extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');
    }

    public function index() {
    	$this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();
        
    	//Load Data View Data Wali
        $this->data['data_guru'] = $this->wali_m->get_data_guru();
        $this->data['data_kelas'] = $this->cari_kelas();
    	$this->data['subview'] = 'admin/datawali/index';
    	$this->load->view('admin/admindesain', $this->data);
        //dump($this->db->last_query());
    	
    }
    
   
    public function cek() {

        $datakelas3 = $this->konfigurasi_m->konfig_tahun();
        $datakelas2 = (substr($this->konfigurasi_m->konfig_tahun(), 0, 4) + 1);
        $datakelas1 = (substr($this->konfigurasi_m->konfig_tahun(), 0, 4) +2);

         $set_kelas_1= $datakelas1.'/'.($datakelas1+1);
         $set_kelas_2 = $datakelas2.'/'.($datakelas2+1);
         $set_kelas_3 = $this->konfigurasi_m->konfig_tahun();
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query('SELECT DISTINCT `kelas_nama`,`kelas_code`,`kelas_tahun` FROM `raport_kelas` WHERE (`kelas_tahun` = "'.$set_kelas_1.'" OR `kelas_tahun` = "'.$set_kelas_2.'" OR `kelas_tahun` = "'.$set_kelas_3.'") AND `kelas_code`="20"');
        //$query = $this->db->get();
         
    echo count($query->row());
     dump($this->db->last_query());
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


    public function ajax_list()
    {
        $list = $this->wali_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $wali) {
            $no++;
            

            $datatahun = substr($this->konfigurasi_m->konfig_tahun(), 0, 4);
            $kelastahun = substr($wali->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $wali->kelas_nama))));
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
              


            if ($wali->wali_status == 1) {
                $status = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-xs btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            if ($wali->kelas_nama == NULL) {
                $namakelas = '<span class="label label-default tooltips" data-placement="top" data-original-title="Kelas Telah Dihapus">EMPTY</span>';
            } else {
                $namakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="'. $wali->kelas_kk .' - '. $wali->kelas_tahun .'">'.$datakelas.'</span>'; 
            }
            

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$wali->wali_id.'">';
            $row[] = $no;
            $row[] =  '<a href="javascript:;">'. $wali->guru_nama.'</a>';
            $row[] = $namakelas;         
            $row[] = $status;
            //$row[] = $wali->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$wali->wali_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void()" onclick="delete_data('."'".$wali->wali_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i> Delete</a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->wali_m->count_all(),
                        "recordsFiltered" => $this->wali_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    public function ajax_edit($id)
    {   

        $data = $this->wali_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

    public function ajax_add()
    {
        $this->_validate();
         $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $data = array(
               'wali_id' => $this->input->post('wali_id'),
               'wali_kodeguru' => htmlspecialchars($this->input->post('wali_kodeguru')),
               'wali_kelas' => htmlspecialchars($this->input->post('wali_kelas')),
               'wali_tahunajaran' => $tahun_ajaran_admin,
               'wali_status' => htmlspecialchars($this->input->post('wali_status')),
               
            );
        $this->wali_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
        $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $data = array(
                'wali_id' => $this->input->post('wali_id'),
               'wali_kodeguru' => htmlspecialchars($this->input->post('wali_kodeguru')),
               'wali_kelas' => htmlspecialchars($this->input->post('wali_kelas')),
               'wali_tahunajaran' => $tahun_ajaran_admin,
               'wali_status' => htmlspecialchars($this->input->post('wali_status')),
                
            );
        $this->wali_m->update(array('wali_id' => $this->input->post('wali_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->wali_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->wali_m->ajax_multiple_delete($ids);  
    }

    private function kodeguru()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('wali_id');
        $this->db->where('wali_kodeguru', $this->input->post('wali_kodeguru'));
        !$id || $this->db->where('wali_id !=', $id);
        $this->db->where('wali_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $kodeguru = $this->wali_m->get();
    
        return $kodeguru;
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


     private function namakelas()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('wali_id');
        $this->db->where('wali_kelas', $this->input->post('wali_kelas'));
        !$id || $this->db->where('wali_id !=', $id);
        $this->db->where('wali_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $namakelas = $this->wali_m->get();
    
        return $namakelas;
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



     private function get_guru($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    private function get_guru_kelas($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_wali LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_wali.wali_kodeguru LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kelas="'.$this->db->escape_str($id).'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun().'"');
        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;
    }

    private function get_kelas_guru($id) {
        $query = $this->db->query('SELECT kelas_nama,kelas_tahun FROM raport_wali LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_wali.wali_kodeguru LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE guru_kode="'.$this->db->escape_str($id).'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun().'"');
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
                $datakelas = $row->kelas_nama;
             }
              
         $row->kelas_nama;
           
        }

         return $datakelas.' : '.$row->kelas_tahun;
    }
    
    

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


       

         if (count($this->kodeguru())) {
            $data['inputerror'][] = 'wali_kodeguru';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf Guru : <b>'. $this->get_guru($this->input->post('wali_kodeguru')).'</b>, sudah menjadi wali untuk kelas : <b>'. $this->get_kelas_guru($this->input->post('wali_kodeguru')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->namakelas())) {
            $data['inputerror'][] = 'wali_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf Kelas <b>'. $this->get_kelas($this->input->post('wali_kelas'),$this->input->post('wali_kelascek')) .'</b>, sudah memiliki Guru Wali : <b> '. $this->get_guru_kelas($this->input->post('wali_kelas')).'</b>.';
            $data['status'] = FALSE;
        }

       
       
        if($this->input->post('wali_kodeguru') == '')
        {
            $data['inputerror'][] = 'wali_kodeguru';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('wali_kelas') == '')
        {
            $data['inputerror'][] = 'wali_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>nama kelas</b>.';
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
        $data['status'] = TRUE;


        if (count($this->validkelas($this->input->post('wali_kelas'))) <= 0 ) {
            $data['inputerror'][] = 'wali_kelas';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kelas : <b>'. $this->get_kelas($this->input->post('wali_kelas'),$this->input->post('wali_kelascek')).'</b>, tidak masuk dalam daftar tahun ajaran sistem :<b> '.$this->konfigurasi_m->konfig_tahun().'</b>, segera untuk <b>mereload halaman page</b>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
   
}