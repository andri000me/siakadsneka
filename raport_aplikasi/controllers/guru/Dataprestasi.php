<?php
class Dataprestasi extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('prestasi_m');
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');

    }

    

    public function lihatdata() {
        
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Prestasi
        $this->data['subview'] = 'guru/dataprestasi/lihatdata';
        $this->load->view('guru/admindesain', $this->data);
        
    }

    public function ajax_list()
    {
        $list = $this->prestasi_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $prestasi) {
            $no++;
            
            
           
            if ($prestasi->prestasi_nis == NULL ) {
                $datanis = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datanis = '<span class="label bg-blue-hoki">'. $prestasi->prestasi_nis.'</span>';
            }

            

            if ($prestasi->siswa_nama == NULL ) {
                $datanama = '<span class="label bg-grey">DATA SISWA TELAH DIHAPUS</span>';
            } else {
                $datanama = $prestasi->siswa_nama;
            }

             $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
            $kelastahun = substr($prestasi->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $prestasi->kelas_nama))));
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


              if ($prestasi->kelas_nama == NULL ) {
                $datakelasku = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datakelasku = '<span  class="label label-primary tooltips" data-placement="top" data-original-title="'.$prestasi->siswa_kelas .' - '. $prestasi->kelas_kk.' - '.$prestasi->kelas_tahun.'">'. $datakelas.'</span>';
            }




            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$prestasi->prestasi_id.'">';
            $row[] = $no;
            $row[] = $datanis;
            $row[] =  $datanama;
            $row[] = $datakelasku;
            $row[] = $prestasi->prestasi_bidang;
            $row[] = '<span class="label bg-yellow">'.$prestasi->prestasi_tingkat.'</span>';
            $row[] =  '<span class="badge label-info label-sm">'.$prestasi->prestasi_peringkat.'</span>';
            
            //$row[] = $status;
            //$row[] = $prestasi->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$prestasi->prestasi_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_data('."'".$prestasi->prestasi_id."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a>
                  ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->prestasi_m->count_all(),
                        "recordsFiltered" => $this->prestasi_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }




   
}