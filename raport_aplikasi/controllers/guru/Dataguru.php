<?php
class Dataguru extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('guru_m');
        $this->load->model('password_guru_m');
         $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->load->library('tanggal');
        $this->real_path = realpath('raport_files/foto/guru/real/');
        $this->full_path = realpath('raport_files/foto/guru/full/');
        $this->thumb_path = realpath('raport_files/foto/guru/thumbnail/');
        
    }

    public function lihatdata() {
        
        //Load Data View Lihat Data Guru
        $this->data['subview'] = 'guru/dataguru/lihatdata';
        $this->load->view('guru/admindesain', $this->data);
        
    }

   


    public function ajax_list()
    {
        $list = $this->guru_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $guru) {
            $no++;
            
            if ($guru->guru_status == 1) {
                $status = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif </span>';
            } elseif ($guru->guru_status == 2) {
                 $status = '<span class="label bg-grey-gallery">Mutasi</span>';
            } elseif ($guru->guru_status == 3) {
                $status = '<span class="label bg-green">Pensiun</span>';

            } elseif ($guru->guru_status == 4) {
                $status = '<span class="label bg-red-sunglo">Meninggal</span>';
            } else {
                $status = '<a href="javascript:;" class="btn btn-xs btn-danger"><i class="fa fa-times  "></i> Tidak Aktif </a>';
            }

            if ($guru->guru_notelp == '') {
                $telpguru = '<span class="badge bg-grey badge-roundless">Handphone Empty</span>';
            } elseif  ($guru->guru_notelp == '-') {
                $telpguru = '<span class="badge bg-grey badge-roundless">Handphone Empty</span>';
            } else {
                $telpguru = '<span class="badge label-danger label-sm">'. $guru->guru_notelp .'</span>';
            }



            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$guru->guru_kode.'">';
            $row[] = $no;
            $row[] = '<span class="label bg-blue-hoki">'.$guru->guru_kode.'</span>';
            $row[] =  '<a href="javascript:;">'. $guru->guru_nama.'</a>';
            $row[] = '<span class="label label-primary">'.$guru->guru_jenjang.'</span>';
            $row[] =  $telpguru;
            //$row[] =  $guru->guru_pk;
           
            $row[] = $status;
            //$row[] = $guru->dob;
 
            //add html for action
            $row[] = '
                  <a href="javascript:void()" onclick="lihat_data_guru('."'".$guru->guru_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i> Lihat Data</a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->guru_m->count_all(),
                        "recordsFiltered" => $this->guru_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }



    public function lihat_data_guru($id)
    {   

        $data = $this->guru_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }


}

