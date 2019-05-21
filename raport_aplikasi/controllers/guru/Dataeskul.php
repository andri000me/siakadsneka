<?php
class Dataeskul extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('eskul_m');
        $this->load->model('nilaieskul_m');
        $this->load->model('konfigurasi_m');
    }

    public function lihatdata() {
    	$this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

    	//Load Data View Data Eskul
    	$this->data['subview'] = 'guru/dataeskul/lihatdata';
    	$this->load->view('guru/admindesain', $this->data);
    	
    }

    public function hakeskul() {
         $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Eskul Hak Eskul
        $this->data['subview'] = 'guru/dataeskul/hakeskul';
        $this->load->view('guru/admindesain', $this->data);
        
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



    
   
}