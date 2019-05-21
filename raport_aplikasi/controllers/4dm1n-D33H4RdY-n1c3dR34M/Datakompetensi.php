<?php
class Datakompetensi extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('kompetensi_m');
        $this->load->model('konfigurasi_m');
        
    }

    public function lihatdata() {
    	$this->data['data_mapel'] = $this->kompetensi_m->get_data_mapel_global();

        $this->data['tahun_ajaran_admin'] = $this->konfigurasi_m->konfig_tahun();
        $this->data['semester_admin'] = $this->konfigurasi_m->konfig_semester();

        $this->data['semester'] = $this->cari_semester();
    	//Load Data View Data Kompetensi Lihat Data
    	$this->data['subview'] = 'admin/datakompetensi/index';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

    private function cari_semester() {
        $datasemester = $this->konfigurasi_m->konfig_semester();
        if ($datasemester == 'genap') {
            $semester = '<option value="2">Semester 2</option><option value="4">Semester 4</option><option value="6">Semester 6</option>';
        } else {
            $semester = '<option value="1">Semester 1</option><option value="3">Semester 3</option><option value="5">Semester 5</option>';
        }
        
        return $semester;
    }

    public function cek() {
        $this->db->select('kompetensi_id,kompetensi_nama, mapel_nama,kompetensi_pengetahuan,kompetensi_keterampilan,kompetensi_sikap,kompetensi_semesterfilter,kompetensi_kelompok');
        $this->db->from('raport_kompetensi');
        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = raport_kompetensi.kompetensi_mapel', 'left');
       $query = $this->db->get();

       dump($this->db->last_query());
    }

    public function ajax_list()
    {
        $list = $this->kompetensi_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $kompetensi) {
            $no++;
            
            
            

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$kompetensi->kompetensi_id.'">';
            $row[] = $no;
            $row[] =  '<a href="javascript:;">'. $kompetensi->kompetensi_nama.'</a>';
            $row[] = $kompetensi->mapel_nama;
            $row[] = $kompetensi->kompetensi_pengetahuan;  
            $row[] = $kompetensi->kompetensi_keterampilan;  
            $row[] = $kompetensi->kompetensi_sikap;           
            $row[] = $kompetensi->kompetensi_semesterfilter;
            $row[] = '<span class="label label-info label-sm">'.$kompetensi->kompetensi_kelompok.'</span>';
            //$row[] = $kompetensi->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$kompetensi->kompetensi_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_data('."'".$kompetensi->kompetensi_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->kompetensi_m->count_all(),
                        "recordsFiltered" => $this->kompetensi_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    public function tambahdata() {

       $this->data['data_mapel'] = $this->kompetensi_m->get_data_mapel_global();

       $this->data['semester'] = $this->cari_semester();
        //Load Data View Data Kompetensi Edit
        $this->data['subview'] = 'admin/datakompetensi/edit';
        $this->load->view('admin/admindesain', $this->data);
        
    }


    public function ajax_edit($id)
    {   

        $data = $this->kompetensi_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

    public function ajax_add()
    {
        $this->_validate();
        $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $semester_admin = $this->konfigurasi_m->konfig_semester();
        $data = array(
               'kompetensi_id' => $this->input->post('kompetensi_id'),
                'kompetensi_mapel' => htmlspecialchars($this->input->post('kompetensi_mapel')),
                'kompetensi_nama' => htmlspecialchars(ucwords($this->input->post('kompetensi_nama'))),
                'kompetensi_semesterfilter' => htmlspecialchars($this->input->post('kompetensi_semesterfilter')),
                'kompetensi_pengetahuan' => htmlspecialchars($this->input->post('kompetensi_pengetahuan')),
                'kompetensi_keterampilan' => htmlspecialchars($this->input->post('kompetensi_keterampilan')),
                'kompetensi_sikap' => htmlspecialchars($this->input->post('kompetensi_sikap')),
                'kompetensi_kelompok' => htmlspecialchars($this->input->post('kompetensi_kelompok')),
                'kompetensi_tahunajaran' => $tahun_ajaran_admin,
                'kompetensi_semester' => $semester_admin,
                'kompetensi_sort' => htmlspecialchars($this->input->post('kompetensi_sort')),

               
            );
        $this->kompetensi_m->save($data);
        echo json_encode(array("status" => TRUE));
    }

   public function ajax_update()
    {
        $this->_validate();
         $tahun_ajaran_admin = $this->konfigurasi_m->konfig_tahun();
        $semester_admin = $this->konfigurasi_m->konfig_semester();
        $data = array(
                'kompetensi_id' => $this->input->post('kompetensi_id'),
                'kompetensi_mapel' => htmlspecialchars($this->input->post('kompetensi_mapel')),
                'kompetensi_nama' => htmlspecialchars(ucwords($this->input->post('kompetensi_nama'))),
                'kompetensi_semesterfilter' => htmlspecialchars($this->input->post('kompetensi_semesterfilter')),
                'kompetensi_pengetahuan' => htmlspecialchars($this->input->post('kompetensi_pengetahuan')),
                'kompetensi_keterampilan' => htmlspecialchars($this->input->post('kompetensi_keterampilan')),
                'kompetensi_sikap' => htmlspecialchars($this->input->post('kompetensi_sikap')),
                'kompetensi_kelompok' => htmlspecialchars($this->input->post('kompetensi_kelompok')),
                'kompetensi_tahunajaran' => $tahun_ajaran_admin,
                'kompetensi_semester' => $semester_admin,
                'kompetensi_sort' => htmlspecialchars($this->input->post('kompetensi_sort')),

               
            );
        $this->kompetensi_m->update(array('kompetensi_id' => $this->input->post('kompetensi_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->kompetensi_m->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->kompetensi_m->ajax_multiple_delete($ids);  
    }


     private function duplicate_mapel()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('kompetensi_id');
        $this->db->where('kompetensi_semesterfilter', $this->input->post('kompetensi_semesterfilter'));
        $this->db->where('kompetensi_mapel', $this->input->post('kompetensi_mapel'));
        !$id || $this->db->where('kompetensi_id !=', $id);
        //$this->db->where('kompetensi_tahunajaran =', $this->konfigurasi_m->konfig_tahun());
        $this->db->where('kompetensi_semester =', $this->konfigurasi_m->konfig_semester());
        $duplicate_mapel = $this->kompetensi_m->get();
    
        return $duplicate_mapel;
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
    

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if (count($this->duplicate_mapel())) {
            $data['inputerror'][] = 'kompetensi_mapel';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Data kompetensi pada mata pelajaran : <b>'.$this->get_mapel($this->input->post('kompetensi_mapel')).'</b>, sudah tersedia pada : <b>semester '.$this->input->post('kompetensi_semesterfilter').'</b>' ;
            $data['status'] = FALSE;
        }


        $expr = '/^[1-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('kompetensi_sort')) == FALSE && trim($this->input->post('kompetensi_sort') !== '') && trim($this->input->post('kompetensi_sort') !== NULL)) {
            $data['inputerror'][] = 'kompetensi_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Data kompetensi sort harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }
       
        if($this->input->post('kompetensi_mapel') == '')
        {
            $data['inputerror'][] = 'kompetensi_mapel';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>nama mapel</b>';
            $data['status'] = FALSE;
        }

         if($this->input->post('kompetensi_nama') == '')
        {
            $data['inputerror'][] = 'kompetensi_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum menginput data <b>nama kompetensi</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kompetensi_kelompok') == '')
        {
            $data['inputerror'][] = 'kompetensi_kelompok';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>kelompok kompetensi</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('kompetensi_semesterfilter') == '')
        {
            $data['inputerror'][] = 'kompetensi_semesterfilter';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum memilih <b>semester kompetensi</b>.';
            $data['status'] = FALSE;
        }


        if($this->input->post('kompetensi_sort') == '')
        {
            $data['inputerror'][] = 'kompetensi_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum menginput data <b>sort kompetensi</b>';
            $data['status'] = FALSE;
        }

        if($this->input->post('kompetensi_pengetahuan') == '')
        {
            $data['inputerror'][] = 'kompetensi_pengetahuan';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum menginput data <b>kompetensi pengetahuan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kompetensi_keterampilan') == '')
        {
            $data['inputerror'][] = 'kompetensi_keterampilan';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum menginput data <b>kompetensi keterampilan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('kompetensi_sikap') == '')
        {
            $data['inputerror'][] = 'kompetensi_sikap';
            $data['error_string'][] = '<i class="fa fa-warning"></i><strong> Warning :</strong> Anda belum menginput data <b>kompetensi sikap</b>.';
            $data['status'] = FALSE;
        }

        
        




       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
    
   
}