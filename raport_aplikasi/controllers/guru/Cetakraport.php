<?php
class Cetakraport extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->model('konfigurasi_m');
        $this->load->library('tanggal');
        $this->load->library('barcode');
    }


   
    public function cover_html($nis=NULL) {

         if ($this->uri->segment(4) == false) {
            ;
            show_404(uri_string());
        }

         if ($this->siswa_m->kodekelaswali() !== $this->siswa_m->kodekelaswali_siswa($this->uri->segment(4))) {
          show_404(uri_string());
        }

        $datanis = $this->siswa_m->get_by_nis($nis);

        // Return 404 if not found
        count($datanis) || show_404(uri_string());

       $this->data['nama_siswa'] = $this->siswa_m->get_by_nis($nis)->siswa_nama;
       $this->data['nisn_siswa'] = $this->siswa_m->get_by_nis($nis)->siswa_nisn;
       $this->data['nis_siswa'] = $this->siswa_m->get_by_nis($nis)->siswa_nis;
       $this->data['kelas_nama'] = $this->siswa_m->get_by_nis($nis)->kelas_nama;
       $this->data['kelas_tahun'] = $this->siswa_m->get_by_nis($nis)->kelas_tahun;
       $this->load->view('admin/cetakraport/cover_raport', $this->data);
       
    }

    public function cover_pdf($nis=NULL) {

        if ($this->uri->segment(4) == false) {
            ;
            show_404(uri_string());
        }

         if ($this->siswa_m->kodekelaswali() !== $this->siswa_m->kodekelaswali_siswa($this->uri->segment(4))) {
          show_404(uri_string());
        }

        $datanis = $this->siswa_m->get_by_nis($nis);

        // Return 404 if not found
        count($datanis) || show_404(uri_string());


    
     include_once APPPATH.'/third_party/mpdf/mpdf.php';
  
    
    //$html=$this->load->view('pdfcoba', true); //load the pdf_output.php by passing our data and get all data in $html varriable.
   
     $this->data['description']=$this->official_copies;
     $this->data['nama_siswa'] = $this->siswa_m->get_by_nis($nis)->siswa_nama;
     $this->data['nisn_siswa'] = $this->siswa_m->get_by_nis($nis)->siswa_nisn;
     $this->data['nis_siswa'] = $this->siswa_m->get_by_nis($nis)->siswa_nis;
     $this->data['kelas_nama'] = $this->siswa_m->get_by_nis($nis)->kelas_nama;
     $this->data['kelas_tahun'] = $this->siswa_m->get_by_nis($nis)->kelas_tahun;
     //now pass the data //

    
    //$html=$this->load->view('pdfcoba',$this->data, true); 
    //this the the PDF filename that user will get to download
    //$pdfFilePath = "COVER_RAPORT-".$this->siswa_m->get_by_nis($nis)->siswa_nama."(".$this->siswa_m->get_by_nis($nis)->siswa_nis.") - ".$this->siswa_m->get_by_nis($nis)->kelas_nama." ANGKATAN ".str_replace('/','-',$this->siswa_m->get_by_nis($nis)->kelas_tahun).".pdf";
    
    //actually, you can pass mPDF parameter on this load() function
    //$mpdf = $this->m_pdf->load();
    //generate the PDF!
    $html=$this->load->view('admin/cetakraport/cover_raport_pdf',$this->data, TRUE);
    $mpdf = new mPDF('utf-8', 'LEGAL');
    $mpdf->SetProtection(array('print'));
    $mpdf->SetAuthor('Annis Nuraini');
    $mpdf->SetDisplayMode('fullpage');
    //$mpdf = new mPDF('','',0,'', 30,10);
    $mpdf->WriteHTML($html);


     $mpdf->Output('COVER RAPORT - '.$this->siswa_m->get_siswa_nis($nis)->siswa_nama. '('.$this->siswa_m->get_siswa_nis($nis)->siswa_nis.') - '.$this->siswa_m->get_siswa_nis($nis)->kelas_nama.'.pdf', 'I');
     

    }


    public function sekolah_html() {

        $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
        $this->data['sekolah'] = unserialize($data['option_data']);
        
        $this->load->view('admin/cetakraport/sekolah_raport', $this->data);
    }
    

     public function sekolah_pdf() {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
        //$pdfFilePath = 'Profile_sekolah.pdf';

        $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
        $dataoption = stripslashes($data['option_data']);
        $datasekolah     = unserialize($data['option_data']);

        $this->data['description']=$this->official_copies;
        $this->data['sekolah']= unserialize($data['option_data']);


        $html=$this->load->view('admin/cetakraport/sekolah_raport_pdf',$this->data, TRUE);
        $mpdf = new mPDF('utf-8', 'LEGAL');
        $mpdf->Image(site_url().'raport_themes/print/smk.png',0,0,210,297,'jpg','',true, false);
        $mpdf->SetWatermarkImage(site_url().'raport_themes/print/smk.png', 0.2, 20,'');
        $mpdf->showWatermarkImage = true;
        $mpdf->SetProtection(array('print'));
        $mpdf->SetAuthor('Annis Nuraini');
        $mpdf->SetDisplayMode('fullpage');
        //$mpdf = new mPDF('','',0,'', 30,10);
        $mpdf->WriteHTML($html);


       $mpdf->Output('DATA SEKOLAH RAPORT('.$datasekolah['sekolah_nama'].') .pdf', 'I');
    }

    public function siswa_html($nis=NULL) {
         if ($this->uri->segment(4) == false) {
            ;
            show_404(uri_string());
        }

         if ($this->siswa_m->kodekelaswali() !== $this->siswa_m->kodekelaswali_siswa($this->uri->segment(4))) {
          show_404(uri_string());
        }

        $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
        $this->data['pengesahan'] = unserialize($data['option_data']);

        $datanis = $this->siswa_m->get_by_nis($nis);

        // Return 404 if not found
        count($datanis) || show_404(uri_string());

        $this->data['siswa'] = $this->siswa_m->get_by_nis($nis);
        $this->load->view('admin/cetakraport/siswa_raport', $this->data);
    }

    public function siswa_pdf($nis=NULL) {

         if ($this->uri->segment(4) == false) {
            ;
            show_404(uri_string());
        }

         if ($this->siswa_m->kodekelaswali() !== $this->siswa_m->kodekelaswali_siswa($this->uri->segment(4))) {
          show_404(uri_string());
        }

        $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
        $this->data['pengesahan'] = unserialize($data['option_data']);

        $datanis = $this->siswa_m->get_by_nis($nis);
        // Return 404 if not found
        count($datanis) || show_404(uri_string());

         include_once APPPATH.'/third_party/mpdf/mpdf.php';

       


        $this->data['siswa'] = $this->siswa_m->get_by_nis($nis);
        $this->data['description']=$this->official_copies;
        $html= $this->load->view('admin/cetakraport/siswa_raport_pdf', $this->data, TRUE);
        $mpdf = new mPDF('utf-8', 'LEGAL');
        //$mpdf->Image(site_url().'raport_themes/print/smk.png',0,0,210,297,'jpg','',true, false);
        $mpdf->SetWatermarkImage(site_url().'raport_themes/print/smk.png', 0.11, 25,array(25,55));
        $mpdf->showWatermarkImage = true;
        $mpdf->SetProtection(array('print'));
        $mpdf->SetAuthor('Annis Nuraini');
        $mpdf->SetDisplayMode('fullpage');
        //$mpdf = new mPDF('','',0,'', 30,10);
        $mpdf->WriteHTML($html);


        $mpdf->Output('DATA SISWA RAPORT - '.$this->siswa_m->get_siswa_nis($nis)->siswa_nama. '('.$this->siswa_m->get_siswa_nis($nis)->siswa_nis.') - '.$this->siswa_m->get_siswa_nis($nis)->kelas_nama.'.pdf', 'I');
     
    }

   
    public function SMT_pdf($semester = NULL, $nis= NULL) {
        
        if ($this->uri->segment(4) == false || $this->uri->segment(5) == false) {
            show_404(uri_string());
        }

         if ($this->siswa_m->kodekelaswali() !== $this->siswa_m->kodekelaswali_siswa($this->uri->segment(4))) {
          show_404(uri_string());
        }
        
        if ($this->uri->segment(5) != 1 && $this->uri->segment(5) != 2 && $this->uri->segment(5) != 3 && $this->uri->segment(5) != 4 && $this->uri->segment(5) != 5 && $this->uri->segment(5) != 6) {
            show_404(uri_string());
        }

      include_once APPPATH.'/third_party/mpdf/mpdf.php';

       
      $semester = $this->uri->segment(5);
      $nis = $this->uri->segment(4);


      $dataangkatan = substr($this->get_tahun($nis), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($semester == 5 || $semester == 6 ) {
         
           $tahun = $semester5dan6;

      } elseif ($semester == 3 || $semester == 4 ) {
          
          $tahun = $semester3dan4;

      } elseif ($semester == 1 || $semester == 2 ) {
          
          $tahun = $semester1dan2;
      } else {
         
          $tahun = $semester5dan6;
      }


      if ($semester == 5 || $semester == 3 || $semester == 1) {
         $semester2 = 'gasal';
      } elseif ($semester == 6 || $semester == 4 || $semester == 2) {
         $semester2 = 'genap';
      } else {
        $semester2 = 'error';
      }

       if ($this->settingkertas() == 'A4') {
        $geser_ver = 65;
        $geser_hor = 40;
      } elseif ($this->settingkertas() == 'LEGAL') {
        $geser_ver = 90;
        $geser_hor = 40;
      } else {
        $geser_ver = 65;
        $geser_hor = 40;
      }

        $this->data['profile_siswa'] = $this->siswa_m->get_siswa_nis($nis);
        $this->data['tahun_ajaran'] =  $tahun;
        $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
        $this->data['sekolah'] = unserialize($data['option_data']);

         $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
        $this->data['pengesahan'] = unserialize($data['option_data']);
        $this->data['ISLAM'] = $this->raport_agama_islam_pdf($semester, $tahun, $nis);
        $this->data['KRISTEN'] = $this->raport_agama_kristen_pdf($semester, $tahun, $nis);
        $this->data['KATOLIK'] = $this->raport_agama_katolik_pdf($semester, $tahun, $nis);
        $this->data['kelompok_A'] = $this->raport_kelompok_A_pdf($semester, $tahun, $nis); 
        $this->data['kelompok_B'] = $this->raport_kelompok_B_pdf($semester, $tahun, $nis); 
        $this->data['kelompok_C1'] = $this->raport_kelompok_C1_pdf($semester, $tahun, $nis);
        $this->data['kelompok_C2'] = $this->raport_kelompok_C2_pdf($semester, $tahun, $nis);
        $this->data['kelompok_C3'] = $this->raport_kelompok_C3_pdf($semester, $tahun, $nis);
        $this->data['kelompok_M'] = $this->raport_kelompok_M_pdf($semester, $tahun, $nis);
        $this->data['CEKC3'] = $this->cekC3($semester, $tahun, $nis);
        $this->data['CEKC2'] = $this->cekC2($semester, $tahun, $nis);
        $this->data['CEKM'] = $this->cekM($semester, $tahun, $nis);
        $this->data['CEKNILAI'] = $this->cekNilai($semester, $tahun, $nis);

        $this->data['ESKUL'] = $this->raport_ekstrakurikuler_pdf($semester, $tahun, $nis);   
        $this->data['PRESTASI'] = $this->raport_prestasi_pdf($semester2, $tahun, $nis); 


        $this->data['KETERANGAN_SAKIT'] = $this->siswa_m->raport_absensi($semester2, $tahun, $nis, 'SAKIT')->jumlahsakit;
         $this->data['KETERANGAN_IZIN'] = $this->siswa_m->raport_absensi($semester2, $tahun, $nis, 'IZIN')->jumlahsakit;
          $this->data['KETERANGAN_ALPA'] = $this->siswa_m->raport_absensi($semester2, $tahun, $nis, 'ALPA')->jumlahsakit;

        $this->data['WALI_NAMA'] = $this->siswa_m->raport_walikelas_nama($tahun, $nis);
        $this->data['WALI_NIP'] = $this->siswa_m->raport_walikelas_nip($tahun, $nis);
        $this->data['NILAI_SIKAP'] = $this->raport_nilaisikap_pdf($semester, $tahun, $nis);
        $this->data['DATA_SIKAP'] = $this->raport_nilaisikap2($semester, $tahun, $nis);
        $this->data['SETTINGKERTAS'] = $this->settingkertas();
        
       $this->data['description']=$this->official_copies;


        $html= $this->load->view('admin/cetakraport/raport_pdf', $this->data, TRUE);
        $mpdf = new mPDF('utf-8', $this->settingkertas().'-L');

      
        //$mpdf->Image(site_url().'raport_themes/print/smk.png',0,0,210,297,'jpg','',true, false);
        $mpdf->SetWatermarkImage(site_url().'raport_themes/print/smk.png', 0.09, 25,array($geser_ver,$geser_hor));
        $mpdf->showWatermarkImage = true;
        $mpdf->SetProtection(array('print'));
        $mpdf->SetAuthor('Annis Nuraini');
        $mpdf->SetDisplayMode('fullpage');
        //$mpdf = new mPDF('','',0,'', 30,10);
        $mpdf->WriteHTML($html);


         $mpdf->Output('NILAI RAPORT - '.$this->siswa_m->get_siswa_nis($nis)->siswa_nama. '('.$this->siswa_m->get_siswa_nis($nis)->siswa_nis.') - SEMESTER '. $this->uri->segment(5).'.pdf', 'I');

    }

    private function settingkertas() {
      return 'LEGAL';
    }



    public function SMT_html($semester = NULL, $nis= NULL) {
        
        if ($this->uri->segment(4) == false || $this->uri->segment(5) == false) {
            show_404(uri_string());
        }

        if ($this->siswa_m->kodekelaswali() !== $this->siswa_m->kodekelaswali_siswa($this->uri->segment(4))) {
          show_404(uri_string());
        }
        
        if ($this->uri->segment(5) != 1 && $this->uri->segment(5) != 2 && $this->uri->segment(5) != 3 && $this->uri->segment(5) != 4 && $this->uri->segment(5) != 5 && $this->uri->segment(5) != 6) {
            show_404(uri_string());
        }


      $semester = $this->uri->segment(5);
      $nis = $this->uri->segment(4);


      $dataangkatan = substr($this->get_tahun($nis), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($semester == 5 || $semester == 6 ) {
         
           $tahun = $semester5dan6;

      } elseif ($semester == 3 || $semester == 4 ) {
          
          $tahun = $semester3dan4;

      } elseif ($semester == 1 || $semester == 2 ) {
          
          $tahun = $semester1dan2;
      } else {
         
          $tahun = $semester5dan6;
      }


      if ($semester == 5 || $semester == 3 || $semester == 1) {
         $semester2 = 'gasal';
      } elseif ($semester == 6 || $semester == 4 || $semester == 2) {
         $semester2 = 'genap';
      } else {
        $semester2 = 'error';
      }

        $this->data['profile_siswa'] = $this->siswa_m->get_siswa_nis($nis);
        $this->data['tahun_ajaran'] =  $tahun;
        $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
        $this->data['sekolah'] = unserialize($data['option_data']);

         $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
        $this->data['pengesahan'] = unserialize($data['option_data']);
        $this->data['ISLAM'] = $this->raport_agama_islam($semester, $tahun, $nis);
        $this->data['KRISTEN'] = $this->raport_agama_kristen($semester, $tahun, $nis);
        $this->data['KATOLIK'] = $this->raport_agama_katolik($semester, $tahun, $nis);
        $this->data['kelompok_A'] = $this->raport_kelompok_A($semester, $tahun, $nis); 
        $this->data['kelompok_B'] = $this->raport_kelompok_B($semester, $tahun, $nis); 
        $this->data['kelompok_C1'] = $this->raport_kelompok_C1($semester, $tahun, $nis);
        $this->data['kelompok_C2'] = $this->raport_kelompok_C2($semester, $tahun, $nis);
        $this->data['kelompok_C3'] = $this->raport_kelompok_C3($semester, $tahun, $nis);
        $this->data['kelompok_M'] = $this->raport_kelompok_M($semester, $tahun, $nis);
        $this->data['CEKC3'] = $this->cekC3($semester, $tahun, $nis);
        $this->data['CEKC2'] = $this->cekC2($semester, $tahun, $nis);
        $this->data['CEKM'] = $this->cekM($semester, $tahun, $nis);
        $this->data['CEKNILAI'] = $this->cekNilai($semester, $tahun, $nis);

        $this->data['ESKUL'] = $this->raport_ekstrakurikuler($semester, $tahun, $nis);   
        $this->data['PRESTASI'] = $this->raport_prestasi($semester2, $tahun, $nis); 
        $this->data['KETERANGAN_SAKIT'] = $this->siswa_m->raport_absensi($semester2, $tahun, $nis, 'SAKIT')->jumlahsakit;
         $this->data['KETERANGAN_IZIN'] = $this->siswa_m->raport_absensi($semester2, $tahun, $nis, 'IZIN')->jumlahsakit;
          $this->data['KETERANGAN_ALPA'] = $this->siswa_m->raport_absensi($semester2, $tahun, $nis, 'ALPA')->jumlahsakit;

        $this->data['WALI_NAMA'] = $this->siswa_m->raport_walikelas_nama($tahun, $nis);
        $this->data['WALI_NIP'] = $this->siswa_m->raport_walikelas_nip($tahun, $nis);
        $this->data['NILAI_SIKAP'] = $this->raport_nilaisikap($semester, $tahun, $nis);
        $this->data['DATA_SIKAP'] = $this->raport_nilaisikap2($semester, $tahun, $nis);
        
        //$this->data('kelompok_B') = ;
        //$this->data('kelompok_C') = ;
        $this->load->view('admin/cetakraport/raport_html', $this->data);
    }



 private function get_tahun($nis)
    {

        $query = $this->db->query('SELECT kelas_tahun, siswa_nis FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_nis = "'.$this->db->escape_str($nis).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $data = $row->kelas_tahun;
        }

        return $data;





    }



    public function cobatahun() {
        echo        $this->get_tahun('916123');

    }


    private function raport_nilaisikap2($semester, $tahun, $nis) {
          $data1  = $this->siswa_m->raport_nilaisikap($semester, $tahun, $nis);
        
       

         if(!empty($data1)){
            
            foreach($data1 as $row) {
            return $row->nilaisikap_data;
            }


        } else {
            return '';
        }

    }
   
    private function raport_nilaisikap($semester, $tahun, $nis) {
          $data1  = $this->siswa_m->raport_nilaisikap($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            
            foreach($data1 as $row) {

            if ($row->nilaisikap_data == 'A') {
                $datanilai = 'Amat Baik';
                $sikapdeskripsi = 'Sangat Baik dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            } elseif ($row->nilaisikap_data == 'B') {
                $datanilai = 'Baik';
                 $sikapdeskripsi = 'Baik dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            } elseif ($row->nilaisikap_data == 'C') {
                $datanilai = 'Cukup';
                 $sikapdeskripsi = 'Cukup dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            } else {
                $datanilai = 'Kurang';
                 $sikapdeskripsi = 'Kurang dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            }    
                     $tmp .= '<tr style="height:391.5pt">
          <td style="width:198.75pt;border:solid  1.5pt;
          border-top:none;padding:0in 5.4pt 0in 5.4pt;height:391.5pt" valign="top" width="265">
          <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
          text-align:center;line-height:normal" align="center"><b><span style="font-size:12.0pt;text-align:center">'.$datanilai.'</span></b></p>
          </td>
          <td style="width:783.0pt;border-top:none;border-left:
          none;border-bottom:solid  1.5pt;border-right:solid  1.5pt;
          padding:0in 5.4pt 0in 5.4pt;height:391.5pt;text-align:left" valign="top" width="1044">
          <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
          normal"><span style="font-size:12.0pt;text-align:left">'.$sikapdeskripsi.'</span></p>
          </td>
         </tr>';
        }
        } else {


          $tmp .= '<tr style="height:391.5pt">
  <td style="width:198.75pt;border:solid  1.5pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:391.5pt" valign="top" width="265">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal" align="center"><b><span style="font-size:12.0pt">-</span></b></p>
  </td>
  <td style="width:783.0pt;border-top:none;border-left:
  none;border-bottom:solid  1.5pt;border-right:solid  1.5pt;
  padding:0in 5.4pt 0in 5.4pt;height:391.5pt" valign="top" width="1044">
  <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt">-</span></p>
  </td>
 </tr>';
            
        }

           
     
        return $tmp;
    }

    private function raport_nilaisikap_pdf($semester, $tahun, $nis) {
          $data1  = $this->siswa_m->raport_nilaisikap($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            
            foreach($data1 as $row) {

            if ($row->nilaisikap_data == 'A') {
                $datanilai = 'Amat Baik';
                $sikapdeskripsi = 'Sangat Baik dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            } elseif ($row->nilaisikap_data == 'B') {
                $datanilai = 'Baik';
                 $sikapdeskripsi = 'Baik dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            } elseif ($row->nilaisikap_data == 'C') {
                $datanilai = 'Cukup';
                 $sikapdeskripsi = 'Cukup dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            } else {
                $datanilai = 'Kurang';
                 $sikapdeskripsi = 'Kurang dalam '. strtok(strtolower($row->nilaisikap_deskripsi), ' ').' '.strstr($row->nilaisikap_deskripsi, ' ');
            }


            if ($this->settingkertas() == 'A4') {
              $tinggiku = '540.5pt';
            } elseif ($this->settingkertas() == 'LEGAL') {
              $tinggiku = '415.5pt';
            } else {
              $tinggiku = '540.5pt';
            } 
                     $tmp .= '<tr style="height:'.$tinggiku.'">
          <td style="width:198.75pt;
          border-top:none;padding:0in 5.4pt 0in 5.4pt;height:'.$tinggiku.'" valign="top" width="265">
          <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
          text-align:center;line-height:normal" align="center"><b><span style="font-size:12.0pt;text-align:center">'.$datanilai.'</span></b></p>
          </td>


          <td style="width:783.0pt;border-left:none;border-top:none;
          padding:0in 5.4pt 0in 5.4pt;height:'.$tinggiku.';text-align:left" valign="top" width="1044">
          <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
          normal"><span style="font-size:12.0pt;text-align:left">'.$sikapdeskripsi.'</span></p>
          </td>

         </tr>';
        }
        } else {


          $tmp .= '<tr style="height:'.$tinggiku.'">
          <td style="width:198.75pt;
          border-top:none;padding:0in 5.4pt 0in 5.4pt;height:'.$tinggiku.'" valign="top" width="265">
          <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
          text-align:center;line-height:normal" align="center"><b><span style="font-size:12.0pt;text-align:center">-</span></b></p>
          </td>


          <td style="width:783.0pt;border-left:none;border-top:none;
          padding:0in 5.4pt 0in 5.4pt;height:'.$tinggiku.';text-align:left" valign="top" width="1044">
          <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
          normal"><span style="font-size:12.0pt;text-align:left">-</span></p>
          </td>

         </tr>';
            
        }

           
     
        return $tmp;
    }
    private function raport_kelompok_A($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_kelompok_A($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 1;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "="">
    <span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">-</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">-</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE>-</p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }


     private function raport_kelompok_A_pdf($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_kelompok_A($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 1;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="height:21.9pt;">


    <td >
   -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   -
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    -
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }




     private function raport_kelompok_B($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_B($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">-</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">-</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE>-</p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }


     private function raport_kelompok_B_pdf($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_B($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 

                 $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="height:21.9pt;">


    <td >
   -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   -
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    -
    </td>
   </tr>';
            
        }
           
     
        return $tmp;

     }

     private function raport_kelompok_C1($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_C1($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">-</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">-</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE>-</p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }


     private function raport_kelompok_C1_pdf($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_C1($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                 $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="height:21.9pt;">


    <td >
   -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   -
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    -
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }




     private function raport_kelompok_C2($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_C2($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             $tmp .= '<tr style="mso-yfti-irow:2;height:21.9pt">
                        <td width=1295 colspan=10 style="width:971.5pt;border-top:none;border-left:
                        solid black 1.5pt;mso-border-left-themecolor:text1;border-bottom:solid black 3.0pt;
                        mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
                        mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
                        mso-border-top-themecolor:text1;background:#FFF2CC;mso-background-themecolor:
                        accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt;height:
                        21.9pt">
                        <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
                        line-height:normal"><span class=SpellE><b><span style="font-size:12.0pt;
                        mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                        Calibri;mso-hansi-theme-font:minor-latin">Kelompok</span></b></span><b><span
                        style="font-size:12.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">
                        C2</span></b><span style="mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin"><o:p></o:p></span></p>
                        </td>
                       </tr>';
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">-</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">-</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE>-</p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }

     private function raport_kelompok_C2_pdf($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_C2($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             $tmp .= '<tr style="mso-yfti-irow:2;height:21.9pt;">
                        <td width=1295 colspan=10 style="width:971.5pt;border-top:2.5pt solid black ;border-left:
                        1.5pt solid black ;mso-border-left-themecolor:text1;border-bottom:2.5pt solid black ;
                        mso-border-bottom-themecolor:text1;border-right:1.5pt solid black ;
                        mso-border-right-themecolor:text1;mso-border-top-alt:solid black 2.5pt;
                        mso-border-top-themecolor:text1;background:#FFF2CC;mso-background-themecolor:
                        accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt;height:
                        21.9pt;text-align:left;">
                        <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
                        line-height:normal"><span class=SpellE><b><span style="font-size:12.0pt;
                        mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                        Calibri;mso-hansi-theme-font:minor-latin">Kelompok</span></b></span><b><span
                        style="font-size:12.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">
                        C2</span></b><span style="mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin"><o:p></o:p></span></p>
                        </td>
                       </tr>';
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                 $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="height:21.9pt;">


    <td >
   -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   -
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    -
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }




     private function raport_kelompok_C3($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_C3($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             $tmp .= '<tr style="mso-yfti-irow:2;height:21.9pt">
                        <td width=1295 colspan=10 style="width:971.5pt;border-top:none;border-left:
                        solid black 1.5pt;mso-border-left-themecolor:text1;border-bottom:solid black 3.0pt;
                        mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
                        mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
                        mso-border-top-themecolor:text1;background:#FFF2CC;mso-background-themecolor:
                        accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt;height:
                        21.9pt">
                        <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
                        line-height:normal"><span class=SpellE><b><span style="font-size:12.0pt;
                        mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                        Calibri;mso-hansi-theme-font:minor-latin">Kelompok</span></b></span><b><span
                        style="font-size:12.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">
                        C3</span></b><span style="mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin"><o:p></o:p></span></p>
                        </td>
                       </tr>';
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:9.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">-</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">-</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE>-</p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }


     private function raport_kelompok_C3_pdf($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_C3($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             $tmp .= '<tr style="mso-yfti-irow:2;height:21.9pt;">
                        <td width=1295 colspan=10 style="width:971.5pt;border-top:2.5pt solid black ;border-left:
                        1.5pt solid black ;mso-border-left-themecolor:text1;border-bottom:2.5pt solid black ;
                        mso-border-bottom-themecolor:text1;border-right:1.5pt solid black ;
                        mso-border-right-themecolor:text1;mso-border-top-alt:solid black 2.5pt;
                        mso-border-top-themecolor:text1;background:#FFF2CC;mso-background-themecolor:
                        accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt;height:
                        21.9pt;text-align:left;">
                        <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
                        line-height:normal"><span class=SpellE><b><span style="font-size:12.0pt;
                        mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                        Calibri;mso-hansi-theme-font:minor-latin">Kelompok</span></b></span><b><span
                        style="font-size:12.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">
                        C3</span></b><span style="mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin"><o:p></o:p></span></p>
                        </td>
                       </tr>';
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 

                 $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="height:21.9pt;">


    <td >
   -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   -
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    -
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }



     private function raport_kelompok_M($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_M($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             $tmp .= '<tr style="mso-yfti-irow:2;height:21.9pt">
                        <td width=1295 colspan=10 style="width:971.5pt;border-top:none;border-left:
                        solid black 1.5pt;mso-border-left-themecolor:text1;border-bottom:solid black 3.0pt;
                        mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
                        mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
                        mso-border-top-themecolor:text1;background:#FFF2CC;mso-background-themecolor:
                        accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt;height:
                        21.9pt">
                        <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
                        line-height:normal"><span class=SpellE><b><span style="font-size:12.0pt;
                        mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                        Calibri;mso-hansi-theme-font:minor-latin"></span></b></span><b><span
                        style="font-size:12.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">
                        Muatan Lokal</span></b><span style="mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin"><o:p></o:p></span></p>
                        </td>
                       </tr>';
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:9.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">-</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">-</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">-</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE>-</p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }



     private function raport_kelompok_M_pdf($semester, $tahun, $nis) {
       
        
        $data1  = $this->siswa_m->raport_kelompok_M($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             $tmp .= '<tr style="mso-yfti-irow:2;height:21.9pt;">
                        <td width=1295 colspan=10 style="width:971.5pt;border-top:2.5pt solid black ;border-left:
                        1.5pt solid black ;mso-border-left-themecolor:text1;border-bottom:2.5pt solid black ;
                        mso-border-bottom-themecolor:text1;border-right:1.5pt solid black ;
                        mso-border-right-themecolor:text1;mso-border-top-alt:solid black 2.5pt;
                        mso-border-top-themecolor:text1;background:#FFF2CC;mso-background-themecolor:
                        accent4;mso-background-themetint:51;padding:0in 5.4pt 0in 5.4pt;height:
                        21.9pt;text-align:left;">
                        <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
                        line-height:normal"><span class=SpellE><b><span style="font-size:12.0pt;
                        mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
                        Calibri;mso-hansi-theme-font:minor-latin"></span></b></span><b><span
                        style="font-size:12.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">
                        Muatan Lokal</span></b><span style="mso-ascii-font-family:Calibri;mso-ascii-theme-font:
                        minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin"><o:p></o:p></span></p>
                        </td>
                       </tr>';
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '<tr style="height:21.9pt;">


    <td >
   -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   -
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    -
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>-</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    -
    </td>
   </tr>';
            
        }

           
     
        return $tmp;

     }

    private function raport_agama_islam($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_agama_islam($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '';
            
        }

           
     
        return $tmp;

     }


     private function raport_agama_islam_pdf($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_agama_islam($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


               $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '';
            
        }

           
     
        return $tmp;

     }



      private function raport_agama_katolik($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_agama_katolik($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '';
            
        }

           
     
        return $tmp;

     }

     private function raport_agama_katolik_pdf($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_agama_katolik($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                 $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '';
            
        }

           
     
        return $tmp;

     }



      private function raport_agama_kristen($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_agama_kristen($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }


                $tmp .= '<tr style="mso-yfti-irow:3;height:21.9pt">
    <td width=41 style="width:30.75pt;border:solid black 1.5pt;mso-border-themecolor:
    text1;border-top:none;mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:
    text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$no.'.</span><o:p></o:p></span></p>
    </td>
    <td width=240 style="width:2.5in;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span class=SpellE><b><span times="" new="" "="">'.$row->kompetensi_nama.'</p>
    </td>
    <td width=48 style="width:.5in;border-top:none;border-left:none;border-bottom:
    solid black 1.5pt;mso-border-bottom-themecolor:text1;border-right:solid black 1.5pt;
    mso-border-right-themecolor:text1;mso-border-top-alt:solid black 3.0pt;
    mso-border-top-themecolor:text1;mso-border-left-alt:solid black 1.5pt;
    mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_P.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_pengetahuan.'</span><o:p></o:p></span></p>
    </td>
    <td width=61 style="width:45.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $predikat_p.'</span><o:p></o:p></span></p>
    </td>
    <td width=324 valign=top style="width:243.0pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span times="" new="" "=""><span
    class=SpellE><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:
    minor-latin">'.$kompetensi_p.'</p>
    </td>
    <td width=53 style="width:39.75pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span style="font-size:11.0pt;
    mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-hansi-font-family:
    Calibri;mso-hansi-theme-font:minor-latin">'. $row->KKM_K.'</span><o:p></o:p></span></p>
    </td>
    <td width=60 style="width:45.0pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;font-weight:bold;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'. $nilai_keterampilan.'</span><o:p></o:p></span></p>
    </td>
    <td width=66 style="width:49.5pt;border-top:none;border-left:none;
    border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal align=center style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal"><span times="" new="" "=""><span
    style="font-size:11.0pt;mso-ascii-font-family:Calibri;mso-ascii-theme-font:
    minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin">'.$predikat_k.'</span><o:p></o:p></span></p>
    </td>
    <td width=342 valign=top style="width:256.75pt;border-top:none;border-left:
    none;border-bottom:solid black 1.5pt;mso-border-bottom-themecolor:text1;
    border-right:solid black 1.5pt;mso-border-right-themecolor:text1;
    mso-border-top-alt:solid black 3.0pt;mso-border-top-themecolor:text1;
    mso-border-left-alt:solid black 1.5pt;mso-border-left-themecolor:text1;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt">
    <p class=MsoNormal style="margin-bottom:0in;margin-bottom:.0001pt;
    text-align:justify;line-height:normal"><span style="font-size:10.0pt" times="" new="" "=""><span
    class=SpellE>'.$kompetensi_k.'</p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '';
            
        }

           
     
        return $tmp;

     }

     private function raport_agama_kristen_pdf($semester, $tahun, $nis) {

        
        $data1  = $this->siswa_m->raport_agama_kristen($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
                if ($row->PENGETAHUAN >= 86 &&  $row->PENGETAHUAN <= 100) {
                    $predikat_p = 'A';
                    $kompetensi_p = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 71 &&  $row->PENGETAHUAN <= 85) {
                    $predikat_p = 'B';
                    $kompetensi_p = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN >= 56 &&  $row->PENGETAHUAN <= 70) {
                    $predikat_p = 'C';
                    $kompetensi_p = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } elseif ($row->PENGETAHUAN <= 55) {
                    $predikat_p = 'D';
                    $kompetensi_p = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_P), ' ').' '.strstr($row->KOMPETENSI_P, ' ');
                } else {
                    $predikat_p = 'K';
                    $kompetensi_p = $row->KOMPETENSI_P;
                }


                
                 if ($row->KETERAMPILAN >= 86 &&  $row->KETERAMPILAN <= 100) {
                    $predikat_k = 'A';
                    $kompetensi_k = 'Sangat Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 71 &&  $row->KETERAMPILAN <= 85) {
                    $predikat_k = 'B';
                    $kompetensi_k = 'Baik dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN >= 56 &&  $row->KETERAMPILAN <= 70) {
                    $predikat_k = 'C';
                    $kompetensi_k = 'Cukup dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } elseif ($row->KETERAMPILAN <= 55) {
                    $predikat_k = 'D';
                    $kompetensi_k = 'Kurang dalam '. strtok(strtolower($row->KOMPETENSI_K), ' ').' '.strstr($row->KOMPETENSI_K, ' ');
                } else {
                    $predikat_k = 'K';
                    $kompetensi_k = $row->KOMPETENSI_K;
                }

                if ($row->PENGETAHUAN < $row->KKM_P) {
                    $nilai_pengetahuan = '<span style=" color: #D91E18 ;">'.$row->PENGETAHUAN.'</span>';
                } else {
                      $nilai_pengetahuan = '<span  >'.$row->PENGETAHUAN.'</span>';
                }

                if ($row->KETERAMPILAN < $row->KKM_K) {
                   $nilai_keterampilan = '<span  style=" color: #D91E18 ;">'.$row->KETERAMPILAN.'</span>';
                } else {
                    $nilai_keterampilan = '<span>'.$row->KETERAMPILAN.'</span>';
                }

                if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                 $tmp .= '<tr style="height:21.9pt;">


    <td >
   '.$no.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">
    <b>
   '. $row->kompetensi_nama .'
    </b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_P.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>
    '. $nilai_pengetahuan.'</b>
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $predikat_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    
    '.$kompetensi_p.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">
    '. $row->KKM_K.'
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"><b>'. $nilai_keterampilan.'</b>
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$predikat_k.'
    </td>


    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:justify;vertical-align: top; padding: 0px 8px 0px 8px">
    '.$kompetensi_k.'
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= '';
            
        }

           
     
        return $tmp;

     }

     private function raport_ekstrakurikuler_pdf($semester, $tahun, $nis) {
        $data1  = $this->siswa_m->raport_ekstrakurikuler($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
              
              if ($row->eskul_id == '26' || $row->eskul_id == '27') {
                    if ($row->nilaieskul_data == 'A') {
                        $datadeskripsi = 'Mampu berinteraksi dengan sangat baik, fasih dalam pengucapan serta dapat menguasai grammar dan mempunyai banyak perbendaharaan kata bahasa inggris yang mumpuni';
                    } elseif ($row->nilaieskul_data == 'B') {
                        $datadeskripsi = 'Dapat berinteraksi menggunakan bahasa inggris dengan baik, walaupun masih ada kesalahan dalam pengucapan kata dan sedikit kesalahan grammar.';
                    }
                    elseif ($row->nilaieskul_data == 'C') {
                        $datadeskripsi = 'Masih memiliki kesulitan dalam berinteraksi dengan bahasa inggris, masih banyak kesalahan pengucapan, kesalahan grammar dan terlihat sekali belum banyak menguasai kosa kata.';
                    } else {
                         $datadeskripsi = 'Sangat kesulitan dalam berinteraksi, penguasaan kosa kata sangat minim, masih banyak sekali ditemukan kesalahan pengucapan dan grammar selama berkomunikasi.';
                    }

              } else {
                  $datadeskripsi =   $row->nilaieskul_deskripsi;
              }

              if ($row->nilaieskul_data == 'A') {
                 $datanilai = 'Amat Baik';
              } elseif ($row->nilaieskul_data == 'B') {
                  $datanilai = 'Baik';
              } elseif ($row->nilaieskul_data == 'C') {
                 $datanilai = 'Cukup';
              } elseif ($row->nilaieskul_data == 'D') {
                  $datanilai = 'Kurang';
              } else {
                 $datanilai = 'Kurang';
              }

              if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 

                $tmp .= ' <tr style="height:21.9pt">
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$no.'</span></p>
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px"><b>'.$row->eskul_nama.'</b>
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$datanilai.'

    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">'.$datadeskripsi.'
    </td>


   </tr>';

                
                
            }

        } else {


          $tmp .= ' <tr style="height:21.9pt">
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-</span></p>
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">-
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    
   </tr>';
            
        }

           
     
        return $tmp;
     }



     private function raport_ekstrakurikuler($semester, $tahun, $nis) {
        $data1  = $this->siswa_m->raport_ekstrakurikuler($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
              
              if ($row->eskul_id == '26' || $row->eskul_id == '27') {
                    if ($row->nilaieskul_data == 'A') {
                        $datadeskripsi = 'Mampu berinteraksi dengan sangat baik, fasih dalam pengucapan serta dapat menguasai grammar dan mempunyai banyak perbendaharaan kata bahasa inggris yang mumpuni';
                    } elseif ($row->nilaieskul_data == 'B') {
                        $datadeskripsi = 'Dapat berinteraksi menggunakan bahasa inggris dengan baik, walaupun masih ada kesalahan dalam pengucapan kata dan sedikit kesalahan grammar.';
                    }
                    elseif ($row->nilaieskul_data == 'C') {
                        $datadeskripsi = 'Masih memiliki kesulitan dalam berinteraksi dengan bahasa inggris, masih banyak kesalahan pengucapan, kesalahan grammar dan terlihat sekali belum banyak menguasai kosa kata.';
                    } else {
                         $datadeskripsi = 'Sangat kesulitan dalam berinteraksi, penguasaan kosa kata sangat minim, masih banyak sekali ditemukan kesalahan pengucapan dan grammar selama berkomunikasi.';
                    }

              } else {
                  $datadeskripsi =   $row->nilaieskul_deskripsi;
              }

              if ($row->nilaieskul_data == 'A') {
                 $datanilai = 'Amat Baik';
              } elseif ($row->nilaieskul_data == 'B') {
                  $datanilai = 'Baik';
              } elseif ($row->nilaieskul_data == 'C') {
                 $datanilai = 'Cukup';
              } elseif ($row->nilaieskul_data == 'D') {
                  $datanilai = 'Kurang';
              } else {
                 $datanilai = 'Kurang';
              }

                $tmp .= ' <tr style="height:21.9pt">
    <td style="width:29.2pt;border:solid  1.5pt;border-top:
    none;padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="39">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:10.0pt">1.</span></p>
    </td>
    <td style="width:325.9pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="435">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><b><span style="font-size:12.0pt">'.$row->eskul_nama.'</span></b></p>
    </td>
    <td style="width:220.5pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="294">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:12.0pt">'.$datanilai.'</span></p>
    </td>
    <td style="width:392.1pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="523">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size:12.0pt">'.$datadeskripsi.'</span></p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= ' <tr style="height:21.9pt">
    <td style="width:29.2pt;border:solid  1.5pt;border-top:
    none;padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="39">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:10.0pt"> - </span></p>
    </td>
    <td style="text-align:center;width:325.9pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="435">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><b><span style="font-size:12.0pt">-</span></b></p>
    </td>
    <td style="width:220.5pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="294">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:12.0pt"> - </span></p>
    </td>
    <td style="width:392.1pt;text-align:center;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="523">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size:12.0pt"> - </span></p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;
     }


     private function raport_prestasi_pdf($semester, $tahun, $nis) {
        $data1  = $this->siswa_m->raport_prestasi($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
             

              if ($this->settingkertas() == 'A4') {
                  $besarfont = '11.0pt';
                } elseif ($this->settingkertas() == 'LEGAL') {
                  $besarfont = '10.0pt';
                } else {
                  $besarfont = '11.0pt';
                } 


                 $tmp .= ' <tr style="height:21.9pt">
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">'.$no.'</span></p>
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px"><b>'.$row->prestasi_nama.'</b>
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px"> Peringkat :<b>'.$row->prestasi_peringkat.'</b> / Tingkat : <b>'.$row->prestasi_tingkat.'</b>

    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">'.$row->prestasi_deskripsi.'
    </td>


   </tr>';

                
                
            }

        } else {


          $tmp .= ' <tr style="height:21.9pt">
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-</span></p>
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:left; padding: 0px 8px 0px 8px">-
    </td>
    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    <td style="font-size:'.$besarfont.';font-family:Calibri; text-align:center; padding: 0px 8px 0px 8px">-
    </td>

    
   </tr>';
            
        }
           
     
        return $tmp;
     }

     private function raport_prestasi($semester, $tahun, $nis) {
        $data1  = $this->siswa_m->raport_prestasi($semester, $tahun, $nis);
        
        $tmp  = '';

         if(!empty($data1)){
            $no = 0;
             
            foreach($data1 as $row) {
                
              $no++;
             

                $tmp .= ' <tr style="height:21.9pt">
    <td style="width:29.2pt;border:solid  1.5pt;border-top:
    none;padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="39">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:10.0pt">1.</span></p>
    </td>
    <td style="width:325.9pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="435">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><b><span style="font-size:12.0pt">'.$row->prestasi_nama.'</span></b></p>
    </td>
    <td style="width:220.5pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="294">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:12.0pt">Peringkat '.$row->prestasi_peringkat.'</span></p>
    </td>
    <td style="text-align:center;width:392.1pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="523">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size:12.0pt">Tingkat '.$row->prestasi_tingkat.'</span></p>
    </td>
   </tr>';

                
                
            }

        } else {


          $tmp .= ' <tr style="height:21.9pt">
    <td style="width:29.2pt;border:solid  1.5pt;border-top:
    none;padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="39">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:10.0pt"> - </span></p>
    </td>
    <td style="text-align:center;width:325.9pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="435">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><b><span style="font-size:12.0pt">-</span></b></p>
    </td>
    <td style="width:220.5pt;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="294">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:
    .0001pt;text-align:center;line-height:normal" align="center"><span style="font-size:12.0pt"> - </span></p>
    </td>
    <td style="width:392.1pt;text-align:center;border-top:none;border-left:none;
    border-bottom:solid  1.5pt;border-right:solid  1.5pt;
    padding:0in 5.4pt 0in 5.4pt;height:21.9pt" width="523">
    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;
    line-height:normal"><span style="font-size:12.0pt"> - </span></p>
    </td>
   </tr>';
            
        }

           
     
        return $tmp;
     }



      private function cekC3($semester, $tahun, $nis)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("select kompetensi_kelompok FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='".$this->db->escape_str($tahun)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND kompetensi_kelompok ='C3' group by siswa_nis, nilai_mapel order by mapel_sort");
        //$query = $this->db->get();
        
        return $query->row();
    }
   

    private function cekC2($semester, $tahun, $nis)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("select kompetensi_kelompok FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='".$this->db->escape_str($tahun)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND kompetensi_kelompok ='C2' group by siswa_nis, nilai_mapel order by mapel_sort");
        //$query = $this->db->get();
        
        return $query->row();
    }

     private function cekM($semester, $tahun, $nis)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("select kompetensi_kelompok FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='".$this->db->escape_str($tahun)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND kompetensi_kelompok ='M' group by siswa_nis, nilai_mapel order by mapel_sort");
        //$query = $this->db->get();
        
        return $query->row();
    }

    private function cekNilai($semester, $tahun, $nis) {
             $query = $this->db->query("select siswa_nis, siswa_nama,

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 

haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K
 FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='".$this->db->escape_str($tahun)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."' group by siswa_nis, nilai_mapel HAVING KKM_P > PENGETAHUAN OR KKM_K > KETERAMPILAN  order by mapel_sort");
        //$query = $this->db->get();
        
        return $query->result();
    }
}