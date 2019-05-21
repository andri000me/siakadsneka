<?php
class Datahakabsensi extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('hakabsensi_m');
        $this->load->model('konfigurasi_m');
        $this->load->model('wali_m');

    }

    


    public function index() {

        
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Absensi Hak Absensi
        $this->data['subview'] = 'guru/dataabsensi/hakabsensi';
        $this->load->view('guru/admindesain', $this->data);
        
    }

   
    public function ajax_list()
    {
        $list = $this->hakabsensi_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $hakabsensi) {
            $no++;
            
             $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
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


   
}