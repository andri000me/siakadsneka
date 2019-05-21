<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapnilai_m extends MY_Model {

	protected $table = 'DATA_SISWA';
	protected $column = array('siswa_nis','siswa_nama','kelas_nama','siswa_absen', 'mapel_nama','nilai_semester', 'KKM_P','PENGETAHUAN', 'KETERAMPILAN' ); //set column field database for order and search
	protected $order = array('siswa_absen' => 'asc'); // default order 
	protected $_table_name = 'DATA_SISWA';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query($kelas, $tahun, $semester, $mapel)
	{
		  $this->db->select('siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun, mapel_nama, nilai_mapel, guru_nama,  nilai_semester, nilai_tahun, KKM_P, KKM_K, PENGETAHUAN, KETERAMPILAN');
        $this->db->from('( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA');
         $this->db->join('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, haknilai_kodeguru,
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_P", raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_K", raport_nilai.nilai_data, NULL)) AS KETERAMPILAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND nilai_mapel = "'.$mapel.'"


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI', 'DATA_NILAI.nilai_nis = DATA_SISWA.siswa_nis', 'left');


          
          $this->db->where('kelas_code', $kelas);
          $this->db->where('nilai_tahun', $tahun);
          $this->db->where('nilai_semester', $semester);
          $this->db->where('nilai_mapel', $mapel);
          $this->db->where('siswa_status', '1');
          //$this->db->order_by('siswa_absen', 'ASC');

      
        $i = 0;
		
		foreach ($this->column as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('kelas_code', $_POST['columns'][4]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][5]['search']['value']);
					$this->db->like('nilai_semester', $_POST['columns'][6]['search']['value']);
					$this->db->like('nilai_mapel', $_POST['columns'][7]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('kelas_code', $_POST['columns'][4]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][5]['search']['value']);
					$this->db->like('nilai_semester', $_POST['columns'][6]['search']['value']);
					$this->db->like('nilai_mapel', $_POST['columns'][7]['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][4]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_code', $_POST['columns'][4]['search']['value']);

					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][5]['search']['value']);
				
					}

					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('nilai_semester', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('nilai_mapel', $_POST['columns'][7]['search']['value']);
					
					}



					$this->db->group_end(); //close bracket

			

			} elseif (!empty($_POST['columns'][5]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_tahun', $_POST['columns'][5]['search']['value']);

					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('kelas_code', $_POST['columns'][4]['search']['value']);
				
					}

					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('nilai_semester', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('nilai_mapel', $_POST['columns'][7]['search']['value']);
					
					}
				
					$this->db->group_end(); //close bracket
					
			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('nilai_semester', $_POST['columns'][6]['search']['value']);

					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('kelas_code', $_POST['columns'][4]['search']['value']);
				
					}

					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][5]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('nilai_mapel', $_POST['columns'][7]['search']['value']);
					
					}
				
					$this->db->group_end(); //close bracket
					
			} elseif (!empty($_POST['columns'][7]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('nilai_mapel', $_POST['columns'][7]['search']['value']);
					


					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('kelas_code', $_POST['columns'][4]['search']['value']);
					
					}

					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][5]['search']['value']);
				
					}

					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('nilai_semester', $_POST['columns'][6]['search']['value']);
				
					}

					
					$this->db->group_end(); //close bracket

			}

		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			

		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}


	public function get_datatables_data_rekap($kelas, $tahun, $semester, $mapel)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
		if ($this->session->userdata('user_level') == 2) {
          	 $this->db->where('haknilai_kodeguru', $this->session->userdata('user_login'));
          }
        if($this->input->post('length') != -1)
       $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function get_datatables_data_rekap_wali($kelas, $tahun, $semester, $mapel)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
        if($this->input->post('length') != -1)
       $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function get_datatables_data_rekap_excel($kelas, $tahun, $semester, $mapel, $status)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
       	$this->db->where('siswa_status', $status);
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_data_rekap($kelas, $tahun, $semester, $mapel)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
		if ($this->session->userdata('user_level') == 2) {
          	 $this->db->where('haknilai_kodeguru', $this->session->userdata('user_login'));
         }
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_data_rekap_wali($kelas, $tahun, $semester, $mapel)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_rekap($kelas, $tahun, $semester, $mapel)
	{
		
        $this->db->select('siswa_nis, siswa_nama, siswa_absen, kelas_code, kelas_nama, kelas_kk, kelas_tahun, mapel_nama, nilai_mapel, guru_nama,  nilai_semester, nilai_tahun, KKM_P, KKM_K, PENGETAHUAN, KETERAMPILAN');
        $this->db->from('( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA');
         $this->db->join('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, haknilai_kodeguru,
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_P", raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_K", raport_nilai.nilai_data, NULL)) AS KETERAMPILAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND nilai_mapel = "'.$mapel.'"


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI', 'DATA_NILAI.nilai_nis = DATA_SISWA.siswa_nis', 'left');


         
          $this->db->where('kelas_code', $kelas);
          $this->db->where('nilai_tahun', $tahun);
          $this->db->where('nilai_semester', $semester);
          $this->db->where('nilai_mapel', $mapel);
          $this->db->where('siswa_status', '1');
          //$this->db->order_by('siswa_absen', 'ASC');


          return $this->db->count_all_results();
	}


	public function hitung_data_nilai_sikap($kelas, $tahun, $semester, $mapel)
	{
		
       
		return $this->db->count_all_results();
	}



	public function hitung_data_nilai_pengetahuan($kelas, $tahun, $semester, $mapel)
	{
		
       $this->db->select('COUNT(PENGETAHUAN) as JUMLAH');
        $this->db->from('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, 
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_P", raport_nilai.nilai_data, NULL)) AS PENGETAHUAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


		LEFT JOIN ( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA ON DATA_SISWA.siswa_nis = raport_nilai.nilai_nis

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru 

		WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND kelas_code = "'.$kelas.'" AND nilai_mapel = "'.$mapel .'" AND siswa_status = "1"

	


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI');

        $query = $this->db->get();

		return $query->row()->JUMLAH;
	}


	public function hitung_data_nilai_pengetahuan_KKM($kelas, $tahun, $semester, $mapel)
	{
		
       $this->db->select('COUNT(PENGETAHUAN) as JUMLAH');
        $this->db->from('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, 
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_P", raport_nilai.nilai_data, NULL)) AS PENGETAHUAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


		LEFT JOIN ( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA ON DATA_SISWA.siswa_nis = raport_nilai.nilai_nis

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru 

		WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND kelas_code = "'.$kelas.'" AND nilai_mapel = "'.$mapel .'" AND siswa_status = "1"

	


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI WHERE PENGETAHUAN < KKM_P');

        $query = $this->db->get();

		return $query->row()->JUMLAH;
	}

	public function hitung_data_nilai_pengetahuan_guru($kelas, $tahun, $semester, $mapel)
	{
		
       $this->db->select('COUNT(PENGETAHUAN) as JUMLAH');
        $this->db->from('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, 
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_P", raport_nilai.nilai_data, NULL)) AS PENGETAHUAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


		LEFT JOIN ( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA ON DATA_SISWA.siswa_nis = raport_nilai.nilai_nis

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru 

		WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND kelas_code = "'.$kelas.'" AND nilai_mapel = "'.$mapel .'" AND haknilai_kodeguru = '.$this->session->userdata('user_login').' AND siswa_status = "1"

	


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI');

        $query = $this->db->get();

		return $query->row()->JUMLAH;
	}


	public function hitung_data_nilai_keterampilan($kelas, $tahun, $semester, $mapel)
	{
		
       $this->db->select('COUNT(KETERAMPILAN) as JUMLAH');
        $this->db->from('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, 
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_K", raport_nilai.nilai_data, NULL)) AS KETERAMPILAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


		LEFT JOIN ( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA ON DATA_SISWA.siswa_nis = raport_nilai.nilai_nis

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru 

		WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND kelas_code = "'.$kelas.'" AND nilai_mapel = "'.$mapel .'" AND siswa_status = "1"

	


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI');

        $query = $this->db->get();

		return $query->row()->JUMLAH;
	}

	public function hitung_data_nilai_keterampilan_KKM($kelas, $tahun, $semester, $mapel)
	{
		
       $this->db->select('COUNT(KETERAMPILAN) as JUMLAH');
        $this->db->from('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, 
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_K", raport_nilai.nilai_data, NULL)) AS KETERAMPILAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


		LEFT JOIN ( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA ON DATA_SISWA.siswa_nis = raport_nilai.nilai_nis

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru 

		WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'" AND kelas_code = "'.$kelas.'" AND nilai_mapel = "'.$mapel .'" AND siswa_status = "1"

	


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI WHERE KETERAMPILAN < KKM_K');

        $query = $this->db->get();

		return $query->row()->JUMLAH;
	}

	public function hitung_data_nilai_keterampilan_guru($kelas, $tahun, $semester, $mapel)
	{
		
       $this->db->select('COUNT(KETERAMPILAN) as JUMLAH');
        $this->db->from('(

		SELECT nilai_nis, nilai_mapel, mapel_nama, guru_nama, 
		haknilai_kkm as KKM_P,
		haknilai_kkm2 as KKM_K,
		nilai_semester,
		nilai_tahun,

		MAX(IF(raport_nilai.nilai_jenis = "RAPORT_K", raport_nilai.nilai_data, NULL)) AS KETERAMPILAN

		FROM raport_nilai 

		LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

		LEFT JOIN (SELECT haknilai_mapel, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran= "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'") as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


		LEFT JOIN ( SELECT siswa_nis, siswa_nama, siswa_absen, siswa_status, kelas_code, kelas_nama, kelas_kk, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as DATA_SISWA ON DATA_SISWA.siswa_nis = raport_nilai.nilai_nis

		LEFT JOIN raport_guru ON raport_guru.guru_kode = raport_nilai.nilai_kodeguru 

		WHERE nilai_tahun = "'.$tahun.'" AND nilai_semester = "'.$semester.'"  AND kelas_code = "'.$kelas.'" AND nilai_mapel = "'.$mapel .'" AND haknilai_kodeguru = '.$this->session->userdata('user_login').' AND siswa_status = "1"

	


		GROUP BY nilai_nis, nilai_mapel ) as DATA_NILAI');

        $query = $this->db->get();

		return $query->row()->JUMLAH;
	}


	
	





}
