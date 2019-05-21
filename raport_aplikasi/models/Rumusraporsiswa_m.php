<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumusraporsiswa_M extends MY_Model {


	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	
	
	public function hitung_nilai_rapor_siswa($kelas, $semester, $tahun, $nis) {

	$query = 	$this->db->query("






SELECT *, ROUND(NILAI_RAPOR_PENGETAHUAN, 0) as HASIL_RAPOR_PENGETAHUAN, ROUND(NILAI_RAPOR_KETERAMPILAN, 0) as HASIL_RAPOR_KETERAMPILAN


FROM (




SELECT *,

cast(  ( ( ( IFNULL(TOTAL_NH,0) * IFNULL(BOBOT_NH, 0) ) +  ( IFNULL(UTS, 0) * IFNULL(BOBOT_UTS, 0) ) + ( IFNULL(UAS,0) * IFNULL(BOBOT_UAS, 0) )  ) / (IFNULL(BOBOT_NH, 0) + IFNULL(BOBOT_UTS, 0) + IFNULL(BOBOT_UAS, 0))  ) as decimal(4, 2) ) as NILAI_RAPOR_PENGETAHUAN, 

cast( ( ( ( IFNULL(RATA_PS,0) * IFNULL(BOBOT_PS,0)) + (IFNULL(RATA_PR,0) * IFNULL(BOBOT_PR,0)) + (IFNULL(RATA_PO,0) * IFNULL(BOBOT_PO,0))   ) / (IFNULL(BOBOT_PS,0) + IFNULL(BOBOT_PR,0) + IFNULL(BOBOT_PO,0)) ) as decimal(4,2) ) as NILAI_RAPOR_KETERAMPILAN 


FROM 





(





SELECT nilai_nis_master as SISWA_NIS, siswa_nama as SISWA_NAMA, kelas_nama as SISWA_KELAS, mapel_nama as NAMA_MAPEL, mapel_sort as MAPEL_SORT, 
kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K,
kompetensi_kelompok as KELOMPOK,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K,

".$this->TAMPIL_NILAI_UH($kelas, $semester, $tahun, $nis)." RATA_UH, BOBOT_UH,  ".$this->TAMPIL_NILAI_TG($kelas, $semester, $tahun, $nis)." RATA_TG, BOBOT_TG, cast(  ( (( IFNULL(RATA_UH,0) * IFNULL(BOBOT_UH,0)) + (IFNULL(RATA_TG,0) * IFNULL(BOBOT_TG,0))) / (IFNULL(BOBOT_UH,0) + IFNULL(BOBOT_TG,0)) )  as decimal(4, 2)) as TOTAL_NH, '".$this->konfigurasi_m->bobot_nilai('bobot_nh')."' as BOBOT_NH, JUMLAH_NH, UTS, BOBOT_UTS, UAS, BOBOT_UAS, ".$this->TAMPIL_NILAI_PS($kelas, $semester, $tahun, $nis)." BOBOT_PS, RATA_PS, ".$this->TAMPIL_NILAI_PR($kelas, $semester, $tahun, $nis)." BOBOT_PR, RATA_PR, ".$this->TAMPIL_NILAI_PO($kelas, $semester, $tahun, $nis)."  BOBOT_PO, RATA_PO


FROM




(


SELECT nilai_nis as nilai_nis_master,  siswa_nama , kelas_nama, mapel_nama, mapel_sort, nilai_mapel as nilai_mapel_master



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel, mapel_sort,



COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  GROUP by nilai_nis, nilai_mapel) as NILAI_MASTER


) HASIL_MASTER




LEFT JOIN



(

SELECT nilai_nis  as nilai_nis_uh, siswa_nama as siswa_nama_uh , kelas_nama as kelas_nama_uh, mapel_nama as mapel_nama_uh, nilai_mapel as nilai_mapel_uh,  ".$this->TAMPIL_NILAI_UH($kelas, $semester, $tahun, $nis)." 


cast((( ".$this->JUMLAH_NILAI_UH($kelas, $semester, $tahun, $nis)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_UH, 

'".$this->konfigurasi_m->bobot_nilai('bobot_uh')."' as BOBOT_UH



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_UH($kelas, $semester, $tahun, $nis)."


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UH



) as HASIL_UH ON HASIL_UH.nilai_mapel_uh =  HASIL_MASTER.nilai_mapel_master 




LEFT JOIN 



(

SELECT nilai_nis  as nilai_nis_tg, siswa_nama as siswa_nama_tg , kelas_nama as kelas_nama_tg, mapel_nama as mapel_nama_tg, nilai_mapel as nilai_mapel_tg,  ".$this->TAMPIL_NILAI_TG($kelas, $semester, $tahun, $nis)." 


cast((( ".$this->JUMLAH_NILAI_TG($kelas, $semester, $tahun, $nis)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_TG, 

'".$this->konfigurasi_m->bobot_nilai('bobot_tg')."' as BOBOT_TG



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_TG($kelas, $semester, $tahun, $nis)."


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_TG



) as HASIL_TG ON HASIL_TG.nilai_mapel_tg =  HASIL_MASTER.nilai_mapel_master 




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

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UAS' AND nilai_jenis != 'UTS' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_jumlahUH



) as HASIL_jumlahUH ON HASIL_jumlahUH.nilai_mapel_jumlahUH =  HASIL_MASTER.nilai_mapel_master




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

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UAS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%'  AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UTS



) as HASIL_UTS ON HASIL_UTS.nilai_mapel_uts =  HASIL_MASTER.nilai_mapel_master 






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

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K'  AND nilai_jenis != 'UTS'  AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%'  AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_UAS



) as HASIL_UAS ON HASIL_UAS.nilai_mapel_uas =  HASIL_MASTER.nilai_mapel_master 



LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_ps, siswa_nama as siswa_nama_ps , kelas_nama as kelas_nama_ps, mapel_nama as mapel_nama_ps, nilai_mapel as nilai_mapel_ps, ".$this->TAMPIL_NILAI_PS($kelas, $semester, $tahun, $nis)."  
cast((( ".$this->JUMLAH_NILAI_PS($kelas, $semester, $tahun, $nis)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PS, 

'".$this->konfigurasi_m->bobot_nilai('bobot_ps')."' as BOBOT_PS



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PS($kelas, $semester, $tahun, $nis)."  


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PS



) as HASIL_PS ON HASIL_PS.nilai_mapel_ps =  HASIL_MASTER.nilai_mapel_master





LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_pr, siswa_nama as siswa_nama_pr , kelas_nama as kelas_nama_pr, mapel_nama as mapel_nama_pr, nilai_mapel as nilai_mapel_pr, ".$this->TAMPIL_NILAI_PR($kelas, $semester, $tahun, $nis)."  
cast((( ".$this->JUMLAH_NILAI_PR($kelas, $semester, $tahun, $nis)." )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PR, 

'".$this->konfigurasi_m->bobot_nilai('bobot_pr')."' as BOBOT_PR



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PR($kelas, $semester, $tahun, $nis)." 


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PO%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PR



) as HASIL_PR ON HASIL_PR.nilai_mapel_pr =  HASIL_MASTER.nilai_mapel_master




LEFT JOIN 




(

SELECT nilai_nis  as nilai_nis_po, siswa_nama as siswa_nama_po , kelas_nama as kelas_nama_po, mapel_nama as mapel_nama_po, nilai_mapel as nilai_mapel_po, ".$this->TAMPIL_NILAI_PO($kelas, $semester, $tahun, $nis)."   
cast((( ".$this->JUMLAH_NILAI_PO($kelas, $semester, $tahun, $nis)."  )/JUMLAH_NILAI) as decimal(4, 2)) as RATA_PO, 

'".$this->konfigurasi_m->bobot_nilai('bobot_po')."' as BOBOT_PO



FROM 

(SELECT nilai_nis, siswa_nama, kelas_nama, mapel_nama, nilai_mapel,

".$this->PIVOT_NILAI_PO($kelas, $semester, $tahun, $nis)."   


COUNT(nilai_jenis) as JUMLAH_NILAI


FROM raport_nilai 

LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 

ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS'  AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' GROUP by nilai_nis, nilai_mapel ) as NILAI_PO



) as HASIL_PO ON HASIL_PO.nilai_mapel_po =  HASIL_MASTER.nilai_mapel_master



LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter = '".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = HASIL_MASTER.nilai_mapel_master

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran = '".$this->db->escape_str($tahun)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = HASIL_MASTER.nilai_mapel_master


GROUP BY nilai_nis_master, nilai_mapel_master ORDER BY mapel_sort ASC ) TOTAL_NILAI_SEMUA



 ) NILAI_AKHIR
");


return $query;

	}



	private function PIVOT_NILAI_UH($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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


	private function JUMLAH_NILAI_UH($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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


	private function TAMPIL_NILAI_UH($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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



	private function PIVOT_NILAI_TG($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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



	private function JUMLAH_NILAI_TG($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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


	private function TAMPIL_NILAI_TG($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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






	private function PIVOT_NILAI_PS($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';

			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
					     
					     $dataku .=   "MAX(IF(raport_nilai.nilai_jenis = '".$row->nilai_jenis."', raport_nilai.nilai_data, NULL)) AS  ".$row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "MAX(IF(raport_nilai.nilai_jenis = 'PS1', raport_nilai.nilai_data, NULL)) AS PS1,";
			}

			
	}


	private function JUMLAH_NILAI_PS($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

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

	private function TAMPIL_NILAI_PS($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PR%' AND nilai_jenis NOT LIKE 'PO%'");

			$dataku = '';
			
			if (count($query->result()) )
			{
			        foreach ($query->result() as $row)
					{
							
					     
					     $dataku .=   $row->nilai_jenis.",";
					}

					return $dataku;

					


			} else {

						return "PS1,";
			}

			
	}





	private function PIVOT_NILAI_PR($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PO%'");

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


	private function JUMLAH_NILAI_PR($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PO%'");

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

	private function TAMPIL_NILAI_PR($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PO%'");

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



	private function PIVOT_NILAI_PO($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%'");

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


	private function JUMLAH_NILAI_PO($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%'");

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

	private function TAMPIL_NILAI_PO($kelas, $semester, $tahun, $nis) {

		
		$query = $this->db->query("SELECT DISTINCT(nilai_jenis) FROM raport_nilai LEFT JOIN (SELECT * FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as raport_siswa2 ON raport_siswa2.siswa_nis = raport_nilai.nilai_nis WHERE siswa_kelas = '".$this->db->escape_str($kelas)."' AND nilai_semester = '".$this->db->escape_str($semester)."' AND nilai_tahun = '".$this->db->escape_str($tahun)."' AND nilai_nis = '".$this->db->escape_str($nis)."' AND nilai_jenis != 'RAPORT_P' AND nilai_jenis != 'RAPORT_K' AND nilai_jenis != 'UTS' AND nilai_jenis != 'UAS' AND nilai_jenis NOT LIKE 'UH%' AND nilai_jenis NOT LIKE 'TG%' AND nilai_jenis NOT LIKE 'PS%' AND nilai_jenis NOT LIKE 'PR%'");

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
