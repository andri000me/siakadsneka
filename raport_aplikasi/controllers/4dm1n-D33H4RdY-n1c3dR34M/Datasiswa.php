<?php
class Datasiswa extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->model('password_siswa_m');
        $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->load->library("PHPExcel");
        $this->load->library('tanggal');
        $this->load->model('konfigurasi_m');
        $this->real_path = realpath('raport_files/foto/siswa/real/');
        $this->full_path = realpath('raport_files/foto/siswa/full/');
        $this->thumb_path = realpath('raport_files/foto/siswa/thumbnail/');
        
    }

    

    public function siswaaktif() {
        $this->data['data_angkatan_aktif'] = $this->siswa_m->get_data_angkatan_aktif();
        $this->data['data_kelas_aktif'] = $this->siswa_m->get_data_kelas_aktif();

        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        //Load Data View Data Siswa Aktif
        $this->data['subview'] = 'admin/datasiswa/siswaaktif';
        $this->load->view('admin/admindesain', $this->data);
        
    }

      public function importdatasiswa() {
        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();


        //Load Data View Data Import Data Siswa
        $this->data['subview'] = 'admin/datasiswa/importdatasiswa';
        $this->load->view('admin/admindesain', $this->data);
        
    }

     public function lihat_data_siswa($id)
    {   
      
        $data = $this->siswa_m->get_data_siswa($id);
        
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        


        //dump($this->sortdata());

    }





    public function cek ($id) {
       //his->db->select('siswa_id,siswa_nis,siswa_nisn,siswa_jeniskelamin, siswa_email, siswa_handphone, siswa_tempatlahir, siswa_tanggallahir, siswa_asalsekolah, siswa_hobi, siswa_agama, siswa_alamat, siswa_foto, siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas,siswa_namaayah, siswa_pekerjaanayah,siswa_pendidikanayah, siswa_penghasilanayah,siswa_notelpayah,siswa_alamatayah,siswa_namaibu, siswa_pekerjaanibu,siswa_pendidikanibu, siswa_penghasilanibu,siswa_notelpibu,siswa_alamatibu,siswa_namawali, siswa_pekerjaanwali,siswa_pendidikanwali, siswa_penghasilanwali,siswa_notelpwali,siswa_alamatwali');
        //$this->db->from('raport_siswa');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        //$this->db->where('siswa_nis', 916123);
       //$query = $this->db->get();
       $this->db->select('siswa_id,user_login');
        $this->db->from('raport_siswa');
        $this->db->join('raport_users', 'raport_users.user_login = raport_siswa.siswa_nis', 'left');
        $this->db->where('user_level', 1);
        $this->db->where('siswa_nis', $id);
        $query = $this->db->get();
       dump($this->db->last_query());
       dump($this->tanggal->time_now());
    }

    public function siswatidakaktif() {

         $this->data['data_angkatan'] = $this->siswa_m->get_data_angkatan();
        $this->data['data_kelas'] = $this->siswa_m->get_data_kelas();

          $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        
        //Load Data View Data Siswa Tidak Aktif
        $this->data['subview'] = 'admin/datasiswa/siswatidakaktif';
        $this->load->view('admin/admindesain', $this->data);
        
    }

     public function validasiformsiswa() {
        $this->_validatesiswa();
        $this->_validate_siswa_cari();

        $pesansukses= '<i class="fa fa-info-circle"></i> <strong>Info:</strong> Silahkan, <b> Download format excel</b> untuk <b>mengimport data siswa</b> dibawah ini.';
        $data = array('suksespesan' => $pesansukses,
                       'status'   => TRUE  );
        echo json_encode($data);
    }

    private function _validatesiswa()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

        if($this->input->post('siswa_cari_angkatan') == '')
        {
            $data['inputerror'][] = 'siswa_cari_angkatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_cari_kelas') == '')
        {
            $data['inputerror'][] = 'siswa_cari_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('jumlah_siswa') == '')
        {
            $data['inputerror'][] = 'jumlah_siswa';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memasukkan <b> data jumlah siswa</b>.';
            $data['status'] = FALSE;
        }

       
         

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


      private function _validate_siswa_cari()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->cekdatakelas($this->input->post('siswa_cari_kelas')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatatahun($this->input->post('siswa_cari_angkatan')) < 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }


        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }


    public function download_formsiswa() {

        $this->_validatesiswa();
        $this->_validate_siswa_cari();

        //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                        'name'  => 'Verdana',
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

            $styleHeader = array(
              'font'  => array(
                  'bold' => true,
                  'color' => array('rgb' => '000000'),
                  'size'  => 20,
                  'name' => 'Calibri'
              ));

            $styleArrayPersonal = array(
                'font' => array(
                    'bold' => true,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => '000s0000'),
                    ),
                ),
                
              );


           $datakelas = $this->get_datakelas($this->input->post('siswa_cari_kelas'));
           if(!empty($datakelas)){
            
                    foreach ($datakelas as $row) {

                        $datanamakelas = $row->kelas_nama;
                        $datatahunkelas = $row->kelas_tahun;
                        $datajurusan = $row->kelas_kk;
                    }

            } else {
                $datanamakelas = 'KELAS KOSONG';
                $datatahunkelas = 'EMPTY';
                $datajurusan= '';
               
            }



          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A2', 'IMPORT DATA SISWA - '.strtoupper($this->konfigurasi_m->konfig_sekolah()))
                                        ->setCellValue('A3', 'KELAS : '.strtoupper($datanamakelas).'/'.strtoupper($datajurusan).'  - ANGKATAN : '.$datatahunkelas)
                                        ->setCellValue('A4', 'JUMLAH SISWA : '.intval($this->input->post('jumlah_siswa')).' DATA');


           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A7', 'NO')
                                        ->setCellValue('B7', 'NIS')
                                        ->setCellValue('C7', 'NISN')
                                        ->setCellValue('D7', 'NAMA LENGKAP')
                                        ->setCellValue('E7', 'NOMOR IJAZAH')
                                        ->setCellValue('F7', 'TAHUN IJAZAH')
                                        ->setCellValue('G7', 'KELAS')
                                        ->setCellValue('H7', 'ANGKATAN')
                                        ->setCellValue('I7', 'ABSEN')
                                        ->setCellValue('J7', 'MASUK PADA TANGGAL (EX : 2016-06-15)')
                                        ->setCellValue('K7', 'STATUS')
                                        ->setCellValue('L7', 'JENIS KELAMIN')
                                        ->setCellValue('M7', 'AGAMA')
                                        ->setCellValue('N7', 'EMAIL')
                                        ->setCellValue('O7', 'NO HANDPHONE')
                                        ->setCellValue('P7', 'NO TELP RUMAH')
                                        ->setCellValue('Q7', 'STATUS DALAM KELUARGA')
                                        ->setCellValue('R7', 'ANAK KE')
                                        ->setCellValue('S7', 'TEMPAT LAHIR')
                                        ->setCellValue('T7', 'TANGGAL LAHIR (EX : 1994-10-15)')
                                        ->setCellValue('U7', 'ASAL SEKOLAH')
                                        ->setCellValue('V7', 'HOBI')
                                        ->setCellValue('W7', 'ALAMAT RUMAH')
                                        ->setCellValue('X7', 'NAMA LENGKAP AYAH')
                                        ->setCellValue('Y7', 'PEKERJAAN AYAH')
                                        ->setCellValue('Z7', 'PENDIDIKAN TERAKHIR AYAH')
                                        ->setCellValue('AA7', 'PENGHASILAN AYAH')
                                        ->setCellValue('AB7', 'NOMOR HANDHONE AYAH')
                                        ->setCellValue('AC7', 'ALAMAT LENGKAP AYAH')
                                        ->setCellValue('AD7', 'NAMA LENGKAP IBU')
                                        ->setCellValue('AE7', 'PEKERJAAN IBU')
                                        ->setCellValue('AF7', 'PENDIDIKAN TERAKHIR IBU')
                                        ->setCellValue('AG7', 'PENGHASILAN IBU')
                                        ->setCellValue('AH7', 'NOMOR HANDPHONE IBU')
                                        ->setCellValue('AI7', 'ALAMAT LENGKAP IBU')
                                        ->setCellValue('AJ7', 'NAMA LENGKAP WALI')
                                        ->setCellValue('AK7', 'PEKERJAAN WALI')
                                        ->setCellValue('AL7', 'PENDIDIKAN TERAKHIR WALI')
                                        ->setCellValue('AM7', 'PENGHASILAN WALI')
                                        ->setCellValue('AN7', 'NOMOR HANDPHONE WALI')
                                        ->setCellValue('AO7', 'ALAMAT LENGKAP WALI');
                                       

            //Setting Style Array Bro :)
            $objPHPExcel->getActiveSheet()->getStyle('A1:J4')->applyFromArray($styleHeader);
            $objPHPExcel->getActiveSheet()->getStyle('A7:AO7')->applyFromArray($styleArrayPersonal);


            //Setting background Warna
            $objPHPExcel->getActiveSheet()->getStyle('A7:W7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('A7:W7')->getFill()->getStartColor()->setRGB('2F75B5');


            $objPHPExcel->getActiveSheet()->getStyle('X7:AC7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('X7:AC7')->getFill()->getStartColor()->setRGB('806000');


            $objPHPExcel->getActiveSheet()->getStyle('AD7:AI7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('AD7:AI7')->getFill()->getStartColor()->setRGB('222B35');
           

            $objPHPExcel->getActiveSheet()->getStyle('AJ7:AO7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('AJ7:AO7')->getFill()->getStartColor()->setRGB('002060');
           


            //Setting Warna Font
            $objPHPExcel->getActiveSheet()->getStyle('A7:W7')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);

            $objPHPExcel->getActiveSheet()->getStyle('X7:AC7')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);

            $objPHPExcel->getActiveSheet()->getStyle('AD7:AI7')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);

            $objPHPExcel->getActiveSheet()->getStyle('AJ7:AO7')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);


            //Setting Text Align
            $objPHPExcel->getActiveSheet()->getStyle('A1:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('X7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AD7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AJ7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


            //Setting Panjang Colom Bro :)
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(21);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(57);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(28);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(17.5);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(16);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(45);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(22);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(17);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(52);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(28);
            $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(28);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(32);
            $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(24);
            $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(34);
            $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(46);
            $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(40);
            $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(92);
            
            $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(57);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(26);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(32);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(33);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(92);

            $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(57);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(26);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(32);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(33);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(92);

            $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(57);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(26);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(32);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(33);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(92);



            //$objPHPExcel->getActiveSheet()->getStyle('A1:A3')->applyFromArray($styleArray);
            //$objPHPExcel->getActiveSheet()->getStyle('A11:F12')->getFont()->setSize(11);
            //$objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            //$objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getFont()->setName('Times New Roman');
            //$objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getFont()->setBold(TRUE);
            


            //$objPHPExcel->getActiveSheet()->getStyle('D5:D10')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('A5:F10')->getFont()->setSize(10);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(43);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
            //$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);


            $objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:J3');
            $objPHPExcel->getActiveSheet()->mergeCells('A4:J4');



            //$objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            //$objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //$objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            //$objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            //$objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            //$objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            //$objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            //$objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


            //$objValidation = $objPHPExcel->getActiveSheet()->getCell('F13')->getDataValidation();
            //$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_WHOLE );
            //$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_STOP );
            //$objValidation->setAllowBlank(true);
            //$objValidation->setShowInputMessage(true);
            //$objValidation->setShowErrorMessage(true);
            //$objValidation->setErrorTitle('Pesan Error');
            //$objValidation->setError('Data input yang anda masukkan, tidak diperbolehkan, pastikan nilai yang diinput antara rentang nilai 1 hingga 100 (Mohon Untuk Diperbaiki) !!!');
            //$objValidation->setPromptTitle('Informasi Allowed Input :');
            //$objValidation->setPrompt('Hanya rentang nilai 1 hingga 100 yang diperbolehkan diinput');
            //$objValidation->setFormula1('1');
            //$objValidation->setFormula2('100');

            //Membuat Dropdown pad AA8 bro :)
            $objValidation = $objPHPExcel->getActiveSheet()->getCell('AA8')
                             ->getDataValidation();
            $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $objValidation->setAllowBlank(false);
            $objValidation->setShowInputMessage(true);
            $objValidation->setShowErrorMessage(true);
            $objValidation->setShowDropDown(true);
            $objValidation->setErrorTitle('Input error');
            $objValidation->setError('Data penghasilan yang anda masukkan tidak sesuai.');
            $objValidation->setPromptTitle('Informasi');
            $objValidation->setPrompt('Masukkan data penghasilan, sesuai pada list data menu yang tersedia.');
            $objValidation->setFormula1('"Rp 100.000 - Rp 500.000,Rp 500.000 - Rp 1 Juta,Rp 1.5 Juta - Rp 1.5 Juta,Rp 1.5 Juta - Rp 2 Juta,Rp 2 Juta - Rp 3.5 Juta,Rp 3.5 Juta - Rp 5 Juta,Rp 5 Juta Keatas"');
             
            //Dropdown Jenis Kelamin
             $jeniskelamin = $objPHPExcel->getActiveSheet()->getCell('L8')
                             ->getDataValidation();
            $jeniskelamin->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $jeniskelamin->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $jeniskelamin->setAllowBlank(false);
            $jeniskelamin->setShowInputMessage(true);
            $jeniskelamin->setShowErrorMessage(true);
            $jeniskelamin->setShowDropDown(true);
            $jeniskelamin->setErrorTitle('Input error');
            $jeniskelamin->setError('Data Jenis Kelamin yang anda masukkan tidak sesuai.');
            $jeniskelamin->setPromptTitle('Informasi');
            $jeniskelamin->setPrompt('Masukkan data Jenis Kelamin, sesuai pada list data menu yang tersedia.');
            $jeniskelamin->setFormula1('"LAKI-LAKI, PEREMPUAN"');

            //Dropdown Status Siswa
             $statussiswa = $objPHPExcel->getActiveSheet()->getCell('K8')
                             ->getDataValidation();
            $statussiswa->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $statussiswa->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $statussiswa->setAllowBlank(false);
            $statussiswa->setShowInputMessage(true);
            $statussiswa->setShowErrorMessage(true);
            $statussiswa->setShowDropDown(true);
            $statussiswa->setErrorTitle('Input error');
            $statussiswa->setError('Data status siswa yang anda masukkan tidak sesuai.');
            $statussiswa->setPromptTitle('Informasi');
            $statussiswa->setPrompt('Masukkan data status siswa, sesuai pada list data menu yang tersedia.');
            $statussiswa->setFormula1('"AKTIF, ALUMNI, PINDAH, MENINGGAL, KELUAR"');

             //Dropdown Pendidikan Ayah, Ibu , Wali
             $penghasilandata = $objPHPExcel->getActiveSheet()->getCell('Z8')
                             ->getDataValidation();
            $penghasilandata->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
            $penghasilandata->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
            $penghasilandata->setAllowBlank(false);
            $penghasilandata->setShowInputMessage(true);
            $penghasilandata->setShowErrorMessage(true);
            $penghasilandata->setShowDropDown(true);
            $penghasilandata->setErrorTitle('Input error');
            $penghasilandata->setError('Data pendidikan yang anda masukkan tidak sesuai.');
            $penghasilandata->setPromptTitle('Informasi');
            $penghasilandata->setPrompt('Masukkan data pendidikan, sesuai pada list data menu yang tersedia.');
            $penghasilandata->setFormula1('"Tidak Sekolah, SD, SMP, SMA, D1, D2, D3, S1, S2, S3"');
             
             

            //Looping Data Yang Masuk Paramaternya berupa Jumlah Siswa
            $jumlahsiswa = intval($this->input->post('jumlah_siswa'));
            $mulaimasuk = 8;
            $selesaimasuk = ($jumlahsiswa + $mulaimasuk)-1;
            $nbperingatan = ($jumlahsiswa + $mulaimasuk)+1;
            
            $no = 0;

            
            $datanis = intval($this->input->post('siswa_nis'))-1;

            if ($jumlahsiswa == 0) {
             $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A8', 'DATA TIDAK TERSEDIA !!!');
            } else {
                

              for ($i=$mulaimasuk; $i <= $selesaimasuk ; $i++) { 

                if ($this->input->post('siswa_nis') !== '') {
                  $datanis++;
                } else {
                  $datanis = '';
                }
               
               $no++;
               $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$i, $no)
                                        ->setCellValue('B'.$i, $datanis)
                                        ->setCellValue('C'.$i, '')
                                        ->setCellValue('D'.$i, '')
                                        ->setCellValue('E'.$i, '')
                                        ->setCellValue('F'.$i, '')
                                        ->setCellValue('G'.$i, $datanamakelas)
                                        ->setCellValue('H'.$i, $datatahunkelas)
                                        ->setCellValue('I'.$i, $no)
                                        ->setCellValue('J'.$i, '')
                                        ->setCellValue('K'.$i, '')
                                        ->setCellValue('L'.$i, '')
                                        ->setCellValue('M'.$i, '')
                                        ->setCellValue('N'.$i, '')
                                        ->setCellValue('O'.$i, '')
                                        ->setCellValue('P'.$i, '')
                                        ->setCellValue('Q'.$i, '')
                                        ->setCellValue('R'.$i, '')
                                        ->setCellValue('S'.$i, '')
                                        ->setCellValue('T'.$i, '')
                                        ->setCellValue('U'.$i, '')
                                        ->setCellValue('V'.$i, '')
                                        ->setCellValue('W'.$i, '')
                                        ->setCellValue('X'.$i, '')
                                        ->setCellValue('Y'.$i, '')
                                        ->setCellValue('Z'.$i, '')
                                        ->setCellValue('AA'.$i, '')
                                        ->setCellValue('AB'.$i, '')
                                        ->setCellValue('AC'.$i, '')
                                        ->setCellValue('AD'.$i, '')
                                        ->setCellValue('AE'.$i, '')
                                        ->setCellValue('AF'.$i, '')
                                        ->setCellValue('AG'.$i, '')
                                        ->setCellValue('AH'.$i, '')
                                        ->setCellValue('AI'.$i, '')
                                        ->setCellValue('AJ'.$i, '')
                                        ->setCellValue('AK'.$i, '')
                                        ->setCellValue('AL'.$i, '')
                                        ->setCellValue('AM'.$i, '')
                                        ->setCellValue('AN'.$i, '')
                                        ->setCellValue('AO'.$i, '');

           //Setting Style Array Pada Looping
           $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':AO'.$i)->applyFromArray($styleArrayPersonal);

           //Setting Warna Backgroun Bro :)
           $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFill()->getStartColor()->setRGB('C00000');


             $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getFill()->getStartColor()->setRGB('C00000');


             $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getFill()->getStartColor()->setRGB('C00000');


            $objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getFill()->getStartColor()->setRGB('C00000');


            $objPHPExcel->getActiveSheet()->getStyle('K'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('K'.$i)->getFill()->getStartColor()->setRGB('C00000');


            $objPHPExcel->getActiveSheet()->getStyle('L'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('L'.$i)->getFill()->getStartColor()->setRGB('C00000');


             $objPHPExcel->getActiveSheet()->getStyle('X'.$i.':AC'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('X'.$i.':AC'.$i)->getFill()->getStartColor()->setRGB('FFF2CC');

             $objPHPExcel->getActiveSheet()->getStyle('AD'.$i.':AI'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('AD'.$i.':AI'.$i)->getFill()->getStartColor()->setRGB('BDD7EE');

             $objPHPExcel->getActiveSheet()->getStyle('AJ'.$i.':AO'.$i)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $objPHPExcel->getActiveSheet()->getStyle('AJ'.$i.':AO'.$i)->getFill()->getStartColor()->setRGB('EDEDED');        


            //Ganti Warna Bro :)
             $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
             $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
             $objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
             $objPHPExcel->getActiveSheet()->getStyle('I'.$i)->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
             $objPHPExcel->getActiveSheet()->getStyle('K'.$i)->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
             $objPHPExcel->getActiveSheet()->getStyle('L'.$i)->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);



             //Setting Text Align Bro :)
             $objPHPExcel->getActiveSheet()->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('X'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AD'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AJ'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             $objPHPExcel->getActiveSheet()->getStyle('W'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AC'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AI'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $objPHPExcel->getActiveSheet()->getStyle('AO'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             //Setting Data Tanpa Password
              $objPHPExcel->getActiveSheet()->getStyle('B'.$i.':F'.$i)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

               $objPHPExcel->getActiveSheet()->getStyle('I'.$i.':AO'.$i)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);

            //Setting Dropdown bro :)
             $objPHPExcel->getActiveSheet()->getCell('AA'.$i)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getCell('AG'.$i)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getCell('AM'.$i)->setDataValidation(clone $objValidation);

             $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->setDataValidation(clone $penghasilandata);
             $objPHPExcel->getActiveSheet()->getCell('AF'.$i)->setDataValidation(clone $penghasilandata);
             $objPHPExcel->getActiveSheet()->getCell('AL'.$i)->setDataValidation(clone $penghasilandata);             

             $objPHPExcel->getActiveSheet()->getCell('L'.$i)->setDataValidation(clone $jeniskelamin);
             $objPHPExcel->getActiveSheet()->getCell('K'.$i)->setDataValidation(clone $statussiswa);

             //Set Format Tanggal Bro :)
             $objPHPExcel->getActiveSheet()->getStyle('T'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
             $objPHPExcel->getActiveSheet()->getStyle('J'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);

             //Looping Selesain Bro :)
            }


            }
            
            

          
            //Set Validasi Data Kelas dan Tahun Kelas :)
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('AQ8', intval($this->input->post('siswa_cari_kelas')))
                                        ->setCellValue('AR8', $datatahunkelas)
                                        ->setCellValue('AS8', intval($this->input->post('jumlah_siswa')));

            //Set Warna Validasi
            $objPHPExcel->getActiveSheet()->getStyle('AQ8')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('AR8')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);
             $objPHPExcel->getActiveSheet()->getStyle('AS8')->getFont()->getColor()->setRGB(PHPExcel_Style_Color::COLOR_WHITE);

            $objRichText = new PHPExcel_RichText();
            $objRichText->createText('NB : Baris data dengan ');

            $objPayable = $objRichText->createTextRun('BACKGROUND WARNA MERAH');
            $objPayable->getFont()->setBold(true);
            $objPayable->getFont()->setItalic(true);
            $objPayable->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_DARKGREEN ) );
            $objPayable3 = $objRichText->createTextRun(' ,Menandakan data tersebut, ');

             $objPayable2 = $objRichText->createTextRun(' WAJIB UNTUK DIISI ');
            $objPayable2->getFont()->setBold(true);
            $objPayable2->getFont()->setItalic(true);
            $objPayable2->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_DARKGREEN ) );
            $objRichText->createText('.');
            //Set NB (Informasi)
            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$nbperingatan, $objRichText);

            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'Import -'.$datanamakelas.'-TH'.str_replace('/','-',$datatahunkelas);
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
            $namaexcel = 'Import Data Siswa - Kelas '.$datanamakelas.' - TH'.str_replace('/','-',$datatahunkelas);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('Import Data Siswa - Kelas '.$datanamakelas.' - TH'.str_replace('/','-',$datatahunkelas)) 
            ->setSubject('Import Data Siswa - Kelas '.$datanamakelas.' - TH'.str_replace('/','-',$datatahunkelas))
            ->setDescription('Import Data Siswa - Kelas '.$datanamakelas.' - TH'.str_replace('/','-',$datatahunkelas)) 
            ->setKeywords($datanamakelas.' - TH'.str_replace('/','-',$datatahunkelas))  
            ->setCategory($datanamakelas.' - TH'.str_replace('/','-',$datatahunkelas));  
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



    function upload_siswa_excel() {

        $this->_validatesiswa();
        $this->_validate_siswa_cari();
        $config['upload_path']          = './raport_files/excel_import/';
        $config['allowed_types']        = 'xls';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = false;
       
        $this->load->library('upload', $config);
  
        if ($this->upload->do_upload("file_datasiswa_excel"))
        {
             
            $upload_data = $this->upload->data();
             $file =  $upload_data['full_path'];
              $inputFileType = 'Excel5'; 
              $inputFileName = './raport_files/excel_import/'.$upload_data['file_name'];
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
                    
                    if (trim($sheetData['8']['AQ']) !== $this->input->post('siswa_cari_kelas')) {
                       $data['inputerror'][] = 'siswa_cari_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengimport data <b>siswa excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['8']['AR']) !== $this->input->post('siswa_cari_angkatan')) {
                       $data['inputerror'][] = 'siswa_cari_angkatan';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan kelas</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengimport data <b>siswa excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData['8']['AS']) !== $this->input->post('jumlah_siswa')) {
                       $data['inputerror'][] = 'jumlah_siswa';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>jumlah siswa</b> pada form excel <b>tidak sesuai</b>, mohon untuk mengimport data <b>siswa excel</b> sesuai dengan <b>format form data diatas</b>.';
                         $data['status'] = FALSE;
                    }


                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }


                    //Cek Data Jika ada yang Duplikat :)
                    $jumlahsiswa2 = intval($this->input->post('jumlah_siswa'));
                    $mulaimasuk2 = 8;
                    $selesaimasuk2 = ($jumlahsiswa2 + $mulaimasuk2)-1;
                    $no = 0;
                    for ($i=$mulaimasuk2; $i <= $selesaimasuk2 ; $i++) {
                    $no++;
                    $datanisarray[] =  trim($sheetData[$i]['B']);
                    $datanisnarray[] =  trim($sheetData[$i]['C']);
                    $dataijazaharray[] =  trim($sheetData[$i]['E']);
                    $dataabsenarray[] =  trim($sheetData[$i]['I']);
                    $datahandphonearray[] =  trim($sheetData[$i]['O']);
                    $dataemailarray[] =  trim($sheetData[$i]['N']);
                    }


                     if (count(array_unique(array_filter(($datanisarray)))) !== count(array_filter($datanisarray))) {
                       $data['inputerror'][] = 'siswa_nis';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>NIS siswa masih ada yang sama</b>, silahkan periksa kembali form excel';
                         $data['status'] = FALSE;
                    }

                    if (count(array_unique(array_filter(($datanisnarray)))) !== count(array_filter($datanisnarray))) {
                       $data['inputerror'][] = 'siswa_nisn';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>NISN siswa masih ada yang sama</b>, silahkan periksa kembali form excel';
                         $data['status'] = FALSE;
                    }

                    if (count(array_unique(array_filter(($dataijazaharray)))) !== count(array_filter($dataijazaharray))) {
                       $data['inputerror'][] = 'siswa_nomorijazah';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>Nomor Ijazah siswa masih ada yang sama</b>, silahkan periksa kembali form excel';
                         $data['status'] = FALSE;
                    }

                    if (count(array_unique(array_filter(($dataabsenarray)))) !== count(array_filter($dataabsenarray))) {
                       $data['inputerror'][] = 'siswa_absen';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>Absen siswa masih ada yang sama</b>, silahkan periksa kembali form excel';
                         $data['status'] = FALSE;
                    }

                    if (count(array_unique(array_filter(($datahandphonearray)))) !== count(array_filter($datahandphonearray))) {
                       $data['inputerror'][] = 'siswa_handphone';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b> Handphone siswa masih ada yang sama</b>, silahkan periksa kembali form excel';
                         $data['status'] = FALSE;
                    }

                    if (count(array_unique(array_filter(($dataemailarray)))) !== count(array_filter($dataemailarray))) {
                       $data['inputerror'][] = 'siswa_email';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b> Email siswa masih ada yang sama</b>, silahkan periksa kembali form excel';
                         $data['status'] = FALSE;
                    }


                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }



                   //Looping Data Yang Masuk Paramaternya berupa Jumlah Siswa
                  $jumlahsiswa = intval($this->input->post('jumlah_siswa'));
                  $mulaimasuk = 8;
                  $selesaimasuk = ($jumlahsiswa + $mulaimasuk)-1;
                  $no = 0;
                  for ($i=$mulaimasuk; $i <= $selesaimasuk ; $i++) { 
                    $no++;

                    if (trim($sheetData[$i]['B']) == '') {
                       $data['inputerror'][] = 'siswa_nis';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nis siswa</b> pada form excel <b>tidak diperbolehkan kosong</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                         $data['status'] = FALSE;
                    }

                    if (trim($sheetData[$i]['D']) == '') {
                       $data['inputerror'][] = 'siswa_nama';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>nama siswa</b> pada form excel <b>tidak diperbolehkan kosong</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                         $data['status'] = FALSE;
                    }

                     if (trim($sheetData[$i]['G']) == '') {
                       $data['inputerror'][] = 'siswa_kelas';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas siswa</b> pada form excel <b>tidak diperbolehkan kosong</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                         $data['status'] = FALSE;
                    }

                     if (trim($sheetData[$i]['I']) == '') {
                       $data['inputerror'][] = 'siswa_absen';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>absen siswa</b> pada form excel <b>tidak diperbolehkan kosong</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                         $data['status'] = FALSE;
                    }

                     if (trim($sheetData[$i]['K']) == '') {
                       $data['inputerror'][] = 'siswa_status';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>status siswa</b> pada form excel <b>tidak diperbolehkan kosong</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                         $data['status'] = FALSE;
                    }

                     if (trim($sheetData[$i]['L']) == '') {
                       $data['inputerror'][] = 'siswa_jeniskelamin';
                        $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>jenis kelamin siswa</b> pada form excel <b>tidak diperbolehkan kosong</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                         $data['status'] = FALSE;
                    }


                        if (!filter_var(trim($sheetData[$i]['N']), FILTER_VALIDATE_EMAIL) === true && trim(trim($sheetData[$i]['N'])!== '') && trim(trim($sheetData[$i]['N'])!== NULL) && trim(trim($sheetData[$i]['N'])!== '-')) {
               
                                $data['inputerror'][] = 'siswa_email';
                                $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> <b>Format email</b> yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';;
                                $data['status'] = FALSE;
                            }


                         $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['B'])) == FALSE && trim(trim($sheetData[$i]['B']) !== '') && trim(trim($sheetData[$i]['B']) !== NULL)) {
                            $data['inputerror'][] = 'siswa_nis';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nis</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['C'])) == FALSE && trim(trim($sheetData[$i]['C']) !== '') && trim(trim($sheetData[$i]['C']) !== NULL) && trim(trim($sheetData[$i]['C']) !== '-')) {
                            $data['inputerror'][] = 'siswa_nisn';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nisn</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['O'])) == FALSE && trim(trim($sheetData[$i]['O']) !== '') && trim(trim($sheetData[$i]['O']) !== NULL) && trim(trim($sheetData[$i]['O']) !== '-')) {
                            $data['inputerror'][] = 'siswa_handphone';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone siswa</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                         $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['P'])) == FALSE && trim(trim($sheetData[$i]['P']) !== '') && trim(trim($sheetData[$i]['P']) !== NULL) && trim(trim($sheetData[$i]['P']) !== '-')) {
                            $data['inputerror'][] = 'siswa_telprumah';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>telp rumah</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['AB'])) == FALSE && trim(trim($sheetData[$i]['AB']) !== '') && trim(trim($sheetData[$i]['AB']) !== NULL) && trim(trim($sheetData[$i]['AB']) !== '-')) {
                            $data['inputerror'][] = 'siswa_notelpayah';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone ayah</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['AH'])) == FALSE && trim(trim($sheetData[$i]['AH']) !== '') && trim(trim($sheetData[$i]['AH']) !== NULL) && trim(trim($sheetData[$i]['AH']) !== '-')) {
                            $data['inputerror'][] = 'siswa_notelpibu';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone ibu</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['AN'])) == FALSE && trim(trim($sheetData[$i]['AN']) !== '') && trim(trim($sheetData[$i]['AN']) !== NULL) && trim(trim($sheetData[$i]['AN']) !== '-')) {
                            $data['inputerror'][] = 'siswa_notelpwali';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone wali</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['E'])) == FALSE && trim(trim($sheetData[$i]['E']) !== '') && trim(trim($sheetData[$i]['E']) !== NULL)) {
                            $data['inputerror'][] = 'siswa_tahunijazah';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>tahun ijazah</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        
                        $expr = '/^[0-9][0-9]*$/';
                        if (preg_match($expr, trim($sheetData[$i]['I'])) == FALSE && trim(trim($sheetData[$i]['I']) !== '') && trim(trim($sheetData[$i]['I']) !== NULL)) {
                            $data['inputerror'][] = 'siswa_absen';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no absen</b> harus diisi dengan <b> format angka</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }



                         if (count($this->dataabsen_excel($this->input->post('siswa_cari_kelas'), trim($sheetData[$i]['I'])))) {
                            $data['inputerror'][] = 'siswa_absen';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data absen : <b>'. trim($sheetData[$i]['I']) .'</b> pada kelas : <b>'. $this->get_kelas($this->input->post('siswa_cari_kelas')).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa(trim($sheetData[$i]['I']) ,$this->input->post('siswa_cari_kelas')).'</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (count($this->datanis_excel(trim($sheetData[$i]['B'])))) {
                            $data['inputerror'][] = 'siswa_nis';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nis : <b>'. trim($sheetData[$i]['B']).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa2(trim($sheetData[$i]['B'])).'</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (count($this->datanisn_excel(trim($sheetData[$i]['C'])))) {
                            $data['inputerror'][] = 'siswa_nisn';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nisn : <b>'. trim($sheetData[$i]['C']).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_nisn(trim($sheetData[$i]['C'])).'</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                         if (count($this->datanomorijazah_excel(trim($sheetData[$i]['E'])))) {
                            $data['inputerror'][] = 'siswa_nomorijazah';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nomor ijazah : <b>'. trim($sheetData[$i]['E']).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_nomorijazah(trim($sheetData[$i]['E'])).'</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }


                        if (count($this->dataemail_excel(trim($sheetData[$i]['N'])))) {
                            $data['inputerror'][] = 'siswa_email';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data email : <b>'. trim($sheetData[$i]['N']) .'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_email(trim($sheetData[$i]['N'])).'</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                         if (count($this->datatelp_excel(trim($sheetData[$i]['O'])))) {
                            $data['inputerror'][] = 'siswa_handphone';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data notelp : <b>'. trim($sheetData[$i]['O']).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_telp(trim($sheetData[$i]['O'])).'</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }


                        if (trim($sheetData[$i]['K']) !== 'AKTIF' && trim($sheetData[$i]['K']) !== 'ALUMNI' && trim($sheetData[$i]['K']) !== 'PINDAH' && trim($sheetData[$i]['K']) !== 'MENINGGAL' && trim($sheetData[$i]['K']) !== 'KELUAR') {
                            $data['inputerror'][] = 'siswa_status';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>status siswa</b> yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (trim($sheetData[$i]['L']) !== 'LAKI-LAKI' && trim($sheetData[$i]['L']) !== 'L' && trim($sheetData[$i]['L']) !== 'PEREMPUAN' && trim($sheetData[$i]['L']) !== 'P') {
                            $data['inputerror'][] = 'siswa_jeniskelamin';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>jenis kelamin siswa</b> yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (trim($sheetData[$i]['AA']) !== 'Rp 100.000 - Rp 500.000' && trim($sheetData[$i]['AA']) !== 'Rp 500.000 - Rp 1 Juta' && trim($sheetData[$i]['AA']) !== 'Rp 1.5 Juta - Rp 1.5 Juta' && trim($sheetData[$i]['AA']) !== 'Rp 1.5 Juta - Rp 2 Juta' && trim($sheetData[$i]['AA']) !== 'Rp 2 Juta - Rp 3.5 Juta' && trim($sheetData[$i]['AA']) !== 'Rp 3.5 Juta - Rp 5 Juta' && trim($sheetData[$i]['AA']) !== 'Rp 5 Juta Keatas' && trim(trim($sheetData[$i]['AA']) !== '') && trim(trim($sheetData[$i]['AA']) !== NULL) && trim(trim($sheetData[$i]['AA']) !== '-')) {
                            $data['inputerror'][] = 'siswa_penghasilanayah';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>penghasilan ayah</b>, yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                         if (trim($sheetData[$i]['AG']) !== 'Rp 100.000 - Rp 500.000' && trim($sheetData[$i]['AG']) !== 'Rp 500.000 - Rp 1 Juta' && trim($sheetData[$i]['AG']) !== 'Rp 1.5 Juta - Rp 1.5 Juta' && trim($sheetData[$i]['AG']) !== 'Rp 1.5 Juta - Rp 2 Juta' && trim($sheetData[$i]['AG']) !== 'Rp 2 Juta - Rp 3.5 Juta' && trim($sheetData[$i]['AG']) !== 'Rp 3.5 Juta - Rp 5 Juta' && trim($sheetData[$i]['AG']) !== 'Rp 5 Juta Keatas' && trim(trim($sheetData[$i]['AG']) !== '') && trim(trim($sheetData[$i]['AG']) !== NULL) && trim(trim($sheetData[$i]['AG']) !== '-')) {
                            $data['inputerror'][] = 'siswa_penghasilanibu';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>penghasilan ibu</b>, yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (trim($sheetData[$i]['AM']) !== 'Rp 100.000 - Rp 500.000' && trim($sheetData[$i]['AM']) !== 'Rp 500.000 - Rp 1 Juta' && trim($sheetData[$i]['AM']) !== 'Rp 1.5 Juta - Rp 1.5 Juta' && trim($sheetData[$i]['AM']) !== 'Rp 1.5 Juta - Rp 2 Juta' && trim($sheetData[$i]['AM']) !== 'Rp 2 Juta - Rp 3.5 Juta' && trim($sheetData[$i]['AM']) !== 'Rp 3.5 Juta - Rp 5 Juta' && trim($sheetData[$i]['AM']) !== 'Rp 5 Juta Keatas' && trim(trim($sheetData[$i]['AM']) !== '') && trim(trim($sheetData[$i]['AM']) !== NULL) && trim(trim($sheetData[$i]['AM']) !== '-')) {
                            $data['inputerror'][] = 'siswa_penghasilanwali';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>penghasilan wali</b>, yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }


                         if (trim($sheetData[$i]['Z']) !== 'Tidak Sekolah' && trim($sheetData[$i]['Z']) !== 'SD' && trim($sheetData[$i]['Z']) !== 'SMP' && trim($sheetData[$i]['Z']) !== 'SMA' && trim($sheetData[$i]['Z']) !== 'D1' && trim($sheetData[$i]['Z']) !== 'D2' && trim($sheetData[$i]['Z']) !== 'D3' && trim($sheetData[$i]['Z']) !== 'S1' && trim($sheetData[$i]['Z']) !== 'S2' && trim($sheetData[$i]['Z']) !== 'S3' && trim(trim($sheetData[$i]['Z']) !== '') && trim(trim($sheetData[$i]['Z']) !== NULL) && trim(trim($sheetData[$i]['Z']) !== '-')) {
                            $data['inputerror'][] = 'siswa_pendidikanayah';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>pendidikan ayah</b>, yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (trim($sheetData[$i]['AF']) !== 'Tidak Sekolah' && trim($sheetData[$i]['AF']) !== 'SD' && trim($sheetData[$i]['AF']) !== 'SMP' && trim($sheetData[$i]['AF']) !== 'SMA' && trim($sheetData[$i]['AF']) !== 'D1' && trim($sheetData[$i]['AF']) !== 'D2' && trim($sheetData[$i]['AF']) !== 'D3' && trim($sheetData[$i]['AF']) !== 'S1' && trim($sheetData[$i]['AF']) !== 'S2' && trim($sheetData[$i]['AF']) !== 'S3' && trim(trim($sheetData[$i]['AF']) !== '') && trim(trim($sheetData[$i]['AF']) !== NULL) && trim(trim($sheetData[$i]['AF']) !== '-')) {
                            $data['inputerror'][] = 'siswa_pendidikanibu';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>pendidikan ibu</b>, yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }

                        if (trim($sheetData[$i]['AL']) !== 'Tidak Sekolah' && trim($sheetData[$i]['AL']) !== 'SD' && trim($sheetData[$i]['AL']) !== 'SMP' && trim($sheetData[$i]['AL']) !== 'SMA' && trim($sheetData[$i]['AL']) !== 'D1' && trim($sheetData[$i]['AL']) !== 'D2' && trim($sheetData[$i]['AL']) !== 'D3' && trim($sheetData[$i]['AL']) !== 'S1' && trim($sheetData[$i]['AL']) !== 'S2' && trim($sheetData[$i]['AL']) !== 'S3' && trim(trim($sheetData[$i]['AL']) !== '') && trim(trim($sheetData[$i]['AL']) !== NULL) && trim(trim($sheetData[$i]['AL']) !== '-')) {
                            $data['inputerror'][] = 'siswa_pendidikanwali';
                            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data <b>pendidikan wali</b>, yang anda masukkan <b>tidak valid</b>, cek baris excel pada nomor <b>'.$no.'</b>.';
                            $data['status'] = FALSE;
                        }








                   }



                   
                    if($data['status'] === FALSE)
                     {
                     echo json_encode($data);
                    exit();
                    }

                    $fanicode = new ofanienkrip();
                    if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
                     $panjangpassword = 6;
                    } else {
                     $panjangpassword = config_item('erapor_lengthpassword');
                    }

                    
                    $jumlahsiswa3 = intval($this->input->post('jumlah_siswa'));
                    $mulaimasuk3 = 8;
                    $selesaimasuk3 = ($jumlahsiswa3 + $mulaimasuk3)-1;
                    $no = 0;
                      for ($i=$mulaimasuk3; $i <= $selesaimasuk3 ; $i++) { 


                        if (trim($sheetData[$i]['K']) == 'AKTIF' || trim($sheetData[$i]['K']) == 'Aktif') {
                          $datastatussiswa = 1;
                        } elseif (trim($sheetData[$i]['K']) == 'ALUMNI' || trim($sheetData[$i]['K']) == 'Alumni') {
                          $datastatussiswa = 2;
                        } elseif (trim($sheetData[$i]['K']) == 'PINDAH' || trim($sheetData[$i]['K']) == 'Pindah') {
                          $datastatussiswa = 3;
                        } elseif (trim($sheetData[$i]['K']) == 'MENINGGAL' || trim($sheetData[$i]['K']) == 'Meninggal') {
                          $datastatussiswa = 4;
                        } else {
                          $datastatussiswa = 5;
                        }
                        


                        if (trim($sheetData[$i]['L']) == 'PEREMPUAN' || trim($sheetData[$i]['L']) == 'P') {
                          $dataJK = 'P';
                        } elseif (trim($sheetData[$i]['L']) == 'LAKI-LAKI' || trim($sheetData[$i]['L']) == 'L') {
                           $dataJK = 'L';
                        } else {
                          $dataJK = 'P';
                        }

                         if (trim($sheetData[$i]['J']) == '') {
                         $tanggalmasuk = NULL;
                         } else {
                         $tanggalmasuk = trim($sheetData[$i]['J']);
                         }
                         
                         if (trim($sheetData[$i]['T']) == '') {
                         $tanggallahir = NULL;
                         } else {
                         $tanggallahir = trim($sheetData[$i]['T']);
                         }
                        
                        $no++;
                        $data = array(
                          'siswa_nis' => trim($sheetData[$i]['B']),
                          'siswa_nisn' => trim($sheetData[$i]['C']),
                          'siswa_nama' => trim($sheetData[$i]['D']),
                          'siswa_absen' => trim($sheetData[$i]['I']),
                          'siswa_email' => trim($sheetData[$i]['N']),
                          'siswa_kelas' => intval($this->input->post('siswa_cari_kelas')),
                          'siswa_tanggalmasuk' => $tanggalmasuk,
                          'siswa_statuskeluarga' => trim($sheetData[$i]['Q']),
                          'siswa_urutansaudara' => trim($sheetData[$i]['R']),
                          'siswa_tahunijazah' => trim($sheetData[$i]['E']),
                          'siswa_nomorijazah' => trim($sheetData[$i]['F']),
                          'siswa_jeniskelamin' => $dataJK,
                          'siswa_handphone' => trim($sheetData[$i]['O']),
                          'siswa_telprumah' => trim($sheetData[$i]['P']),
                          'siswa_tempatlahir' => trim($sheetData[$i]['S']),
                          'siswa_tanggallahir' => $tanggallahir,
                          'siswa_agama' => trim($sheetData[$i]['M']),
                          'siswa_hobi' => trim($sheetData[$i]['V']),
                          'siswa_asalsekolah' => trim($sheetData[$i]['U']),
                          'siswa_alamat' => trim($sheetData[$i]['W']),
                          
                          'siswa_namaayah' => trim($sheetData[$i]['X']),
                          'siswa_pekerjaanayah' => trim($sheetData[$i]['Y']),
                          'siswa_pendidikanayah' => trim($sheetData[$i]['Z']),
                          'siswa_penghasilanayah' => trim($sheetData[$i]['AA']),
                          'siswa_notelpayah' => trim($sheetData[$i]['AB']),
                          'siswa_alamatayah' => trim($sheetData[$i]['AC']),
                          
                          'siswa_namaibu' => trim($sheetData[$i]['AD']),
                          'siswa_pekerjaanibu' => trim($sheetData[$i]['AE']),
                          'siswa_pendidikanibu' => trim($sheetData[$i]['AF']),
                          'siswa_penghasilanibu' => trim($sheetData[$i]['AG']),
                          'siswa_notelpibu' => trim($sheetData[$i]['AH']),
                          'siswa_alamatibu' => trim($sheetData[$i]['AI']),
                          
                          'siswa_namawali' => trim($sheetData[$i]['AJ']),
                          'siswa_pekerjaanwali' => trim($sheetData[$i]['AK']),
                          'siswa_pendidikanwali' => trim($sheetData[$i]['AL']),
                          'siswa_penghasilanwali' => trim($sheetData[$i]['AM']),
                          'siswa_notelpwali' => trim($sheetData[$i]['AN']),
                          'siswa_alamatwali' => trim($sheetData[$i]['AO']),

                          'siswa_status' => $datastatussiswa,

                         'siswa_created' => $this->tanggal->time_now(),
                         'siswa_modified' => $this->tanggal->time_now()
                          
                      );
                        
                      $passwordgeneratekuat = $this->generateStrongPassword($panjangpassword);
                      $data_password = hash('sha512', $passwordgeneratekuat  . config_item('encryption_key'));
                      $data_token    = $fanicode->encode($passwordgeneratekuat, config_item('erapor_tokenkey'));
                    
                       $datauser = array(
                          'user_login' => trim($sheetData[$i]['B']),
                          'user_password' => $data_password,
                          'user_token' => $data_token,
                          'user_level' => 1,
                          'user_status' => 1,
                         
                          
                      );

                      $this->siswa_m->save($data);
                      $this->password_siswa_m->save($datauser);


                    }



                    //$datakelas = ($this->hitungkelas($this->input->post('nilai_cari_kelas')) + 12);
                    //for($x=13; $x <= $datakelas; $x++)
                    //{
                  
                    //$data['data_nis'][] =  trim($sheetData[$x]['B']);
                    //$data['data_nilai'][] = trim($sheetData[$x]['F']);
                    //}

                    //delete_files($upload_data['file_path']);


                    
                    $data['inputerror'][] = 'upload_error';
                    $data['error_string'][] = 'sukses';
                    $data['jumlah_data'] = $no;
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

      private function get_datakelas($kelas) {
        $query = $this->db->query('SELECT kelas_nama, kelas_tahun, kelas_kk FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($kelas).'"' );
        
        if ($query->num_rows() > 0) return $query->result();              
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


     public function cari_kelas( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_saring($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->kelas_code."'>".$row->kelas_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

     public function cari_kelas_aktif( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_aktif_saring($id);
        if(!empty($data)){
            $tmp .= "<option value=''></option>";
            
            foreach($data as $row) {
                $tmp .= "<option value='".$row->kelas_code."'>".$row->kelas_nama."</option>";
            }
        } else {
            $tmp .= "<option value=''></option>";
            
        }
        die($tmp);

     }

      public function cari_kelas_modal( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_modal_2($id);
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

     public function cari_kelas_nama( $id = NULL) {

      $tmp  = '';
        $data   = $this->siswa_m->get_data_kelas_nama_2($id);
        if(!empty($data)){
           
            foreach($data as $row) {
                $tmp .= $row->kelas_nama;
            }
        } else {
            $tmp .= "EMPTY";
            
        }
        die($tmp);

     }

    public function tambahsiswa() {
        

        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        //Load Data View Data Tambah Siswa
        $this->data['subview'] = 'admin/datasiswa/tambahsiswa';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function tambahsiswakelas() {
        
        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();


        //Load Data View Data Tambah Siswa Kelas
        $this->data['subview'] = 'admin/datasiswa/tambahsiswakelas';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function ajax_list_siswa_aktif()
    {
        $list = $this->siswa_m->get_datatables_siswa_aktif();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            
            if ($siswa->siswa_status == 1) {
                $status = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif</span>';
            } elseif ($siswa->siswa_status == 2) {
                $status = '<span class="label label-primary">Alumni</span>';
            } elseif ($siswa->siswa_status == 3) {
                $status = '<span class="label label-info">Pindah</span>';
            } elseif ($siswa->siswa_status == 4) {
                $status = '<span class="label label-success">ALM</span>';
            } else {
                $status = '<span class="label label-danger"> Keluar</span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$siswa->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span>';
            $row[] = $siswa->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .'-'. $siswa->kelas_kk.'">'. $siswa->kelas_nama.'</span>';
            //$row[] =  $siswa->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $siswa->siswa_absen. '</span>';
            $row[] =  $siswa->kelas_tahun;
            $row[] =  $status;
           
            //$row[] = $siswa->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$siswa->siswa_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_data('."'".$siswa->siswa_nis."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a> 
                  <a href="javascript:void()" onclick="lihat_data_siswa('."'".$siswa->siswa_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->siswa_m->count_all_siswa_aktif(),
                        "recordsFiltered" => $this->siswa_m->count_filtered_siswa_aktif(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }


    public function ajax_list_siswa_tidak_aktif()
    {
        $list = $this->siswa_m->get_datatables_siswa_tidak_aktif();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $siswa) {
            $no++;
            
            if ($siswa->siswa_status == 1) {
                $status = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif</span>';
            } elseif ($siswa->siswa_status == 2) {
                $status = '<span class="label label-primary">Alumni</span>';
            } elseif ($siswa->siswa_status == 3) {
                $status = '<span class="label label-info">Pindah</span>';
            } elseif ($siswa->siswa_status == 4) {
                $status = '<span class="label label-success">ALM</span>';
            } else {
                $status = '<span class="label label-danger"> Keluar</span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$siswa->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$siswa->siswa_nis.'</span>';
            $row[] = $siswa->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$siswa->siswa_kelas .'-'. $siswa->kelas_kk.'">'. $siswa->kelas_nama.'</span>';
            //$row[] =  $siswa->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $siswa->siswa_absen. '</span>';
            $row[] =  $siswa->kelas_tahun;
            $row[] =  $status;
           
            //$row[] = $siswa->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$siswa->siswa_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_data('."'".$siswa->siswa_nis."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a> 
                  <a href="javascript:void()" onclick="lihat_data_siswa('."'".$siswa->siswa_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->siswa_m->count_all_siswa_tidak_aktif(),
                        "recordsFiltered" => $this->siswa_m->count_filtered_siswa_tidak_aktif(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    public function ajax_update_siswa()
    {
        
       $this->_validate();
        $config['upload_path']          = $this->real_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = true;
       
        $this->load->library('upload', $config);
 
        
        if ($this->upload->do_upload("image"))
        {
            $source = $this->real_path."/".$this->upload->data('file_name');
            $thum_des = "./raport_files/foto/siswa/thumbnail/";
            $chat_des = "./raport_files/foto/chat/";
            $real_des = "./raport_files/foto/siswa/full/"; 

            $thum_h = 333;
            $thum_w = 333;

            $chat_h = 50;
            $chat_w = 50;


            $this->image_moo

             //Real Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 4 Klaten", $font, 18, "#CC6100")
                    //->watermark(5,8)
                    //->round(10)
                    ->save($real_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Thumbnail Image
                    ->load($source)
                    //->make_watermark_text("BKK SMK N 4 Klaten", $font, 18, "#CC6100")
                    //->stretch($thum_w,$thum_h)
                    ->set_background_colour("#FFFFFF")
                    ->resize($thum_w,$thum_h,TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($thum_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Chat Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 4 Klaten", $font, 18, "#CC6100")
                    ->set_background_colour("#FFFFFF")
                    ->resize($chat_w,$chat_h, TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


             } else {
                  if ($this->input->post('siswa_tanggallahir') == '') {
                    $datatanggal = NULL;
                } else {
                    $datatanggal = htmlspecialchars($this->input->post('siswa_tanggallahir'));
                }

                 if ($this->input->post('siswa_tanggalmasuk') == '') {
                    $datatanggalmasuk = NULL;
                } else {
                    $datatanggalmasuk = htmlspecialchars($this->input->post('siswa_tanggalmasuk'));
                }


                $data = array(
                'siswa_nis' => htmlspecialchars($this->input->post('siswa_nis')),
               'siswa_nama' => htmlspecialchars(strtoupper($this->input->post('siswa_nama'))),
               'siswa_nisn' => htmlspecialchars($this->input->post('siswa_nisn')),
               'siswa_email' => htmlspecialchars($this->input->post('siswa_email')),
               'siswa_agama' => htmlspecialchars($this->input->post('siswa_agama')),
               'siswa_handphone' => htmlspecialchars($this->input->post('siswa_handphone')),
               'siswa_jeniskelamin' => htmlspecialchars($this->input->post('siswa_jeniskelamin')),
               'siswa_tempatlahir' => htmlspecialchars($this->input->post('siswa_tempatlahir')),
               'siswa_tanggallahir' => $datatanggal,

               'siswa_tanggalmasuk' => $datatanggalmasuk,
               'siswa_nomorijazah' => htmlspecialchars($this->input->post('siswa_nomorijazah')),
               'siswa_tahunijazah' => htmlspecialchars($this->input->post('siswa_tahunijazah')),
               'siswa_statuskeluarga' => htmlspecialchars($this->input->post('siswa_statuskeluarga')),
               'siswa_urutansaudara' => htmlspecialchars($this->input->post('siswa_urutansaudara')),
               'siswa_telprumah' => htmlspecialchars($this->input->post('siswa_telprumah')),

               'siswa_asalsekolah' => htmlspecialchars($this->input->post('siswa_asalsekolah')),
               'siswa_hobi' => htmlspecialchars($this->input->post('siswa_hobi')),
               'siswa_alamat' => htmlspecialchars($this->input->post('siswa_alamat')),
               'siswa_namaayah' => htmlspecialchars($this->input->post('siswa_namaayah')),
               'siswa_pekerjaanayah' => htmlspecialchars($this->input->post('siswa_pekerjaanayah')),
               'siswa_pendidikanayah' => htmlspecialchars($this->input->post('siswa_pendidikanayah')),
               'siswa_penghasilanayah' => htmlspecialchars($this->input->post('siswa_penghasilanayah')),
               'siswa_notelpayah' => htmlspecialchars($this->input->post('siswa_notelpayah')),
               'siswa_alamatayah' => htmlspecialchars($this->input->post('siswa_alamatayah')),
               'siswa_namaibu' => htmlspecialchars($this->input->post('siswa_namaibu')),
               'siswa_pekerjaanibu' => htmlspecialchars($this->input->post('siswa_pekerjaanibu')),
               'siswa_pendidikanibu' => htmlspecialchars($this->input->post('siswa_pendidikanibu')),
               'siswa_penghasilanibu' => htmlspecialchars($this->input->post('siswa_penghasilanibu')),
               'siswa_notelpibu' => htmlspecialchars($this->input->post('siswa_notelpibu')),
               'siswa_alamatibu' => htmlspecialchars($this->input->post('siswa_alamatibu')),
               'siswa_namawali' => htmlspecialchars($this->input->post('siswa_namawali')),
               'siswa_pekerjaanwali' => htmlspecialchars($this->input->post('siswa_pekerjaanwali')),
               'siswa_pendidikanwali' => htmlspecialchars($this->input->post('siswa_pendidikanwali')),
               'siswa_penghasilanwali' => htmlspecialchars($this->input->post('siswa_penghasilanwali')),
               'siswa_notelpwali' => htmlspecialchars($this->input->post('siswa_notelpwali')),
               'siswa_alamatwali' => htmlspecialchars($this->input->post('siswa_alamatwali')),
               'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas')),
               'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen')),
               'siswa_status' => htmlspecialchars($this->input->post('siswa_status')),
               'siswa_modified' => $this->tanggal->time_now()


               
                
            );

            $datalogin = array(
                'user_login' => htmlspecialchars($this->input->post('siswa_nis')),
               
                
            );
             $this->password_siswa_m->update(array('user_login' => $this->input->post('siswa_nis2')), $datalogin);
            $this->siswa_m->update(array('siswa_id' => $this->input->post('siswa_id')), $data);

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = TRUE;
                  echo json_encode($data);
                 exit();
               
             }

                $datafile = $this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name');
                  if ($this->input->post('siswa_tanggallahir') == '') {
                    $datatanggal = NULL;
                } else {
                    $datatanggal = htmlspecialchars($this->input->post('siswa_tanggallahir'));
                }

                 if ($this->input->post('siswa_tanggalmasuk') == '') {
                    $datatanggalmasuk = NULL;
                } else {
                    $datatanggalmasuk = htmlspecialchars($this->input->post('siswa_tanggalmasuk'));
                }


                $data = array(
                'siswa_nis' => htmlspecialchars($this->input->post('siswa_nis')),
               'siswa_nama' => htmlspecialchars(strtoupper($this->input->post('siswa_nama'))),
               'siswa_nisn' => htmlspecialchars($this->input->post('siswa_nisn')),
               'siswa_email' => htmlspecialchars($this->input->post('siswa_email')),
               'siswa_agama' => htmlspecialchars($this->input->post('siswa_agama')),
               'siswa_handphone' => htmlspecialchars($this->input->post('siswa_handphone')),
               'siswa_jeniskelamin' => htmlspecialchars($this->input->post('siswa_jeniskelamin')),
               'siswa_tempatlahir' => htmlspecialchars($this->input->post('siswa_tempatlahir')),
               'siswa_tanggallahir' => $datatanggal,

               'siswa_tanggalmasuk' => $datatanggalmasuk,
               'siswa_nomorijazah' => htmlspecialchars($this->input->post('siswa_nomorijazah')),
               'siswa_tahunijazah' => htmlspecialchars($this->input->post('siswa_tahunijazah')),
               'siswa_statuskeluarga' => htmlspecialchars($this->input->post('siswa_statuskeluarga')),
               'siswa_urutansaudara' => htmlspecialchars($this->input->post('siswa_urutansaudara')),
               'siswa_telprumah' => htmlspecialchars($this->input->post('siswa_telprumah')),

               'siswa_asalsekolah' => htmlspecialchars($this->input->post('siswa_asalsekolah')),
               'siswa_hobi' => htmlspecialchars($this->input->post('siswa_hobi')),
               'siswa_alamat' => htmlspecialchars($this->input->post('siswa_alamat')),
               'siswa_namaayah' => htmlspecialchars($this->input->post('siswa_namaayah')),
               'siswa_pekerjaanayah' => htmlspecialchars($this->input->post('siswa_pekerjaanayah')),
               'siswa_pendidikanayah' => htmlspecialchars($this->input->post('siswa_pendidikanayah')),
               'siswa_penghasilanayah' => htmlspecialchars($this->input->post('siswa_penghasilanayah')),
               'siswa_notelpayah' => htmlspecialchars($this->input->post('siswa_notelpayah')),
               'siswa_alamatayah' => htmlspecialchars($this->input->post('siswa_alamatayah')),
               'siswa_namaibu' => htmlspecialchars($this->input->post('siswa_namaibu')),
               'siswa_pekerjaanibu' => htmlspecialchars($this->input->post('siswa_pekerjaanibu')),
               'siswa_pendidikanibu' => htmlspecialchars($this->input->post('siswa_pendidikanibu')),
               'siswa_penghasilanibu' => htmlspecialchars($this->input->post('siswa_penghasilanibu')),
               'siswa_notelpibu' => htmlspecialchars($this->input->post('siswa_notelpibu')),
               'siswa_alamatibu' => htmlspecialchars($this->input->post('siswa_alamatibu')),
               'siswa_namawali' => htmlspecialchars($this->input->post('siswa_namawali')),
               'siswa_pekerjaanwali' => htmlspecialchars($this->input->post('siswa_pekerjaanwali')),
               'siswa_pendidikanwali' => htmlspecialchars($this->input->post('siswa_pendidikanwali')),
               'siswa_penghasilanwali' => htmlspecialchars($this->input->post('siswa_penghasilanwali')),
               'siswa_notelpwali' => htmlspecialchars($this->input->post('siswa_notelpwali')),
               'siswa_alamatwali' => htmlspecialchars($this->input->post('siswa_alamatwali')),
               'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas')),
               'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen')),
               'siswa_status' => htmlspecialchars($this->input->post('siswa_status')),
               'siswa_foto' => $datafile,
               'siswa_modified' => $this->tanggal->time_now()

                
            );
            $datalogin = array(
                 'user_login' => htmlspecialchars($this->input->post('siswa_nis')),
               
                
            );
             $this->password_siswa_m->update(array('user_login' => $this->input->post('siswa_nis2')), $datalogin);
            $this->siswa_m->update(array('siswa_id' => $this->input->post('siswa_id')), $data);


        $data = array();
        $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = 'sukses';
                 $data['status'] = TRUE;
        echo json_encode($data);
    }


    public function ajax_save_siswa()
    {
        
       $this->_validate_save();
        $config['upload_path']          = $this->real_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = true;
       
        $this->load->library('upload', $config);
 
        
        if ($this->upload->do_upload("image"))
        {
            $source = $this->real_path."/".$this->upload->data('file_name');
            $thum_des = "./raport_files/foto/siswa/thumbnail/";
            $chat_des = "./raport_files/foto/chat/";
            $real_des = "./raport_files/foto/siswa/full/"; 

            $thum_h = 333;
            $thum_w = 333;

            $chat_h = 50;
            $chat_w = 50;


            $this->image_moo

             //Real Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 4 Klaten", $font, 18, "#CC6100")
                    //->watermark(5,8)
                    //->round(10)
                    ->save($real_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Thumbnail Image
                    ->load($source)
                    //->make_watermark_text("BKK SMK N 4 Klaten", $font, 18, "#CC6100")
                    //->stretch($thum_w,$thum_h)
                    ->set_background_colour("#FFFFFF")
                    ->resize($thum_w,$thum_h,TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($thum_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Chat Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 4 Klaten", $font, 18, "#CC6100")
                    ->set_background_colour("#FFFFFF")
                    ->resize($chat_w,$chat_h, TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


             } else {

                if ($this->input->post('siswa_tanggallahir') == '') {
                    $datatanggal = NULL;
                } else {
                    $datatanggal = htmlspecialchars($this->input->post('siswa_tanggallahir'));
                }

                if ($this->input->post('siswa_tanggalmasuk') == '') {
                    $datatanggalmasuk = NULL;
                } else {
                    $datatanggalmasuk = htmlspecialchars($this->input->post('siswa_tanggalmasuk'));
                }
                
                
                $data = array(
                'siswa_nis' => htmlspecialchars($this->input->post('siswa_nis')),
               'siswa_nama' => htmlspecialchars(strtoupper($this->input->post('siswa_nama'))),
               'siswa_nisn' => htmlspecialchars($this->input->post('siswa_nisn')),
               'siswa_email' => htmlspecialchars($this->input->post('siswa_email')),
               'siswa_agama' => htmlspecialchars($this->input->post('siswa_agama')),
               'siswa_handphone' => htmlspecialchars($this->input->post('siswa_handphone')),
               'siswa_jeniskelamin' => htmlspecialchars($this->input->post('siswa_jeniskelamin')),
               'siswa_tempatlahir' => htmlspecialchars($this->input->post('siswa_tempatlahir')),
               'siswa_tanggallahir' => $datatanggal,

               'siswa_tanggalmasuk' => $datatanggalmasuk,
               'siswa_nomorijazah' => htmlspecialchars($this->input->post('siswa_nomorijazah')),
               'siswa_tahunijazah' => htmlspecialchars($this->input->post('siswa_tahunijazah')),
               'siswa_statuskeluarga' => htmlspecialchars($this->input->post('siswa_statuskeluarga')),
               'siswa_urutansaudara' => htmlspecialchars($this->input->post('siswa_urutansaudara')),
               'siswa_telprumah' => htmlspecialchars($this->input->post('siswa_telprumah')),

               'siswa_asalsekolah' => htmlspecialchars($this->input->post('siswa_asalsekolah')),
               'siswa_hobi' => htmlspecialchars($this->input->post('siswa_hobi')),
               'siswa_alamat' => htmlspecialchars($this->input->post('siswa_alamat')),
               'siswa_namaayah' => htmlspecialchars($this->input->post('siswa_namaayah')),
               'siswa_pekerjaanayah' => htmlspecialchars($this->input->post('siswa_pekerjaanayah')),
               'siswa_pendidikanayah' => htmlspecialchars($this->input->post('siswa_pendidikanayah')),
               'siswa_penghasilanayah' => htmlspecialchars($this->input->post('siswa_penghasilanayah')),
               'siswa_notelpayah' => htmlspecialchars($this->input->post('siswa_notelpayah')),
               'siswa_alamatayah' => htmlspecialchars($this->input->post('siswa_alamatayah')),
               'siswa_namaibu' => htmlspecialchars($this->input->post('siswa_namaibu')),
               'siswa_pekerjaanibu' => htmlspecialchars($this->input->post('siswa_pekerjaanibu')),
               'siswa_pendidikanibu' => htmlspecialchars($this->input->post('siswa_pendidikanibu')),
               'siswa_penghasilanibu' => htmlspecialchars($this->input->post('siswa_penghasilanibu')),
               'siswa_notelpibu' => htmlspecialchars($this->input->post('siswa_notelpibu')),
               'siswa_alamatibu' => htmlspecialchars($this->input->post('siswa_alamatibu')),
               'siswa_namawali' => htmlspecialchars($this->input->post('siswa_namawali')),
               'siswa_pekerjaanwali' => htmlspecialchars($this->input->post('siswa_pekerjaanwali')),
               'siswa_pendidikanwali' => htmlspecialchars($this->input->post('siswa_pendidikanwali')),
               'siswa_penghasilanwali' => htmlspecialchars($this->input->post('siswa_penghasilanwali')),
               'siswa_notelpwali' => htmlspecialchars($this->input->post('siswa_notelpwali')),
               'siswa_alamatwali' => htmlspecialchars($this->input->post('siswa_alamatwali')),
               'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas')),
               'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen')),
               'siswa_status' => htmlspecialchars($this->input->post('siswa_status')),
                'siswa_created' => $this->tanggal->time_now(),
               'siswa_modified' => $this->tanggal->time_now()


               
                
            );
            $fanicode = new ofanienkrip();

            $data_password = hash('sha512', $this->input->post('user_password')  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($this->input->post('user_password'), config_item('erapor_tokenkey'));
            $datauser = array(
                'user_login' => htmlspecialchars($this->input->post('siswa_nis')),
                'user_password' => $data_password,
                'user_token' => $data_token,
                'user_level' => 1,
                'user_status' => 1,
               
                
            );
            $this->siswa_m->save($data);
            $this->password_siswa_m->save($datauser);

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = TRUE;
                  echo json_encode($data);
                 exit();
               
             }

                $datafile = $this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name');
                 

                 if ($this->input->post('siswa_tanggallahir') == '') {
                    $datatanggal = NULL;
                } else {
                    $datatanggal = htmlspecialchars($this->input->post('siswa_tanggallahir'));
                }

                 if ($this->input->post('siswa_tanggalmasuk') == '') {
                    $datatanggalmasuk = NULL;
                } else {
                    $datatanggalmasuk = htmlspecialchars($this->input->post('siswa_tanggalmasuk'));
                }

                $data = array(
                'siswa_nis' => $this->input->post('siswa_nis'),
               'siswa_nama' => htmlspecialchars(strtoupper($this->input->post('siswa_nama'))),
               'siswa_nisn' => htmlspecialchars($this->input->post('siswa_nisn')),
               'siswa_email' => htmlspecialchars($this->input->post('siswa_email')),
               'siswa_agama' => htmlspecialchars($this->input->post('siswa_agama')),
               'siswa_handphone' => htmlspecialchars($this->input->post('siswa_handphone')),
               'siswa_jeniskelamin' => htmlspecialchars($this->input->post('siswa_jeniskelamin')),
               'siswa_tempatlahir' => htmlspecialchars($this->input->post('siswa_tempatlahir')),
               'siswa_tanggallahir' => $datatanggal,

               'siswa_tanggalmasuk' => $datatanggalmasuk,
               'siswa_nomorijazah' => htmlspecialchars($this->input->post('siswa_nomorijazah')),
               'siswa_tahunijazah' => htmlspecialchars($this->input->post('siswa_tahunijazah')),
               'siswa_statuskeluarga' => htmlspecialchars($this->input->post('siswa_statuskeluarga')),
               'siswa_urutansaudara' => htmlspecialchars($this->input->post('siswa_urutansaudara')),
               'siswa_telprumah' => htmlspecialchars($this->input->post('siswa_telprumah')),

               'siswa_asalsekolah' => htmlspecialchars($this->input->post('siswa_asalsekolah')),
               'siswa_hobi' => htmlspecialchars($this->input->post('siswa_hobi')),
               'siswa_alamat' => htmlspecialchars($this->input->post('siswa_alamat')),
               'siswa_namaayah' => htmlspecialchars($this->input->post('siswa_namaayah')),
               'siswa_pekerjaanayah' => htmlspecialchars($this->input->post('siswa_pekerjaanayah')),
               'siswa_pendidikanayah' => htmlspecialchars($this->input->post('siswa_pendidikanayah')),
               'siswa_penghasilanayah' => htmlspecialchars($this->input->post('siswa_penghasilanayah')),
               'siswa_notelpayah' => htmlspecialchars($this->input->post('siswa_notelpayah')),
               'siswa_alamatayah' => htmlspecialchars($this->input->post('siswa_alamatayah')),
               'siswa_namaibu' => htmlspecialchars($this->input->post('siswa_namaibu')),
               'siswa_pekerjaanibu' => htmlspecialchars($this->input->post('siswa_pekerjaanibu')),
               'siswa_pendidikanibu' => htmlspecialchars($this->input->post('siswa_pendidikanibu')),
               'siswa_penghasilanibu' => htmlspecialchars($this->input->post('siswa_penghasilanibu')),
               'siswa_notelpibu' => htmlspecialchars($this->input->post('siswa_notelpibu')),
               'siswa_alamatibu' => htmlspecialchars($this->input->post('siswa_alamatibu')),
               'siswa_namawali' => htmlspecialchars($this->input->post('siswa_namawali')),
               'siswa_pekerjaanwali' => htmlspecialchars($this->input->post('siswa_pekerjaanwali')),
               'siswa_pendidikanwali' => htmlspecialchars($this->input->post('siswa_pendidikanwali')),
               'siswa_penghasilanwali' => htmlspecialchars($this->input->post('siswa_penghasilanwali')),
               'siswa_notelpwali' => htmlspecialchars($this->input->post('siswa_notelpwali')),
               'siswa_alamatwali' => htmlspecialchars($this->input->post('siswa_alamatwali')),
               'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas')),
               'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen')),
               'siswa_status' => htmlspecialchars($this->input->post('siswa_status')),
               'siswa_foto' => $datafile,
               'siswa_created' => $this->tanggal->time_now(),
               'siswa_modified' => $this->tanggal->time_now()

                
            );

            $fanicode = new ofanienkrip();

            $data_password = hash('sha512', $this->input->post('user_password')  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($this->input->post('user_password'), config_item('erapor_tokenkey'));
            $datauser = array(
                'user_login' => htmlspecialchars($this->input->post('siswa_nis')),
                'user_password' => $data_password,
                'user_token' => $data_token,
                'user_level' => 1,
                'user_status' => 1,
               
                
            );
            $this->siswa_m->save($data);
            $this->password_siswa_m->save($datauser);

        $data = array();
        $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = 'sukses';
                 $data['status'] = TRUE;
        echo json_encode($data);
    }

     public function ajax_delete($id)
    {
        $this->siswa_m->hapus_data_siswa($id);
        $this->password_siswa_m->hapus_data_siswa($id);
        echo json_encode(array("status" => TRUE));
    }

    function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->siswa_m->hapus_data_siswa_multiple($ids);  
    }

    function ajax_multiple_save(){
         $ids = (explode( ',', $this->input->get_post('data_masuk') ));
         $fanicode = new ofanienkrip();

        if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
         $panjangpassword = 6;
        } else {
         $panjangpassword = config_item('erapor_lengthpassword');
        }
        $this->_validate_datamasuk();
        $this->_validate_mutilsave($ids);
        $count = 0;

        foreach ($ids as $id){
           $did = intval($id);
          
             $did = intval($id);
             $data = array(
                'siswa_nis' => htmlspecialchars($this->input->post('siswa_nis['.$did.']')),
               'siswa_nama' => htmlspecialchars(strtoupper($this->input->post('siswa_nama['.$did.']'))),
               'siswa_jeniskelamin' => htmlspecialchars($this->input->post('siswa_jeniskelamin['.$did.']')),
               'siswa_tanggallahir' => NULL,
               'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas['.$did.']')),
               'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen['.$did.']')),
               'siswa_status' => 1,
                'siswa_created' => $this->tanggal->time_now(),
               'siswa_modified' => $this->tanggal->time_now()
                
            );
            $passwordgeneratekuat = $this->generateStrongPassword($panjangpassword);
            $data_password = hash('sha512', $passwordgeneratekuat  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($passwordgeneratekuat, config_item('erapor_tokenkey'));
          
             $datauser = array(
                'user_login' => htmlspecialchars($this->input->post('siswa_nis['.$did.']')),
                'user_password' => $data_password,
                'user_token' => $data_token,
                'user_level' => 1,
                'user_status' => 1,
               
                
            );
            $this->siswa_m->save($data);
            $this->password_siswa_m->save($datauser);

             $count = $count+1;
       }
        $data2['sukses_string'] = '<i class="fa fa-fa-check "></i> <strong>Successfully :</strong> Data sebanyak <b>'.$count.' siswa </b>berhasil ditambahkan pada kelas : <b>'. $this->get_kelas($this->input->post('siswa_kelas['.$did.']')) .'</b>, pada angkatan tahun : <b>'.$this->get_tahunkelas($this->input->post('siswa_kelas['.$did.']')).' </b>.'; 
        $data2['status'] = TRUE;
        echo json_encode($data2);
        
    }


     function ajax_multiple_status() {
         $ids = (explode( ',', $this->input->get_post('data_status') ));
        $this->_validate_datamasuk_status();
        $this->_validate_update_status();
        $count = 0;
        foreach ($ids as $id){
           $did = $id;

           
             
             $data = array(
                
                'siswa_status' => htmlspecialchars($this->input->post('siswa_status2')),
               
                
            );
             $this->siswa_m->update(array('siswa_nis' => $did), $data);
           
             $count = $count+1;
       }

       if ($this->input->post('siswa_status2') == 1) {
         $statusupgrade = 'Aktif';
       } elseif ($this->input->post('siswa_status2') == 2) {
         $statusupgrade = 'Alumni';
       } elseif ($this->input->post('siswa_status2') == 3) {
         $statusupgrade = 'Pindah';
       } elseif ($this->input->post('siswa_status2') == 4) {
         $statusupgrade = 'Meninggal';
       } elseif ($this->input->post('siswa_status2') == 5) {
         $statusupgrade = 'Keluar';
       } else {
         $statusupgrade = 'Aktif';
       }
       
        $data2['sukses_string'] = '<i class="fa fa-fa-check "></i>Sebanyak <b>'.$count.' siswa</b> berhasil diupdate, dengan status data : <b>'. $statusupgrade .'</b>'; 
        $data2['status'] = TRUE;
        echo json_encode($data2);
        
    }



    private function get_namasiswa($id, $id2) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_absen="'.$this->db->escape_str($id).'" and siswa_kelas="'.$this->db->escape_str($id2).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

    private function get_namasiswa2($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

    private function get_namasiswa_nisn($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nisn="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

    private function get_namasiswa_nomorijazah($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nomorijazah="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

    private function get_namasiswa_email($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_email="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

    private function get_namasiswa_telp($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_handphone="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

     private function get_kelas($id) {
        $query = $this->db->query('SELECT kelas_nama FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
           
        }

        return $row->kelas_nama;

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

    



    private function get_siswa_id($id) {
        $query = $this->db->query('SELECT siswa_id FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_id;
           
        }

         if ($query->num_rows() > 0) {

            return $row->siswa_id;
        } else {

            return 'gh9K*fCsZa2@hBc&hjasLKVfVBNa*%%6p*e80f325f0960f7cfc2407f9f50c872b5817930f2045ed980628a6c613ab2ae97313c7268cafc92169774389221d1f36370c665acac2203fb8fed3b086097128d';
        }

        

    }

     private function get_siswa_nis($id) {
        $query = $this->db->query('SELECT siswa_nis FROM raport_siswa WHERE siswa_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nis;
           
        }

         if ($query->num_rows() > 0) {

            return $row->siswa_nis;
        } else {

            return 'gh9K*fCsZa2@hBc&hjasLKVfVBNa*%%6p*e80f325f0960f7cfc2407f9f50c872b5817930f2045ed980628a6c613ab2ae97313c7268cafc92169774389221d1f36370c665acac2203fb8fed3b086097128d';
        }

        

    }

     private function get_datauser($id) {
        $querysiswa = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');
        $queryguru = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

       
      
        $cekdata = $querysiswa->num_rows();
       

        if ($querysiswa->num_rows() > 0)
        {

            $row = $querysiswa->row();
            
       
            $row->siswa_nama;
            
        } else {

            $row = $queryguru->row();
            
       
            $row->guru_nama;
        }

        if ($querysiswa->num_rows() > 0) {
            return $row->siswa_nama . ' (user siswa)';
             } else {
            return $row->guru_nama. ' (user guru)';
            }
        
    }


    private function dataabsen()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_kelas', $this->input->post('siswa_kelas'));
        $this->db->where('siswa_absen', $this->input->post('siswa_absen'));
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

     private function dataabsen_excel($datakelas, $dataabsen)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_kelas', $datakelas);
        $this->db->where('siswa_absen', $dataabsen);
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

     private function datanomorijazah()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nomorijazah', $this->input->post('siswa_nomorijazah'));
        !$id || $this->db->where('siswa_id !=', $id);
        $this->db->where('siswa_nomorijazah !=', '');  
        $this->db->where('siswa_nomorijazah !=', '-');
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }


     private function datanomorijazah_excel($data)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nomorijazah', $data);
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }


    private function dataabsen_multi($did)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_kelas', $this->input->post('siswa_kelas['.$did.']'));
        $this->db->where('siswa_absen', $this->input->post('siswa_absen['.$did.']'));
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }



    private function datanis()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nis', $this->input->post('siswa_nis'));
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

    private function datanis_excel($data)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nis', $data);
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }


    private function datanis_multi($did)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nis', $this->input->post('siswa_nis['.$did.']'));
        !$id || $this->db->where('siswa_id !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

    private function datanisn()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nisn', $this->input->post('siswa_nisn'));
        !$id || $this->db->where('siswa_id !=', $id);
         $this->db->where('siswa_nisn !=', '');
         $this->db->where('siswa_nisn !=', '-');
         $this->db->where('siswa_nisn !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

    private function datanisn_excel($data)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_nisn', $data);
        !$id || $this->db->where('siswa_id !=', $id);
         $this->db->where('siswa_nisn !=', '');
         $this->db->where('siswa_nisn !=', '-');
         $this->db->where('siswa_nisn !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

    private function dataemail()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_email', $this->input->post('siswa_email'));
        !$id || $this->db->where('siswa_id !=', $id);
        $this->db->where('siswa_email !=', '');
         $this->db->where('siswa_email !=', '-');
         $this->db->where('siswa_email !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

     private function dataemail_excel($data)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_email', $data);
        !$id || $this->db->where('siswa_id !=', $id);
        $this->db->where('siswa_email !=', '');
         $this->db->where('siswa_email !=', '-');
         $this->db->where('siswa_email !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

    private function datatelp()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_handphone', $this->input->post('siswa_handphone'));
        !$id || $this->db->where('siswa_id !=', $id);
        $this->db->where('siswa_handphone !=', '');
         $this->db->where('siswa_handphone !=', '-');
         $this->db->where('siswa_handphone !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

     private function datatelp_excel($data)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('siswa_id');
        $this->db->where('siswa_handphone', $data);
        !$id || $this->db->where('siswa_id !=', $id);
        $this->db->where('siswa_handphone !=', '');
         $this->db->where('siswa_handphone !=', '-');
         $this->db->where('siswa_handphone !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }



    private function datauser()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("SELECT * from (SELECT `siswa_id` siswa_id2, `user_login` user_login2 FROM `raport_siswa` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_siswa`.`siswa_nis` UNION ALL SELECT `guru_id` siswa_id2, `user_login` user_login2 FROM `raport_guru` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_guru`.`guru_kode`) as google WHERE `user_login2` = '".$this->db->escape_str($this->input->post('siswa_nis'))."' AND `siswa_id2` !='".$this->db->escape_str($this->input->post('siswa_id'))."'");
        //$query = $this->db->get();
        
        return $query->row();
    }



  private function datauser_multi($did)
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("SELECT * from (SELECT `siswa_id` siswa_id2, `user_login` user_login2 FROM `raport_siswa` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_siswa`.`siswa_nis` UNION ALL SELECT `guru_id` siswa_id2, `user_login` user_login2 FROM `raport_guru` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_guru`.`guru_kode`) as google WHERE `user_login2` = '".$this->db->escape_str($this->input->post('siswa_nis['.$did.']'))."' AND `siswa_id2` !='".$this->db->escape_str($this->input->post('siswa_id['.$did.']'))."'");
        //$query = $this->db->get();
        
        return $query->row();
    }
     private function _validate_mutilsave($ids)
    {
       $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        foreach ($ids as $id){
        $did = intval($id);
        
        if (count($this->datanis_multi($did))) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nis : <b>'. $this->input->post('siswa_nis['.$did.']').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa2($this->input->post('siswa_nis['.$did.']')).'</b>, cek baris nomor : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datauser_multi($did))) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data login : <b>'. $this->input->post('siswa_nis['.$did.']').'</b>, telah dipakai oleh user : <b>'. $this->get_datauser($this->input->post('siswa_nis['.$did.']')).'</b>, cek baris nomor : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

         if (count($this->dataabsen_multi($did))) {
            $data['inputerror'][] = 'siswa_absen';
             $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data absen : <b>'. $this->input->post('siswa_absen['.$did.']').'</b> pada kelas : <b>'. $this->get_kelas($this->input->post('siswa_kelas['.$did.']')).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa($this->input->post('siswa_absen['.$did.']'),$this->input->post('siswa_kelas['.$did.']')).'</b>,  cek baris nomor : <b>'. $did .'</b>.';
             $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_nis['.$did.']')) == FALSE && trim($this->input->post('siswa_nis['.$did.']') !== '') && trim($this->input->post('siswa_nis['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nis siswa</b> harus diisi dengan <b> format angka</b>, cek baris nomor : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_absen['.$did.']')) == FALSE && trim($this->input->post('siswa_absen['.$did.']') !== '') && trim($this->input->post('siswa_absen['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>absen siswa</b> harus diisi dengan <b> format angka</b>,  cek baris nomor : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_kelas['.$did.']')) == FALSE && trim($this->input->post('siswa_kelas['.$did.']') !== '') && trim($this->input->post('siswa_kelas['.$did.']') !== NULL)) {
            $data['inputerror'][] = 'siswa_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>kelas siswa</b> harus diisi dengan <b> format angka</b>,  cek baris nomor : <b>'. $did .'</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('siswa_nis['.$did.']') == '')
        {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nis siswa</b> pada baris nomor : <b>'. $did.'<b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_nama['.$did.']') == '')
        {
            $data['inputerror'][] = 'siswa_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama siswa</b> pada baris nomor : <b>'. $did.'<b>.';
            $data['status'] = FALSE;
        }


        if($this->input->post('siswa_kelas['.$did.']') == '')
        {
            $data['inputerror'][] = 'siswa_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kelas siswa</b> pada baris nomor : <b>'. $did.'<b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_absen['.$did.']') == '')
        {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>absen siswa</b> pada baris nomor : <b>'. $did.'<b>.';
            $data['status'] = FALSE;
        }

       
      }

       if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

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
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Tidak ada data yang masuk ke <b>sistem</b>, mohon untuk mengecek data <b>form siswa</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

       private function _validate_update_status()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


      if($this->input->post('siswa_status2') == '')
        {
            $data['inputerror'][] = 'siswa_status2';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>status siswa</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

       private function _validate_datamasuk_status()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


      if($this->input->post('data_status') == 0)
        {
            $data['inputerror'][] = 'data_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum melakukan seleksi <b>data siswa</b> yang akan upgrade <b>status</b>.';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

      }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if (!filter_var($this->input->post('siswa_email'), FILTER_VALIDATE_EMAIL) === true && trim($this->input->post('siswa_email') !== '') && trim($this->input->post('siswa_email') !== NULL) && trim($this->input->post('siswa_email') !== '-')) {
           
            $data['inputerror'][] = 'siswa_email';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email yang anda masukkan tidak valid.';;
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_nis')) == FALSE && trim($this->input->post('siswa_nis') !== '') && trim($this->input->post('siswa_nis') !== NULL)) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nis</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_nisn')) == FALSE && trim($this->input->post('siswa_nisn') !== '') && trim($this->input->post('siswa_nisn') !== NULL) && trim($this->input->post('siswa_nisn') !== '-')) {
            $data['inputerror'][] = 'siswa_nisn';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nisn</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_handphone')) == FALSE && trim($this->input->post('siswa_handphone') !== '') && trim($this->input->post('siswa_handphone') !== NULL) && trim($this->input->post('siswa_handphone') !== '-')) {
            $data['inputerror'][] = 'siswa_handphone';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone siswa</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_telprumah')) == FALSE && trim($this->input->post('siswa_telprumah') !== '') && trim($this->input->post('siswa_telprumah') !== NULL) && trim($this->input->post('siswa_telprumah') !== '-')) {
            $data['inputerror'][] = 'siswa_telprumah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>telp rumah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_notelpayah')) == FALSE && trim($this->input->post('siswa_notelpayah') !== '') && trim($this->input->post('siswa_notelpayah') !== NULL) && trim($this->input->post('siswa_notelpayah') !== '-')) {
            $data['inputerror'][] = 'siswa_notelpayah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone ayah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_notelpibu')) == FALSE && trim($this->input->post('siswa_notelpibu') !== '') && trim($this->input->post('siswa_notelpibu') !== NULL) && trim($this->input->post('siswa_notelpibu') !== '-')) {
            $data['inputerror'][] = 'siswa_notelpibu';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone ibu</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_notelpwali')) == FALSE && trim($this->input->post('siswa_notelpwali') !== '') && trim($this->input->post('siswa_notelpwali') !== NULL) && trim($this->input->post('siswa_notelpwali') !== '-')) {
            $data['inputerror'][] = 'siswa_notelpwali';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone wali</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_absen')) == FALSE && trim($this->input->post('siswa_absen') !== '') && trim($this->input->post('siswa_absen') !== NULL)) {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no absen</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_tahunijazah')) == FALSE && trim($this->input->post('siswa_tahunijazah') !== '') && trim($this->input->post('siswa_tahunijazah') !== NULL)) {
            $data['inputerror'][] = 'siswa_tahunijazah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>tahun ijazah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }



        if (count($this->dataabsen())) {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data absen : <b>'. $this->input->post('siswa_absen').'</b> pada kelas : <b>'. $this->get_kelas($this->input->post('siswa_kelas')).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa($this->input->post('siswa_absen'),$this->input->post('siswa_kelas')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datanis())) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nis : <b>'. $this->input->post('siswa_nis').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa2($this->input->post('siswa_nis')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datanisn())) {
            $data['inputerror'][] = 'siswa_nisn';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nisn : <b>'. $this->input->post('siswa_nisn').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_nisn($this->input->post('siswa_nisn')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datanomorijazah())) {
            $data['inputerror'][] = 'siswa_nomorijazah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nomor ijazah : <b>'. $this->input->post('siswa_nomorijazah').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_nomorijazah($this->input->post('siswa_nomorijazah')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->dataemail())) {
            $data['inputerror'][] = 'siswa_email';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data email : <b>'. $this->input->post('siswa_email').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_email($this->input->post('siswa_email')).'</b>.';
            $data['status'] = FALSE;
        }

         if (count($this->datatelp())) {
            $data['inputerror'][] = 'siswa_handphone';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data notelp : <b>'. $this->input->post('siswa_handphone').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_telp($this->input->post('siswa_handphone')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datauser())) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data login : <b>'. $this->input->post('siswa_nis').'</b>, telah dipakai oleh user : <b>'. $this->get_datauser($this->input->post('siswa_nis')).'</b>.';
            $data['status'] = FALSE;
        }
       
        if($this->input->post('siswa_nama') == '')
        {
            $data['inputerror'][] = 'siswa_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_nis') == '')
        {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nis siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_jeniskelamin') == '')
        {
            $data['inputerror'][] = 'siswa_jeniskelamin';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>jeniskelamin siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('kelas_tahun') == '')
        {
            $data['inputerror'][] = 'kelas_tahun';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>tahun angkatan</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_kelas') == '')
        {
            $data['inputerror'][] = 'siswa_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>kelas siswa</b>.';
            $data['status'] = FALSE;
        }
         if($this->input->post('siswa_absen') == '')
        {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nomor absen siswa</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('siswa_status') == '')
        {
            $data['inputerror'][] = 'siswa_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>status siswa</b>.';
            $data['status'] = FALSE;
        }


        if($this->get_siswa_id($this->input->post('siswa_nis2')) !== $this->input->post('siswa_id') || $this->get_siswa_nis($this->input->post('siswa_id')) !== $this->input->post('siswa_nis2'))
        {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>siswa nis</b> yang akan di update tidak cocok dengan data<b> id siswa</b> (mapulasi string terdeteksi).';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    private function _validate_save()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if (!filter_var($this->input->post('siswa_email'), FILTER_VALIDATE_EMAIL) === true && trim($this->input->post('siswa_email') !== '') && trim($this->input->post('siswa_email') !== NULL) && trim($this->input->post('siswa_email') !== '-')) {
           
            $data['inputerror'][] = 'siswa_email';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email yang anda masukkan tidak valid.';;
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_nis')) == FALSE && trim($this->input->post('siswa_nis') !== '') && trim($this->input->post('siswa_nis') !== NULL)) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nis</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_nisn')) == FALSE && trim($this->input->post('siswa_nisn') !== '') && trim($this->input->post('siswa_nisn') !== NULL) && trim($this->input->post('siswa_nisn') !== '-')) {
            $data['inputerror'][] = 'siswa_nisn';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nisn</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_handphone')) == FALSE && trim($this->input->post('siswa_handphone') !== '') && trim($this->input->post('siswa_handphone') !== NULL) && trim($this->input->post('siswa_handphone') !== '-')) {
            $data['inputerror'][] = 'siswa_handphone';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone siswa</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_telprumah')) == FALSE && trim($this->input->post('siswa_telprumah') !== '') && trim($this->input->post('siswa_telprumah') !== NULL) && trim($this->input->post('siswa_telprumah') !== '-')) {
            $data['inputerror'][] = 'siswa_telprumah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>telp rumah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_notelpayah')) == FALSE && trim($this->input->post('siswa_notelpayah') !== '') && trim($this->input->post('siswa_notelpayah') !== NULL) && trim($this->input->post('siswa_notelpayah') !== '-')) {
            $data['inputerror'][] = 'siswa_notelpayah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone ayah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_notelpibu')) == FALSE && trim($this->input->post('siswa_notelpibu') !== '') && trim($this->input->post('siswa_notelpibu') !== NULL) && trim($this->input->post('siswa_notelpibu') !== '-')) {
            $data['inputerror'][] = 'siswa_notelpibu';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone ibu</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_notelpwali')) == FALSE && trim($this->input->post('siswa_notelpwali') !== '') && trim($this->input->post('siswa_notelpwali') !== NULL) && trim($this->input->post('siswa_notelpwali') !== '-')) {
            $data['inputerror'][] = 'siswa_notelpwali';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone wali</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_tahunijazah')) == FALSE && trim($this->input->post('siswa_tahunijazah') !== '') && trim($this->input->post('siswa_tahunijazah') !== NULL)) {
            $data['inputerror'][] = 'siswa_tahunijazah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>tahun ijazah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        
        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('siswa_absen')) == FALSE && trim($this->input->post('siswa_absen') !== '') && trim($this->input->post('siswa_absen') !== NULL)) {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no absen</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }


        if (count($this->dataabsen())) {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data absen : <b>'. $this->input->post('siswa_absen').'</b> pada kelas : <b>'. $this->get_kelas($this->input->post('siswa_kelas')).'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa($this->input->post('siswa_absen'),$this->input->post('siswa_kelas')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datanis())) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nis : <b>'. $this->input->post('siswa_nis').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa2($this->input->post('siswa_nis')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datanisn())) {
            $data['inputerror'][] = 'siswa_nisn';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nisn : <b>'. $this->input->post('siswa_nisn').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_nisn($this->input->post('siswa_nisn')).'</b>.';
            $data['status'] = FALSE;
        }

         if (count($this->datanomorijazah())) {
            $data['inputerror'][] = 'siswa_nomorijazah';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nomor ijazah : <b>'. $this->input->post('siswa_nomorijazah').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_nomorijazah($this->input->post('siswa_nomorijazah')).'</b>.';
            $data['status'] = FALSE;
        }


        if (count($this->dataemail())) {
            $data['inputerror'][] = 'siswa_email';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data email : <b>'. $this->input->post('siswa_email').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_email($this->input->post('siswa_email')).'</b>.';
            $data['status'] = FALSE;
        }

         if (count($this->datatelp())) {
            $data['inputerror'][] = 'siswa_handphone';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data notelp : <b>'. $this->input->post('siswa_handphone').'</b>, telah dipakai oleh siswa : <b>'. $this->get_namasiswa_telp($this->input->post('siswa_handphone')).'</b>.';
            $data['status'] = FALSE;
        }
      
        
        if (count($this->datauser())) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data login : <b>'. $this->input->post('siswa_nis').'</b>, telah dipakai oleh user : <b>'. $this->get_datauser($this->input->post('siswa_nis')).'</b>.';
            $data['status'] = FALSE;
        }
       
        if($this->input->post('siswa_nama') == '')
        {
            $data['inputerror'][] = 'siswa_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_nis') == '')
        {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nis siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_jeniskelamin') == '')
        {
            $data['inputerror'][] = 'siswa_jeniskelamin';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>jeniskelamin siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('kelas_tahun') == '')
        {
            $data['inputerror'][] = 'kelas_tahun';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>tahun angkatan</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('siswa_kelas') == '')
        {
            $data['inputerror'][] = 'siswa_kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>kelas siswa</b>.';
            $data['status'] = FALSE;
        }
         if($this->input->post('siswa_absen') == '')
        {
            $data['inputerror'][] = 'siswa_absen';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nomor absen siswa</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('siswa_status') == '')
        {
            $data['inputerror'][] = 'siswa_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>status siswa</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('user_password') == '')
        {
            $data['inputerror'][] = 'user_password';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>password</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('user_password_confirm') == '' && trim($this->input->post('user_password') !== '') && trim($this->input->post('user_password') !== NULL))
        {
            $data['inputerror'][] = 'user_password_confirm';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>konfirmasi password</b>.';
            $data['status'] = FALSE;
        }

        if(strlen($this->input->post('user_password')) < 8 && trim($this->input->post('user_password') !== '') && trim($this->input->post('user_password') !== NULL))
        {
            $data['inputerror'][] = 'user_password';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Password harus memiliki panjang data minimal <b>8 karakter</b>.';
            $data['status'] = FALSE;
        }


         if($this->input->post('user_password') !== $this->input->post('user_password_confirm') && trim($this->input->post('user_password_confirm') !== '') && trim($this->input->post('user_password_confirm') !== NULL))
        {
            $data['inputerror'][] = 'user_password';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Kombinasi <b>password</b> yang anda masukkan belum benar.';
            $data['status'] = FALSE;
        }


       



        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
    $sets = array();
    if(strpos($available_sets, 'l') !== false)
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if(strpos($available_sets, 'u') !== false)
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if(strpos($available_sets, 'd') !== false)
        $sets[] = '23456789';
    if(strpos($available_sets, 's') !== false)
        $sets[] = '!@#$%&*?';
    $all = '';
    $password = '';
    foreach($sets as $set)
    {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }
    $all = str_split($all);
    for($i = 0; $i < $length - count($sets); $i++)
        $password .= $all[array_rand($all)];
    $password = str_shuffle($password);
    if(!$add_dashes)
        return $password;
    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while(strlen($password) > $dash_len)
    {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}
    
   
}

  


class ofanienkrip {

    /**
     * Reference to the user's encryption key
     *
     * @var string
     */
    public $encryption_key      = '';

    /**
     * Type of hash operation
     *
     * @var string
     */
    protected $_hash_type       = 'sha1';

    /**
     * Flag for the existence of mcrypt
     *
     * @var bool
     */
    protected $_mcrypt_exists   = FALSE;

    /**
     * Current cipher to be used with mcrypt
     *
     * @var string
     */
    protected $_mcrypt_cipher;

    /**
     * Method for encrypting/decrypting data
     *
     * @var int
     */
    protected $_mcrypt_mode;

    /**
     * Initialize Encryption class
     *
     * @return  void
     */
    public function __construct()
    {
        if (($this->_mcrypt_exists = function_exists('mcrypt_encrypt')) === FALSE)
        {
            show_error('The Encrypt library requires the Mcrypt extension.');
        }

        
    }

    // --------------------------------------------------------------------

    /**
     * Fetch the encryption key
     *
     * Returns it as MD5 in order to have an exact-length 128 bit key.
     * Mcrypt is sensitive to keys that are not the correct length
     *
     * @param   string
     * @return  string
     */
    public function get_key($key = '')
    {
        if ($key === '')
        {
            if ($this->encryption_key !== '')
            {
                return $this->encryption_key;
            }

            $key = config_item('encryption_key');

            if ( ! strlen($key))
            {
                show_error('In order to use the encryption class requires that you set an encryption key in your config file.');
            }
        }

        return md5($key);
    }

    // --------------------------------------------------------------------

    /**
     * Set the encryption key
     *
     * @param   string
     * @return  CI_Encrypt
     */
    public function set_key($key = '')
    {
        $this->encryption_key = $key;
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Encode
     *
     * Encodes the message string using bitwise XOR encoding.
     * The key is combined with a random hash, and then it
     * too gets converted using XOR. The whole thing is then run
     * through mcrypt using the randomized key. The end result
     * is a double-encrypted message string that is randomized
     * with each call to this function, even if the supplied
     * message and key are the same.
     *
     * @param   string  the string to encode
     * @param   string  the key
     * @return  string
     */
    public function encode($string, $key = '')
    {
        return base64_encode($this->mcrypt_encode($string, $this->get_key($key)));
    }

    // --------------------------------------------------------------------

    /**
     * Decode
     *
     * Reverses the above process
     *
     * @param   string
     * @param   string
     * @return  string
     */
    public function decode($string, $key = '')
    {
        if (preg_match('/[^a-zA-Z0-9\/\+=]/', $string) OR base64_encode(base64_decode($string)) !== $string)
        {
            return FALSE;
        }

        return $this->mcrypt_decode(base64_decode($string), $this->get_key($key));
    }

    // --------------------------------------------------------------------

    /**
     * Encode from Legacy
     *
     * Takes an encoded string from the original Encryption class algorithms and
     * returns a newly encoded string using the improved method added in 2.0.0
     * This allows for backwards compatibility and a method to transition to the
     * new encryption algorithms.
     *
     * For more details, see http://codeigniter.com/user_guide/installation/upgrade_200.html#encryption
     *
     * @param   string
     * @param   int     (mcrypt mode constant)
     * @param   string
     * @return  string
     */
    public function encode_from_legacy($string, $legacy_mode = MCRYPT_MODE_ECB, $key = '')
    {
        if (preg_match('/[^a-zA-Z0-9\/\+=]/', $string))
        {
            return FALSE;
        }

        // decode it first
        // set mode temporarily to what it was when string was encoded with the legacy
        // algorithm - typically MCRYPT_MODE_ECB
        $current_mode = $this->_get_mode();
        $this->set_mode($legacy_mode);

        $key = $this->get_key($key);
        $dec = base64_decode($string);
        if (($dec = $this->mcrypt_decode($dec, $key)) === FALSE)
        {
            $this->set_mode($current_mode);
            return FALSE;
        }

        $dec = $this->_xor_decode($dec, $key);

        // set the mcrypt mode back to what it should be, typically MCRYPT_MODE_CBC
        $this->set_mode($current_mode);

        // and re-encode
        return base64_encode($this->mcrypt_encode($dec, $key));
    }

    // --------------------------------------------------------------------

    /**
     * XOR Decode
     *
     * Takes an encoded string and key as input and generates the
     * plain-text original message
     *
     * @param   string
     * @param   string
     * @return  string
     */
    protected function _xor_decode($string, $key)
    {
        $string = $this->_xor_merge($string, $key);

        $dec = '';
        for ($i = 0, $l = strlen($string); $i < $l; $i++)
        {
            $dec .= ($string[$i++] ^ $string[$i]);
        }

        return $dec;
    }

    // --------------------------------------------------------------------

    /**
     * XOR key + string Combiner
     *
     * Takes a string and key as input and computes the difference using XOR
     *
     * @param   string
     * @param   string
     * @return  string
     */
    protected function _xor_merge($string, $key)
    {
        $hash = $this->hash($key);
        $str = '';
        for ($i = 0, $ls = strlen($string), $lh = strlen($hash); $i < $ls; $i++)
        {
            $str .= $string[$i] ^ $hash[($i % $lh)];
        }

        return $str;
    }

    // --------------------------------------------------------------------

    /**
     * Encrypt using Mcrypt
     *
     * @param   string
     * @param   string
     * @return  string
     */
    public function mcrypt_encode($data, $key)
    {
        $init_size = mcrypt_get_iv_size($this->_get_cipher(), $this->_get_mode());
        $init_vect = mcrypt_create_iv($init_size, MCRYPT_RAND);
        return $this->_add_cipher_noise($init_vect.mcrypt_encrypt($this->_get_cipher(), $key, $data, $this->_get_mode(), $init_vect), $key);
    }

    // --------------------------------------------------------------------

    /**
     * Decrypt using Mcrypt
     *
     * @param   string
     * @param   string
     * @return  string
     */
    public function mcrypt_decode($data, $key)
    {
        $data = $this->_remove_cipher_noise($data, $key);
        $init_size = mcrypt_get_iv_size($this->_get_cipher(), $this->_get_mode());

        if ($init_size > strlen($data))
        {
            return FALSE;
        }

        $init_vect = substr($data, 0, $init_size);
        $data = substr($data, $init_size);
        return rtrim(mcrypt_decrypt($this->_get_cipher(), $key, $data, $this->_get_mode(), $init_vect), "\0");
    }

    // --------------------------------------------------------------------

    /**
     * Adds permuted noise to the IV + encrypted data to protect
     * against Man-in-the-middle attacks on CBC mode ciphers
     * http://www.ciphersbyritter.com/GLOSSARY.HTM#IV
     *
     * @param   string
     * @param   string
     * @return  string
     */
    protected function _add_cipher_noise($data, $key)
    {
        $key = $this->hash($key);
        $str = '';

        for ($i = 0, $j = 0, $ld = strlen($data), $lk = strlen($key); $i < $ld; ++$i, ++$j)
        {
            if ($j >= $lk)
            {
                $j = 0;
            }

            $str .= chr((ord($data[$i]) + ord($key[$j])) % 256);
        }

        return $str;
    }

    // --------------------------------------------------------------------

    /**
     * Removes permuted noise from the IV + encrypted data, reversing
     * _add_cipher_noise()
     *
     * Function description
     *
     * @param   string  $data
     * @param   string  $key
     * @return  string
     */
    protected function _remove_cipher_noise($data, $key)
    {
        $key = $this->hash($key);
        $str = '';

        for ($i = 0, $j = 0, $ld = strlen($data), $lk = strlen($key); $i < $ld; ++$i, ++$j)
        {
            if ($j >= $lk)
            {
                $j = 0;
            }

            $temp = ord($data[$i]) - ord($key[$j]);

            if ($temp < 0)
            {
                $temp += 256;
            }

            $str .= chr($temp);
        }

        return $str;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Mcrypt Cipher
     *
     * @param   int
     * @return  CI_Encrypt
     */
    public function set_cipher($cipher)
    {
        $this->_mcrypt_cipher = $cipher;
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Mcrypt Mode
     *
     * @param   int
     * @return  CI_Encrypt
     */
    public function set_mode($mode)
    {
        $this->_mcrypt_mode = $mode;
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Get Mcrypt cipher Value
     *
     * @return  int
     */
    protected function _get_cipher()
    {
        if ($this->_mcrypt_cipher === NULL)
        {
            return $this->_mcrypt_cipher = MCRYPT_RIJNDAEL_256;
        }

        return $this->_mcrypt_cipher;
    }

    // --------------------------------------------------------------------

    /**
     * Get Mcrypt Mode Value
     *
     * @return  int
     */
    protected function _get_mode()
    {
        if ($this->_mcrypt_mode === NULL)
        {
            return $this->_mcrypt_mode = MCRYPT_MODE_CBC;
        }

        return $this->_mcrypt_mode;
    }

    // --------------------------------------------------------------------

    /**
     * Set the Hash type
     *
     * @param   string
     * @return  void
     */
    public function set_hash($type = 'sha1')
    {
        $this->_hash_type = in_array($type, hash_algos()) ? $type : 'sha1';
    }

    // --------------------------------------------------------------------

    /**
     * Hash encode a string
     *
     * @param   string
     * @return  string
     */
    public function hash($str)
    {
        return hash($this->_hash_type, $str);
    }

}