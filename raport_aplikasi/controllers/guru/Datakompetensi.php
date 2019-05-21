<?php
class Datakompetensi extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('kompetensi_m');
        $this->load->model('konfigurasi_m');
        
    }

    public function lihatdata() {
    	
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

    	//Load Data View Data Kompetensi Lihat Data
    	$this->data['subview'] = 'guru/datakompetensi/index';
    	$this->load->view('guru/admindesain', $this->data);
    	
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
            //$row[] = '<a href="javascript:void()" onclick="edit_data('."'".$kompetensi->kompetensi_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a><a href="javascript:void()" onclick="delete_data('."'".$kompetensi->kompetensi_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a> ';
         
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

    
   
}