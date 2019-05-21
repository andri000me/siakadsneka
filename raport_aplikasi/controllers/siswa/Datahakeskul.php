<?php
class Datahakeskul extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('hakeskul_m');
        $this->load->model('konfigurasi_m');
         $this->load->model('wali_m');
    }


    public function index() {
      
         $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Eskul Hak Eskul
        $this->data['subview'] = 'siswa/dataeskul/hakeskul';
        $this->load->view('siswa/admindesain', $this->data);
        
    }


    public function ajax_list()
    {
        $list = $this->hakeskul_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $hakeskul) {
            $no++;
            $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
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


    
   
}