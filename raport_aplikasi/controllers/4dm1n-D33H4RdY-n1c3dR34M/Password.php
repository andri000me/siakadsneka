<?php
class Password extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('password_guru_m');
         $this->load->model('password_siswa_m');
         $this->load->library('email');
        
    }

    public function gantipasswordguru() {
    	
    	//Load Data View Ganti Password Guru
    	$this->data['subview'] = 'admin/password/gantipasswordguru';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

     public function cek() {
        $fanicode = new ofanienkrip();
       $cisess_cookie = $fanicode->decode('+WhXLHPeA++KIfLevz9EC7Q/qnbiIpQHr4E7fKncdL/aTVZz4nZGJdiZTdhXhpq2PtWANKWorXo82chQsjTbJ6ez59h0kijocnGRyUgWNXdqxwGFC25U1wa+2DDZPIls0m2c/RCCPvcU8zl+QehlAFTw+1h8E426TTcUqB9pNMTxGoXIT8ykp2Vzw9e2LUQaNZmxZST+Li7HCVT6Nhj0xSm6vQ3OceHuK09Le3D+fopdlmWZf//dGJgNsOPunzRS5HM8YHnsUfFpcaLQBybMhT2RHbhSF29wkXWN0krVXEq47FW0YSR1B6Cel8oDA77ExDEIrL9fD7OD+fF5w4lxCQ==', 'gh9K*fCsZa2@hBc&hjasLKVfVBNa*%f');
     $cisess_cookie = stripslashes($cisess_cookie);
        $cisess_cookie = unserialize($cisess_cookie);
        $cisess_session_id = $cisess_cookie['session_id'];

    dump($cisess_cookie);
    }

    public function gantipasswordsiswa() {
        
        $this->data['data_angkatan'] = $this->password_siswa_m->get_data_angkatan();
        //Load Data View Ganti Password Siswa
        $this->data['subview'] = 'admin/password/gantipasswordsiswa';
        $this->load->view('admin/admindesain', $this->data);
        
    }

    public function cari_kelas( $id = NULL) {

      $tmp  = '';
        $data   = $this->password_siswa_m->get_data_kelas_saring($id);
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

    public function ajax_list_guru()
    {
        $list = $this->password_guru_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $passwordguru) {
            $no++;
            
            if ($passwordguru->guru_email == NULL ) {
                $dataemail = 'Email Belum Diinput';
            } elseif($passwordguru->guru_email == '') {
                $dataemail = 'Email Belum Diinput';
            } elseif ($passwordguru->guru_email == '-') {
                $dataemail = 'Email Belum Diinput';
            } else {
                $dataemail = 'Email: '.$passwordguru->guru_email;
            }
             
            if ($passwordguru->guru_notelp == NULL ) {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } elseif($passwordguru->guru_notelp == '') {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } elseif ($passwordguru->guru_notelp == '-') {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } else {
                $dataphone = '<span class="badge badge-danger tooltips" data-placement="top" data-original-title="'.$dataemail.'">'. $passwordguru->guru_notelp .'</span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$passwordguru->guru_kode.'">';
            $row[] = $no;
            $row[] = '<span class="label label-primary">'.$passwordguru->guru_kode .'</span>';
            $row[] =  '<a href="javascript:;">'. $passwordguru->guru_nama.'</a>';
            $row[] = $dataphone;        
          
            //$row[] = $passwordguru->dob;
 
            //add html for action
            $row[] = '<a href="javascript:;" onclick="edit_password('."'".$passwordguru->user_id."'".')" class="btn btn-xs btn-primary"><i class="fa fa-key"></i> Ganti Password </a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->password_guru_m->count_all_guru(),
                        "recordsFiltered" => $this->password_guru_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

    public function ajax_list_siswa()
    {
                $list = $this->password_siswa_m->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $passwordsiswa) {
            $no++;
            
            if ($passwordsiswa->siswa_email == NULL ) {
                $dataemail = 'Email Belum Diinput';
            } elseif($passwordsiswa->siswa_email == '') {
                $dataemail = 'Email Belum Diinput';
            } elseif ($passwordsiswa->siswa_email == '-') {
                $dataemail = 'Email Belum Diinput';
            } elseif ($passwordsiswa->siswa_email == 'NULL') {
                $dataemail = 'Email Belum Diinput';
            } else {
                $dataemail = 'Email: '.$passwordsiswa->siswa_email;
            }

            if ($passwordsiswa->nama_kk == NULL ) {
                $datakk = 'Keahlian Kompetensi Belum Diinput';
            } elseif($passwordsiswa->nama_kk == '') {
                $datakk = 'Keahlian Kompetensi Belum Diinput';
            } elseif ($passwordsiswa->nama_kk == '-') {
                $datakk = 'Keahlian Kompetensi Belum Diinput';
            } else {
                $datakk = $passwordsiswa->nama_kk;
            }

               if ($passwordsiswa->nama_kelas == NULL ) {
                $datakelas = 'Belum Diinput';
            } elseif($passwordsiswa->nama_kelas == '') {
                $datakelas = 'Belum Diinput';
            } elseif ($passwordsiswa->nama_kelas == '-') {
                $datakelas = 'Belum Diinput';
            } else {
                $datakelas ='<span class="label label-warning tooltips" data-placement="top" data-original-title="'.$datakk.'">'.$passwordsiswa->nama_kelas .'</span>' ;
            }
             
            if ($passwordsiswa->siswa_handphone == NULL ) {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } elseif($passwordsiswa->siswa_handphone == 0) {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } elseif($passwordsiswa->siswa_handphone == '') {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } elseif ($passwordsiswa->siswa_handphone == '-') {
                $dataphone = '<span class="label bg-grey tooltips" data-placement="top" data-original-title="'.$dataemail.'">Belum Diinput</span>';
            } else {
                $dataphone = '<span class="badge badge-danger tooltips" data-placement="top" data-original-title="'.$dataemail.'">'. $passwordsiswa->siswa_handphone .'</span>';
            }

            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            $row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$passwordsiswa->siswa_nis.'">';
            $row[] = $no;
            $row[] = '<span class="label label-primary">'.$passwordsiswa->siswa_nis .'</span>';
            $row[] =  '<a href="javascript:;">'. $passwordsiswa->siswa_nama.'</a>';
            $row[] = $datakelas;
            $row[] = $dataphone;        
          
            //$row[] = $passwordsiswa->dob;
 
            //add html for action
            $row[] = '<a href="javascript:;" onclick="edit_password('."'".$passwordsiswa->user_id."'".')" class="btn btn-xs btn-primary"><i class="fa fa-key"></i> Ganti Password </a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->password_siswa_m->count_all_siswa(),
                        "recordsFiltered" => $this->password_siswa_m->count_filtered(),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

     public function ajax_edit_guru($id)
    {   

        $data = $this->password_guru_m->get_by_idguru($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

     public function ajax_edit_siswa($id)
    {   

        $data = $this->password_siswa_m->get_by_idsiswa($id);
       // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

    public function kataku() {
        $fanicode = new ofanienkrip();

        echo 
        $fanicode->encode('Ya ALLAH ampunilah dosa-dosa IBU, AYAH, KAKEK, NENEK, ADIK dan HAMBA, Ya ALLAH Jodohkanlah hamba dengan wanita Solehah, Ya ALLAH Berilah Keberkahan dalam Hidup Hamba, Ya ALLAH ampunilah dosa-dosa hamba selama ini,, sifat hamba yang tidak baik, dosa hamba terhadap orang yang tidak hamba Kenal, Ya ALLAH ampunilah dosa-dosa hamba terhadap Diyanah Hardy, Ya ALLAH jadikanlah hamba termasuk orang-orang yang selalu mengingat-MU.', 'SayangIbu');
    }


    public function kataku2() {
        $fanicode = new ofanienkrip();

        echo 
        $fanicode->encode('Ya ALLAH dekatkan Hamba dengan sosok wanita Diyanah Hardy', 'idioteaqueOfani');
    }
    public function ajax_update_siswa()
    {   
        $fanicode = new ofanienkrip();
        $this->_validate();
         if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
         $panjangpassword = 6;
        } else {
         $panjangpassword = config_item('erapor_lengthpassword');
        }

         $passwordgeneratekuat = $this->generateStrongPassword($panjangpassword);
            $data_password = hash('sha512', $this->input->post('user_password')  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($this->input->post('user_password'), config_item('erapor_tokenkey'));
        $data = array(
                'user_password' => $data_password,
                'user_token' => $data_token,
               
                
            );
        $this->password_siswa_m->update(array('user_id' => $this->input->post('user_id')), $data);
        echo json_encode(array("status" => TRUE));
    }



    public function ajax_update_guru()
    {   
        $fanicode = new ofanienkrip();
        $this->_validate();
        
         if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
         $panjangpassword = 6;
        } else {
         $panjangpassword = config_item('erapor_lengthpassword');
        }
         $passwordgeneratekuat = $this->generateStrongPassword($panjangpassword);
            $data_password = hash('sha512', $this->input->post('user_password')  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($this->input->post('user_password'), config_item('erapor_tokenkey'));
        $data = array(
                'user_password' => $data_password,
                'user_token' => $data_token,
               
                
            );
        $this->password_guru_m->update(array('user_id' => $this->input->post('user_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_generator()
    {   
        
        $this->_generator();
        echo json_encode(array("status" => TRUE));
    }

    // public function ajax_email($id)
    // {   
    //     $this->_emailcek($id);
    //      $fanicode = new ofanienkrip();

    //     $dataemail = '
    //     <div><div><div class="adM">



    //     </div><table style="font:11px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr valign="top"><td colspan="3"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr valign="top"><td width="130px;"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci4.googleusercontent.com/proxy/xZNDGA5_1UKO9pUFAdIpp1LaL6Hept2H0b8t3IY8yKOrTVpeL-apUAnjGFLWEeL2JhrwQ8Uw3B5McwJo4_Iy2jWF-ncXXpQccnXR8enjjwAc74d4qvD0i7M4WQ=s0-d-e1-ft" style="vertical-align:bottom" alt="" border="0" height="13"></td></tr><tr><td style="background:url(https://ci4.googleusercontent.com/proxy/N0L944HCjnvwWRXBljU4ZfipjEACBbT74c9tnfqjqcKRHYJAfxxlQr8rOPL_ETHsSXpPLpwREJOI33BTHDZw2jjZ=s0-d-e1-ft) left repeat-y;border-left:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td><td style="width:530px;word-wrap:break-word;padding:12px;margin:0" width="530"><table style="font:Verdana,Arial,Helvetica,sans-serif" width="100%"><tbody><tr><td><h3><span>Informasi Data Akun Raport Online :</span></h3></td></tr></tbody></table><p>Kepada saudara, <b> '. $this->get_namaguru($id).' </b>,</p><p>Berikut merupakan informasi data login dan password yang dapat Anda gunakan untuk masuk ke Sistem Informasi Raport Online :</span>.</p>

    //     <table style="font:11px Verdana,Arial,Helvetica,sans-serif" border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr><td style="background-color:#e8f1fa"></ol>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserLogin : <b>'.$this->get_kodeguru($id).'</b> </p>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserPassword : <b>'.$fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')).'</b></p>


    //     <div style="width:502px;overflow:hidden"><div style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><strong>Perhatian : </strong>Anda dapat melakukan login melalui link dibawah ini: <br><div style="width:400px;word-wrap:break-word;float:left"><a href="'.site_url().'" target="_blank">'.site_url().'</a>
    //     </div></div></div></td></tr></tbody></table>


    //     <p>Jika Anda mengetahui aktivitas mencurigakan terkait pencurian informasi data password dll, beritahu kami segera, karena membantu kami mencegah penipu mencuri informasi Anda.</p><p>


    //     <table style="border:1px solid #eee;font:11px Verdana,Arial,Helvetica,sans-serif" cellpadding="10" cellspacing="0"><tbody><tr><td style="margin:0;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333">Tips untuk membantu melindungi password Anda :<ul><li> Jangan pernah berbagi password Anda dengan siapa pun.</li><li> Membuat password yang sulit ditebak dan tidak menggunakan informasi pribadi. Pastikan untuk menyertakan huruf besar dan huruf kecil, angka, dan simbol.</li><li>Gunakan password yang berbeda untuk setiap akun online Anda.</li></ul></td></tr></tbody></table>
    //     <br>

    //     Terima Kasih,<br>Administrator Raport</p>



    //     </td><td style="background:url(https://ci6.googleusercontent.com/proxy/tJTSIiFFJTeNg6bI5dXgfivt4w1ZtT2c02j-j3GFrBF0ZzIyiv2nvAOyuL-RION8gcGrrOpUgynLsDbpQcdYS5EVlQ=s0-d-e1-ft#http:///i/scr/scr_emailRightBorder_13wx1h.gif) left repeat-y;border-right:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci3.googleusercontent.com/proxy/rYUsleDJT242YjEISsbt9CCdCMfWwysEZTQwMlncayaefcC3-cRHbRc1zl9YkK8XsFexpny91POz0CVdkBRx-4yBHQMxR7AdY_nz20XQoTBJOhTypEkJyyFgN1obog=s0-d-e1-ft" alt="" border="0" height="13"></td></tr></tbody></table><table style="padding-top:20px;font:10px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr><td><div style="margin:5px 0;padding:0">Help<span style="color:#ccc"> | </span>Security Centre</div>

    //     <p>Copyright © 2016 Sistem Informasi Raport Online Inc. All rights reserved.</p>
    //     </td></tr></tbody></table></div></div>
    //     ';
        
    //     $config = array(
    //         'protocol'=>'smtp',
    //         'smtp_host'=>'ssl://smtp.googlemail.com',
    //         'smtp_port'=>465,
    //         'smtp_user'=>'raportsmk@gmail.com',
    //         'smtp_pass'=>'151094sawangan',
    //         'mailtype' => 'html',
    //         'charset' => 'iso-8859-1',
    //         'wordwrap' => TRUE,
    //         'crlf' => "\r\n",
    //         'newline' => "\r\n"
  
    //     );

    // $this->load->library('email',$config);
    // $this->email->from('raportsmk@gmail.com', 'Raport Online Sistem');
    // $this->email->to($this->get_emailguru($id));
    // $this->email->subject('Informasi Account Raport Online SMK : '.$this->get_namaguru($id));
    // $this->email->message($dataemail);
    // $this->email->send();
    // $this->_emailsuccess($id);
    // }

    // public function ajax_email_siswa($id)
    // {   
    //     $this->_emailceksiswa($id);
    //      $fanicode = new ofanienkrip();

    //     $dataemail = '
    //     <div><div><div class="adM">



    //     </div><table style="font:11px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr valign="top"><td colspan="3"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr valign="top"><td width="130px;"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci4.googleusercontent.com/proxy/xZNDGA5_1UKO9pUFAdIpp1LaL6Hept2H0b8t3IY8yKOrTVpeL-apUAnjGFLWEeL2JhrwQ8Uw3B5McwJo4_Iy2jWF-ncXXpQccnXR8enjjwAc74d4qvD0i7M4WQ=s0-d-e1-ft" style="vertical-align:bottom" alt="" border="0" height="13"></td></tr><tr><td style="background:url(https://ci4.googleusercontent.com/proxy/N0L944HCjnvwWRXBljU4ZfipjEACBbT74c9tnfqjqcKRHYJAfxxlQr8rOPL_ETHsSXpPLpwREJOI33BTHDZw2jjZ=s0-d-e1-ft) left repeat-y;border-left:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td><td style="width:530px;word-wrap:break-word;padding:12px;margin:0" width="530"><table style="font:Verdana,Arial,Helvetica,sans-serif" width="100%"><tbody><tr><td><h3><span>Informasi Data Akun Raport Online :</span></h3></td></tr></tbody></table><p>Kepada saudara, <b> '. $this->get_namasiswa($id).' </b>,</p><p>Berikut merupakan informasi data login dan password yang dapat Anda gunakan untuk masuk ke Sistem Informasi Raport Online :</span>.</p>

    //     <table style="font:11px Verdana,Arial,Helvetica,sans-serif" border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr><td style="background-color:#e8f1fa"></ol>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserLogin : <b>'.$this->get_kodesiswa($id).'</b> </p>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserPassword : <b>'.$fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')).'</b></p>


    //     <div style="width:502px;overflow:hidden"><div style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><strong>Perhatian : </strong>Anda dapat melakukan login melalui link dibawah ini: <br><div style="width:400px;word-wrap:break-word;float:left"><a href="'.site_url().'" target="_blank">'.site_url().'</a>
    //     </div></div></div></td></tr></tbody></table>


    //     <p>Jika Anda mengetahui aktivitas mencurigakan terkait pencurian informasi data password dll, beritahu kami segera, karena membantu kami mencegah penipu mencuri informasi Anda.</p><p>


    //     <table style="border:1px solid #eee;font:11px Verdana,Arial,Helvetica,sans-serif" cellpadding="10" cellspacing="0"><tbody><tr><td style="margin:0;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333">Tips untuk membantu melindungi password Anda :<ul><li> Jangan pernah berbagi password Anda dengan siapa pun.</li><li> Membuat password yang sulit ditebak dan tidak menggunakan informasi pribadi. Pastikan untuk menyertakan huruf besar dan huruf kecil, angka, dan simbol.</li><li>Gunakan password yang berbeda untuk setiap akun online Anda.</li></ul></td></tr></tbody></table>
    //     <br>

    //     Terima Kasih,<br>Administrator Raport</p>



    //     </td><td style="background:url(https://ci6.googleusercontent.com/proxy/tJTSIiFFJTeNg6bI5dXgfivt4w1ZtT2c02j-j3GFrBF0ZzIyiv2nvAOyuL-RION8gcGrrOpUgynLsDbpQcdYS5EVlQ=s0-d-e1-ft#http:///i/scr/scr_emailRightBorder_13wx1h.gif) left repeat-y;border-right:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci3.googleusercontent.com/proxy/rYUsleDJT242YjEISsbt9CCdCMfWwysEZTQwMlncayaefcC3-cRHbRc1zl9YkK8XsFexpny91POz0CVdkBRx-4yBHQMxR7AdY_nz20XQoTBJOhTypEkJyyFgN1obog=s0-d-e1-ft" alt="" border="0" height="13"></td></tr></tbody></table><table style="padding-top:20px;font:10px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr><td><div style="margin:5px 0;padding:0">Help<span style="color:#ccc"> | </span>Security Centre</div>

    //     <p>Copyright © 2016 Sistem Informasi Raport Online Inc. All rights reserved.</p>
    //     </td></tr></tbody></table></div></div>
    //     ';
        
    //     $config = array(
    //         'protocol'=>'smtp',
    //         'smtp_host'=>'ssl://smtp.googlemail.com',
    //         'smtp_port'=>465,
    //         'smtp_user'=>'raportsmk@gmail.com',
    //         'smtp_pass'=>'151094sawangan',
    //         'mailtype' => 'html',
    //         'charset' => 'iso-8859-1',
    //         'wordwrap' => TRUE,
    //         'crlf' => "\r\n",
    //         'newline' => "\r\n"
  
    //     );

    // $this->load->library('email',$config);
    // $this->email->from('raportsmk@gmail.com', 'Raport Online Sistem');
    // $this->email->to($this->get_emailsiswa($id));
    // $this->email->subject('Informasi Account Raport Online SMK : '.$this->get_namasiswa($id));
    // $this->email->message($dataemail);
    // $this->email->send();
    // $this->_emailsuccesssiswa($id);
    // }



    // public function ajax_sms($id)
    // {   

    //     $this->_smscek($id);
       
    //     $fanicode = new ofanienkrip();
    //     $notelp = $this->get_telpguru($id);
    //     $namaguru = urlencode($this->get_namaguru($id));
    //     $password = urlencode($fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')));
    //     $isipesan = 'Kepada%20saudara%20:%20'.$namaguru.'%0AInformasi%20data%20login%20raport%20Anda%20adalah:%0Auser:%20'.$this->get_kodeguru($id).'%0Apassword:%20'.$password.'%0ALoginPage:'.site_url().'%0A';
    //     $isipesan2 = 'Kepada%20Saudara%20OfaniDariyan,apakabar,sedangapadisana?semogabaik2saja...';
    //     file_get_contents('https://reguler.zenziva.net/apps/smsapi.php?userkey=ok0fp2&passkey=arsyhad30&nohp='.$notelp.'&pesan='.$isipesan);
    //     $this->_smssuccess($id);
    // }

    //  public function ajax_sms_siswa($id)
    // {   

    //     $this->_smsceksiswa($id);
       
    //     $fanicode = new ofanienkrip();
    //     $notelp = $this->get_telpsiswa($id);
    //     $namasiswa = urlencode($this->get_namasiswa($id));
    //     $password = urlencode($fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')));
    //     $isipesan = 'Kepada%20saudara%20:%20'.$namasiswa.'%0AInformasi%20data%20login%20raport%20Anda%20adalah:%0Auser:%20'.$this->get_kodesiswa($id).'%0Apassword:%20'.$password.'%0ALoginPage:'.site_url().'%0A';
    //     $isipesan2 = 'Kepada%20Saudara%20OfaniDariyan,apakabar,sedangapadisana?semogabaik2saja...';
    //     file_get_contents('https://reguler.zenziva.net/apps/smsapi.php?userkey=ok0fp2&passkey=arsyhad30&nohp='.$notelp.'&pesan='.$isipesan);
    //     $this->_smssuccesssiswa($id);
    // }

    //  public function ajax_email_selected($id)
    // {   

    //     $this->_emailcekselected($id);
    //      $fanicode = new ofanienkrip();

    //     $dataemail = '
    //     <div><div><div class="adM">



    //     </div><table style="font:11px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr valign="top"><td colspan="3"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr valign="top"><td width="130px;"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci4.googleusercontent.com/proxy/xZNDGA5_1UKO9pUFAdIpp1LaL6Hept2H0b8t3IY8yKOrTVpeL-apUAnjGFLWEeL2JhrwQ8Uw3B5McwJo4_Iy2jWF-ncXXpQccnXR8enjjwAc74d4qvD0i7M4WQ=s0-d-e1-ft" style="vertical-align:bottom" alt="" border="0" height="13"></td></tr><tr><td style="background:url(https://ci4.googleusercontent.com/proxy/N0L944HCjnvwWRXBljU4ZfipjEACBbT74c9tnfqjqcKRHYJAfxxlQr8rOPL_ETHsSXpPLpwREJOI33BTHDZw2jjZ=s0-d-e1-ft) left repeat-y;border-left:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td><td style="width:530px;word-wrap:break-word;padding:12px;margin:0" width="530"><table style="font:Verdana,Arial,Helvetica,sans-serif" width="100%"><tbody><tr><td><h3><span>Informasi Data Akun Raport Online :</span></h3></td></tr></tbody></table><p>Kepada saudara, <b> '. $this->get_namaguru($id).' </b>,</p><p>Berikut merupakan informasi data login dan password yang dapat Anda gunakan untuk masuk ke Sistem Informasi Raport Online :</span>.</p>

    //     <table style="font:11px Verdana,Arial,Helvetica,sans-serif" border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr><td style="background-color:#e8f1fa"></ol>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserLogin : <b>'.$this->get_kodeguru($id).'</b> </p>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserPassword : <b>'.$fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')).'</b></p>


    //     <div style="width:502px;overflow:hidden"><div style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><strong>Perhatian : </strong>Anda dapat melakukan login melalui link dibawah ini: <br><div style="width:400px;word-wrap:break-word;float:left"><a href="'.site_url().'" target="_blank">'.site_url().'</a>
    //     </div></div></div></td></tr></tbody></table>


    //     <p>Jika Anda mengetahui aktivitas mencurigakan terkait pencurian informasi data password dll, beritahu kami segera, karena membantu kami mencegah penipu mencuri informasi Anda.</p><p>


    //     <table style="border:1px solid #eee;font:11px Verdana,Arial,Helvetica,sans-serif" cellpadding="10" cellspacing="0"><tbody><tr><td style="margin:0;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333">Tips untuk membantu melindungi password Anda :<ul><li> Jangan pernah berbagi password Anda dengan siapa pun.</li><li> Membuat password yang sulit ditebak dan tidak menggunakan informasi pribadi. Pastikan untuk menyertakan huruf besar dan huruf kecil, angka, dan simbol.</li><li>Gunakan password yang berbeda untuk setiap akun online Anda.</li></ul></td></tr></tbody></table>
    //     <br>

    //     Terima Kasih,<br>Administrator Raport</p>



    //     </td><td style="background:url(https://ci6.googleusercontent.com/proxy/tJTSIiFFJTeNg6bI5dXgfivt4w1ZtT2c02j-j3GFrBF0ZzIyiv2nvAOyuL-RION8gcGrrOpUgynLsDbpQcdYS5EVlQ=s0-d-e1-ft#http:///i/scr/scr_emailRightBorder_13wx1h.gif) left repeat-y;border-right:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci3.googleusercontent.com/proxy/rYUsleDJT242YjEISsbt9CCdCMfWwysEZTQwMlncayaefcC3-cRHbRc1zl9YkK8XsFexpny91POz0CVdkBRx-4yBHQMxR7AdY_nz20XQoTBJOhTypEkJyyFgN1obog=s0-d-e1-ft" alt="" border="0" height="13"></td></tr></tbody></table><table style="padding-top:20px;font:10px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr><td><div style="margin:5px 0;padding:0">Help<span style="color:#ccc"> | </span>Security Centre</div>

    //     <p>Copyright © 2016 Sistem Informasi Raport Online Inc. All rights reserved.</p>
    //     </td></tr></tbody></table></div></div>
    //     ';
        
    //     $config = array(
    //         'protocol'=>'smtp',
    //         'smtp_host'=>'ssl://smtp.googlemail.com',
    //         'smtp_port'=>465,
    //         'smtp_user'=>'raportsmk@gmail.com',
    //         'smtp_pass'=>'151094sawangan',
    //         'mailtype' => 'html',
    //         'charset' => 'iso-8859-1',
    //         'wordwrap' => TRUE,
    //         'crlf' => "\r\n",
    //         'newline' => "\r\n"
  
    //     );

    // $this->load->library('email',$config);
    // $this->email->from('raportsmk@gmail.com', 'Raport Online Sistem');
    // $this->email->to($this->get_emailguru($id));
    // $this->email->subject('Informasi Account Raport Online SMK : '.$this->get_namaguru($id));
    // $this->email->message($dataemail);
    // $this->email->send();
    //     $this->_emailselectedsuccess($id);
    // }

    // public function ajax_email_selected_siswa($id)
    // {   

    //     $this->_emailcekselectedsiswa($id);
    //      $fanicode = new ofanienkrip();

    //     $dataemail = '
    //     <div><div><div class="adM">



    //     </div><table style="font:11px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr valign="top"><td colspan="3"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr valign="top"><td width="130px;"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci4.googleusercontent.com/proxy/xZNDGA5_1UKO9pUFAdIpp1LaL6Hept2H0b8t3IY8yKOrTVpeL-apUAnjGFLWEeL2JhrwQ8Uw3B5McwJo4_Iy2jWF-ncXXpQccnXR8enjjwAc74d4qvD0i7M4WQ=s0-d-e1-ft" style="vertical-align:bottom" alt="" border="0" height="13"></td></tr><tr><td style="background:url(https://ci4.googleusercontent.com/proxy/N0L944HCjnvwWRXBljU4ZfipjEACBbT74c9tnfqjqcKRHYJAfxxlQr8rOPL_ETHsSXpPLpwREJOI33BTHDZw2jjZ=s0-d-e1-ft) left repeat-y;border-left:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td><td style="width:530px;word-wrap:break-word;padding:12px;margin:0" width="530"><table style="font:Verdana,Arial,Helvetica,sans-serif" width="100%"><tbody><tr><td><h3><span>Informasi Data Akun Raport Online :</span></h3></td></tr></tbody></table><p>Kepada saudara, <b> '. $this->get_namasiswa($id).' </b>,</p><p>Berikut merupakan informasi data login dan password yang dapat Anda gunakan untuk masuk ke Sistem Informasi Raport Online :</span>.</p>

    //     <table style="font:11px Verdana,Arial,Helvetica,sans-serif" border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr><td style="background-color:#e8f1fa"></ol>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserLogin : <b>'.$this->get_kodesiswa($id).'</b> </p>

    //     <p style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/EtX3-AT6fJU9I4XvFbyBC3iZ5dougTbB-AnmAx7uvwId7EWJMt56Y6XyBQX0Xd8n_XCfqqwXvoTWLKUaOWWVqvQEsO6uKwFQuYaowA=s0-d-e1-ft" alt="" border="0">&nbsp;&nbsp;UserPassword : <b>'.$fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')).'</b></p>


    //     <div style="width:502px;overflow:hidden"><div style="width:410px;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333"><strong>Perhatian : </strong>Anda dapat melakukan login melalui link dibawah ini: <br><div style="width:400px;word-wrap:break-word;float:left"><a href="'.site_url().'" target="_blank">'.site_url().'</a>
    //     </div></div></div></td></tr></tbody></table>


    //     <p>Jika Anda mengetahui aktivitas mencurigakan terkait pencurian informasi data password dll, beritahu kami segera, karena membantu kami mencegah penipu mencuri informasi Anda.</p><p>


    //     <table style="border:1px solid #eee;font:11px Verdana,Arial,Helvetica,sans-serif" cellpadding="10" cellspacing="0"><tbody><tr><td style="margin:0;font:11px Verdana,Arial,Helvetica,sans-serif;color:#333">Tips untuk membantu melindungi password Anda :<ul><li> Jangan pernah berbagi password Anda dengan siapa pun.</li><li> Membuat password yang sulit ditebak dan tidak menggunakan informasi pribadi. Pastikan untuk menyertakan huruf besar dan huruf kecil, angka, dan simbol.</li><li>Gunakan password yang berbeda untuk setiap akun online Anda.</li></ul></td></tr></tbody></table>
    //     <br>

    //     Terima Kasih,<br>Administrator Raport</p>



    //     </td><td style="background:url(https://ci6.googleusercontent.com/proxy/tJTSIiFFJTeNg6bI5dXgfivt4w1ZtT2c02j-j3GFrBF0ZzIyiv2nvAOyuL-RION8gcGrrOpUgynLsDbpQcdYS5EVlQ=s0-d-e1-ft#http:///i/scr/scr_emailRightBorder_13wx1h.gif) left repeat-y;border-right:1px solid #ddd" width="12"><img class="CToWUd" src="https://ci6.googleusercontent.com/proxy/tKK2KQA-Vcfw6YcmEbTdrCI6ik_Y0tOL9GkOwcdsYjpikB6_wvkjFgzsRQCi0ZjEigrOyWTCKQsMBCnNNQr1kFWg9N0=s0-d-e1-ft" alt="" border="0"></td></tr><tr><td colspan="3"><img class="CToWUd" src="https://ci3.googleusercontent.com/proxy/rYUsleDJT242YjEISsbt9CCdCMfWwysEZTQwMlncayaefcC3-cRHbRc1zl9YkK8XsFexpny91POz0CVdkBRx-4yBHQMxR7AdY_nz20XQoTBJOhTypEkJyyFgN1obog=s0-d-e1-ft" alt="" border="0" height="13"></td></tr></tbody></table><table style="padding-top:20px;font:10px Verdana,Arial,Helvetica,sans-serif;color:#333" border="0" cellpadding="0" cellspacing="0" width="580"><tbody><tr><td><div style="margin:5px 0;padding:0">Help<span style="color:#ccc"> | </span>Security Centre</div>

    //     <p>Copyright © 2016 Sistem Informasi Raport Online Inc. All rights reserved.</p>
    //     </td></tr></tbody></table></div></div>
    //     ';
        
    //     $config = array(
    //         'protocol'=>'smtp',
    //         'smtp_host'=>'ssl://smtp.googlemail.com',
    //         'smtp_port'=>465,
    //         'smtp_user'=>'raportsmk@gmail.com',
    //         'smtp_pass'=>'151094sawangan',
    //         'mailtype' => 'html',
    //         'charset' => 'iso-8859-1',
    //         'wordwrap' => TRUE,
    //         'crlf' => "\r\n",
    //         'newline' => "\r\n"
  
    //     );

    // $this->load->library('email',$config);
    // $this->email->from('raportsmk@gmail.com', 'Raport Online Sistem');
    // $this->email->to($this->get_emailsiswa($id));
    // $this->email->subject('Informasi Account Raport Online SMK : '.$this->get_namasiswa($id));
    // $this->email->message($dataemail);
    // $this->email->send();
    //     $this->_emailselectedsuccesssiswa($id);
    // }


    

    //      public function ajax_sms_selected($id)
    // {   

    //     $this->_smscekselected($id);
    //      $fanicode = new ofanienkrip();
    //      $notelp = $this->get_telpguru($id);
    //     $namaguru = urlencode($this->get_namaguru($id));
    //     $password = urlencode($fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')));
    //     $isipesan = 'Kepada%20saudara%20:%20'.$namaguru.'%0AInformasi%20data%20login%20raport%20Anda%20adalah:%0Auser:%20'.$this->get_kodeguru($id).'%0Apassword:%20'.$password.'%0ALoginPage:'.site_url().'%0A';
    //     $isipesan2 = 'Kepada%20Saudara%20OfaniDariyan,apakabar,sedangapadisana?semogabaik2saja...';
    //     file_get_contents('https://reguler.zenziva.net/apps/smsapi.php?userkey=ok0fp2&passkey=arsyhad30&nohp='.$notelp.'&pesan='.$isipesan);
    //     $this->_smsselectedsuccess($id);
    // }


    // public function ajax_sms_selected_siswa($id)
    // {   

    //     $this->_smscekselectedsiswa($id);
    //      $fanicode = new ofanienkrip();
    //      $notelp = $this->get_telpsiswa($id);
    //     $namasiswa = urlencode($this->get_namasiswa($id));
    //     $password = urlencode($fanicode->decode($this->get_passworduser($id), config_item('erapor_tokenkey')));
    //     $isipesan = 'Kepada%20saudara%20:%20'.$namasiswa.'%0AInformasi%20data%20login%20raport%20Anda%20adalah:%0Auser:%20'.$this->get_kodesiswa($id).'%0Apassword:%20'.$password.'%0ALoginPage:'.site_url().'%0A';
    //     $isipesan2 = 'Kepada%20Saudara%20OfaniDariyan,apakabar,sedangapadisana?semogabaik2saja...';
    //     file_get_contents('https://reguler.zenziva.net/apps/smsapi.php?userkey=ok0fp2&passkey=arsyhad30&nohp='.$notelp.'&pesan='.$isipesan);

    //     $this->_smsselectedsuccesssiswa($id);
    // }


    

    public function update_password_guru() {
        $fanicode = new ofanienkrip();
       
         if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
         $panjangpassword = 6;
        } else {
         $panjangpassword = config_item('erapor_lengthpassword');
        }

        for ($id = 1; $id <= 5; $id++) {
            $passwordgeneratekuat = $this->generateStrongPassword($panjangpassword);
            $data_password = hash('sha512', $passwordgeneratekuat  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($passwordgeneratekuat, config_item('erapor_tokenkey'));
        
           $data = array(
               
               'user_password' => $data_password,
               'user_token' =>  $data_token
            );

            $this->db->set($data);
            $this->db->where('user_id', $id);
            $this->db->update('raport_users');

            echo 'data dengan id : '.$id. ' berhasil di update' ;
            echo '<br>';
        } 


      
    }

    public function update_password_siswa() {
        $fanicode = new ofanienkrip();
       
        if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
         $panjangpassword = 6;
        } else {
         $panjangpassword = config_item('erapor_lengthpassword');
        }

        for ($id = 318; $id <= 4789; $id++) {
            $passwordgeneratekuat = $this->generateStrongPassword($panjangpassword);
            $data_password = hash('sha512', $passwordgeneratekuat  . config_item('encryption_key'));
            $data_token    = $fanicode->encode($passwordgeneratekuat, config_item('erapor_tokenkey'));
        
           $data = array(
               
               'user_password' => $data_password,
               'user_token' =>  $data_token
            );

            $this->db->set($data);
            $this->db->where('user_id', $id);
            $this->db->update('raport_users');

            echo 'data dengan id : '.$id. ' berhasil di update' ;
            echo '<br>';
        } 


      
    }

    public function update_datapassword($kelas) {
        $fanicode = new ofanienkrip();
       
        $query = $this->db->query("SELECT siswa_nama, siswa_nis FROM raport_siswa WHERE siswa_nis ='".$this->db->escape_str($kelas)."'");

foreach ($query->result() as $row)

{   
    $data_token    = $fanicode->encode($row->siswa_nis, config_item('erapor_tokenkey'));
        $data_password = hash('sha512', $row->siswa_nis  . config_item('encryption_key'));
           $data = array(
               
               'user_password' => $data_password,
               'user_token' =>  $data_token
            );

            $this->db->set($data);
            $this->db->where('user_login', $row->siswa_nis);
            $this->db->update('raport_users');
   echo 'Data Password dengan nama siswa '.$row->siswa_nama.' - '.$row->siswa_nis.' berhasil di update :)';
   echo '<br>';
}
      
    }

     public function cek_password_guru() {
        $fanicode = new ofanienkrip();
        
        echo $fanicode->decode('d/Tni9fWJ/M4cb44J9TQlibwSd1ssOWRT7z/j92d1Gi/YlmjjqUdOaYRXGScPslJmYek3ljBBeu8pq5axGfNig==', config_item('erapor_tokenkey'));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        
         
       
       if(strlen($this->input->post('user_password')) < 8)
        {
            $data['inputerror'][] = 'user_password';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Password harus memiliki panjang data minimal <b>8 karakter</b>.';
            $data['status'] = FALSE;
        }


        if($this->input->post('user_password') == '')
        {
            $data['inputerror'][] = 'user_password';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum menginput data <b>password</b>.';
            $data['status'] = FALSE;
        }



        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _generator()
    {
        $data = array();
        if (config_item('erapor_lengthpassword') < 6 || config_item('erapor_lengthpassword')  == FALSE) {
         $panjangpassword = 6;
        } else {
         $panjangpassword = config_item('erapor_lengthpassword');
        }
        $data['password_generator'] = $this->generateStrongPassword($panjangpassword);
        $data['status'] = FALSE;

        

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    // private function _emailsuccess($id)
    // {
    //     $data = array();
    //     $data['email_cek'] = array();
    //     $data['email_cek'][] = '<div class="alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim ke email : <strong>'. $this->get_emailguru($id).'</strong> atas nama guru: <b> '. $this->get_namaguru($id).'</b>.</div><div class="tutup-mapel-hr"> <hr><div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }

    // private function _emailsuccesssiswa($id)
    // {
    //     $data = array();
    //     $data['email_cek'] = array();
    //     $data['email_cek'][] = '<div class="alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim ke email : <strong>'. $this->get_emailsiswa($id).'</strong> atas nama siswa: <b> '. $this->get_namasiswa($id).'</b>.</div><div class="tutup-mapel-hr"> <hr><div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }

    //  private function _emailselectedsuccess($id)
    // {
    //     $data = array();
    //     $data['email_selected'] = array();
    //     $data['email_selected'][] = '<div class="remove-notif-clear remove-notif alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim ke email : <strong>'. $this->get_emailguru($id).'</strong> atas nama guru: <b> '. $this->get_namaguru($id).'</b>.</div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }

    // private function _emailselectedsuccesssiswa($id)
    // {
    //     $data = array();
    //     $data['email_selected'] = array();
    //     $data['email_selected'][] = '<div class="remove-notif-clear remove-notif alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim ke email : <strong>'. $this->get_emailsiswa($id).'</strong> atas nama siswa: <b> '. $this->get_namasiswa($id).'</b>.</div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }


    // private function _emailcekselected($id)
    // {
    //     $data = array();
    //     $data['email_cek'] = array();
    //     $data['status'] = TRUE;

       
    //     if (!filter_var($this->get_emailguru($id), FILTER_VALIDATE_EMAIL) === true && trim($this->get_emailguru($id) !== '') && trim($this->get_emailguru($id) !== NULL)) {
           
            
    //             $data['email_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email atas nama : <b>'. $this->get_namaguru($id).'</b> tidak valid, mohon untuk memeriksa kembali data email pada user terkait.</div>';
    //             $data['status'] = FALSE;
           
           
    //     }

    //      if ($this->get_emailguru($id) == '') {
           
    //         $data['email_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>email</b> atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data email pada user terkait.</div>';
    //         $data['status'] = FALSE;
    //     }

        

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }

    // private function _emailcekselectedsiswa($id)
    // {
    //     $data = array();
    //     $data['email_cek'] = array();
    //     $data['status'] = TRUE;

       
    //     if (!filter_var($this->get_emailsiswa($id), FILTER_VALIDATE_EMAIL) === true && trim($this->get_emailsiswa($id) !== '') && trim($this->get_emailsiswa($id) !== NULL)) {
           
            
    //             $data['email_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email atas nama : <b>'. $this->get_namasiswa($id).'</b> tidak valid, mohon untuk memeriksa kembali data email pada user terkait.</div>';
    //             $data['status'] = FALSE;
           
           
    //     }

    //      if ($this->get_emailsiswa($id) == '') {
           
    //         $data['email_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>email</b> atas nama : <b>'. $this->get_namasiswa($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data email pada user terkait.</div>';
    //         $data['status'] = FALSE;
    //     }

        

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }


    //  private function _smsselectedsuccess($id)
    // {
    //     $data = array();
    //     $data['sms_selected'] = array();
    //     $data['sms_selected'][] = '<div class="remove-notif-clear remove-notif alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim via SMS ke nomor : <strong>'. $this->get_telpguru($id).'</strong> atas nama guru: <b> '. $this->get_namaguru($id).'</b>.</div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }

    // private function _smsselectedsuccesssiswa($id)
    // {
    //     $data = array();
    //     $data['sms_selected'] = array();
    //     $data['sms_selected'][] = '<div class="remove-notif-clear remove-notif alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim via SMS ke nomor : <strong>'. $this->get_telpsiswa($id).'</strong> atas nama siswa: <b> '. $this->get_namasiswa($id).'</b>.</div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }


    // private function _smscekselected($id)
    // {
    //     $data = array();
    //     $data['sms_cek'] = array();
    //     $data['status'] = TRUE;

       

    //      if ($this->get_telpguru($id) == '') {
           
    //         $data['sms_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no handphone</b> atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data nomor HP pada user terkait.</div>';
    //         $data['status'] = FALSE;
    //     }

    //     if ($this->get_telpguru($id) == '-') {
           
    //         $data['sms_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no handphone</b> atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data nomor HP pada user terkait.</div>';
    //         $data['status'] = FALSE;
    //     }

        

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }


    // private function _smscekselectedsiswa($id)
    // {
    //     $data = array();
    //     $data['sms_cek'] = array();
    //     $data['status'] = TRUE;

       

    //      if ($this->get_telpsiswa($id) == '') {
           
    //         $data['sms_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no handphone</b> atas nama : <b>'. $this->get_namasiswa($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data nomor HP pada user terkait.</div>';
    //         $data['status'] = FALSE;
    //     }

    //     if ($this->get_telpsiswa($id) == '-') {
           
    //         $data['sms_cek'][] = '<div class="remove-notif-clear alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>no handphone</b> atas nama : <b>'. $this->get_namasiswa($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data nomor HP pada user terkait.</div>';
    //         $data['status'] = FALSE;
    //     }

        

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }

    // private function _emailcek($id)
    // {
    //     $data = array();
    //     $data['email_cek'] = array();
    //     $data['status'] = TRUE;

       
    //      if (!filter_var($this->get_emailguru($id), FILTER_VALIDATE_EMAIL) === true && trim($this->get_emailguru($id) !== '') && trim($this->get_emailguru($id) !== NULL)) {
           
    //         $data['email_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email atas nama : <b>'. $this->get_namaguru($id).'</b> tidak valid, mohon untuk memeriksa kembali data email pada user terkait.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }

    //      if ($this->get_emailguru($id) == '') {
           
    //         $data['email_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>email</b> atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data email pada user terkait.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }

        

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }

    // private function _emailceksiswa($id)
    // {
    //     $data = array();
    //     $data['email_cek'] = array();
    //     $data['status'] = TRUE;

       
    //      if (!filter_var($this->get_emailsiswa($id), FILTER_VALIDATE_EMAIL) === true && trim($this->get_emailsiswa($id) !== '') && trim($this->get_emailsiswa($id) !== NULL)) {
           
    //         $data['email_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Format email atas nama : <b>'. $this->get_namasiswa($id).'</b> tidak valid, mohon untuk memeriksa kembali data email pada user terkait.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }

    //      if ($this->get_emailsiswa($id) == '') {
           
    //         $data['email_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>email</b> atas nama : <b>'. $this->get_namasiswa($id).'</b> saat ini <b>tidak tersedia</b>, mohon untuk memeriksa kembali data email pada user terkait.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }

        

    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }

    // private function _smssuccess($id)
    // {
    //     $data = array();
    //     $data['sms_cek'] = array();
    //     $data['sms_cek'][] = '<div class="alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim ke nomor : <strong>'. $this->get_telpguru($id).'</strong> atas nama guru: <b> '. $this->get_namaguru($id).'</b>.</div><div class="tutup-mapel-hr"> <hr><div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }

    // private function _smssuccesssiswa($id)
    // {
    //     $data = array();
    //     $data['sms_cek'] = array();
    //     $data['sms_cek'][] = '<div class="alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Data password berhasil terkirim ke nomor : <strong>'. $this->get_telpsiswa($id).'</strong> atas nama guru: <b> '. $this->get_namasiswa($id).'</b>.</div><div class="tutup-mapel-hr"> <hr><div>';
    //     $data['status'] = TRUE;

    //      echo json_encode($data);
        
    // }

    // private function _smscek($id)
    // {
    //     $data = array();
    //     $data['sms_cek'] = array();
    //     $data['status'] = TRUE;

        
    //      if ($this->get_telpguru($id) == '-') {
           
    //         $data['sms_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nomor handphone</b> atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b> tidak tersedia</b>, mohon untuk menginput data nomor handphone sebelum mengirim data password melalui sms.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }


    //     if ($this->get_telpguru($id) == '') {
           
    //         $data['sms_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data nomor handphone atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b> tidak tersedia</b>, mohon untuk menginput data nomor handphone sebelum mengirim data password melalui sms.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }


    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }

    // private function _smsceksiswa($id)
    // {
    //     $data = array();
    //     $data['sms_cek'] = array();
    //     $data['status'] = TRUE;

        
    //      if ($this->get_telpsiswa($id) == '-') {
           
    //         $data['sms_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data <b>nomor handphone</b> atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b> tidak tersedia</b>, mohon untuk menginput data nomor handphone sebelum mengirim data password melalui SMS.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }


    //     if ($this->get_telpsiswa($id) == '') {
           
    //         $data['sms_cek'][] = '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data nomor handphone atas nama : <b>'. $this->get_namaguru($id).'</b> saat ini <b> tidak tersedia</b>, mohon untuk menginput data nomor handphone sebelum mengirim data password melalui SMS.</div><div class="tutup-mapel-hr"> <hr><div>';
    //         $data['status'] = FALSE;
    //     }


    //     if($data['status'] === FALSE)
    //     {
    //         echo json_encode($data);
    //         exit();
    //     }
    // }



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


    private function get_namaguru($id) {
        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
           
        }

        return $row->guru_nama;

    }

    private function get_namasiswa($id) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
           
        }

        return $row->siswa_nama;

    }

     private function get_kodeguru($id) {
        $query = $this->db->query('SELECT guru_kode FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_kode;
           
        }

        return $row->guru_kode;

    }

     private function get_kodesiswa($id) {
        $query = $this->db->query('SELECT siswa_nis FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nis;
           
        }

        return $row->siswa_nis;

    }

    // private function get_telpsiswa($id) {
    //     $query = $this->db->query('SELECT siswa_handphone FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');

    //     if ($query->num_rows() > 0)
    //     {
    //     $row = $query->row();

    //      $row->siswa_handphone;
           
    //     }

    //     return $row->siswa_handphone;

    // }


    // private function get_telpguru($id) {
    //     $query = $this->db->query('SELECT guru_notelp FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

    //     if ($query->num_rows() > 0)
    //     {
    //     $row = $query->row();

    //      $row->guru_notelp;
           
    //     }

    //     return $row->guru_notelp;

    // }

    private function get_passworduser($id) {
        $query = $this->db->query('SELECT user_token FROM raport_users WHERE user_login="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->user_token;
           
        }

        return $row->user_token;

    }

    // private function get_emailguru($id) {
    //     $query = $this->db->query('SELECT guru_email FROM raport_guru WHERE guru_kode="'.$this->db->escape_str($id).'"');

    //     if ($query->num_rows() > 0)
    //     {
    //     $row = $query->row();

    //      $row->guru_email;
           
    //     }

    //     return $row->guru_email;

    // }

    // private function get_emailsiswa($id) {
    //     $query = $this->db->query('SELECT siswa_email FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($id).'"');

    //     if ($query->num_rows() > 0)
    //     {
    //     $row = $query->row();

    //      $row->siswa_email;
           
    //     }

    //     return $row->siswa_email;

    // }

   


    
   
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
