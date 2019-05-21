<?php
class Cetaknilai extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('raport_m');
        $this->load->model('siswa_m');
        $this->load->model('indikatornilai_m');
        
    }

    

    public function cetakraportsiswa() {
        
        //Load Data View Cetak Nilai Raport Siswa
        
        $this->data['namakelas'] = $this->siswa_m->namakelas();
        $this->data['raport_siswa'] = $this->cetaknilaisiswa();
        $this->data['subview'] = 'siswa/cetaknilai/cetakraportsiswa';
        $this->load->view('siswa/admindesain', $this->data);
        
    }

    
    

    private function konfig() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_client'];
    }

   

    private function cetaknilaisiswa() {


         if ($this->indikatornilai_m->tingkatkelas() == 3) {
            if ($this->konfig() == 'genap') {
                $SMT= '

                <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 6</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/6" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/6" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                ';
        
             } else {

                if ($this->indikatornilai_m->statuskelas() == 'alumni') {
                   $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 6</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/6" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/6" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                } else {
                    $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                }
                
           
            }
        } elseif ($this->indikatornilai_m->tingkatkelas() == 2) {

            if ($this->konfig() == 'genap') {
            $SMT ='<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                
                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            } else {
            $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            }
            

        } elseif ($this->indikatornilai_m->tingkatkelas() == 1) {

             if ($this->konfig() == 'genap') {
            $SMT ='<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            } else {
                $SMT = '<li  class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="'.site_url().'siswa/cetakraport/SMT_pdf/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="'.site_url().'siswa/cetakraport/SMT_html/'.$this->session->userdata('user_login').'/1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
            }
            
        }

        return $SMT;
    }
   
    


    
   
}