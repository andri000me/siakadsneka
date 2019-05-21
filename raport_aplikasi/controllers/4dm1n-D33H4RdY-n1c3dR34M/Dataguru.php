<?php
class Dataguru extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('guru_m');
        $this->load->model('password_guru_m');
         $this->load->library('image_lib');
        $this->load->library('image_moo');
        $this->load->library('tanggal');
        $this->real_path = realpath('raport_files/foto/guru/real/');
        $this->full_path = realpath('raport_files/foto/guru/full/');
        $this->thumb_path = realpath('raport_files/foto/guru/thumbnail/');
        
    }

    public function lihatdata() {
        
        //Load Data View Lihat Data Guru
        $this->data['subview'] = 'admin/dataguru/lihatdata';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function tambahguru() {
        
        //Load Data View Data Guru Edit
        $this->data['subview'] = 'admin/dataguru/edit';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function halo() {

      echo $this->tanggal->time_now();
    }



    public function ajax_list()
    {
        $list = $this->guru_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $guru) {
            $no++;
            
            if ($guru->guru_status == 1) {
                $status = '<span class="label label-warning"><i class="glyphicon glyphicon-ok "></i> Aktif </span>';
            } elseif ($guru->guru_status == 2) {
                 $status = '<span class="label bg-grey-gallery">Mutasi</span>';
            } elseif ($guru->guru_status == 3) {
                $status = '<span class="label bg-green">Pensiun</span>';

            } elseif ($guru->guru_status == 4) {
                $status = '<span class="label bg-red-sunglo">Meninggal</span>';
            } else {
                $status = '<a href="javascript:;" class="btn btn-xs btn-danger"><i class="fa fa-times  "></i> Tidak Aktif </a>';
            }

            if ($guru->guru_notelp == '') {
                $telpguru = '<span class="badge bg-grey badge-roundless">Handphone Empty</span>';
            } elseif  ($guru->guru_notelp == '-') {
                $telpguru = '<span class="badge bg-grey badge-roundless">Handphone Empty</span>';
            } else {
                $telpguru = '<span class="badge label-danger label-sm">'. $guru->guru_notelp .'</span>';
            }



            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$guru->guru_kode.'">';
            $row[] = $no;
            $row[] = '<span class="label bg-blue-hoki">'.$guru->guru_kode.'</span>';
            $row[] =  '<a href="javascript:;">'. $guru->guru_nama.'</a>';
            $row[] = '<span class="label label-primary">'.$guru->guru_jenjang.'</span>';
            $row[] =  $telpguru;
            //$row[] =  $guru->guru_pk;
           
            $row[] = $status;
            //$row[] = $guru->dob;
 
            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_guru('."'".$guru->guru_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i></a>
                  <a href="javascript:void()" onclick="delete_guru('."'".$guru->guru_kode."'".')" class="btn default btn-xs red"><i class="fa fa-trash-o"></i></a>
                  <a href="javascript:void()" onclick="lihat_data_guru('."'".$guru->guru_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i></a> ';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->guru_m->count_all(),
                        "recordsFiltered" => $this->guru_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }


    public function ajax_update_guru()
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
                    ->save($real_des.$this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Thumbnail Image
                    ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    //->stretch($thum_w,$thum_h)
                    ->set_background_colour("#FFFFFF")
                    ->resize($thum_w,$thum_h,TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($thum_des.$this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Chat Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    ->set_background_colour("#FFFFFF")
                    ->resize($chat_w,$chat_h, TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


             } else {
                
                $data = array(
                'guru_kode' => htmlspecialchars($this->input->post('guru_kode')),
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
               'guru_status' => htmlspecialchars($this->input->post('guru_status')),
               'guru_modified' => $this->tanggal->time_now()


               
                
            );
            $datalogin = array(
                 'user_login' => htmlspecialchars($this->input->post('guru_kode')),
               
                
            );
             $this->password_guru_m->update(array('user_login' => $this->input->post('guru_kode2')), $datalogin);
            $this->guru_m->update(array('guru_id' => $this->input->post('guru_id')), $data);

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = TRUE;
                  echo json_encode($data);
                 exit();
               
             }

                $datafile = $this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name');
                
                $data = array(
                'guru_kode' => htmlspecialchars($this->input->post('guru_kode')),
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
               'guru_status' => htmlspecialchars($this->input->post('guru_status')),
               'guru_foto' => $datafile,
               'guru_modified' => $this->tanggal->time_now()

                
            );
            $datalogin = array(
                 'user_login' => htmlspecialchars($this->input->post('guru_kode')),
               
                
            );
             $this->password_guru_m->update(array('user_login' => $this->input->post('guru_kode2')), $datalogin);
            $this->guru_m->update(array('guru_id' => $this->input->post('guru_id')), $data);


        $data = array();
        $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = 'sukses';
                 $data['status'] = TRUE;
        echo json_encode($data);
    }


     public function ajax_save_guru()
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
                    ->save($real_des.$this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Thumbnail Image
                    ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    //->stretch($thum_w,$thum_h)
                    ->set_background_colour("#FFFFFF")
                    ->resize($thum_w,$thum_h,TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($thum_des.$this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Chat Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    ->set_background_colour("#FFFFFF")
                    ->resize($chat_w,$chat_h, TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($chat_des.$this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true);


             } else {

                if ($this->input->post('guru_tanggallahir') == '') {
                    $datatanggal = NULL;
                } else {
                    $datatanggal = htmlspecialchars($this->input->post('guru_tanggallahir'));
                }
                
                
                $data = array(
                 'guru_kode' => htmlspecialchars($this->input->post('guru_kode')),
               'guru_nama' => htmlspecialchars(ucwords($this->input->post('guru_nama'))),
               'guru_nip' => htmlspecialchars($this->input->post('guru_nip')),
               'guru_email' => htmlspecialchars($this->input->post('guru_email')),
               'guru_notelp' => htmlspecialchars($this->input->post('guru_notelp')),
               'guru_jeniskelamin' => htmlspecialchars($this->input->post('guru_jeniskelamin')),
               'guru_agama' => htmlspecialchars($this->input->post('guru_agama')),
               'guru_tempatlahir' => htmlspecialchars($this->input->post('guru_tempatlahir')),
               'guru_tanggallahir' => $datatanggal,
               'guru_asaluniv' => htmlspecialchars($this->input->post('guru_asaluniv')),
               'guru_jenjang' => htmlspecialchars($this->input->post('guru_jenjang')),
               'guru_jurusan' => htmlspecialchars($this->input->post('guru_jurusan')),
               'guru_mengajar' => htmlspecialchars($this->input->post('guru_mengajar')),
               'guru_alamat' => htmlspecialchars($this->input->post('guru_alamat')),
               'guru_tugas' => htmlspecialchars($this->input->post('guru_tugas')),
               'guru_kelompok' => htmlspecialchars($this->input->post('guru_kelompok')),
               'guru_group' => htmlspecialchars($this->input->post('guru_group')),
               'guru_status' => htmlspecialchars($this->input->post('guru_status')),
                'guru_created' => $this->tanggal->time_now(),
               'guru_modified' => $this->tanggal->time_now()


               
                
            );
            $fanicode = new ofanienkrip();

            $data_password = hash('sha512', $this->input->post('user_password')  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($this->input->post('user_password'), config_item('erapor_tokenkey'));
            $datauser = array(
                'user_login' => htmlspecialchars($this->input->post('guru_kode')),
                'user_password' => $data_password,
                'user_token' => $data_token,
                'user_level' => 2,
                'user_status' => 1,
               
                
            );
            $this->guru_m->save($data);
            $this->password_guru_m->save($datauser);

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = $this->upload->display_errors('<i class="fa fa-warning"></i> <strong> Upload Gagal:</strong>  ', '');
                 $data['status'] = TRUE;
                  echo json_encode($data);
                 exit();
               
             }

                $datafile = $this->input->post('guru_kode')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name');
                 

                 if ($this->input->post('guru_tanggallahir') == '') {
                    $datatanggal = NULL;
                } else {
                    $datatanggal = htmlspecialchars($this->input->post('guru_tanggallahir'));
                }
                $data = array(
                 'guru_kode' => htmlspecialchars($this->input->post('guru_kode')),
               'guru_nama' => htmlspecialchars(ucwords($this->input->post('guru_nama'))),
               'guru_nip' => htmlspecialchars($this->input->post('guru_nip')),
               'guru_email' => htmlspecialchars($this->input->post('guru_email')),
               'guru_notelp' => htmlspecialchars($this->input->post('guru_notelp')),
               'guru_jeniskelamin' => htmlspecialchars($this->input->post('guru_jeniskelamin')),
               'guru_agama' => htmlspecialchars($this->input->post('guru_agama')),
               'guru_tempatlahir' => htmlspecialchars($this->input->post('guru_tempatlahir')),
               'guru_tanggallahir' => $datatanggal,
               'guru_asaluniv' => htmlspecialchars($this->input->post('guru_asaluniv')),
               'guru_jenjang' => htmlspecialchars($this->input->post('guru_jenjang')),
               'guru_jurusan' => htmlspecialchars($this->input->post('guru_jurusan')),
               'guru_mengajar' => htmlspecialchars($this->input->post('guru_mengajar')),
               'guru_alamat' => htmlspecialchars($this->input->post('guru_alamat')),
               'guru_tugas' => htmlspecialchars($this->input->post('guru_tugas')),
               'guru_kelompok' => htmlspecialchars($this->input->post('guru_kelompok')),
               'guru_group' => htmlspecialchars($this->input->post('guru_group')),
               'guru_status' => htmlspecialchars($this->input->post('guru_status')),
               'guru_foto' => $datafile,
               'guru_created' => $this->tanggal->time_now(),
               'guru_modified' => $this->tanggal->time_now()

                
            );

            $fanicode = new ofanienkrip();

            $data_password = hash('sha512', $this->input->post('user_password')  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($this->input->post('user_password'), config_item('erapor_tokenkey'));
            $datauser = array(
                'user_login' => htmlspecialchars($this->input->post('guru_kode')),
                'user_password' => $data_password,
                'user_token' => $data_token,
                'user_level' => 2,
                'user_status' => 1,
               
                
            );
            $this->guru_m->save($data);
            $this->password_guru_m->save($datauser);

        $data = array();
        $data['error_string'] = array();
                $data['inputerror'] = array();
                 $data['inputerror'][] = 'upload_error';
                 $data['error_string'][] = 'sukses';
                 $data['status'] = TRUE;
        echo json_encode($data);
    }

    public function lihat_data_guru($id)
    {   

        $data = $this->guru_m->get_by_id($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }


    public function ajax_delete($id)
    {
        $this->guru_m->hapus_data_guru($id);
        $this->password_guru_m->hapus_data_guru($id);
        echo json_encode(array("status" => TRUE));
    }

   function ajax_multiple_delete(){
         $ids = (explode( ',', $this->input->get_post('ids') ));
         $this->guru_m->hapus_data_guru_multiple($ids);  
    }

    private function get_namaguru($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    public function cek($id) {
          $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_email="'.$this->db->escape_str($id).'"');
       
     dump($this->db->last_query());
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

    private function get_guru_id($id) {
        $query = $this->db->query('SELECT guru_id FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_id;
           
        }

         if ($query->num_rows() > 0) {

            return $row->guru_id;
        } else {

            return 'gh9K*fCsZa2@hBc&hjasLKVfVBNa*%%6p*e80f325f0960f7cfc2407f9f50c872b5817930f2045ed980628a6c613ab2ae97313c7268cafc92169774389221d1f36370c665acac2203fb8fed3b086097128d';
        }

        

    }

     private function get_guru_kode($id) {
        $query = $this->db->query('SELECT guru_kode FROM raport_guru WHERE guru_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_kode;
           
        }

         if ($query->num_rows() > 0) {

            return $row->guru_kode;
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


     private function datakode()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('guru_id');
        $this->db->where('guru_kode', $this->input->post('guru_kode'));
        !$id || $this->db->where('guru_id !=', $id);
        $datakode = $this->guru_m->get();
    
        return $datakode;
    }

    private function datanip()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('guru_id');
        $this->db->where('guru_nip', $this->input->post('guru_nip'));
         $this->db->where('guru_nip !=', '');
         $this->db->where('guru_nip !=', '-');
        !$id || $this->db->where('guru_id !=', $id);
        $datanip = $this->guru_m->get();
    
        return $datanip;
    }

    private function dataemail()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('guru_id');
        $this->db->where('guru_email', $this->input->post('guru_email'));
        $this->db->where('guru_email !=', '');
         $this->db->where('guru_email !=', '-');
        !$id || $this->db->where('guru_id !=', $id);
        $dataemail = $this->guru_m->get();
    
        return $dataemail;
    }

     private function datatelp()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
    
        $id = $this->input->post('guru_id');
        $this->db->where('guru_notelp', $this->input->post('guru_notelp'));
        $this->db->where('guru_notelp !=', '');
         $this->db->where('guru_notelp !=', '-');
        !$id || $this->db->where('guru_id !=', $id);
        $datatelp = $this->guru_m->get();
    
        return $datatelp;
    }

    private function datauser()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("SELECT * from (SELECT `siswa_id` siswa_id2, `user_login` user_login2 FROM `raport_siswa` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_siswa`.`siswa_nis` UNION ALL SELECT `guru_id` siswa_id2, `user_login` user_login2 FROM `raport_guru` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_guru`.`guru_kode`) as google WHERE `user_login2` = '".$this->db->escape_str($this->input->post('guru_kode'))."' AND `siswa_id2` !='".$this->db->escape_str($this->input->post('guru_id'))."'");
        //$query = $this->db->get();
        
        return $query->row();
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

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('guru_kode')) == FALSE && trim($this->input->post('guru_kode') !== '') && trim($this->input->post('guru_kode') !== NULL)) {
            $data['inputerror'][] = 'guru_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>kode</b> harus diisi dengan <b> format angka</b>.';
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

       
        if (count($this->datakode())) {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kode guru : <b>'. $this->input->post('guru_kode').'</b>, telah dipakai oleh guru : <b>'. $this->get_namaguru($this->input->post('guru_kode')).'</b>.';
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

         if (count($this->datauser())) {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data login : <b>'. $this->input->post('guru_kode').'</b>, telah dipakai oleh user : <b>'. $this->get_datauser($this->input->post('guru_kode')).'</b>.';
            $data['status'] = FALSE;
        }


       
        if($this->input->post('guru_nama') == '')
        {
            $data['inputerror'][] = 'guru_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('guru_kode') == '')
        {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kode guru</b>.';
            $data['status'] = FALSE;
        }

        if(strlen($this->input->post('guru_kode')) > 5 && trim($this->input->post('guru_kode') !== '') && trim($this->input->post('guru_kode') !== NULL))
        {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Kode guru hanya dapat menerima input data max <b>5 karakter</b>.';
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

       
        if($this->input->post('guru_status') == '')
        {
            $data['inputerror'][] = 'guru_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>status guru</b>.';
            $data['status'] = FALSE;
        }

        if($this->get_guru_id($this->input->post('guru_kode2')) !== $this->input->post('guru_id') || $this->get_guru_kode($this->input->post('guru_id')) !== $this->input->post('guru_kode2'))
        {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>guru kode</b> yang akan di update tidak cocok dengan data<b> id guru</b> (mapulasi string terdeteksi).';
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

        if (!filter_var($this->input->post('guru_email'), FILTER_VALIDATE_EMAIL) === true && trim($this->input->post('guru_email') !== '') && trim($this->input->post('guru_email') !== NULL) && trim($this->input->post('guru_email') !== '-')) {
           
            $data['inputerror'][] = 'guru_email';
            $data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email yang anda masukkan tidak valid.';;
            $data['status'] = FALSE;
        }

         $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('guru_kode')) == FALSE && trim($this->input->post('guru_kode') !== '') && trim($this->input->post('guru_kode') !== NULL)) {
            $data['inputerror'][] = 'guru_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>kode</b> harus diisi dengan <b> format angka</b>.';
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

       
        if (count($this->datakode())) {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data kode guru : <b>'. $this->input->post('guru_kode').'</b>, telah dipakai oleh guru : <b>'. $this->get_namaguru($this->input->post('guru_kode')).'</b>.';
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

        if (count($this->datauser())) {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf data login : <b>'. $this->input->post('guru_kode').'</b>, telah dipakai oleh user : <b>'. $this->get_datauser($this->input->post('guru_kode')).'</b>.';
            $data['status'] = FALSE;
        }

        
        if($this->input->post('guru_nama') == '')
        {
            $data['inputerror'][] = 'guru_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>nama guru</b>.';
            $data['status'] = FALSE;
        }

         if($this->input->post('guru_kode') == '')
        {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>kode guru</b>.';
            $data['status'] = FALSE;
        }

        if(strlen($this->input->post('guru_kode')) > 5 && trim($this->input->post('guru_kode') !== '') && trim($this->input->post('guru_kode') !== NULL))
        {
            $data['inputerror'][] = 'guru_kode';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Kode guru hanya dapat menerima input data max <b>5 karakter</b>.';
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

       
        if($this->input->post('guru_status') == '')
        {
            $data['inputerror'][] = 'guru_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b>status guru</b>.';
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