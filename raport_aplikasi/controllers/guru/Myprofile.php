<?php
class myprofile extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('guru_m');
        $this->load->library('tanggal');
        $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->real_path = realpath('raport_files/foto/guru/real/');
        $this->full_path = realpath('raport_files/foto/guru/full/');
        $this->thumb_path = realpath('raport_files/foto/guru/thumbnail/');
        $this->load->model('konfigurasi_m');
    }

    public function index() {
    	

        if ($this->konfigurasi_m->getaktivasi('aktivasi_edit_biodata_guru') !== '1') {

        $this->data['aktivasiedit'] = '<div class="note note-info"><i class="fa  fa-info-circle"></i><strong> Info:</strong> Maaf saat ini <b>fitur edit biodata</b> untuk <b>guru</b> sedang dinonaktifkan oleh <b>Admin</b>.</div>';
        $this->data['subview'] = 'guru/aktivasi/myprofile';

      } else {
        $this->data['aktivasiedit'] = '';
        $this->data['subview'] = 'guru/dataguru/myprofile';
      }
    	//Load Data View My Profile
      $this->data['profileguru'] = $this->guru_m->get_data_guru($this->session->userdata('user_login'));
    	$this->load->view('guru/admindesain', $this->data);
      //dump($this->db->last_query());
    	
    }

    public function dataku()
    {   

        $data = $this->guru_m->get_data_guru($this->session->userdata('user_login'));
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }


    public function ajax_update_guru()
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
            $thum_des = "./raport_files/foto/guru/thumbnail/";
            $chat_des = "./raport_files/foto/chat/";
            $real_des = "./raport_files/foto/guru/full/"; 

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
                
                $data = array(
                
               'guru_nama' => htmlspecialchars(ucwords($this->input->post('guru_nama'))),
               'guru_nip' => htmlspecialchars($this->input->post('guru_nip')),
               'guru_email' => htmlspecialchars($this->input->post('guru_email')),
               'guru_notelp' => htmlspecialchars($this->input->post('guru_notelp')),
               'guru_jeniskelamin' => htmlspecialchars($this->input->post('guru_jeniskelamin')),
               'guru_agama' => htmlspecialchars($this->input->post('guru_agama')),
               'guru_tempatlahir' => htmlspecialchars($this->input->post('guru_tempatlahir')),
               'guru_tanggallahir' => htmlspecialchars($this->input->post('guru_tanggallahir')),
               'guru_asaluniv' => htmlspecialchars($this->input->post('guru_asaluniv')),
               'guru_jenjang' => htmlspecialchars($this->input->post('guru_jenjang')),
               'guru_jurusan' => htmlspecialchars($this->input->post('guru_jurusan')),
               'guru_mengajar' => htmlspecialchars($this->input->post('guru_mengajar')),
               'guru_alamat' => htmlspecialchars($this->input->post('guru_alamat')),
               'guru_tugas' => htmlspecialchars($this->input->post('guru_tugas')),
               'guru_kelompok' => htmlspecialchars($this->input->post('guru_kelompok')),
               'guru_group' => htmlspecialchars($this->input->post('guru_group')),
               'guru_modified' => $this->tanggal->time_now()


               
                
            );
           
            $this->guru_m->update(array('guru_kode' =>$this->session->userdata('user_login')), $data);
            $databaru = array(
            'user_nama'  => htmlspecialchars(ucwords($this->input->post('guru_nama'))),
            
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
                
                $data = array(
               'guru_nama' => htmlspecialchars(ucwords($this->input->post('guru_nama'))),
               'guru_nip' => htmlspecialchars($this->input->post('guru_nip')),
               'guru_email' => htmlspecialchars($this->input->post('guru_email')),
               'guru_notelp' => htmlspecialchars($this->input->post('guru_notelp')),
               'guru_jeniskelamin' => htmlspecialchars($this->input->post('guru_jeniskelamin')),
               'guru_agama' => htmlspecialchars($this->input->post('guru_agama')),
               'guru_tempatlahir' => htmlspecialchars($this->input->post('guru_tempatlahir')),
               'guru_tanggallahir' => htmlspecialchars($this->input->post('guru_tanggallahir')),
               'guru_asaluniv' => htmlspecialchars($this->input->post('guru_asaluniv')),
               'guru_jenjang' => htmlspecialchars($this->input->post('guru_jenjang')),
               'guru_jurusan' => htmlspecialchars($this->input->post('guru_jurusan')),
               'guru_mengajar' => htmlspecialchars($this->input->post('guru_mengajar')),
               'guru_alamat' => htmlspecialchars($this->input->post('guru_alamat')),
               'guru_tugas' => htmlspecialchars($this->input->post('guru_tugas')),
               'guru_kelompok' => htmlspecialchars($this->input->post('guru_kelompok')),
               'guru_group' => htmlspecialchars($this->input->post('guru_group')),
               'guru_foto' => $datafile,
               'guru_modified' => $this->tanggal->time_now()

                
            );
            
            $databaru = array(
            'user_nama'  => htmlspecialchars(ucwords($this->input->post('guru_nama'))),
            'user_photo' => $datafile,
            );

            $this->session->set_userdata($databaru); 

            $this->guru_m->update(array('guru_kode' =>$this->session->userdata('user_login')), $data);


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

        if (!filter_var($this->input->post('guru_email'), FILTER_VALIDATE_EMAIL) === true && trim($this->input->post('guru_email') !== '') && trim($this->input->post('guru_email') !== NULL) && trim($this->input->post('guru_email') !== '-')) {
           
            $data['inputerror'][] = 'guru_email';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email yang anda masukkan tidak valid.';;
            $data['status'] = FALSE;
        }

         

        $expr = '/^[0-9 ][0-9 ]*$/';
        if (preg_match($expr, $this->input->post('guru_nip')) == FALSE && trim($this->input->post('guru_nip') !== '') && trim($this->input->post('guru_nip') !== NULL) && trim($this->input->post('guru_nip') !== '-')) {
            $data['inputerror'][] = 'guru_nip';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nip</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('guru_notelp')) == FALSE && trim($this->input->post('guru_notelp') !== '') && trim($this->input->post('guru_notelp') !== NULL) && trim($this->input->post('guru_notelp') !== '-')) {
            $data['inputerror'][] = 'guru_notelp';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>handphone guru</b> harus diisi dengan <b> format angka</b>.';
            $data['status'] = FALSE;
        }

       
        
        if (count($this->datanip())) {
            $data['inputerror'][] = 'guru_nip';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data nip guru : <b>'. $this->input->post('guru_nip').'</b>, telah dipakai oleh guru : <b>'. $this->get_nipguru($this->input->post('guru_nip')).'</b>.';
            $data['status'] = FALSE;
        }

        if (count($this->datatelp())) {
            $data['inputerror'][] = 'guru_notelp';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data handphone guru : <b>'. $this->input->post('guru_notelp').'</b>, telah dipakai oleh guru : <b>'. $this->get_telpguru($this->input->post('guru_notelp')).'</b>.';
            $data['status'] = FALSE;
        }

         if (count($this->dataemail())) {
            $data['inputerror'][] = 'guru_email';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data email guru : <b>'. $this->input->post('guru_email').'</b>, telah dipakai oleh guru : <b>'. $this->get_emailguru($this->input->post('guru_email')).'</b>.';
            $data['status'] = FALSE;
        }

        

       
        if($this->input->post('guru_nama') == '')
        {
            $data['inputerror'][] = 'guru_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

        

        if($this->input->post('guru_jeniskelamin') == '')
        {
            $data['inputerror'][] = 'guru_jeniskelamin';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>jeniskelamin guru</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('guru_kelompok') == '')
        {
            $data['inputerror'][] = 'guru_kelompok';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>kelompok guru</b>.';
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

        if ($this->konfigurasi_m->getaktivasi('aktivasi_edit_biodata_guru') !== '1') {
           
            $data['inputerror'][] = 'edit_siswa';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Maaf saat ini fitur <b>edit biodata guru</b> sedang dinonaktifkan oleh <b>Admin</b>.';;
            $data['status'] = FALSE;
        }

   
        
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

     private function datanip()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('guru_nip', $this->input->post('guru_nip'));
         $this->db->where('guru_nip !=', '');
         $this->db->where('guru_nip !=', '-');
        !$id || $this->db->where('guru_kode !=', $id);
        $datanip = $this->guru_m->get();
    
        return $datanip;
    }

    private function dataemail()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('guru_email', $this->input->post('guru_email'));
        $this->db->where('guru_email !=', '');
         $this->db->where('guru_email !=', '-');
        !$id || $this->db->where('guru_kode !=', $id);
        $dataemail = $this->guru_m->get();
    
        return $dataemail;
    }

     private function datatelp()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->session->userdata('user_login');
        $this->db->where('guru_notelp', $this->input->post('guru_notelp'));
        $this->db->where('guru_notelp !=', '');
         $this->db->where('guru_notelp !=', '-');
        !$id || $this->db->where('guru_kode !=', $id);
        $datatelp = $this->guru_m->get();
    
        return $datatelp;
    }

     private function get_emailguru($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_email="'.$this->db->escape_str($id).'" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    private function get_nipguru($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_nip="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    private function get_telpguru($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_notelp="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }


    
   
   
   
}