<?php
class Datanilai extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->model('nilai_m');
        $this->load->model('konfigurasi_m');
        $this->load->library("PHPExcel");
        $this->load->library('tanggal');
        //$this->load->library('mpdf');
        //$this->load->library("PHPExcel/IOFactory");
         //$this->load->library('excel/Writer');
    }


    public function input_nilai() {

      if ($this->cek_datahak() == 0) {
       $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk menginput data<b> NILAI SISWA </b>.</div>';
      } else {
        $this->data['infonilai'] = '';
      }
    	$this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_guru2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_guru2();
    	//Load Data View Data Nilai Input UH
    	$this->data['subview'] = 'siswa/datanilai/InputNilai';
    	$this->load->view('siswa/admindesain', $this->data);
    	
    }

     public function edit_nilai() {
        if ($this->cek_datahak() == 0) {
       $this->data['infonilai'] = '<div id="sukses-form-nilai" class="alert alert-info alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Maaf <b>Bpk/Ibu '.$this->get_namaguru().'</b>, saat ini anda tidak memiliki tugas untuk mengedit data<b> NILAI SISWA </b>.</div>';
      } else {
        $this->data['infonilai'] = '';
      }

        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_guru2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_guru2();
        //Load Data View Data Nilai Input UH
        $this->data['subview'] = 'siswa/datanilai/EditNilai';
        $this->load->view('siswa/admindesain', $this->data);
        
    }

    public function rekap_uh() {
        
        //Load Data View Data Nilai Rekap UH
        $this->data['subview'] = 'siswa/datanilai/rekapUH';
        $this->load->view('siswa/admindesain', $this->data);
        
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


      $jumlahjenisnilai = ($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) + 1);
      if ($this->input->post('nilai_cari_category') == 'nilai_raport') {
           if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } else {
             $categorynilai = 'TIDAK DITEMUKAN';
             $jenisnilai ='TIDAK TERDETEKSI';
             $jumlahnilai = '';
          }  
          
      } elseif ($this->input->post('nilai_cari_category') == 'nilai_pks') {
            
            if ($this->input->post('nilai_cari_aspek') == 'UH') {
                $categorynilai = 'Pengetahuan';
                $jenisnilai = 'ULANGAN HARIAN';
                $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='TUGAS/PR';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UTS (UJIAN TENGAH SEMESTER)';
                $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UAS (UJIAN AKHIR SEMESTER)';
               $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='TES PRAKTIK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PROYEK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PORTOFOLIO';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='OBSERVASI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN DIRI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN TEMAN';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                $categorynilai = 'Sikap';
               $jenisnilai ='JURNAL';
               $jumlahnilai = $jumlahjenisnilai;
            } else {
                 $categorynilai = 'TIDAK DITEMUKAN';
               $jenisnilai ='TIDAK TERDETEKSI';
                $jumlahnilai = '';
            }
            
      } else {

         $categorynilai = 'TIDAK DITEMUKAN';
          $jenisnilai = 'TIDAK TERDETEKSI';
          $jumlahnilai = '';

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


     $datamapel = $this->get_datamapel($this->input->post('nilai_cari_mapel'));
   if(!empty($datamapel)){
    
            foreach ($datamapel as $row) {
                $datanamamapel = $row->mapel_nama;
               
            }

    } else {
        $datanamamapel = 'MAPEL TIDAK DITEMUKAN';
        
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
                                        ->setCellValue('F12', 'NILAI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'JURUSAN')
                                        ->setCellValue('A8', 'TAHUN AJARAN')
                                        ->setCellValue('A9', 'SEMESTER')
                                        ->setCellValue('A10', 'JUMLAH SISWA')
                                        ->setCellValue('D5', 'MATA PELAJARAN')
                                        ->setCellValue('D6', 'ASPEK NILAI')
                                        ->setCellValue('D7', 'JENIS NILAI')
                                        ->setCellValue('D8', 'PENGINPUT NILAI')
                                        ->setCellValue('D9', 'NIP GURU');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_mapel'))
                                        ->setCellValue('L5', $this->input->post('nilai_cari_category'))
                                        ->setCellValue('L6', $this->input->post('nilai_cari_aspek').$jumlahnilai);


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'FORM INPUT DATA NILAI SISWA')
                                        ->setCellValue('A2', strtoupper($jenisnilai.' '.$jumlahnilai).' - '.strtoupper($datanamamapel).' - '.strtoupper($datanamakelas))
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
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


            $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_WHOLE );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_STOP );
            $objValidation->setAllowBlank(true);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setErrorTitle('Pesan Error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai 1 hingga 100 (Mohon Untuk Diperbaiki) !!!');
            $objValidation->setPromptTitle('Informasi Allowed Input :');
            $objValidation->setPrompt('Hanya rentang nilai 1 hingga 100 yang diperbolehkan diinput');
            $objValidation->setFormula1('1');
            $objValidation->setFormula2('100');

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
                                        ->setCellValue('F'.$angka, '');



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':F'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
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
                                        ->setCellValue('C10',': '.$nomor)
                                        ->setCellValue('E5', ': '.strtoupper($datanamamapel))
                                        ->setCellValue('E6', ': '.strtoupper($categorynilai))
                                        ->setCellValue('E7', ': '.strtoupper($jenisnilai).' '.$jumlahnilai)
                                        ->setCellValue('E8', ': '. $this->get_namaguru())
                                        ->setCellValue('E9', ': '.$this->get_nipguru());

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = $this->input->post('nilai_cari_aspek').$jumlahnilai.'_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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

            $objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'NILAI_'.$jenisnilai.$jumlahnilai.'_'. $datanamamapel .'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords(strtoupper($jenisnilai).' '.$jumlahnilai)  
            ->setCategory(strtoupper($jenisnilai).' '.$jumlahnilai);  
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


     public function download_formnilai_edit() {
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


      $jumlahjenisnilai = substr($this->input->post('nilai_cari_data'), -1);
     
           if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'UH') {
                $categorynilai = 'Pengetahuan';
                $jenisnilai = 'ULANGAN HARIAN';
                $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='TUGAS/PR';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UTS (UJIAN TENGAH SEMESTER)';
                $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UAS (UJIAN AKHIR SEMESTER)';
               $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='TES PRAKTIK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PROYEK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PORTOFOLIO';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='OBSERVASI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN DIRI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN TEMAN';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                $categorynilai = 'Sikap';
               $jenisnilai ='JURNAL';
               $jumlahnilai = $jumlahjenisnilai;
            } else {
                 $categorynilai = 'TIDAK DITEMUKAN';
               $jenisnilai ='TIDAK TERDETEKSI';
                $jumlahnilai = '';
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


     $datamapel = $this->get_datamapel($this->input->post('nilai_cari_mapel'));
   if(!empty($datamapel)){
    
            foreach ($datamapel as $row) {
                $datanamamapel = $row->mapel_nama;
               
            }

    } else {
        $datanamamapel = 'MAPEL TIDAK DITEMUKAN';
        
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
                                        ->setCellValue('F12', 'NILAI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'JURUSAN')
                                        ->setCellValue('A8', 'TAHUN AJARAN')
                                        ->setCellValue('A9', 'SEMESTER')
                                        ->setCellValue('A10', 'JUMLAH SISWA')
                                        ->setCellValue('D5', 'MATA PELAJARAN')
                                        ->setCellValue('D6', 'ASPEK NILAI')
                                        ->setCellValue('D7', 'JENIS NILAI')
                                        ->setCellValue('D8', 'PENGINPUT NILAI')
                                        ->setCellValue('D9', 'NIP GURU');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_mapel'))
                                        ->setCellValue('L5', $this->input->post('nilai_cari_category'))
                                        ->setCellValue('L6', $this->input->post('nilai_cari_aspek').$jumlahnilai);


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'FORM INPUT DATA NILAI SISWA')
                                        ->setCellValue('A2', strtoupper($jenisnilai.' '.$jumlahnilai).' - '.strtoupper($datanamamapel).' - '.strtoupper($datanamakelas))
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
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


            $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_WHOLE );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_STOP );
            $objValidation->setAllowBlank(true);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setErrorTitle('Pesan Error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai 1 hingga 100 (Mohon Untuk Diperbaiki) !!!');
            $objValidation->setPromptTitle('Informasi Allowed Input :');
            $objValidation->setPrompt('Hanya rentang nilai 1 hingga 100 yang diperbolehkan diinput');
            $objValidation->setFormula1('1');
            $objValidation->setFormula2('100');

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
                                        ->setCellValue('F'.$angka, '');



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':F'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
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
                                        ->setCellValue('C10',': '.$nomor)
                                        ->setCellValue('E5', ': '.strtoupper($datanamamapel))
                                        ->setCellValue('E6', ': '.strtoupper($categorynilai))
                                        ->setCellValue('E7', ': '.strtoupper($jenisnilai).' '.$jumlahnilai)
                                        ->setCellValue('E8', ': '. $this->get_namaguru())
                                        ->setCellValue('E9', ': '.$this->get_nipguru());

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = $this->input->post('nilai_cari_aspek').$jumlahnilai.'_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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

            $objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'NILAI_'.$jenisnilai.$jumlahnilai.'_'. $datanamamapel .'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords(strtoupper($jenisnilai).' '.$jumlahnilai)  
            ->setCategory(strtoupper($jenisnilai).' '.$jumlahnilai);  
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

     public function download_formnilai_edit_hasil() {
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


      $jumlahjenisnilai = substr($this->input->post('nilai_cari_data'), -1);
     
           if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'UH') {
                $categorynilai = 'Pengetahuan';
                $jenisnilai = 'ULANGAN HARIAN';
                $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='TUGAS/PR';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UTS (UJIAN TENGAH SEMESTER)';
                $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UAS (UJIAN AKHIR SEMESTER)';
               $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='TES PRAKTIK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PROYEK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PORTOFOLIO';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='OBSERVASI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN DIRI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN TEMAN';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                $categorynilai = 'Sikap';
               $jenisnilai ='JURNAL';
               $jumlahnilai = $jumlahjenisnilai;
            } else {
                 $categorynilai = 'TIDAK DITEMUKAN';
               $jenisnilai ='TIDAK TERDETEKSI';
                $jumlahnilai = '';
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


     $datamapel = $this->get_datamapel($this->input->post('nilai_cari_mapel'));
   if(!empty($datamapel)){
    
            foreach ($datamapel as $row) {
                $datanamamapel = $row->mapel_nama;
               
            }

    } else {
        $datanamamapel = 'MAPEL TIDAK DITEMUKAN';
        
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
                                        ->setCellValue('F12', 'NILAI');

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A5', 'NAMA SEKOLAH')
                                        ->setCellValue('A6', 'KELAS')
                                        ->setCellValue('A7', 'JURUSAN')
                                        ->setCellValue('A8', 'TAHUN AJARAN')
                                        ->setCellValue('A9', 'SEMESTER')
                                        ->setCellValue('A10', 'JUMLAH SISWA')
                                        ->setCellValue('D5', 'MATA PELAJARAN')
                                        ->setCellValue('D6', 'ASPEK NILAI')
                                        ->setCellValue('D7', 'JENIS NILAI')
                                        ->setCellValue('D8', 'PENGINPUT NILAI')
                                        ->setCellValue('D9', 'NIP GURU');


            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('L1', $this->input->post('nilai_cari_angkatan'))
                                        ->setCellValue('L2', $this->input->post('nilai_cari_kelas'))
                                        ->setCellValue('L3', $this->input->post('nilai_cari_semester'))
                                        ->setCellValue('L4', $this->input->post('nilai_cari_mapel'))
                                        ->setCellValue('L5', $this->input->post('nilai_cari_category'))
                                        ->setCellValue('L6', $this->input->post('nilai_cari_aspek').$jumlahnilai);


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'INFORMASI HASIL DATA NILAI SISWA')
                                        ->setCellValue('A2', strtoupper($jenisnilai.' '.$jumlahnilai).' - '.strtoupper($datanamamapel).' - '.strtoupper($datanamakelas))
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
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:F3');
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


            $objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_WHOLE );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_STOP );
            $objValidation->setAllowBlank(true);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setErrorTitle('Pesan Error');
            $objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai 1 hingga 100 (Mohon Untuk Diperbaiki) !!!');
            $objValidation->setPromptTitle('Informasi Allowed Input :');
            $objValidation->setPrompt('Hanya rentang nilai 1 hingga 100 yang diperbolehkan diinput');
            $objValidation->setFormula1('1');
            $objValidation->setFormula2('100');

            if ($this->status_kelas($this->input->post('nilai_cari_angkatan')) == 'aktif') {
                $data   = $this->get_datakelas_nilaisiswa_aktif($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_data'));
            } else {
                $data   = $this->get_datakelas_nilaisiswa_alumni($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_data'));
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
                                        ->setCellValue('F'.$angka, $row->nilai_data);



             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka.':F'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
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
                                        ->setCellValue('C10',': '.$nomor)
                                        ->setCellValue('E5', ': '.strtoupper($datanamamapel))
                                        ->setCellValue('E6', ': '.strtoupper($categorynilai))
                                        ->setCellValue('E7', ': '.strtoupper($jenisnilai).' '.$jumlahnilai)
                                        ->setCellValue('E8', ': '. $this->get_namaguru())
                                        ->setCellValue('E9', ': '.$this->get_nipguru());

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = $this->input->post('nilai_cari_aspek').$jumlahnilai.'_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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

            $objPHPExcel->getActiveSheet()->getCell('F14')->setDataValidation(clone $objValidation);
            
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $namaexcel = 'HASIL_NILAI_'.$jenisnilai.$jumlahnilai.'_'. $datanamamapel .'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI '.strtoupper($jenisnilai).' '.$jumlahnilai.' - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords(strtoupper($jenisnilai).' '.$jumlahnilai)  
            ->setCategory(strtoupper($jenisnilai).' '.$jumlahnilai);  
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

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" AND nilai_mapel="'.$mapel.'" AND  nilai_jenis LIKE "'.$jenis.'%"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function jumlahnilai2($kelas, $semester, $jenis, $mapel)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" AND nilai_mapel="'.$mapel.'" AND nilai_jenis LIKE "'.$jenis.'"');
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
            $query = $this->db->query('SELECT COUNT(siswa_nis) as jumlah FROM `raport_siswa` WHERE siswa_kelas="'.$kelas.'" AND siswa_status=1');
        } else {
            $query = $this->db->query('SELECT COUNT(siswa_nis) as jumlah FROM `raport_siswa` WHERE siswa_kelas="'.$kelas.'" AND siswa_status=2');
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

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" AND nilai_mapel="'.$mapel.'" AND nilai_jenis LIKE "'.$aspek.'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }
     private function nilairaport2($kelas, $semester, $mapel)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(nilai_jenis)) as jumlah FROM `raport_nilai` WHERE nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" AND nilai_mapel="'.$mapel.'" AND nilai_jenis LIKE "RAPORT%"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->jumlah;
           
        }
         return $row->jumlah;
    }

    private function status_kelas($status)
    {

        $query = $this->db->query('SELECT DISTINCT(kelas_status) FROM `raport_kelas` WHERE kelas_tahun="'.$status.'"');
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
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_kelas="'.$kelas.'" AND siswa_status=1  ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }


     private function get_datakelas_siswa_alumni($kelas) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_kelas="'.$kelas.'" AND siswa_status=2  ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }




      private function get_datakelas_nilaisiswa_aktif($mapel, $kelas, $semester, $jenis) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, nilai_data, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_nilai ON  raport_nilai.nilai_nis = raport_siswa.siswa_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE  nilai_mapel="'.$mapel.'" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" AND siswa_status=1 AND nilai_jenis ="'.$jenis.'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

       private function get_datakelas_nilaisiswa_alumni($mapel, $kelas, $semester, $jenis) {
        $query = $this->db->query('SELECT siswa_nis, siswa_nama, kelas_nama, nilai_data, kelas_tahun, siswa_absen FROM raport_siswa LEFT JOIN raport_nilai ON  raport_nilai.nilai_nis = raport_siswa.siswa_nis LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE  nilai_mapel="'.$mapel.'" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" AND siswa_status=2 AND nilai_jenis ="'.$jenis.'" ORDER BY siswa_absen asc' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }



    private function get_datakelas($kelas) {
        $query = $this->db->query('SELECT kelas_nama, kelas_tahun, kelas_kk FROM raport_kelas WHERE kelas_code="'.$kelas.'"' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }



    private function get_datamapel($mapel) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$mapel.'" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function cari_kelas_modal( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_modal_guru_2($id);
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


      public function cari_mapel() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilai_m->get_data_mapel2($semester5dan6);
           $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilai_m->get_data_mapel2($semester3dan4);
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilai_m->get_data_mapel2($semester1dan2);
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilai_m->get_data_mapel2($semester5dan6);
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->mapel_id."'>".$row->mapel_nama."</option>";
                
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

     public function cari_mapel_guru() {
      $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
           $data   = $this->nilai_m->get_data_mapel_guru_2($semester5dan6, $this->input->post('nilai_cari_kelas') );
           $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          $data   = $this->nilai_m->get_data_mapel_guru_2($semester3dan4, $this->input->post('nilai_cari_kelas') );
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          $data   = $this->nilai_m->get_data_mapel_guru_2($semester1dan2, $this->input->post('nilai_cari_kelas') );
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilai_m->get_data_mapel_guru_2($semester5dan6);
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester5dan6.'">';
      }
      
        $tmp  = '';
       
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            $tmp .= $tahunajaran;
            foreach($data as $row) {
                
                $tmp .= "<option value='".$row->mapel_id."'>".$row->mapel_nama."</option>";
                
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

      public function cari_mapel2() {

     
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_nilai LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel WHERE nilai_kelas='.$kelas.' AND nilai_semester="'.$semester.'"');
        
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

     public function cari_semester_guru($id, $tahun) {


        $tmp  = '';
        $data   = $this->siswa_m->get_data_semester_modal_guru_2($id);

           
        if(!empty($data)){
            //$tmp .= "<option value=''></option>";
            $no= 0;
            foreach($data as $row) {
                   $datatahun = substr($tahun, 0 , 4);
                   $datasemester = intval($datatahun) - substr($row->haknilai_tahunajaran, 0 , 4);
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



     public function cari_aspek() {
            if ($this->nilairaport2($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_mapel')) >= 1) {
                echo  '<option value=""></option>
                     <optgroup label="Nilai Akhir Raport">
                    <option value="RAPORT_P">Nilai Pengetahuan</option>
                    <option value="RAPORT_K">Nilai Keterampilan</option>
                    <option value="RAPORT_S">Nilai Sikap</option>
                    </optgroup>';
            } else {

                echo    '<option value=""></option>
                        <optgroup label="Aspek Pengetahuan">
                        <option value="UH">Ulangan Harian</option>
                        <option value="TG">Nilai Tugas/PR</option>
                        <option value="UTS">Nilai UTS</option>
                        <option value="UAS">Nilai UAS</option>
                        </optgroup>
                        <optgroup label="Aspek Keterampilan">
                        <option value="TP">Nilai Pratik</option>
                        <option value="PR">Nilai Proyek</option>
                        <option value="PO">Nilai Portofolio</option>
                        </optgroup>
                        <optgroup label="Aspek Sikap">
                        <option value="OB">Observarsi</option>
                        <option value="PD">Penilaian Diri</option>
                        <option value="PT">Penilaian Teman</option>
                        <option value="JR">Jurnal</option>
                        </optgroup>';
            }
     }



     public function cari_data_nilai() {
        $data   = $this->nilai_m->get_data_nilai($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'));
        
        $tmp  = '';



        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                if ($row->nilai_jenis == 'RAPORT_P') {
                     $tmp .= "<option value='".$row->nilai_jenis."'>Data Nilai Pengetahuan</option>";
                } elseif ($row->nilai_jenis == 'RAPORT_K') {
                     $tmp .= "<option value='".$row->nilai_jenis."'>Data Nilai Keterampilan</option>";
                } elseif ($row->nilai_jenis == 'RAPORT_S') {
                     $tmp .= "<option value='".$row->nilai_jenis."'>Data Nilai Sikap</option>";
                } else {
                     $tmp .= "<option value='".$row->nilai_jenis."'>".$row->nilai_jenis."</option>";
                }


               
            }
        } else {
            $tmp .= "<option value=''></option>";
            $tmp .= "<option value=''>Data Nilai Kosong (Tidak Tersedia)</option>";
            
        }
        die($tmp);

     }


     public function cari_aspek_input() {
        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
            echo '<option value=""></option>
                    <optgroup label="Aspek Pengetahuan">
                    <option value="UH">Ulangan Harian</option>
                    <option value="TG">Nilai Tugas/PR</option>
                    <option value="UTS">Nilai UTS</option>
                    <option value="UAS">Nilai UAS</option>
                    </optgroup>
                    <optgroup label="Aspek Keterampilan">
                    <option value="TP">Nilai Pratik</option>
                    <option value="PR">Nilai Proyek</option>
                    <option value="PO">Nilai Portofolio</option>
                    </optgroup>
                    <optgroup label="Aspek Sikap">
                    <option value="OB">Observarsi</option>
                    <option value="PD">Penilaian Diri</option>
                    <option value="PT">Penilaian Teman</option>
                    <option value="JR">Jurnal</option>
                    </optgroup>';
        } else {
            echo '<option value=""></option>
                    <option value="RAPORT_P">Nilai Pengetahuan</option>
                    <option value="RAPORT_K">Nilai Keterampilan</option>
                   ';
        }
     }



     private function cek_datahak($id) {
        $query = $this->db->query('SELECT haknilai_id FROM raport_haknilai WHERE haknilai_kodeguru="'.$this->session->userdata('user_login').'" AND haknilai_status="1"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return 1;
           
        } else {

          return 0;
        }

       

    }

      private function get_kelas($id) {
        $query = $this->db->query('SELECT kelas_tingkat FROM raport_kelas WHERE kelas_code="'.$id.'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tingkat;
           
        }

        return $row->kelas_tingkat;

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

    private function get_tahunajaran($id) {
        $query = $this->db->query('SELECT haknilai_tahunajaran FROM raport_haknilai LEFT JOIN  raport_kelas ON raport_kelas.kelas_code = raport_haknilai.haknilai_kelas WHERE kelas_code="'.$id.'" AND haknilai_kodeguru = "'.$this->session->userdata('user_login').'" AND haknilai_status="1"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->haknilai_tahunajaran;
           
        }

        return $row->haknilai_tahunajaran;

    }

     private function get_kelas_status($id) {
        $query = $this->db->query('SELECT kelas_status FROM raport_kelas WHERE kelas_code="'.$id.'"');

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

          $list = $this->nilai_m->get_datatables_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan'));
        $data = array();

        $jumlahjenisnilai = ' '.($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) + 1);

        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
                if ($this->input->post('nilai_cari_aspek') == 'UH') {
                    $jenisnilai = 'ULANGAN HARIAN';
                    $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
                     $jenisnilai = 'TUGAS/PR';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
                     $jenisnilai = 'UTS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
                     $jenisnilai = 'UAS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                     $jenisnilai = 'PRAKTIK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                     $jenisnilai = 'PROYEK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                     $jenisnilai = 'PORTOFOLIO';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                     $jenisnilai = 'OBSERVASI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                     $jenisnilai = 'PENILAIAN DIRI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                     $jenisnilai = 'PENILAIAN TEMAN';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                     $jenisnilai = 'JURNAL';
                     $jumlahnilai = $jumlahjenisnilai;
                }  else {
                    $jenisnilai = 'NO DETECT';
                     $jumlahnilai = '';
                }
                
        }  else {

             if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } else {
             $categorynilai = 'TIDAK DITEMUKAN';
             $jenisnilai ='TIDAK TERDETEKSI';
             $jumlahnilai = '';
          }

           
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

        

        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = $no;
            $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>'.$jenisnilai.$jumlahnilai.'</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
            $row[] =  '<input name="siswa_nis['.$siswa->siswa_nis.']" type="text" style="text-align:center"  placeholder="NILAI" class="form-control data-nilai-siswa" >';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilai_m->count_all_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilai_m->count_filtered_datasiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }



    public function input_nilaisiswa_edit() {

          $list = $this->nilai_m->get_datatables_datanilaisiswa($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_data'),$this->input->post('nilai_cari_angkatan'));
        $data = array();

        $jumlahjenisnilai = ' '.substr($this->input->post('nilai_cari_data'), -1);

       
                if ($this->input->post('nilai_cari_aspek') == 'UH') {
                    $jenisnilai = 'ULANGAN HARIAN';
                    $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
                     $jenisnilai = 'TUGAS/PR';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
                     $jenisnilai = 'UTS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
                     $jenisnilai = 'UAS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                     $jenisnilai = 'PRAKTIK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                     $jenisnilai = 'PROYEK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                     $jenisnilai = 'PORTOFOLIO';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                     $jenisnilai = 'OBSERVASI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                     $jenisnilai = 'PENILAIAN DIRI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                     $jenisnilai = 'PENILAIAN TEMAN';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                     $jenisnilai = 'JURNAL';
                     $jumlahnilai = $jumlahjenisnilai;
                }  elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } else {
             $categorynilai = 'TIDAK DITEMUKAN';
             $jenisnilai ='TIDAK TERDETEKSI';
             $jumlahnilai = '';
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

        

        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = $no;
            $row[] =  '<input value="'.$siswa->siswa_nis.'"  type="hidden" class="form-control" ><h4><span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span></h4>';
            $row[] = '<h4>'.$siswa->siswa_nama.'</h4>';
             $row[] =  '<h4>'.$jenisnilai.$jumlahnilai.'</h4>';
            $row[] =  '<h4><span  style="font-size:15px" class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .' - '. $siswa->kelas_kk.' - '.$siswa->kelas_tahun.'">'. $datanamakelas.'</span></h4>';
            $row[] =  '<h4><span class="badge bg-red">'. $siswa->siswa_absen. '</span></h4>';
            $row[] =  '<input name="siswa_nis['.$siswa->siswa_nis.']" type="text" style="text-align:center"  placeholder="NILAI" value="'.$siswa->nilai_data.'" class="form-control data-nilai-siswa" >';
           
            //$row[] = $siswa->dob;
 
            //add html for action
           
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->nilai_m->count_all_datanilaisiswa($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_data'),$this->input->post('nilai_cari_angkatan')),
                        "recordsFiltered" => $this->nilai_m->count_filtered_datanilaisiswa($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_data'),$this->input->post('nilai_cari_angkatan')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);

    }


    function upload_nilai_excel() {

        $this->_validatenilai();
        $this->_validate_nilai_cari();
       $config['upload_path']          = './raport_files/excel/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
        
         $jumlahjenisnilai = ($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) + 1);

         if ($this->input->post('nilai_cari_category') == 'nilai_raport') {
          $jumlahnilai = '';
      } elseif ($this->input->post('nilai_cari_category') == 'nilai_pks') {
            
            if ($this->input->post('nilai_cari_aspek') == 'UH') {
               
                $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
               
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
              
                $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
              
               $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                 
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                 
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
               $jumlahnilai = $jumlahjenisnilai;
            } else {
                
                $jumlahnilai = '';
            }
            
      } else {

         
          $jumlahnilai = '';

      }

      $datakelasnilai = $this->input->post('nilai_cari_kelas');
      $datasemesternilai = $this->input->post('nilai_cari_semester');
      $datamapelnilai = $this->input->post('nilai_cari_mapel');


        
        if ($this->upload->do_upload("file_nilai_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel/'.$upload_data['file_name'];
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

                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_mapel')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama mapel</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                     if (trim($sheetData['5']['L']) !== $this->input->post('nilai_cari_category')) {
                       $data['inputerror'][] = 'nilai_cari_category';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>category nilai</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['6']['L']) !== $this->input->post('nilai_cari_aspek').$jumlahnilai) {
                       $data['inputerror'][] = 'nilai_cari_aspek';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>aspek nilai</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
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
        $this->_validate_nilai_cari_edit();
       $config['upload_path']          = './raport_files/excel/';
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
              $inputFileName = './raport_files/excel/'.$upload_data['file_name'];
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

                    if (trim($sheetData['4']['L']) !== $this->input->post('nilai_cari_mapel')) {
                       $data['inputerror'][] = 'nilai_cari_mapel';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama mapel</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if (trim($sheetData['6']['L']) !== $this->input->post('nilai_cari_data')) {
                       $data['inputerror'][] = 'nilai_cari_aspek';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b> sub aspek nilai</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengupload data <b>nilai excel</b> sesuai dengan <b>format form data diatas</b>.';
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


      $jumlahjenisnilai = ' '.($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) + 1);
       $jumlahjenisnilai2 = ($this->jumlahnilai2($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')));

      if ($this->input->post('nilai_cari_category') == 'nilai_raport') {
          if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } else {
             $categorynilai = 'TIDAK DITEMUKAN';
             $jenisnilai ='TIDAK TERDETEKSI';
             $jumlahnilai = '';
          }

          
      } elseif ($this->input->post('nilai_cari_category') == 'nilai_pks') {
            
            if ($this->input->post('nilai_cari_aspek') == 'UH') {
                $categorynilai = 'Pengetahuan';
                $jenisnilai = 'ULANGAN HARIAN';
                $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='TUGAS/PR';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UTS (UJIAN TENGAH SEMESTER)';
                $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UAS (UJIAN AKHIR SEMESTER)';
               $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='TES PRAKTIK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PROYEK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PORTOFOLIO';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='OBSERVASI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN DIRI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN TEMAN';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                $categorynilai = 'Sikap';
               $jenisnilai ='JURNAL';
               $jumlahnilai = $jumlahjenisnilai;
            } else {
                 $categorynilai = 'TIDAK DITEMUKAN';
               $jenisnilai ='TIDAK TERDETEKSI';
                $jumlahnilai = '';
            }
            
      } else {

         $categorynilai = 'TIDAK DITEMUKAN';
          $jenisnilai = 'TIDAK TERDETEKSI';
          $jumlahnilai = '';

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

             
           $data = array('nilaimapel' => $this->get_namamapel($this->input->post('nilai_cari_mapel')),
                         'nilaikelas' => $datanamakelas,
                         'nilaiangkatan' => $this->get_tahunkelas($this->input->post('nilai_cari_kelas')),
                         'nilaijurusankelas' => $this->get_jurusankelas($this->input->post('nilai_cari_kelas')),
                         'nilaijenis'   => $jenisnilai.$jumlahnilai,
                         'nilaitahunajaran' => $tahunajaran,
                         'nilaijumlahsiswa' => $this->jumlahsiswa($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_angkatan')),
                         'nilaisemester' => $this->input->post('nilai_cari_semester'),
                         'nilaisemesterajaran' => $datasemester,
                         'status'  => TRUE,      

            );

           echo json_encode($data);
    }


     public function generate_formnilai_edit() {

        $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      $jumlahjenisnilai = ' '.substr($this->input->post('nilai_cari_data'), -1);
       $jumlahjenisnilai2 = ($this->jumlahnilai2($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')));

     
          if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (PENGETAHUAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (KETERAMPILAN)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
             $categorynilai = 'Nilai Akhir Raport';
             $jenisnilai = 'RAPORT (SIKAP)';
             $jumlahnilai = '';
          } elseif ($this->input->post('nilai_cari_aspek') == 'UH') {
                $categorynilai = 'Pengetahuan';
                $jenisnilai = 'ULANGAN HARIAN';
                $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='TUGAS/PR';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UTS (UJIAN TENGAH SEMESTER)';
                $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
               $categorynilai = 'Pengetahuan';
               $jenisnilai ='UAS (UJIAN AKHIR SEMESTER)';
               $jumlahnilai = '';
            } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='TES PRAKTIK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PROYEK';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                 $categorynilai = 'Keterampilan';
               $jenisnilai ='PORTOFOLIO';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='OBSERVASI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN DIRI';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                 $categorynilai = 'Sikap';
               $jenisnilai ='PENILAIAN TEMAN';
               $jumlahnilai = $jumlahjenisnilai;
            } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                $categorynilai = 'Sikap';
               $jenisnilai ='JURNAL';
               $jumlahnilai = $jumlahjenisnilai;
            } else {
                 $categorynilai = 'TIDAK DITEMUKAN';
               $jenisnilai ='TIDAK TERDETEKSI';
                $jumlahnilai = '';
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

             
           $data = array('nilaimapel' => $this->get_namamapel($this->input->post('nilai_cari_mapel')),
                         'nilaikelas' => $datanamakelas,
                         'nilaiangkatan' => $this->get_tahunkelas($this->input->post('nilai_cari_kelas')),
                         'nilaijurusankelas' => $this->get_jurusankelas($this->input->post('nilai_cari_kelas')),
                         'nilaijenis'   => $jenisnilai.$jumlahnilai,
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

           $jumlahjenisnilai = ' '.($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')));
         if ($this->input->post('nilai_cari_aspek') == 'UH') {
                    $jenisnilai = 'ULANGAN HARIAN';
                    $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
                     $jenisnilai = 'TUGAS/PR';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
                     $jenisnilai = 'UTS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
                     $jenisnilai = 'UAS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                     $jenisnilai = 'PRAKTIK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                     $jenisnilai = 'PROYEK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                     $jenisnilai = 'PORTOFOLIO';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                     $jenisnilai = 'OBSERVASI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                     $jenisnilai = 'PENILAIAN DIRI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                     $jenisnilai = 'PENILAIAN TEMAN';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                     $jenisnilai = 'JURNAL';
                     $jumlahnilai = $jumlahjenisnilai;
                }  else {
                    $jenisnilai = 'NO DETECT';
                     $jumlahnilai = '';
                }

        $pesan = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Anda belum memilih <b> data aspek nilai</b>.';

        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
             
             if ($this->input->post('nilai_cari_aspek') == 'UTS' || $this->input->post('nilai_cari_aspek') == 'UAS') {
            $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai <b>'.$jenisnilai.'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b>, mata pelajaran :  <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b> saat ini tersedia.';
            } else {
                if ($jumlahnilai == 0) {
                    $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai <b>'.$jenisnilai.'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> mata pelajaran : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b>, saat ini tersedia.';
                } else {
                    $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai <b>'.$jenisnilai.'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> mata pelajaran : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b>, saat ini tersedia dan telah memiliki nilai sebanyak <b>'.$jumlahnilai.' nilai</b>.';
                }
            }

        } else {

             if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
                $aspeknilai = 'RAPORT (PENGETAHUAN)';
            } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
               $aspeknilai = 'RAPORT (KETERAMPILAN)';
            } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
               $aspeknilai = 'RAPORT (SIKAP)';
            } else {
                $aspeknilai = 'RAPORT';
            }


             $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data input nilai <b>'.$aspeknilai.'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> mata pelajaran : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b> saat ini tersedia.';
        }

       

        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    public function validasiformnilai_edit() {
        $this->_validatenilai_edit();
        $this->_validate_nilai_cari_edit();

           $jumlahjenisnilai = ' '.substr($this->input->post('nilai_cari_data'),-1);
         if ($this->input->post('nilai_cari_aspek') == 'UH') {
                    $jenisnilai = 'ULANGAN HARIAN';
                    $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'TG') {
                     $jenisnilai = 'TUGAS/PR';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'UTS') {
                     $jenisnilai = 'UTS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'UAS') {
                     $jenisnilai = 'UAS';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_aspek') == 'TP') {
                     $jenisnilai = 'PRAKTIK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PR') {
                     $jenisnilai = 'PROYEK';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PO') {
                     $jenisnilai = 'PORTOFOLIO';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'OB') {
                     $jenisnilai = 'OBSERVASI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PD') {
                     $jenisnilai = 'PENILAIAN DIRI';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'PT') {
                     $jenisnilai = 'PENILAIAN TEMAN';
                     $jumlahnilai = $jumlahjenisnilai;
                } elseif ($this->input->post('nilai_cari_aspek') == 'JR') {
                     $jenisnilai = 'JURNAL';
                     $jumlahnilai = $jumlahjenisnilai;
                }  elseif ($this->input->post('nilai_cari_data') == 'RAPORT_P') {
                    $jenisnilai = 'RAPORT (PENGETAHUAN)';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_data') == 'RAPORT_K') {
                    $jenisnilai = 'RAPORT (KETERAMPILAN)';
                     $jumlahnilai = '';
                } elseif ($this->input->post('nilai_cari_data') == 'RAPORT_S') {
                    $jenisnilai = 'RAPORT (SIKAP)';
                     $jumlahnilai = '';
                } else {
                     $jenisnilai = 'RAPORT';
                      $jumlahnilai = '';
                }

        //$pesan = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Anda belum memilih <b> data aspek nilai</b>.';

       
             


             $pesansukses = '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Data edit nilai <b>'.$jenisnilai.$jumlahnilai.'</b> untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> mata pelajaran : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b> saat ini tersedia.';
        

       

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
       
       if($this->input->post('nilai_cari_mapel') == '')
        {
            $data['inputerror'][] = 'nilai_cari_mapel';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data mapel</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_category') == '')
        {
            $data['inputerror'][] = 'nilai_cari_category';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> category nilai</b>.';
            $data['status'] = FALSE;
        }




        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
                    
            if($this->input->post('nilai_cari_aspek') == '')
            {
            $data['inputerror'][] = 'nilai_cari_aspek';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data aspek nilai</b>.';
            $data['status'] = FALSE;
            }


             if ($this->input->post('nilai_cari_aspek') == 'UAS' || $this->input->post('nilai_cari_aspek') == 'UTS') {
                    if ($this->jumlahnilai2($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) == 1) {
                     $data['inputerror'][] = 'nilai_cari_aspek';
                     $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai <b>'.strtoupper($this->input->post('nilai_cari_aspek')).'</b> mapel : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b>, untuk kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>Semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> sudah pernah dimasukkan, untuk mengedit data <b>'.strtoupper($this->input->post('nilai_cari_aspek')).'</b>, silahkan masuk <b><a href="'.site_url().'guru/datanilai/edit_nilai" target="_blank">menu ini</a></b>.';
                         $data['status'] = FALSE;
                }
         }

            
            
        }

        if ($this->input->post('nilai_cari_category') == 'nilai_raport') {


            if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
                $aspeknilai = 'NILAI RAPORT (PENGETAHUAN)';
            } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
               $aspeknilai = 'NILAI RAPORT (KETERAMPILAN)';
            } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
               $aspeknilai = 'NILAI RAPORT (SIKAP)';
            } else {
                $aspeknilai = 'NILAI RAPORT';
            }

             if($this->input->post('nilai_cari_aspek') == '')
            {
            $data['inputerror'][] = 'nilai_cari_aspek';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data aspek nilai</b>.';
            $data['status'] = FALSE;
            }

           if ($this->nilairaport($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_mapel'), $this->input->post('nilai_cari_aspek')) >= 1) {
                 $data['inputerror'][] = 'nilai_cari_category';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai pada mapel : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b>, kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).':'.$this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b> semester '.$this->input->post('nilai_cari_semester').' </b>, sudah memiliki <b> '.$aspeknilai.' </b>, untuk menghapus nilai klik <b><a href="'.site_url().'guru/datanilai/edit_nilai" target="_blank">menu ini</a></b>.';
                $data['status'] = FALSE;
           }

        }

        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
            if ($this->nilairaport2($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'), $this->input->post('nilai_cari_mapel')) >= 1) {
                 $data['inputerror'][] = 'nilai_cari_category';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data nilai pada mapel : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b> kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).':'.$this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b> pada <b> semester '.$this->input->post('nilai_cari_semester').' </b>, sedang memproses <b> NILAI AKHIR RAPORT </b>, untuk menghapus nilai klik <b><a href="'.site_url().'guru/datanilai/edit_nilai" target="_blank">menu ini</a></b>.';
                $data['status'] = FALSE;
           }
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
       
       if($this->input->post('nilai_cari_mapel') == '')
        {
            $data['inputerror'][] = 'nilai_cari_mapel';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data mapel</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_aspek') == '')
        {
            $data['inputerror'][] = 'nilai_cari_aspek';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> aspek nilai</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('nilai_cari_data') == '')
        {
            $data['inputerror'][] = 'nilai_cari_data';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data nilai</b>.';
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


      $jumlahjenisnilai = ($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) + 1);
     

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
                if ($this->input->post('nilai_cari_aspek') == 'UAS' || $this->input->post('nilai_cari_aspek') == 'UTS' ) {
                    $jenisnilaidata = $this->input->post('nilai_cari_aspek');
                    $jumlahnilai = '';
                } else {
                    $jenisnilaidata = $this->input->post('nilai_cari_aspek');
                     $jumlahnilai = $jumlahjenisnilai;
                }
        } else {

            $jenisnilaidata = $this->input->post('nilai_cari_aspek');
            $jumlahnilai = '';
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



             $data = array(
                'nilai_nis' => htmlspecialchars($did),
               'nilai_kodeguru' => $this->session->userdata('user_login'),
               'nilai_kelas' => htmlspecialchars($this->input->post('nilai_cari_kelas')),
               'nilai_mapel' => htmlspecialchars($this->input->post('nilai_cari_mapel')),
               'nilai_data' => $datanilai,
               'nilai_jenis' => $jenisnilaidata.$jumlahnilai,
               'nilai_tahun' => $tahunajaran,
                'nilai_semester' => htmlspecialchars($this->input->post('nilai_cari_semester')),
                'nilai_created' => $waktumasuk,
               'nilai_modified' => $waktumasuk
                
            );
         
            $this->nilai_m->save($data);

           
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
        $this->_validate_nilai_hapus();
        $this->_validate_nilai_cari_edit();

        $this->nilai_m->hapus_nilai($this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_data'));
        

        if ($this->input->post('nilai_cari_aspek') == 'RAPORT_P') {
                $aspeknilai = 'RAPORT (PENGETAHUAN)';
            } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_K') {
               $aspeknilai = 'RAPORT (KETERAMPILAN)';
            } elseif ($this->input->post('nilai_cari_aspek') == 'RAPORT_S') {
               $aspeknilai = 'RAPORT (SIKAP)';
            } else {
                $aspeknilai = 'RAPORT';
            }


            
         $data['sukses_string'] = '<i class="fa fa-check-circle "></i> <strong>Info:</strong> Data nilai <b>'.$aspeknilai.'</b> kelas <b>'.$this->get_namakelas($this->input->post('nilai_cari_kelas')).'</b> : <b>'. $this->get_tahunkelas($this->input->post('nilai_cari_kelas')).'</b>, pada <b>semester '.strtoupper($this->input->post('nilai_cari_semester')).'</b> mata pelajaran : <b>'.$this->get_namamapel($this->input->post('nilai_cari_mapel')).'</b> telah berhasil <b>dihapus</b>.';
        $data['status'] = TRUE;
        echo json_encode($data);

    }


    public function edit_multi_nilai() {
        $ids = (explode( ',', $this->input->get_post('data_masuk') ));
        $this->_validatenilai_edit();
        $this->_validate_nilai_cari_edit();
        $this->_validate_datamasuk();
        $this->_validate_mutilsave($ids);


         $dataangkatan = substr($this->input->post('nilai_cari_angkatan'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      $jumlahjenisnilai = ($this->jumlahnilai($this->input->post('nilai_cari_kelas'), $this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_aspek'),$this->input->post('nilai_cari_mapel')) + 1);
     

      if ($this->input->post('nilai_cari_semester') == 5 || $this->input->post('nilai_cari_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('nilai_cari_semester') == 3 || $this->input->post('nilai_cari_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('nilai_cari_semester') == 1 || $this->input->post('nilai_cari_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
                if ($this->input->post('nilai_cari_aspek') == 'UAS' || $this->input->post('nilai_cari_aspek') == 'UTS' ) {
                    $jenisnilaidata = $this->input->post('nilai_cari_aspek');
                    $jumlahnilai = '';
                } else {
                    $jenisnilaidata = $this->input->post('nilai_cari_aspek');
                     $jumlahnilai = $jumlahjenisnilai;
                }
        } else {

            $jenisnilaidata = $this->input->post('nilai_cari_aspek');
            $jumlahnilai = '';
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



             $data = array(
               'nilai_data' => $datanilai,
                //'nilai_kodeguru' => '000',
               'nilai_modified' => $waktumasuk
                
            );
             $this->nilai_m->update(array('nilai_nis' => $did, 'nilai_kelas' => $this->input->post('nilai_cari_kelas'),'nilai_mapel' => $this->input->post('nilai_cari_mapel'),'nilai_semester' => $this->input->post('nilai_cari_semester'),'nilai_jenis' => $this->input->post('nilai_cari_data')), $data);
            //$this->nilai_m->save($data);

           
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

      private function _validate_nilai_cari()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nilai_cari_semester') !== '1' && $this->input->post('nilai_cari_semester') !== '2' && $this->input->post('nilai_cari_semester') !== '3' && $this->input->post('nilai_cari_semester') !== '4' && $this->input->post('nilai_cari_semester') !== '5' && $this->input->post('nilai_cari_semester') !== '6') {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekdatakelas($this->input->post('nilai_cari_kelas')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatatahun($this->input->post('nilai_cari_angkatan')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatamapel($this->input->post('nilai_cari_mapel')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>mapel</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nilai_cari_category') !== 'nilai_pks' && $this->input->post('nilai_cari_category') !== 'nilai_raport') {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>category nilai</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nilai_cari_category') == 'nilai_pks') {
              if($this->input->post('nilai_cari_aspek') !== 'UH' && $this->input->post('nilai_cari_aspek') !== 'TG' && $this->input->post('nilai_cari_aspek') !== 'UTS' && $this->input->post('nilai_cari_aspek') !== 'UAS' && $this->input->post('nilai_cari_aspek') !== 'TP' && $this->input->post('nilai_cari_aspek') !== 'PR' && $this->input->post('nilai_cari_aspek') !== 'PO' && $this->input->post('nilai_cari_aspek') !== 'OB' && $this->input->post('nilai_cari_aspek') !== 'PD' && $this->input->post('nilai_cari_aspek') !== 'PT' && $this->input->post('nilai_cari_aspek') !== 'JR' )
            {
                $data['inputerror'][] = 'data_masuk';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Aspek <b>data nilai</b> yang anda masukkan <b>tidak valid</b>.';
                $data['status'] = FALSE;
            }
        }

        if ($this->input->post('nilai_cari_category') == 'nilai_raport') {
            if ($this->input->post('nilai_cari_aspek') !== 'RAPORT_P' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_K' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_S') {
                $data['inputerror'][] = 'data_masuk';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Aspek <b>data nilai</b> yang anda masukkan <b>tidak valid</b>.';
                $data['status'] = FALSE;
            }
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

      private function _validate_nilai_cari_edit()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('nilai_cari_semester') !== '1' && $this->input->post('nilai_cari_semester') !== '2' && $this->input->post('nilai_cari_semester') !== '3' && $this->input->post('nilai_cari_semester') !== '4' && $this->input->post('nilai_cari_semester') !== '5' && $this->input->post('nilai_cari_semester') !== '6') {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekdatakelas($this->input->post('nilai_cari_kelas')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatatahun($this->input->post('nilai_cari_angkatan')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatamapel($this->input->post('nilai_cari_mapel')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>mapel</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekdatanilai($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_kelas'),$this->input->post('nilai_cari_data')) < 1) {
             $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>aspek nilai</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nilai_cari_aspek') !== 'RAPORT_P' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_K' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_S') {
             if ($this->cekdatanilairaport($this->input->post('nilai_cari_mapel'),$this->input->post('nilai_cari_semester'),$this->input->post('nilai_cari_kelas')) >= 1) {
             $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Gagal mengedit <b>data nilai</b>,data form terkait saat ini sedang memproses <b>nilai raport</b>, hanya kategori <b>nilai akhir raport</b> yang diperbolehkan untuk <b>diedit</b>.';
            $data['status'] = FALSE;
         }
        }

       

       
              if($this->input->post('nilai_cari_aspek') !== 'UH' && $this->input->post('nilai_cari_aspek') !== 'TG' && $this->input->post('nilai_cari_aspek') !== 'UTS' && $this->input->post('nilai_cari_aspek') !== 'UAS' && $this->input->post('nilai_cari_aspek') !== 'TP' && $this->input->post('nilai_cari_aspek') !== 'PR' && $this->input->post('nilai_cari_aspek') !== 'PO' && $this->input->post('nilai_cari_aspek') !== 'OB' && $this->input->post('nilai_cari_aspek') !== 'PD' && $this->input->post('nilai_cari_aspek') !== 'PT' && $this->input->post('nilai_cari_aspek') !== 'JR' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_P' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_K' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_S')
            {
                $data['inputerror'][] = 'data_masuk';
                $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Aspek <b>data nilai</b> yang anda masukkan <b>tidak valid</b>.';
                $data['status'] = FALSE;
            }
        

      

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

      private function _validate_nilai_hapus()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


       
        if ($this->input->post('nilai_cari_aspek') !== 'RAPORT_S' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_P' && $this->input->post('nilai_cari_aspek') !== 'RAPORT_K' ) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda tidak memiliki wewenang untuk <b>menghapus</b>, data pada <b>aspek nilai ini</b>.';
            $data['status'] = FALSE;
        }

        if ($this->input->post('nilai_cari_data') !== 'RAPORT_S' && $this->input->post('nilai_cari_data') !== 'RAPORT_P' && $this->input->post('nilai_cari_data') !== 'RAPORT_K' ) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda tidak memiliki wewenang untuk <b>menghapus</b>, data pada <b>data nilai ini</b>.';
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

        $query = $this->db->query('SELECT count(kelas_code) as jumlah FROM raport_kelas WHERE kelas_code= "'.$kelas.'"');
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

        $query = $this->db->query('SELECT COUNT(DISTINCT(kelas_tahun)) as jumlah FROM raport_kelas WHERE kelas_tahun= "'.$angkatan.'"');
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

        $query = $this->db->query('SELECT count(mapel_id) as jumlah FROM raport_mapel WHERE mapel_id= "'.$mapel.'"');
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

        $query = $this->db->query('SELECT count(DISTINCT(nilai_jenis)) as jumlah FROM raport_nilai WHERE nilai_mapel="'.$mapel.'" AND nilai_semester="'.$semester.'" AND nilai_kelas="'.$kelas.'" AND nilai_jenis="'.$jenis.'"');
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

        $query = $this->db->query('SELECT count(DISTINCT(nilai_jenis)) as jumlah FROM raport_nilai WHERE nilai_mapel="'.$mapel.'" AND nilai_semester="'.$semester.'" AND nilai_kelas="'.$kelas.'" AND nilai_jenis LIKE "RAPORT%"');
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
        $query = $this->db->query('SELECT kelas_tahun FROM raport_kelas WHERE kelas_code="'.$id.'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tahun;
           
        }

        return $row->kelas_tahun;

    }

    private function get_jurusankelas($id) {
        $query = $this->db->query('SELECT kelas_kk FROM raport_kelas WHERE kelas_code="'.$id.'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_kk;
           
        }

        return $row->kelas_kk;

    }

    private function get_namamapel($id) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$id.'"');

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
        

      
         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_nis['.$did.']')) == FALSE && trim($this->input->post('siswa_nis['.$did.']') !== '') && trim($this->input->post('siswa_nis['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nilai siswa</b> harus diisi dengan <b> format angka</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if(intval($this->input->post('siswa_nis['.$did.']')) > 100)
        {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nilai siswa</b> yang dimasukkan hanya diperbolehkan rentang <b>nilai 1 - 100</b>, cek data nilai siswa dengan NIS : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
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