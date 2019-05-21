<?php
class Datakelas extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('kelas_m');
    }

    public function index() {
    	
    	//Load Data View Data Kelas
        
    	$this->data['subview'] = 'guru/datakelas/index';
    	$this->load->view('guru/admindesain', $this->data);
    	
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
            //$row[] = '<a href="javascript:void()" onclick="edit_person('."'".$kelas->kelas_code."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a><a href="javascript:void()" onclick="delete_person('."'".$kelas->kelas_code."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a> ';
         
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

   
   
}