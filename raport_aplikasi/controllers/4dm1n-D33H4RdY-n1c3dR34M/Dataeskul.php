<?php
class Dataeskul extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('eskul_m');
        $this->load->model('nilaieskul_m');
        $this->load->model('konfigurasi_m');
    }

    public function lihatdata() {
    	$this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

    	//Load Data View Data Eskul
    	$this->data['subview'] = 'admin/dataeskul/lihatdata';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

    public function hakeskul() {
         $this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

        //Load Data View Data Eskul Hak Eskul
        $this->data['subview'] = 'admin/dataeskul/hakeskul';
        $this->load->view('admin/admindesain', $this->data);
        
    }


    public function ajax_list()
    {
        $list = $this->eskul_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $eskul) {
            $no++;
            
            if ($eskul->eskul_status == 1) {
                $status = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-xs btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            if ($eskul->eskul_kategori == 1) {
                $kategori = '<span class="label btn-xs btn-warning"><i class="glyphicon glyphicon-ok "></i> Wajib </span>';
            } else {
                $kategori = '<span class="label btn-xs bg-red"><i class="glyphicon glyphicon-remove "></i> Tidak Wajib </span>';
            }


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$eskul->eskul_id.'">';
            $row[] = $no;
            $row[] =  $eskul->eskul_nama;
            $row[] = $kategori;
            $row[] = '<span class="badge label-info label-sm">'.$eskul->eskul_sort.'</span>';
            $row[] = $status;
            //$row[] = $eskul->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_person('."'".$eskul->eskul_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit </a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->eskul_m->count_all(),
                        "recordsFiltered" => $this->eskul_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       
        echo json_encode($output);


    }


    public function ajax_edit($id)
    {   

        $data = $this->eskul_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }
    
    public function ajax_add()
    {
        $this->_validate();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $data = array(
               'eskul_nama' => htmlspecialchars($this->input->post('eskul_nama')),
               'eskul_kategori' => htmlspecialchars($this->input->post('eskul_kategori')),
               'eskul_tahunajaran' => $tahun_ajaran_admin,
                'eskul_sort' => htmlspecialchars($this->input->post('eskul_sort')),
                'eskul_status' => htmlspecialchars($this->input->post('eskul_status')),
            );
        $this->eskul_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
         $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $data = array(
                'eskul_nama' => htmlspecialchars($this->input->post('eskul_nama')),
                'eskul_kategori' => htmlspecialchars($this->input->post('eskul_kategori')),
                'eskul_tahunajaran' => $tahun_ajaran_admin,
                'eskul_sort' => htmlspecialchars($this->input->post('eskul_sort')),
                'eskul_status' => htmlspecialchars($this->input->post('eskul_status')),
                
            );
        $this->eskul_m->update(array('eskul_id' => $this->input->post('eskul_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->eskul_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->eskul_m->ajax_multiple_delete($ids);  
    }

    private function sortdata()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('eskul_id');
        $this->db->where('eskul_sort', $this->input->post('eskul_sort'));
        !$id || $this->db->where('eskul_id !=', $id);
        $this->db->where('eskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $sort = $this->eskul_m->get();
    
        return $sort;
    }

    private function Eskuldata()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('eskul_id');
        $this->db->where('eskul_nama', $this->input->post('eskul_nama'));
        !$id || $this->db->where('eskul_id !=', $id);
        $this->db->where('eskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $Eskulnama = $this->eskul_m->get();
    
        return $Eskulnama;
    }

     private function nilaieskulcek()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('eskul_id');
        $this->db->where('nilaieskul_dataeskul', $this->input->post('eskul_id'));
        //!$id || $this->db->where('eskul_id !=', $id);
        $this->db->where('nilaieskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $cekeskul = $this->nilaieskul_m->get();
    
        return $cekeskul;
    }

    private function get_kategorieskul($id) {
        $query = $this->db->query('SELECT eskul_kategori FROM raport_eskul WHERE eskul_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->eskul_kategori;
           
        }

        return $row->eskul_kategori;

    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
        if (count($this->Eskuldata())) {
            $data['inputerror'][] = 'eskul_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Data eskul <b>'. $this->input->post('eskul_nama').'</b> sudah tersedia.';
            $data['status'] = FALSE;
        }

        if (count($this->nilaieskulcek())) {

            if ($this->get_kategorieskul($this->input->post('eskul_id')) !==  $this->input->post('eskul_kategori')) {
                 $data['inputerror'][] = 'eskul_kategori';
                 $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Edit kategori gagal, karena data eskul <b>'. $this->input->post('eskul_nama').'</b> sudah memiliki data nilai pada tahun ajaran : '.$this->konfigurasi_m->konfig_tahun().' .';
                 $data['status'] = FALSE;
            }
           
        }

         if (count($this->sortdata())) {
            $data['inputerror'][] = 'eskul_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Data eskul sort angka <b>'. $this->input->post('eskul_sort').'</b> sudah digunakan.';
            $data['status'] = FALSE;
        }

        $expr = '/^[1-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('eskul_sort')) == FALSE && trim($this->input->post('eskul_sort') !== '') && trim($this->input->post('eskul_sort') !== NULL)) {
            $data['inputerror'][] = 'eskul_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data eskul sort harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        
        if($this->input->post('eskul_nama') == '')
        {
            $data['inputerror'][] = 'eskul_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>nama eskul</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('eskul_kategori') == '')
        {
            $data['inputerror'][] = 'eskul_kategori';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>kategori eskul</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('eskul_sort') == '')
        {
            $data['inputerror'][] = 'eskul_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>sort eskul</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('eskul_status') == '')
        {
            $data['inputerror'][] = 'eskul_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>status eskul</b>.';
            $data['status'] = FALSE;
        }

        

        

        

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    
   
}