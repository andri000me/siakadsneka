<?php
class Cetaknilai extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('raport_m');
        $this->load->model('siswa_m');
        
    }

    

    public function cetakraportsiswa() {
        
        //Load Data View Cetak Nilai Raport Siswa
         $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();

        if (count($this->wali_m->statuswali())) {
           $this->data['subview'] = 'guru/cetaknilai/cetakraportsiswa';
        } else {
        $this->data['subview'] = 'guru/accessdenied/Cetakraport_wali';
        }
        
        $this->load->view('guru/admindesain', $this->data);
        
    }


    private function konfig() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_admin'];
    }

    public function ajax_list_cetakraport()
    {
        $list = $this->raport_m->get_datatables_wali();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $raport) {
            $no++;
            



         if ($raport->kelas_tingkat == 3) {
            if ($this->konfig() == 'genap') {
                $SMT= '

                <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 6</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/6" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/6" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                ';
        
             } else {

                if ($raport->kelas_status == 'alumni') {
                   $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 6</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/6" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/6" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                } else {
                    $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                }
                
           
            }
        } elseif ($raport->kelas_tingkat == 2) {

            if ($this->konfig() == 'genap') {
            $SMT ='<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            } else {
            $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            }
            

        } elseif ($raport->kelas_tingkat == 1) {

             if ($this->konfig() == 'genap') {
            $SMT ='<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            } else {
                $SMT = '<li  class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'guru/cetakraport/SMT_pdf/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'guru/cetakraport/SMT_html/'.$raport->siswa_nis.'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            }
            
        }

          $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$raport->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$raport->siswa_nis.'</span>';
            $row[] = $raport->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$raport->siswa_kelas .'-'. $raport->kelas_kk.'-'.$raport->kelas_tahun. '">'. $raport->kelas_nama.'</span>';
            //$row[] =  $raport->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $raport->siswa_absen. '</span>';
           
            //$row[] = $raport->dob;
 
            //add html for action
            $row[] = '                                  



                                                        <div class="btn-group dropdownMenu" style="position:inherit">
                                                        <button class="btn btn-sm blue dropdown-toggle" type="button" data-toggle="dropdown"><i class="glyphicon glyphicon-print "></i>
                                                        Print Options <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" style="min-width:155px">
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="glyphicon glyphicon-book"></i> Cover Raport</a>
                                                                <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="'.site_url().'guru/cetakraport/cover_pdf/'.$raport->siswa_nis.'" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="'.site_url().'guru/cetakraport/cover_html/'.$raport->siswa_nis.'" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="fa fa-university"></i> Data Sekolah </a>
                                                                 <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="'.site_url().'guru/cetakraport/sekolah_pdf" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="'.site_url().'guru/cetakraport/sekolah_html" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="fa fa-user"></i> Data Siswa </a>
                                                                 <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="'.site_url().'guru/cetakraport/siswa_pdf/'.$raport->siswa_nis.'" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="'.site_url().'guru/cetakraport/siswa_html/'.$raport->siswa_nis.'" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            
                                                            
                                                        </ul>
                                                    </div>

                                                    <div class="btn-group dropdownMenu" style="position:inherit">
                                                        <button class="btn btn-sm blue dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-graduation-cap "></i>
                                                       Semester <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" style="min-width:105px">
                                                            
                                                        '.$SMT.'
                                                        </ul>
                                                    </div>

                                                   ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->raport_m->count_all_wali(),
                        "recordsFiltered" => $this->raport_m->count_filtered_wali(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }
   
    


    
   
}