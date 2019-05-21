<?php
class Dataabsensi extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('absensi_m');
        $this->load->model('wali_m');
        $this->load->model('konfigurasi_m');

    }

    

    public function lihatdata() {

      
        
        $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        //Load Data View Data Absensi
        $this->data['subview'] = 'siswa/dataabsensi/index';
        $this->load->view('siswa/admindesain', $this->data);
        
    }

    public function hakabsensi() {

         $this->data['tahun_ajaran_client'] = $this->konfigurasi_m->konfig_tahun_client();
        $this->data['semester_client'] = $this->konfigurasi_m->konfig_semester_client();

        
        //Load Data View Data Absensi Hak Absensi
        $this->data['subview'] = 'siswa/dataabsensi/hakabsensi';
        $this->load->view('siswa/admindesain', $this->data);
        
    }

   
    
    public function ajax_list()
    {
        $list = $this->absensi_m->get_datatables_guru_all();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $absensi) {
            $no++;
            
            if ($absensi->absensi_keterangan == 'SAKIT') {
                $dataabsensi = '<span class="badge bg-red-sunglo label-sm">SAKIT</span>';
            } elseif ($absensi->absensi_keterangan == 'IZIN') {
                $dataabsensi = '<span class="badge bg-green-jungle label-sm"> IZIN </span>';
            } elseif ($absensi->absensi_keterangan == 'ALPA') {
                $dataabsensi = '<span class="badge bg-blue-chambray label-sm"> ALPA </span>';
            } 
            
           
            if ($absensi->absensi_nis == NULL ) {
                $datanis = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datanis = '<span class="label bg-blue-hoki">'. $absensi->absensi_nis.'</span>';
            }

            if ($absensi->siswa_nama == NULL ) {
                $datanama = '<span class="label bg-grey">DATA SISWA TELAH DIHAPUS</span>';
            } else {
                $datanama = $absensi->siswa_nama;
            }

             $datatahun = substr($this->konfigurasi_m->konfig_tahun_client(), 0, 4);
            $kelastahun = substr($absensi->kelas_tahun, 0, 4);
            $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $absensi->kelas_nama))));
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


              if ($absensi->kelas_nama == NULL ) {
                $datakelas = '<span class="label bg-grey">EMPTY</span>';
            } else {
                $datakelas = '<span class="label label-primary tooltips" data-placement="top" data-original-title="Penginput : '. $absensi->guru_nama .' - Angkatan : '.$absensi->kelas_tahun.'">'.$datakelas.'</span>';
            }


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$absensi->absensi_id.'">';
            $row[] = $no;
            $row[] = $datanis;
            $row[] =  $datanama;
            $row[] = $datakelas;
            $row[] =  $dataabsensi;
            //$row[] =  $absensi->guru_pk;
           
            $row[] = $this->data_tanggal($absensi->absensi_waktu);
            //$row[] = $absensi->dob;
 
            
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->absensi_m->count_all_guru_all(),
                        "recordsFiltered" => $this->absensi_m->count_filtered_guru_all(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    

    private function data_tanggal($data) {

        $timezone = config_item('erapor_timezone');
            if (function_exists ( 'date_default_timezone_set' ))
                date_default_timezone_set ( $timezone );
                // input tanggal hari ini
            //$datatanggal = $this->ambiltanggal();
        //$tanggalku = $datatanggal['datatanggal'];
        //$tanggal_now = date('Y/m/d');
        //$tanggal_absensi = substr($tanggalku,0,10);

            $tanggal = date($data);
            
            // konversi ke fungsi tanggal
            $ts_absensi = strtotime ( $tanggal );
            // tanggal dipecah menurut hari bulan tahun
            $hari_absensi = date ( 'w', $ts_absensi );
            $tgl_absensi = date ( 'd', $ts_absensi );
            $bln_absensi = date ( 'm', $ts_absensi );
            $thn_absensi = date ( 'Y', $ts_absensi );


            
            // pemberian nama hari Indonesia
            switch ($hari_absensi) {
                case 0 :
                    {
                        $hari_absensi = 'Minggu';
                    }
                    break;
                case 1 :
                    {
                        $hari_absensi = 'Senin';
                    }
                    break;
                case 2 :
                    {
                        $hari_absensi = 'Selasa';
                    }
                    break;
                case 3 :
                    {
                        $hari_absensi = 'Rabu';
                    }
                    break;
                case 4 :
                    {
                        $hari_absensi = 'Kamis';
                    }
                    break;
                case 5 :
                    {
                        $hari_absensi = "Jum'at";
                    }
                    break;
                case 6 :
                    {
                        $hari_absensi = 'Sabtu';
                    }
                    break;
                // pemberian nama default jika tidak ada nama bulan
                default :
                    {
                        $hari_absensi = 'Tidak Terdeteksi';
                    }
                    break;
            }
            // pemberian nama bulan Indonesia
            switch ($bln_absensi) {
                case 1 :
                    {
                        $bln_absensi = 'Januari';
                    }
                    break;
                case 2 :
                    {
                        $bln_absensi = 'Februari';
                    }
                    break;
                case 3 :
                    {
                        $bln_absensi = 'Maret';
                    }
                    break;
                case 4 :
                    {
                        $bln_absensi = 'April';
                    }
                    break;
                case 5 :
                    {
                        $bln_absensi = 'Mei';
                    }
                    break;
                case 6 :
                    {
                        $bln_absensi = "Juni";
                    }
                    break;
                case 7 :
                    {
                        $bln_absensi = 'Juli';
                    }
                    break;
                case 8 :
                    {
                        $bln_absensi = 'Agustus';
                    }
                    break;
                case 9 :
                    {
                        $bln_absensi = 'September';
                    }
                    break;
                case 10 :
                    {
                        $bln_absensi = 'Oktober';
                    }
                    break;
                case 11 :
                    {
                        $bln_absensi = 'November';
                    }
                    break;
                case 12 :
                    {
                        $bln_absensi = 'Desember';
                    }
                    break;
                // pemberian nama default jika tidak ada nama bulan
                default :
                    {
                        $bln_absensi = 'Tidak Terdeteksi';
                    }
                    break;
            }

            return $hari_absensi .', '.$tgl_absensi.' '.$bln_absensi.' '.$thn_absensi;



           
    }
   
}