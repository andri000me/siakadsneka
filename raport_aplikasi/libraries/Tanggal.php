<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

/**
 * CodeIgniter Tanggalku Libraly
 *
 * @package CodeIgniter
 * @author  Ofani Dariyan <ofanidariyan@hotmail.com>
 */
class Tanggal
{
   
    public function __construct()
    {
        $this->_ci = & get_instance();

    }

    /**
     * Tanggal Sekarang
     *   
     */
    public function time_now() {
    //Configurasi waktu
        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        //input tanggal hari ini
        $tanggal = date('Y-m-d H:i:s');
        $waktu   = date("g:i a",time());
        //konversi ke fungsi tanggal
        $ts = strtotime($tanggal);
        //tanggal dipecah menurut hari bulan tahun
        $hari=date('w', $ts);
        $tgl =date('d', $ts);
        $bln =date('m', $ts);
        $thn =date('Y', $ts);
        //pemberian nama hari Indonesia
        switch($hari){
            case 0 : {
                $hari='Minggu';
            }break;
            case 1 : {
                $hari='Senin';
            }break;
            case 2 : {
                $hari='Selasa';
            }break;
            case 3 : {
                $hari='Rabu';
            }break;
            case 4 : {
                $hari='Kamis';
            }break;
            case 5 : {
                $hari="Jum'at";
            }break;
            case 6 : {
                $hari='Sabtu';
            }break;
            //pemberian nama default jika tidak ada nama bulan
            default: {
                $hari='Tidak Terdeteksi';
            }break;
        }
        //pemberian nama bulan Indonesia
        switch($bln){
            case 1 : {
                $bln='Januari';
            }break;
            case 2 : {
                $bln='Februari';
            }break;
            case 3 : {
                $bln='Maret';
            }break;
            case 4 : {
                $bln='April';
            }break;
            case 5 : {
                $bln='Mei';
            }break;
            case 6 : {
                $bln="Juni";
            }break;
            case 7 : {
                $bln='Juli';
            }break;
            case 8 : {
                $bln='Agustus';
            }break;
            case 9 : {
                $bln='September';
            }break;
            case 10 : {
                $bln='Oktober';
            }break;
            case 11 : {
                $bln='November';
            }break;
            case 12 : {
                $bln='Desember';
            }break;
            //pemberian nama default jika tidak ada nama bulan
            default: {
                $bln='Tidak Terdeteksi';
            }break;
        }
    return $hari.', '.$tgl.' '.$bln.' '.$thn.' '.$waktu;
        }

         public function waktu_convert($waktu) {
    //Configurasi waktu
        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        //input tanggal hari ini
        $tanggal = date('Y-m-d H:i:s',$waktu);
        $waktu   = date("g:i a",$waktu);
        //konversi ke fungsi tanggal
        $ts = strtotime($tanggal);
        //tanggal dipecah menurut hari bulan tahun
        $hari=date('w', $ts);
        $tgl =date('d', $ts);
        $bln =date('m', $ts);
        $thn =date('Y', $ts);
        //pemberian nama hari Indonesia
        switch($hari){
            case 0 : {
                $hari='Minggu';
            }break;
            case 1 : {
                $hari='Senin';
            }break;
            case 2 : {
                $hari='Selasa';
            }break;
            case 3 : {
                $hari='Rabu';
            }break;
            case 4 : {
                $hari='Kamis';
            }break;
            case 5 : {
                $hari="Jum'at";
            }break;
            case 6 : {
                $hari='Sabtu';
            }break;
            //pemberian nama default jika tidak ada nama bulan
            default: {
                $hari='Tidak Terdeteksi';
            }break;
        }
        //pemberian nama bulan Indonesia
        switch($bln){
            case 1 : {
                $bln='Januari';
            }break;
            case 2 : {
                $bln='Februari';
            }break;
            case 3 : {
                $bln='Maret';
            }break;
            case 4 : {
                $bln='April';
            }break;
            case 5 : {
                $bln='Mei';
            }break;
            case 6 : {
                $bln="Juni";
            }break;
            case 7 : {
                $bln='Juli';
            }break;
            case 8 : {
                $bln='Agustus';
            }break;
            case 9 : {
                $bln='September';
            }break;
            case 10 : {
                $bln='Oktober';
            }break;
            case 11 : {
                $bln='November';
            }break;
            case 12 : {
                $bln='Desember';
            }break;
            //pemberian nama default jika tidak ada nama bulan
            default: {
                $bln='Tidak Terdeteksi';
            }break;
        }
    return $hari.', '.$tgl.' '.$bln.' '.$thn.' '.$waktu;
        }


         public function data_tanggal($data) {

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

            return $tgl_absensi.' '.$bln_absensi.' '.$thn_absensi;



           
    }

    public function data_tanggal_siswa($data) {

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

            return $hari_absensi.', '.$tgl_absensi.' '.$bln_absensi.' '.$thn_absensi;



           
    }
   

   
}
