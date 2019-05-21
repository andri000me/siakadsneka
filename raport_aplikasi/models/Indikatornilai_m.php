<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikatornilai_M extends MY_Model {

	protected $table = 'raport_haknilai';
	protected $column = array( 'mapel_nama', 'kelas_nama', 'haknilai_semester', 'haknilai_kkm', 'UH', 'TG', 'UTS', 'UAS', 'PS', 'PR', 'PO','PENGETAHUAN', 'KETERAMPILAN', 'SIKAP','haknilai_kkm2', 'guru_nama'); //set column field database for order and search
	protected $order = array('haknilai_id' => 'desc'); // default order 
	protected $primary_id = 'haknilai_id';
	protected $_primary_key = 'haknilai_id';
	protected $_table_name = 'raport_haknilai';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query($kelas, $semester,$tahunajaran)
	{
		$this->db->select('haknilai_id, mapel_nama, guru_nama, kelas_nama, kelas_tahun, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(
SELECT haknilai_id, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_haknilai

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uh
) as data_UH ON data_UH.nilai_mapel_uh = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_tg
) as data_TG ON data_TG.nilai_mapel_tg = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uts
) as data_uts ON data_uts.nilai_mapel_uts = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uas
) as data_uas ON data_uas.nilai_mapel_uas = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ps, nilai_kelas nilai_kelas_ps, nilai_semester as nilai_semester_ps, count(distinct nilai_jenis) as PS FROM raport_nilai WHERE nilai_jenis LIKE "PS%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_ps
) as data_ps ON data_ps.nilai_mapel_ps = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pr
) as data_pr ON data_pr.nilai_mapel_pr = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_po
) as data_po ON data_po.nilai_mapel_po = raport_haknilai.haknilai_mapel


LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pengetahuan
) as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_keterampilan
) as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_sikap
) as data_sikap ON data_sikap.nilai_mapel_sikap = raport_haknilai.haknilai_mapel 

WHERE haknilai_kelas = "'.$this->db->escape_str($kelas).'" and haknilai_tahunajaran = "'.$this->db->escape_str($tahunajaran).'") as  data_master ');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = data_master.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_master.haknilai_kelas', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_master.haknilai_kodeguru', 'left');
        
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


	 public function _get_datatables_query_guru($kelas, $semester,$tahunajaran)
	{
		$this->db->select('haknilai_id, mapel_nama, guru_nama, kelas_nama, kelas_tahun, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(
SELECT haknilai_id, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_haknilai

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uh
) as data_UH ON data_UH.nilai_mapel_uh = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_tg
) as data_TG ON data_TG.nilai_mapel_tg = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uts
) as data_uts ON data_uts.nilai_mapel_uts = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uas
) as data_uas ON data_uas.nilai_mapel_uas = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ps, nilai_kelas nilai_kelas_ps, nilai_semester as nilai_semester_ps, count(distinct nilai_jenis) as PS FROM raport_nilai WHERE nilai_jenis LIKE "PS%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_ps
) as data_ps ON data_ps.nilai_mapel_ps = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pr
) as data_pr ON data_pr.nilai_mapel_pr = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_po
) as data_po ON data_po.nilai_mapel_po = raport_haknilai.haknilai_mapel


LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pengetahuan
) as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_keterampilan
) as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_sikap
) as data_sikap ON data_sikap.nilai_mapel_sikap = raport_haknilai.haknilai_mapel 

WHERE haknilai_kelas = "'.$this->db->escape_str($kelas).'" and haknilai_tahunajaran = "'.$this->db->escape_str($tahunajaran).'" AND haknilai_kodeguru="'.$this->session->userdata('user_login').'") as  data_master ');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = data_master.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_master.haknilai_kelas', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_master.haknilai_kodeguru', 'left');
        
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




     public function _get_datatables_query_siswa($kelas, $semester,$tahunajaran)
    {
        $this->db->select('haknilai_id, mapel_nama, guru_nama, kelas_nama, kelas_tahun, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO,  PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(
SELECT haknilai_id, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_haknilai

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uh
) as data_UH ON data_UH.nilai_mapel_uh = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_tg
) as data_TG ON data_TG.nilai_mapel_tg = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uts
) as data_uts ON data_uts.nilai_mapel_uts = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uas
) as data_uas ON data_uas.nilai_mapel_uas = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ps, nilai_kelas nilai_kelas_ps, nilai_semester as nilai_semester_ps, count(distinct nilai_jenis) as PS FROM raport_nilai WHERE nilai_jenis LIKE "PS%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_ps
) as data_ps ON data_ps.nilai_mapel_ps = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pr
) as data_pr ON data_pr.nilai_mapel_pr = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_po
) as data_po ON data_po.nilai_mapel_po = raport_haknilai.haknilai_mapel


LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pengetahuan
) as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_keterampilan
) as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_sikap
) as data_sikap ON data_sikap.nilai_mapel_sikap = raport_haknilai.haknilai_mapel 

WHERE haknilai_kelas = "'.$this->db->escape_str($kelas).'" and haknilai_tahunajaran = "'.$this->db->escape_str($tahunajaran).'") as  data_master ');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = data_master.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_master.haknilai_kelas', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_master.haknilai_kodeguru', 'left');
        
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




	public function get_datatables_data_nilai($kelas,$semester, $tahunajaran)
	{
		$this->_get_datatables_query($kelas,$semester, $tahunajaran);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_data_nilai($kelas,$semester, $tahunajaran)
	{
		$this->_get_datatables_query($kelas,$semester, $tahunajaran );
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_nilai($kelas,$semester, $tahunajaran)
	{
		$this->db->select('haknilai_id, mapel_nama, guru_nama, kelas_nama, kelas_tahun, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(
SELECT haknilai_id, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_haknilai

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uh
) as data_UH ON data_UH.nilai_mapel_uh = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_tg
) as data_TG ON data_TG.nilai_mapel_tg = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uts
) as data_uts ON data_uts.nilai_mapel_uts = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uas
) as data_uas ON data_uas.nilai_mapel_uas = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ps, nilai_kelas nilai_kelas_ps, nilai_semester as nilai_semester_ps, count(distinct nilai_jenis) as PS FROM raport_nilai WHERE nilai_jenis LIKE "PS%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_ps
) as data_ps ON data_ps.nilai_mapel_ps = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pr
) as data_pr ON data_pr.nilai_mapel_pr = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_po
) as data_po ON data_po.nilai_mapel_po = raport_haknilai.haknilai_mapel


LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pengetahuan
) as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_keterampilan
) as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_sikap
) as data_sikap ON data_sikap.nilai_mapel_sikap = raport_haknilai.haknilai_mapel 

WHERE haknilai_kelas = "'.$this->db->escape_str($kelas).'" and haknilai_tahunajaran = "'.$this->db->escape_str($tahunajaran).'") as  data_master ');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = data_master.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_master.haknilai_kelas', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_master.haknilai_kodeguru', 'left');
       
		return $this->db->count_all_results();
	}










public function get_datatables_data_nilai_guru($kelas,$semester, $tahunajaran)
	{
		$this->_get_datatables_query_guru($kelas,$semester, $tahunajaran);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_data_nilai_guru($kelas,$semester, $tahunajaran)
	{
		$this->_get_datatables_query_guru($kelas,$semester, $tahunajaran );
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_data_nilai_guru($kelas,$semester, $tahunajaran)
	{
		$this->db->select('haknilai_id, mapel_nama, guru_nama, kelas_nama, kelas_tahun, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(
SELECT haknilai_id, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_haknilai

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uh
) as data_UH ON data_UH.nilai_mapel_uh = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_tg
) as data_TG ON data_TG.nilai_mapel_tg = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uts
) as data_uts ON data_uts.nilai_mapel_uts = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uas
) as data_uas ON data_uas.nilai_mapel_uas = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ps, nilai_kelas nilai_kelas_ps, nilai_semester as nilai_semester_ps, count(distinct nilai_jenis) as PS FROM raport_nilai WHERE nilai_jenis LIKE "PS%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_ps
) as data_ps ON data_ps.nilai_mapel_ps = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pr
) as data_pr ON data_pr.nilai_mapel_pr = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_po
) as data_po ON data_po.nilai_mapel_po = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pengetahuan
) as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_keterampilan
) as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_sikap
) as data_sikap ON data_sikap.nilai_mapel_sikap = raport_haknilai.haknilai_mapel 

WHERE haknilai_kelas = "'.$this->db->escape_str($kelas).'" and haknilai_tahunajaran = "'.$this->db->escape_str($tahunajaran).'" AND haknilai_kodeguru="'.$this->session->userdata('user_login').'") as  data_master ');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = data_master.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_master.haknilai_kelas', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_master.haknilai_kodeguru', 'left');
       
		return $this->db->count_all_results();
	}

 






public function get_datatables_data_nilai_siswa($kelas,$semester, $tahunajaran)
    {
        $this->_get_datatables_query_siswa($kelas,$semester, $tahunajaran);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_nilai_siswa($kelas,$semester, $tahunajaran)
    {
        $this->_get_datatables_query_siswa($kelas,$semester, $tahunajaran );
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_nilai_siswa($kelas,$semester, $tahunajaran)
    {
        $this->db->select('haknilai_id, mapel_nama, guru_nama, kelas_nama, kelas_tahun, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP');
        $this->db->from('(
SELECT haknilai_id, haknilai_kodeguru, haknilai_kkm, haknilai_kkm2, haknilai_mapel, haknilai_kelas, "'.$this->db->escape_str($semester).'" as haknilai_semester, UH, TG, UTS, UAS, PS, PR, PO, PENGETAHUAN, KETERAMPILAN, SIKAP FROM raport_haknilai

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uh, nilai_kelas nilai_kelas_uh, nilai_semester as nilai_semester_uh, count(distinct nilai_jenis) as UH FROM raport_nilai WHERE nilai_jenis LIKE "UH%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uh
) as data_UH ON data_UH.nilai_mapel_uh = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_tg, nilai_kelas nilai_kelas_tg, nilai_semester as nilai_semester_tg, count(distinct nilai_jenis) as TG FROM raport_nilai WHERE nilai_jenis LIKE "TG%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_tg
) as data_TG ON data_TG.nilai_mapel_tg = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uts, nilai_kelas nilai_kelas_uts, nilai_semester as nilai_semester_uts, count(distinct nilai_jenis) as UTS FROM raport_nilai WHERE nilai_jenis LIKE "UTS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uts
) as data_uts ON data_uts.nilai_mapel_uts = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_uas, nilai_kelas nilai_kelas_uas, nilai_semester as nilai_semester_uas, count(distinct nilai_jenis) as UAS FROM raport_nilai WHERE nilai_jenis LIKE "UAS" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_uas
) as data_uas ON data_uas.nilai_mapel_uas = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_ps, nilai_kelas nilai_kelas_ps, nilai_semester as nilai_semester_ps, count(distinct nilai_jenis) as PS FROM raport_nilai WHERE nilai_jenis LIKE "PS%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_ps
) as data_ps ON data_ps.nilai_mapel_ps = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pr, nilai_kelas nilai_kelas_pr, nilai_semester as nilai_semester_pr, count(distinct nilai_jenis) as PR FROM raport_nilai WHERE nilai_jenis LIKE "PR%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pr
) as data_pr ON data_pr.nilai_mapel_pr = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_po, nilai_kelas nilai_kelas_po, nilai_semester as nilai_semester_po, count(distinct nilai_jenis) as PO FROM raport_nilai WHERE nilai_jenis LIKE "PO%" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_po
) as data_po ON data_po.nilai_mapel_po = raport_haknilai.haknilai_mapel


LEFT JOIN (SELECT nilai_mapel as nilai_mapel_pengetahuan, nilai_kelas nilai_kelas_pengetahuan, nilai_semester as nilai_semester_pengetahuan, count(distinct nilai_jenis) as PENGETAHUAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_P" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_pengetahuan
) as data_pengetahuan ON data_pengetahuan.nilai_mapel_pengetahuan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_keterampilan, nilai_kelas nilai_kelas_keterampilan, nilai_semester as nilai_semester_keterampilan, count(distinct nilai_jenis) as KETERAMPILAN FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_K" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_keterampilan
) as data_keterampilan ON data_keterampilan.nilai_mapel_keterampilan = raport_haknilai.haknilai_mapel

LEFT JOIN (SELECT nilai_mapel as nilai_mapel_sikap, nilai_kelas nilai_kelas_sikap, nilai_semester as nilai_semester_sikap, count(distinct nilai_jenis) as SIKAP FROM raport_nilai WHERE nilai_jenis LIKE "RAPORT_S" AND nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_semester="'.$this->db->escape_str($semester).'" group by nilai_mapel_sikap
) as data_sikap ON data_sikap.nilai_mapel_sikap = raport_haknilai.haknilai_mapel 

WHERE haknilai_kelas = "'.$this->db->escape_str($kelas).'" and haknilai_tahunajaran = "'.$this->db->escape_str($tahunajaran).'") as  data_master ');


        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = data_master.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code=data_master.haknilai_kelas', 'left');
        $this->db->join('raport_guru', 'raport_guru.guru_kode=data_master.haknilai_kodeguru', 'left');
       
        return $this->db->count_all_results();
    }

 


    public function datakelas() {


        $query = $this->db->query('SELECT siswa_kelas FROM raport_siswa WHERE siswa_nis="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_kelas;
           
        }

        return $row->siswa_kelas;

    }

      public function datakelaswali() {


        $query = $this->db->query('SELECT wali_kelas FROM raport_wali WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->wali_kelas;
           return $row->wali_kelas;
        } else {

        	return ' ';
        }

        

    }

    public function tahunkelas() {


        $query = $this->db->query('SELECT kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_nis="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tahun;
           
        }

        return $row->kelas_tahun;

    }

    public function tahunkelaswali() {


        $query = $this->db->query('SELECT kelas_tahun FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tahun;
           return $row->kelas_tahun;
        } else {
        	return '';
        }

        

    }

    public function statuskelas() {


        $query = $this->db->query('SELECT kelas_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_nis="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_status;
           
        }

        return $row->kelas_status;

    }

    public function tingkatkelas() {


        $query = $this->db->query('SELECT kelas_tingkat FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_nis="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tingkat;
           
        }

        return $row->kelas_tingkat;

    }


}
