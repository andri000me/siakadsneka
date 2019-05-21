<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikatornilai_M extends MY_Model {

	protected $table = 'raport_nilai';
	protected $column = array( 'mapel_nama', 'kelas_nama', 'nilai_semester', 'haknilai_kkm', 'UH', 'TG', 'UTS', 'UAS', 'TP', 'PR', 'PO', 'OB', 'PD', 'JT', 'JR', 'PENGETAHUAN', 'KETERAMPILAN', 'SIKAP','haknilai_kkm2'); //set column field database for order and search
	protected $order = array('nilai_id' => 'desc'); // default order 
	protected $primary_id = 'nilai_id';
	protected $_primary_key = 'nilai_id';
	protected $_table_name = 'raport_nilai';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query($kelas, $semester)
	{
		$this->db->select('nilai_id, mapel_nama, guru_nama, kelas_nama, nilai_semester, haknilai_kkm, haknilai_kkm2, UH, TG, UTS, UAS, TP, PR, PO, OB, PD, JT, JR, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(SELECT nilai_id, nilai_kodeguru, nilai_mapel, nilai_kelas , nilai_semester ,  UH, TG, UTS, UAS, TP, PR, PO, OB, PD, JT, JR, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_nilai LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_UH ON data_UH.nilai_mapel_uh = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas as nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" ) as data_TG ON data_TG.nilai_mapel_tg = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_UTS ON data_UTS.nilai_mapel_uts = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_uas ON data_uas.nilai_mapel_uas = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tp, nilai_kelas nilai_kelas_tp, nilai_semester as nilai_semester_tp, count(distinct nilai_jenis) as TP FROM raport_nilai WHERE nilai_jenis LIKE "TP%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_tp ON data_tp.nilai_mapel_tp = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_pr ON data_pr.nilai_mapel_pr = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_po ON data_po.nilai_mapel_po = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ob, nilai_kelas nilai_kelas_ob, nilai_semester as nilai_semester_ob, count(distinct nilai_jenis) as OB FROM raport_nilai WHERE nilai_jenis LIKE "OB%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_ob ON data_ob.nilai_mapel_ob = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pd, nilai_kelas nilai_kelas_pd, nilai_semester as nilai_semester_pd, count(distinct nilai_jenis) as PD FROM raport_nilai WHERE nilai_jenis LIKE "PD%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_pd ON data_pd.nilai_mapel_pd = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_jt, nilai_kelas nilai_kelas_jt, nilai_semester as nilai_semester_jt, count(distinct nilai_jenis) as JT FROM raport_nilai WHERE nilai_jenis LIKE "JT%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_jt ON data_jt.nilai_mapel_jt = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_jr, nilai_kelas nilai_kelas_jr, nilai_semester as nilai_semester_jr, count(distinct nilai_jenis) as JR FROM raport_nilai WHERE nilai_jenis LIKE "JR%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_jr ON data_jr.nilai_mapel_jr = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_sikap ON data_sikap.nilai_mapel_sikap = raport_nilai.nilai_mapel WHERE nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" ) as data_nilai_master');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id=data_nilai_master.nilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_nilai_master.nilai_kelas', 'left');
        $this->db->join('raport_haknilai', 'raport_haknilai.haknilai_mapel=data_nilai_master.nilai_mapel', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_nilai_master.nilai_kodeguru', 'left');
        $this->db->group_by('nilai_mapel');
		$i = 0;
		
		foreach ($this->column as $item) // loop column 
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



	public function get_datatables_data_nilai($kelas,$semester )
	{
		$this->_get_datatables_query($kelas,$semester );
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_data_nilai($kelas,$semester)
	{
		$this->_get_datatables_query($kelas,$semester );
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_nilai($kelas,$semester)
	{
		$this->db->select('nilai_id, mapel_nama, guru_nama, kelas_nama, nilai_semester, haknilai_kkm, haknilai_kkm2, UH, TG, UTS, UAS, TP, PR, PO, OB, PD, JT, JR, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(SELECT nilai_id, nilai_kodeguru, nilai_mapel, nilai_kelas , nilai_semester ,  UH, TG, UTS, UAS, TP, PR, PO, OB, PD, JT, JR, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_nilai LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_UH ON data_UH.nilai_mapel_uh = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas as nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" ) as data_TG ON data_TG.nilai_mapel_tg = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_UTS ON data_UTS.nilai_mapel_uts = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_uas ON data_uas.nilai_mapel_uas = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tp, nilai_kelas nilai_kelas_tp, nilai_semester as nilai_semester_tp, count(distinct nilai_jenis) as TP FROM raport_nilai WHERE nilai_jenis LIKE "TP%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_tp ON data_tp.nilai_mapel_tp = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_pr ON data_pr.nilai_mapel_pr = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_po ON data_po.nilai_mapel_po = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ob, nilai_kelas nilai_kelas_ob, nilai_semester as nilai_semester_ob, count(distinct nilai_jenis) as OB FROM raport_nilai WHERE nilai_jenis LIKE "OB%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_ob ON data_ob.nilai_mapel_ob = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pd, nilai_kelas nilai_kelas_pd, nilai_semester as nilai_semester_pd, count(distinct nilai_jenis) as PD FROM raport_nilai WHERE nilai_jenis LIKE "PD%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_pd ON data_pd.nilai_mapel_pd = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_jt, nilai_kelas nilai_kelas_jt, nilai_semester as nilai_semester_jt, count(distinct nilai_jenis) as JT FROM raport_nilai WHERE nilai_jenis LIKE "JT%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_jt ON data_jt.nilai_mapel_jt = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_jr, nilai_kelas nilai_kelas_jr, nilai_semester as nilai_semester_jr, count(distinct nilai_jenis) as JR FROM raport_nilai WHERE nilai_jenis LIKE "JR%" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_jr ON data_jr.nilai_mapel_jr = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_nilai.nilai_mapel LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'") as data_sikap ON data_sikap.nilai_mapel_sikap = raport_nilai.nilai_mapel WHERE nilai_kelas="'.$kelas.'" AND nilai_semester="'.$semester.'" ) as data_nilai_master');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id=data_nilai_master.nilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_nilai_master.nilai_kelas', 'left');
        $this->db->join('raport_haknilai', 'raport_haknilai.haknilai_mapel=data_nilai_master.nilai_mapel', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_nilai_master.nilai_kodeguru', 'left');
        $this->db->group_by('nilai_mapel');
       
		return $this->db->count_all_results();
	}

 



	





}
