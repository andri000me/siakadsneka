<?php
class Rangking extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        $this->load->model('rangking_m');
        $this->load->model('siswa_m');
        
    }

    public function rangkingkelas() {
    	   $this->data['data_angkatan_aktif2'] = $this->siswa_m->get_data_angkatan_aktif2();
        $this->data['data_angkatan_tidakaktif2'] = $this->siswa_m->get_data_angkatan2();
        
    	//Load Data View Rangking Kelas
    	$this->data['subview'] = 'admin/rangking/rangkingkelas';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

    public function cekdb($tahunajaran2) {

      $tahunajaran = str_replace('-','/', $tahunajaran2);
        $this->db->select('kelas_code, kelas_nama, kelas_tahun , rata_rata_pengetahuan, rata_rata_keterampilan, cast( ((rata_rata_pengetahuan+rata_rata_keterampilan)/2) as decimal(4, 2))  as rata_rata_kelas
');
    $this->db->from('(SELECT kelas_code, kelas_nama, kelas_tahun, jumlah_nilai, jumlah_mapel, jumlah_siswa,  cast((jumlah_nilai/(jumlah_mapel*jumlah_siswa)) as decimal(4, 2)) as rata_rata_pengetahuan 

FROM (SELECT kelas_code, kelas_nama, kelas_tahun, SUM(nilai_data) as jumlah_nilai FROM raport_nilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas WHERE nilai_jenis = "RAPORT_P" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" GROUP BY nilai_kelas) as hitung_jumlah_nilai 

LEFT JOIN 
(SELECT kelas_code as kelas_code2, kelas_nama as kelas_nama2, kelas_tahun as kelas_tahun2, (COUNT(jumlahsiswa)+1) as jumlah_mapel FROM (SELECT kelas_code, kelas_nama, kelas_tahun, count(DISTINCT(nilai_nis)) as jumlahsiswa FROM (SELECT * FROM raport_nilai LEFT JOIN raport_mapel ON raport_nilai.nilai_mapel = raport_mapel.mapel_id) as raport_nilai2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai2.nilai_kelas WHERE nilai_jenis = "RAPORT_P" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" AND mapel_nama NOT LIKE "%endidikan agama%" GROUP BY nilai_kelas, nilai_mapel) as jumlah_data_mapel GROUP BY kelas_code) as hitung_jumlah_mapel

ON  hitung_jumlah_mapel.kelas_code2 = hitung_jumlah_nilai.kelas_code

LEFT JOIN
(SELECT kelas_code as kelas_code3, kelas_nama as kelas_nama3, kelas_tahun as kelas_tahun3, count(siswa_nis) as jumlah_siswa FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas GROUP BY kelas_code
) as hitung_jumlah_siswa

ON hitung_jumlah_siswa.kelas_code3 = hitung_jumlah_nilai.kelas_code) as data_rata_pengetahuan



LEFT JOIN(SELECT kelas_code as kelas_code4, kelas_nama as kelas_nama4, kelas_tahun as kelas_tahun4, jumlah_nilai, jumlah_mapel, jumlah_siswa,  cast((jumlah_nilai/(jumlah_mapel*jumlah_siswa)) as decimal(4, 2)) as rata_rata_keterampilan

FROM (SELECT kelas_code, kelas_nama, kelas_tahun, SUM(nilai_data) as jumlah_nilai FROM raport_nilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas WHERE nilai_jenis = "RAPORT_K" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" GROUP BY nilai_kelas) as hitung_jumlah_nilai 

LEFT JOIN 
(SELECT kelas_code as kelas_code2, kelas_nama as kelas_nama2, kelas_tahun as kelas_tahun2, (COUNT(jumlahsiswa)+1) as jumlah_mapel FROM (SELECT kelas_code, kelas_nama, kelas_tahun, count(DISTINCT(nilai_nis)) as jumlahsiswa FROM (SELECT * FROM raport_nilai LEFT JOIN raport_mapel ON raport_nilai.nilai_mapel = raport_mapel.mapel_id) as raport_nilai2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai2.nilai_kelas WHERE nilai_jenis = "RAPORT_K" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" AND mapel_nama NOT LIKE "%endidikan agama%" GROUP BY nilai_kelas, nilai_mapel) as jumlah_data_mapel GROUP BY kelas_code) as hitung_jumlah_mapel

ON  hitung_jumlah_mapel.kelas_code2 = hitung_jumlah_nilai.kelas_code

LEFT JOIN
(SELECT kelas_code as kelas_code3, kelas_nama as kelas_nama3, kelas_tahun as kelas_tahun3, count(siswa_nis) as jumlah_siswa FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas GROUP BY kelas_code
) as hitung_jumlah_siswa

ON hitung_jumlah_siswa.kelas_code3 = hitung_jumlah_nilai.kelas_code) as data_rata_keterampilan

ON data_rata_keterampilan.kelas_code4 = data_rata_pengetahuan.kelas_code ORDER BY rata_rata_kelas DESC');
         //$this->db->join('(SELECT @rownum := 0)  AS v', 'cross');
          $query = $this->db->get();
       dump($this->db->last_query());
    }




    public function rangkingmapel() {
        
        //Load Data View Rangking Mapel
        $this->data['subview'] = 'admin/rangking/rangkingmapel';
        $this->load->view('admin/admindesain', $this->data);
        
    }




     public function ajax_list_rank()
    {

      $dataangkatan = substr($this->input->post('rank_tahun'), 0 , 4);
      $semester5dan6 = $dataangkatan.'/'.($dataangkatan+1);
      $semester3dan4 = ($dataangkatan-1).'/'.$dataangkatan;
      $semester1dan2 = ($dataangkatan-2).'/'.($dataangkatan-1);


      if ($this->input->post('rank_semester') == 5 || $this->input->post('rank_semester') == 6 ) {
         
           $tahunajaran =$semester5dan6;

      } elseif ($this->input->post('rank_semester') == 3 || $this->input->post('rank_semester') == 4) {
          
          $tahunajaran = $semester3dan4;
      } elseif ($this->input->post('rank_semester') == 1 || $this->input->post('rank_semester') == 2) {
          
          $tahunajaran = $semester1dan2;
      } else {
         
          $tahunajaran = 'XXXX/XXXX';
      }

        if ($this->input->post('semester_cari') == '') {
          $list = $this->rangking_m->get_datatables_data_rank('', '');
        } else {
          $list = $this->rangking_m->get_datatables_data_rank($this->input->post('kelas_cari'), $this->input->post('semester_cari'));
        
        }

        
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $rank) {
            $no++;


            $row = array();
           // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$rank->siswa_nis.'">';
            $row[] = $no;
            $row[] =  '<span class="label bg-blue-hoki">'.$rank->siswa_nis.'</span>';
            $row[] = $rank->siswa_nama;
            $row[] =  '<span class="label label-primary tooltips" data-placement="top" data-original-title="'.$rank->siswa_kelas .'-'. $rank->kelas_kk.'-'.$rank->kelas_tahun.'">'. $rank->kelas_nama.'</span>';
            //$row[] =  $rank->siswa_pk;
            $row[] =  '<span class="badge label-info label-sm">'. $rank->siswa_absen. '</span>';
            //$row[] = '<span class="label label-warning tooltips" data-placement="top" data-original-title="Angkatan : '.$rank->kelas_tahun.'">'.$rank->kelas_nama.'</span>';
            $row[] = $rank->JUMLAH_K;
            $row[] = $rank->RATA_RATA_K;
            $row[] = '<span class="label bg-yellow">
                  <i class="icon-badge"></i> <b>'.$rank->RANK_K.'</b></span>';
            $row[] = $rank->JUMLAH_P;
            $row[] = $rank->RATA_RATA_P;
            $row[] = '<span class="label bg-blue">
                  <i class="icon-badge"></i> <b>'.$rank->RANK_P.'</b></span>';
            $row[] = $rank->JUMLAH_SEMUA;
            $row[] = $rank->RATA_RATA_SEMUA;
            $row[] = '<span class="label label-warning">
                  <i class="icon-badge"></i> <b>'.$rank->RANK_SEMUA.'</b></span>';
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $this->rangking_m->count_all_data_rank($this->input->post('kelas_cari'), $this->input->post('semester_cari')),
                        "recordsFiltered" => $this->rangking_m->count_filtered_data_rank($this->input->post('kelas_cari'), $this->input->post('semester_cari')),
                        "data" => $data,
                );
        //output to json format
       //dump($this->db->last_query());
        echo json_encode($output);
        //echo $this->db->last_query();


    }

   


    
   
}