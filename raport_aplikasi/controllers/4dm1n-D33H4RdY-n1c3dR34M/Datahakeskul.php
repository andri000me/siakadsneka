<?php
class Datahakeskul extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('hakeskul_m');
        $this->load->model('konfigurasi_m');
         $this->load->model('wali_m');
    }


    public function index() {
        $this->data['data_guru'] = $this->hakeskul_m->get_data_guru();
        $this->data['data_kelas'] = $this->cari_kelas();
        $this->data['data_eskul'] = $this->hakeskul_m->get_data_eskul();

         $this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

        //Load Data View Data Eskul Hak Eskul
        $this->data['subview'] = 'admin/dataeskul/hakeskul';
        $this->load->view('admin/admindesain', $this->data);
        
    }


    public function ajax_list()
    {
        $list = $this->hakeskul_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $hakeskul) {
            $no++;
            $datatahun = substr($this->konfigurasi_m->konfig_tahun(), 0, 4);
            $kelastahun = substr($hakeskul->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $hakeskul->kelas_nama))));
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



            

            if ($hakeskul->hakeskul_kelas == NULL) {
                $namakelas = '<span class="label label-default tooltips" data-placement="top" data-original-title="Kelas Telah Dihapus">EMPTY</span>';
            } else {
                $namakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="'. $hakeskul->kelas_kk .' - '.$hakeskul->kelas_tahun.'">'.$datakelas.'</span>'; 
            }


            if ($hakeskul->hakeskul_status == 1) {
                $status = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-xs btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$hakeskul->hakeskul_id.'">';
            $row[] = $no;
            $row[] =  '<a href="javascript:;">'. $hakeskul->guru_nama.'</a>';
            $row[] =  $hakeskul->eskul_nama;
            $row[] = $namakelas;
            $row[] = $status;
            //$row[] = $hakeskul->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$hakeskul->hakeskul_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void()" onclick="delete_data('."'".$hakeskul->hakeskul_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i> Delete</a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->hakeskul_m->count_all(),
                        "recordsFiltered" => $this->hakeskul_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       
        echo json_encode($output);


    }


    public function ajax_edit($id)
    {   

        $data = $this->hakeskul_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }
    
    public function ajax_tambah()
    {
        $this->_validate();
        $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $data = array(
               'hakeskul_kodeguru' => htmlspecialchars($this->input->post('hakeskul_kodeguru')),
                'hakeskul_ideskul' => htmlspecialchars($this->input->post('hakeskul_ideskul')),
                'hakeskul_kelas' => htmlspecialchars($this->input->post('hakeskul_kelas')),
                'hakeskul_status' => htmlspecialchars($this->input->post('hakeskul_status')),
                'hakeskul_tahunajaran' => $tahun_ajaran_admin,
            );
        $this->hakeskul_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
        $this->_validate_validkelas();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
         $data = array(
               'hakeskul_kodeguru' => htmlspecialchars($this->input->post('hakeskul_kodeguru')),
                'hakeskul_ideskul' => htmlspecialchars($this->input->post('hakeskul_ideskul')),
                'hakeskul_kelas' => htmlspecialchars($this->input->post('hakeskul_kelas')),
                'hakeskul_status' => htmlspecialchars($this->input->post('hakeskul_status')),
                'hakeskul_tahunajaran' => $tahun_ajaran_admin,
            );
        $this->hakeskul_m->update(array('hakeskul_id' => $this->input->post('hakeskul_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->hakeskul_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->hakeskul_m->ajax_multiple_delete($ids);  
    }

    private function duplicate_eskul()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('hakeskul_id');
        $this->db->where('hakeskul_kelas', $this->input->post('hakeskul_kelas'));
        $this->db->where('hakeskul_ideskul', $this->input->post('hakeskul_ideskul'));
        !$id || $this->db->where('hakeskul_id !=', $id);
        $this->db->where('hakeskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $duplicate_eskul = $this->hakeskul_m->get();
    
        return $duplicate_eskul;
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


    private function get_guru($id,$eskul) {
         $query = $this->db->query('SELECT guru_nama FROM raport_hakeskul LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_hakeskul.hakeskul_kodeguru WHERE hakeskul_kelas="'.$this->db->escape_str($id).'" AND hakeskul_tahunajaran="'.$this->konfigurasi_m->konfig_tahun().'" AND hakeskul_ideskul="'.$this->db->escape_str($eskul).'"');
       
        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    private function get_eskul($id) {
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
    
    
    

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


         if (count($this->duplicate_eskul())) {
            $data['inputerror'][] = 'hakeskul_ideskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data eskul : <b>'. $this->get_eskul($this->input->post('hakeskul_ideskul')).'</b>, sudah tersedia pada kelas : <b>'. $this->get_kelas($this->input->post('hakeskul_kelas'),$this->input->post('hakeskul_kelascek')).'</b>, dengan nama data penginput : <b>'. $this->get_guru($this->input->post('hakeskul_kelas'), $this->input->post('hakeskul_ideskul')).'</b> .';
            $data['status'] = FALSE;
        }
        
        if($this->input->post('hakeskul_kodeguru') == '')
        {
            $data['inputerror'][] = 'hakeskul_kodeguru';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum memilih <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

        
        if($this->input->post('hakeskul_kelas') == '')
        {
            $data['inputerror'][] = 'hakeskul_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum memilih <b>nama kelas</b>.';
        }

        if($this->input->post('hakeskul_ideskul') == '')
        {
            $data['inputerror'][] = 'hakeskul_ideskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum memilih <b>nama eskul</b>.';
            $data['status'] = FALSE;
        }


        if($this->input->post('hakeskul_status') == '')
        {
            $data['inputerror'][] = 'hakeskul_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum memilih <b>status eskul</b>.';
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


        if (count($this->validkelas($this->input->post('hakeskul_kelas'))) <= 0 ) {
            $data['inputerror'][] = 'hakeskul_kelas';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kelas : <b>'. $this->get_kelas($this->input->post('hakeskul_kelas'), $this->input->post('hakeskul_kelascek')).'</b>, tidak masuk dalam daftar kelas pada tahun ajaran:<b> '.$this->konfigurasi_m->konfig_tahun().'</b>, segera untuk <b>mereload halaman page</b>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    
   
}