<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_M extends MY_Model {

	protected $table = 'raport_nilai';
	protected $column = array('siswa_nis','siswa_nama','kelas_kk','kelas_nama','siswa_absen','nilai_data','siswa_status','siswa_kelas'); //set column field database for order and search
	protected $order = array('siswa_absen' => 'asc'); // default order 
	protected $primary_id = 'nilai_id';
	protected $_primary_key = 'nilai_id';
	protected $_table_name = 'raport_nilai';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	 public function _ambildatasiswa($kelas,$status)
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk, kelas_tahun, siswa_kelas');
        $this->db->from('raport_siswa');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
        
        //$this->db->where('siswa_status', 1);
      	
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

		if (!empty($_POST['columns'][4]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					
				
					$this->db->group_end(); //close bracket
					
			} else {

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('siswa_kelas', '');
					
				
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


	 public function _ambildatanilaisiswa($mapel,$kelas, $semester, $jenis, $status)
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama, nilai_data, siswa_absen,kelas_tahun,siswa_status,kelas_kk, kelas_tahun, siswa_kelas');
        $this->db->from('raport_siswa');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->join('raport_nilai', 'raport_nilai.nilai_nis = raport_siswa.siswa_nis', 'left');
        $this->db->where('nilai_mapel', $mapel);
        $this->db->where('nilai_kelas', $kelas);
        $this->db->where('nilai_semester', $semester);
         $this->db->where('nilai_jenis', $jenis);

        if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
        
        //$this->db->where('siswa_status', 1);
      	
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

		if (!empty($_POST['columns'][4]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					
				
					$this->db->group_end(); //close bracket
					
			} else {

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('siswa_kelas', '');
					
				
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


	public function get_datatables_datanilaisiswa($mapel, $kelas, $semester, $jenis, $status)
	{
		$this->_ambildatanilaisiswa($mapel, $kelas, $semester, $jenis, $status);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_datanilaisiswa($mapel, $kelas, $semester, $jenis, $status)
	{
		$this->_ambildatanilaisiswa($mapel, $kelas, $semester, $jenis, $status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datanilaisiswa($mapel, $kelas, $semester, $jenis, $status)
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama, nilai_data, siswa_absen,kelas_tahun,siswa_status,kelas_kk, kelas_tahun, siswa_kelas');
        $this->db->from('raport_siswa');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->join('raport_nilai', 'raport_nilai.nilai_nis = raport_siswa.siswa_nis', 'left');
        $this->db->where('nilai_mapel', $mapel);
        $this->db->where('nilai_kelas', $kelas);
        $this->db->where('nilai_semester', $semester);
         $this->db->where('nilai_jenis', $jenis);

        if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
		return $this->db->count_all_results();
	}



	public function get_datatables_datasiswa($kelas,$status)
	{
		$this->_ambildatasiswa($kelas,$status);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_datasiswa($kelas,$status)
	{
		$this->_ambildatasiswa($kelas,$status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datasiswa($kelas,$status)
	{
		$this->db->from('raport_siswa');
		$this->db->where('siswa_kelas =', $kelas);
		  if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
		return $this->db->count_all_results();
	}


	



	 public function get_data_mapel() {
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_mapel');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_mapel2($tahun) {
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_mapel WHERE mapel_tahunajaran="'.$this->db->escape_str($tahun).'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_mapel2_global() {
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_mapel');
        
        if ($query->num_rows() > 0) return $query->result();              
    }


    public function get_data_mapel2_rekap($tahun, $kelas) {
        $query = $this->db->query('SELECT haknilai_mapel, mapel_nama FROM raport_haknilai LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_haknilai.haknilai_mapel WHERE haknilai_tahunajaran = "'.$tahun.'" AND haknilai_kelas = "'.$kelas.'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_mapel_guru_2($tahun, $kelas) {
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_haknilai LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_haknilai.haknilai_mapel WHERE haknilai_tahunajaran="'.$this->db->escape_str($tahun).'" AND haknilai_kelas="'.$this->db->escape_str($kelas).'" AND haknilai_kodeguru="'.$this->session->userdata('user_login').'" AND haknilai_status="1" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }


     public function get_data_mapel3($kelas, $tahun) {
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_haknilai LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_tahunajaran="'.$this->db->escape_str($tahun).'" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_nilai($kelas, $mapel, $semester, $jenis) {
        $query = $this->db->query('SELECT DISTINCT(nilai_jenis) FROM raport_nilai WHERE nilai_kelas="'.$this->db->escape_str($kelas).'" AND nilai_mapel="'.$this->db->escape_str($mapel).'" AND nilai_semester="'.$this->db->escape_str($semester).'" AND nilai_jenis LIKE "'.$jenis.'%" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    private function status_kelas($status)
    {

        $query = $this->db->query('SELECT DISTINCT(kelas_status) FROM `raport_kelas` WHERE kelas_tahun="'.$this->db->escape_str($status).'"');
      if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_status;
         	return $row->kelas_status;  
        } else {
        	return FALSE;
        }
         
    }

    public function hapus_nilai($kelas, $mapel, $semester, $jenis)
	{
		
		$this->db->where('nilai_kelas', $kelas);
		$this->db->where('nilai_mapel', $mapel);
		$this->db->where('nilai_semester', $semester);
		$this->db->where('nilai_jenis', $jenis);
		$this->db->delete($this->table);
	}
        



	





}
