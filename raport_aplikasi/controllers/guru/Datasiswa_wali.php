<?php
class Datasiswa_wali extends Gururaport_Controller {

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
        $this->load->model('wali_m');
        $this->real_path = realpath('raport_files/foto/siswa/real/');
        $this->full_path = realpath('raport_files/foto/siswa/full/');
        $this->thumb_path = realpath('raport_files/foto/siswa/thumbnail/');
        
    }

    

    public function index() {
        $this->data['data_angkatan_aktif'] = $this->siswa_m->get_data_angkatan_aktif();
        $this->data['data_kelas_aktif'] = $this->siswa_m->get_data_kelas_aktif();

        $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        //Load Data View Data Siswa Aktif
        if (count($this->wali_m->statuswali())) {
        $this->data['subview'] = 'guru/datasiswa/siswa_wali';
        } else {
        $this->data['subview'] = 'guru/accessdenied/Datasiswa_wali';
        }
        
        $this->load->view('guru/admindesain', $this->data);
        
    }

       public function halo() {
       $this->siswa_m->get_datatables_siswa_wali();
       echo $this->db->last_query();
        
    }

     
      public function lihat_data_siswa($id)
    {   
      
        $data = $this->siswa_m->get_data_siswa($id);
        
      
        echo json_encode($data);
        

    }

    public function ajax_list_siswa_wali()
    {
        $list = $this->siswa_m->get_datatables_siswa_wali();
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
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$siswa->siswa_nis.'">';
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
            $row[] = '<a href="javascript:void()" onclick="edit_data('."'".$siswa->siswa_id."'".')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit</a>
                  <a href="javascript:void()" onclick="lihat_data_siswa('."'".$siswa->siswa_id."'".')" class="btn default btn-xs green"><i class="fa fa-eye"></i> Lihat</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->siswa_m->count_all_siswa_wali(),
                        "recordsFiltered" => $this->siswa_m->count_filtered_siswa_wali(),
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
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    //->watermark(5,8)
                    //->round(10)
                    ->save($real_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Thumbnail Image
                    ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
                    //->stretch($thum_w,$thum_h)
                    ->set_background_colour("#FFFFFF")
                    ->resize($thum_w,$thum_h,TRUE)
                    //->watermark(5,8)
                    //->round(10)
                    ->save($thum_des.$this->input->post('siswa_nis')."-".substr($this->upload->data('orig_name'), 0, -4)."-".substr(hash('sha512', $this->upload->data('file_name')  . config_item('encryption_key')), 100).$this->upload->data('file_name'),true)


            //Chat Image
                     ->load($source)
                    //->make_watermark_text("BKK SMK N 1 Magelang", $font, 18, "#CC6100")
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

               //'siswa_tanggalmasuk' => $datatanggalmasuk,
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
               //'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas')),
               //'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen')),
               //'siswa_status' => htmlspecialchars($this->input->post('siswa_status')),
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

               //'siswa_tanggalmasuk' => $datatanggalmasuk,
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
               //'siswa_kelas' => htmlspecialchars($this->input->post('siswa_kelas')),
               //'siswa_absen' => htmlspecialchars($this->input->post('siswa_absen')),
               //'siswa_status' => htmlspecialchars($this->input->post('siswa_status')),
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


        if ($this->datasiswa_wali() == 0) {
            $data['inputerror'][] = 'siswa_nis';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf saat ini anda tidak menjadi <b>wali kelas</b> untuk siswa atas nama : <b>'.$this->get_namasiswa2($this->input->post('siswa_nis')).'</b> kelas : <b>'. $this->get_namakelas($this->input->post('siswa_nis')).'</b>.';
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

    private function datasiswa_wali()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("SELECT siswa_id, siswa_nis FROM raport_siswa LEFT JOIN raport_wali ON raport_wali.wali_kelas=raport_siswa.siswa_kelas WHERE wali_kodeguru='".$this->session->userdata('user_login')."' AND wali_tahunajaran='".$this->konfigurasi_m->konfig_tahun_client()."' AND siswa_nis='".$this->db->escape_str($this->input->post('siswa_nis'))."'");
        //$query = $this->db->get();
        
         $row = $query->row();

          if (isset($row))
          {
            return 1;
          } else {
            return 0;
          }
    }





    private function datauser()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query("SELECT * from (SELECT `siswa_id` siswa_id2, `user_login` user_login2 FROM `raport_siswa` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_siswa`.`siswa_nis` UNION ALL SELECT `guru_id` siswa_id2, `user_login` user_login2 FROM `raport_guru` LEFT JOIN `raport_users` ON `raport_users`.`user_login` = `raport_guru`.`guru_kode`) as google WHERE `user_login2` = '".$this->db->escape_str($this->input->post('siswa_nis'))."' AND `siswa_id2` !='".$this->db->escape_str($this->input->post('siswa_id'))."'");
        //$query = $this->db->get();
        
        return $query->row();
    }

    private function get_siswa_id($id) 
    {
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

     private function get_namakelas($id) {
        $query = $this->db->query('SELECT kelas_nama FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas WHERE siswa_nis="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
         return $row->kelas_nama;
           
        } else {
          return 'KOSONG';
        }

    }

     private function get_kelas($id) {
        $query = $this->db->query('SELECT kelas_nama FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
         return $row->kelas_nama;
           
        } else {
          return 'KOSONG';
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
   
}

  