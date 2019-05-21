<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport_M extends MY_Model {

	protected $table = 'raport_siswa';
	protected $column = array('siswa_nis','siswa_nama','kelas_nama','siswa_absen','kelas_tahun',);
	protected $order = array('siswa_nis' => 'asc'); // default order 
	protected $primary_id = 'siswa_id';
	protected $_primary_key = 'siswa_id';
	protected $_table_name = 'raport_siswa';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
		$this->load->model('siswa_m');
	}

	 public function _get_datatables_query()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama, kelas_code, kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas, kelas_status, kelas_tingkat');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
      
		$i = 0;
		
		foreach ($this->column as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][5]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][5]['search']['value']);
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
					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][5]['search']['value']);
				
					}

					$this->db->group_end(); //close bracket

			
			} elseif (!empty($_POST['columns'][5]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_tahun', $_POST['columns'][5]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
				
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


	 public function _get_datatables_query_wali()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama, kelas_code, kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas, kelas_status, kelas_tingkat');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->where('siswa_kelas', $this->siswa_m->kodekelaswali());
      
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

	public function get_datatables_wali()
	{
		$this->_get_datatables_query_wali();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_wali()
	{
		$this->_get_datatables_query_wali();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_wali()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama, kelas_code, kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas, kelas_status, kelas_tingkat');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->where('siswa_kelas', $this->siswa_m->kodekelaswali());
		return $this->db->count_all_results();
	}

 



	





}
