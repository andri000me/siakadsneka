<?php
class Datawali extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');
    }

    public function index() {
    	$this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();
        
    	//Load Data View Data Wali
    	$this->data['subview'] = 'siswa/datawali/index';
    	$this->load->view('siswa/admindesain', $this->data);
        //dump($this->db->last_query());
    	
    }
    
   

    public function ajax_list()
    {
        $list = $this->wali_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $wali) {
            $no++;
            

            $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
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
            //$row[] = '<a href="javascript:void()" onclick="edit_data('."'".$wali->wali_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit</a><a href="javascript:void()" onclick="delete_data('."'".$wali->wali_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i> Delete</a> ';
         
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



    
   
}