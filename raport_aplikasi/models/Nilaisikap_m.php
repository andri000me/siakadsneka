<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilaisikap_M extends MY_Model {

	protected $table = 'raport_nilaisikap';
	protected $column = array('siswa_nis','siswa_nama','kelas_kk','kelas_nama','siswa_absen', 'nilaisikap_data', 'kelas_tahun','siswa_status','siswa_kelas'); //set column field database for order and search
	protected $column_nonwajib = array('siswa_nis','siswa_nama','kelas_kk','kelas_nama','nilaisikap_data', 'kelas_tahun','siswa_status','siswa_kelas');
	protected $order = array('siswa_absen' => 'asc'); // default order 
	protected $order_nonwajib = array('pesertaeskul_id' => 'asc'); // default order 
	protected $primary_id = 'nilaisikap_id';
	protected $_primary_key = 'nilaisikap_id';
	protected $_table_name = 'raport_nilaisikap';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	 public function _ambildatasiswa($kelas,$status)
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
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


	 public function _ambildatanilaisiswa($kelas, $semester, $status)
	{
		 $this->db->select('nilaisikap_id,siswa_nis,siswa_nama,kelas_nama, nilaisikap_data, nilaisikap_deskripsi, siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
        $this->db->from('raport_nilaisikap');
        $this->db->join('(SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis', 'left');
        $this->db->where('siswa_kelas', $kelas);
        //$this->db->where('nilaisikap_datanilai', $eskul);
        $this->db->where('nilaisikap_semester', $semester);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
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


	 public function _ambildatasiswa_nonwajib( $semester, $status)
	{
		$this->db->select('pesertaeskul_id,pesertaeskul_nis,siswa_nama,siswa_kelas,kelas_nama,kelas_kk,kelas_tahun');
		$this->db->from('raport_pesertaeskul');
		 $this->db->join('(SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_pesertaeskul.pesertaeskul_nis', 'left');
		$this->db->where('pesertaeskul_status', 1);
        //$this->db->where('pesertaeskul_dataeskul', $eskul);
        $this->db->where('pesertaeskul_tahunajaran', $semester);
        //$this->db->where('kelas_tahun', $tahun);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
        if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
        
        //$this->db->where('siswa_status', 1);
      	
		$i = 0;
		
		foreach ($this->column_nonwajib as $item) // loop column 
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

				if(count($this->column_nonwajib) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column_nonwajib[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][4]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('kelas_tahun', $_POST['columns'][4]['search']['value']);
					
				
					$this->db->group_end(); //close bracket
					
			} else {

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('kelas_tahun', '');
					
				
					$this->db->group_end(); //close bracket
			} 

		

		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_nonwajib[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			

		} 
		else if(isset($this->order_nonwajib))
		{
			$order = $this->order_nonwajib;
			$this->db->order_by(key($order), $order[key($order)]);
		}

	}

	public function _ambildatasiswa_nonwajib_edit($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester, $status)
	{
		$this->db->select('nilaisikap_id,siswa_nis,siswa_nama,kelas_nama, nilaisikap_data, nilaisikap_deskripsi, siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
        $this->db->from('raport_nilaisikap');
        $this->db->join('(SELECT pesertaeskul_id,pesertaeskul_tahunajaran,pesertaeskul_dataeskul,pesertaeskul_status, siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_pesertaeskul LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFt JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas) as data_siswa2 ON data_siswa2.siswa_nis = raport_pesertaeskul.pesertaeskul_nis ) as data_siswa', 'data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis', 'left');
        $this->db->join('raport_eskul', 'raport_eskul.eskul_id = raport_nilaisikap.nilaisikap_datanilai', 'left');
        $this->db->where('eskul_kategori', 2);
        $this->db->where('pesertaeskul_status', 1);
        $this->db->where('pesertaeskul_tahunajaran', $pesertatahunajaran);
        $this->db->where('pesertaeskul_dataeskul', $pesertadataeskul);
        $this->db->where('nilaisikap_tahunajaran', $nilaitahunajaran);
        $this->db->where('nilaisikap_datanilai', $nilaidataeskul);
        $this->db->where('nilaisikap_semester', $nilaisemester);
        //$this->db->where('kelas_tahun', $tahun);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
        if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
        
        //$this->db->where('siswa_status', 1);
      	
		$i = 0;
		
		foreach ($this->column_nonwajib as $item) // loop column 
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

				if(count($this->column_nonwajib) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column_nonwajib[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][4]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('kelas_tahun', $_POST['columns'][4]['search']['value']);
					
				
					$this->db->group_end(); //close bracket
					
			} else {

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 

					$this->db->where('kelas_tahun', '');
					
				
					$this->db->group_end(); //close bracket
			} 

		

		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_nonwajib[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			

		} 
		else if(isset($this->order_nonwajib))
		{
			$order = $this->order_nonwajib;
			$this->db->order_by(key($order), $order[key($order)]);
		}

	}


	public function get_datatables_datanilaisiswa($kelas,  $semester, $status)
	{
		$this->_ambildatanilaisiswa($kelas, $semester, $status);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_datanilaisiswa($kelas, $semester, $status)
	{
		$this->_ambildatanilaisiswa($kelas,  $semester, $status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datanilaisiswa($kelas, $semester, $status)
	{
		 $this->db->select('nilaisikap_id,siswa_nis,siswa_nama,kelas_nama, nilaisikap_data, nilaisikap_deskripsi, siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
        $this->db->from('raport_nilaisikap');
        $this->db->join('(SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis', 'left');
        $this->db->where('siswa_kelas', $kelas);
       // $this->db->where('nilaisikap_datanilai', $eskul);
        $this->db->where('nilaisikap_semester', $semester);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
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




	public function get_datatables_datasiswa_nonwajib($eskul, $semester, $status)
	{
		$this->_ambildatasiswa_nonwajib($eskul, $semester, $status);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_datasiswa_nonwajib($eskul, $semester, $status)
	{
		$this->_ambildatasiswa_nonwajib($eskul, $semester, $status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datasiswa_nonwajib($eskul, $semester, $tahun, $status)
	{
		$this->db->select('pesertaeskul_id,pesertaeskul_nis,siswa_nama,siswa_kelas,kelas_nama,kelas_kk,kelas_tahun');
		$this->db->from('raport_pesertaeskul');
		 $this->db->join('(SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_pesertaeskul.pesertaeskul_nis', 'left');
		$this->db->where('pesertaeskul_status', 1);
        $this->db->where('pesertaeskul_dataeskul', $eskul);
        $this->db->where('pesertaeskul_tahunajaran', $semester);
        $this->db->where('kelas_tahun', $tahun);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
        if ($this->status_kelas($status) == 'aktif') {
        	 $this->db->where('siswa_status', 1);
        } else {
        	 $this->db->where('siswa_status', 2);
        }
        //$this->db->where('kelas_tahun', $tahun);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
		return $this->db->count_all_results();
	}



	public function get_datatables_datasiswa_nonwajib_edit($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester, $status)
	{
		$this->_ambildatasiswa_nonwajib_edit($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester, $status);
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_datasiswa_nonwajib_edit($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester, $status)
	{
		$this->_ambildatasiswa_nonwajib_edit($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester, $status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_datasiswa_nonwajib_edit($pesertatahunajaran, $pesertadataeskul, $nilaitahunajaran, $nilaidataeskul, $nilaisemester, $status)
	{
		$this->db->select('nilaisikap_id,siswa_nis,siswa_nama,kelas_nama, nilaisikap_data, nilaisikap_deskripsi, siswa_absen,kelas_tahun,siswa_status,kelas_kk, siswa_kelas');
        $this->db->from('raport_nilaisikap');
        $this->db->join('(SELECT pesertaeskul_id,pesertaeskul_tahunajaran,pesertaeskul_dataeskul,pesertaeskul_status, siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_pesertaeskul LEFT JOIN (SELECT siswa_nis,siswa_nama, siswa_absen, kelas_nama, kelas_tahun, kelas_kk, siswa_kelas, siswa_status FROM raport_siswa LEFt JOIN raport_kelas ON raport_kelas.kelas_code=raport_siswa.siswa_kelas) as data_siswa2 ON data_siswa2.siswa_nis = raport_pesertaeskul.pesertaeskul_nis ) as data_siswa', 'data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis', 'left');
        $this->db->join('raport_eskul', 'raport_eskul.eskul_id = raport_nilaisikap.nilaisikap_datanilai', 'left');
        $this->db->where('eskul_kategori', 2);
        $this->db->where('pesertaeskul_status', 1);
        $this->db->where('pesertaeskul_tahunajaran', $pesertatahunajaran);
        $this->db->where('pesertaeskul_dataeskul', $pesertadataeskul);
        $this->db->where('nilaisikap_tahunajaran', $nilaitahunajaran);
        $this->db->where('nilaisikap_datanilai', $nilaidataeskul);
        $this->db->where('nilaisikap_semester', $nilaisemester);
        //$this->db->where('kelas_tahun', $tahun);
        //$this->db->where('nilaisikap_tahunajaran', $tahun);
       
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

     public function get_data_eskul2($tahun) {
        $query = $this->db->query('SELECT eskul_id, eskul_nama FROM raport_eskul WHERE eskul_kategori=1 AND eskul_status=1 AND eskul_tahunajaran ="'.$this->db->escape_str($tahun).'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_eskul2_nonwajib($tahun) {
        $query = $this->db->query('SELECT eskul_id, eskul_nama FROM raport_eskul WHERE eskul_kategori=2 AND eskul_status=1 AND eskul_tahunajaran ="'.$this->db->escape_str($tahun).'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_eskul2_nonwajib_guru($tahun) {
        $query = $this->db->query('SELECT eskul_id, eskul_nama FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori=2 AND eskul_status=1 AND eskul_tahunajaran ="'.$this->db->escape_str($tahun).'" AND hakeskul_kodeguru="'.$this->session->userdata('user_login').'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_eskul2_nonwajib_edit($tahun, $semester, $tahunajaran) {
        $query = $this->db->query('SELECT DISTINCT eskul_id, eskul_nama FROM raport_nilaisikap LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaisikap.nilaisikap_datanilai WHERE eskul_kategori=2 AND eskul_status=1 AND kelas_tahun="'.$this->db->escape_str($tahun).'" AND nilaisikap_semester="'.$this->db->escape_str($semester).'" AND eskul_tahunajaran="'.$this->db->escape_str($tahunajaran).'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_eskuledit($kelas, $semester, $tahun) {
        $query = $this->db->query('SELECT DISTINCT eskul_id, eskul_nama FROM raport_nilaisikap LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaisikap.nilaisikap_datanilai WHERE eskul_kategori=1 AND eskul_status=1 AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaisikap_semester="'.$this->db->escape_str($semester).'" AND eskul_tahunajaran="'.$this->db->escape_str($tahun).'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_eskuledit_guru($kelas, $semester, $tahun) {
        $query = $this->db->query('SELECT DISTINCT eskul_id, eskul_nama FROM raport_nilaisikap LEFT JOIN (SELECT siswa_nis,siswa_nama,siswa_kelas, kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa ON data_siswa.siswa_nis = raport_nilaisikap.nilaisikap_nis LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaisikap.nilaisikap_datanilai WHERE eskul_kategori=1 AND eskul_status=1 AND siswa_kelas="'.$this->db->escape_str($kelas).'" AND nilaisikap_semester="'.$this->db->escape_str($semester).'" AND eskul_tahunajaran="'.$this->db->escape_str($tahun).'" AND nilaisikap_kodeguru="'.$this->session->userdata('user_login').'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }


     public function get_data_mapel3($kelas, $tahun) {
        $query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_haknilai LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilaisikap.nilaisikap_mapel WHERE nilaisikap_kelas="'.$this->db->escape_str($kelas).'" AND nilaisikap_tahunajaran="'.$this->db->escape_str($tahun).'" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_nilaisikap($kelas, $mapel, $semester, $jenis) {
        $query = $this->db->query('SELECT DISTINCT(nilaisikap_jenis) FROM raport_nilaisikap WHERE nilaisikap_kelas="'.$this->db->escape_str($kelas).'" AND nilaisikap_mapel="'.$this->db->escape_str($mapel).'" AND nilaisikap_semester="'.$this->db->escape_str($semester).'" AND nilaisikap_jenis LIKE "'.$jenis.'%" ');
        
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

    public function hapus_nilaisikap($kelas, $mapel, $semester, $jenis)
	{
		
		$this->db->where('nilaisikap_kelas', $kelas);
		$this->db->where('nilaisikap_mapel', $mapel);
		$this->db->where('nilaisikap_semester', $semester);
		$this->db->where('nilaisikap_jenis', $jenis);
		$this->db->delete($this->table);
	}

	 public function get_data_mapel_eskul_wajib($tahun, $kelas) {
        $query = $this->db->query('SELECT eskul_id, eskul_nama FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE hakeskul_tahunajaran="'.$this->db->escape_str($tahun).'" AND hakeskul_kelas="'.$this->db->escape_str($kelas).'" AND hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_status="1" AND eskul_kategori="1" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_mapel_eskul_nonwajib($tahun, $kelas) {
        $query = $this->db->query('SELECT eskul_id, eskul_nama FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE hakeskul_tahunajaran="'.$this->db->escape_str($tahun).'" AND hakeskul_kelas="'.$this->db->escape_str($kelas).'" AND hakeskul_kodeguru="'.$this->session->userdata('user_login').'" AND hakeskul_status="1" AND eskul_kategori="2" ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }
       

	




}
