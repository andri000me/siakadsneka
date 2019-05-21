<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumusrapormapel_M extends MY_Model {

	protected $order = array('ABSEN' => 'asc'); // default order 
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	


	 public function _get_datatables_query($kelas, $semester, $tahun, $mapel)
	{
		  
       
		$this->db->select("*");


        $this->db->from("(SELECT *, ROUND(NILAI_RAPOR_PENGETAHUAN, 0) as HASIL_RAPOR_PENGETAHUAN, ROUND(NILAI_RAPOR_KETERAMPILAN, 0) as HASIL_RAPOR_KETERAMPILAN FROM  (




SELECT *,

cast(  ( ( ( IFNULL(TOTAL_NH,0) * IFNULL(BOBOT_NH, 0) ) +  ( IFNULL(UTS, 0) * IFNULL(BOBOT_UTS, 0) ) + ( IFNULL(UAS,0) * IFNULL(BOBOT_UAS, 0) )  ) / (IFNULL(BOBOT_NH, 0) + IFNULL(BOBOT_UTS, 0) + IFNULL(BOBOT_UAS, 0))  ) as decimal(4, 2) ) as NILAI_RAPOR_PENGETAHUAN, 

cast( ( ( ( IFNULL(RATA_TP,0) * IFNULL(BOBOT_TP,0)) + (IFNULL(RATA_PR,0) * IFNULL(BOBOT_PR,0)) + (IFNULL(RATA_PO,0) * IFNULL(BOBOT_PO,0))   ) / (IFNULL(BOBOT_TP,0) + IFNULL(BOBOT_PR,0) + IFNULL(BOBOT_PO,0)) ) as decimal(4,2) ) as NILAI_RAPOR_KETERAMPILAN 


FROM 





(





SELECT nilai_nis_master as SISWA_NIS, siswa_nama as SISWA_NAMA, kelas_nama as SISWA_KELAS, kelas_code as KELAS_CODE, kelas_kk as KELAS_KK, kelas_tahun as KELAS_TAHUN, siswa_absen as ABSEN, mapel_nama as NAMA_MAPEL, nilai_semester as SEMESTER, guru_nama as GURU,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K,

".$this->TAMPIL_NILAI_UH($kelas, $semester, $tahun, $mapel)." RATA_UH, '".$this->konfigurasi_m->bobot_nilai('bobot_uh')."' as BOBOT_UH,  ".$this->TAMPIL_NILAI_TG($kelas, $semester, $tahun, $mapel)." RATA_TG, '".$this->konfigurasi_m->bobot_nilai('bobot_tg')."' as BOBOT_TG, cast(  ( (( IFNULL(RATA_UH,0) * IFNULL(BOBOT_UH,0)) + (IFNULL(RATA_TG,0) * IFNULL(BOBOT_TG,0))) / (IFNULL(BOBOT_UH,0) + IFNULL(BOBOT_TG,0)) )  as decimal(4, 2)) as TOTAL_NH, '".$this->konfigurasi_m->bobot_nilai('bobot_nh')."' as BOBOT_NH, JUMLAH_NH, UTS, '".$this->konfigurasi_m->bobot_nilai('bobot_uts')."' as BOBOT_UTS, UAS, '".$this->konfigurasi_m->bobot_nilai('bobot_uas')."' as BOBOT_UAS, ".$this->TAMPIL_NILAI_PS($kelas, $semester, $tahun, $mapel)." '".$this->konfigurasi_m->bobot_nilai('bobot_ps')."' as BOBOT_TP, RATA_TP, ".$this->TAMPIL_NILAI_PR($kelas, $semester, $tahun, $mapel)." '".$this->konfigurasi_m->bobot_nilai('bobot_pr')."' as BOBOT_PR, RATA_PR, ".$this->TAMPIL_NILAI_PO($kelas, $semester, $tahun, $mapel)."  '".$this->konfigurasi_m->bobot_nilai('bobot_po')."' as BOBOT_PO, RATA_PO


FROM




(


SELECT nilai_nis as nilai_nis_master, nilai_kodeguru as nilai_kodeguru_master,  siswa_nama , kelas_nama, kelas_kk, kelas_code, kelas_tahun, siswa_absen, mapel_nama, mapel_sort, nilai_mapel as nilai_mapel_master, nilai_semester



FROM 

(SELECT nilai_nis, nilai_kodeguru, siswa_nama, kelas_nama, kelas_kk, kelas_code, kelas_tahun, siswa_absen, mapel_nama, nilai_mapel, nilai_semester, mapel_sort,



COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  GROUP by nilai_nis, nilai_mapel) as NILAI_MASTER


) HASIL_MASTER




LEFT JOIN



(

SELECT nilai_nis  as nilai_nis_uh, siswa_nama as siswa_nama_uh , kelas_nama as kelas_nama_uh, mapel_nama as mapel_nama_uh, nilai_mapel as nilai_mapel_uh,  ".$this->TAMPIL_NILAI_UH($kelas, $semester, $tahun, $mapel)." 


cast((( ".$this->JUMLAH_NILAI_UH($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_UH, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uh')."' as BOBOT_UH



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_UH($kelas, $semester, $tahun, $mapel)."


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UH



) as HASIL_UH ON HASIL_UH.nilai_nis_uh =  HASIL_MASTER.nilai_nis_master 




LEFT JOIN 



(

SELECT nilai_nis  as nilai_nis_tg, siswa_nama as siswa_nama_tg , kelas_nama as kelas_nama_tg, mapel_nama as mapel_nama_tg, nilai_mapel as nilai_mapel_tg,  ".$this->TAMPIL_NILAI_TG($kelas, $semester, $tahun, $mapel)." 


cast((( ".$this->JUMLAH_NILAI_TG($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_TG, 

'".$this->konfigurasi_m->bobot_nilai('bobot_tg')."' as BOBOT_TG



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_TG($kelas, $semester, $tahun, $mapel)."


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_TG



) as HASIL_TG ON HASIL_TG.nilai_nis_tg =  HASIL_MASTER.nilai_nis_master 




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_jumlahUH, siswa_nama as siswa_nama_jumlahUH , kelas_nama as kelas_nama_jumlahUH, mapel_nama as mapel_nama_jumlahUH, nilai_mapel as nilai_mapel_jumlahUH, JUMLAH_NH


FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,


COUNT(nilai_jenis) as JUMLAH_NH


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UAS' AND nilai_jenis != 'UTS' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_jumlahUH



) as HASIL_jumlahUH ON HASIL_jumlahUH.nilai_nis_jumlahUH =  HASIL_MASTER.nilai_nis_master




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_uts, siswa_nama as siswa_nama_uts , kelas_nama as kelas_nama_uts, mapel_nama as mapel_nama_uts, nilai_mapel as nilai_mapel_uts, UTS, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uts')."' as BOBOT_UTS



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

MAX(IF(raport_nilai.nilai_jenis = 'UTS', raport_nilai.nilai_data, NULL)) AS UTS, 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%'  AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UTS



) as HASIL_UTS ON HASIL_UTS.nilai_nis_uts =  HASIL_MASTER.nilai_nis_master 






LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_uas, siswa_nama as siswa_nama_uas , kelas_nama as kelas_nama_uas, mapel_nama as mapel_nama_uas, nilai_mapel as nilai_mapel_uas, UAS, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uas')."' as BOBOT_UAS



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

MAX(IF(raport_nilai.nilai_jenis = 'UAS', raport_nilai.nilai_data, NULL)) AS UAS, 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%'  AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UAS



) as HASIL_UAS ON HASIL_UAS.nilai_nis_uas =  HASIL_MASTER.nilai_nis_master 



LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_ps, siswa_nama as siswa_nama_ps , kelas_nama as kelas_nama_ps, mapel_nama as mapel_nama_ps, nilai_mapel as nilai_mapel_ps, ".$this->TAMPIL_NILAI_PS($kelas, $semester, $tahun, $mapel)."  
cast((( ".$this->JUMLAH_NILAI_PS($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_TP, 

'".$this->konfigurasi_m->bobot_nilai('bobot_ps')."' as BOBOT_TP



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PS($kelas, $semester, $tahun, $mapel)."  


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PS



) as HASIL_PS ON HASIL_PS.nilai_nis_ps =  HASIL_MASTER.nilai_nis_master





LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_pr, siswa_nama as siswa_nama_pr , kelas_nama as kelas_nama_pr, mapel_nama as mapel_nama_pr, nilai_mapel as nilai_mapel_pr, ".$this->TAMPIL_NILAI_PR($kelas, $semester, $tahun, $mapel)."  
cast((( ".$this->JUMLAH_NILAI_PR($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PR, 

'".$this->konfigurasi_m->bobot_nilai('bobot_pr')."' as BOBOT_PR



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PR($kelas, $semester, $tahun, $mapel)." 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PR



) as HASIL_PR ON HASIL_PR.nilai_nis_pr =  HASIL_MASTER.nilai_nis_master




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_po, siswa_nama as siswa_nama_po , kelas_nama as kelas_nama_po, mapel_nama as mapel_nama_po, nilai_mapel as nilai_mapel_po, ".$this->TAMPIL_NILAI_PO($kelas, $semester, $tahun, $mapel)."   
cast((( ".$this->JUMLAH_NILAI_PO($kelas, $semester, $tahun, $mapel)."  )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PO, 

'".$this->konfigurasi_m->bobot_nilai('bobot_po')."' as BOBOT_PO



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PO($kelas, $semester, $tahun, $mapel)."   


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 



LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PO



) as HASIL_PO ON HASIL_PO.nilai_nis_po =  HASIL_MASTER.nilai_nis_master



LEFT JOIN raport_guru ON raport_guru.guru_kode = HASIL_MASTER.nilai_kodeguru_master


LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran = '".$this->db->escape_str($tahun)."' AND haknilai_kelas = '".$this->db->escape_str($kelas)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = HASIL_MASTER.nilai_mapel_master


GROUP BY nilai_nis_master, nilai_mapel_master ORDER BY siswa_absen ASC ) TOTAL_NILAI_SEMUA



 ) NILAI_AKHIR ) NILAI_AKHIR_SEMUA");

      
		$i = 0;
		
		foreach ($this->AMBILSEMUAKOLOM($kelas, $semester, $tahun, $mapel) as $item) // loop column 
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

				if(count($this->AMBILSEMUAKOLOM($kelas, $semester, $tahun, $mapel)) - 1 == $i) //last loop
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

	public function get_datatables_data_berproses($kelas, $tahun, $semester, $mapel)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_data_berproses($kelas, $tahun, $semester, $mapel)
	{
		$this->_get_datatables_query($kelas, $tahun, $semester, $mapel);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_berproses($kelas, $tahun, $semester, $mapel)
	{
		
       
		$this->db->select("*, ROUND(NILAI_RAPOR_PENGETAHUAN, 0) as HASIL_RAPOR_PENGETAHUAN, ROUND(NILAI_RAPOR_KETERAMPILAN, 0) as HASIL_RAPOR_KETERAMPILAN");


        $this->db->from("(




SELECT *,

cast(  ( ( ( IFNULL(TOTAL_NH,0) * IFNULL(BOBOT_NH, 0) ) +  ( IFNULL(UTS, 0) * IFNULL(BOBOT_UTS, 0) ) + ( IFNULL(UAS,0) * IFNULL(BOBOT_UAS, 0) )  ) / (IFNULL(BOBOT_NH, 0) + IFNULL(BOBOT_UTS, 0) + IFNULL(BOBOT_UAS, 0))  ) as decimal(4, 2) ) as NILAI_RAPOR_PENGETAHUAN, 

cast( ( ( ( IFNULL(RATA_TP,0) * IFNULL(BOBOT_TP,0)) + (IFNULL(RATA_PR,0) * IFNULL(BOBOT_PR,0)) + (IFNULL(RATA_PO,0) * IFNULL(BOBOT_PO,0))   ) / (IFNULL(BOBOT_TP,0) + IFNULL(BOBOT_PR,0) + IFNULL(BOBOT_PO,0)) ) as decimal(4,2) ) as NILAI_RAPOR_KETERAMPILAN 


FROM 





(





SELECT nilai_nis_master as SISWA_NIS, siswa_nama as SISWA_NAMA, kelas_nama as SISWA_KELAS, kelas_code as KELAS_CODE, kelas_kk as KELAS_KK, kelas_tahun as KELAS_TAHUN, siswa_absen as ABSEN, mapel_nama as NAMA_MAPEL,guru_nama as GURU,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K,

".$this->TAMPIL_NILAI_UH($kelas, $semester, $tahun, $mapel)." RATA_UH, '".$this->konfigurasi_m->bobot_nilai('bobot_uh')."' as BOBOT_UH,  ".$this->TAMPIL_NILAI_TG($kelas, $semester, $tahun, $mapel)." RATA_TG, '".$this->konfigurasi_m->bobot_nilai('bobot_tg')."' as BOBOT_TG, cast(  ( (( IFNULL(RATA_UH,0) * IFNULL(BOBOT_UH,0)) + (IFNULL(RATA_TG,0) * IFNULL(BOBOT_TG,0))) / (IFNULL(BOBOT_UH,0) + IFNULL(BOBOT_TG,0)) )  as decimal(4, 2)) as TOTAL_NH, '".$this->konfigurasi_m->bobot_nilai('bobot_nh')."' as BOBOT_NH, JUMLAH_NH, UTS, '".$this->konfigurasi_m->bobot_nilai('bobot_uts')."' as BOBOT_UTS, UAS, '".$this->konfigurasi_m->bobot_nilai('bobot_uas')."' as BOBOT_UAS, ".$this->TAMPIL_NILAI_PS($kelas, $semester, $tahun, $mapel)." '".$this->konfigurasi_m->bobot_nilai('bobot_ps')."' as BOBOT_TP, RATA_TP, ".$this->TAMPIL_NILAI_PR($kelas, $semester, $tahun, $mapel)." '".$this->konfigurasi_m->bobot_nilai('bobot_pr')."' as BOBOT_PR, RATA_PR, ".$this->TAMPIL_NILAI_PO($kelas, $semester, $tahun, $mapel)."  '".$this->konfigurasi_m->bobot_nilai('bobot_po')."' as BOBOT_PO, RATA_PO


FROM




(


SELECT nilai_nis as nilai_nis_master, nilai_kodeguru as nilai_kodeguru_master,  siswa_nama , kelas_nama, kelas_kk, kelas_code, kelas_tahun, siswa_absen, mapel_nama, mapel_sort, nilai_mapel as nilai_mapel_master



FROM 

(SELECT nilai_nis, nilai_kodeguru, siswa_nama, kelas_nama, kelas_kk, kelas_code, kelas_tahun, siswa_absen, mapel_nama, nilai_mapel, mapel_sort,



COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  GROUP by nilai_nis, nilai_mapel) as NILAI_MASTER


) HASIL_MASTER




LEFT JOIN



(

SELECT nilai_nis  as nilai_nis_uh, siswa_nama as siswa_nama_uh , kelas_nama as kelas_nama_uh, mapel_nama as mapel_nama_uh, nilai_mapel as nilai_mapel_uh,  ".$this->TAMPIL_NILAI_UH($kelas, $semester, $tahun, $mapel)." 


cast((( ".$this->JUMLAH_NILAI_UH($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_UH, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uh')."' as BOBOT_UH



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_UH($kelas, $semester, $tahun, $mapel)."


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UH



) as HASIL_UH ON HASIL_UH.nilai_nis_uh =  HASIL_MASTER.nilai_nis_master 




LEFT JOIN 



(

SELECT nilai_nis  as nilai_nis_tg, siswa_nama as siswa_nama_tg , kelas_nama as kelas_nama_tg, mapel_nama as mapel_nama_tg, nilai_mapel as nilai_mapel_tg,  ".$this->TAMPIL_NILAI_TG($kelas, $semester, $tahun, $mapel)." 


cast((( ".$this->JUMLAH_NILAI_TG($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_TG, 

'".$this->konfigurasi_m->bobot_nilai('bobot_tg')."' as BOBOT_TG



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_TG($kelas, $semester, $tahun, $mapel)."


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_TG



) as HASIL_TG ON HASIL_TG.nilai_nis_tg =  HASIL_MASTER.nilai_nis_master 




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_jumlahUH, siswa_nama as siswa_nama_jumlahUH , kelas_nama as kelas_nama_jumlahUH, mapel_nama as mapel_nama_jumlahUH, nilai_mapel as nilai_mapel_jumlahUH, JUMLAH_NH


FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,


COUNT(nilai_jenis) as JUMLAH_NH


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UAS' AND nilai_jenis != 'UTS' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_jumlahUH



) as HASIL_jumlahUH ON HASIL_jumlahUH.nilai_nis_jumlahUH =  HASIL_MASTER.nilai_nis_master




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_uts, siswa_nama as siswa_nama_uts , kelas_nama as kelas_nama_uts, mapel_nama as mapel_nama_uts, nilai_mapel as nilai_mapel_uts, UTS, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uts')."' as BOBOT_UTS



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

MAX(IF(raport_nilai.nilai_jenis = 'UTS', raport_nilai.nilai_data, NULL)) AS UTS, 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%'  AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UTS



) as HASIL_UTS ON HASIL_UTS.nilai_nis_uts =  HASIL_MASTER.nilai_nis_master 






LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_uas, siswa_nama as siswa_nama_uas , kelas_nama as kelas_nama_uas, mapel_nama as mapel_nama_uas, nilai_mapel as nilai_mapel_uas, UAS, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uas')."' as BOBOT_UAS



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

MAX(IF(raport_nilai.nilai_jenis = 'UAS', raport_nilai.nilai_data, NULL)) AS UAS, 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%'  AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UAS



) as HASIL_UAS ON HASIL_UAS.nilai_nis_uas =  HASIL_MASTER.nilai_nis_master 



LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_ps, siswa_nama as siswa_nama_ps , kelas_nama as kelas_nama_ps, mapel_nama as mapel_nama_ps, nilai_mapel as nilai_mapel_ps, ".$this->TAMPIL_NILAI_PS($kelas, $semester, $tahun, $mapel)."  
cast((( ".$this->JUMLAH_NILAI_PS($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_TP, 

'".$this->konfigurasi_m->bobot_nilai('bobot_ps')."' as BOBOT_TP



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PS($kelas, $semester, $tahun, $mapel)."  


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PS



) as HASIL_PS ON HASIL_PS.nilai_nis_ps =  HASIL_MASTER.nilai_nis_master





LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_pr, siswa_nama as siswa_nama_pr , kelas_nama as kelas_nama_pr, mapel_nama as mapel_nama_pr, nilai_mapel as nilai_mapel_pr, ".$this->TAMPIL_NILAI_PR($kelas, $semester, $tahun, $mapel)."  
cast((( ".$this->JUMLAH_NILAI_PR($kelas, $semester, $tahun, $mapel)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PR, 

'".$this->konfigurasi_m->bobot_nilai('bobot_pr')."' as BOBOT_PR



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PR($kelas, $semester, $tahun, $mapel)." 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PR



) as HASIL_PR ON HASIL_PR.nilai_nis_pr =  HASIL_MASTER.nilai_nis_master




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_po, siswa_nama as siswa_nama_po , kelas_nama as kelas_nama_po, mapel_nama as mapel_nama_po, nilai_mapel as nilai_mapel_po, ".$this->TAMPIL_NILAI_PO($kelas, $semester, $tahun, $mapel)."   
cast((( ".$this->JUMLAH_NILAI_PO($kelas, $semester, $tahun, $mapel)."  )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PO, 

'".$this->konfigurasi_m->bobot_nilai('bobot_po')."' as BOBOT_PO



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PO($kelas, $semester, $tahun, $mapel)."   


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 



LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PO



) as HASIL_PO ON HASIL_PO.nilai_nis_po =  HASIL_MASTER.nilai_nis_master



LEFT JOIN raport_guru ON raport_guru.guru_kode = HASIL_MASTER.nilai_kodeguru_master


LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran = '".$this->db->escape_str($tahun)."' AND haknilai_kelas = '".$this->db->escape_str($kelas)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = HASIL_MASTER.nilai_mapel_master


GROUP BY nilai_nis_master, nilai_mapel_master ORDER BY siswa_absen ASC ) TOTAL_NILAI_SEMUA



 ) NILAI_AKHIR");

          return $this->db->count_all_results();
	}



	public function AMBILSEMUAKOLOM($kelas, $semester, $tahun, $mapel) {

		return $this->AMBILNILAIPO($kelas, $semester, $tahun, $mapel);
	}

	public function EVALNILAIUH($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=    '$row[] = $rekap->'.$row->nilai_jenis.';';
					}

					return $dataku;

					


			} else {

						return '$row[] = $rekap->UH1;';
			}

	}


	public function EVALNILAITG($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=    '$row[] = $rekap->'.$row->nilai_jenis.';';
					}

					return $dataku;

					


			} else {

						return '$row[] = $rekap->TG1;';
			}

	}

	public function EVALNILAITP($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=    '$row[] = $rekap->'.$row->nilai_jenis.';';
					}

					return $dataku;

					


			} else {

						return '$row[] = $rekap->TP1;';
			}

	}

	public function EVALNILAIPR($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=    '$row[] = $rekap->'.$row->nilai_jenis.';';
					}

					return $dataku;

					


			} else {

						return '$row[] = $rekap->PR1;';
			}

	}

	public function EVALNILAIPO($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'TP%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=    '$row[] = $rekap->'.$row->nilai_jenis.';';
					}

					return $dataku;

					


			} else {


						 
						return '$row[] = $rekap->PO1;';
			}

	}


	private function AMBILNILAIUH($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = array('SISWA_NIS', 'SISWA_NAMA', 'SISWA_KELAS', 'ABSEN', 'NAMA_MAPEL', 'SEMESTER' ,'KKM_P');
			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					$dataku[] = 'RATA_UH';
					$dataku[] = 'BOBOT_UH';


					return $dataku;


			} else {

						$dataku[] = 'UH1';
						$dataku[] = 'RATA_UH';
						$dataku[] = 'BOBOT_UH';

						return $dataku;
			}

			

		}


		private function AMBILNILAITG($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = $this->AMBILNILAIUH($kelas, $semester, $tahun, $mapel);

			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					$dataku[] = 'RATA_TG';
					$dataku[] = 'BOBOT_TG';
					$dataku[] = 'TOTAL_NH';
					$dataku[] = 'BOBOT_NH';
					//$dataku[] = 'JUMLAH_NH';
					return $dataku;
					


			} else {

						$dataku[] = 'TG1';
						$dataku[] = 'RATA_TG';
						$dataku[] = 'BOBOT_TG';
						$dataku[] = 'TOTAL_NH';
						//$dataku[] = 'JUMLAH_NH';

						return $dataku;
			}

			

		}

		private function AMBILNILAIUTS($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = $this->AMBILNILAITG($kelas, $semester, $tahun, $mapel);
			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					//$dataku[] = 'RATA_UTS';
					$dataku[] = 'BOBOT_UTS';


					return $dataku;


			} else {

						$dataku[] = 'UTS';
						//$dataku[] = 'RATA_UTS';
						$dataku[] = 'BOBOT_UTS';

						return $dataku;
			}

			

		}

		private function AMBILNILAIUAS($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = $this->AMBILNILAIUTS($kelas, $semester, $tahun, $mapel);
			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					//$dataku[] = 'RATA_UAS';
					$dataku[] = 'BOBOT_UAS';


					return $dataku;


			} else {

						$dataku[] = 'UAS';
						//$dataku[] = 'RATA_UAS';
						$dataku[] = 'BOBOT_UAS';

						return $dataku;
			}

			

		}


		private function AMBILNILAITP($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = $this->AMBILNILAIUAS($kelas, $semester, $tahun, $mapel);
			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					$dataku[] = 'RATA_TP';
					$dataku[] = 'BOBOT_TP';


					return $dataku;


			} else {

						$dataku[] = 'TP1';
						$dataku[] = 'RATA_TP';
						$dataku[] = 'BOBOT_TP';

						return $dataku;
			}

			

		}

		private function AMBILNILAIPR($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = $this->AMBILNILAITP($kelas, $semester, $tahun, $mapel);
			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					$dataku[] = 'RATA_PR';
					$dataku[] = 'BOBOT_PR';


					return $dataku;


			} else {

						$dataku[] = 'PR1';
						$dataku[] = 'RATA_PR';
						$dataku[] = 'BOBOT_PR';

						return $dataku;
			}

			

		}

		private function AMBILNILAIPO($kelas, $semester, $tahun, $mapel) {


		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%'");

			$dataku = $this->AMBILNILAIPR($kelas, $semester, $tahun, $mapel);
			$angka = 0;
				
			if (count($query->result()) )
			{
			      
					 foreach ( $query->result() as $row => $ofani)
					{

							 $dataku[] .= $ofani->nilai_jenis;

					    
					}
					$dataku[] = 'RATA_PO';
					$dataku[] = 'BOBOT_PO';
					$dataku[] = 'NILAI_RAPOR_PENGETAHUAN';
					$dataku[] = 'NILAI_RAPOR_KETERAMPILAN';
					$dataku[] = 'HASIL_RAPOR_PENGETAHUAN';
					$dataku[] = 'HASIL_RAPOR_KETERAMPILAN';


					return $dataku;


			} else {

					$dataku[] = 'PO1';
					$dataku[] = 'RATA_PO';
					$dataku[] = 'BOBOT_PO';
					$dataku[] = 'NILAI_RAPOR_PENGETAHUAN';
					$dataku[] = 'NILAI_RAPOR_KETERAMPILAN';
					$dataku[] = 'HASIL_RAPOR_PENGETAHUAN';
					$dataku[] = 'HASIL_RAPOR_KETERAMPILAN';

						return $dataku;
			}

			

		}


	public function ambil_tabelUH($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   '<th  width="4%" style="text-align:center;border: 1px solid #DDD">'.$row->nilai_jenis.'</th>';
					}

					return $dataku;

					


			} else {

						return '<th  width="4%" style="text-align:center;border: 1px solid #DDD">UH1</th>';
			}

	}

	public function ambil_tabelTG($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   '<th  width="4%" style="text-align:center;border: 1px solid #DDD">'.$row->nilai_jenis.'</th>';
					}

					return $dataku;

					


			} else {

						return '<th  width="4%" style="text-align:center;border: 1px solid #DDD">TG1</th>';
			}

	}

	public function ambil_tabelTP($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   '<th  width="4%" style="text-align:center;border: 1px solid #DDD">'.$row->nilai_jenis.'</th>';
					}

					return $dataku;

					


			} else {

						return '<th  width="4%" style="text-align:center;border: 1px solid #DDD">TP1</th>';
			}

	}

	public function ambil_tabelPR($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   '<th  width="4%" style="text-align:center;border: 1px solid #DDD">'.$row->nilai_jenis.'</th>';
					}

					return $dataku;

					


			} else {

						return '<th  width="4%" style="text-align:center;border: 1px solid #DDD">PR1</th>';
			}

	}

	public function ambil_tabelPO($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   '<th  width="4%" style="text-align:center;border: 1px solid #DDD">'.$row->nilai_jenis.'</th>';
					}

					return $dataku;

					


			} else {

						return '<th  width="4%" style="text-align:center;border: 1px solid #DDD">PO1</th>';
			}

	}

	public function jumlah_tabelsemua($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'");

			$dataku = '';

			if (count($query->result()) )
			{
			        
					return count($query->result());

					


			} else {

						return 5;
			}

	}

	public function jumlah_tabelUH($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        
					return count($query->result());

					


			} else {

						return 1;
			}

	}

	public function jumlah_tabelTG($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        
					return count($query->result());

					


			} else {

						return 1;
			}

	}

	public function jumlah_tabelTP($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        
					return count($query->result());

					


			} else {

						return 1;
			}

	}

	public function jumlah_tabelPR($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        
					return count($query->result());

					


			} else {

						return 1;
			}

	}

	public function jumlah_tabelPO($kelas, $semester, $tahun, $mapel) {

		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'TP%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        
					return count($query->result());

					


			} else {

						return 1;
			}

	}








	private function PIVOT_NILAI_UH($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   "MAX(IF(raport_nilai.nilai_jenis = '".$row->nilai_jenis."', raport_nilai.nilai_data, NULL)) AS  ".$row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "MAX(IF(raport_nilai.nilai_jenis = 'UH1', raport_nilai.nilai_data, NULL)) AS UH1,";
			}

			
	}


	private function JUMLAH_NILAI_UH($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			$angka = 0;

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
						$angka ++;

							if (count($query->result()) == $angka) {
								$rumus = ' ';
							} else {
								$rumus = '+';
							}

					     
					     $dataku .=   "IFNULL(".$row->nilai_jenis.",0)".$rumus;
					}

					return $dataku;

					


			} else {

						return "0";
			}

			
	}


	private function TAMPIL_NILAI_UH($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			
			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
							
					     
					     $dataku .=   $row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "UH1,";
			}

			
	}



	private function PIVOT_NILAI_TG($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   "MAX(IF(raport_nilai.nilai_jenis = '".$row->nilai_jenis."', raport_nilai.nilai_data, NULL)) AS  ".$row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "MAX(IF(raport_nilai.nilai_jenis = 'TG1', raport_nilai.nilai_data, NULL)) AS TG1,";
			}

			
	}



	private function JUMLAH_NILAI_TG($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			$angka = 0;

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
						$angka ++;

							if (count($query->result()) == $angka) {
								$rumus = ' ';
							} else {
								$rumus = '+';
							}

					     
					     $dataku .=   "IFNULL(".$row->nilai_jenis.",0)".$rumus;
					}

					return $dataku;

					


			} else {

						return "0";
			}

			
	}


	private function TAMPIL_NILAI_TG($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			
			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
							
					     
					     $dataku .=   $row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "TG1,";
			}

			
	}






	private function PIVOT_NILAI_PS($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   "MAX(IF(raport_nilai.nilai_jenis = '".$row->nilai_jenis."', raport_nilai.nilai_data, NULL)) AS  ".$row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "MAX(IF(raport_nilai.nilai_jenis = 'TP1', raport_nilai.nilai_data, NULL)) AS TP1,";
			}

			
	}


	private function JUMLAH_NILAI_PS($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			$angka = 0;

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
						$angka ++;

							if (count($query->result()) == $angka) {
								$rumus = ' ';
							} else {
								$rumus = '+';
							}

					     
					     $dataku .=   "IFNULL(".$row->nilai_jenis.",0)".$rumus;
					}

					return $dataku;

					


			} else {

						return "0";
			}

			
	}

	private function TAMPIL_NILAI_PS($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			
			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
							
					     
					     $dataku .=   $row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "TP1,";
			}

			
	}





	private function PIVOT_NILAI_PR($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   "MAX(IF(raport_nilai.nilai_jenis = '".$row->nilai_jenis."', raport_nilai.nilai_data, NULL)) AS  ".$row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "MAX(IF(raport_nilai.nilai_jenis = 'PR1', raport_nilai.nilai_data, NULL)) AS PR1,";
			}

			
	}


	private function JUMLAH_NILAI_PR($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			$angka = 0;

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
						$angka ++;

							if (count($query->result()) == $angka) {
								$rumus = ' ';
							} else {
								$rumus = '+';
							}

					     
					     $dataku .=   "IFNULL(".$row->nilai_jenis.",0)".$rumus;
					}

					return $dataku;

					


			} else {

						return "0";
			}

			
	}

	private function TAMPIL_NILAI_PR($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			
			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
							
					     
					     $dataku .=   $row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "PR1,";
			}

			
	}



	private function PIVOT_NILAI_PO($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   "MAX(IF(raport_nilai.nilai_jenis = '".$row->nilai_jenis."', raport_nilai.nilai_data, NULL)) AS  ".$row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "MAX(IF(raport_nilai.nilai_jenis = 'PO1', raport_nilai.nilai_data, NULL)) AS PO1,";
			}

			
	}


	private function JUMLAH_NILAI_PO($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%'");

			$dataku = '';
			$angka = 0;

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
						$angka ++;

							if (count($query->result()) == $angka) {
								$rumus = ' ';
							} else {
								$rumus = '+';
							}

					     
					     $dataku .=   "IFNULL(".$row->nilai_jenis.",0)".$rumus;
					}

					return $dataku;

					


			} else {

						return "0";
			}

			
	}

	private function TAMPIL_NILAI_PO($kelas, $semester, $tahun, $mapel) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_mapel = '".$this->db->escape_str($mapel)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'TP%' AND nilai_jenis NOT LIKE 'PR%'");

			$dataku = '';
			
			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
							
					     
					     $dataku .=   $row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "PO1,";
			}

			
	}






}
