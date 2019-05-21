<?php
class Datakelas extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('kelas_m');
    }

    public function index() {
    	
    	//Load Data View Data Kelas
    	$this->data['subview'] = 'admin/datakelas/index';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }


    public function ajax_list()
    {
        $list = $this->kelas_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $kelas) {
            $no++;
            
            if ($kelas->kelas_status == 'aktif') {
                $status = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-xs btn-primary"><i class="fa fa-graduation-cap"></i> Alumni </span>';
            }

            

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$kelas->kelas_code.'">';
            $row[] = $no;
            $row[] =  '<a href="javascript:;">'. $kelas->kelas_nama.'</a>';
            $row[] = '<span class="label label-primary">'.$kelas->kelas_code.'</span>';
            $row[] =  '<span class="label bg-red-pink popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="'.$kelas->kelas_pk.'" data-original-title="Program Studi Keahlian: ">'.$kelas->kelas_bk.'</span>';
            //$row[] =  $kelas->kelas_pk;
            $row[] =  $kelas->kelas_kk;
            $row[] =  $kelas->kelas_tahun;
            $row[] =  $kelas->kelas_tingkat;
            $row[] =  '<span class="badge label-info label-sm">'. $kelas->kelas_sort .'</span>';
            $row[] = $status;
            //$row[] = $kelas->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_person('."'".$kelas->kelas_code."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_person('."'".$kelas->kelas_code."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->kelas_m->count_all(),
                        "recordsFiltered" => $this->kelas_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    public function ajax_edit($id)
    {   

        $data = $this->kelas_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

    public function ajax_add()
    {
        $this->_validate();
        $data = array(
               
               'kelas_code' => htmlspecialchars($this->input->post('kelas_code')),
               'kelas_nama' => htmlspecialchars($this->input->post('kelas_nama')),
               'kelas_bk' => htmlspecialchars($this->input->post('kelas_bk')),
               'kelas_pk' => htmlspecialchars($this->input->post('kelas_pk')),
               'kelas_kk' => htmlspecialchars($this->input->post('kelas_kk')),
               'kelas_tahun' => htmlspecialchars($this->input->post('kelas_tahun')),
               'kelas_tingkat' => htmlspecialchars($this->input->post('kelas_tingkat')),
               'kelas_sort' => htmlspecialchars($this->input->post('kelas_sort')),
               'kelas_status' => 'aktif',
            );
        $this->kelas_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
        $data = array(
               
                'kelas_code' => htmlspecialchars($this->input->post('kelas_code')),
               'kelas_nama' => htmlspecialchars($this->input->post('kelas_nama')),
               'kelas_bk' => htmlspecialchars($this->input->post('kelas_bk')),
               'kelas_pk' => htmlspecialchars($this->input->post('kelas_pk')),
               'kelas_kk' => htmlspecialchars($this->input->post('kelas_kk')),
               'kelas_tahun' => htmlspecialchars($this->input->post('kelas_tahun')),
               'kelas_tingkat' => htmlspecialchars($this->input->post('kelas_tingkat')),
               'kelas_sort' => htmlspecialchars($this->input->post('kelas_sort')),
               'kelas_status' => htmlspecialchars($this->input->post('kelas_status')),
                
            );
        $this->kelas_m->update(array('kelas_code' => $this->input->post('kelas_code2')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->kelas_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->kelas_m->ajax_multiple_delete($ids);  
    }

    function ajax_multiple_upgrade(){
         $ids = (explode( ',', $this->input->get_post('data_upgrade') ));
        $this->_validate_datamasuk();
        $this->_validate_mutilupgrade();
        $count = 0;
        foreach ($ids as $id){
          
           $did = intval($id);

             $setnamakelas = $this->get_namakelas($did);
             $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $setnamakelas))));
             //$kelasupgrade = substr($setnamakelas, -2);

             if ($this->input->post('kelas_upgrade') == 1) {
                 $kelasjadi = 'X'.$kelasku;
             } elseif ($this->input->post('kelas_upgrade') == 2) {
                 $kelasjadi = 'XI'.$kelasku;
             } elseif ($this->input->post('kelas_upgrade') == 3) {
                 $kelasjadi = 'XII'.$kelasku;
             } else {
                $kelasjadi = 'X'.$kelasku;
             } 
                 
             
             $data = array(
                'kelas_nama' => $kelasjadi,
                'kelas_tingkat' => htmlspecialchars($this->input->post('kelas_upgrade')),
                'kelas_status' => htmlspecialchars($this->input->post('kelas_status2')),
               
                
            );
             $this->kelas_m->update(array('kelas_code' => $did), $data);
           
             $count = $count+1;
       }
        $data2['sukses_string'] = '<i class="fa fa-fa-check "></i>Sebanyak <b>'.$count.' kelas </b>, berhasil diupgrade menuju tingkat : <b>'. $this->input->post('kelas_upgrade').'  </b>, dengan status : <b>'. $this->input->post('kelas_status2').'</b>.'; 
        $data2['status'] = TRUE;
        echo json_encode($data2);
        
    }

     private function get_namakelas($did) {
        $query = $this->db->query('SELECT kelas_nama FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($did).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
          return $row->kelas_nama;
           
        } else {
          return FALSE;
        }

        

    }


    private function _validate_datamasuk()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


      if($this->input->post('data_upgrade') == 0)
        {
            $data['inputerror'][] = 'data_upgrade';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum melakukan seleksi <b>data kelas</b> yang akan di <b>upgrade</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

       private function _validate_mutilupgrade()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


      if($this->input->post('kelas_upgrade') == '')
        {
            $data['inputerror'][] = 'kelas_upgrade';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>set kelas upgrade</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kelas_status2') == '')
        {
            $data['inputerror'][] = 'kelas_status2';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>statu</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

    private function sortdata()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('kelas_code2');
        $this->db->where('kelas_sort', $this->input->post('kelas_sort'));
        !$id || $this->db->where('kelas_code !=', $id);
        $sort = $this->kelas_m->get();
    
        return $sort;
    }

    private function namakelas()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('kelas_code2');
        $this->db->where('kelas_nama', $this->input->post('kelas_nama'));
         $this->db->where('kelas_status', 'aktif');
        !$id || $this->db->where('kelas_code !=', $id);
        $namakelas = $this->kelas_m->get();
    
        return $namakelas;
    }

    

     private function idkelas()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('kelas_code2');
        $this->db->where('kelas_code', $this->input->post('kelas_code'));
        !$id || $this->db->where('kelas_code !=', $id);
        $idkelas = $this->kelas_m->get();
    
        return $idkelas;
    }

    

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        
       

        if (count($this->idkelas())) {
            $data['inputerror'][] = 'kelas_code';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data ID kelas angka <b>'. $this->input->post("kelas_code").'</b> sudah digunakan.';
            $data['status'] = FALSE;
        }

        if (count($this->sortdata())) {
            $data['inputerror'][] = 'kelas_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data kelas sort angka <b>'. $this->input->post("kelas_sort").'</b> sudah digunakan.';
            $data['status'] = FALSE;
        }

         $expr2 = '/^[1-9][0-9]*$/';
        if (preg_match($expr2, $this->input->post('kelas_code')) == FALSE && trim($this->input->post('kelas_code') !== '') && trim($this->input->post('kelas_code') !== NULL)) {
            $data['inputerror'][] = 'kelas_code';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas ID</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[1-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('kelas_sort')) == FALSE && trim($this->input->post('kelas_sort') !== '') && trim($this->input->post('kelas_sort') !== NULL)) {
            $data['inputerror'][] = 'kelas_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas sort</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }
       
        if($this->input->post('kelas_nama') == '')
        {
            $data['inputerror'][] = 'kelas_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama kelas</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('kelas_code') == '')
        {
            $data['inputerror'][] = 'kelas_code';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kelas ID</b>.';
            $data['status'] = FALSE;
        }


        if($this->input->post('kelas_bk') == '')
        {
            $data['inputerror'][] = 'kelas_bk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>bidang studi keahlian</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kelas_pk') == '')
        {
            $data['inputerror'][] = 'kelas_pk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>program studi keahlian</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kelas_kk') == '')
        {
            $data['inputerror'][] = 'kelas_kk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>keahlian kompetensi</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kelas_tahun') == '')
        {
            $data['inputerror'][] = 'kelas_tahun';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>tahun angkatan</b>..';
            $data['status'] = FALSE;
        }

        if($this->input->post('kelas_tingkat') == '')
        {
            $data['inputerror'][] = 'kelas_tingkat';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>tingkat kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kelas_sort') == '')
        {
            $data['inputerror'][] = 'kelas_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kelas sort</b>.';
            $data['status'] = FALSE;
        }

        


        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
    
   
}