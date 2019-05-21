<?php
class Cetaknilai extends Adminraport_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Libraries and Model Sistem E-Rapor
        $this->load->model('raport_m');
        $this->load->model('siswa_m');
        $this->load->model('rumusraporsiswa_m');
        $this->load->model('rumusrapormapel_m');

    }

    public function cetaktranskripnilai()
    {

        //Load Data View Cetak Nilai Transkrip Nilai
        $this->data['subview'] = 'admin/cetaknilai/cetaktranskripnilai';
        $this->load->view('admin/admindesain', $this->data);

    }

    public function halofani() {

      echo $this->konfigurasi_m->bobot_nilai('bobot_uh');
      echo '<br>';

      echo $this->konfigurasi_m->bobot_nilai('bobot_nh');

      //$this->rumusrapor_m->hitung_nilai_rapor('81','3','2016/2017','12322');
       
        //echo $this->rumusrapor_m->JUMLAH_NILAI_PS('81','3', '2016/2017','1418924');
     
     
      //$this->rumusraporsiswa_m->hitung_nilai_rapor_siswa('81','3', '2016/2017','1418924');
       echo '<br>';

       dump($this->rumusrapormapel_m->AMBILSEMUAKOLOM('41','3', '2016/2017','71'));

       
        //$this->rumusrapormapel_m->get_datatables_data_berproses('41','3', '2016/2017','71');

     // dump($this->rumusrapormapel_m->AMBILNILAIUH('41','3', '2016/2017','71'));

     // dump($this->rumusrapormapel_m->AMBILNILAITG('41','3', '2016/2017','71'));

      //dump(($this->rumusrapormapel_m->AMBILNILAIUH('41','3', '2016/2017','71') + $this->rumusrapormapel_m->AMBILNILAITG('41','3', '2016/2017','71')));


      //echo $this->rumusrapor_m->PIVOT_NILAI_UH('81','3', '2016/2017','1418924');

       
    dump($this->db->last_query());
    }

    public function cetakraportsiswa()
    {

        //Load Data View Cetak Nilai Raport Siswa
        $this->data['data_angkatan_aktif2']      = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        $this->data['subview']                   = 'admin/cetaknilai/cetakraportsiswa';
        $this->load->view('admin/admindesain', $this->data);

    }

    public function cetaknilaipengetahuan()
    {

        //Load Data View Cetak Nilai Pengetahuan
        $this->data['subview'] = 'admin/cetaknilai/cetaknilaipengetahuan';
        $this->load->view('admin/admindesain', $this->data);

    }

    public function cetaknilaiketrampilan()
    {

        //Load Data View Cetak Nilai Ketrampilan
        $this->data['subview'] = 'admin/cetaknilai/cetaknilaiketrampilan';
        $this->load->view('admin/admindesain', $this->data);

    }

    public function cetaknilaisikap()
    {

        //Load Data View Cetak Nilai Sikap
        $this->data['subview'] = 'admin/cetaknilai/cetaknilaisikap';
        $this->load->view('admin/admindesain', $this->data);

    }

    private function konfig()
    {
        $data       = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_admin'];
    }

    public function ajax_list_cetakraport()
    {
        $list = $this->raport_m->get_datatables();
        $data = array();
        $no   = $this->input->post('start');
        foreach ($list as $raport) {
            $no++;

            if ($raport->kelas_tingkat == 3) {
                if ($this->konfig() == 'genap') {
                    $SMT = '

                <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>
                    
                    
                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>

                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                    <ul class="dropdown-menu" style="min-width:75px">
                    
                    
                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 6</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/6" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/6" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>
                ';

                } else {

                    if ($raport->kelas_status == 'alumni') {
                        $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>


                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                 <ul class="dropdown-menu" style="min-width:75px">
                 
                 
                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 6</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/6" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/6" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                    } else {
                        $SMT = '
                <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>
                        
                        
                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>

                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                    <ul class="dropdown-menu" style="min-width:75px">
                    
                    
                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 5</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/5" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/5" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                    }

                }
            } elseif ($raport->kelas_tingkat == 2) {

                if ($this->konfig() == 'genap') {
                    $SMT = '
                    
                <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>
                    
                    
                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>

                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                    <ul class="dropdown-menu" style="min-width:75px">
                    
                    
                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>

                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 4</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/4" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                } else {
                    $SMT = '
                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>
                    
                    
                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>

                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                    <ul class="dropdown-menu" style="min-width:75px">
                    
                    
                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>


                 <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 3</a>


                <ul class="dropdown-menu" style="min-width:75px">

                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                 <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/3" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                </ul>

                </li>';
                }

            } elseif ($raport->kelas_tingkat == 1) {

                if ($this->konfig() == 'genap') {
                    $SMT = '
                    
                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>
                    
                    
                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>

                    <li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 2</a>


                    <ul class="dropdown-menu" style="min-width:75px">
                    
                    
                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/2/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>';
                } else {
                    $SMT = '<li class="dropdown-submenu"><a href="javascript:;"><i class="icon-badge"></i> SMT 1</a>
                    
                    
                <ul class="dropdown-menu" style="min-width:75px">


                <li class="dropdown-submenu"><a href="javascript:;"> V1</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v1" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>

                <li class="dropdown-submenu"><a href="javascript:;"> V2</a>
                <ul class="dropdown-menu" style="min-width:75px">
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_pdf/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a>
                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/SMT_html/' . $raport->siswa_nis . '/1/v2" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>
                </ul>
                </li>



                </ul>

                </li>';
                }

            }

            $row = array();
            // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$raport->siswa_nis.'">';
            $row[] = $no;
            $row[] = '<span class="label bg-blue-hoki">' . $raport->siswa_nis . '</span>';
            $row[] = $raport->siswa_nama;
            $row[] = '<span class="label label-primary tooltips" data-placement="top" data-original-title="' . $raport->siswa_kelas . '-' . $raport->kelas_kk . '-' . $raport->kelas_tahun . '">' . $raport->kelas_nama . '</span>';
            //$row[] =  $raport->siswa_pk;
            $row[] = '<span class="badge label-info label-sm">' . $raport->siswa_absen . '</span>';

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

                                                                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/cover_pdf/' . $raport->siswa_nis . '" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/cover_html/' . $raport->siswa_nis . '" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="fa fa-university"></i> Data Sekolah </a>
                                                                 <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/sekolah_pdf" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/sekolah_html" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>
                                                            <li class="dropdown-submenu">
                                                                <a href="javascript:;">
                                                                <i class="fa fa-user"></i> Data Siswa </a>
                                                                 <ul class="dropdown-menu" style="min-width:115px">

                                                                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/siswa_pdf/' . $raport->siswa_nis . '" target="_blank"><i class=" fa fa-file-pdf-o "></i> PDF</a></li>

                                                                <li><a href="' . site_url() . '4dm1n-D33H4RdY-n1c3dR34M/cetakraport/siswa_html/' . $raport->siswa_nis . '" target="_blank"><i class=" fa fa-globe"></i> HTML</a></li>



                                                                </ul>
                                                            </li>


                                                        </ul>
                                                    </div>

                                                    <div class="btn-group dropdownMenu" style="position:inherit">
                                                        <button class="btn btn-sm blue dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-graduation-cap "></i>
                                                       Semester <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" style="min-width:105px">

                                                        ' . $SMT . '
                                                        </ul>
                                                    </div>

                                                   ';

            $data[] = $row;
        }

        $output = array(
            "draw"            => $this->input->post('draw'),
            "recordsTotal"    => $this->raport_m->count_all(),
            "recordsFiltered" => $this->raport_m->count_filtered(),
            "data"            => $data,
        );
        //output to json format
        //dump($this->db->last_query());
        echo json_encode($output);

    }

}
