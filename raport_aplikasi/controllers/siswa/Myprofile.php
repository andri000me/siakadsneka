<?php
class myprofile extends Siswaraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('siswa_m');
        $this->load->library('tanggal');
        $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->real_path = realpath('raport_files/foto/siswa/real/');
        $this->full_path = realpath('raport_files/foto/siswa/full/');
        $this->thumb_path = realpath('raport_files/foto/siswa/thumbnail/');
        $this->load->model('konfigurasi_m');
    }

    public function index() {
    	
    	//Load Data View My Profile
      
      if ($this->konfigurasi_m->getaktivasi('aktivasi_edit_biodata_siswa') !== '1') {

        $this->data['aktivasiedit'] = '<div class="note note-info"><i class="fa  fa-info-circle"></i><strong> Info:</strong> Maaf saat ini <b>fitur edit biodata</b> untuk <b>siswa</b> sedang dinonaktifkan oleh <b>Admin</b>.</div>';
        $this->data['subview'] = 'siswa/aktivasi/myprofile';

      } else {
          $this->data['aktivasiedit'] = '';
        $this->data['subview'] = 'siswa/datasiswa/myprofile';
      }
      $this->data['profilesiswa'] = $this->siswa_m->get_data_siswa_profile($this->session->userdata('user_login'));
    	
    	$this->load->view('siswa/admindesain', $this->data);
      //dump($this->db->last_query());
    	
    }

    public function dataku()
    {   

        $data = $this->siswa_m->get_data_siswa_profile($this->session->userdata('user_login'));
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }


    public function ajax_update_siswa()
    {
        $this->aktivasi();
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
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    //->watermark(5,8)
                    //->round(10)
                    ->save($real_des.$this->session->userdata('user_login')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Thumbnail Image
                    ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    //->stretch($thum_w,$thum_h)
                    ->set_background_colour("#FFFFFF")
                    ->resize($thum_w,$thum_h,TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($thum_des.$this->session->userdata('user_login')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Chat Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    ->set_background_colour("#FFFFFF")
                    ->resize($chat_w,$chat_h, TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->session->userdata('user_login')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


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
                //'siswa_nis' => htmlspecialchars($this->input->post('siswa_nis')),
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
              
               'siswa_modified' => $this->tanggal->time_now()


               
                
            );
           
            $this->siswa_m->update(array('siswa_nis' =>$this->session->userdata('user_login')), $data);
            $databaru = array(
            'user_nama'  => htmlspecialchars(ucwords($this->input->post('siswa_nama'))),
            
            );

            $this->session->set_userdata($databaru); 
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = TRUE;
                  echo json_encode($data);
                 exit();
               
             }

                $datafile = $this->session->userdata('user_login')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name');

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
                //'siswa_nis' => htmlspecialchars($this->input->post('siswa_nis')),
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
               'siswa_foto' => $datafile,
               'siswa_modified' => $this->tanggal->time_now()

                
            );
            
            $databaru = array(
            'user_nama'  => htmlspecialchars(ucwords($this->input->post('siswa_nama'))),
            'user_photo' => $datafile,
            );

            $this->session->set_userdata($databaru); 

            $this->siswa_m->update(array('siswa_nis' =>$this->session->userdata('user_login')), $data);


        $data = array();
        $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = 'sukses';
                 $data['status'] = TRUE;
        echo json_encode($data);
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

       
       
        if($this->input->post('siswa_nama') == '')
        {
            $data['inputerror'][] = 'siswa_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama siswa</b>.';
            $data['status'] = FALSE;
        }

         

         if($this->input->post('siswa_jeniskelamin') == '')
        {
            $data['inputerror'][] = 'siswa_jeniskelamin';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>jeniskelamin siswa</b>.';
            $data['status'] = FALSE;
        }

        

        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function aktivasi()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->konfigurasi_m->getaktivasi('aktivasi_edit_biodata_siswa') !== '1') {
           
            $data['inputerror'][] = 'edit_siswa';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Maaf saat ini fitur <b>edit biodata siswa</b> sedang dinonaktifkan oleh <b>Admin</b>.';;
            $data['status'] = FALSE;
        }

   
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     
    private function datanis()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('siswa_nis', $this->input->post('siswa_nis'));
        !$id || $this->db->where('siswa_nis !=', $id);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

  

    private function datanisn()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('siswa_nisn', $this->input->post('siswa_nisn'));
        !$id || $this->db->where('siswa_nis !=', $id);
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
    
        $id = $this->session->userdata('user_login');
        $this->db->where('siswa_email', $this->input->post('siswa_email'));
        !$id || $this->db->where('siswa_nis !=', $id);
        $this->db->where('siswa_email !=', '');
         $this->db->where('siswa_email !=', '-');
         $this->db->where('siswa_email !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

     private function datanomorijazah()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('siswa_nomorijazah', $this->input->post('siswa_nomorijazah'));
        !$id || $this->db->where('siswa_nis !=', $id);
        $this->db->where('siswa_nomorijazah !=', '');
         $this->db->where('siswa_nomorijazah !=', '-');
         $this->db->where('siswa_nomorijazah !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }

    

    private function datatelp()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('siswa_handphone', $this->input->post('siswa_handphone'));
        !$id || $this->db->where('siswa_nis !=', $id);
        $this->db->where('siswa_handphone !=', '');
         $this->db->where('siswa_handphone !=', '-');
         $this->db->where('siswa_handphone !=', NULL);
        $dataabsen = $this->siswa_m->get();
    
        return $dataabsen;
    }



    



  

    
   
   private function get_namasiswa($id, $id2) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_absen="'.$this->db->escape_str($id).'" and siswa_kelas="'.$id2.'"');

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

   
}