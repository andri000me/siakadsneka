<?php
class Rekapnilai extends Gururaport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('rekapnilai_m');
        $this->load->model('siswa_m');
        $this->load->model('nilai_m');
        $this->load->model('konfigurasi_m');
        $this->load->model('rumusrapormapel_m');
        $this->load->library("PHPExcel");
        
    }

    public function penilaianakhir() {
       $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_guru2();
      $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_guru2();

      //Load Data View Penilaian Akhir
      $this->data['subview'] = 'guru/rekapnilai/penilaianakhir';
      $this->load->view('guru/admindesain', $this->data);
      
    }

    public function penilaianberproses() {

      /*
       $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
       $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
      */
      $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif_guru2();
      $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan_guru2();
      //Load Data View Penilaian Akhir
      $this->data['subview'] = 'guru/rekapnilai/penilaianberproses';
      $this->load->view('guru/admindesain', $this->data);
      
    }



     public function ajax_list_berproses()
    {

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);


      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahun =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahun = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahun = $semester1dan2;
      } else {
         
          $tahun = 'XXXX/XXXX';
      }




        
          $list = $this->rumusrapormapel_m->get_datatables_data_berproses($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel'));
        
        
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $rekap) {
            $no++;


            if ($rekap->HASIL_RAPOR_PENGETAHUAN == NULL) {
              $PENGETAHUAN = '<i class="fa fa-minus"></i>';
            } elseif ($rekap->HASIL_RAPOR_PENGETAHUAN < $rekap->KKM_P) {
              $PENGETAHUAN = '<i class="fa fa-warning"></i> <span class="label bg-green-seagreen"><b>'.$rekap->HASIL_RAPOR_PENGETAHUAN.'</b></span>';
            } else {
              $PENGETAHUAN = '<i class="fa fa-smile-o"></i> <span class="label bg-yellow-crusta"><b>'.$rekap->HASIL_RAPOR_PENGETAHUAN.'</b></span>';
            }

             if ($rekap->HASIL_RAPOR_KETERAMPILAN == NULL) {
              $KETERAMPILAN = '<i class="fa fa-minus"></i>';
            } elseif ($rekap->HASIL_RAPOR_KETERAMPILAN < $rekap->KKM_K) {
              $KETERAMPILAN = '<i class="fa fa-warning"></i> <span class="label bg-green-seagreen"><b>'.$rekap->HASIL_RAPOR_KETERAMPILAN.'</b></span>';
            } else {
              $KETERAMPILAN = '<i class="fa fa-smile-o"></i> <span class="label bg-yellow-crusta"><b>'.$rekap->HASIL_RAPOR_KETERAMPILAN.'</b></span>';
            }


            if ( $rekap->RATA_UH == NULL) {
              $RATAUH = '<b>--</b>';
            } else {
              $RATAUH = $rekap->RATA_UH;
            }

             if ( $rekap->UAS == NULL) {
              $REKAPUAS = '<b>--</b>';
            } else {
              $REKAPUAS = '<a href="javascript:;" class="nilaidata-nis nilaidata" data-pk="'.$rekap->SISWA_NIS.'" data-type="text" data-name="UTS" data-original-title="Masukkan Nilai UTS ('.$rekap->SISWA_NIS.')"><b>'.$rekap->UAS.'</b></a>';
            }

             if ( $rekap->UTS == NULL) {
              $REKAPUTS = '<b>--</b>';
            } else {
              $REKAPUTS = '<a href="javascript:;" class="nilaidata-nis nilaidata" data-pk="'.$rekap->SISWA_NIS.'" data-type="text" data-name="UTS" data-original-title="Masukkan Nilai UTS ('.$rekap->SISWA_NIS.')"><b>'.$rekap->UTS.'</b></a>';
            }


             if ( $rekap->RATA_TG == NULL) {
              $RATATG = '<b>--</b>';
            } else {
              $RATATG = $rekap->RATA_TG;
            }

            if ( $rekap->RATA_PS == NULL) {
              $RATAPS = '<b>--</b>';
            } else {
              $RATAPS = $rekap->RATA_PS;
            }

            if ( $rekap->RATA_PR == NULL) {
              $RATAPR = '<b>--</b>';
            } else {
              $RATAPR = $rekap->RATA_PR;
            }

             if ( $rekap->RATA_PO == NULL) {
              $RATAPO = '<b>--</b>';
            } else {
              $RATAPO = $rekap->RATA_PO;
            }

            if ($rekap->NILAI_RAPOR_PENGETAHUAN == NULL) {
              $NILAIRAPORPENGETAHUAN = '<b>--</b>';
            } else {
              $NILAIRAPORPENGETAHUAN = '<b>'.$rekap->NILAI_RAPOR_PENGETAHUAN.'</b>';
            }

            if ($rekap->NILAI_RAPOR_KETERAMPILAN == NULL) {
              $NILAIRAPORKETERAMPILAN = '<b>--</b>';
            } else {
              $NILAIRAPORKETERAMPILAN = '<b>'.$rekap->NILAI_RAPOR_KETERAMPILAN.'</b>';
            }



            




            $row = array();
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$rekap->SISWA_NIS.'</span><input class="siswa_nis" value="'.$rekap->SISWA_NIS.'" type="hidden">';
            $row[] = $rekap->SISWA_NAMA;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$rekap->KELAS_CODE .'-'. $rekap->KELAS_KK.'-'.$rekap->KELAS_TAHUN.'">'. $rekap->SISWA_KELAS.'</span>';
          
            $row[] =  '<span class="badge label-info label-sm">'. $rekap->ABSEN. '</span>';
            

            $row[] =  '<a class=" popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="'.$rekap->GURU.'" data-original-title="Pengirim Nilai :">'.$rekap->NAMA_MAPEL.'</a>';
             
            $row[] = '<span class="badge bg-yellow">'.$rekap->SEMESTER.'</span>';

            $row[] = '<span class="label bg-blue-hoki tooltips"> P: <b>'. $rekap->KKM_P.'</b> - K: <b>'. $rekap->KKM_K.'</b></span>';


            //$row[] = $rekap->UH1;
            eval($this->rumusrapormapel_m->EVALNILAIUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));

            $row[] = $RATAUH;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_UH.'</span>';
            eval($this->rumusrapormapel_m->EVALNILAITG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));
            $row[] = $RATATG;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_TG.'</span>';
            $row[] = $rekap->TOTAL_NH;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_NH.'</span>';
            $row[] = $REKAPUTS;
            //$row[] = $rekap->RATA_UTS;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_UTS.'</span>';


            $row[] = $REKAPUAS;


            //$row[] = $rekap->RATA_UAS;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_UAS.'</span>';
            eval($this->rumusrapormapel_m->EVALNILAIPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));
            $row[] = $RATAPS;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_PS.'</span>';
            eval($this->rumusrapormapel_m->EVALNILAIPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));
            $row[] = $RATAPR;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_PR.'</span>';
            eval($this->rumusrapormapel_m->EVALNILAIPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));
            $row[] = $RATAPO;
            $row[] = '<span class="badge bg-grey-gallery">'.$rekap->BOBOT_PO.'</span>';
            $row[] = $NILAIRAPORPENGETAHUAN;
            $row[] = $NILAIRAPORKETERAMPILAN;
            $row[] = $PENGETAHUAN;
            $row[] = $KETERAMPILAN;




           
           
            $data[] = $row;
        }


       
      
       $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->rumusrapormapel_m->count_all_data_berproses($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')),
                        "recordsFiltered" => $this->rumusrapormapel_m->count_filtered_data_berproses($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);
        //echo $this->db->last_query();


    }

    
    public function simpan_nilai() {

      $this->cek_simpan_nilai();

       /*
       $this->db->set('nilai_data', $this->input->post('value'));
       $this->db->where('nilai_nis', $this->input->post('pk'));
       $this->db->where('nilai_jenis', $this->input->post('name'));
       $this->db->where('nilai_semester', $this->input->post('rekap_semester'));
       $this->db->where('nilai_mapel', $this->input->post('rekap_mapel'));
       $this->db->update('raport_nilai');
      */

       $data['sukses_string'][] = '<i class="fa fa-success"></i> <strong>Warning:</strong> Data nilai berhasil disimpan.';
       $data['jenis'] = $this->db->escape_str($this->input->post('name'));
       $data['nis'] = $this->db->escape_str($this->input->post('pk'));
       $data['nama'] = $this->get_namasiswa($this->input->post('pk'));
       $data['mapel'] = $this->get_nama_mapel($this->input->post('rekap_mapel'));
       $data['semester'] = $this->db->escape_str($this->input->post('rekap_semester'));
       $data['status'] = TRUE;

       $this->db->set('nilai_data', $this->input->post('value'));
       $this->db->where('nilai_nis', $this->input->post('pk'));
       $this->db->where('nilai_jenis', $this->input->post('name'));
       $this->db->where('nilai_semester', $this->input->post('rekap_semester'));
       $this->db->where('nilai_mapel', $this->input->post('rekap_mapel'));
       $this->db->update('raport_nilai');


       //$data['query'] = $this->db->last_query();
      


      
      echo json_encode($data);
    }

    private function get_namasiswa($nis) {
        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($nis).'" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

          return $row->siswa_nama;
        } else {
          return 'SISWA TIDAK TERDETEKSI';
        }

       

    }





    private function cek_simpan_nilai() {

        $data = array();
        $data['error_string'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('rekap_tahun') == '') {
          
            $data['error_string'][] = 'Anda belum memilih data angkatan.';
            $data['status'] = 'error';
        }

        if ($this->input->post('rekap_kelas') == '') {
          
            $data['error_string'][] = 'Anda belum memilih data kelas.';
            $data['status'] = 'error';
        }

        if ($this->input->post('rekap_semester') == '') {
          
            $data['error_string'][] = 'Anda belum memilih data semester.';
            $data['status'] = 'error';
        }

        if ($this->input->post('rekap_mapel') == '') {
          
            $data['error_string'][] = 'Anda belum memilih data mapel.';
            $data['status'] = 'error';
        }

        if ($this->input->post('value') == '') {
          
            $data['error_string'][] = 'Anda belum menginput data nilai.';
            $data['status'] = 'error';
        }

         if ($this->input->post('value') < 0 || $this->input->post('value') > 100) {
          
            $data['error_string'][] = 'Rentang nilai yang diperbolehkan hanya 1-100.';
            $data['status'] = 'error';
        }


         if ($this->input->post('rekap_semester') !== '1' && $this->input->post('rekap_semester') !== '2' && $this->input->post('rekap_semester') !== '3' && $this->input->post('rekap_semester') !== '4' && $this->input->post('rekap_semester') !== '5' && $this->input->post('rekap_semester') !== '6') {
            $data['error_string'][] = 'Data semester, yang anda pilih tidak valid.';
            $data['status'] = 'error';
        }

        if ($this->cekdatakelas($this->input->post('rekap_kelas')) < 1) {
            $data['error_string'][] = 'Data kelas, yang anda pilih tidak valid.';
            $data['status'] = 'error';
        }

         if ($this->cekdatatahun($this->input->post('rekap_tahun')) < 1) {
            $data['error_string'][] = 'Data tahun, yang anda pilih tidak valid.';
            $data['status'] = 'error';
        }

         if ($this->cekdatamapel($this->input->post('rekap_mapel')) < 1) {
            $data['error_string'][] = 'Data mapel, yang anda pilih tidak valid.';
            $data['status'] = 'error';
        }



        $expr = '/^[0-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('value')) == FALSE && trim($this->input->post('value') && trim($this->input->post('value') !== NULL))) {
           
            $data['error_string'][] = 'Data nilai siswa harus diisi dengan format angka .';
            $data['status'] = 'error';
        }


        if ($this->cekdatamasuk($this->input->post('rekap_kelas'),$this->input->post('rekap_tahun'),$this->input->post('rekap_mapel'),$this->input->post('rekap_semester')) !== 1) {
            $data['error_string'][] = ' Maaf anda tidak memiliki hak untuk mengedit nilai '.$this->input->post('name').' mapel :'.$this->get_nama_mapel($this->input->post('rekap_mapel')).', pada kelas : '.$this->get_namakelas($this->input->post('rekap_kelas')).':'.$this->get_tahunkelas($this->input->post('rekap_kelas')).', tahun ajaran : '.$this->konfigurasi_m->konfig_tahun_client().'.';
            $data['status'] = 'error';
        }


        if($data['status'] === 'error')
        {
            echo json_encode($data);
            exit();
        }

   
    }


    public function jumlah_kolom() {
      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);


      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahun =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahun = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahun = $semester1dan2;
      } else {
         
          $tahun = 'XXXX/XXXX';
      }



      $jumlahkolom = intval(27 + $this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));

      $dataku  ='';
      for ($i=0; $i <= $jumlahkolom ; $i++) { 

       if ($i == $jumlahkolom) {
         $koma = '';
       } else {
          $koma = ',';
       }

       if ($i == 2 || $i == 0) {
         $generate = '';
       } else {
          $generate = 'td:eq('.$i.')'.$koma;
       }
        $dataku .= $generate;
      }

      $output = array(
                        "ambilkolom" => $dataku,
                      
                );
        
        echo json_encode($output);

    }

    public function ambil_tabel() {

      
      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);


      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahun =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahun = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahun = $semester1dan2;
      } else {
         
          $tahun = 'XXXX/XXXX';
      }

      $jumlahpengetahuan = intval(10 + $this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));

       $jumlahNH = intval( 6+ $this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));

      $jumlahketerampilan = intval(6 + $this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')) + $this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')));

      if ($this->cekdatamasuk($this->input->post('rekap_kelas'),$this->input->post('rekap_tahun'),$this->input->post('rekap_mapel'),$this->input->post('rekap_semester')) !== 1) {
          $datatabel = '<tr>
                <th rowspan="3" width="5%">No</th>
                <th rowspan="3" width="10%" style="text-align:center;">NIS</th>
                <th rowspan="3" width="10%">Nama Siswa</th>
                <th rowspan="3" width="5%" style="text-align:center;">Kelas</th>
                <th rowspan="3" width="5%" style="text-align:center;">Absen</th>
                <th rowspan="3" width="10%" style="text-align:center;">Mapel</th>
                <th rowspan="3" width="4%" style="text-align:center;">SM</th>
                <th rowspan="3" width="6%" style="text-align:center;">KKM</th>


                <th colspan="12" width="16%" style="text-align:center;">Pengetahuan</th>

                <th colspan="9" width="8%" style="text-align:center;">Keterampilan</th>
                
                <th colspan="4" width="8%" style="text-align:center;">Nilai Akhir Rapor</th>
                
                
                </tr>

                <tr>
                

                <th colspan="8" width="8%" style="text-align:center;">Nilai Harian</th>

                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">UTS</th>
                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BUTS</th>

                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">UAS</th>
                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BUAS</th>  


                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">PS1</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPS</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPS</th>

                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">PR1</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPR</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPR</th>

                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">PO1</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPO</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPO</th>

                
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">NRP</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">NRK</th>

                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">Hasil Akhir P</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">Hasil Akhir K</th>
                
                </tr>

                <tr>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">UH1</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">RUH</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">BUH</th>

                <th  width="4%" style="text-align:center;border: 1px solid #DDD">TG1</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">RTG</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">BTG</th>

                <th  width="4%" style="text-align:center;border: 1px solid #DDD">TNH</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">BNH</th>

                
                

                </tr>';
      } else {
        $datatabel = '
               
                <tr>
                <th rowspan="3" width="5%">No</th>
                <th rowspan="3" width="10%" style="text-align:center;">NIS</th>
                <th rowspan="3" width="10%">Nama Siswa</th>
                <th rowspan="3" width="5%" style="text-align:center;">Kelas</th>
                <th rowspan="3" width="5%" style="text-align:center;">Absen</th>
                <th rowspan="3" width="10%" style="text-align:center;">Mapel</th>
                <th rowspan="3" width="4%" style="text-align:center;">SM</th>
                <th rowspan="3" width="6%" style="text-align:center;">KKM</th>


                <th colspan="'.$jumlahpengetahuan.'" width="16%" style="text-align:center;">Pengetahuan</th>

                <th colspan="'.$jumlahketerampilan.'" width="8%" style="text-align:center;">Keterampilan</th>
                
                <th colspan="4" width="8%" style="text-align:center;">Nilai Akhir Rapor</th>
                
                
                </tr>

                <tr>
                

                <th colspan="'.$jumlahNH.'" width="8%" style="text-align: center; border: 1px solid rgb(221, 221, 221);">Nilai Harian</th>

                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">UTS</th>
                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BUTS</th>

                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">UAS</th>
                <th  rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BUAS</th>  

                '.$this->rumusrapormapel_m->ambil_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')).'
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPS</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPS</th>

                '.$this->rumusrapormapel_m->ambil_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')).'
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPR</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPR</th>

                '.$this->rumusrapormapel_m->ambil_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')).'
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">RPO</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">BPO</th>

                
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">NRP</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">NRK</th>

                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">Hasil Akhir P</th>
                <th rowspan="2" width="4%" style="text-align:center;border: 1px solid #DDD">Hasil Akhir K</th>
                
                </tr>

                <tr>
                '.$this->rumusrapormapel_m->ambil_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')).'
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">RUH</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">BUH</th>

                '.$this->rumusrapormapel_m->ambil_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahun, $this->input->post('rekap_mapel')).'
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">RTG</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">BTG</th>

                <th  width="4%" style="text-align:center;border: 1px solid #DDD">TNH</th>
                <th  width="4%" style="text-align:center;border: 1px solid #DDD">BNH</th>

                 

                </tr>
                ';
      }
  

        




          $data = array('datatabel' => $datatabel,
                       'status'   => TRUE  );
       echo json_encode($data);
    
    } 


   public function ajax_list_rekap()
    {

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);


      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahun =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahun = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahun = $semester1dan2;
      } else {
         
          $tahun = 'XXXX/XXXX';
      }




        
          $list = $this->rekapnilai_m->get_datatables_data_rekap($this->input->post('rekap_kelas'), $tahun, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));
        
        
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $rekap) {
            $no++;



            if ($rekap->PENGETAHUAN == NULL) {
              $PENGETAHUAN = '<i class="fa fa-minus"></i>';
            } elseif ($rekap->PENGETAHUAN < $rekap->KKM_P) {
              $PENGETAHUAN = '<i class="fa fa-warning"></i> <span class="label bg-green-seagreen"><b>'.$rekap->PENGETAHUAN.'</b></span>';
            } else {
              $PENGETAHUAN = '<i class="fa fa-smile-o"></i> <span class="label bg-yellow-crusta"><b>'.$rekap->PENGETAHUAN.'</b></span>';
            }

             if ($rekap->KETERAMPILAN == NULL) {
              $KETERAMPILAN = '<i class="fa fa-minus"></i>';
            } elseif ($rekap->KETERAMPILAN < $rekap->KKM_K) {
              $KETERAMPILAN = '<i class="fa fa-warning"></i> <span class="label bg-green-seagreen"><b>'.$rekap->KETERAMPILAN.'</b></span>';
            } else {
              $KETERAMPILAN = '<i class="fa fa-smile-o"></i> <span class="label bg-yellow-crusta"><b>'.$rekap->KETERAMPILAN.'</b></span>';
            }


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$rekap->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$rekap->siswa_nis.'</span>';
            $row[] = $rekap->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$rekap->kelas_code .'-'. $rekap->kelas_kk.'-'.$rekap->kelas_tahun.'">'. $rekap->kelas_nama.'</span>';
            //$row[] =  $rekap->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $rekap->siswa_absen. '</span>';
            //$row[] = '<span class="label label-warning tooltips" data-placement="top" data-original-title="Angkatan : '.$rekap->kelas_tahun.'">'.$rekap->kelas_nama.'</span>';
              $row[] =  '<a class=" popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="'.$rekap->guru_nama.'" data-original-title="Pengirim Nilai :">'.$rekap->mapel_nama.'</a>';
            $row[] = '<span class="badge bg-yellow">'.$rekap->nilai_semester.'</span>';
            $row[] = '<span class="label bg-blue-hoki tooltips"> P: <b>'. $rekap->KKM_P.'</b> - K: <b>'. $rekap->KKM_K.'</b></span>';

            $row[] = $PENGETAHUAN ;
            $row[] = $KETERAMPILAN;
           
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->rekapnilai_m->count_all_data_rekap($this->input->post('rekap_kelas'), $tahun, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel')),
                        "recordsFiltered" => $this->rekapnilai_m->count_filtered_data_rekap($this->input->post('rekap_kelas'), $tahun, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);
        //echo $this->db->last_query();


    }

    public function download_nilaiakhir() {
        //membuat objek PHPExcel
        if($this->input->server('REQUEST_METHOD')!='POST'){
          exit("ACCESS DENIED !!!");
        }

      $this->validasi_cari();
      
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

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

     

      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('rekap_semester') == 2 || $this->input->post('rekap_semester') == 4 || $this->input->post('rekap_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }


     $datamapel = $this->get_datamapel($this->input->post('rekap_mapel'));
   if(!empty($datamapel)){
    
            foreach ($datamapel as $row) {
                $datanamamapel = $row->mapel_nama;
               
            }

    } else {
        $datanamamapel = 'MAPEL TIDAK DITEMUKAN';
        
    }


        $datakelas = $this->get_datakelas($this->input->post('rekap_kelas'));
           $dataangkatankelas = substr($this->input->post('rekap_tahun'), 0 , 4);
           if(!empty($datakelas)){
            
                    foreach ($datakelas as $row) {
                        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('rekap_semester') == 4 || $this->input->post('rekap_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
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
                                        ->setCellValue('F12', 'KKM')
                                        ->setCellValue('G12', 'NILAI P')
                                        ->setCellValue('H12', 'NILAI K');

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
                                        ->setCellValue('L1', $this->input->post('rekap_tahun'))
                                        ->setCellValue('L2', $this->input->post('rekap_kelas'))
                                        ->setCellValue('L3', $this->input->post('rekap_semester'))
                                        ->setCellValue('L4', $this->input->post('rekap_mapel'))
                                        ->setCellValue('L5', 'SISTEM PENILAIAN AKHIR')
                                        ->setCellValue('L6', 'NILAI AKHIR RAPOR');


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'INFORMASI HASIL DATA NILAI SISWA')
                                        ->setCellValue('A2', 'NILAI AKHIR RAPOR - '.strtoupper($datanamamapel).' - '.strtoupper($datanamakelas))
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:H12')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:H12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getFont()->setName('Times New Roman');
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

            $objPHPExcel->getActiveSheet()->getStyle('A1:H12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:H12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:H12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:H12')->getFill()->getStartColor()->setARGB('FF3F3F');
           


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

            if ($this->status_kelas($this->input->post('rekap_tahun')) == 'aktif') {
              
                $data   = $this->rekapnilai_m->get_datatables_data_rekap_excel($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'), '1');
            } else {
                 $data   = $this->rekapnilai_m->get_datatables_data_rekap_excel($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'), '2');
            }
             
             $nomor = 0;
             $angka = 12;
            if(!empty($data)){
                
                foreach($data as $row) {
                    $nomor++;
                    $angka++;

                    if ($row->PENGETAHUAN == NULL) {
                      $PENGETAHUAN = '-';
                    } elseif ($row->PENGETAHUAN < $row->KKM_P) {
                      
                      $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)
                        ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                       $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)
                       ->getFill()->getStartColor()->setARGB('00DDEBF7');

                      $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
                      $PENGETAHUAN = $row->PENGETAHUAN;
                    } else {
                       $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)
                        ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                       $objPHPExcel->getActiveSheet()->getStyle('G'.$angka)
                       ->getFill()->getStartColor()->setARGB('00FFD966');
                      $PENGETAHUAN = $row->PENGETAHUAN;
                    }

                     if ($row->KETERAMPILAN == NULL) {
                      $KETERAMPILAN = '-';
                    } elseif ($row->KETERAMPILAN < $row->KKM_K) {
                       $objPHPExcel->getActiveSheet()->getStyle('H'.$angka)
                        ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                       $objPHPExcel->getActiveSheet()->getStyle('H'.$angka)
                       ->getFill()->getStartColor()->setARGB('00DDEBF7');
                      $objPHPExcel->getActiveSheet()->getStyle('H'.$angka)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
                      $KETERAMPILAN = $row->KETERAMPILAN;
                    } else {
                       $objPHPExcel->getActiveSheet()->getStyle('H'.$angka)
                        ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
                       $objPHPExcel->getActiveSheet()->getStyle('H'.$angka)
                       ->getFill()->getStartColor()->setARGB('00FFD966');
                      $KETERAMPILAN = $row->KETERAMPILAN;
                    }


                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->siswa_nis)
                                        ->setCellValue('C'.$angka, $row->siswa_nama)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->kelas_tahun.' - SMT '.$this->input->post('rekap_semester'))
                                        ->setCellValue('E'.$angka, $row->siswa_absen)
                                        ->setCellValue('F'.$angka, 'P :'. $row->KKM_P. ' K:'. $row->KKM_K)
                                        ->setCellValue('G'.$angka, $PENGETAHUAN)
                                        ->setCellValue('H'.$angka, $KETERAMPILAN);



             
                }

                $objPHPExcel->getActiveSheet()->getStyle('A13:H'.$angka)->applyFromArray($styleSiswa);                            
             $objPHPExcel->getActiveSheet()->getStyle('A13:A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B13:B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D13:D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E13:E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F12:H'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             //$objPHPExcel->getActiveSheet()->getStyle('F13:H'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             //$objPHPExcel->getActiveSheet()->getCell('H'.$angka)->setDataValidation(clone $objValidation);
             $objPHPExcel->getActiveSheet()->getStyle('B13:B'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('G13:H'.$angka)->getFont()->setBold(TRUE);
             $objPHPExcel->getActiveSheet()->getStyle('G13:H'.$angka)->getFont()->setSize(12);


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
                                        ->setCellValue('E6', ': '.strtoupper('SISTEM PENILAIAN AKHIR'))
                                        ->setCellValue('E7', ': '.strtoupper('NILAI AKHIR RAPOR'))
                                        ->setCellValue('E8', ': '. $this->get_namaguru())
                                        ->setCellValue('E9', ': '.$this->get_nipguru());

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NILAI_AKHIR_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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
            $namaexcel = 'NILAI AKHIR RAPOR_'. $datanamamapel .'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI AKHIR RAPOR - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI AKHIR RAPOR - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI AKHIR RAPOR - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords(strtoupper('NILAI AKHIR RAPOR'))  
            ->setCategory(strtoupper('NILAI AKHIR RAPOR'));  
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





    public function download_nilaiberproses() {
        
        if($this->input->server('REQUEST_METHOD')!='POST'){
          exit("ACCESS DENIED !!!");
        }

      $this->validasi_cari();
        //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

      
            $styleArray = array(
             'font' => array(
                        'bold' => true,
                        'color' => array('argb' => 'FFFFFFFF'),
                    ),
                 'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => 'FFFFFFFF'),
                    ),
                ),

              'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
              ),
               'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN,
                //'rotation' => 90,
                'startcolor' => array(
                    'argb' => 'FF3F3F',
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

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      
            
     

      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }


       if ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 5 ) {
         
           $datasemester = 'GASAL';
           
      } elseif ($this->input->post('rekap_semester') == 2 || $this->input->post('rekap_semester') == 4 || $this->input->post('rekap_semester') == 6) {
          
          $datasemester = 'GENAP';
      } else {
         
          $datasemester = 'XXXXX';
      }


     $datamapel = $this->get_datamapel($this->input->post('rekap_mapel'));
   if(!empty($datamapel)){
    
            foreach ($datamapel as $row) {
                $datanamamapel = $row->mapel_nama;
               
            }

    } else {
        $datanamamapel = 'MAPEL TIDAK DITEMUKAN';
        
    }


        $datakelas = $this->get_datakelas($this->input->post('rekap_kelas'));
           $dataangkatankelas = substr($this->input->post('rekap_tahun'), 0 , 4);
           if(!empty($datakelas)){
            
                    foreach ($datakelas as $row) {
                        $kelasku = str_replace('X', '', str_replace('x', '', str_replace('I', '', str_replace('i', '', $row->kelas_nama))));


                        if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
                            $datanamakelas = 'XII'.$kelasku;
                        } elseif ($this->input->post('rekap_semester') == 4 || $this->input->post('rekap_semester') == 3) {
                            $datanamakelas = 'XI'.$kelasku;
                            
                        } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
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
                                        ->setCellValue('F12', 'KKM');

            
          eval($this->rumusrapormapel_m->ambil_tabelUH_excel($this->input->post('rekap_kelas'),$this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(6+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14', 'RUH')
                                        ->setCellValue($this->nomoralfa(7+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14', 'BUH');

             eval($this->rumusrapormapel_m->ambil_tabelTG_excel($this->input->post('rekap_kelas'),$this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(8+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14', 'RTG')
                                        ->setCellValue($this->nomoralfa(9+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14', 'BTG')
                                         ->setCellValue($this->nomoralfa(10+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14', 'TNH')
                                          ->setCellValue($this->nomoralfa(11+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14', 'BNH')
                                          ->setCellValue($this->nomoralfa(12+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'UTS')
                                          ->setCellValue($this->nomoralfa(13+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'BUTS')
                                          ->setCellValue($this->nomoralfa(14+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'UAS')
                                          ->setCellValue($this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'BUAS');


            eval($this->rumusrapormapel_m->ambil_tabelPS_excel($this->input->post('rekap_kelas'),$this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

            $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'RPS')
                                        ->setCellValue($this->nomoralfa(17+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'BPS');

             eval($this->rumusrapormapel_m->ambil_tabelPR_excel($this->input->post('rekap_kelas'),$this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

             $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(18+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'RPR')
                                        ->setCellValue($this->nomoralfa(19+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'BPR');

             eval($this->rumusrapormapel_m->ambil_tabelPO_excel($this->input->post('rekap_kelas'),$this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));


              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(20+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'RPO')

                                        ->setCellValue($this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'BPO')

                                        ->setCellValue($this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'NRP')

                                        ->setCellValue($this->nomoralfa(23+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'NRK')

                                        ->setCellValue($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'Nilai Akhir P')

                                        ->setCellValue($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13', 'Nilai Akhir K');


             $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('G12', 'ASPEK PENGETAHUAN')
                                        ->setCellValue($this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12', 'ASPEK KETERAMPILAN')
                                        ->setCellValue($this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12', 'NILAI AKHIR RAPOR')
                                        ->setCellValue('G13', 'NILAI HARIAN');



            //MERGE ASPEK PENGETAHUAN
            $objPHPExcel->getActiveSheet()->mergeCells('G12:'.$this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12');

            //MERGE NILAI HARIAN
             $objPHPExcel->getActiveSheet()->mergeCells('G13:'.$this->nomoralfa(11+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13');


            //MERGE ASPEK KETERAMPILAN
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12:'.$this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12');

            //MERGE NILAI AKHIR RAPOR
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'12');


            //MERGE UTS
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(12+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(12+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE BUTS
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(13+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(13+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE UAS
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(14+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(14+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE BUAS
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');


            //MERGE PS
            eval($this->rumusrapormapel_m->merge_tabelPS_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));
             //$objPHPExcel->getActiveSheet()->mergeCells('F14:15');
          
            //MERGE RPS
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14'); 
            
            //MERGE BPS
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(17+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(17+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');


            //MERGE PR
            eval($this->rumusrapormapel_m->merge_tabelPR_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

            //MERGE RPR
             $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(18+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(18+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');

            //MERGE BPR   
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(19+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(19+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');


            //MERGE PO
            eval($this->rumusrapormapel_m->merge_tabelPO_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));   

            //MERGE RPO
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(20+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(20+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE BPO                  
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');

            //MERGE NRP
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE NRK
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(23+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(23+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE NILAI AKHIR PENGETAHUAN
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');
            //MERGE NILAI AKHIR KETERAMPIAN
            $objPHPExcel->getActiveSheet()->mergeCells($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'13:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14');

            //PANJANG KOLOM KETERAMPILAN DAN PENGETAHUAN
            $objPHPExcel->getActiveSheet()->getColumnDimension($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))))->setWidth(22);

            $objPHPExcel->getActiveSheet()->getColumnDimension($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))))->setWidth(22);
                                        

            //APPLY STYLE
            $objPHPExcel->getActiveSheet()->getStyle('F12:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'14')->applyFromArray($styleArray);

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
                                        ->setCellValue('L1', $this->input->post('rekap_tahun'))
                                        ->setCellValue('L2', $this->input->post('rekap_kelas'))
                                        ->setCellValue('L3', $this->input->post('rekap_semester'))
                                        ->setCellValue('L4', $this->input->post('rekap_mapel'))
                                        ->setCellValue('L5', 'NILAI HARIAN RAPOR')
                                        ->setCellValue('L6', 'REKAP NILAI BERPORSES');


            

          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'INFORMASI REKAP PERHITUNGAN NILAI SISWA')
                                        ->setCellValue('A2', 'NILAI HARIAN SISWA - '.strtoupper($datanamamapel).' - '.strtoupper($datanamakelas))
                                         ->setCellValue('A3', 'SEMESTER '.strtoupper($datasemester).' TAHUN AJARAN '.$tahunajaran);
                                       
                                       

            $objPHPExcel->getActiveSheet()->getStyle('A12:F14')->applyFromArray($styleArray);
            $objPHPExcel->getActiveSheet()->getStyle('A11:F12')->getFont()->setSize(11);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setSize(16);
            $objPHPExcel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(TRUE);
            //$objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getFont()->setName('Times New Roman');
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




            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);



            


            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('B12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('C12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('D12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('E12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


            $objPHPExcel->getActiveSheet()->getStyle('F12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->getStyle('A1:F12')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_PROTECTED);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('L1:L6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_PATTERN_LIGHTDOWN);
            $objPHPExcel->getActiveSheet()->getStyle('A12:F12')->getFill()->getStartColor()->setARGB('FF3F3F');

            $objPHPExcel->getActiveSheet()->getRowDimension('12')->setRowHeight(24.75);
            $objPHPExcel->getActiveSheet()->mergeCells('A12:A14');
            $objPHPExcel->getActiveSheet()->mergeCells('B12:B14');
            $objPHPExcel->getActiveSheet()->mergeCells('C12:C14');
            $objPHPExcel->getActiveSheet()->mergeCells('D12:D14');
            $objPHPExcel->getActiveSheet()->mergeCells('E12:E14');
            $objPHPExcel->getActiveSheet()->mergeCells('F12:F14');
           


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

            if ($this->status_kelas($this->input->post('rekap_tahun')) == 'aktif') {
                $data   = $this->rumusrapormapel_m->ambilexcel_nilaiberproses($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'), '1');
            } else {
                $data   = $this->rumusrapormapel_m->ambilexcel_nilaiberproses($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'), '2');
            }
             
             $nomor = 0;
             $angka = 14;
            if(!empty($data)){
                
                foreach($data as $row) {
                    $nomor++;
                    $angka++;


             if ( $row->RATA_UH == NULL) {
              $RATAUH = '-';
            } else {
              $RATAUH = $row->RATA_UH;
            }


             if ( $row->TOTAL_NH == NULL) {
              $TOTALNH = '-';
            } else {
              $TOTALNH = $row->TOTAL_NH;
            }

             if ( $row->UAS == NULL) {
              $REKAPUAS = '-';
            } else {
              $REKAPUAS = $row->UAS ;
            }

             if ( $row->UTS == NULL) {
              $REKAPUTS = '-';
            } else {
              $REKAPUTS = $row->UTS;
            }


             if ( $row->RATA_TG == NULL) {
              $RATATG = '-';
            } else {
              $RATATG = $row->RATA_TG;
            }

            if ( $row->RATA_PS == NULL) {
              $RATAPS = '-';
            } else {
              $RATAPS = $row->RATA_PS;
            }

            if ( $row->RATA_PR == NULL) {
              $RATAPR = '-';
            } else {
              $RATAPR = $row->RATA_PR;
            }

             if ( $row->RATA_PO == NULL) {
              $RATAPO = '-';
            } else {
              $RATAPO = $row->RATA_PO;
            }

            if ($row->NILAI_RAPOR_PENGETAHUAN == NULL) {
              $NILAIRAPORPENGETAHUAN = '-';
            } else {
              $NILAIRAPORPENGETAHUAN = $row->NILAI_RAPOR_PENGETAHUAN;
            }

            if ($row->NILAI_RAPOR_KETERAMPILAN == NULL) {
              $NILAIRAPORKETERAMPILAN = '-';
            } else {
              $NILAIRAPORKETERAMPILAN = $row->NILAI_RAPOR_KETERAMPILAN;
            }

            if ($row->HASIL_RAPOR_PENGETAHUAN == NULL) {
              $PENGETAHUAN = '-';
            } elseif ($row->HASIL_RAPOR_PENGETAHUAN < $row->KKM_P) {
               $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
              ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
             ->getFill()->getStartColor()->setARGB('00DDEBF7');
               $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
               ->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

              $PENGETAHUAN = $row->HASIL_RAPOR_PENGETAHUAN;

            } else {

              $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
              ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
             ->getFill()->getStartColor()->setARGB('00FFD966');


              $PENGETAHUAN = $row->HASIL_RAPOR_PENGETAHUAN;
            }

             if ($row->HASIL_RAPOR_KETERAMPILAN == NULL) {
              $KETERAMPILAN = '-';


            } elseif ($row->HASIL_RAPOR_KETERAMPILAN < $row->KKM_K) {
                 $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
              ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
             ->getFill()->getStartColor()->setARGB('00DDEBF7');

              $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
               ->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

              $KETERAMPILAN = $row->HASIL_RAPOR_KETERAMPILAN;
            } else {

                $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
              ->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)
             ->getFill()->getStartColor()->setARGB('00FFD966');

              $KETERAMPILAN = $row->HASIL_RAPOR_KETERAMPILAN;
            }



                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A'.$angka, $nomor)
                                        ->setCellValue('B'.$angka, $row->SISWA_NIS)
                                        ->setCellValue('C'.$angka, $row->SISWA_NAMA)
                                        ->setCellValue('D'.$angka, $datanamakelas.' - '.$row->KELAS_TAHUN.' - SMT '.$this->input->post('rekap_semester'))
                                        ->setCellValue('E'.$angka, $row->ABSEN)
                                        ->setCellValue('F'.$angka, 'P:'.$row->KKM_P.' K:'.$row->KKM_K);


                     eval($this->rumusrapormapel_m->tampil_tabelUH_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));
                     
                     $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(6+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $RATAUH)
                                        ->setCellValue($this->nomoralfa(7+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_UH);

                      eval($this->rumusrapormapel_m->tampil_tabelTG_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));


                       $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(8+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $RATATG)
                                        ->setCellValue($this->nomoralfa(9+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_TG)
                                        ->setCellValue($this->nomoralfa(10+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $TOTALNH)
                                        ->setCellValue($this->nomoralfa(11+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_NH)
                                        ->setCellValue($this->nomoralfa(12+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $REKAPUTS)
                                        ->setCellValue($this->nomoralfa(13+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_UTS)
                                        ->setCellValue($this->nomoralfa(14+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $REKAPUAS)
                                        ->setCellValue($this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_UAS);


                         eval($this->rumusrapormapel_m->tampil_tabelPS_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

                          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $RATAPS)
                                        ->setCellValue($this->nomoralfa(17+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_PS);

                         eval($this->rumusrapormapel_m->tampil_tabelPR_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

                         $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(18+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $RATAPR)
                                        ->setCellValue($this->nomoralfa(19+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_PR);

                         eval($this->rumusrapormapel_m->tampil_tabelPO_excel($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')));

                         $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue($this->nomoralfa(20+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $RATAPO)
                                        ->setCellValue($this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $row->BOBOT_PO)
                                         ->setCellValue($this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $NILAIRAPORPENGETAHUAN)
                                         ->setCellValue($this->nomoralfa(23+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $NILAIRAPORKETERAMPILAN)
                                         ->setCellValue($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $PENGETAHUAN)
                                         ->setCellValue($this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka, $KETERAMPILAN);





                }


             //SETTING KOLOM DECIMAL
             //DECIMAL UH
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(6+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(6+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

             //DECIMAL TG   
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(8+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(8+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


              //DECIMAL TG   
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(10+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(10+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

             //DECIMAL PS
             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(16+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

              //DECIMAL PR
              $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(18+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(18+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

               //DECIMAL PO
              $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(20+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(20+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

                //DECIMAL NRP
                 $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(22+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                
                //DECIMAL NRK
                 $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(23+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(23+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getNumberFormat()
                ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);



             $objPHPExcel->getActiveSheet()->getStyle('A15:A'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('B15:B'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('D15:D'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('E15:E'.$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             $objPHPExcel->getActiveSheet()->getStyle('F15:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             //$objPHPExcel->getActiveSheet()->getStyle('F15:F'.$angka)->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
             //$objPHPExcel->getActiveSheet()->getCell('F15:F'.$angka)->setDataValidation(clone $objValidation);
             
             //BOLD NILAI
             $objPHPExcel->getActiveSheet()->getStyle('B15:B'.$angka)->getFont()->setBold(TRUE);

             $objPHPExcel->getActiveSheet()->getStyle('G15:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(TRUE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(7+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(7+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(9+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(9+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(11+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(11+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(13+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(13+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(15+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(17+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(17+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(19+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(19+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(21+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setBold(FALSE);






             
             //UKURAN FONT
             $objPHPExcel->getActiveSheet()->getStyle('F15:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setSize(12);

             $objPHPExcel->getActiveSheet()->getStyle($this->nomoralfa(24+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).'15:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->getFont()->setSize(13);


              $objPHPExcel->getActiveSheet()->getStyle('A15:'.$this->nomoralfa(25+$this->rumusrapormapel_m->jumlah_tabelUH($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelTG($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel')) +$this->rumusrapormapel_m->jumlah_tabelPS($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPR($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))+$this->rumusrapormapel_m->jumlah_tabelPO($this->input->post('rekap_kelas'), $this->input->post('rekap_semester'), $tahunajaran, $this->input->post('rekap_mapel'))).$angka)->applyFromArray($styleSiswa);



            } else {
                 
            $objPHPExcel->getActiveSheet()->mergeCells('A13:F13');

              $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A13', 'MAAF DATA SISWA TIDAK DITEMUKAN');
           }

           //KONFIGURASI KETERANGAN REKAP NILAI
          $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+3).':C'.(37+$angka))->applyFromArray($styleSiswa);
          $objPHPExcel->getActiveSheet()->mergeCells('B'.($angka+3).':C'.($angka+3));
          
          $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('B'.($angka+3), 'KETERANGAN REKAP PENILAIAN')
                                        ->setCellValue('B'.($angka+4), 'UH')
                                        ->setCellValue('B'.($angka+5), 'RUH')
                                        ->setCellValue('B'.($angka+6), 'BUH')
                                        ->setCellValue('B'.($angka+8), 'TG')
                                        ->setCellValue('B'.($angka+9), 'RTG')
                                        ->setCellValue('B'.($angka+10), 'BTG')
                                        ->setCellValue('B'.($angka+12), 'TNH')
                                        ->setCellValue('B'.($angka+13), 'BNH')
                                        ->setCellValue('B'.($angka+15), 'UTS')
                                        ->setCellValue('B'.($angka+16), 'BUTS')
                                        ->setCellValue('B'.($angka+18), 'UAS')
                                        ->setCellValue('B'.($angka+19), 'BUAS')
                                        ->setCellValue('B'.($angka+21), 'PS')
                                        ->setCellValue('B'.($angka+22), 'RPS')
                                        ->setCellValue('B'.($angka+23), 'BPS')
                                        ->setCellValue('B'.($angka+25), 'PR')
                                        ->setCellValue('B'.($angka+26), 'RPR')
                                        ->setCellValue('B'.($angka+27), 'BPR')
                                        ->setCellValue('B'.($angka+29), 'PO')
                                        ->setCellValue('B'.($angka+30), 'RPO')
                                        ->setCellValue('B'.($angka+31), 'BPO')
                                        ->setCellValue('B'.($angka+33), 'NRP')
                                        ->setCellValue('B'.($angka+34), 'NRK')
                                        ->setCellValue('B'.($angka+36), 'NILAI AKHIR K')
                                        ->setCellValue('B'.($angka+37), 'NILAI AKHIR P');


           $objPHPExcel->setActiveSheetIndex(0)
                                       
                                        ->setCellValue('C'.($angka+4), ': Ulangan Harian')
                                        ->setCellValue('C'.($angka+5), ': Rata Ulangan Harian')
                                        ->setCellValue('C'.($angka+6), ': Bobot Ulangan Harian')
                                        ->setCellValue('C'.($angka+8), ': Tugas/PR')
                                        ->setCellValue('C'.($angka+9), ': Rata Tugas/PR')
                                        ->setCellValue('C'.($angka+10), ': Bobot Tugas/PR')
                                        ->setCellValue('C'.($angka+12), ': Total Nilai Harian')
                                        ->setCellValue('C'.($angka+13), ': Bobot Nilai Harian')
                                        ->setCellValue('C'.($angka+15), ': Ulangan Tengah Semester')
                                        ->setCellValue('C'.($angka+16), ': Bobot Ulangan Tengah Semester')
                                        ->setCellValue('C'.($angka+18), ': Ulangan Akhir Semester')
                                        ->setCellValue('C'.($angka+19), ': Bobot Ulangan Akhir Semester')
                                        ->setCellValue('C'.($angka+21), ': Proses')
                                        ->setCellValue('C'.($angka+22), ': Rata Proses')
                                        ->setCellValue('C'.($angka+23), ': Bobot Proses')
                                        ->setCellValue('C'.($angka+25), ': Produk')
                                        ->setCellValue('C'.($angka+26), ': Rata Produk')
                                        ->setCellValue('C'.($angka+27), ': Bobot Produk')
                                        ->setCellValue('C'.($angka+29), ': Proyek')
                                        ->setCellValue('C'.($angka+30), ': Rata Proyek')
                                        ->setCellValue('C'.($angka+31), ': Bobot Proyek')
                                        ->setCellValue('C'.($angka+33), ': Nilai Rapor Keterampilan')
                                        ->setCellValue('C'.($angka+34), ': Nilai Rapor Pengetahuan')
                                        ->setCellValue('C'.($angka+36), ': Nilai Akhir Keterampilan')
                                        ->setCellValue('C'.($angka+37), ': Nilai Akhir Pengetahuan');

         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+3).':B'.($angka+37))->getFont()->setBold(TRUE);
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+3).':c'.($angka+3))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('0070AD47');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+4).':c'.($angka+6))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00D9E1F2');
          $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+8).':c'.($angka+10))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00FFE699');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+12).':c'.($angka+13))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00D9E1F2');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+15).':c'.($angka+16))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00FFE699');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+18).':c'.($angka+19))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00D9E1F2');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+21).':c'.($angka+23))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00FFE699');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+25).':c'.($angka+27))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00D9E1F2');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+29).':c'.($angka+31))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00FFE699');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+33).':c'.($angka+34))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00D9E1F2');
         $objPHPExcel->getActiveSheet()->getStyle('B'.($angka+36).':c'.($angka+37))->getFill()
         ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
         ->getStartColor()->setARGB('00FFE699');
 
           $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('C5', ': '.$this->konfigurasi_m->konfig_sekolah())
                                        ->setCellValue('C6', ': '.$datanamakelas.' - '.$datatahunkelas)
                                        ->setCellValue('C7', ': '.strtoupper($datajurusan))
                                        ->setCellValue('C8', ': '.$tahunajaran)
                                        ->setCellValue('C9', ': '.strtoupper($datasemester))
                                        ->setCellValue('C10',': '.$nomor)
                                        ->setCellValue('E5', ': '.strtoupper($datanamamapel))
                                        ->setCellValue('E6', ': '.strtoupper('Nilai Berproses'))
                                        ->setCellValue('E7', ': '.strtoupper('Nilai Harian Berproses'))
                                        ->setCellValue('E8', ': '. $this->get_namaguru())
                                        ->setCellValue('E9', ': '.$this->get_nipguru());
                                        

            
             
            //set title pada sheet (me rename nama sheet)
            $judulexcel = 'NilaiProses_'.$datanamakelas.'_'.str_replace('/','-',$tahunajaran);
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
            $namaexcel = 'HASIL_NILAI_BERPROSES_'. $datanamamapel .'_'.$datanamakelas.'_TH'.str_replace('/','-',$tahunajaran);




              $objPHPExcel->getProperties()->setCreator("Annis Nuraini")  
            ->setLastModifiedBy("Annis Nuraini")  
            ->setTitle('NILAI BERPROSES - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setSubject('NILAI BERPROSES - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setDescription('NILAI BERPROSES - '.$datanamakelas.' - '.$datatahunkelas.' - Tahun Ajaran : '.$tahunajaran)  
            ->setKeywords('NILAI BERPROSES - NILAI HARIAN')  
            ->setCategory('NILAI BERPROSES - NILAI HARIAN');  
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

     private function nomoralfa($n)
    {
    for($r = ""; $n >= 0; $n = intval($n / 26) - 1)
    $r = chr($n%26 + 0x41) . $r; 

    return $r;         
    }



    public function cari_semester($id, $tahun) {


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

     private function konfig() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_admin'];
    }

     private function get_datamapel($mapel) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$this->db->escape_str($mapel).'" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function get_datakelas($kelas) {
        $query = $this->db->query('SELECT kelas_nama, kelas_tahun, kelas_kk FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($kelas).'"' );
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function status_kelas($status)
    {

        $query = $this->db->query('SELECT DISTINCT(kelas_status) FROM `raport_kelas` WHERE kelas_tahun="'.$this->db->escape_str($status).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->kelas_status;
           
        } else {

         return FALSE;
        }
    }



     private function get_kelas($id) {
        $query = $this->db->query('SELECT kelas_tingkat FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->kelas_tingkat;
           
        } else {

          return FALSE;
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

     


     public function cari_mapel() {

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);

      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
           $data   = $this->nilai_m->get_data_mapel_guru_2($semester5dan6, $this->input->post('rekap_kelas'));
           $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester5dan6.'">';
      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          $data   = $this->nilai_m->get_data_mapel_guru_2($semester3dan4, $this->input->post('rekap_kelas'));
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester3dan4.'">';
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          $data   = $this->nilai_m->get_data_mapel_guru_2($semester1dan2, $this->input->post('rekap_kelas'));
          $tahunajaran = '<optgroup label="Data Mapel TH :'.$semester1dan2.'">';
      } else {
          $data   = $this->nilai_m->get_data_mapel_guru_2($semester5dan6, $this->input->post('rekap_kelas'));
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

      public function cari_kelas_modal( $id = NULL) {

      $tmp  = '';
        //$data   = $this->siswa_m->get_data_kelas_modal_guru_2($id);
        $data   = $this->siswa_m->get_data_kelas_modal_guru_2($id);
        //$data   = $this->siswa_m->get_data_kelas_modal_2($id);
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

     public function cari_rekapnilai_berproses() {

        $this->validasi_cari();

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = '';
      }


        $rekapdataberproses = $this->rumusrapormapel_m->count_all_data_berproses($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));

        



        if ($rekapdataberproses == 0) {
         $pesansukses = '<div id="sukses-form-indikator" class="alert alert-danger alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Rekap penilaian berproses pada kelas <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).':'.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b> pada mapel : <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b>, SMT : <b>'.$this->input->post('rekap_semester').'</b> saat ini masih kosong <b>(nilai berproses belum diinput)</b>.</div>';
          $notiferror = 'error';

          $pesannotif = '';

        } else {

        $pesansukses = '<div id="sukses-form-indikator" class="alert alert-success alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Rekap penilaian berproses kelas <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).':'.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b> pada mapel : <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b> SMT : <b>'.$this->input->post('rekap_semester').'</b> berhasil ditemukan.</div>';
        $notiferror = 'sukses';
        $pesannotif = '';
        //$pesannotif = '<div id="generate-datanilai" class="note note-info"><div class="row"><div class="col-md-3">Mata Pelajaran</div><div class="col-md-3">: <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b></div><div class="col-md-3">Nilai Pengetahuan &lt; KKM</div><div class="col-md-3">: <b>'.$kkmpengetahuan.'</b></div></div><div class="row"><div class="col-md-3">Kelas</div><div class="col-md-3">: <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).' - '.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b></div><div class="col-md-3">Nilai Keterampilan &lt; KKM</div><div class="col-md-3">: <b>'.$kkmketerampilan.'</b></div></div><div class="row"><div class="col-md-3">Jumlah</div><div class="col-md-3">: <b>'.$jumlahsiswa.' Siswa</b></div><div class="col-md-3">Nilai Pengetahuan Kosong</div><div class="col-md-3">: <b>'.$pengetahuankosong.'</b></div></div><div class="row"><div class="col-md-3">Jurusan</div><div class="col-md-3">: <b>'.$this->get_jurusankelas($this->input->post('rekap_kelas')).'</b></div><div class="col-md-3">Nilai Keterampilan Kosong </div><div class="col-md-3">: <b>'.$keterampilankosong.'</b></div></div></div>';

       
        }
        
        

        $data = array('suksespesan' => $pesansukses,
                      'suksesnotif' => $pesannotif,
                      'pesannotif' => $notiferror,
                       'status'   => TRUE  );
        echo json_encode($data);
    }



      public function cari_rekapnilai_akhir() {

        $this->validasi_cari();

      $dataangkatan = substr($this->input->post('rekap_tahun'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rekap_semester') == 5 || $this->input->post('rekap_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('rekap_semester') == 3 || $this->input->post('rekap_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('rekap_semester') == 1 || $this->input->post('rekap_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = '';
      }



         $rekapdatapengetahuan = $this->rekapnilai_m->hitung_data_nilai_pengetahuan($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));

        $rekapdataketerampilan = $this->rekapnilai_m->hitung_data_nilai_keterampilan($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));

         $pengetahuanKKM = $this->rekapnilai_m->hitung_data_nilai_pengetahuan_KKM($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));

        $keterampilanKKM = $this->rekapnilai_m->hitung_data_nilai_keterampilan_KKM($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));


        $jumlahsiswa = $this->jumlahsiswa($this->input->post('rekap_kelas'));
        $jumlahnilai = $this->rekapnilai_m->count_all_data_rekap($this->input->post('rekap_kelas'), $tahunajaran, $this->input->post('rekap_semester'), $this->input->post('rekap_mapel'));

        

      if ($jumlahnilai > $rekapdatapengetahuan) {
        $pengetahuankosong = intval($jumlahnilai-$rekapdatapengetahuan).' Nilai';
      } else {
        $pengetahuankosong = '-';
      }

       if ($jumlahnilai > $rekapdataketerampilan) {
        $keterampilankosong = intval($jumlahnilai-$rekapdataketerampilan).' Nilai';
      } else {
        $keterampilankosong = '-';
      }


      if ($pengetahuanKKM == 0 ) {
        $kkmpengetahuan = '-';
      } else {
        $kkmpengetahuan = $pengetahuanKKM.' Nilai';
      }

      if($keterampilanKKM == 0 ) {
        $kkmketerampilan = '-';
      } else {
        $kkmketerampilan = $keterampilanKKM.' Nilai';
      }






        if ($rekapdatapengetahuan == 0 && $rekapdataketerampilan == 0) {
         $pesansukses = '<div id="sukses-form-indikator" class="alert alert-danger alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Rekap penilaian akhir pada kelas <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).':'.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b> pada mapel : <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b>, SMT : <b>'.$this->input->post('rekap_semester').'</b> saat ini masih kosong <b>(nilai akhir belum diinput)</b>.</div>';

          $pesannotif = '';
          $pesandata = 'error';

        } else {

        $pesansukses = '<div id="sukses-form-indikator" class="alert alert-success alert-dismissable fade in" id="wali-data-ofani0"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-info-circle"></i> <strong>Info:</strong> Rekap penilaian akhir kelas <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).':'.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b> pada mapel : <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b> SMT : <b>'.$this->input->post('rekap_semester').'</b> berhasil ditemukan.</div>';

        $pesannotif = '<div id="generate-datanilai" class="note note-info"><div class="row"><div class="col-md-3">Mata Pelajaran</div><div class="col-md-3">: <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b></div><div class="col-md-3">Nilai Pengetahuan &lt; KKM</div><div class="col-md-3">: <b>'.$kkmpengetahuan.'</b></div></div><div class="row"><div class="col-md-3">Kelas</div><div class="col-md-3">: <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).' - '.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b></div><div class="col-md-3">Nilai Keterampilan &lt; KKM</div><div class="col-md-3">: <b>'.$kkmketerampilan.'</b></div></div><div class="row"><div class="col-md-3">Jumlah</div><div class="col-md-3">: <b>'.$jumlahsiswa.' Siswa</b></div><div class="col-md-3">Nilai Pengetahuan Kosong</div><div class="col-md-3">: <b>'.$pengetahuankosong.'</b></div></div><div class="row"><div class="col-md-3">Jurusan</div><div class="col-md-3">: <b>'.$this->get_jurusankelas($this->input->post('rekap_kelas')).'</b></div><div class="col-md-3">Nilai Keterampilan Kosong </div><div class="col-md-3">: <b>'.$keterampilankosong.'</b></div></div></div>';
         $pesandata = 'sukses';

       
        }
        
        

        $data = array('suksespesan' => $pesansukses,
                      'suksesnotif' => $pesannotif,
                      'pesannotif' => $pesandata,
                       'status'   => TRUE  );
        echo json_encode($data);
    }


    
    public function halobro() {

      echo 'jumlah : '.$this->rekapnilai_m->hitung_data_nilai_pengetahuan('41', '2016/2017', '3', '89');
      echo '<br>';
      echo 'jumlah : '.$this->rekapnilai_m->hitung_data_nilai_keterampilan('41', '2016/2017', '3', '89');
      echo '<br>';
      $this->rekapnilai_m->hitung_data_nilai_pengetahuan_KKM('41', '2016/2017', '3', '89');
      dump($this->db->last_query());
    }
    

    private function validasi_cari() {
          $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;


        if ($this->input->post('rekap_semester') !== '1' && $this->input->post('rekap_semester') !== '2' && $this->input->post('rekap_semester') !== '3' && $this->input->post('rekap_semester') !== '4' && $this->input->post('rekap_semester') !== '5' && $this->input->post('rekap_semester') !== '6' && trim($this->input->post('rekap_semester') !== '') && trim($this->input->post('rekap_semester') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>semester</b> yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

        if ($this->cekdatakelas($this->input->post('rekap_kelas')) < 1 && trim($this->input->post('rekap_kelas') !== '') && trim($this->input->post('rekap_kelas') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>kelas</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }

         if ($this->cekdatatahun($this->input->post('rekap_tahun')) < 1 && trim($this->input->post('rekap_tahun') !== '') && trim($this->input->post('rekap_tahun') !== NULL)) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Data <b>angkatan</b>, yang anda masukkan <b>tidak valid</b>.';
            $data['status'] = FALSE;
        }


        
        if ($this->cekdatamasuk($this->input->post('rekap_kelas'),$this->input->post('rekap_tahun'),$this->input->post('rekap_mapel'),$this->input->post('rekap_semester')) !== 1) {
            $data['inputerror'][] = 'data_masuk';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning:</strong> Maaf anda <b>tidak memiliki hak</b> untuk mengakses nilai mapel : <b>'.$this->get_nama_mapel($this->input->post('rekap_mapel')).'</b>, pada kelas : <b>'.$this->get_namakelas($this->input->post('rekap_kelas')).'</b>:<b>'.$this->get_tahunkelas($this->input->post('rekap_kelas')).'</b>, tahun ajaran : <b>'.$this->konfigurasi_m->konfig_tahun_client().'</b>';
            $data['status'] = FALSE;
        }
  

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

         
        return $row->kelas_tahun;
           
        } else {

          return FALSE;
        }


    }


     private function get_nama_mapel($id) {
        $query = $this->db->query('SELECT mapel_nama FROM raport_mapel WHERE mapel_id="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->mapel_nama;
        } else {

          return FALSE;
        }

        

    }

     private function cekdatakelas($kelas)
    {

        $query = $this->db->query('SELECT count(kelas_code) as jumlah FROM raport_kelas WHERE kelas_code= "'.$this->db->escape_str($kelas).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->jumlah;
           
        } else {

          return FALSE;
        }
         
    }


     private function cekdatatahun($angkatan)
    {

        $query = $this->db->query('SELECT COUNT(DISTINCT(kelas_tahun)) as jumlah FROM raport_kelas WHERE kelas_tahun= "'.$this->db->escape_str($angkatan).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->jumlah;
           
        } else {

          return FALSE;
        }
         
    }

      private function cekdatamapel($mapel)
    {

        $query = $this->db->query('SELECT count(mapel_id) as jumlah FROM raport_mapel WHERE mapel_id= "'.$this->db->escape_str($mapel).'"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

        return $row->jumlah;
           
        } else {

          return FALSE;
        }
         
    }

    private function get_jurusankelas($id) {
        $query = $this->db->query('SELECT kelas_kk FROM raport_kelas WHERE kelas_code="'.$this->db->escape_str($id).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->kelas_kk;
           
        } else {

          return FALSE;
        }

        

    }


    private function jumlahsiswa($kelas)
    {

        $query = $this->db->query('SELECT count(siswa_nis) as jumlah FROM raport_siswa WHERE siswa_kelas = "'.$this->db->escape_str($kelas).'" AND siswa_status = "1"');
        //$query = $this->db->get();
        
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         return $row->jumlah;
           
        } else {

         return FALSE;
        }
    }


    private function cekdatamasuk($kelas, $dataangkatan, $mapel, $semester) {

       $dataangkatan = substr($dataangkatan, 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      

      if ($semester == 5 || $semester == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($semester == 3 || $semester == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($semester == 1 || $semester == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        $query = $this->db->query('SELECT * FROM raport_haknilai WHERE haknilai_kelas="'.$this->db->escape_str($kelas).'" AND haknilai_kodeguru = "'.$this->session->userdata('user_login').'" AND haknilai_tahunajaran="'.$this->db->escape_str($tahunajaran).'" AND haknilai_mapel="'.$this->db->escape_str($mapel).'" AND haknilai_status="1"');

        if ($query->num_rows() > 0)
        {
          return 1;
           
        } else {

          return 0;
        }

        

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



   


    
   
}