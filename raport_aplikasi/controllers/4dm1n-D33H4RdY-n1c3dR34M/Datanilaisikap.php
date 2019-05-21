<?php
class Datanilaisikap extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->model('nilaisikap_m');
        $this->load->model('konfigurasi_m');
        $this->load->library("PHPExcel");
        $this->load->library('tanggal');
    }

    public function input_nilai() {
    	$this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
    	//Load Data View Data Nilai Input UH
    	$this->data['subview'] = 'admin/datanilaisikap/InputNilai';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

     public function edit_nilai() {
        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        //Load Data View Data Nilai Input UH
        $this->data['subview'] = 'admin/datanilaisikap/EditNilai';
        $this->load->view('admin/admindesain', $this->data);
        
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
                                        ->setCellValue('D5', 'NAMA NILAI')
                                        ->setCellValue('D6', 'KATEGORI NILAI')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU')
                                        ->setCellValue('D9', 'JUMLAH SISWA');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', 'SIKAP');


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'FORM INPUT DATA NILAI SIKAP')
                                        ->setCellValue('A2', 'NILAI SIKAP - '.strtoupper($datanamakelas))
                                        ->setCellValue('A3', 'SEMESTER '.$this->input->post('nilai_cari_semester').' - '.strtoupper($datasemester).' - TAHUN AJARAN '.$tahunajaran);
                                       
                                       

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
            $objPHPExcel->getActiveSheet()->getColumnDimension('g')->setWidth(102);
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
            $objValidation->setPrompt('Masukkan nilai sikap, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C,D"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_siswa_aktif($this->input->post('nilai_cari_kelas'));
            } else {
                $data   = $this->get_datakelas_siswa_alumni($this->input->post('nilai_cari_kelas'));
            }
             
             $nomor = 0;
             $angka = 12;
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
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                        ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                        ->setCellValue('C8', ': '.$tahunajaran)
                                        ->setCellValue('C9', ': '.strtoupper($datasemester))
                                        ->setCellValue('E5', ': SIKAP')
                                        ->setCellValue('E6', ': NILAI AKHIR RAPORT')
                                        ->setCellValue('E7', ': '.ucfirst($this->session->userdata('user_nama')))
                                        ->setCellValue('E8', ': -')
                                        ->setCellValue('E9',': '.$nomor);

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NILAI SIKAP_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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
            $namaexcel = 'NILAI_SIKAP_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_SIKAP_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_SIKAP_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_SIKAP_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords('NILAI SIKAP')  
            ->setCategory('NILAI SIKAP');  
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
                                        ->setCellValue('D5', 'NAMA NILAI')
                                        ->setCellValue('D6', 'KATEGORI NILAI')
                                        ->setCellValue('D7', 'PENGINPUT NILAI')
                                        ->setCellValue('D8', 'NIP GURU')
                                        ->setCellValue('D9', 'JUMLAH SISWA');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', 'SIKAP');


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'INFORMASI DATA NILAI SIKAP')
                                        ->setCellValue('A2', 'NILAI SIKAP - '.strtoupper($datanamakelas))
                                         ->setCellValue('A3', 'SEMESTER '.$this->input->post('nilai_cari_semester').' - '.strtoupper($datasemester).' - TAHUN AJARAN '.$tahunajaran);
                                       
                                       

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
            $objPHPExcel->getActiveSheet()->getColumnDimension('g')->setWidth(102);
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
            $objValidation->setPrompt('Masukkan nilai sikap, sesuai dengan list menu yang tersedia.');
            $objValidation->setFormula1('"A,B,C,D"');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_nilaisikapsiswa_aktif($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'));
            } else {
                $data   = $this->get_datakelas_nilaisikapsiswa_alumni($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'));
            }
             
             $nomor = 0;
             $angka = 12;
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
                                        ->setCellValue('F'.$angka, $row->nilaisikap_data)
                                        ->setCellValue('G'.$angka, $row->nilaisikap_deskripsi);



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
        
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                        ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                        ->setCellValue('C8', ': '.$tahunajaran)
                                        ->setCellValue('C9', ': '.strtoupper($datasemester))
                                        ->setCellValue('E5', ': SIKAP')
                                        ->setCellValue('E6', ': NILAI AKHIR RAPORT')
                                        ->setCellValue('E7', ': '.ucfirst($this->session->userdata('user_nama')))
                                        ->setCellValue('E8', ': -')
                                        ->setCellValue('E9',': '.$nomor);

            
             
            //set title pada sheet (me rename nama sheet)
           $judulexcel = 'NILAI SIKAP_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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
            $namaexcel = 'HASIL_SIKAP_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI_SIKAP_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI_SIKAP_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI_SIKAP_'.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords('NILAI SIKAP')  
            ->setCategory('NILAI SIKAP');  
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

    private function ceknilaisikap($kelas, $semester)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilaisikap_semester)) as jumlah FROM `raport_nilaisikap` LEFT JOIN (SELECT siswa_nis,kelas_nama, siswa_kelas FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis WHERE siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaisikap_semester="'.$this->db->escape_str($semester).'"');
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

   



    private function get_datakelas_nilaisikapsiswa_aktif($kelas, $semester) {
        $query = $this->db->query('SELECT `nilaisikap_id`, `siswa_nis`, `siswa_nama`, `kelas_nama`, `nilaisikap_data`, `nilaisikap_deskripsi`, `siswa_absen`, `kelas_tahun`, `siswa_status`, `kelas_kk`, `siswa_kelas` FROM `raport_nilaisikap` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_nilaisikap`.`nilaisikap_nis` WHERE `siswa_status` = 1 AND `siswa_kelas` = "'.$this->db->escape_str($kelas).'" AND `nilaisikap_semester` = "'.$this->db->escape_str($semester).'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datakelas_nilaisikapsiswa_alumni($kelas, $semester) {
        $query = $this->db->query('SELECT `nilaisikap_id`, `siswa_nis`, `siswa_nama`, `kelas_nama`, `nilaisikap_data`, `nilaisikap_deskripsi`, `siswa_absen`, `kelas_tahun`, `siswa_status`, `kelas_kk`, `siswa_kelas` FROM `raport_nilaisikap` LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON `data_siswa`.`siswa_nis` = `raport_nilaisikap`.`nilaisikap_nis` WHERE `siswa_status` = 2 AND `siswa_kelas` = "'.$this->db->escape_str($kelas).'" AND `nilaisikap_semester` = "'.$this->db->escape_str($semester).'" ORDER BY siswa_absen asc' );
        
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

        return $dataoption['aktivasi_semester_admin'];
    }

    public function input_nilaisiswa() {

          $list = $this->nilaisikap_m->get_datatables_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan'));
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
             $row[] =  '<h4>SIKAP</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
            $row[] =  '<select name="siswa_nis['.$siswa->siswa_nis.']" class="class-data-nilai-siswa form-control select2me input-nilai-sikap" data-placeholder="Pilih Nilai"  id="data-nilai-siswa">
                        <option value=""></option>
                        <option value="A">AMAT BAIK</option>
                        <option value="B">BAIK</option>
                        <option value="C">CUKUP</option>
                        <option value="D">KURANG</option>
                        </select>';

             $row[] =  '<div class="input-group">
                      <span class="input-group-addon">
                      <i class="fa fa-bars"></i>
                      </span>
                      <input width="30%" name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai Sikap" type="text">
                    </div>';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilaisikap_m->count_all_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilaisikap_m->count_filtered_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }


    public function input_nilaisiswa_edit() {

          $list = $this->nilaisikap_m->get_datatables_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan'));
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
            $row[] = '<input value="'.$siswa->nilaisikap_id.'"  type="hidden" class="form-control" >'.$no;
            $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>SIKAP</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
             $row[] =  form_dropdown('siswa_nis['.$siswa->siswa_nis.']', array('' => '', 'A' => 'AMAT BAIK', 'B' => 'BAIK', 'C' => 'CUKUP',  'D' => 'KURANG'), $siswa->nilaisikap_data, 'class="class-data-nilai-siswa form-control select2me input-nilai-sikap" data-placeholder="Pilih Nilai"  id="data-nilai-siswa"');

             $row[] =  '<div class="input-group">
                      <span class="input-group-addon">
                      <i class="fa fa-bars"></i>
                      </span>
                      <input name="siswa_deskripsi['.$siswa->siswa_nis.']" class="form-control input-medium" placeholder="Deskripsi Nilai" value="'.$siswa->nilaisikap_deskripsi.'" type="text">
                    </div>';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilaisikap_m->count_all_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilaisikap_m->count_filtered_datanilaisiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }


    function upload_nilai_excel() {

        $this->_validatenilai();
        $this->_validate_nilai_cari();
       $config['upload_path']          = './raport_files/excel_sikap/';
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
              $inputFileName = './raport_files/excel_sikap/'.$upload_data['file_name'];
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

                    if (trim($sheetData['4']['L']) !== 'SIKAP') {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b> Nilai Sikap</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
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




    function upload_nilai_excel_edit() {

        $this->_validatenilai_edit();
        $this->_validatenilai_edit2();
        $this->_validate_nilai_cari();
       $config['upload_path']          = './raport_files/excel_sikap/';
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
              $inputFileName = './raport_files/excel_sikap/'.$upload_data['file_name'];
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

                    if (trim($sheetData['4']['L']) !== 'SIKAP') {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b> Nilai Sikap</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
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

             
           $data = array('nilaisikap' => 'NILAI SIKAP',
                         'nilaikelas' => $datanamakelas,
                         'nilaiangkatan' => $this->get_tahunkelas($this->input->post('nilai_cari_kelas')),
                         'nilaijurusankelas' => $this->get_jurusankelas($this->input->post('nilai_cari_kelas')),
                         'nilaijenis'   => 'NILAI AKHIR RAPORT',
                         'nilaitahunajaran' => $tahunajaran,
                         'nilaijumlahsiswa' => $this->jumlahsiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                         'nilaisemester' => $this->input->post('nilai_cari_semester'),
                         'nilaisemesterajaran' => $datasemester,
                         'status'  => TRUE,      

            );

           echo json_encode($data);
    }

    


    public function validasiformnilai() {
        $this->_validatenilai();
        $this->_validate_nilai_cari();


         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input <b>NILAI SIKAP</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

   

    public function validasiformnilai_edit() {
       $this->_validatenilai_edit();
       $this->_validatenilai_edit2();
        $this->_validate_nilai_cari();


         $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data  <b> EDIT NILAI SIKAP </b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> saat ini tersedia.';

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
       
       


        if ($this->ceknilaisikap($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester')) == 1 ) {
            $data['inputerror'][] = 'nilai_cari_sikap';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>NILAI SIKAP </b>, untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> sudah pernah dimasukkan, untuk mengedit data nilai, silahkan masuk <b><a href="'.site_url().'/4dm1n-D33H4RdY-n1c3dR34M/datanilaisikap/edit_nilai" target="_blank">menu ini</a></b>.';
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

        


        if ($this->cekdatanilaisikapedit($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester')) < 1 ) {
           $data['inputerror'][] = 'nilai_cari_sikap';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>NILAI SIKAP</b> yang anda pilih saat ini<b> tidak tersedia</b>.';
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
                'nilaisikap_nis' => htmlspecialchars($did),
               'nilaisikap_kodeguru' => '000',
               //'nilai_kelas' => htmlspecialchars($this->input->post('nilai_cari_kelas')),
               'nilaisikap_datanilai' => 'SIKAP',
               'nilaisikap_data' => $datanilai,
               'nilaisikap_deskripsi' => $datadeskripsinilai,
               'nilaisikap_tahunajaran' => $tahunajaran,
               'nilaisikap_semester' => htmlspecialchars($this->input->post('nilai_cari_semester')),
               'nilaisikap_created' => $waktumasuk,
               'nilaisikap_modified' => $waktumasuk
                
            );
         
            $this->nilaisikap_m->save($data);

           
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
                'nilaisikap_nis' => htmlspecialchars($did),
               'nilaisikap_kodeguru' => '000',
               //'nilai_kelas' => htmlspecialchars($this->input->post('nilai_cari_kelas')),
               'nilaisikap_datanilai' => 'SIKAP',
               'nilaisikap_data' => $datanilai,
               'nilaisikap_deskripsi' => $datadeskripsinilai,
               'nilaisikap_tahunajaran' => $tahunajaran,
               'nilaisikap_semester' => htmlspecialchars($this->input->post('nilai_cari_semester')),
               'nilaisikap_created' => $waktumasuk,
               'nilaisikap_modified' => $waktumasuk
                
            );
         
            $this->nilaisikap_m->save($data);

           
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
         
            $this->nilaisikap_m->delete_by_id($did);

             $count = $count+1;
       }
        

         $data['sukses_string'] = '<i class="fa fa-check-circle "></i> <strong>Info:</strong> Data <b>NILAI SIKAP</b>, sebanyak <b>'.$count.' nilai </b> pada kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> telah berhasil <b>dihapus</b>.';
        $data['status'] = TRUE;
        echo json_encode($data);

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
               'nilaisikap_data' => $datanilai,
               'nilaisikap_deskripsi' => $datadeskripsinilai,
                'nilaisikap_kodeguru' => '000',
               'nilaisikap_modified' => $waktumasuk
                
            );
             $this->nilaisikap_m->update(array('nilaisikap_nis' => $did,'nilaisikap_semester' => $this->input->post('nilai_cari_semester')), $data);
            //$this->nilaisikap_m->save($data);

           
             $count = $count+1;
       }


       if ($nilaiterisi == $count) {
            $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sikap sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, <b>nilai lengkap terisi semua</b>.'; 
       } else {
             $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data nilai sikap sebanyak <b>'.$nilaiterisi.' data</b> dari <b>'.$count.' siswa</b> berhasil disimpan, sebanyak <b>'.$nilaikosong.' nilai</b> saat ini <b>masih kosong (belum terisi)</b>.'; 
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

        




       

       

       

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

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


    private function cekdatanilaisikapedit($kelas, $semester) {
        $query = $this->db->query('SELECT DISTINCT count(nilaisikap_semester) as jumlah FROM raport_nilaisikap LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis  WHERE  siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaisikap_semester="'.$this->db->escape_str($semester).'"');
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
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nilai sikap</b> harus diisi dengan format <b>A,B,C,D</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('siswa_nis['.$did.']') !== '') {
            if ($this->input->post('siswa_deskripsi['.$did.']') == '') {
              $data['inputerror'][] = 'data_masuk';
              $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Jika <b>nilai sikap terisi</b> maka data <b>deskripsi nilai </b> juga <b>wajib</b> untuk <b>diisi</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
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



    
   
}