<?php
class Konfigurasi extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->real_path = realpath('raport_files/foto/profile_sekolah/real/');
        $this->full_path = realpath('raport_files/foto/profile_sekolah/full/');
        $this->thumb_path = realpath('raport_files/foto/profile_sekolah/thumbnail/');

        $this->real_path2 = realpath('raport_files/foto/lembar_pengesahan/real/');
        $this->full_path2 = realpath('raport_files/foto/lembar_pengesahan/full/');
        $this->thumb_path2 = realpath('raport_files/foto/lembar_pengesahan/thumbnail/');
        
        $this->load->model('konfigurasi_m');
    }

    public function profilesekolah() {
    	 $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        $this->data['profile_sekolah'] = $dataoption;
    	//Load Data View Konfigurasi Profile Sekolah
    	$this->data['subview'] = 'admin/konfigurasi/profilesekolah';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

    public function aktivasisystem() {
        $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        $this->data['aktivasi_sistem'] = $dataoption;
        //Load Data View Konfigurasi Aktivasi System
        $this->data['subview'] = 'admin/konfigurasi/aktivasisystem';
        $this->load->view('admin/admindesain', $this->data);
        
    }

     public function lembarpengesahan() {
        $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        $this->data['lembar_pengesahan'] = $dataoption;
        //Load Data View Konfigurasi Aktivasi System
        $this->data['subview'] = 'admin/konfigurasi/lembarpengesahan';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function bobotnilai() {
        $data = $this->konfigurasi_m->get_option_data('bobot_nilai');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        $this->data['bobot_nilai'] = $dataoption;
        //Load Data View Konfigurasi Aktivasi System
        $this->data['subview'] = 'admin/konfigurasi/bobotnilai';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function get_profile() {
         $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        
        echo json_encode($dataoption);


    }

     public function get_aktivasi() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        
        echo json_encode($dataoption);


    }

    public function cobadata() {
        $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = unserialize($data['option_data']);
        
        dump($dataoption);
        echo '<br>';
        echo $this->konfigurasi_m->getaktivasi('aktivasi_semester_admin');


    }

  

    public function get_pengesahan() {
         $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        
        echo json_encode($dataoption);


    }

     public function get_bobotnilai() {
         $data = $this->konfigurasi_m->get_option_data('bobot_nilai');
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        
        echo json_encode($dataoption);


    }


   public function cek_string() {
    echo substr('diyanahhardyofanidariyanmagelangcyberindonesia', 50);
   }


    public function ajax_update()
    {
        $data = $this->konfigurasi_m->get_option_data('profile_sekolah');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        $data_ambil = $dataoption;


       $this->_validate();
        $config['upload_path']          = $this->real_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = true;
       
        $this->load->library('upload', $config);
 
        
        if ($this->upload->do_upload("image"))
        {
            $source = $this->real_path."/".$this->upload->data('file_name');
            $thum_des = "./raport_files/foto/profile_sekolah/thumbnail/";
            $chat_des = "./raport_files/foto/profile_sekolah/chat/";
            $real_des = "./raport_files/foto/profile_sekolah/full/"; 

            $thum_h = 250.5;
            $thum_w = 334;

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
                    ->stretch($chat_w,$chat_h)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->session->userdata('user_login')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


             } else {
                $datafile = $data_ambil['sekolah_foto'];
                $datamasuk = array(
               
               'sekolah_nama' => htmlspecialchars($this->input->post('sekolah_nama')),
                'sekolah_kepala' => htmlspecialchars($this->input->post('sekolah_kepala')),
               'sekolah_nss' => htmlspecialchars($this->input->post('sekolah_nss')),
               'sekolah_npsn' => htmlspecialchars($this->input->post('sekolah_npsn')),
               'sekolah_telp' => htmlspecialchars($this->input->post('sekolah_telp')),
               'sekolah_fax' => htmlspecialchars($this->input->post('sekolah_fax')),
               'sekolah_email' => htmlspecialchars($this->input->post('sekolah_email')),
               'sekolah_alamatweb' => htmlspecialchars($this->input->post('sekolah_alamatweb')),
               'sekolah_provinsi' => htmlspecialchars($this->input->post('sekolah_provinsi')),
               'sekolah_kabupaten' => htmlspecialchars($this->input->post('sekolah_kabupaten')),
               'sekolah_kecamatan' => htmlspecialchars($this->input->post('sekolah_kecamatan')),
                'sekolah_kelurahan' => htmlspecialchars($this->input->post('sekolah_kelurahan')),
               'sekolah_kodepost' => htmlspecialchars($this->input->post('sekolah_kodepost')),
               'sekolah_alamat' => htmlspecialchars($this->input->post('sekolah_alamat')),
               'sekolah_foto' => $datafile,
                
            );

            $data = array(
                'option_data' => serialize($datamasuk)     
            );
        //$this->wali_m->update(array('wali_id' => $this->input->post('wali_id')), $data);
       $this->konfigurasi_m->update(array('option_name' => 'profile_sekolah'), $data);

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
        $datamasuk = array(
               
               'sekolah_nama' => htmlspecialchars($this->input->post('sekolah_nama')),
                'sekolah_kepala' => htmlspecialchars($this->input->post('sekolah_kepala')),
               'sekolah_nss' => htmlspecialchars($this->input->post('sekolah_nss')),
               'sekolah_npsn' => htmlspecialchars($this->input->post('sekolah_npsn')),
               'sekolah_telp' => htmlspecialchars($this->input->post('sekolah_telp')),
               'sekolah_fax' => htmlspecialchars($this->input->post('sekolah_fax')),
               'sekolah_email' => htmlspecialchars($this->input->post('sekolah_email')),
               'sekolah_alamatweb' => htmlspecialchars($this->input->post('sekolah_alamatweb')),
               'sekolah_provinsi' => htmlspecialchars($this->input->post('sekolah_provinsi')),
               'sekolah_kabupaten' => htmlspecialchars($this->input->post('sekolah_kabupaten')),
               'sekolah_kecamatan' => htmlspecialchars($this->input->post('sekolah_kecamatan')),
               'sekolah_kelurahan' => htmlspecialchars($this->input->post('sekolah_kelurahan')),
               'sekolah_kodepost' => htmlspecialchars($this->input->post('sekolah_kodepost')),
               'sekolah_alamat' => htmlspecialchars($this->input->post('sekolah_alamat')),
               'sekolah_foto' => $datafile,
                
            );

    $data = array(
                'option_data' => serialize($datamasuk)     
            );
        //$this->wali_m->update(array('wali_id' => $this->input->post('wali_id')), $data);
       $this->konfigurasi_m->update(array('option_name' => 'profile_sekolah'), $data);

        $data = array();
        $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = 'sukses';
                 $data['status'] = TRUE;
        echo json_encode($data);
    }

     public function ajax_update_aktivasi()
    {
        $this->_validate_aktivasi();

        $datamasuk = array(
               
            'aktivasi_tahun_ajaran_admin' => htmlspecialchars($this->input->post('aktivasi_tahun_ajaran_admin')),
            'aktivasi_semester_admin' => htmlspecialchars($this->input->post('aktivasi_semester_admin')),
             'aktivasi_tahun_ajaran_client' => htmlspecialchars($this->input->post('aktivasi_tahun_ajaran_client')),
            'aktivasi_semester_client' => htmlspecialchars($this->input->post('aktivasi_semester_client')),
            'aktivasi_login_siswa' => htmlspecialchars($this->input->post('aktivasi_login_siswa')),
            'aktivasi_login_guru' => htmlspecialchars($this->input->post('aktivasi_login_guru')),
            'aktivasi_edit_biodata_siswa' => htmlspecialchars($this->input->post('aktivasi_edit_biodata_siswa')),
            'aktivasi_edit_biodata_guru' => htmlspecialchars($this->input->post('aktivasi_edit_biodata_guru')),
            /*
            //siswa fitur
            'aktivasi_indikatornilai_siswa' => htmlspecialchars($this->input->post('aktivasi_indikatornilai_siswa')),
            'aktivasi_cetakraport_siswa' => htmlspecialchars($this->input->post('aktivasi_cetakraport_siswa')),
            'aktivasi_rangkingkelas_siswa' => htmlspecialchars($this->input->post('aktivasi_rangkingkelas_siswa')),

            //guru mapel fitur
            'aktivasi_kirimnilaimapel_guru' => htmlspecialchars($this->input->post('aktivasi_kirimnilaimapel_guru')),
            'aktivasi_editnilaimapel_guru' => htmlspecialchars($this->input->post('aktivasi_editnilaimapel_guru')),

            //guru bp fitur
            'aktivasi_kirimabsensi_gurubp' => htmlspecialchars($this->input->post('aktivasi_kirimabsensi_gurubp')),
            'aktivasi_kirimnilaieskulwajib_gurubp' => htmlspecialchars($this->input->post('aktivasi_kirimnilaieskulwajib_gurubp')),
            'aktivasi_editnilaieskulwajib_gurubp' => htmlspecialchars($this->input->post('aktivasi_editnilaieskulwajib_gurubp')),
            'aktivasi_kirimnilaieskulnonwajib_gurubp' => htmlspecialchars($this->input->post('aktivasi_kirimnilaieskulnonwajib_gurubp')),
            'aktivasi_editnilaieskulnonwajib_gurubp' => htmlspecialchars($this->input->post('aktivasi_editnilaieskulnonwajib_gurubp')),

            //wali kelas fitur
            'aktivasi_kirimnilaisikap_walikelas' => htmlspecialchars($this->input->post('aktivasi_kirimnilaisikap_walikelas')),
            'aktivasi_editnilaisikap_walikelas' => htmlspecialchars($this->input->post('aktivasi_editnilaisikap_walikelas')),
            'aktivasi_monitornilai_walikelas' => htmlspecialchars($this->input->post('aktivasi_monitornilai_walikelas')),
            'aktivasi_cetakraport_walikelas' => htmlspecialchars($this->input->post('aktivasi_cetakraport_walikelas')),
            'aktivasi_rangkingkelas_walikelas' => htmlspecialchars($this->input->post('aktivasi_rangkingkelas_walikelas')),
            
            */
            


                
                
            );

        $data = array(
                'option_data' => serialize($datamasuk)     
            );
        //$this->wali_m->update(array('wali_id' => $this->input->post('wali_id')), $data);
        $this->db->cache_set_path($this->config->item('cache_path'));
        $this->db->cache_delete_all();
       $this->konfigurasi_m->update(array('option_name' => 'aktivasi_sistem'), $data);
        echo json_encode(array("status" => TRUE));
    }

     public function ajax_update_bobotnilai()
    {
        $this->_validate_bobotnilai();

        $datamasuk = array(
            
            'bobot_uh' => htmlspecialchars($this->input->post('bobot_uh')),
            'bobot_tg' => htmlspecialchars($this->input->post('bobot_tg')),
            'bobot_nh' => htmlspecialchars($this->input->post('bobot_nh')),
            'bobot_uts' => htmlspecialchars($this->input->post('bobot_uts')),
            'bobot_uas' => htmlspecialchars($this->input->post('bobot_uas')),
            'bobot_ps' => htmlspecialchars($this->input->post('bobot_ps')),
            'bobot_pr' => htmlspecialchars($this->input->post('bobot_pr')),
            'bobot_po' => htmlspecialchars($this->input->post('bobot_po')),
                
                
            );

        $data = array(
                'option_data' => serialize($datamasuk)     
            );
        //$this->wali_m->update(array('wali_id' => $this->input->post('wali_id')), $data);
       $this->konfigurasi_m->update(array('option_name' => 'bobot_nilai'), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function ajax_update_pengesahan()
    {
        $data = $this->konfigurasi_m->get_option_data('lembar_pengesahan');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);
        $data_ambil = $dataoption;


       $this->_validate_lembar_pengesahan();
        $config['upload_path']          = $this->real_path2;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = "2000KB";
        $config['encrypt_name']         = true;
       
        $this->load->library('upload', $config);
 
        
        if ($this->upload->do_upload("image"))
        {
            $source = $this->real_path2."/".$this->upload->data('file_name');
            $thum_des = "./raport_files/foto/lembar_pengesahan/thumbnail/";
            $chat_des = "./raport_files/foto/lembar_pengesahan/crop/";
            $real_des = "./raport_files/foto/lembar_pengesahan/full/"; 

            $thum_h = 300;
            $thum_w = 300;

            $chat_h = 80;
            $chat_w = 220;


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
                    ->stretch($chat_w,$chat_h)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->session->userdata('user_login')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


             } else {
                $datafile = $data_ambil['pengesahan_tandatangankepala'];
                $datamasuk = array(
               
                'pengesahan_namakepala' => htmlspecialchars($this->input->post('pengesahan_namakepala')),
                'pengesahan_tanggal' => htmlspecialchars($this->input->post('pengesahan_tanggal')),
                'pengesahan_nipkepala' => htmlspecialchars($this->input->post('pengesahan_nipkepala')),
                'pengesahan_tempat' => htmlspecialchars($this->input->post('pengesahan_tempat')),         
                'pengesahan_tandatangankepala' => $datafile,
                
                
            );

            $data = array(
                'option_data' => serialize($datamasuk)     
            );
      
       $this->konfigurasi_m->update(array('option_name' => 'lembar_pengesahan'), $data);

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
             $datamasuk = array(
               
                'pengesahan_namakepala' => htmlspecialchars($this->input->post('pengesahan_namakepala')),
                'pengesahan_tanggal' => htmlspecialchars($this->input->post('pengesahan_tanggal')),
                'pengesahan_nipkepala' => htmlspecialchars($this->input->post('pengesahan_nipkepala')),
                'pengesahan_tempat' => htmlspecialchars($this->input->post('pengesahan_tempat')),         
                'pengesahan_tandatangankepala' => $datafile,
                    
            );

            $data = array(
                    'option_data' => serialize($datamasuk)     
                );
            //$this->wali_m->update(array('wali_id' => $this->input->post('wali_id')), $data);
           $this->konfigurasi_m->update(array('option_name' => 'lembar_pengesahan'), $data);

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

         if (!filter_var($this->input->post('sekolah_email'), FILTER_VALIDATE_EMAIL) === true && trim($this->input->post('sekolah_email') !== '') && trim($this->input->post('sekolah_email') !== NULL) && trim($this->input->post('sekolah_email') !== '-')) {
           
            $data['inputerror'][] = 'sekolah_email';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Format <b>email</b> yang anda masukkan <b>tidak valid</b>.';;
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('sekolah_nss')) == FALSE && trim($this->input->post('sekolah_nss') !== '') && trim($this->input->post('sekolah_nss') !== NULL)) {
            $data['inputerror'][] = 'sekolah_nss';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nss</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('sekolah_npsn')) == FALSE && trim($this->input->post('sekolah_npsn') !== '') && trim($this->input->post('sekolah_npsn') !== NULL)) {
            $data['inputerror'][] = 'sekolah_npsn';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>npsn</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('sekolah_telp')) == FALSE && trim($this->input->post('sekolah_telp') !== '') && trim($this->input->post('sekolah_telp') !== NULL)) {
            $data['inputerror'][] = 'sekolah_telp';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>telp</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('sekolah_fax')) == FALSE && trim($this->input->post('sekolah_fax') !== '') && trim($this->input->post('sekolah_fax') !== NULL)) {
            $data['inputerror'][] = 'sekolah_fax';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>fax</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('sekolah_kodepost')) == FALSE && trim($this->input->post('sekolah_kodepost') !== '') && trim($this->input->post('sekolah_kodepost') !== NULL)) {
            $data['inputerror'][] = 'sekolah_kodepost';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>kodepost</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_nama') == '')
        {
            $data['inputerror'][] = 'sekolah_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama sekolah</b>.';
            $data['status'] = FALSE;
        }

          if($this->input->post('sekolah_kepala') == '')
        {
            $data['inputerror'][] = 'sekolah_kepala';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama kepala sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_nss') == '')
        {
            $data['inputerror'][] = 'sekolah_nss';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nss sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_npsn') == '')
        {
            $data['inputerror'][] = 'sekolah_npsn';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nspn sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_telp') == '')
        {
            $data['inputerror'][] = 'sekolah_telp';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nomor telp sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_fax') == '')
        {
            $data['inputerror'][] = 'sekolah_fax';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>fax sekolah</b>.';
            $data['status'] = FALSE;
        }
        if($this->input->post('sekolah_email') == '')
        {
            $data['inputerror'][] = 'sekolah_email';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>email sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_alamatweb') == '')
        {
            $data['inputerror'][] = 'sekolah_alamatweb';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>alamat web sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_provinsi') == '')
        {
            $data['inputerror'][] = 'sekolah_provinsi';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>provinsi sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_kabupaten') == '')
        {
            $data['inputerror'][] = 'sekolah_kabupaten';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kabupaten sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_kecamatan') == '')
        {
            $data['inputerror'][] = 'sekolah_kecamatan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kecamatan sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_kelurahan') == '')
        {
            $data['inputerror'][] = 'sekolah_kelurahan';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kelurahan sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_kodepost') == '')
        {
            $data['inputerror'][] = 'sekolah_kodepost';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kodepost sekolah</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('sekolah_alamat') == '')
        {
            $data['inputerror'][] = 'sekolah_alamat';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>alamat sekolah</b>.';
            $data['status'] = FALSE;
        }

       

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_aktivasi()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

        if($this->input->post('aktivasi_tahun_ajaran_admin') == '')
        {
            $data['inputerror'][] = 'aktivasi_tahun_ajaran_admin';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>tahun ajaran</b> pada <b>admin</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('aktivasi_tahun_ajaran_client') == '')
        {
            $data['inputerror'][] = 'aktivasi_tahun_ajaran_client';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>tahun ajaran</b> pada <b>client</b>.';
            $data['status'] = FALSE;
        }

    
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }


    private function _validate_bobotnilai()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        

        if($this->input->post('bobot_uh') == '')
        {
            $data['inputerror'][] = 'bobot_uh';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Ulangan Harian tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

          if($this->input->post('bobot_tg') == '')
        {
            $data['inputerror'][] = 'bobot_tg';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Tugas tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

         if($this->input->post('bobot_uts') == '')
        {
            $data['inputerror'][] = 'bobot_uts';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Ulangan Tengah Semester tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

         if($this->input->post('bobot_uas') == '')
        {
            $data['inputerror'][] = 'bobot_uas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Ulangan Akhir Semester tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

         if($this->input->post('bobot_ps') == '')
        {
            $data['inputerror'][] = 'bobot_ps';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Proses tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

         if($this->input->post('bobot_pr') == '')
        {
            $data['inputerror'][] = 'bobot_pr';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Produk tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

         if($this->input->post('bobot_po') == '')
        {
            $data['inputerror'][] = 'bobot_po';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Bobot nilai Proyek tidak diperbolehkan kosong.';
            $data['status'] = FALSE;
        }

    
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function _validate_lembar_pengesahan()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        


        $expr = '/^[0-9 ][0-9 ]*$/';
        if (preg_match($expr, $this->input->post('pengesahan_nipkepala')) == FALSE && trim($this->input->post('pengesahan_nipkepala') !== '') && trim($this->input->post('pengesahan_nipkepala') !== NULL) && trim($this->input->post('pengesahan_nipkepala') !== '-')) {
            $data['inputerror'][] = 'pengesahan_nipkepala';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nip kepala sekolah</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }



        if($this->input->post('pengesahan_namakepala') == '')
        {
            $data['inputerror'][] = 'pengesahan_namakepala';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memasukkan data <b>nama kepala sekolah</b> raport.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pengesahan_nipkepala') == '')
        {
            $data['inputerror'][] = 'pengesahan_nipkepala';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memasukkan data <b>nip kepala sekolah</b> raport.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pengesahan_tempat') == '')
        {
            $data['inputerror'][] = 'pengesahan_tempat';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memasukkan data <b>tempat pengesahan</b> raport.';
            $data['status'] = FALSE;
        }

         if($this->input->post('pengesahan_tanggal') == '')
        {
            $data['inputerror'][] = 'pengesahan_tanggal';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memasukkan data <b>tanggal pengesahan</b> raport.';
            $data['status'] = FALSE;
        }



    
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

   


    
   
// --------------------------------------------------------------------

    /**
     * Unserialize
     *
     * This function unserializes a data string, then converts any
     * temporary slash markers back to actual slashes
     *
     * @access  private
     * @param   array
     * @return  string
     */
    function _unserialize($data)
    {
        $data = @unserialize(strip_slashes($data));

        if (is_array($data))
        {
            foreach ($data as $key => $val)
            {
                if (is_string($val))
                {
                    $data[$key] = str_replace('{{slash}}', '\\', $val);
                }
            }

            return $data;
        }

        return (is_string($data)) ? str_replace('{{slash}}', '\\', $data) : $data;
    }


// --------------------------------------------------------------------

    /**
     * Serialize an array
     *
     * This function first converts any slashes found in the array to a temporary
     * marker, so when it gets unserialized the slashes will be preserved
     *
     * @access  private
     * @param   array
     * @return  string
     */
    function _serialize($data)
    {
        if (is_array($data))
        {
            foreach ($data as $key => $val)
            {
                if (is_string($val))
                {
                    $data[$key] = str_replace('\\', '{{slash}}', $val);
                }
            }
        }
        else
        {
            if (is_string($data))
            {
                $data = str_replace('\\', '{{slash}}', $data);
            }
        }

        return serialize($data);
    }
}