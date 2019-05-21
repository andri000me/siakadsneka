<?php
class Datanilaieskul extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->model('nilaieskul_m');
        $this->load->model('konfigurasi_m');
        $this->load->library("PHPExcel");
        $this->load->library('tanggal');
    }

    public function wajib_input_nilai() {
            if ($this->cek_datahakeskul_wajib() == 0) {
           $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data <b> NILAI ESKUL SISWA </b>.</div>';
          } else {
            $this->data['infonilai'] = '';
          }

    	$this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_eskul_wajib();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_eskul_wajib();
    	//Load Data View Data Nilai Input UH
    	$this->data['subview'] = 'guru/datanilaieskul/Wajib_InputNilai';
    	$this->load->view('guru/admindesain', $this->data);
    	
    }

     public function wajib_edit_nilai() {
         if ($this->cek_datahakeskul_wajib() == 0) {
           $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data <b> NILAI ESKUL SISWA </b>.</div>';
          } else {
            $this->data['infonilai'] = '';
          }
       $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_eskul_wajib();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_eskul_wajib();
        $this->data['subview'] = 'guru/datanilaieskul/Wajib_EditNilai';
        $this->load->view('guru/admindesain', $this->data);
        
    }

    public function nonwajib_input_nilai() {
         if ($this->cek_datahakeskul_nonwajib() == 0) {
           $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data <b> NILAI ESKUL SISWA </b>.</div>';
          } else {
            $this->data['infonilai'] = '';
          }
      $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_eskul_nonwajib();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_eskul_nonwajib();
      $this->data['subview'] = 'guru/datanilaieskul/NonWajib_InputNilai';
      $this->load->view('guru/admindesain', $this->data);
      
    }

     public function nonwajib_edit_nilai() {

        if ($this->cek_datahakeskul_nonwajib() == 0) {
           $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data <b> NILAI ESKUL SISWA </b>.</div>';
          } else {
            $this->data['infonilai'] = '';
          }

        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_eskul_nonwajib();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_eskul_nonwajib();
        $this->data['subview'] = 'guru/datanilaieskul/NonWajib_EditNilai';
        $this->load->view('guru/admindesain', $this->data);
        
    }

    public function nonwajib_input_nilai_v2() {
        if ($this->cek_datahakeskul_wajib() == 0) {
       $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data <b> NILAI ESKUL SISWA </b>.</div>';
      } else {
        $this->data['infonilai'] = '';
      }

    $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_eskul_nonwajib();
    $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_eskul_nonwajib();
    $this->data['subview'] = 'guru/datanilaieskul/NonWajib_InputNilai_v2';
    $this->load->view('guru/admindesain', $this->data);
    
}

 public function nonwajib_edit_nilai_v2() {
     if ($this->cek_datahakeskul_wajib() == 0) {
       $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data <b> NILAI ESKUL SISWA </b>.</div>';
      } else {
        $this->data['infonilai'] = '';
      }
    $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_eskul_nonwajib();
    $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_eskul_nonwajib();
    $this->data['subview'] = 'guru/datanilaieskul/NonWajib_EditNilai_v2';
    $this->load->view('guru/admindesain', $this->data);
    
}

   private function cek_datahakeskul_wajib() {
    $query = $this->db->query('SELECT hakeskul_id FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id=raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="1" AND hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_status="1"');

    if ($query->num_rows() > 0)
    {
    $row = $query->row();

     return 1;
       
    } else {

      return 0;
    }

  }

   private function cek_datahakeskul_nonwajib() {
    $query = $this->db->query('SELECT hakeskul_id FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id=raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="2" AND hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_status="1"');

    if ($query->num_rows() > 0)
    {
    $row = $query->row();

     return 1;
       
    } else {

      return 0;
    }

  }

   private function cekkodekelaswali_fix($dataangkatan, $datakelas, $semester, $dataeskul) {

        $dataangkatan = substr($dataangkatan, 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($semester == 5 || $semester == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($semester == 3 || $semester == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($semester == 1 || $semester == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


        $query = $this->db->query('SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_tahunajaran="'.$this->db->escape_str($tahunajaran).'" AND hakeskul_kelas="'.$this->db->escape_str($datakelas).'" AND hakeskul_ideskul="'.$this->db->escape_str($dataeskul).'" AND hakeskul_status="1" AND eskul_kategori="1" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->hakeskul_kodeguru;

         return 1; 
         
        } else {

         return 0;
        }
        
          

    }

    private function cekkodekelaswali_nonwajib_fix_v2($dataangkatan, $datakelas, $semester, $dataeskul) {

        $dataangkatan = substr($dataangkatan, 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($semester == 5 || $semester == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($semester == 3 || $semester == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($semester == 1 || $semester == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


        $query = $this->db->query('SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_tahunajaran="'.$this->db->escape_str($tahunajaran).'" AND hakeskul_kelas="'.$this->db->escape_str($datakelas).'" AND hakeskul_ideskul="'.$this->db->escape_str($dataeskul).'" AND hakeskul_status="1" AND eskul_kategori="2" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->hakeskul_kodeguru;

         return 1; 
         
        } else {

         return 0;
        }
        
          

    }

    private function cekkodekelaswali_nonwajib_fix($dataangkatan, $semester, $dataeskul) {

        $dataangkatan = substr($dataangkatan, 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($semester == 5 || $semester == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($semester == 3 || $semester == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($semester == 1 || $semester == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


        $query = $this->db->query('SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_tahunajaran="'.$this->db->escape_str($tahunajaran).'" AND hakeskul_ideskul="'.$this->db->escape_str($dataeskul).'" AND hakeskul_status="1" AND eskul_kategori="2"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->hakeskul_kodeguru;

         return 1; 
         
        } else {
         return 0;
        }
        
          

    }


    public function cek() {
      $this->db->select('nilaieskul_id,siswa_nis,siswa_nama,kelas_nama, nilaieskul_data, nilaieskul_deskripsi, siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
        $this->db->from('raport_nilaieskul');
        $this->db->join('(SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis', 'left');
        //$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis', 'left');
        $this->db->where('siswa_kelas', 20);
        $this->db->where('nilaieskul_dataeskul', 7);
        $this->db->where('nilaieskul_semester', 5);
        $this->db->where('nilaieskul_tahunajaran', '2011/2012');
        //$this->db->where('nilaieskul_tahunajaran', $tahun);
        $query = $this->db->get();
       
        dump($this->db->last_query());
    }


    public function cek2() {
        $this->db->select('nilaieskul_id,siswa_nis,siswa_nama,kelas_nama, nilaieskul_data, nilaieskul_deskripsi, siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
        $this->db->from('raport_nilaieskul');
        $this->db->join('(SELECT pesertaeskul_id,pesertaeskul_tahunajaran,pesertaeskul_dataeskul,pesertaeskul_status, siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_pesertaeskul LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFt JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas) as data_siswa2 ON data_siswa2.siswa_nis = raport_pesertaeskul.pesertaeskul_nis ) as data_siswa', 'data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis', 'left');
        $this->db->join('raport_eskul', 'raport_eskul.eskul_id = raport_nilaieskul.nilaieskul_dataeskul', 'left');
        $this->db->where('eskul_kategori', 2);
        $this->db->where('pesertaeskul_tahunajaran', '2011/2012');
        $this->db->where('pesertaeskul_status', 1);
        $this->db->where('pesertaeskul_dataeskul', 16);
        $this->db->where('nilaieskul_tahunajaran', '2011/2012');
        $this->db->where('nilaieskul_dataeskul', 16);
        $this->db->where('nilaieskul_semester', 5);
        //$this->db->where('kelas_tahun', $tahun);
         $query = $this->db->get();
       
        dump($this->db->last_query());
    }

    public function rekap_uh() {
        
        //Load Data View Data Nilai Rekap UH
        $this->data['subview'] = 'guru/datanilai/rekapUH';
        $this->load->view('guru/admindesain', $this->data);
        
    }

    

    public function download_formnilai() {
        //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                    ),
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

            $styleSiswa = array(
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }

      if ($this->cekdataeskul($this->input->post('nilai_cari_eskul')) < 1) {
       $namaeskul = 'DATA TIDAK DITEMUKAN';
      } else {
        $namaeskul = strtoupper($this->get_namaeskul($this->input->post('nilai_cari_eskul')));
      }


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }





        $datakelas = $this->get_datakelas($this->input->post('nilai_cari_kelas'));
           $dataangkatankelas = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
           if(!empty($datakelas)){
            
                    foreach ($datakelas as $row) {
                        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }
                        
                        
                        $datatahunkelas = $row->kelas_tahun;
                        $datajurusan = $row->kelas_kk;
                    }

            } else {
                $datanamakelas = 'KELAS KOSONG';
                $datatahunkelas = 'EMPTY';
                $datajurusan = 'EMPTY';
            }


            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A12', 'NO')
                                        ->setCellValue('B12', 'NIS')
                                        ->setCellValue('C12', 'NAMA SISWA')
                                        ->setCellValue('D12', 'KELAS')
                                        ->setCellValue('E12', 'ABSEN')
                                        ->setCellValue('F12', 'NILAI')
                                        ->setCellValue('G12', 'DESKRIPSI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'JURUSAN')
                                        ->setCellValue('A8', 'TAHUN AJARAN')
                                        ->setCellValue('A9', 'SEMESTER')
                                        ->setCellValue('D5', 'EKSTRA KURIKULER')
                                        ->setCellValue('D6', 'KATEGORI ESKUL')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU')
                                        ->setCellValue('D9', 'JUMLAH SISWA');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_eskul'));


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'FORM INPUT DATA NILAI ESKUL')
                                        ->setCellValue('A2', 'ESKUL '.$namaeskul.' - '.strtoupper($datanamakelas))
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:G12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getFont()->setName('Times New Roman');
            $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
            $objPHPExcel->getActiveSheet()->getColumnDimension('g')->setWidth(77);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


      

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Pesan error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai A,B dan C (Mohon Untuk Diperbaiki) !!!.');
            $objValidation->setPromptTitle('Pilih Nilai :');
            $objValidation->setPrompt('Masukkan nilai eskul, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_siswa_aktif($this->input->post('nilai_cari_kelas'));
            } else {
                $data   = $this->get_datakelas_siswa_alumni($this->input->post('nilai_cari_kelas'));
            }
             
             $nomor = 0;
             $angka = 12;

            if ($this->cekkodekelaswali_fix($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) == 1) {
                if(!empty($data)){
                
                foreach($data as $row) {
                    $nomor++;
                    $angka++;


                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->siswa_nis)
                                        ->setCellValue('C'.$angka, $row->siswa_nama)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('nilai_cari_semester'))
                                        ->setCellValue('E'.$angka, $row->siswa_absen)
                                        ->setCellValue('F'.$angka, '')
                                        ->setCellValue('G'.$angka, '');



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':G'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             $objPHPExcel->getActiveSheet()->getCell('F'.$angka)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setSize(12);
                }


            } else {
                 
            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
           }
          } else {

            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF SAAT INI ANDA TIDAK MEMILIKI HAK AKSES UNTUK MENGINPUT DATA NILAI ESKUL WAJIB PADA KELAS INI');
          }
            
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                        ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                        ->setCellValue('C8', ': '.$tahunajaran)
                                        ->setCellValue('C9', ': '.strtoupper($datasemester))
                                        ->setCellValue('E5', ': '.$namaeskul)
                                        ->setCellValue('E6', ': '.$kategorieskul)
                                        ->setCellValue('E7', ': '.$this->get_namaguru())
                                        ->setCellValue('E8', ': '.$this->get_nipguru())
                                        ->setCellValue('E9',': '.$nomor);

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NILAI ESKUL_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
            $objPHPExcel->getActiveSheet()->setTitle($judulexcel);

            $objPHPExcel->getSecurity()->setLockWindows(true);
            $objPHPExcel->getSecurity()->setLockStructure(true);
            $objPHPExcel->getSecurity()->setWorkbookPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

            //$objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'NILAI_ESKUL(WAJIB)_'.$namaeskul.'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_ESKUL(WAJIB)_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_ESKUL(WAJIB)_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_ESKUL(WAJIB)_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords($namaeskul)  
            ->setCategory($namaeskul);  
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="'.$namaexcel.'.xls"');
            //unduh file
           $objWriter->save("php://output");

            //readfile ('hasilExcel.xls');
 
           
    }

    public function download_formnilai_nonwajib_v2() {
        //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                    ),
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

            $styleSiswa = array(
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }

      if ($this->cekdataeskul_nonwajib_v2($this->input->post('nilai_cari_eskul')) < 1) {
       $namaeskul = 'DATA TIDAK DITEMUKAN';
      } else {
        $namaeskul = strtoupper($this->get_namaeskul($this->input->post('nilai_cari_eskul')));
      }


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }





        $datakelas = $this->get_datakelas($this->input->post('nilai_cari_kelas'));
           $dataangkatankelas = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
           if(!empty($datakelas)){
            
                    foreach ($datakelas as $row) {
                        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }
                        
                        
                        $datatahunkelas = $row->kelas_tahun;
                        $datajurusan = $row->kelas_kk;
                    }

            } else {
                $datanamakelas = 'KELAS KOSONG';
                $datatahunkelas = 'EMPTY';
                $datajurusan = 'EMPTY';
            }


            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A12', 'NO')
                                        ->setCellValue('B12', 'NIS')
                                        ->setCellValue('C12', 'NAMA SISWA')
                                        ->setCellValue('D12', 'KELAS')
                                        ->setCellValue('E12', 'ABSEN')
                                        ->setCellValue('F12', 'NILAI')
                                        ->setCellValue('G12', 'DESKRIPSI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'JURUSAN')
                                        ->setCellValue('A8', 'TAHUN AJARAN')
                                        ->setCellValue('A9', 'SEMESTER')
                                        ->setCellValue('D5', 'EKSTRA KURIKULER')
                                        ->setCellValue('D6', 'KATEGORI ESKUL')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU')
                                        ->setCellValue('D9', 'JUMLAH SISWA');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_eskul'));


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'FORM INPUT DATA NILAI ESKUL')
                                        ->setCellValue('A2', 'ESKUL '.$namaeskul.' - '.strtoupper($datanamakelas))
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:G12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getFont()->setName('Times New Roman');
            $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
            $objPHPExcel->getActiveSheet()->getColumnDimension('g')->setWidth(77);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


      

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Pesan error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai A,B dan C (Mohon Untuk Diperbaiki) !!!.');
            $objValidation->setPromptTitle('Pilih Nilai :');
            $objValidation->setPrompt('Masukkan nilai eskul, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_siswa_aktif($this->input->post('nilai_cari_kelas'));
            } else {
                $data   = $this->get_datakelas_siswa_alumni($this->input->post('nilai_cari_kelas'));
            }
             
             $nomor = 0;
             $angka = 12;

            if ($this->cekkodekelaswali_nonwajib_fix_v2($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) == 1) {
                if(!empty($data)){
                
                foreach($data as $row) {
                    $nomor++;
                    $angka++;


                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->siswa_nis)
                                        ->setCellValue('C'.$angka, $row->siswa_nama)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('nilai_cari_semester'))
                                        ->setCellValue('E'.$angka, $row->siswa_absen)
                                        ->setCellValue('F'.$angka, '')
                                        ->setCellValue('G'.$angka, '');



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':G'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             $objPHPExcel->getActiveSheet()->getCell('F'.$angka)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setSize(12);
                }


            } else {
                 
            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
           }
          } else {

            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF SAAT INI ANDA TIDAK MEMILIKI HAK AKSES UNTUK MENGINPUT DATA NILAI ESKUL WAJIB PADA KELAS INI');
          }
            
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                        ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                        ->setCellValue('C8', ': '.$tahunajaran)
                                        ->setCellValue('C9', ': '.strtoupper($datasemester))
                                        ->setCellValue('E5', ': '.$namaeskul)
                                        ->setCellValue('E6', ': '.$kategorieskul)
                                        ->setCellValue('E7', ': '.$this->get_namaguru())
                                        ->setCellValue('E8', ': '.$this->get_nipguru())
                                        ->setCellValue('E9',': '.$nomor);

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NILAI ESKUL_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
            $objPHPExcel->getActiveSheet()->setTitle($judulexcel);

            $objPHPExcel->getSecurity()->setLockWindows(true);
            $objPHPExcel->getSecurity()->setLockStructure(true);
            $objPHPExcel->getSecurity()->setWorkbookPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

            //$objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'NILAI_ESKUL(NON WAJIB)_'.$namaeskul.'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords($namaeskul)  
            ->setCategory($namaeskul);  
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="'.$namaexcel.'.xls"');
            //unduh file
           $objWriter->save("php://output");

            //readfile ('hasilExcel.xls');
 
           
    }


    public function download_formnilai_nonwajib() {
        //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                    ),
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

            $styleSiswa = array(
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }

      if ($this->cekdataeskul_nonwajib($this->input->post('nilai_cari_eskul')) < 1) {
       $namaeskul = 'DATA TIDAK DITEMUKAN';
      } else {
        $namaeskul = strtoupper($this->get_namaeskul($this->input->post('nilai_cari_eskul')));
      }


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }



            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A12', 'NO')
                                        ->setCellValue('B12', 'NIS')
                                        ->setCellValue('C12', 'NAMA SISWA')
                                        ->setCellValue('D12', 'KELAS')
                                        //->setCellValue('E12', 'ABSEN')
                                        ->setCellValue('E12', 'NILAI')
                                        ->setCellValue('F12', 'DESKRIPSI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'TAHUN AJARAN')
                                        ->setCellValue('A8', 'SEMESTER')
                                        ->setCellValue('A9', 'JUMLAH PESERTA')
                                        ->setCellValue('D5', 'EKSTRA KURIKULER')
                                        ->setCellValue('D6', 'KATEGORI ESKUL')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_eskul'));


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'FORM INPUT DATA NILAI EKSTRA KURIKULER')
                                        ->setCellValue('A2', 'ESKUL "'.$namaeskul.'"')
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:F12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getFont()->setName('Times New Roman');
            $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(77);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:E3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


      

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('E13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Pesan error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai A,B dan C (Mohon Untuk Diperbaiki) !!!.');
            $objValidation->setPromptTitle('Pilih Nilai :');
            $objValidation->setPrompt('Masukkan nilai eskul, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_siswa_aktif_nonwajib($this->input->post('nilai_cari_eskul'), $tahunajaran,$this->input->post('nilai_cari_angkatan'));
            } else {
                $data   = $this->get_datakelas_siswa_alumni_nonwajib($this->input->post('nilai_cari_eskul'), $tahunajaran,$this->input->post('nilai_cari_angkatan'));
            }
             
             $nomor = 0;
             $angka = 12;
            if(!empty($data)){
                
                foreach($data as $row) {
                     $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }


                    $nomor++;
                    $angka++;


                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->pesertaeskul_nis)
                                        ->setCellValue('C'.$angka, $row->siswa_nama)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('nilai_cari_semester'))
                                        //->setCellValue(''.$angka, $row->siswa_absen)
                                        ->setCellValue('E'.$angka, '')
                                        ->setCellValue('F'.$angka, '');



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':F'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             //$objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             $objPHPExcel->getActiveSheet()->getCell('E'.$angka)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getFont()->setSize(12);
                }


            } else {
                 
            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
           }
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': Angkatan '.$this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('C7', ': '.$tahunajaran)
                                        ->setCellValue('C8', ': '.strtoupper($datasemester))
                                         ->setCellValue('C9',': '.$nomor)
                                        ->setCellValue('E5', ': '.$namaeskul)
                                        ->setCellValue('E6', ': '.$kategorieskul)
                                        ->setCellValue('E7', ': '.$this->get_namaguru())
                                        ->setCellValue('E8', ': '.$this->get_nipguru());
                                       

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NILAI EKSUL_SMT'.$this->input->post('nilai_cari_semester').'_'.str_replace('/','-',$tahunajaran);
            $objPHPExcel->getActiveSheet()->setTitle($judulexcel);

            $objPHPExcel->getSecurity()->setLockWindows(true);
            $objPHPExcel->getSecurity()->setLockStructure(true);
            $objPHPExcel->getSecurity()->setWorkbookPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

            //$objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'NILAI_ESKUL(NON WAJIB)_'.$namaeskul.'_ANGKATAN'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords($namaeskul)  
            ->setCategory($namaeskul);  
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="'.$namaexcel.'.xls"');
            //unduh file
           $objWriter->save("php://output");

            //readfile ('hasilExcel.xls');
 
           
    }


     

     public function download_formnilai_hasil() {
       
           //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                    ),
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

            $styleSiswa = array(
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }

      if ($this->cekdataeskul($this->input->post('nilai_cari_eskul')) < 1) {
       $namaeskul = 'DATA TIDAK DITEMUKAN';
      } else {
        $namaeskul = strtoupper($this->get_namaeskul($this->input->post('nilai_cari_eskul')));
      }


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }





        $datakelas = $this->get_datakelas($this->input->post('nilai_cari_kelas'));
           $dataangkatankelas = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
           if(!empty($datakelas)){
            
                    foreach ($datakelas as $row) {
                        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }
                        
                        
                        $datatahunkelas = $row->kelas_tahun;
                        $datajurusan = $row->kelas_kk;
                    }

            } else {
                $datanamakelas = 'KELAS KOSONG';
                $datatahunkelas = 'EMPTY';
                $datajurusan = 'EMPTY';
            }


            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A12', 'NO')
                                        ->setCellValue('B12', 'NIS')
                                        ->setCellValue('C12', 'NAMA SISWA')
                                        ->setCellValue('D12', 'KELAS')
                                        ->setCellValue('E12', 'ABSEN')
                                        ->setCellValue('F12', 'NILAI')
                                        ->setCellValue('G12', 'DESKRIPSI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'JURUSAN')
                                        ->setCellValue('A8', 'TAHUN AJARAN')
                                        ->setCellValue('A9', 'SEMESTER')
                                        ->setCellValue('D5', 'EKSTRA KURIKULER')
                                        ->setCellValue('D6', 'KATEGORI ESKUL')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU')
                                        ->setCellValue('D9', 'JUMLAH SISWA');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_eskul'));


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'INFORMASI DATA NILAI EKSTRA KURIKULER')
                                        ->setCellValue('A2', 'ESKUL '.$namaeskul.' - '.strtoupper($datanamakelas))
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:G12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getFont()->setName('Times New Roman');
            $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
            $objPHPExcel->getActiveSheet()->getColumnDimension('g')->setWidth(77);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


      

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Pesan error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai A,B dan C (Mohon Untuk Diperbaiki) !!!.');
            $objValidation->setPromptTitle('Pilih Nilai :');
            $objValidation->setPrompt('Masukkan nilai eskul, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_nilaieskulsiswa_aktif($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'));
            } else {
                $data   = $this->get_datakelas_nilaieskulsiswa_alumni($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'));
            }
             
             $nomor = 0;
             $angka = 12;
            if ($this->cekkodekelaswali_fix($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) == 1) {
              if(!empty($data)){
                
                foreach($data as $row) {
                    $nomor++;
                    $angka++;


                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->siswa_nis)
                                        ->setCellValue('C'.$angka, $row->siswa_nama)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('nilai_cari_semester'))
                                        ->setCellValue('E'.$angka, $row->siswa_absen)
                                        ->setCellValue('F'.$angka, $row->nilaieskul_data)
                                        ->setCellValue('G'.$angka, $row->nilaieskul_deskripsi);



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':G'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             $objPHPExcel->getActiveSheet()->getCell('F'.$angka)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setSize(12);
                }


            } else {
                 
            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
           }
            } else {

               $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF SAAT INI ANDA TIDAK MEMILIKI HAK AKSES UNTUK MELIHAT HASIL DATA NILAI ESKUL WAJIB PADA KELAS INI');
            }
            
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                        ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                        ->setCellValue('C8', ': '.$tahunajaran)
                                        ->setCellValue('C9', ': '.strtoupper($datasemester))
                                        ->setCellValue('E5', ': '.$namaeskul)
                                        ->setCellValue('E6', ': '.$kategorieskul)
                                        ->setCellValue('E7', ': '.$this->get_namaguru())
                                        ->setCellValue('E8', ': '.$this->get_nipguru())
                                        ->setCellValue('E9',': '.$nomor);

            
             
            //set title pada sheet (me rename nama sheet)
           $judulexcel = 'NILAI ESKUL_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
            $objPHPExcel->getActiveSheet()->setTitle($judulexcel);
            $objPHPExcel->getActiveSheet()->setTitle($judulexcel);

            $objPHPExcel->getSecurity()->setLockWindows(true);
            $objPHPExcel->getSecurity()->setLockStructure(true);
            $objPHPExcel->getSecurity()->setWorkbookPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

            //$objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'HASIL_NILAIESKUL (WAJIB)_'.$namaeskul.'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_ESKUL_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_ESKUL_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_ESKUL_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords($namaeskul)  
            ->setCategory($namaeskul);  
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="'.$namaexcel.'.xls"');
            //unduh file
           $objWriter->save("php://output");

            //readfile ('hasilExcel.xls');
    }

    public function download_formnilai_hasil_nonwajib_v2() {
       
        //membuat objek PHPExcel
         $objPHPExcel = new PHPExcel();

   
         $styleArray = array(
          'font' => array(
                     'bold' => true,
                 ),
              'borders' => array(
                 'allborders' => array(
                     'style' => PHPExcel_Style_Border::BORDER_THIN,
                     'color' => array('argb' => '000s0000'),
                 ),
             ),
         );

         $styleSiswa = array(
              'borders' => array(
                 'allborders' => array(
                     'style' => PHPExcel_Style_Border::BORDER_THIN,
                     'color' => array('argb' => '000s0000'),
                 ),
             ),
         );

   $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
   $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
   $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
   $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

   if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
     $kategorieskul = 'WAJIB';
   } else {
     $kategorieskul = 'TIDAK WAJIB';
   }

   if ($this->cekdataeskul_nonwajib_v2($this->input->post('nilai_cari_eskul')) < 1) {
    $namaeskul = 'DATA TIDAK DITEMUKAN';
   } else {
     $namaeskul = strtoupper($this->get_namaeskul($this->input->post('nilai_cari_eskul')));
   }


   if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
      
        $tahunajaran =$semester5dan6;

   } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
       
       $tahunajaran = $semester3dan4;
   } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
       
       $tahunajaran = $semester1dan2;
   } else {
      
       $tahunajaran = 'XXXX/XXXX';
   }


    if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
      
        $datasemester = 'GASAL';
        
   } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
       
       $datasemester = 'GENAP';
   } else {
      
       $datasemester = 'XXXXX';
   }





     $datakelas = $this->get_datakelas($this->input->post('nilai_cari_kelas'));
        $dataangkatankelas = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
        if(!empty($datakelas)){
         
                 foreach ($datakelas as $row) {
                     $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                     if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                         $datanamakelas = 'XII'.$kelasku;
                     } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                         $datanamakelas = 'XI'.$kelasku;
                         
                     } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                         $datanamakelas = 'X'.$kelasku;
                     } else {
                         $datanamakelas = 'XII'.$kelasku;
                     }
                     
                     
                     $datatahunkelas = $row->kelas_tahun;
                     $datajurusan = $row->kelas_kk;
                 }

         } else {
             $datanamakelas = 'KELAS KOSONG';
             $datatahunkelas = 'EMPTY';
             $datajurusan = 'EMPTY';
         }


         //set Sheet yang akan diolah 
         $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('A12', 'NO')
                                     ->setCellValue('B12', 'NIS')
                                     ->setCellValue('C12', 'NAMA SISWA')
                                     ->setCellValue('D12', 'KELAS')
                                     ->setCellValue('E12', 'ABSEN')
                                     ->setCellValue('F12', 'NILAI')
                                     ->setCellValue('G12', 'DESKRIPSI');

         $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('A5', 'NAMA SEKOLAH')
                                     ->setCellValue('A6', 'KELAS')
                                     ->setCellValue('A7', 'JURUSAN')
                                     ->setCellValue('A8', 'TAHUN AJARAN')
                                     ->setCellValue('A9', 'SEMESTER')
                                     ->setCellValue('D5', 'EKSTRA KURIKULER')
                                     ->setCellValue('D6', 'KATEGORI ESKUL')
                                     ->setCellValue('D7', 'PENGINPUT NILAI')
                                     ->setCellValue('D8', 'NIP GURU')
                                     ->setCellValue('D9', 'JUMLAH SISWA');


         $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                     ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                     ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                     ->setCellValue('L4', $this->input->post('nilai_cari_eskul'));


         

       $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('A1', 'INFORMASI DATA NILAI EKSTRA KURIKULER')
                                     ->setCellValue('A2', 'ESKUL '.$namaeskul.' - '.strtoupper($datanamakelas))
                                      ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                    
                                    

         $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->applyFromArray($styleArray);
         $objPHPExcel->getActiveSheet()->getStyle('A11:G12')->getFont()->setSize(11);
         $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
         $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getFont()->setName('Times New Roman');
         $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
         $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
         $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
         $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
         $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
         $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
         $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
         $objPHPExcel->getActiveSheet()->getColumnDimension('g')->setWidth(77);
         $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
         $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
         $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
         $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

         $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

         $objPHPExcel->getActiveSheet()->getStyle('A1:G12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
         $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
         $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
         $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
         $objPHPExcel->getActiveSheet()->getStyle('A12:G12')->getFill()->getStartColor()->setARGB('FF3F3F');
        


   

         $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
         $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
         $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
         $objValidation->setAllowBlank(false);
         $objValidation->setShowInputMessage(true);
         $objValidation->setShowErrorMessage(true);
         $objValidation->setShowDropDown(true);
         $objValidation->setErrorTitle('Pesan error');
         $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai A,B dan C (Mohon Untuk Diperbaiki) !!!.');
         $objValidation->setPromptTitle('Pilih Nilai :');
         $objValidation->setPrompt('Masukkan nilai eskul, sesuai dengan list menu yang tersedia.');
         $objValidation->setFormula1('"A,B,C"');

         if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
             $data   = $this->get_datakelas_nilaieskulsiswa_aktif($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'));
         } else {
             $data   = $this->get_datakelas_nilaieskulsiswa_alumni($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'));
         }
          
          $nomor = 0;
          $angka = 12;
         if ($this->cekkodekelaswali_nonwajib_fix_v2($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) == 1) {
           if(!empty($data)){
             
             foreach($data as $row) {
                 $nomor++;
                 $angka++;


                  $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('A'.$angka, $nomor)
                                     ->setCellValue('B'.$angka, $row->siswa_nis)
                                     ->setCellValue('C'.$angka, $row->siswa_nama)
                                     ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('nilai_cari_semester'))
                                     ->setCellValue('E'.$angka, $row->siswa_absen)
                                     ->setCellValue('F'.$angka, $row->nilaieskul_data)
                                     ->setCellValue('G'.$angka, $row->nilaieskul_deskripsi);



          $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':G'.$angka)->applyFromArray($styleSiswa);                            
          $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
          $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
         $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
          $objPHPExcel->getActiveSheet()->getCell('F'.$angka)->setDataValidation(clone $objValidation);
          $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getFont()->setBold(TRUE);
          $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setBold(TRUE);
          $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getFont()->setSize(12);
             }


         } else {
              
         $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

           $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
        }
         } else {

            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

           $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('A13', 'MAAF SAAT INI ANDA TIDAK MEMILIKI HAK AKSES UNTUK MELIHAT HASIL DATA NILAI ESKUL WAJIB PADA KELAS INI');
         }
         
     

        $objPHPExcel->setActiveSheetIndex(0)
                                     ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                     ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                     ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                     ->setCellValue('C8', ': '.$tahunajaran)
                                     ->setCellValue('C9', ': '.strtoupper($datasemester))
                                     ->setCellValue('E5', ': '.$namaeskul)
                                     ->setCellValue('E6', ': '.$kategorieskul)
                                     ->setCellValue('E7', ': '.$this->get_namaguru())
                                     ->setCellValue('E8', ': '.$this->get_nipguru())
                                     ->setCellValue('E9',': '.$nomor);

         
          
         //set title pada sheet (me rename nama sheet)
        $judulexcel = 'NILAI ESKUL_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
         $objPHPExcel->getActiveSheet()->setTitle($judulexcel);
         $objPHPExcel->getActiveSheet()->setTitle($judulexcel);

         $objPHPExcel->getSecurity()->setLockWindows(true);
         $objPHPExcel->getSecurity()->setLockStructure(true);
         $objPHPExcel->getSecurity()->setWorkbookPassword(config_item('erapor_excelpassword'));
         $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
         $objPHPExcel->getActiveSheet()->getProtection()->setPassword(config_item('erapor_excelpassword'));
         $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
         $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
         $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
         $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

         //$objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
         
         //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
         $namaexcel = 'HASIL_NILAIESKUL (NON WAJIB)_'.$namaeskul.'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




           $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
         ->setLastModifiedBy("Annis Nuraini")  
         ->setTitle('NILAI_ESKUL_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
         ->setSubject('NILAI_ESKUL_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
         ->setDescription('NILAI_ESKUL_'.$namaeskul.'_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
         ->setKeywords($namaeskul)  
         ->setCategory($namaeskul);  
         //sesuaikan headernya 
         header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
         header("Cache-Control: no-store, no-cache, must-revalidate");
         header("Cache-Control: post-check=0, pre-check=0", false);
         header("Pragma: no-cache");
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         //ubah nama file saat diunduh
         header('Content-Disposition: attachment;filename="'.$namaexcel.'.xls"');
         //unduh file
        $objWriter->save("php://output");

         //readfile ('hasilExcel.xls');
 }

    public function download_formnilai_nonwajib_hasil() {
        //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                    ),
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

            $styleSiswa = array(
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
            );

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }

      if ($this->cekdataeskul_nonwajib($this->input->post('nilai_cari_eskul')) < 1) {
       $namaeskul = 'DATA TIDAK DITEMUKAN';
      } else {
        $namaeskul = strtoupper($this->get_namaeskul($this->input->post('nilai_cari_eskul')));
      }


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }



            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A12', 'NO')
                                        ->setCellValue('B12', 'NIS')
                                        ->setCellValue('C12', 'NAMA SISWA')
                                        ->setCellValue('D12', 'KELAS')
                                        //->setCellValue('E12', 'ABSEN')
                                        ->setCellValue('E12', 'NILAI')
                                        ->setCellValue('F12', 'DESKRIPSI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'TAHUN AJARAN')
                                        ->setCellValue('A8', 'SEMESTER')
                                        ->setCellValue('A9', 'JUMLAH PESERTA')
                                        ->setCellValue('D5', 'EKSTRA KURIKULER')
                                        ->setCellValue('D6', 'KATEGORI ESKUL')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_eskul'));


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'INFORMASI HASIL DATA NILAI EKSTRA KURIKULER')
                                        ->setCellValue('A2', 'ESKUL "'.$namaeskul.'"')
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:F12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getFont()->setName('Times New Roman');
            $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(77);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:E3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('G12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


      

            $objValidation = $objPHPExcel->getActiveSheet()->getCell('E13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Pesan error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai A,B dan C (Mohon Untuk Diperbaiki) !!!.');
            $objValidation->setPromptTitle('Pilih Nilai :');
            $objValidation->setPrompt('Masukkan nilai eskul, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datanilai_siswa_aktif_nonwajib($tahunajaran,$this->input->post('nilai_cari_eskul'), $tahunajaran,$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'));
            } else {
                $data   = $this->get_datanilai_siswa_alumni_nonwajib($tahunajaran,$this->input->post('nilai_cari_eskul'), $tahunajaran,$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'));
            }
             
             $nomor = 0;
             $angka = 12;
            if(!empty($data)){
                
                foreach($data as $row) {
                     $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }


                    $nomor++;
                    $angka++;


                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->siswa_nis)
                                        ->setCellValue('C'.$angka, $row->siswa_nama)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('nilai_cari_semester'))
                                        //->setCellValue(''.$angka, $row->siswa_absen)
                                        ->setCellValue('E'.$angka, $row->nilaieskul_data)
                                        ->setCellValue('F'.$angka, $row->nilaieskul_deskripsi);



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':F'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             //$objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             $objPHPExcel->getActiveSheet()->getCell('E'.$angka)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getFont()->setSize(12);
                }


            } else {
                 
            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
           }
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': Angkatan '.$this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('C7', ': '.$tahunajaran)
                                        ->setCellValue('C8', ': '.strtoupper($datasemester))
                                         ->setCellValue('C9',': '.$nomor)
                                        ->setCellValue('E5', ': '.$namaeskul)
                                        ->setCellValue('E6', ': '.$kategorieskul)
                                        ->setCellValue('E7', ': '.$this->get_namaguru())
                                        ->setCellValue('E8', ': '.$this->get_nipguru());

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NILAI EKSUL_SMT'.$this->input->post('nilai_cari_semester').'_'.str_replace('/','-',$tahunajaran);
            $objPHPExcel->getActiveSheet()->setTitle($judulexcel);

            $objPHPExcel->getSecurity()->setLockWindows(true);
            $objPHPExcel->getSecurity()->setLockStructure(true);
            $objPHPExcel->getSecurity()->setWorkbookPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setPassword(config_item('erapor_excelpassword'));
            $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setSort(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setInsertRows(true);
            $objPHPExcel->getActiveSheet()->getProtection()->setFormatCells(true);

            //$objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'HASIL NILAI_ESKUL(NON WAJIB)_'.$namaeskul.'_ANGKATAN'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_ESKUL(NON WAJIB)_'.$namaeskul.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords($namaeskul)  
            ->setCategory($namaeskul);  
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="'.$namaexcel.'.xls"');
            //unduh file
           $objWriter->save("php://output");

            //readfile ('hasilExcel.xls');
 
           
    }


     

    

     private function jumlahnilai($kelas, $semester, $jenis, $mapel)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_eskul="'.$this->db->escape_str($mapel).'" AND  nilai_jenis get_kelastahun( "'.$jenis.'%"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function jumlahnilai2($kelas, $semester, $jenis, $mapel)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_mapel="'.$this->db->escape_str($mapel).'" AND nilai_jenis LIKE "'.$jenis.'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function ceknilaieskul($kelas, $semester, $eskul)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilaieskul_dataeskul)) as jumlah FROM `raport_nilaieskul` LEFT JOIN (SELECT siswa_nis,kelas_nama, siswa_kelas FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaieskul_semester="'.$this->db->escape_str($semester).'" AND nilaieskul_dataeskul="'.$this->db->escape_str($eskul).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function ceknilaieskul_nonwajib_v2($kelas, $semester, $eskul)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilaieskul_dataeskul)) as jumlah FROM `raport_nilaieskul` LEFT JOIN (SELECT siswa_nis,kelas_nama, siswa_kelas FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaieskul_semester="'.$this->db->escape_str($semester).'" AND nilaieskul_dataeskul="'.$this->db->escape_str($eskul).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

     private function ceknilaieskul_nonwajib($eskul, $semester, $tahun)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilaieskul_dataeskul)) as jumlah FROM `raport_nilaieskul` LEFT JOIN (SELECT siswa_nis,kelas_nama, siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaieskul.nilaieskul_dataeskul WHERE eskul_kategori=2 AND nilaieskul_dataeskul="'.$this->db->escape_str($eskul).'" AND nilaieskul_semester="'.$this->db->escape_str($semester).'" AND kelas_tahun="'.$this->db->escape_str($tahun).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function ceknilaieskul_nonwajib_edit($tahun, $semester, $tahunajaran, $eskul)
    {

        $query = $this->db->query('SELECT DISTINCT COUNT(DISTINCT(nilaieskul_dataeskul)) as jumlah FROM raport_nilaieskul LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaieskul.nilaieskul_dataeskul WHERE eskul_kategori=2 AND eskul_status=1 AND kelas_tahun="'.$this->db->escape_str($tahun).'" AND nilaieskul_semester="'.$this->db->escape_str($semester).'" AND eskul_tahunajaran="'.$this->db->escape_str($tahunajaran).'" AND nilaieskul_dataeskul="'.$this->db->escape_str($eskul).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }


    private function jumlahsiswa($kelas, $status)
    {
        if ($this->status_kelas($status) == 'aktif') {
            $query = $this->db->query('SELECT COUNT(siswa_nis) as jumlah FROM `raport_siswa` WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND siswa_status=1');
        } else {
            $query = $this->db->query('SELECT COUNT(siswa_nis) as jumlah FROM `raport_siswa` WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND siswa_status=2');
        }
        

       
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function jumlahsiswa_nonwajib($eskul, $semester, $tahun, $status)
    {
        if ($this->status_kelas($status) == 'aktif') {
            $query = $this->db->query('SELECT COUNT(`pesertaeskul_id`) as jumlah FROM `raport_pesertaeskul` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_pesertaeskul`.`pesertaeskul_nis` WHERE `siswa_status`=1 AND `pesertaeskul_status` = 1 AND `pesertaeskul_dataeskul` = "'.$this->db->escape_str($eskul).'" AND `pesertaeskul_tahunajaran` = "'.$this->db->escape_str($semester).'" AND `kelas_tahun` = "'.$this->db->escape_str($tahun).'"');
        } else {
             $query = $this->db->query('SELECT COUNT(`pesertaeskul_id`) as jumlah FROM `raport_pesertaeskul` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_pesertaeskul`.`pesertaeskul_nis` WHERE `siswa_status`=2 AND `pesertaeskul_status` = 1 AND `pesertaeskul_dataeskul` = "'.$this->db->escape_str($eskul).'" AND `pesertaeskul_tahunajaran` = "'.$this->db->escape_str($semester).'" AND `kelas_tahun` = "'.$this->db->escape_str($tahun).'"');
        }
        

       
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function nilairaport($kelas, $semester, $mapel, $aspek)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_eskul="'.$this->db->escape_str($mapel).'" AND nilai_jenis LIKE "'.$aspek.'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }
     private function nilairaport2($kelas, $semester, $mapel)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_eskul="'.$this->db->escape_str($mapel).'" AND nilai_jenis LIKE "RAPORT%"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function status_kelas($status)
    {

        $query = $this->db->query('SELECT DISTINCT(kelas_status) FROM `raport_kelas` WHERE kelas_tahun="'.$this->db->escape_str($status).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_status;
           
        }
         return $row->kelas_status;
    }

    public function cekjumlah() {
        echo $this->status_kelas('2011/2012');
        
    }

     private function get_datakelas_siswa_aktif($kelas) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND siswa_status=1  ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }


     private function get_datakelas_siswa_alumni($kelas) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND siswa_status=2  ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datakelas_siswa_aktif_nonwajib($eskul, $semester, $tahun) {
        $query = $this->db->query('SELECT `pesertaeskul_id`, `pesertaeskul_nis`, `siswa_nama`, `kelas_nama`, `kelas_kk`, `kelas_tahun` FROM `raport_pesertaeskul` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_pesertaeskul`.`pesertaeskul_nis` WHERE `pesertaeskul_status` = 1 AND siswa_status=1 AND `pesertaeskul_dataeskul` = "'.$this->db->escape_str($eskul).'" AND `pesertaeskul_tahunajaran` = "'.$this->db->escape_str($semester).'" AND `kelas_tahun` = "'.$this->db->escape_str($tahun).'"' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datakelas_siswa_alumni_nonwajib($eskul, $semester, $tahun) {
        $query = $this->db->query('SELECT `pesertaeskul_id`, `pesertaeskul_nis`, `siswa_nama`, `kelas_nama`, `kelas_kk`, `kelas_tahun` FROM `raport_pesertaeskul` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_pesertaeskul`.`pesertaeskul_nis` WHERE `pesertaeskul_status` = 1 AND siswa_status=2 AND `pesertaeskul_dataeskul` = "'.$this->db->escape_str($eskul).'" AND `pesertaeskul_tahunajaran` = "'.$this->db->escape_str($semester).'" AND `kelas_tahun` = "'.$this->db->escape_str($tahun).'"' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datanilai_siswa_aktif_nonwajib($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester) {
        $query = $this->db->query('SELECT `nilaieskul_id`, `siswa_nis`, `siswa_nama`, `kelas_nama`, `nilaieskul_data`, `nilaieskul_deskripsi`, `siswa_absen`, `kelas_tahun`, `siswa_status`, `kelas_kk`, `siswa_kelas` FROM `raport_nilaieskul` LEFT JOIN (SELECT pesertaeskul_id,pesertaeskul_tahunajaran,pesertaeskul_dataeskul,pesertaeskul_status, siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_pesertaeskul LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFt JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas) as data_siswa2 ON data_siswa2.siswa_nis = raport_pesertaeskul.pesertaeskul_nis ) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_nilaieskul`.`nilaieskul_nis` LEFT JOIN `raport_eskul` ON `raport_eskul`.`eskul_id` = `raport_nilaieskul`.`nilaieskul_dataeskul` WHERE `eskul_kategori` = 2 AND `pesertaeskul_tahunajaran` = "'.$this->db->escape_str($pesertatahunajaran).'" AND `pesertaeskul_status` = 1 AND `pesertaeskul_dataeskul` = "'.$this->db->escape_str($pesertadataeskul).'" AND `nilaieskul_tahunajaran` = "'.$this->db->escape_str($nilaitahunajaran).'" AND `nilaieskul_dataeskul` = "'.$this->db->escape_str($nilaidataeskul).'" AND `nilaieskul_semester` = "'.$this->db->escape_str($nilaisemester).'" AND `siswa_status` = 1 ORDER BY pesertaeskul_id ASC');
        
        if ($query->num_rows() > 0) return $query->result();              
    }



   private function get_datanilai_siswa_alumni_nonwajib($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester) {
        $query = $this->db->query('SELECT `nilaieskul_id`, `siswa_nis`, `siswa_nama`, `kelas_nama`, `nilaieskul_data`, `nilaieskul_deskripsi`, `siswa_absen`, `kelas_tahun`, `siswa_status`, `kelas_kk`, `siswa_kelas` FROM `raport_nilaieskul` LEFT JOIN (SELECT pesertaeskul_id,pesertaeskul_tahunajaran,pesertaeskul_dataeskul,pesertaeskul_status, siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_pesertaeskul LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFt JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas) as data_siswa2 ON data_siswa2.siswa_nis = raport_pesertaeskul.pesertaeskul_nis ) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_nilaieskul`.`nilaieskul_nis` LEFT JOIN `raport_eskul` ON `raport_eskul`.`eskul_id` = `raport_nilaieskul`.`nilaieskul_dataeskul` WHERE `eskul_kategori` = 2 AND `pesertaeskul_tahunajaran` = "'.$this->db->escape_str($pesertatahunajaran).'" AND `pesertaeskul_status` = 1 AND `pesertaeskul_dataeskul` = "'.$this->db->escape_str($pesertadataeskul).'" AND `nilaieskul_tahunajaran` = "'.$this->db->escape_str($nilaitahunajaran).'" AND `nilaieskul_dataeskul` = "'.$this->db->escape_str($nilaidataeskul).'" AND `nilaieskul_semester` = "'.$this->db->escape_str($nilaisemester).'" AND `siswa_status` = 2 ORDER BY pesertaeskul_id ASC');
        
        if ($query->num_rows() > 0) return $query->result();              
    }




      private function get_datakelas_nilaisiswa_aktif($mapel, $kelas, $semester, $jenis) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, nilai_data, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_nilai ON  raport_nilai.nilai_nis = raport_siswa.siswa_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE  nilai_eskul="'.$this->db->escape_str($mapel).'" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND siswa_status=1 AND nilai_jenis ="'.$this->db->escape_str($jenis).'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }
     

       private function get_datakelas_nilaisiswa_alumni($mapel, $kelas, $semester, $jenis) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, nilai_data, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_nilai ON  raport_nilai.nilai_nis = raport_siswa.siswa_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE  nilai_eskul="'.$this->db->escape_str($mapel).'" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND siswa_status=2 AND nilai_jenis ="'.$this->db->escape_str($jenis).'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datakelas_nilaieskulsiswa_aktif($kelas, $eskul, $semester) {
        $query = $this->db->query('SELECT `nilaieskul_id`, `siswa_nis`, `siswa_nama`, `kelas_nama`, `nilaieskul_data`, `nilaieskul_deskripsi`, `siswa_absen`, `kelas_tahun`, `siswa_status`, `kelas_kk`, `siswa_kelas` FROM `raport_nilaieskul` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_nilaieskul`.`nilaieskul_nis` WHERE `siswa_status` = 1 AND `siswa_kelas` = "'.$this->db->escape_str($kelas).'" AND `nilaieskul_dataeskul` = "'.$this->db->escape_str($eskul).'" AND `nilaieskul_semester` = "'.$this->db->escape_str($semester).'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datakelas_nilaieskulsiswa_alumni($kelas, $eskul, $semester) {
        $query = $this->db->query('SELECT `nilaieskul_id`, `siswa_nis`, `siswa_nama`, `kelas_nama`, `nilaieskul_data`, `nilaieskul_deskripsi`, `siswa_absen`, `kelas_tahun`, `siswa_status`, `kelas_kk`, `siswa_kelas` FROM `raport_nilaieskul` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_nilaieskul`.`nilaieskul_nis` WHERE `siswa_status` = 2 AND `siswa_kelas` = "'.$this->db->escape_str($kelas).'" AND `nilaieskul_dataeskul` = "'.$this->db->escape_str($eskul).'" AND `nilaieskul_semester` = "'.$this->db->escape_str($semester).'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }



    private function get_datakelas($kelas) {
        $query = $this->db->query('SELECT kelas_nama, kelas_tahun, kelas_kk FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($kelas).'"' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }



    private function get_datamapel($mapel) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$this->db->escape_str($mapel).'" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function cari_kelas_modal( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_modal($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->kelas_code."' data-kelas='".$row->kelas_nama."'>".$row->kelas_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

     public function cari_kelas_modal_wajib( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_modal_eskul_wajib($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->kelas_code."' data-kelas='".$row->kelas_nama."'>".$row->kelas_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

     public function cari_kelas_modal_nonwajib_v2( $id = NULL) {

        $tmp  = '';
          $data   = $this->siswa_m->get_data_kelas_modal_eskul_nonwajib($id);
          if(!empty($data)){
              $tmp .= "<option value=''></option>";
              
              foreach($data as $row) {
                  $tmp .= "<option value='".$row->kelas_code."' data-kelas='".$row->kelas_nama."'>".$row->kelas_nama."</option>";
              }
          } else {
              $tmp .= "<option value=''></option>";
              
          }
          die($tmp);
  
       }




      public function cari_eskul() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilaieskul_m->get_data_eskul2($semester5dan6);
           $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilaieskul_m->get_data_eskul2($semester3dan4);
          $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilaieskul_m->get_data_eskul2($semester1dan2);
          $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilaieskul_m->get_data_eskul2($semester5dan6);
          $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                
            }
            $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            $tmp .= "<option value=''>Data Kosong</option>";
            $tmp .= "</optgroup>";
           
        }
        die($tmp);

     }

     public function cari_eskul_wajib() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilaieskul_m->get_data_mapel_eskul_wajib($semester5dan6, $this->input->post('nilai_cari_kelas') );
           $tahunajaran = '<optgroup label="Eskul Wajib TH  :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilaieskul_m->get_data_mapel_eskul_wajib($semester3dan4, $this->input->post('nilai_cari_kelas') );
          $tahunajaran = '<optgroup label="Eskul Wajib TH  :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilaieskul_m->get_data_mapel_eskul_wajib($semester1dan2, $this->input->post('nilai_cari_kelas') );
          $tahunajaran = '<optgroup label="Eskul Wajib TH  :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilaieskul_m->get_data_mapel_eskul_wajib($semester5dan6);
          $tahunajaran = '<optgroup label="Eskul Wajib TH  :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                
            }
            $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            $tmp .= "<option value=''>Data Kosong</option>";
            $tmp .= "</optgroup>";
           
        }
        die($tmp);

     }
     


      public function cari_eskul_nonwajib() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_guru($semester5dan6);
           $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_guru($semester3dan4);
          $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_guru($semester1dan2);
          $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_guru($semester5dan6);
          $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                
            }
            $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            $tmp .= "<option value=''>Data Kosong</option>";
            $tmp .= "</optgroup>";
           
        }
        die($tmp);

     }

     public function cari_eskul_nonwajib_v2() {
        $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
        $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
        $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
        $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);
  
        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
             $data   = $this->nilaieskul_m->get_data_mapel_eskul_nonwajib($semester5dan6, $this->input->post('nilai_cari_kelas') );
             $tahunajaran = '<optgroup label="Eskul NonWajib TH  :'.$semester5dan6.'">';
        } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
            $data   = $this->nilaieskul_m->get_data_mapel_eskul_nonwajib($semester3dan4, $this->input->post('nilai_cari_kelas') );
            $tahunajaran = '<optgroup label="Eskul NonWajib TH  :'.$semester3dan4.'">';
        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
            $data   = $this->nilaieskul_m->get_data_mapel_eskul_nonwajib($semester1dan2, $this->input->post('nilai_cari_kelas') );
            $tahunajaran = '<optgroup label="Eskul NonWajib TH  :'.$semester1dan2.'">';
        } else {
            $data   = $this->nilaieskul_m->get_data_mapel_eskul_nonwajib($semester5dan6);
            $tahunajaran = '<optgroup label="Eskul NonWajib TH  :'.$semester5dan6.'">';
        }
        
          $tmp  = '';
         
          if(!empty($data)){
              $tmp .= "<option value=''></option>";
              $tmp .= $tahunajaran;
              foreach($data as $row) {
                  
                  $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                  
              }
              $tmp .= "</optgroup>";
          } else {
              $tmp .= "<option value=''></option>";
              $tmp .= $tahunajaran;
              $tmp .= "<option value=''>Data Kosong</option>";
              $tmp .= "</optgroup>";
             
          }
          die($tmp);
  
       }

     public function cari_eskul_nonwajib_edit() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_edit($this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_semester'),$semester5dan6);
           $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_edit($this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_semester'),$semester3dan4);
          $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_edit($this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_semester'),$semester1dan2);
          $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilaieskul_m->get_data_eskul2_nonwajib_edit($this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_semester'),$semester5dan6);
          $tahunajaran = '<optgroup label="Eskul Non Wajib TH :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                
            }
            $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            $tmp .= "<option value=''>Data Kosong</option>";
            $tmp .= "</optgroup>";
           
        }
        die($tmp);

     }

     



     public function cari_eskuledit() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilaieskul_m->get_data_eskuledit_guru($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester5dan6);
           $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilaieskul_m->get_data_eskuledit_guru($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester3dan4);
          $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilaieskul_m->get_data_eskuledit_guru($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester1dan2);
          $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilaieskul_m->get_data_eskuledit_guru($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester5dan6);
          $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                
            }
            $tmp .= "</optgroup>";
        } else {
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            $tmp .= "<option value=''>Data Nilai Kosong </option>";
            $tmp .= "</optgroup>";
           
        }
        die($tmp);

     }

     public function cari_eskuledit_nonwajib_v2() {
        $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
        $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
        $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
        $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);
  
        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
             $data   = $this->nilaieskul_m->get_data_eskuledit_guru_nonwajib_v2($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester5dan6);
             $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester5dan6.'">';
        } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
            $data   = $this->nilaieskul_m->get_data_eskuledit_guru_nonwajib_v2($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester3dan4);
            $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester3dan4.'">';
        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
            $data   = $this->nilaieskul_m->get_data_eskuledit_guru_nonwajib_v2($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester1dan2);
            $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester1dan2.'">';
        } else {
            $data   = $this->nilaieskul_m->get_data_eskuledit_guru_nonwajib_v2($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$semester5dan6);
            $tahunajaran = '<optgroup label="Eskul Wajib TH :'.$semester5dan6.'">';
        }
        
          $tmp  = '';
         
          if(!empty($data)){
              $tmp .= "<option value=''></option>";
              $tmp .= $tahunajaran;
              foreach($data as $row) {
                  
                  $tmp .= "<option value='".$row->eskul_id."'>".$row->eskul_nama."</option>";
                  
              }
              $tmp .= "</optgroup>";
          } else {
              $tmp .= "<option value=''></option>";
              $tmp .= $tahunajaran;
              $tmp .= "<option value=''>Data Nilai Kosong </option>";
              $tmp .= "</optgroup>";
             
          }
          die($tmp);
  
       }

      public function cari_mapel2() {

     
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_nilai LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_eskul WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    

     }

     public function cari_semester($id) {

        if ($this->get_kelas($id) == 3) {
            if ($this->konfig() == 'genap') {
                 echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option><option value="5">Semester 5</option><option value="6">Semester 6</option>';
        
             } else {

                if ($this->get_kelas_status($id) == 'alumni') {
                    echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option><option value="5">Semester 5</option><option value="6">Semester 6</option>';
                } else {
                     echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option><option value="5">Semester 5</option>';
                }
                
           
            }
        } elseif ($this->get_kelas($id) == 2) {

            if ($this->konfig() == 'genap') {
            echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option>';
            } else {
                echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option>';
            }
            

        } elseif ($this->get_kelas($id) == 1) {

             if ($this->konfig() == 'genap') {
            echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option>';
            } else {
                echo '<option value=""></option><option value="1">Semester 1</option>';
            }
            
        }
        
     }

     public function cari_semester_wajib($id, $tahun) {


        $tmp  = '';
        $data   = $this->siswa_m->get_data_semester_modal_eskul_wajib($id);

           
        if(!empty($data)){
            //$tmp .= "<option value=''></option>";
            $no= 0;
            foreach($data as $row) {
                   $datatahun = substr($tahun, 0 , 4);
                   $datasemester = intval($datatahun) - substr($row->hakeskul_tahunajaran, 0 , 4);
                   $no++;

                   if ($no == 1) {
                     echo '<option value=""></option>';
                   }
                   if ($datasemester == 2) {
                     echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option>';
                  } elseif ($datasemester == 1) {
                    echo '<option value="3">Semester 3</option> <option value="4">Semester 4</option>';
                  } elseif ($datasemester == 0) {
                   echo '<option value="5">Semester 5</option> <option value="6">Semester 6</option>';
                  } else {
                    echo '<option value="">Semester Tidak Tersedia</option>';
                  }
               
            }
        } else {
            $tmp .= "<option value=''>Semester Tidak Tersedia</option>";
            
        }
        die($tmp);
        
     }


      public function cari_semester_non_wajib($tahun) {


        $tmp  = '';
        $data   = $this->siswa_m->get_data_semester_modal_eskul_nonwajib();

           
        if(!empty($data)){
            //$tmp .= "<option value=''></option>";
            $no= 0;
            foreach($data as $row) {
                   $datatahun = substr($tahun, 0 , 4);
                   $datasemester = intval($datatahun) - substr($row->hakeskul_tahunajaran, 0 , 4);
                   $no++;

                   if ($no == 1) {
                    $tmp .= '<option value=""></option>';
                   }


                   if ($datasemester == 2) {
                     $tmp .= '<option value="1">Semester 1</option> <option value="2">Semester 2</option>';
                  } elseif ($datasemester == 1) {
                    $tmp .= '<option value="3">Semester 3</option> <option value="4">Semester 4</option>';
                  } elseif ($datasemester == 0) {
                   $tmp .= '<option value="5">Semester 5</option> <option value="6">Semester 6</option>';
                  } 
               
            }

            
        } else {
            $tmp .= "<option value=''>Semester Tidak Tersedia</option>";
            
        }
        die($tmp);
        
     }

     public function cari_semester_nonwajib_v2($id, $tahun) {


        $tmp  = '';
        $data   = $this->siswa_m->get_data_semester_modal_eskul_nonwajib_v2($id);

           
        if(!empty($data)){
            //$tmp .= "<option value=''></option>";
            $no= 0;
            foreach($data as $row) {
                   $datatahun = substr($tahun, 0 , 4);
                   $datasemester = intval($datatahun) - substr($row->hakeskul_tahunajaran, 0 , 4);
                   $no++;

                   if ($no == 1) {
                     echo '<option value=""></option>';
                   }
                   if ($datasemester == 2) {
                     echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option>';
                  } elseif ($datasemester == 1) {
                    echo '<option value="3">Semester 3</option> <option value="4">Semester 4</option>';
                  } elseif ($datasemester == 0) {
                   echo '<option value="5">Semester 5</option> <option value="6">Semester 6</option>';
                  } else {
                    echo '<option value="">Semester Tidak Tersedia</option>';
                  }
               
            }
        } else {
            $tmp .= "<option value=''>Semester Tidak Tersedia</option>";
            
        }
        die($tmp);
        
     }


     public function cari_semester_nonwajib($id) {

        if ($this->get_kelastahun($id) == 3) {
            if ($this->konfig() == 'genap') {
                 echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option><option value="5">Semester 5</option><option value="6">Semester 6</option>';
        
             } else {

                if ($this->get_kelas_status_nonwajib($id) == 'alumni') {
                    echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option><option value="5">Semester 5</option><option value="6">Semester 6</option>';
                } else {
                     echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option><option value="5">Semester 5</option>';
                }
                
           
            }
        } elseif ($this->get_kelastahun($id) == 2) {

            if ($this->konfig() == 'genap') {
            echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option><option value="4">Semester 4</option>';
            } else {
                echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option>';
            }
            

        } elseif ($this->get_kelastahun($id) == 1) {

             if ($this->konfig() == 'genap') {
            echo '<option value=""></option><option value="1">Semester 1</option> <option value="2">Semester 2</option>';
            } else {
                echo '<option value=""></option><option value="1">Semester 1</option>';
            }
            
        }
        
     }





      private function get_kelas($id) {
        $query = $this->db->query('SELECT kelas_tingkat FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tingkat;
           
        }

        return $row->kelas_tingkat;

    }

     private function get_kelastahun($id) {

         $did = str_replace('-','/', $id);
        $query = $this->db->query('SELECT MAX(kelas_tingkat) as kelas_tingkat FROM raport_kelas WHERE kelas_tahun="'.$this->db->escape_str($did).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tingkat;
           
        }

        return $row->kelas_tingkat;

    }

    private function get_kelas_status_nonwajib($id) {

         $did = str_replace('-','/', $id);
        $query = $this->db->query('SELECT count(kelas_status) as kelas_statusalumni, kelas_status FROM raport_kelas WHERE kelas_tahun="'.$this->db->escape_str($did).'" AND kelas_status="alumni"');

         $query2 = $this->db->query('SELECT count(kelas_status) as kelas_statusaktif, kelas_status FROM raport_kelas WHERE kelas_tahun="'.$this->db->escape_str($did).'" AND kelas_status="aktif"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_statusalumni;
         $row->kelas_status;
        }

        if ($query2->num_rows() > 0)
        {
        $row2 = $query2->row();

         $row2->kelas_statusaktif;
         $row2->kelas_status;
           
        }



        $dataalumni = $row->kelas_statusalumni;
        $dataaktif = $row2->kelas_statusaktif;


        if ($dataalumni > $dataaktif) {
          return $row->kelas_status;
        } else {
          return $row2->kelas_status;
        } 
       
        
    }

     private function get_kelas_status($id) {
        $query = $this->db->query('SELECT kelas_status FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_status;
           
        }

        return $row->kelas_status;

    }

    private function konfig() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_client'];
    }

    public function input_nilaisiswa() {

          $list = $this->nilaieskul_m->get_datatables_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan'));
        $data = array();

        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $this->get_namakelas($this->input->post('nilai_cari_kelas'))))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }

        

        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = $no;
            $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
            $row[] =  '<select name="siswa_nis['.$siswa->siswa_nis.']" class="class-data-nilai-siswa form-control select2me input-nilai-eskul" data-placeholder="Pilih Nilai"  id="data-nilai-siswa">
                        <option value=""></option>
                        <option value="A">AMAT BAIK</option>
                        <option value="B">BAIK</option>
                        <option value="C">CUKUP</option>
                        </select>';

             $row[] =  '<div class="input-group">
                      <span class="input-group-addon">
                      <i class="fa fa-bars"></i>
                      </span>
                      <input width="30%" name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" type="text">
                    </div>';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilaieskul_m->count_all_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilaieskul_m->count_filtered_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }

    public function nonwajib_input_nilaisiswa_v2() {

        $list = $this->nilaieskul_m->get_datatables_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan'));
      $data = array();

      $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $this->get_namakelas($this->input->post('nilai_cari_kelas'))))));


                      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                          $datanamakelas = 'XII'.$kelasku;
                      } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                          $datanamakelas = 'XI'.$kelasku;
                          
                      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                          $datanamakelas = 'X'.$kelasku;
                      } else {
                          $datanamakelas = 'XII'.$kelasku;
                      }

      

      $no = $this->input->post('start');
      foreach ($list as $siswa) {
          $no++;
          $row = array();
         // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
          $row[] = $no;
          $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
          $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
           $row[] =  '<h4>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</h4>';
          $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
          $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
          $row[] =  '<select name="siswa_nis['.$siswa->siswa_nis.']" class="class-data-nilai-siswa form-control select2me input-nilai-eskul" data-placeholder="Pilih Nilai"  id="data-nilai-siswa">
                      <option value=""></option>
                      <option value="A">AMAT BAIK</option>
                      <option value="B">BAIK</option>
                      <option value="C">CUKUP</option>
                      </select>';

           $row[] =  '<div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-bars"></i>
                    </span>
                    <input width="30%" name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" type="text">
                  </div>';
         
          //$row[] = $siswa->dob;

          //add html for action
         
       
          $data[] = $row;
      }

      $output = array(
                      "draw" => $this->input->post('draw'),
                      "recordsTotal" => $this->nilaieskul_m->count_all_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                      "recordsFiltered" => $this->nilaieskul_m->count_filtered_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                      "data" => $data,
              );
      //output to json format
     //dump($this->db->last_query());
      echo json_encode($output);

  }


     public function nonwajib_input_nilaisiswa() {

       $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

     

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = $semester5dan6;
      }

          $list = $this->nilaieskul_m->get_datatables_datasiswa_nonwajib($this->input->post('nilai_cari_eskul'), $tahunajaran, $this->input->post('nilai_cari_angkatan'));
        $data = array();        

        $no = $this->input->post('start');
        foreach ($list as $siswa) {

             $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $siswa->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }


            $no++;
            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
             $row[] = $no;
            $row[] =  '<input value="'.$siswa->pesertaeskul_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->pesertaeskul_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            //$row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
             $row[] =  form_dropdown('siswa_nis['.$siswa->pesertaeskul_nis.']', array('' => '', 'A' => 'AMAT BAIK', 'B' => 'BAIK', 'C' => 'CUKUP'), $siswa->pesertaeskul_nis, 'class="class-data-nilai-siswa form-control select2me input-nilai-eskul" data-placeholder="Pilih Nilai"  id="data-nilai-siswa"');

             $row[] =  '<div class="input-group">
                      <span class="input-group-addon">
                      <i class="fa fa-bars"></i>
                      </span>
                      <input name="siswa_deskripsi['.$siswa->pesertaeskul_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" value="" type="text">
                    </div>';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilaieskul_m->count_all_datasiswa_nonwajib($this->input->post('nilai_cari_eskul'), $tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilaieskul_m->count_filtered_datasiswa_nonwajib($this->input->post('nilai_cari_eskul'), $tahunajaran, $this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }


public function nonwajib_input_nilaisiswa_edit() {

       $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

     

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = $semester5dan6;
      }

          $list = $this->nilaieskul_m->get_datatables_datasiswa_nonwajib_edit($tahunajaran, $this->input->post('nilai_cari_eskul'), $tahunajaran, $this->input->post('nilai_cari_eskul'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_angkatan'));
        $data = array();        

        $no = $this->input->post('start');
        foreach ($list as $siswa) {

             $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $siswa->kelas_nama))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }


            $no++;
            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input value="'.$siswa->nilaieskul_id.'"  type="hidden" class="form-control" >'.$no;
            $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            //$row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
             $row[] =  form_dropdown('siswa_nis['.$siswa->siswa_nis.']', array('' => '', 'A' => 'AMAT BAIK', 'B' => 'BAIK', 'C' => 'CUKUP'), $siswa->nilaieskul_data, 'class="class-data-nilai-siswa form-control select2me input-nilai-eskul" data-placeholder="Pilih Nilai"  id="data-nilai-siswa"');

             $row[] =  '<div class="input-group">
                      <span class="input-group-addon">
                      <i class="fa fa-bars"></i>
                      </span>
                      <input name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" value="'.$siswa->nilaieskul_deskripsi.'" type="text">
                    </div>';

            //$row[] = $siswa->dob;
            //add html for action
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilaieskul_m->count_all_datasiswa_nonwajib_edit($tahunajaran, $this->input->post('nilai_cari_eskul'), $tahunajaran, $this->input->post('nilai_cari_eskul'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_angkatan')),
                        //"query" => $this->db->last_query(),
                        "recordsFiltered" => $this->nilaieskul_m->count_filtered_datasiswa_nonwajib_edit($tahunajaran, $this->input->post('nilai_cari_eskul'), $tahunajaran, $this->input->post('nilai_cari_eskul'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }


    public function input_nilaisiswa_edit() {

          $list = $this->nilaieskul_m->get_datatables_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan'));
        $data = array();


        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $this->get_namakelas($this->input->post('nilai_cari_kelas'))))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }

        

        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input value="'.$siswa->nilaieskul_id.'"  type="hidden" class="form-control" >'.$no;
            $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
             $row[] =  form_dropdown('siswa_nis['.$siswa->siswa_nis.']', array('' => '', 'A' => 'AMAT BAIK', 'B' => 'BAIK', 'C' => 'CUKUP'), $siswa->nilaieskul_data, 'class="class-data-nilai-siswa form-control select2me input-nilai-eskul" data-placeholder="Pilih Nilai"  id="data-nilai-siswa"');

             $row[] =  '<div class="input-group">
                      <span class="input-group-addon">
                      <i class="fa fa-bars"></i>
                      </span>
                      <input name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" value="'.$siswa->nilaieskul_deskripsi.'" type="text">
                    </div>';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilaieskul_m->count_all_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilaieskul_m->count_filtered_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }


    public function input_nilaisiswa_edit_nonwajib_v2() {

        $list = $this->nilaieskul_m->get_datatables_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan'));
      $data = array();


      $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $this->get_namakelas($this->input->post('nilai_cari_kelas'))))));


                      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                          $datanamakelas = 'XII'.$kelasku;
                      } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                          $datanamakelas = 'XI'.$kelasku;
                          
                      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                          $datanamakelas = 'X'.$kelasku;
                      } else {
                          $datanamakelas = 'XII'.$kelasku;
                      }

      

      $no = $this->input->post('start');
      foreach ($list as $siswa) {
          $no++;
          $row = array();
         // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
          $row[] = '<input value="'.$siswa->nilaieskul_id.'"  type="hidden" class="form-control" >'.$no;
          $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
          $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
           $row[] =  '<h4>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</h4>';
          $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
          $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
           $row[] =  form_dropdown('siswa_nis['.$siswa->siswa_nis.']', array('' => '', 'A' => 'AMAT BAIK', 'B' => 'BAIK', 'C' => 'CUKUP'), $siswa->nilaieskul_data, 'class="class-data-nilai-siswa form-control select2me input-nilai-eskul" data-placeholder="Pilih Nilai"  id="data-nilai-siswa"');

           $row[] =  '<div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-bars"></i>
                    </span>
                    <input name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" value="'.$siswa->nilaieskul_deskripsi.'" type="text">
                  </div>';
         
          //$row[] = $siswa->dob;

          //add html for action
         
       
          $data[] = $row;
      }

      $output = array(
                      "draw" => $this->input->post('draw'),
                      "recordsTotal" => $this->nilaieskul_m->count_all_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan')),
                      "recordsFiltered" => $this->nilaieskul_m->count_filtered_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_eskul'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan')),
                      "data" => $data,
              );
      //output to json format
     //dump($this->db->last_query());
      echo json_encode($output);

  }


    function upload_nilai_excel() {

        $this->_validatenilai();
        $this->_validate_nilai_cari();
       $config['upload_path']          = './raport_files/excel_eskul/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
         

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');


        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_eskul/'.$upload_data['file_name'];
              //$sheetnames ='TG1_XIBB_2014-2015'; 

                                    try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    } catch(Exception $e) {

                          $data = array();
                     $data['error_string'] = array();
                     $data['inputerror'] = array();
                     $data['inputerror'][] = 'upload_error';
                     $data['error_string'][] = '<b>Loading File Gagal :</b>' . $e->getMessage();
                     $data['status'] = FALSE;
                     echo json_encode($data);
                     exit();

                    //die('Error loading file :' . $e->getMessage());
                    }
                    //All data from excel
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['data_nis'] = array();
                    $data['data_nilai'] = array();
                    $data['status'] = TRUE;


                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    
                    if (trim($sheetData['1']['L']) !== $this->input->post('nilai_cari_angkatan')) {
                       $data['inputerror'][] = 'nilai_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['2']['L']) !== $this->input->post('nilai_cari_kelas')) {
                       $data['inputerror'][] = 'nilai_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['3']['L']) !== $this->input->post('nilai_cari_semester')) {
                       $data['inputerror'][] = 'nilai_cari_semester';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_eskul')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama eskul</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }




                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }


                    $datakelas = ($this->hitungkelas($this->input->post('nilai_cari_kelas')) + 12);
                    for($x=13; $x <= $datakelas; $x++)
                    {
                  
                    $data['data_nis'][] =  trim($sheetData[$x]['B']);
                    $data['data_nilai'][] = trim($sheetData[$x]['F']);
                    $data['data_deskripsi'][] = trim($sheetData[$x]['G']);
                    }

                    //delete_files($upload_data['file_path']);


                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['status'] = TRUE;
                    echo json_encode($data);
                    exit();
                                


             } else {
                 
               

           
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = FALSE;
                  echo json_encode($data);
                 exit();
               
             }

     
      
    }

    function upload_nilai_excel_nonwajib_v2() {

        $this->_validatenilai_nonwajib_v2();
        $this->_validate_nilai_cari_nonwajib_v2();
       $config['upload_path']          = './raport_files/excel_eskul/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
         

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');


        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_eskul/'.$upload_data['file_name'];
              //$sheetnames ='TG1_XIBB_2014-2015'; 

                                    try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    } catch(Exception $e) {

                          $data = array();
                     $data['error_string'] = array();
                     $data['inputerror'] = array();
                     $data['inputerror'][] = 'upload_error';
                     $data['error_string'][] = '<b>Loading File Gagal :</b>' . $e->getMessage();
                     $data['status'] = FALSE;
                     echo json_encode($data);
                     exit();

                    //die('Error loading file :' . $e->getMessage());
                    }
                    //All data from excel
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['data_nis'] = array();
                    $data['data_nilai'] = array();
                    $data['status'] = TRUE;


                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    
                    if (trim($sheetData['1']['L']) !== $this->input->post('nilai_cari_angkatan')) {
                       $data['inputerror'][] = 'nilai_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['2']['L']) !== $this->input->post('nilai_cari_kelas')) {
                       $data['inputerror'][] = 'nilai_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['3']['L']) !== $this->input->post('nilai_cari_semester')) {
                       $data['inputerror'][] = 'nilai_cari_semester';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_eskul')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama eskul</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }




                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }


                    $datakelas = ($this->hitungkelas($this->input->post('nilai_cari_kelas')) + 12);
                    for($x=13; $x <= $datakelas; $x++)
                    {
                  
                    $data['data_nis'][] =  trim($sheetData[$x]['B']);
                    $data['data_nilai'][] = trim($sheetData[$x]['F']);
                    $data['data_deskripsi'][] = trim($sheetData[$x]['G']);
                    }

                    //delete_files($upload_data['file_path']);


                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['status'] = TRUE;
                    echo json_encode($data);
                    exit();
                                


             } else {
                 
           
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = FALSE;
                  echo json_encode($data);
                 exit();
               
             }

     
      
    }


    function upload_nilai_excel_nonwajib() {

        $this->_validatenilai_nonwajib();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();
       $config['upload_path']          = './raport_files/excel_eskul/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
    
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                 
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = $semester5dan6;
        }

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');




        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_eskul/'.$upload_data['file_name'];
              //$sheetnames ='TG1_XIBB_2014-2015'; 

                                    try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    } catch(Exception $e) {

                          $data = array();
                     $data['error_string'] = array();
                     $data['inputerror'] = array();
                     $data['inputerror'][] = 'upload_error';
                     $data['error_string'][] = '<b>Loading File Gagal :</b>' . $e->getMessage();
                     $data['status'] = FALSE;
                     echo json_encode($data);
                     exit();

                    //die('Error loading file :' . $e->getMessage());
                    }
                    //All data from excel
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['data_nis'] = array();
                    $data['data_nilai'] = array();
                    $data['status'] = TRUE;


                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    
                    if (trim($sheetData['1']['L']) !== $this->input->post('nilai_cari_angkatan')) {
                       $data['inputerror'][] = 'nilai_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['3']['L']) !== $this->input->post('nilai_cari_semester')) {
                       $data['inputerror'][] = 'nilai_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_eskul')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama eskul</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }




                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }

                     
                    $datakelas = ($this->jumlahsiswa_nonwajib($this->input->post('nilai_cari_eskul'),$tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')) + 12);
                    for($x=13; $x <= $datakelas; $x++)
                    {
                  
                    $data['data_nis'][] =  trim($sheetData[$x]['B']);
                    $data['data_nilai'][] = trim($sheetData[$x]['E']);
                    $data['data_deskripsi'][] = trim($sheetData[$x]['F']);
                    }

                    //delete_files($upload_data['file_path']);
                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['status'] = TRUE;
                    echo json_encode($data);
                    exit();
                                


             } else {
                 
               

           
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['inputerror'][] = 'upload_error';
                $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
               
             }

     
      
    }


    function upload_nilai_excel_nonwajib_edit() {

        $this->_validatenilai_nonwajib_edit();
         $this->_validatenilai_nonwajib_edit_cekeskul();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();
       $config['upload_path']          = './raport_files/excel_eskul/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
    
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                 
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = $semester5dan6;
        }

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');




        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_eskul/'.$upload_data['file_name'];
              //$sheetnames ='TG1_XIBB_2014-2015'; 

                                    try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    } catch(Exception $e) {

                          $data = array();
                     $data['error_string'] = array();
                     $data['inputerror'] = array();
                     $data['inputerror'][] = 'upload_error';
                     $data['error_string'][] = '<b>Loading File Gagal :</b>' . $e->getMessage();
                     $data['status'] = FALSE;
                     echo json_encode($data);
                     exit();

                    //die('Error loading file :' . $e->getMessage());
                    }
                    //All data from excel
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['data_nis'] = array();
                    $data['data_nilai'] = array();
                    $data['status'] = TRUE;


                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    
                    if (trim($sheetData['1']['L']) !== $this->input->post('nilai_cari_angkatan')) {
                       $data['inputerror'][] = 'nilai_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['3']['L']) !== $this->input->post('nilai_cari_semester')) {
                       $data['inputerror'][] = 'nilai_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_eskul')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama eskul</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }




                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }

                     
                    $datakelas = ($this->jumlahsiswa_nonwajib($this->input->post('nilai_cari_eskul'),$tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')) + 12);
                    for($x=13; $x <= $datakelas; $x++)
                    {
                  
                    $data['data_nis'][] =  trim($sheetData[$x]['B']);
                    $data['data_nilai'][] = trim($sheetData[$x]['E']);
                    $data['data_deskripsi'][] = trim($sheetData[$x]['F']);
                    }

                    //delete_files($upload_data['file_path']);
                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['status'] = TRUE;
                    echo json_encode($data);
                    exit();
                                


             } else {
                 
               

           
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['inputerror'][] = 'upload_error';
                $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
               
             }

     
      
    }


    function upload_nilai_excel_edit() {

        $this->_validatenilai_edit();
        $this->_validatenilai_edit2();
        $this->_validate_nilai_cari();
       $config['upload_path']          = './raport_files/excel_eskul/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
         

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');


        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_eskul/'.$upload_data['file_name'];
              //$sheetnames ='TG1_XIBB_2014-2015'; 

                                    try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    } catch(Exception $e) {

                          $data = array();
                     $data['error_string'] = array();
                     $data['inputerror'] = array();
                     $data['inputerror'][] = 'upload_error';
                     $data['error_string'][] = '<b>Loading File Gagal :</b>' . $e->getMessage();
                     $data['status'] = FALSE;
                     echo json_encode($data);
                     exit();

                    //die('Error loading file :' . $e->getMessage());
                    }
                    //All data from excel
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['data_nis'] = array();
                    $data['data_nilai'] = array();
                    $data['status'] = TRUE;


                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    
                    if (trim($sheetData['1']['L']) !== $this->input->post('nilai_cari_angkatan')) {
                       $data['inputerror'][] = 'nilai_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['2']['L']) !== $this->input->post('nilai_cari_kelas')) {
                       $data['inputerror'][] = 'nilai_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['3']['L']) !== $this->input->post('nilai_cari_semester')) {
                       $data['inputerror'][] = 'nilai_cari_semester';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_eskul')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama eskul</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }




                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }


                    $datakelas = ($this->hitungkelas($this->input->post('nilai_cari_kelas')) + 12);
                    for($x=13; $x <= $datakelas; $x++)
                    {
                  
                    $data['data_nis'][] =  trim($sheetData[$x]['B']);
                    $data['data_nilai'][] = trim($sheetData[$x]['F']);
                    $data['data_deskripsi'][] = trim($sheetData[$x]['G']);
                    }

                    //delete_files($upload_data['file_path']);


                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['status'] = TRUE;
                    echo json_encode($data);
                    exit();
                                


             } else {
                 
               

           
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = FALSE;
                  echo json_encode($data);
                 exit();
               
             }

     
      
    }

    function upload_nilai_excel_edit_nonwajib_v2() {

        $this->_validatenilai_edit_nonwajib_v2();
        $this->_validatenilai_edit2_nonwajib_v2();
        $this->_validate_nilai_cari_nonwajib_v2();
       $config['upload_path']          = './raport_files/excel_eskul/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
         

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');


        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_eskul/'.$upload_data['file_name'];
              //$sheetnames ='TG1_XIBB_2014-2015'; 

                                    try {
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    } catch(Exception $e) {

                          $data = array();
                     $data['error_string'] = array();
                     $data['inputerror'] = array();
                     $data['inputerror'][] = 'upload_error';
                     $data['error_string'][] = '<b>Loading File Gagal :</b>' . $e->getMessage();
                     $data['status'] = FALSE;
                     echo json_encode($data);
                     exit();

                    //die('Error loading file :' . $e->getMessage());
                    }
                    //All data from excel
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['data_nis'] = array();
                    $data['data_nilai'] = array();
                    $data['status'] = TRUE;


                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    
                    if (trim($sheetData['1']['L']) !== $this->input->post('nilai_cari_angkatan')) {
                       $data['inputerror'][] = 'nilai_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['2']['L']) !== $this->input->post('nilai_cari_kelas')) {
                       $data['inputerror'][] = 'nilai_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['3']['L']) !== $this->input->post('nilai_cari_semester')) {
                       $data['inputerror'][] = 'nilai_cari_semester';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_eskul')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama eskul</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }




                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }


                    $datakelas = ($this->hitungkelas($this->input->post('nilai_cari_kelas')) + 12);
                    for($x=13; $x <= $datakelas; $x++)
                    {
                  
                    $data['data_nis'][] =  trim($sheetData[$x]['B']);
                    $data['data_nilai'][] = trim($sheetData[$x]['F']);
                    $data['data_deskripsi'][] = trim($sheetData[$x]['G']);
                    }

                    //delete_files($upload_data['file_path']);


                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['status'] = TRUE;
                    echo json_encode($data);
                    exit();
                                


             } else {
                 
               

           
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = FALSE;
                  echo json_encode($data);
                 exit();
               
             }

     
      
    }



    private function hitungkelas($kelas)
    {  

        $queryStatus = $this->db->query('SELECT DISTINCT(kelas_status) FROM `raport_kelas` WHERE kelas_code="'.$kelas.'"');
        $status = 2;

        if ($queryStatus->num_rows() > 0)
          {
          $rowStatus = $queryStatus->row();
            $status = $rowStatus->kelas_status == 'alumni' ? 2 : 1;
          } else {
            $status = 2;
         }


        $query = $this->db->query('SELECT count(siswa_nis) as jumlah FROM raport_siswa WHERE siswa_status = "'.$status.'" AND siswa_kelas= "'.$this->db->escape_str($kelas).'"');
        //$query = $this->db->get();
        
       if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function generate_formnilai() {

        $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }
      

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }


                 $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $this->get_namakelas($this->input->post('nilai_cari_kelas'))))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }

             
           $data = array('nilaieskul' => $this->get_namaeskul($this->input->post('nilai_cari_eskul')),
                         'nilaikelas' => $datanamakelas,
                         'nilaiangkatan' => $this->get_tahunkelas($this->input->post('nilai_cari_kelas')),
                         'nilaijurusankelas' => $this->get_jurusankelas($this->input->post('nilai_cari_kelas')),
                         'nilaijenis'   => $kategorieskul,
                         'nilaitahunajaran' => $tahunajaran,
                         'nilaijumlahsiswa' => $this->jumlahsiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                         'nilaisemester' => $this->input->post('nilai_cari_semester'),
                         'nilaisemesterajaran' => $datasemester,
                         'status'  => TRUE,      

            );

           echo json_encode($data);
    }

    public function generate_formnilai_nonwajib_v2() {

        $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }
      

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }


                 $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $this->get_namakelas($this->input->post('nilai_cari_kelas'))))));


                        if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
                            $datanamakelas = 'X'.$kelasku;
                        } else {
                            $datanamakelas = 'XII'.$kelasku;
                        }

             
           $data = array('nilaieskul' => $this->get_namaeskul($this->input->post('nilai_cari_eskul')),
                         'nilaikelas' => $datanamakelas,
                         'nilaiangkatan' => $this->get_tahunkelas($this->input->post('nilai_cari_kelas')),
                         'nilaijurusankelas' => $this->get_jurusankelas($this->input->post('nilai_cari_kelas')),
                         'nilaijenis'   => $kategorieskul,
                         'nilaitahunajaran' => $tahunajaran,
                         'nilaijumlahsiswa' => $this->jumlahsiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                         'nilaisemester' => $this->input->post('nilai_cari_semester'),
                         'nilaisemesterajaran' => $datasemester,
                         'status'  => TRUE,      

            );

           echo json_encode($data);
    }

    public function generate_formnilai_nonwajib() {

        $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->get_kategorieskul($this->input->post('nilai_cari_eskul')) == 1) {
        $kategorieskul = 'WAJIB';
      } else {
        $kategorieskul = 'TIDAK WAJIB';
      }
      

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('nilai_cari_semester') == 2 || $this->input->post('nilai_cari_semester') == 4 || $this->input->post('nilai_cari_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }



             
           $data = array('nilaieskul' => $this->get_namaeskul($this->input->post('nilai_cari_eskul')),
                         //'nilaikelas' => $datanamakelas,
                         'nilaiangkatan' => $this->input->post('nilai_cari_angkatan'),
                         'nilaijenis'   => $kategorieskul,
                         'nilaitahunajaran' => $tahunajaran,
                         'nilaijumlahsiswa' => $this->jumlahsiswa_nonwajib($this->input->post('nilai_cari_eskul'),$tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')),
                         'nilaisemester' => $this->input->post('nilai_cari_semester'),
                         'nilaisemesterajaran' => $datasemester,
                         'status'  => TRUE,      

            );

           echo json_encode($data);
    }



    public function validasiformnilai() {
        $this->_validatenilai();
        $this->_validate_nilai_cari();


         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    public function validasiformnilai_nonwajib_v2() {
        $this->_validatenilai_nonwajib_v2();
        $this->_validate_nilai_cari_nonwajib();


         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    public function validasiformnilai_nonwajib() {
        $this->_validatenilai_nonwajib();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();



         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> untuk kelas angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    public function validasiformnilai_nonwajib_edit() {
        $this->_validatenilai_nonwajib_edit();
        $this->_validatenilai_nonwajib_edit_cekeskul();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();



         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> untuk kelas angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    public function validasiformnilai_edit() {
       $this->_validatenilai_edit();
       $this->_validatenilai_edit2();
        $this->_validate_nilai_cari();


         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data edit nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    public function validasiformnilai_edit_nonwajib_v2() {
       $this->_validatenilai_edit_nonwajib_v2();
       $this->_validatenilai_edit2_nonwajib_v2();
        $this->_validate_nilai_cari_nonwajib_v2();


         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data edit nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    private function _validatenilai()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

        if($this->input->post('nilai_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'nilai_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_kelas') == '')
        {
            $data['inputerror'][] = 'nilai_cari_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_semester') == '')
        {
            $data['inputerror'][] = 'nilai_cari_semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
       
       if($this->input->post('nilai_cari_eskul') == '')
        {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data eskul</b>.';
            $data['status'] = FALSE;
        }


        if ($this->ceknilaieskul($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) == 1 ) {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> sudah terinput, untuk mengedit/menghapus data nilai, <a href="'.site_url().'guru/datanilaieskul/wajib_edit_nilai" target="_blank"><b>klik link ini</b></a>.';
            $data['status'] = FALSE;
        }

      

           

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validatenilai_nonwajib_v2()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

        if($this->input->post('nilai_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'nilai_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_kelas') == '')
        {
            $data['inputerror'][] = 'nilai_cari_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_semester') == '')
        {
            $data['inputerror'][] = 'nilai_cari_semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
       
       if($this->input->post('nilai_cari_eskul') == '')
        {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data eskul</b>.';
            $data['status'] = FALSE;
        }


        if ($this->ceknilaieskul_nonwajib_v2($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) == 1 ) {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> sudah terinput, untuk mengedit/menghapus data nilai, <a href="'.site_url().'guru/datanilaieskul/wajib_edit_nilai" target="_blank"><b>klik link ini</b></a>.';
            $data['status'] = FALSE;
        }

      

           

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    private function _validatenilai_nonwajib()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        if($this->input->post('nilai_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'nilai_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        

        if($this->input->post('nilai_cari_semester') == '')
        {
            $data['inputerror'][] = 'nilai_cari_semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
       
       if($this->input->post('nilai_cari_eskul') == '')
        {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data eskul</b>.';
            $data['status'] = FALSE;
        }


        if ($this->ceknilaieskul_nonwajib($this->input->post('nilai_cari_eskul'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_angkatan')) == 1 ) {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai eskul nonwajib <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, untuk siswa angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> sudah pernah dimasukkan, untuk mengedit data nilai eskul tidak wajib, silahkan klik <a href="'.site_url().'guru/datanilaieskul/nonwajib_edit_nilai" target="_blank"><b>link</b></a>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validatenilai_nonwajib_edit()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        if($this->input->post('nilai_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'nilai_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        

        if($this->input->post('nilai_cari_semester') == '')
        {
            $data['inputerror'][] = 'nilai_cari_semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
       
       if($this->input->post('nilai_cari_eskul') == '')
        {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data eskul</b>.';
            $data['status'] = FALSE;
        }

         


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    private function _validatenilai_nonwajib_edit_cekeskul()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       

         if ($this->ceknilaieskul_nonwajib_edit($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_semester'),$tahunajaran, $this->input->post('nilai_cari_eskul')) < 1 ) {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai eskul nonwajib <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, untuk siswa angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tidak tersedia.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validatenilai_nonwajib_cekpeserta()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       

        if ($this->jumlahsiswa_nonwajib($this->input->post('nilai_cari_eskul'),$tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')) < 10) {
            $data['inputerror'][] = 'nilai_cari_eskul';

            if ($this->jumlahsiswa_nonwajib($this->input->post('nilai_cari_eskul'),$tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')) == 0) {
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>peserta eskul nonwajib '.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, untuk siswa angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini belum memiliki <b>peserta/siswa</b>, minimal dibutuhkan <b>10 siswa</b> untuk melakukan <b>input nilai eskul non wajib</b>, untuk menambahkan data peserta, silahkan hubungi <b>Administrator</b>, untuk menambahkan data peserta <b>ESKUL</b>';
            } else {
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>peserta eskul nonwajib '.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, untuk siswa angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini hanya memiliki <b>'.$this->jumlahsiswa_nonwajib($this->input->post('nilai_cari_eskul'),$tahunajaran, $this->input->post('nilai_cari_angkatan'),$this->input->post('nilai_cari_angkatan')).' siswa</b>, minimal dibutuhkan <b>10 siswa</b> untuk melakukan <b>input nilai eskul non wajib</b>, silahkan hubungi <b>Administrator</b>, untuk menambahkan data peserta <b>ESKUL</b>';
            }
            
            $data['status'] = FALSE;
        }

      

           

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }




     private function _validatenilai_edit()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

       if($this->input->post('nilai_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'nilai_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_kelas') == '')
        {
            $data['inputerror'][] = 'nilai_cari_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_semester') == '')
        {
            $data['inputerror'][] = 'nilai_cari_semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
       
       if($this->input->post('nilai_cari_eskul') == '')
        {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data eskul</b>.';
            $data['status'] = FALSE;
        }

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validatenilai_edit_nonwajib_v2()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

       if($this->input->post('nilai_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'nilai_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_kelas') == '')
        {
            $data['inputerror'][] = 'nilai_cari_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_semester') == '')
        {
            $data['inputerror'][] = 'nilai_cari_semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
       
       if($this->input->post('nilai_cari_eskul') == '')
        {
            $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data eskul</b>.';
            $data['status'] = FALSE;
        }

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validatenilai_edit2()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        


        if ($this->cekdataeskuledit($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_eskul')) < 1 ) {
           $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nilai eskul</b> yang anda pilih saat ini<b> tidak tersedia</b>.';
            $data['status'] = FALSE;
        }


        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validatenilai_edit2_nonwajib_v2()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        


        if ($this->cekdataeskuledit_nonwajib_v2($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_eskul')) < 1 ) {
           $data['inputerror'][] = 'nilai_cari_eskul';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nilai eskul</b> yang anda pilih saat ini<b> tidak tersedia</b>.';
            $data['status'] = FALSE;
        }


        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    


    public function simpan_multi_nilai() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai();
        $this->_validate_nilai_cari();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave($ids);


         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       
        

        //$this->_validate_mutilsave($ids);
        $count = 0;
        $nilaikosong = 0;
        $nilaiterisi = 0;

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $waktumasuk =  strtotime(date('Y-m-d H:i:s',time()));
        foreach ($ids as $id){
           $did = intval($id);
          
            if ($this->input->post('siswa_nis['.$did.']') == '') {
                $datanilai = NULL;
                $nilaikosong = $nilaikosong+1;
            } else {
                $datanilai = $this->input->post('siswa_nis['.$did.']');
                $nilaiterisi = $nilaiterisi+1;
            }

            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
                $datadeskripsinilai = NULL;
            } else {
                $datadeskripsinilai = $this->input->post('siswa_deskripsi['.$did.']');
  
            }



             $data = array(
                'nilaieskul_nis' => htmlspecialchars($did),
               'nilaieskul_kodeguru' => $this->session->userdata('user_login'),
               //'nilai_kelas' => htmlspecialchars($this->input->post('nilai_cari_kelas')),
               'nilaieskul_dataeskul' => htmlspecialchars($this->input->post('nilai_cari_eskul')),
               'nilaieskul_data' => $datanilai,
               'nilaieskul_deskripsi' => $datadeskripsinilai,
               'nilaieskul_tahunajaran' => $tahunajaran,
               'nilaieskul_semester' => htmlspecialchars($this->input->post('nilai_cari_semester')),
               'nilaieskul_created' => $waktumasuk,
               'nilaieskul_modified' => $waktumasuk
                
            );
         
            $this->nilaieskul_m->save($data);

           
             $count = $count+1;
       }

       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
       }
       
        $data2['status'] = TRUE;
        echo json_encode($data2);
    }

    public function simpan_multi_nilai_nonwajib_v2() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai_nonwajib_v2();
        $this->_validate_nilai_cari_nonwajib_v2();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave_nonwajib_v2($ids);


         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       
        

        //$this->_validate_mutilsave($ids);
        $count = 0;
        $nilaikosong = 0;
        $nilaiterisi = 0;

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $waktumasuk =  strtotime(date('Y-m-d H:i:s',time()));
        foreach ($ids as $id){
           $did = intval($id);
          
            if ($this->input->post('siswa_nis['.$did.']') == '') {
                $datanilai = NULL;
                $nilaikosong = $nilaikosong+1;
            } else {
                $datanilai = $this->input->post('siswa_nis['.$did.']');
                $nilaiterisi = $nilaiterisi+1;
            }

            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
                $datadeskripsinilai = NULL;
            } else {
                $datadeskripsinilai = $this->input->post('siswa_deskripsi['.$did.']');
  
            }



             $data = array(
                'nilaieskul_nis' => htmlspecialchars($did),
               'nilaieskul_kodeguru' => $this->session->userdata('user_login'),
               //'nilai_kelas' => htmlspecialchars($this->input->post('nilai_cari_kelas')),
               'nilaieskul_dataeskul' => htmlspecialchars($this->input->post('nilai_cari_eskul')),
               'nilaieskul_data' => $datanilai,
               'nilaieskul_deskripsi' => $datadeskripsinilai,
               'nilaieskul_tahunajaran' => $tahunajaran,
               'nilaieskul_semester' => htmlspecialchars($this->input->post('nilai_cari_semester')),
               'nilaieskul_created' => $waktumasuk,
               'nilaieskul_modified' => $waktumasuk
                
            );
         
            $this->nilaieskul_m->save($data);

           
             $count = $count+1;
       }

       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
       }
       
        $data2['status'] = TRUE;
        echo json_encode($data2);
    }

    private function get_namaguru() {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

     private function get_nipguru() {
        $query = $this->db->query('SELECT guru_nip FROM raport_guru WHERE guru_kode="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nip;
           
        }

        return $row->guru_nip;

    }



    public function simpan_multi_nilai_nonwajib() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai_nonwajib();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave_nonwajib($ids);


         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       
        

        //$this->_validate_mutilsave($ids);
        $count = 0;
        $nilaikosong = 0;
        $nilaiterisi = 0;

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $waktumasuk =  strtotime(date('Y-m-d H:i:s',time()));
        foreach ($ids as $id){
           $did = intval($id);
          
            if ($this->input->post('siswa_nis['.$did.']') == '') {
                $datanilai = NULL;
                $nilaikosong = $nilaikosong+1;
            } else {
                $datanilai = $this->input->post('siswa_nis['.$did.']');
                $nilaiterisi = $nilaiterisi+1;
            }

            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
                $datadeskripsinilai = NULL;
            } else {
                $datadeskripsinilai = $this->input->post('siswa_deskripsi['.$did.']');
  
            }



             $data = array(
                'nilaieskul_nis' => htmlspecialchars($did),
               'nilaieskul_kodeguru' => $this->session->userdata('user_login'),
               //'nilai_kelas' => htmlspecialchars($this->input->post('nilai_cari_kelas')),
               'nilaieskul_dataeskul' => htmlspecialchars($this->input->post('nilai_cari_eskul')),
               'nilaieskul_data' => $datanilai,
               'nilaieskul_deskripsi' => $datadeskripsinilai,
               'nilaieskul_tahunajaran' => $tahunajaran,
               'nilaieskul_semester' => htmlspecialchars($this->input->post('nilai_cari_semester')),
               'nilaieskul_created' => $waktumasuk,
               'nilaieskul_modified' => $waktumasuk
                
            );
         
            $this->nilaieskul_m->save($data);

           
             $count = $count+1;
       }

       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
       }
       
        $data2['status'] = TRUE;
        echo json_encode($data2);
    }


    public function hapus_nilai() {
       
         $this->_validatenilai_edit();
        $this->_validatenilai_edit2();
        $this->_validate_nilai_cari();
        $this->_validate_datahapus();

        $ids = (explode( ',', $this->input->get_post('data_hapus')));
        $count = 0;
        foreach ($ids as $id){
           $did = intval($id);
         
            $this->nilaieskul_m->delete_by_id($did);

             $count = $count+1;
       }
        

         $data['sukses_string'] = '<i class="fa fa-check-circle "></i> <strong>Info:</strong> Data nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, sebanyak <b>'.$count.' nilai </b> pada kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> telah berhasil <b>dihapus</b>.';
        $data['status'] = TRUE;
        echo json_encode($data);

    }

    public function hapus_nilai_nonwajib_v2() {
       
        $this->_validatenilai_edit_nonwajib_v2();
       $this->_validatenilai_edit2_nonwajib_v2();
       $this->_validate_nilai_cari_nonwajib_v2();
       $this->_validate_datahapus();

       $ids = (explode( ',', $this->input->get_post('data_hapus')));
       $count = 0;
       foreach ($ids as $id){
          $did = intval($id);
        
           $this->nilaieskul_m->delete_by_id($did);

            $count = $count+1;
      }
       

        $data['sukses_string'] = '<i class="fa fa-check-circle "></i> <strong>Info:</strong> Data nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, sebanyak <b>'.$count.' nilai </b> pada kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> telah berhasil <b>dihapus</b>.';
       $data['status'] = TRUE;
       echo json_encode($data);

   }

    public function hapus_nilai_nonwajib_edit() {
       
        $this->_validatenilai_nonwajib_edit();
        $this->_validatenilai_nonwajib_edit_cekeskul();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();
        $this->_validate_datahapus();

        $ids = (explode( ',', $this->input->get_post('data_hapus')));
        $count = 0;
        foreach ($ids as $id){
           $did = intval($id);
         
            $this->nilaieskul_m->delete_by_id($did);

             $count = $count+1;
       }
        

         $data['sukses_string'] = '<i class="fa fa-check-circle "></i> <strong>Info:</strong> Data nilai eskul <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b>, sebanyak <b>'.$count.' nilai </b> kelas angkatan <b>'.$this->input->post('nilai_cari_angkatan').'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> telah berhasil <b>dihapus</b>.';
        $data['status'] = TRUE;
        echo json_encode($data);

    }

     public function edit_multi_nilai_nonwajib() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai_nonwajib_edit();
        $this->_validatenilai_nonwajib_edit_cekeskul();
        $this->_validatenilai_nonwajib_cekpeserta();
        $this->_validate_nilai_cari_nonwajib();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave_nonwajib($ids);


       

         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


     
      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       
        

        //$this->_validate_mutilsave($ids);
        $count = 0;
        $nilaikosong = 0;
        $nilaiterisi = 0;

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $waktumasuk =  strtotime(date('Y-m-d H:i:s',time()));
        foreach ($ids as $id){
           $did = intval($id);
          
            if ($this->input->post('siswa_nis['.$did.']') == '') {
                $datanilai = NULL;
                $nilaikosong = $nilaikosong+1;
            } else {
                $datanilai = $this->input->post('siswa_nis['.$did.']');
                $nilaiterisi = $nilaiterisi+1;
            }

            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
                $datadeskripsinilai = NULL;
            } else {
                $datadeskripsinilai = $this->input->post('siswa_deskripsi['.$did.']');
  
            }



             $data = array(
               'nilaieskul_data' => $datanilai,
               'nilaieskul_deskripsi' => $datadeskripsinilai,
                //'nilai_kodeguru' => '000',
               'nilaieskul_modified' => $waktumasuk
                
            );
             $this->nilaieskul_m->update(array('nilaieskul_nis' => $did, 'nilaieskul_dataeskul' => $this->input->post('nilai_cari_eskul'),'nilaieskul_semester' => $this->input->post('nilai_cari_semester')), $data);
            //$this->nilaieskul_m->save($data);

           
             $count = $count+1;
       }


       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai eskul sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai eskul sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
       }
       
        $data2['status'] = TRUE;
        echo json_encode($data2);
    }


    public function edit_multi_nilai() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai_edit();
        $this->_validatenilai_edit2();
        $this->_validate_nilai_cari();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave($ids);


         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


     
      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       
        

        //$this->_validate_mutilsave($ids);
        $count = 0;
        $nilaikosong = 0;
        $nilaiterisi = 0;

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $waktumasuk =  strtotime(date('Y-m-d H:i:s',time()));
        foreach ($ids as $id){
           $did = intval($id);
          
            if ($this->input->post('siswa_nis['.$did.']') == '') {
                $datanilai = NULL;
                $nilaikosong = $nilaikosong+1;
            } else {
                $datanilai = $this->input->post('siswa_nis['.$did.']');
                $nilaiterisi = $nilaiterisi+1;
            }

            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
                $datadeskripsinilai = NULL;
            } else {
                $datadeskripsinilai = $this->input->post('siswa_deskripsi['.$did.']');
  
            }



             $data = array(
               'nilaieskul_data' => $datanilai,
               'nilaieskul_deskripsi' => $datadeskripsinilai,
                //'nilai_kodeguru' => '000',
               'nilaieskul_modified' => $waktumasuk
                
            );
             $this->nilaieskul_m->update(array('nilaieskul_nis' => $did, 'nilaieskul_dataeskul' => $this->input->post('nilai_cari_eskul'),'nilaieskul_semester' => $this->input->post('nilai_cari_semester')), $data);
            //$this->nilaieskul_m->save($data);

           
             $count = $count+1;
       }


       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai eskul sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai eskul sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
       }
       
        $data2['status'] = TRUE;
        echo json_encode($data2);
    }

    public function edit_multi_nilai_nonwajib_v2() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai_edit_nonwajib_v2();
        $this->_validatenilai_edit2_nonwajib_v2();
        $this->_validate_nilai_cari_nonwajib_v2();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave_nonwajib_v2($ids);


         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


     
      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

       
        

        //$this->_validate_mutilsave($ids);
        $count = 0;
        $nilaikosong = 0;
        $nilaiterisi = 0;

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        $waktumasuk =  strtotime(date('Y-m-d H:i:s',time()));
        foreach ($ids as $id){
           $did = intval($id);
          
            if ($this->input->post('siswa_nis['.$did.']') == '') {
                $datanilai = NULL;
                $nilaikosong = $nilaikosong+1;
            } else {
                $datanilai = $this->input->post('siswa_nis['.$did.']');
                $nilaiterisi = $nilaiterisi+1;
            }

            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
                $datadeskripsinilai = NULL;
            } else {
                $datadeskripsinilai = $this->input->post('siswa_deskripsi['.$did.']');
  
            }



             $data = array(
               'nilaieskul_data' => $datanilai,
               'nilaieskul_deskripsi' => $datadeskripsinilai,
                //'nilai_kodeguru' => '000',
               'nilaieskul_modified' => $waktumasuk
                
            );
             $this->nilaieskul_m->update(array('nilaieskul_nis' => $did, 'nilaieskul_dataeskul' => $this->input->post('nilai_cari_eskul'),'nilaieskul_semester' => $this->input->post('nilai_cari_semester')), $data);
            //$this->nilaieskul_m->save($data);

           
             $count = $count+1;
       }


       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai eskul sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai eskul sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
       }
       
        $data2['status'] = TRUE;
        echo json_encode($data2);
    }

    private function _validate_datamasuk()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


      if($this->input->post('data_masuk') == 0)
        {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Tidak ada <b>data nilai</b> yang masuk ke <b>sistem</b>, mohon untuk mengecek data <b>form nilai siswa</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

       private function _validate_datahapus()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


      if($this->input->post('data_hapus') == 0)
        {
            $data['inputerror'][] = 'data_hapus';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Tidak ada <b>data nilai siswa </b> yang akan <b>dihapus</b>, mohon untuk mengecek data <b>form nilai siswa</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

      private function _validate_nilai_cari()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


       

         if ($this->cekdatatahun($this->input->post('nilai_cari_angkatan')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatakelas($this->input->post('nilai_cari_kelas')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        

         if ($this->input->post('nilai_cari_semester') !== '1' && $this->input->post('nilai_cari_semester') !== '2' && $this->input->post('nilai_cari_semester') !== '3' && $this->input->post('nilai_cari_semester') !== '4' && $this->input->post('nilai_cari_semester') !== '5' && $this->input->post('nilai_cari_semester') !== '6') {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekdataeskul($this->input->post('nilai_cari_eskul')) < 1) {
           $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>eskul</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }


        if ($this->cekkodekelaswali_fix($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) !== 1) {
          $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf saat ini anda tidak memiliki <b>hak untuk mengakses</b> data nilai eskul wajib : <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> kelas : <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada tahun ajaran : <b>'.$this->konfigurasi_m->konfig_tahun_client().'</b>';
            $data['status'] = FALSE;
        }

       

       

       

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

      private function _validate_nilai_cari_nonwajib_v2()
      {
          $data = array();
          $data['error_string'] = array();
          $data['inputerror'] = array();
          $data['status'] = TRUE;
  
  
         
  
           if ($this->cekdatatahun($this->input->post('nilai_cari_angkatan')) < 1) {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
              $data['status'] = FALSE;
          }
  
           if ($this->cekdatakelas($this->input->post('nilai_cari_kelas')) < 1) {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
              $data['status'] = FALSE;
          }
  
          
  
           if ($this->input->post('nilai_cari_semester') !== '1' && $this->input->post('nilai_cari_semester') !== '2' && $this->input->post('nilai_cari_semester') !== '3' && $this->input->post('nilai_cari_semester') !== '4' && $this->input->post('nilai_cari_semester') !== '5' && $this->input->post('nilai_cari_semester') !== '6') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
              $data['status'] = FALSE;
          }
  
          if ($this->cekdataeskul_nonwajib_v2($this->input->post('nilai_cari_eskul')) < 1) {
             $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>eskul</b>, yang anda masukkan <b>tidak valid</b>.';
              $data['status'] = FALSE;
          }
  
  
          if ($this->cekkodekelaswali_nonwajib_fix_v2($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) !== 1) {
            $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf saat ini anda tidak memiliki <b>hak untuk mengakses</b> data nilai eskul wajib : <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> kelas : <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada tahun ajaran : <b>'.$this->konfigurasi_m->konfig_tahun_client().'</b>';
              $data['status'] = FALSE;
          }
  
         
  
         
  
         
  
          if($data['status'] === FALSE)
          {
              echo json_encode($data);
              exit();
          }
  
        }


      private function _validate_nilai_cari_nonwajib()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


       

         if ($this->cekdatatahun($this->input->post('nilai_cari_angkatan')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }




         if ($this->input->post('nilai_cari_semester') !== '1' && $this->input->post('nilai_cari_semester') !== '2' && $this->input->post('nilai_cari_semester') !== '3' && $this->input->post('nilai_cari_semester') !== '4' && $this->input->post('nilai_cari_semester') !== '5' && $this->input->post('nilai_cari_semester') !== '6') {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekdataeskul_nonwajib($this->input->post('nilai_cari_eskul')) < 1) {
           $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>eskul</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekkodekelaswali_nonwajib_fix($this->input->post('nilai_cari_angkatan'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_eskul')) !== 1) {
          $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf saat ini anda tidak memiliki <b>hak untuk mengakses</b> data nilai eskul non wajib : <b>'.$this->get_namaeskul($this->input->post('nilai_cari_eskul')).'</b> kelas : <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada tahun ajaran : <b>'.$this->konfigurasi_m->konfig_tahun_client().'</b>';
            $data['status'] = FALSE;
        }
           

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

      

      

      public function cobabro() {

        $timezone = config_item('erapor_timezone');
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

        $waktu =  strtotime(date('Y-m-d H:i:s',time()));
        $timestamp = 1457590864;
        echo $this->tanggal->waktu_convert($timestamp);
        
        
      }


       private function cekdatakelas($kelas)
    {

        $query = $this->db->query('SELECT count(kelas_code) as jumlah FROM raport_kelas WHERE kelas_code= "'.$this->db->escape_str($kelas).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function cekdataeskul($eskul)
    {

        $query = $this->db->query('SELECT count(eskul_id) as jumlah FROM raport_eskul WHERE eskul_status=1 AND eskul_kategori=1 AND eskul_id= "'.$this->db->escape_str($eskul).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function cekdataeskul_nonwajib_v2($eskul)
    {

        $query = $this->db->query('SELECT count(eskul_id) as jumlah FROM raport_eskul WHERE eskul_status=1 AND eskul_kategori=2 AND eskul_id= "'.$this->db->escape_str($eskul).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function cekdataeskul_nonwajib($eskul)
    {

        $query = $this->db->query('SELECT count(eskul_id) as jumlah FROM raport_eskul WHERE eskul_status=1 AND eskul_kategori=2 AND eskul_id= "'.$this->db->escape_str($eskul).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function cekdataeskuledit($kelas, $semester, $eskul) {
        $query = $this->db->query('SELECT DISTINCT count(nilaieskul_dataeskul) as jumlah FROM raport_nilaieskul LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaieskul.nilaieskul_dataeskul WHERE eskul_kategori=1 AND eskul_status=1 AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaieskul_semester="'.$this->db->escape_str($semester).'" AND nilaieskul_dataeskul="'.$this->db->escape_str($eskul).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function cekdataeskuledit_nonwajib_v2($kelas, $semester, $eskul) {
        $query = $this->db->query('SELECT DISTINCT count(nilaieskul_dataeskul) as jumlah FROM raport_nilaieskul LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaieskul.nilaieskul_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaieskul.nilaieskul_dataeskul WHERE eskul_kategori=2 AND eskul_status=1 AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaieskul_semester="'.$this->db->escape_str($semester).'" AND nilaieskul_dataeskul="'.$this->db->escape_str($eskul).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }


     private function cekdatatahun($angkatan)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(kelas_tahun)) as jumlah FROM raport_kelas WHERE kelas_tahun= "'.$this->db->escape_str($angkatan).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

      private function cekdatamapel($mapel)
    {

        $query = $this->db->query('SELECT count(mapel_id) as jumlah FROM raport_mapel WHERE mapel_id= "'.$this->db->escape_str($mapel).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }
    private function cekdatanilai($mapel, $semester, $kelas, $jenis)
    {

        $query = $this->db->query('SELECT count(DISTINCT(nilai_jenis)) as jumlah FROM raport_nilai WHERE nilai_eskul="'.$this->db->escape_str($mapel).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_jenis="'.$this->db->escape_str($jenis).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

       private function cekdatanilairaport($mapel, $semester, $kelas)
    {

        $query = $this->db->query('SELECT count(DISTINCT(nilai_jenis)) as jumlah FROM raport_nilai WHERE nilai_eskul="'.$this->db->escape_str($mapel).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_jenis LIKE "RAPORT%"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    public function coba_deh() {
        //echo $this->cekdatanilairaport(96,5,20);
        echo $this->nilairaport2(20,5,96);
    }



     private function get_namakelas($id) {
        $query = $this->db->query('SELECT kelas_nama FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
         return $row->kelas_nama;

        } else {
         
         return FALSE;
        
        }

    }

     private function get_tahunkelas($id) {
        $query = $this->db->query('SELECT kelas_tahun FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tahun;
           
        }

        return $row->kelas_tahun;

    }

    private function get_jurusankelas($id) {
        $query = $this->db->query('SELECT kelas_kk FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_kk;
           
        }

        return $row->kelas_kk;

    }

    private function get_namamapel($id) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->mapel_nama;
           
        }

        return $row->mapel_nama;

    }

    private function get_namaeskul($id) {
        $query = $this->db->query('SELECT eskul_nama FROM raport_eskul WHERE eskul_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->eskul_nama;
           
        }

        return $row->eskul_nama;

    }

    private function get_kategorieskul($id) {
        $query = $this->db->query('SELECT eskul_kategori FROM raport_eskul WHERE eskul_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->eskul_kategori;
           
        }

        return $row->eskul_kategori;

    }

     private function _validate_mutilsave($ids)
    {
       $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $datakosong= 0;
        foreach ($ids as $id){
        $did = intval($id);
        

      
   

        if ($this->input->post('siswa_nis['.$did.']') !== 'A' && $this->input->post('siswa_nis['.$did.']') !== 'B' && $this->input->post('siswa_nis['.$did.']') !== 'C' && trim($this->input->post('siswa_nis['.$did.']') !== '') && trim($this->input->post('siswa_nis['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nilai eskul</b> harus diisi dengan format <b>A,B,C</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('siswa_nis['.$did.']') !== '') {
            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b>nilai eskul terisi</b> maka data <b>deskripsi nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
              $data['status'] = FALSE;
            }
        }

        if ($this->input->post('siswa_deskripsi['.$did.']') !== '') {
            if ($this->input->post('siswa_nis['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b> deskripsi nilai terisi</b> maka data <b>data nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
              $data['status'] = FALSE;
            }
        }

         if($this->input->post('siswa_nis['.$did.']') == '')
        {
           $datakosong = $datakosong + 1;

           
        }

        

       
      }

        if ($datakosong > 10) {
                $data['inputerror'][] = 'siswa_nis';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Sebanyak <b>'.$datakosong.' data nilai</b> masih kosong, hanya diperbolehkan <b>max</b> sebanyak <b>10 nilai</b> untuk data <b>nilai kosong</b>.';
                $data['status'] = FALSE;
           }

       if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

    }

    private function _validate_mutilsave_nonwajib_v2($ids)
    {
       $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $datamasuk= 0;
        $datakosong= 0;
        foreach ($ids as $id){
        $did = intval($id);
        

      
   

        if ($this->input->post('siswa_nis['.$did.']') !== 'A' && $this->input->post('siswa_nis['.$did.']') !== 'B' && $this->input->post('siswa_nis['.$did.']') !== 'C' && $this->input->post('siswa_nis['.$did.']') !== 'D' && trim($this->input->post('siswa_nis['.$did.']') !== '') && trim($this->input->post('siswa_nis['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nilai eskul</b> harus diisi dengan format <b>A,B,C,D</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('siswa_nis['.$did.']') !== '') {
            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b>nilai eskul terisi</b> maka data <b>deskripsi nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
              $data['status'] = FALSE;
            }
        }

        if ($this->input->post('siswa_deskripsi['.$did.']') !== '') {
            if ($this->input->post('siswa_nis['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b> deskripsi nilai terisi</b> maka data <b>data nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
              $data['status'] = FALSE;
            }
        }

         if($this->input->post('siswa_nis['.$did.']') !== '')
        {
           $datamasuk = $datamasuk + 1;
        }

        if($this->input->post('siswa_nis['.$did.']') == '')
        {
           $datakosong = $datakosong + 1;
           
        }

      }



        if ($datamasuk <= 0) {
                $data['inputerror'][] = 'siswa_nis';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Sebanyak <b>'.$datakosong.' data nilai</b> masih kosong, <b>min</b> anda memasukkan data sebanyak <b>1 nilai</b>.';
                $data['status'] = FALSE;
           }

       if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

    }


     private function _validate_mutilsave_nonwajib($ids)
    {
       $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $datakosong= 0;
        foreach ($ids as $id){
        $did = intval($id);
        

      
   

        if ($this->input->post('siswa_nis['.$did.']') !== 'A' && $this->input->post('siswa_nis['.$did.']') !== 'B' && $this->input->post('siswa_nis['.$did.']') !== 'C' && trim($this->input->post('siswa_nis['.$did.']') !== '') && trim($this->input->post('siswa_nis['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nilai eskul</b> harus diisi dengan format <b>A,B,C</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('siswa_nis['.$did.']') !== '') {
            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b>nilai eskul terisi</b> maka data <b>deskripsi nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
              $data['status'] = FALSE;
            }
        }

        if ($this->input->post('siswa_deskripsi['.$did.']') !== '') {
            if ($this->input->post('siswa_nis['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b> deskripsi nilai terisi</b> maka data <b>data nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
              $data['status'] = FALSE;
            }
        }

         if($this->input->post('siswa_nis['.$did.']') == '')
        {
           $datakosong = $datakosong + 1;

           
        }

       
      }

        if ($datakosong > 5) {
                $data['inputerror'][] = 'siswa_nis';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Sebanyak <b>'.$datakosong.' data nilai</b> masih kosong, hanya diperbolehkan <b>max</b> sebanyak <b>5 nilai</b> untuk data <b>nilai kosong</b>.';
                $data['status'] = FALSE;
           }

       if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

    }


    
   
}