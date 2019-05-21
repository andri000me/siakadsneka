<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangking_M extends MY_Model {

	protected $table = 'raport_nilai';
	protected $column = array('siswa_nis','siswa_nama','kelas_nama','siswa_absen', 'JUMLAH_K', 'RATA_RATA_K', 'RANK_K', 'JUMLAH_P', 'RATA_RATA_P', 'RANK_P', 'JUMLAH_SEMUA', 'RATA_RATA_SEMUA', 'RANK_SEMUA'); //set column field database for order and search
	protected $order = array('RANK_SEMUA' => 'asc'); // default order 
	protected $primary_id = 'RATA_RATA_SEMUA';
	protected $_primary_key = 'RATA_RATA_SEMUA';
	protected $_table_name = 'raport_nilai';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query($kelas, $semester)
	{
		  $this->db->select('siswa_nis, siswa_nama, kelas_nama, kelas_kk, kelas_tahun, siswa_kelas, siswa_absen, JUMLAH_K, RATA_RATA_K, RANK_K, JUMLAH_P, RATA_RATA_P, RANK_P, JUMLAH_SEMUA, RATA_RATA_SEMUA, RANK_SEMUA');
        $this->db->from('(SELECT `siswa_nis`
, `siswa_nama`, `kelas_nama`, `kelas_kk`, `kelas_tahun`, `siswa_kelas`, `siswa_absen`, `siswa_status`, `JUMLAH_K`, `RATA_RATA_K`, `RANK_K`, `JUMLAH_P`, `RATA_RATA_P`, `RANK_P`, `JUMLAH_SEMUA`, `RATA_RATA_SEMUA`, (@rownum := @rownum
 + 1) AS RANK_SEMUA
FROM (SELECT siswa_nis, `siswa_nama`, `kelas_nama`, `kelas_kk`, `kelas_tahun`, `siswa_kelas`, `siswa_absen`, `siswa_status`,  `JUMLAH_K`, `RATA_RATA_K`, `RANK_K`, `JUMLAH_P`, `RATA_RATA_P`, `RANK_P`, (JUMLAH_K+JUMLAH_P) as JUMLAH_SEMUA
, cast((RATA_RATA_K + RATA_RATA_P)/2 as decimal(4, 2)) as RATA_RATA_SEMUA 



FROM 



raport_siswa




 LEFT JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas






 LEFT JOIN (


SELECT nilai_nis as NIS_K, `JUMLAH_K`, cast(rata_rata as decimal(4, 2)) as RATA_RATA_K, @rownum_k :=
 @rownum_k + 1 AS RANK_K FROM (select nilai_nis, sum(nilai_data) as JUMLAH_K, (sum(nilai_data)/(select
 count(data_nis)+1 FROM (SELECT nilai_nis as data_nis FROM raport_nilai

LEFT JOIN raport_mapel ON raport_mapel.mapel_id=raport_nilai.nilai_mapel LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_K" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  AND mapel_nama NOT LIKE "%endidikan agama%"  group by  nilai_mapel ) as raport_nilai3)) as rata_rata


FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_K" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  

group by nilai_nis) as raport_nilai2

JOIN (SELECT @rownum_k := 0)  AS v
ORDER BY `raport_nilai2`.`rata_rata`  DESC )



 as DATA_K ON DATA_K.NIS_K = raport_siswa.siswa_nis







LEFT JOIN (



SELECT nilai_nis as NIS_P, `JUMLAH_P`, cast(rata_rata as decimal(4, 2)) as RATA_RATA_P, @rownum_p :=
 @rownum_p + 1 AS RANK_P FROM 

 (select nilai_nis, sum(nilai_data) as JUMLAH_P, (sum(nilai_data)/(select
 count(data_nis)+1 FROM (SELECT nilai_nis as data_nis FROM raport_nilai

LEFT JOIN raport_mapel ON raport_mapel.mapel_id=raport_nilai.nilai_mapel LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_P" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  AND mapel_nama NOT LIKE "%endidikan agama%"  group by  nilai_mapel ) as raport_nilai3)) as rata_rata


FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_P" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  

group by nilai_nis) 


as raport_nilai2

JOIN (SELECT @rownum_p := 0)  AS v
ORDER BY `raport_nilai2`.`rata_rata`  DESC 




) as DATA_P ON DATA_P.NIS_P = raport_siswa.siswa_nis


WHERE siswa_kelas = "'.$this->db->escape_str($kelas).'" ORDER BY  RATA_RATA_SEMUA DESC)


 as NILAI_SEMUA JOIN 



 (SELECT @rownum := 0)  AS
 

 v  ) as DATA_RANKING_SEMUA  



');

$this->db->where('siswa_status', 1);     
      
		$i = 0;
		
		foreach ($this->column as $item) // loop column $this->input->post('search', 'value'))
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

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


	public function get_datatables_data_rank($kelas,$semester)
	{
		$this->_get_datatables_query($kelas,$semester);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_data_rank($kelas,$semester)
	{
		$this->_get_datatables_query($kelas,$semester);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_rank($kelas,$semester)
	{
		
        $this->db->select('siswa_nis, siswa_nama, kelas_nama, kelas_kk, kelas_tahun, siswa_kelas, siswa_absen, JUMLAH_K, RATA_RATA_K, RANK_K, JUMLAH_P, RATA_RATA_P, RANK_P, JUMLAH_SEMUA, RATA_RATA_SEMUA, RANK_SEMUA');
        $this->db->from('(SELECT `siswa_nis`
, `siswa_nama`, `kelas_nama`, `kelas_kk`, `kelas_tahun`, `siswa_kelas`, `siswa_absen`, `siswa_status`, `JUMLAH_K`, `RATA_RATA_K`, `RANK_K`, `JUMLAH_P`, `RATA_RATA_P`, `RANK_P`, `JUMLAH_SEMUA`, `RATA_RATA_SEMUA`, (@rownum := @rownum
 + 1) AS RANK_SEMUA
FROM (SELECT siswa_nis, `siswa_nama`, `kelas_nama`, `kelas_kk`, `kelas_tahun`, `siswa_kelas`, `siswa_absen`, `siswa_status`,  `JUMLAH_K`, `RATA_RATA_K`, `RANK_K`, `JUMLAH_P`, `RATA_RATA_P`, `RANK_P`, (JUMLAH_K+JUMLAH_P) as JUMLAH_SEMUA
, cast((RATA_RATA_K + RATA_RATA_P)/2 as decimal(4, 2)) as RATA_RATA_SEMUA 



FROM 



raport_siswa




 LEFT JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas






 LEFT JOIN (


SELECT nilai_nis as NIS_K, `JUMLAH_K`, cast(rata_rata as decimal(4, 2)) as RATA_RATA_K, @rownum_k :=
 @rownum_k + 1 AS RANK_K FROM (select nilai_nis, sum(nilai_data) as JUMLAH_K, (sum(nilai_data)/(select
 count(data_nis)+1 FROM (SELECT nilai_nis as data_nis FROM raport_nilai

LEFT JOIN raport_mapel ON raport_mapel.mapel_id=raport_nilai.nilai_mapel LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_K" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  AND mapel_nama NOT LIKE "%endidikan agama%"  group by  nilai_mapel ) as raport_nilai3)) as rata_rata


FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_K" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  

group by nilai_nis) as raport_nilai2

JOIN (SELECT @rownum_k := 0)  AS v
ORDER BY `raport_nilai2`.`rata_rata`  DESC )



 as DATA_K ON DATA_K.NIS_K = raport_siswa.siswa_nis







LEFT JOIN (



SELECT nilai_nis as NIS_P, `JUMLAH_P`, cast(rata_rata as decimal(4, 2)) as RATA_RATA_P, @rownum_p :=
 @rownum_p + 1 AS RANK_P FROM 

 (select nilai_nis, sum(nilai_data) as JUMLAH_P, (sum(nilai_data)/(select
 count(data_nis)+1 FROM (SELECT nilai_nis as data_nis FROM raport_nilai

LEFT JOIN raport_mapel ON raport_mapel.mapel_id=raport_nilai.nilai_mapel LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_P" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  AND mapel_nama NOT LIKE "%endidikan agama%"  group by  nilai_mapel ) as raport_nilai3)) as rata_rata


FROM raport_nilai LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis

WHERE nilai_jenis="RAPORT_P" AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'"  

group by nilai_nis) 


as raport_nilai2

JOIN (SELECT @rownum_p := 0)  AS v
ORDER BY `raport_nilai2`.`rata_rata`  DESC 




) as DATA_P ON DATA_P.NIS_P = raport_siswa.siswa_nis


WHERE siswa_kelas = "'.$this->db->escape_str($kelas).'" ORDER BY  RATA_RATA_SEMUA DESC)


 as NILAI_SEMUA JOIN 



 (SELECT @rownum := 0)  AS
 

 v  ) as DATA_RANKING_SEMUA  WHERE siswa_status = 1



');
		return $this->db->count_all_results();
	}


	public function get_ranking_kelas($tahunajaran,$semester1,$semester2,$semester3)
	{

		$this->db->cache_on();
		$this->db->select('kelas_code, kelas_nama, kelas_tahun , rata_rata_pengetahuan, rata_rata_keterampilan, cast( ((rata_rata_pengetahuan+rata_rata_keterampilan)/2) as decimal(4, 2))  as rata_rata_kelas
');
		$this->db->from('(SELECT kelas_code, kelas_nama, kelas_tahun, jumlah_nilai, jumlah_mapel, jumlah_siswa,  cast((jumlah_nilai/(jumlah_mapel*jumlah_siswa)) as decimal(4, 2)) as rata_rata_pengetahuan 

FROM (SELECT kelas_code, kelas_nama, kelas_tahun, SUM(nilai_data) as jumlah_nilai FROM raport_nilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas WHERE nilai_jenis = "RAPORT_P" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" AND (nilai_semester = "'.$this->db->escape_str($semester1).'" OR nilai_semester =  "'.$this->db->escape_str($semester2).'" OR nilai_semester =  "'.$this->db->escape_str($semester3).'") GROUP BY nilai_kelas) as hitung_jumlah_nilai 

LEFT JOIN 
(SELECT kelas_code as kelas_code2, kelas_nama as kelas_nama2, kelas_tahun as kelas_tahun2, (COUNT(jumlahsiswa)+1) as jumlah_mapel FROM (SELECT kelas_code, kelas_nama, kelas_tahun, count(DISTINCT(nilai_nis)) as jumlahsiswa FROM (SELECT * FROM raport_nilai LEFT JOIN raport_mapel ON raport_nilai.nilai_mapel = raport_mapel.mapel_id) as raport_nilai2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai2.nilai_kelas WHERE nilai_jenis = "RAPORT_P" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" AND mapel_nama NOT LIKE "%endidikan agama%" AND (nilai_semester = "'.$this->db->escape_str($semester1).'" OR nilai_semester =  "'.$this->db->escape_str($semester2).'" OR nilai_semester =  "'.$this->db->escape_str($semester3).'") GROUP BY nilai_kelas, nilai_mapel) as jumlah_data_mapel GROUP BY kelas_code) as hitung_jumlah_mapel

ON  hitung_jumlah_mapel.kelas_code2 = hitung_jumlah_nilai.kelas_code

LEFT JOIN
(SELECT kelas_code as kelas_code3, kelas_nama as kelas_nama3, kelas_tahun as kelas_tahun3, count(siswa_nis) as jumlah_siswa FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas  WHERE siswa_status=1 GROUP BY kelas_code
) as hitung_jumlah_siswa

ON hitung_jumlah_siswa.kelas_code3 = hitung_jumlah_nilai.kelas_code) as data_rata_pengetahuan



LEFT JOIN(SELECT kelas_code as kelas_code4, kelas_nama as kelas_nama4, kelas_tahun as kelas_tahun4, jumlah_nilai, jumlah_mapel, jumlah_siswa,  cast((jumlah_nilai/(jumlah_mapel*jumlah_siswa)) as decimal(4, 2)) as rata_rata_keterampilan

FROM (SELECT kelas_code, kelas_nama, kelas_tahun, SUM(nilai_data) as jumlah_nilai FROM raport_nilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas WHERE nilai_jenis = "RAPORT_K" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" AND (nilai_semester = "'.$this->db->escape_str($semester1).'" OR nilai_semester =  "'.$this->db->escape_str($semester2).'" OR nilai_semester =  "'.$this->db->escape_str($semester3).'") GROUP BY nilai_kelas) as hitung_jumlah_nilai 

LEFT JOIN 
(SELECT kelas_code as kelas_code2, kelas_nama as kelas_nama2, kelas_tahun as kelas_tahun2, (COUNT(jumlahsiswa)+1) as jumlah_mapel FROM (SELECT kelas_code, kelas_nama, kelas_tahun, count(DISTINCT(nilai_nis)) as jumlahsiswa FROM (SELECT * FROM raport_nilai LEFT JOIN raport_mapel ON raport_nilai.nilai_mapel = raport_mapel.mapel_id) as raport_nilai2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai2.nilai_kelas WHERE nilai_jenis = "RAPORT_K" AND nilai_tahun = "'.$this->db->escape_str($tahunajaran).'" AND mapel_nama NOT LIKE "%endidikan agama%" AND (nilai_semester = "'.$this->db->escape_str($semester1).'" OR nilai_semester =  "'.$this->db->escape_str($semester2).'" OR nilai_semester =  "'.$this->db->escape_str($semester3).'") GROUP BY nilai_kelas, nilai_mapel) as jumlah_data_mapel GROUP BY kelas_code) as hitung_jumlah_mapel

ON  hitung_jumlah_mapel.kelas_code2 = hitung_jumlah_nilai.kelas_code

LEFT JOIN
(SELECT kelas_code as kelas_code3, kelas_nama as kelas_nama3, kelas_tahun as kelas_tahun3, count(siswa_nis) as jumlah_siswa FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_status=1 GROUP BY kelas_code
) as hitung_jumlah_siswa

ON hitung_jumlah_siswa.kelas_code3 = hitung_jumlah_nilai.kelas_code) as data_rata_keterampilan

ON data_rata_keterampilan.kelas_code4 = data_rata_pengetahuan.kelas_code ORDER BY rata_rata_kelas DESC');
      //$this->db->limit(17);
        $query = $this->db->get();
        return $query->result();
	}

	





}
