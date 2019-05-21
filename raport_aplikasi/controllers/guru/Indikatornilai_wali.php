<?php
class Indikatornilai_wali extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('indikatornilai_m');
        $this->load->model('konfigurasi_m');
        $this->load->model('siswa_m');
        $this->load->model('wali_m');
        
    }

    public function index() {

         
         //Load Data View Data Prestasi
        if (count($this->wali_m->statuswali())) {
         $this->data['subview'] = 'guru/datanilai/Indikatornilai_wali';

        } else {
          $this->data['subview'] = 'guru/accessdenied/Indikatornilai_wali';
        }
        
        $this->load->view('guru/admindesain', $this->data);
    }

   

     public function ajax_list_indikator_nilai()
    {

      $dataangkatan = substr($this->indikatornilai_m->tahunkelaswali(), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('indikator_semester') == 5 || $this->input->post('indikator_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('indikator_semester') == 3 || $this->input->post('indikator_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('indikator_semester') == 1 || $this->input->post('indikator_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


        $list = $this->indikatornilai_m->get_datatables_data_nilai_siswa($this->indikatornilai_m->datakelaswali(), $this->input->post('indikator_semester'), $tahunajaran);
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $indikator) {
            $no++;
            
            

            if ($indikator->UAS == NULL) {
                $nilaiuas = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaiuas = '<i class="fa fa-check font-yellow-lemon"></i>';
            }

              if ($indikator->UTS == NULL) {
                $nilaiuts = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaiuts = '<i class="fa fa-check font-yellow-lemon"></i>';
            }

             if ($indikator->UH == NULL) {
                $nilaiuh = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaiuh = '<span class="badge bg-yellow-lemon">'.$indikator->UH.'</span>';
            }

             if ($indikator->TG == NULL) {
                $nilaitg = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaitg = '<span class="badge bg-yellow-lemon">'.$indikator->TG.'</span>';
            }

            if ($indikator->PS == NULL) {
                $nilaips = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaips = '<span class="badge bg-yellow-lemon">'.$indikator->PS.'</span>';
            }

            if ($indikator->PR == NULL) {
                $nilaipr = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaipr = '<span class="badge bg-yellow-lemon">'.$indikator->PR.'</span>';
            }

            if ($indikator->PO == NULL) {
                $nilaipo = '<i class="fa fa-times font-red"></i>';
            } else {
                $nilaipo = '<span class="badge bg-yellow-lemon">'.$indikator->PO.'</span>';
            }

            

            /*if ($indikator->PENGETAHUAN == NULL) {
                $nilaipengetahuan = '<span class="label label-danger"><i class="fa fa-times"></i></span>';
            } else {

                if ($indikator->UTS !== NULL && $indikator->UAS !== NULL && $indikator->UH >= 3 && $indikator->TG >= 3) {
                    $nilaipengetahuan = '<span class="label label-warning"><i class="fa fa-check"></i></span>';
                } else {
                    $nilaipengetahuan = '<span class="label label-warning"><i class="fa fa-check"></i></span>';
                }
                
                
            }*/

            if ($indikator->UTS !== NULL && $indikator->UAS !== NULL && $indikator->UH >= 3 && $indikator->TG >= 3) {
               $nilaipengetahuan = '<span class="label label-warning"><i class="fa fa-check"></i></span>';
            } elseif ($indikator->PENGETAHUAN !== NULL) {
                $nilaipengetahuan = '<span class="label label-warning"><i class="fa fa-check"></i></span>';
            } else {
                $nilaipengetahuan = '<span class="label label-danger"><i class="fa fa-times"></i></span>';
            }
            

         
            if ($indikator->PS !== NULL || $indikator->PR !== NULL || $indikator->PO !== NULL) {
                $nilaiketerampilan = '<span class="label label-warning"><i class="fa fa-check"></i></span>';
            } elseif ($indikator->KETERAMPILAN !== NULL) {
                $nilaiketerampilan = '<span class="label label-warning"><i class="fa fa-check"></i></span>';
            } else {
                $nilaiketerampilan = '<span class="label label-danger"><i class="fa fa-times"></i></span>';
            }
                

            
           



             if ($indikator->UTS !== NULL && $indikator->UAS !== NULL && $indikator->UH >= 3 && $indikator->TG >= 3 && ($indikator->PS !== NULL || $indikator->PR !== NULL || $indikator->PO !== NULL)) {
                 $indikator_raport = '<span class="label label-warning"><i class="fa fa-check"></i> OKE</span>';
             } elseif ($indikator->PENGETAHUAN !== NULL && $indikator->KETERAMPILAN !== NULL) {
                  $indikator_raport = '<span class="label label-warning"><i class="fa fa-check"></i> OKE</span>';
             } else {
                 $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
             }
             

            /*

            if ($indikator->PENGETAHUAN == NULL && $indikator->KETERAMPILAN == NULL && $indikator->SIKAP == NULL) {
                
                $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';

            } else {



                if ($indikator->PENGETAHUAN == 1 && $indikator->KETERAMPILAN == 1 && $indikator->SIKAP == 1) {
                    $indikator_raport = '<span class="label label-warning"><i class="fa fa-check"></i> OKE</span>';
                } else {
                    
                    if ($indikator->UTS !== NULL && $indikator->UAS !== NULL && $indikator->UH >= 3 && $indikator->TG >= 3 && ($indikator->PS !== NULL || $indikator->PR !== NULL || $indikator->PO !== NULL) && ($indikator->OB !== NULL || $indikator->PD !== NULL || $indikator->JT !== NULL || $indikator->JR !== NULL)) {
                        $indikator_raport = '<span class="label label-warning"><i class="fa fa-check"></i> OKE</span>';
                    } else {
                        
                        $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
                    }

                        /*
                    } elseif ($indikator->UAS !== 1) {
                        $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
                    } elseif ($indikator->UH < 3) {
                        $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
                    } elseif ($indikator->TG < 3) {
                        $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
                    } elseif ($indikator->PS < 0 || $indikator->PR < 0 || $indikator->PO < 0) {
                        $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
                    } elseif ($indikator->OB < 0 || $indikator->PD < 0 || $indikator->JT < 0 || $indikator->JR < 0) {
                        $indikator_raport = '<span class="label label-danger"><i class="fa fa-times"></i> FAIL</span>';
                    } else {

                    }

                    
                }
                

            } */


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$indikator->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<a class=" popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="'.$indikator->guru_nama.'" data-original-title="Pengirim Nilai :">'.$indikator->mapel_nama.'</a>';
            $row[] = '<span class="label label-warning tooltips" data-placement="top" data-original-title="Angkatan : '.$indikator->kelas_tahun.'">'.$indikator->kelas_nama.'</span>';
            $row[] = '<span class="badge bg-yellow">'.$indikator->haknilai_semester.'</span>';
            $row[] = '<span title="" data-original-title="" class="label bg-blue-hoki tooltips"> P: <b>'.$indikator->haknilai_kkm.'</b> - K: <b>'.$indikator->haknilai_kkm2.'</b></span>';
            $row[] = $nilaiuh;
            $row[] = $nilaitg;
            $row[] = $nilaiuts;
            $row[] = $nilaiuas;
            $row[] = $nilaips;
            $row[] = $nilaipr;
            $row[] = $nilaipo;
            //$row[] = $nilaiob;
            //$row[] = $nilaipd;
            //$row[] = $nilaipt;
            //$row[] = $nilaijr;
            $row[] = $nilaipengetahuan;
            $row[] = $nilaiketerampilan;
            //$row[] = $nilaisikap;
            $row[] = $indikator_raport;
           
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->indikatornilai_m->count_all_data_nilai_siswa($this->indikatornilai_m->datakelaswali(), $this->input->post('indikator_semester'), $tahunajaran),
                        "recordsFiltered" => $this->indikatornilai_m->count_filtered_data_nilai_siswa($this->indikatornilai_m->datakelaswali(), $this->input->post('indikator_semester'), $tahunajaran),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);


    }

   

    public function cari_indikator() {

        $this->validasi_cari();

      $dataangkatan = substr($this->indikatornilai_m->tahunkelaswali(), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('indikator-semester') == 5 || $this->input->post('indikator-semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('indikator-semester') == 3 || $this->input->post('indikator-semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('indikator-semester') == 1 || $this->input->post('indikator-semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = '';
      }


      if ($this->input->post('indikator-semester') == 1 || $this->input->post('indikator-semester') == 3 || $this->input->post('indikator-semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('indikator-semester') == 2 || $this->input->post('indikator-semester') == 4 || $this->input->post('indikator-semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = '';
      }


        $rekapdata = $this->indikatornilai_m->count_all_data_nilai_siswa($this->indikatornilai_m->datakelaswali(), $this->input->post('indikator-semester'), $tahunajaran);

        if ($rekapdata == 0) {
         $pesansukses = '<div id="sukses-form-indikator" class="alert alert-danger alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Sistem tidak menemukan <b> rekap data nilai </b> yang sesuai. Rekap <b>data mapel</b> untuk setiap kelas akan muncul, jika data <b>hak mapel</b> telah tersedia.</div>';
        } else {
        $pesansukses = '<div id="sukses-form-indikator" class="alert alert-success alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Data rekap data nilai berhasil ditemukan sebanyak <b>'.$rekapdata.' mata pelajaran</b> kelas <b>'.$this->get_namakelas($this->indikatornilai_m->datakelaswali()).':'.$this->get_tahunkelas($this->indikatornilai_m->datakelaswali()).'</b> pada <b>semester '.$this->input->post('indikator-semester').'</b></div>';
        }
        

        $data = array('suksespesan' => $pesansukses,
                        'infotahun' => $tahunajaran,
                        'infosemester' =>$datasemester, 
                       'status'   => TRUE  );
        echo json_encode($data);
    }


    public function validasi_cari() {
          $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('indikator-semester') !== '1' && $this->input->post('indikator-semester') !== '2' && $this->input->post('indikator-semester') !== '3' && $this->input->post('indikator-semester') !== '4' && $this->input->post('indikator-semester') !== '5' && $this->input->post('indikator-semester') !== '6' && trim($this->input->post('indikator-semester') !== '') && trim($this->input->post('indikator-semester') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->wali_m->statuswali_cek() !== 1) {
           $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf <b>Bpk/Ibu '.$this->siswa_m->namaguruwali().'</b> saat ini anda tidak memiliki tugas untuk <b>mengakses data perwalian</b>.';
            $data['status'] = FALSE;
        }

        /*
        if ($this->cekdatakelas($this->input->post('indikator-kelas')) < 1 && trim($this->input->post('indikator-kelas') !== '') && trim($this->input->post('indikator-kelas') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatatahun($this->input->post('indikator-tahun')) < 1 && trim($this->input->post('indikator-tahun') !== '') && trim($this->input->post('indikator-tahun') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        */


        /*
          if($this->input->post('indikator-tahun') == '')
        {
            $data['inputerror'][] = 'indikator-tahun';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data angkatan</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('indikator-kelas') == '')
        {
            $data['inputerror'][] = 'indikator-kelas';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data kelas</b>.';
            $data['status'] = FALSE;
        }

        if($this->input->post('indikator-semester') == '')
        {
            $data['inputerror'][] = 'indikator-semester';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Anda belum memilih <b> data semester</b>.';
            $data['status'] = FALSE;
        }
        */

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }

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

   
     public function cari_semester_siswa() {


        $tmp  = '';
        $data   = $this->siswa_m->get_data_semester_modal_siswawali();

           
        if(!empty($data)){
            //$tmp .= "<option value=''></option>";
            $no= 0;
            foreach($data as $row) {
                   //$datatahun = substr($tahun, 0 , 4);
                   //$datasemester = intval($datatahun) - substr($row->kelas_tahun, 0 , 4);
                   $no++;

                   if ($no == 1) {
                     echo '<option value=""></option>';
                   }
                   if ($row->kelas_tingkat == 3) {

                        if ($this->konfigurasi_m->konfig_semester_client() == 'genap') {
                          echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option> <option value="4">Semester 4</option><option value="5">Semester 5</option> <option value="6">Semester 6</option>';
                          
                        } else {

                          echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option> <option value="4">Semester 4</option><option value="5">Semester 5</option>';
                          
                        }
                     
                  } elseif ($row->kelas_tingkat == 2) {

                     if ($this->konfigurasi_m->konfig_semester_client() == 'genap') {
                          echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option> <option value="4">Semester 4</option>';
                          
                        } else {

                         echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option><option value="3">Semester 3</option> ';
                          
                        }
                    
                  } elseif ($row->kelas_tingkat == 1) {
                    if ($this->konfigurasi_m->konfig_semester_client() == 'genap') {
                          echo '<option value="1">Semester 1</option> <option value="2">Semester 2</option>';
                          
                        } else {

                         echo '<option value="1">Semester 1</option> ';
                          
                        }
                  } else {
                    echo '<option value="">Semester Tidak Tersedia</option>';
                  }
               
            }
        } else {
            $tmp .= "<option value=''>Semester Tidak Tersedia</option>";
            
        }
        die($tmp);
        
     }
}