<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_M extends MY_Model {

	protected $table = 'raport_siswa';
	protected $column = array('siswa_id','siswa_nis','siswa_nama','kelas_nama','siswa_absen','kelas_tahun','siswa_status','kelas_kk','siswa_kelas'); //set column field database for order and search
	protected $columnwali = array('siswa_nis','siswa_nama','kelas_nama','siswa_absen','kelas_tahun','siswa_status','kelas_kk','siswa_kelas'); //set column field database for order and search
	protected $order = array('siswa_nis' => 'asc'); // default order 
	protected $primary_id = 'siswa_id';
	protected $_primary_key = 'siswa_id';
	protected $_table_name = 'raport_siswa';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query_siswa_aktif()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->where('siswa_status', 1);
      
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
					$this->db->like('siswa_status', $_POST['columns'][7]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][6]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('siswa_status', $_POST['columns'][7]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][6]['search']['value']);
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
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][7]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					
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



	public function _get_datatables_query_siswa_tidak_aktif()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->where('siswa_status !=', 1);
      
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
					$this->db->like('siswa_status', $_POST['columns'][7]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][6]['search']['value']);

				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('siswa_status', $_POST['columns'][7]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][6]['search']['value']);
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
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][7]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					
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

	 public function _get_datatables_query_siswa_wali()
	{
		$this->db->select('siswa_id,siswa_nis,siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->join('raport_wali', 'raport_wali.wali_kelas = raport_siswa.siswa_kelas', 'left');
        $this->db->where('wali_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
        $this->db->where('wali_kodeguru', $this->session->userdata('user_login'));
        $this->db->where('wali_status', '1');
      
		$i = 0;
		
		foreach ($this->columnwali as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('siswa_status', $_POST['columns'][7]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][6]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('siswa_status', $_POST['columns'][7]['search']['value']);
					$this->db->like('kelas_tahun', $_POST['columns'][6]['search']['value']);
				}

				if(count($this->columnwali) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][4]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][7]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_tahun', $_POST['columns'][6]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('siswa_status', $_POST['columns'][7]['search']['value']);
					
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

	public function get_datatables_siswa_aktif()
	{
		$this->_get_datatables_query_siswa_aktif();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function get_datatables_siswa_tidak_aktif()
	{
		$this->_get_datatables_query_siswa_tidak_aktif();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function get_datatables_siswa_wali()
	{
		$this->_get_datatables_query_siswa_wali();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_siswa_aktif()
	{
		$this->_get_datatables_query_siswa_aktif();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_siswa_tidak_aktif()
	{
		$this->_get_datatables_query_siswa_tidak_aktif();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_filtered_siswa_wali()
	{
		$this->_get_datatables_query_siswa_wali();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_siswa_tidak_aktif()
	{
		$this->db->from($this->table);
		$this->db->where('siswa_status !=', 1);
		return $this->db->count_all_results();
	}

	public function count_all_siswa_aktif()
	{
		$this->db->from($this->table);
		$this->db->where('siswa_status =', 1);
		return $this->db->count_all_results();
	}

	public function count_all_siswa_wali()
	{
		$this->db->from($this->table);
		$this->db->where('siswa_status =', 1);
		return $this->db->count_all_results();
	}

	public function get_data_angkatan()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_status !=1 ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[''] = '';
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    
public function get_data_angkatan2()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_kelas WHERE kelas_status !="aktif" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }


    public function get_data_angkatan2_wali()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE kelas_status !="aktif" AND wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    public function get_data_angkatan_guru2()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_haknilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_haknilai.haknilai_kelas WHERE kelas_status !="aktif" AND haknilai_kodeguru = "'.$this->session->userdata('user_login').'" AND haknilai_status="1" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

     public function get_data_angkatan_eskul_wajib()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="1") as raport_hakeskul2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_status !="aktif" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

     public function get_data_angkatan_eskul_nonwajib()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="2") as raport_hakeskul2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_status !="aktif" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    public function get_data_angkatan_aktif()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_status =1 ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[''] = '';
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

	public function get_data_angkatan_aktif2()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_kelas WHERE kelas_status ="aktif" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    public function get_data_angkatan_aktif2_wali()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE kelas_status ="aktif" AND wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    public function get_data_angkatan_aktif_guru2()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_haknilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_haknilai.haknilai_kelas WHERE kelas_status ="aktif" AND haknilai_kodeguru = "'.$this->session->userdata('user_login').'" AND haknilai_status="1" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    public function get_data_angkatan_aktif_eskul_wajib()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="1") as raport_hakeskul2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_status ="aktif" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }

    public function get_data_angkatan_aktif_eskul_nonwajib()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="2") as raport_hakeskul2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_status ="aktif" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1" HAVING kelas_tahun != "" ORDER BY kelas_tahun desc ');
	
		$daftarangkatan = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarangkatan )) {
			foreach ($query->result()  as $munculangkatan) {
				$array[$munculangkatan->kelas_tahun] = $munculangkatan->kelas_tahun;
			}
		}
	
		return $array;
    }



    public function get_data_kelas()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
WHERE siswa_status != 1  ORDER BY kelas_code desc ');
	
		$daftarkelas = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarkelas )) {
			foreach ($query->result()  as $munculkelas) {
				$array[''] = '';
				$array[$munculkelas->kelas_code] = $munculkelas->kelas_nama;
			}
		}
	
		return $array;
    }

    public function get_data_kelas_aktif()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
WHERE siswa_status = 1  ORDER BY kelas_code desc ');
	
		$daftarkelas = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarkelas )) {
			foreach ($query->result()  as $munculkelas) {
				$array[''] = '';
				$array[$munculkelas->kelas_code] = $munculkelas->kelas_nama;
			}
		}
	
		return $array;
    }

    public function get_data_kelas_filter($id)
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
WHERE siswa_status != 1 AND kelas_code="'.$this->db->escape_str($id).'"  ORDER BY kelas_code desc ');
	
		$daftarkelas = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarkelas )) {
			foreach ($query->result()  as $munculkelas) {
				$array[''] = '';
				$array[$munculkelas->kelas_code] = $munculkelas->kelas_nama;
			}
		}
	
		return $array;
    }

     public function get_data_kelas_saring($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
				LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
				WHERE siswa_status != 1 AND kelas_tahun="'.$this->db->escape_str($dataedit).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_kelas_aktif_saring($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
				LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
				WHERE siswa_status = 1 AND kelas_tahun="'.$this->db->escape_str($dataedit).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_modal($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
				LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
				WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_modal_wali($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_wali
				LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas
				WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'" AND wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran ="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status = "1" ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_modal_2($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_kelas
				WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_modal_guru_2($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_haknilai LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_haknilai.haknilai_kelas WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'" AND haknilai_kodeguru = "'.$this->session->userdata('user_login').'" AND haknilai_status="1"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_modal_eskul_wajib($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="1") as raport_hakeskul2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
	}

    public function get_data_kelas_modal_eskul_nonwajib($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="2") as raport_hakeskul2 LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_semester_modal_guru_2($id) {
      	
        $query = $this->db->query('SELECT DISTINCT haknilai_tahunajaran FROM raport_haknilai LEFT JOIN  raport_kelas ON raport_kelas.kelas_code = raport_haknilai.haknilai_kelas WHERE kelas_code="'.$this->db->escape_str($id).'" AND haknilai_kodeguru = "'.$this->session->userdata('user_login').'" AND haknilai_status="1"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_semester_modal_siswa() {
      	
        $query = $this->db->query('SELECT kelas_tingkat FROM raport_siswa LEFT JOIN  raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_nis = "'.$this->session->userdata('user_login').'"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_semester_modal_siswawali() {
      	
        $query = $this->db->query('SELECT kelas_tingkat FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_semester_modal_eskul_wajib($id) {
      	
        $query = $this->db->query('SELECT DISTINCT hakeskul_tahunajaran FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="1") as raport_hakeskul2 LEFT JOIN  raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_code="'.$this->db->escape_str($id).'" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1"');
        
        if ($query->num_rows() > 0) return $query->result();              
	}
	
	public function get_data_semester_modal_eskul_nonwajib_v2($id) {
      	
        $query = $this->db->query('SELECT DISTINCT hakeskul_tahunajaran FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="2") as raport_hakeskul2 LEFT JOIN  raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE kelas_code="'.$this->db->escape_str($id).'" AND hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_semester_modal_eskul_nonwajib() {
      	
        $query = $this->db->query('SELECT DISTINCT hakeskul_tahunajaran FROM (SELECT * FROM raport_hakeskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_hakeskul.hakeskul_ideskul WHERE eskul_kategori="2") as raport_hakeskul2 LEFT JOIN  raport_kelas ON raport_kelas.kelas_code = raport_hakeskul2.hakeskul_kelas WHERE hakeskul_kodeguru = "'.$this->session->userdata('user_login').'" AND hakeskul_status="1"');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_nama($id) {
        $query = $this->db->query('SELECT DISTINCT kelas_nama FROM raport_siswa
				LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
				WHERE kelas_code="'.$this->db->escape_str($id).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

     public function get_data_kelas_nama_2($id) {
        $query = $this->db->query('SELECT DISTINCT kelas_nama FROM raport_kelas 
        	WHERE kelas_code="'.$this->db->escape_str($id).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_siswa($id)
	{
		
		$this->db->select('siswa_id,siswa_nis,siswa_nisn,siswa_jeniskelamin, siswa_email, siswa_handphone, siswa_tempatlahir, siswa_tanggallahir, siswa_tanggalmasuk, siswa_nomorijazah, siswa_tahunijazah, siswa_statuskeluarga, siswa_telprumah, siswa_urutansaudara, siswa_asalsekolah, siswa_hobi, siswa_agama, siswa_alamat, siswa_foto, siswa_nama,kelas_nama,siswa_absen,kelas_tahun,siswa_status,kelas_kk,siswa_kelas,siswa_namaayah, siswa_pekerjaanayah,siswa_pendidikanayah, siswa_penghasilanayah,siswa_notelpayah,siswa_alamatayah,siswa_namaibu, siswa_pekerjaanibu,siswa_pendidikanibu, siswa_penghasilanibu,siswa_notelpibu,siswa_alamatibu,siswa_namawali, siswa_pekerjaanwali,siswa_pendidikanwali, siswa_penghasilanwali,siswa_notelpwali,siswa_alamatwali');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
		$this->db->where($this->primary_id, $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_siswa_profile($id)
	{
		
		$this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
       	$this->db->where('siswa_nis', $id);
		$query = $this->db->get();

		return $query->row();
	}


	public function hapus_data_siswa($id)
	{
		$this->db->where('siswa_nis', $id);
		$this->db->delete($this->table);
	}

		public function hapus_data_siswa_multiple($ids){
         
       $count = 0;
        foreach ($ids as $id){
           $did = $id;
            $this->db->where('siswa_nis', $did);
            $this->db->delete($this->table);
            $this->db->query('DELETE FROM raport_users WHERE user_login="'.$did.'"'); 
            $count = $count+1;
       }
        
        if ($this->input->get_post('ids') == '') {
            echo '<div class="alert alert-danger alert-dismissable error-hapus fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data yang akan dihapus !!!</div><div class="tutup-mapel-hr"> <hr><div>';
        	//dump($this->db->last_query());
        } else {
           echo'<div class="alert alert-success alert-dismissable error-hapus fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Sebanyak <strong>'. $count.'</strong> data berhasil dihapus.</div><div class="tutup-mapel-hr"> <hr><div>';
           //dump($this->db->last_query());
        }
        
        
        $count = 0;
}


	public function get_user_login(){
		
		$this->db->select('siswa_id,user_login');
        $this->db->from('raport_users');
        $this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_users.user_login', 'left');

        //$this->db->where('user_level', 1);
        //$this->db->where('siswa_nis', $id);
        $query = $this->db->get();
		return $query->row();

	}

	public function get_by_nis($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('raport_kelas','raport_kelas.kelas_code=raport_siswa.siswa_kelas','left');
		$this->db->where('siswa_nis', $id);
		$query = $this->db->get();

		return $query->row();
	}




	public function raport_kelompok_A($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama, 

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='A' AND kompetensi_nama NOT LIKE '%Agama Dan Budi%'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}
	public function raport_kelompok_B($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama,

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='B'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}
	public function raport_kelompok_C1($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama,

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='C1'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}

	public function raport_kelompok_C2($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama,

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='C2'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}


	public function raport_kelompok_C3($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama,

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='C3'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}


	public function raport_kelompok_M($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama,

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='M'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}

	public function raport_agama_islam($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama, 

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='A' AND mapel_nama LIKE 'Pendidikan Agama dan Budi Pekerti'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}



	public function raport_agama_kristen($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama, 

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='A' AND mapel_nama LIKE 'Pendidikan Agama dan Budi Pekerti Kr'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}


	public function raport_agama_katolik($semester, $tahun, $nis ) {

        $query = $this->db->query("select siswa_nis, siswa_nama, kelas_nama, mapel_nama, kompetensi_nama, 

MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_P', raport_nilai.nilai_data, NULL)) AS PENGETAHUAN,


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_K', raport_nilai.nilai_data, NULL)) AS KETERAMPILAN, 


MAX(IF(raport_nilai.nilai_jenis = 'RAPORT_S', raport_nilai.nilai_data, NULL)) AS SIKAP,

kompetensi_pengetahuan as KOMPETENSI_P, kompetensi_keterampilan as KOMPETENSI_K, kompetensi_sikap as KOMPETENSI_S,
kompetensi_kelompok as KELOMPOK,
mapel_sort as SORT,
haknilai_kkm as KKM_P,
haknilai_kkm2 as KKM_K

FROM raport_nilai 

LEFT JOIN raport_siswa ON raport_siswa.siswa_nis = raport_nilai.nilai_nis 

LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_nilai.nilai_kelas 

LEFT JOIN raport_mapel ON raport_mapel.mapel_id = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT kompetensi_nama, kompetensi_pengetahuan, kompetensi_keterampilan, kompetensi_sikap, kompetensi_kelompok, kompetensi_mapel from raport_kompetensi WHERE kompetensi_semesterfilter ='".$this->db->escape_str($semester)."') as raport_kompetensi2 ON raport_kompetensi2.kompetensi_mapel = raport_nilai.nilai_mapel 

LEFT JOIN (SELECT haknilai_mapel, haknilai_kkm, haknilai_kkm2 FROM raport_haknilai WHERE haknilai_tahunajaran='". $tahun."' AND haknilai_kelas='".$this->ambil_kelas($nis)."') as raport_haknilai2 ON raport_haknilai2.haknilai_mapel = raport_nilai.nilai_mapel 


WHERE siswa_nis = '".$this->db->escape_str($nis)."' AND nilai_semester = '".$this->db->escape_str($semester)."'
AND kompetensi_kelompok ='A' AND mapel_nama LIKE 'Pendidikan Agama dan Budi Pekerti Ka'

group by siswa_nis, nilai_mapel order by mapel_sort");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}

	public function raport_ekstrakurikuler($semester, $tahun, $nis ) {

        $query = $this->db->query("SELECT eskul_id, eskul_nama, nilaieskul_data, nilaieskul_deskripsi FROM raport_nilaieskul LEFT JOIN raport_eskul ON raport_eskul.eskul_id = raport_nilaieskul.nilaieskul_dataeskul WHERE nilaieskul_semester='".$this->db->escape_str($semester)."' AND nilaieskul_tahunajaran='".$this->db->escape_str($tahun)."' AND nilaieskul_nis='".$this->db->escape_str($nis)."'");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}

	public function raport_prestasi($semester, $tahun, $nis ) {

        $query = $this->db->query("SELECT prestasi_nama, prestasi_tingkat, prestasi_peringkat, prestasi_deskripsi FROM raport_prestasi WHERE prestasi_semester='".$this->db->escape_str($semester)."' AND prestasi_tahunajaran='".$this->db->escape_str($tahun)."' AND prestasi_nis='".$this->db->escape_str($nis)."'");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}

	public function raport_absensi($semester, $tahun, $nis, $keterangan ) {

        $query = $this->db->query("SELECT count(absensi_id) as jumlahsakit FROM raport_absensi WHERE absensi_semester='".$this->db->escape_str($semester)."' AND absensi_tahunajaran='".$this->db->escape_str($tahun)."'  AND absensi_nis='".$this->db->escape_str($nis)."' AND absensi_keterangan='".$this->db->escape_str($keterangan)."'");
        
        if ($query->num_rows() > 0) return $query->row();              
   
	}

	public function raport_walikelas($tahun, $nis) {

        $query = $this->db->query("SELECT guru_nama, guru_nip FROM raport_siswa LEFT JOIN (SELECT guru_nama, guru_nip, wali_kelas, wali_tahunajaran FROM raport_wali LEFT JOIN raport_guru ON raport_guru.guru_kode=raport_wali.wali_kodeguru) as raport_wali2 ON raport_wali2.wali_kelas=raport_siswa.siswa_kelas WHERE wali_tahunajaran='".$this->db->escape_str($tahun)."' AND siswa_nis='".$this->db->escape_str($nis)."'");
        
       if ($query->num_rows() > 0) return $query->row();      
   
        

        	
	}

	public function raport_walikelas_nama($tahun, $nis) {

        $query = $this->db->query("SELECT guru_nama, guru_nip FROM raport_siswa LEFT JOIN (SELECT guru_nama, guru_nip, wali_kelas, wali_tahunajaran FROM raport_wali LEFT JOIN raport_guru ON raport_guru.guru_kode=raport_wali.wali_kodeguru) as raport_wali2 ON raport_wali2.wali_kelas=raport_siswa.siswa_kelas WHERE wali_tahunajaran='".$this->db->escape_str($tahun)."' AND siswa_nis='".$this->db->escape_str($nis)."'");
        
       if ($query->num_rows() > 0) {
       		$row = $query->row();

         	return $row->guru_nama;
       } else {
       		return '.......................................';
       }     
   
        

        	
	}

	public function raport_walikelas_nip($tahun, $nis) {

        $query = $this->db->query("SELECT guru_nama, guru_nip FROM raport_siswa LEFT JOIN (SELECT guru_nama, guru_nip, wali_kelas, wali_tahunajaran FROM raport_wali LEFT JOIN raport_guru ON raport_guru.guru_kode=raport_wali.wali_kodeguru) as raport_wali2 ON raport_wali2.wali_kelas=raport_siswa.siswa_kelas WHERE wali_tahunajaran='".$this->db->escape_str($tahun)."' AND siswa_nis='".$this->db->escape_str($nis)."'");
        
       if ($query->num_rows() > 0) {
       		$row = $query->row();

         	return $row->guru_nip;
       } else {
       		return '';
       }     
   
        

        	
	}

	public function raport_nilaisikap($semester, $tahun, $nis) {

        $query = $this->db->query("SELECT nilaisikap_data, nilaisikap_deskripsi FROM raport_nilaisikap WHERE nilaisikap_semester='".$this->db->escape_str($semester)."' AND nilaisikap_tahunajaran='".$this->db->escape_str($tahun)."' AND nilaisikap_nis='".$this->db->escape_str($nis)."'");
        
        if ($query->num_rows() > 0) return $query->result();              
   
	}



	




	 public function get_siswa_nis($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where('siswa_nis', $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->qb_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->data_siswa_nis())->$method();
	}


	private function data_siswa_nis() {
		$this->db->select('siswa_nis, siswa_nama, kelas_nama, kelas_kk, siswa_agama');
        $this->db->from('raport_siswa');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
       

	}



	public function namakelas() {


        $query = $this->db->query('SELECT kelas_nama FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas WHERE siswa_nis="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
           
        }

        return $row->kelas_nama;

    }


    public function kodekelaswali() {


        $query = $this->db->query('SELECT kelas_code FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_code;

         return $row->kelas_code;
         
        } else {
          return ' ';
        }
        
           

    }

    public function kodekelaswali_siswa($nis) {


        $query = $this->db->query('SELECT siswa_kelas FROM raport_siswa WHERE siswa_nis ="'.$nis.'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_kelas;
         return $row->siswa_kelas;
        } else {
        	return FALSE;
        }
        
           

    }

    public function namakelaswali() {


        $query = $this->db->query('SELECT kelas_nama FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
         return $row->kelas_nama;
           
        } else {

        	return 'empty';
        }

        

    }

    public function angkatankelaswali() {


        $query = $this->db->query('SELECT kelas_tahun FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1" ');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_tahun;
         return $row->kelas_tahun;
           
        } else {

        	return 'empty';
        }

        

    }


    public function namaguruwali() {


        $query = $this->db->query('SELECT guru_nama FROM raport_guru WHERE guru_kode="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->guru_nama;
         return $row->guru_nama;
           
        } else {

        	return 'empty';
        }

        

    }

     public function namasiswa() {


        $query = $this->db->query('SELECT siswa_nama FROM raport_siswa WHERE siswa_nis="'.$this->session->userdata('user_login').'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->siswa_nama;
         return $row->siswa_nama;
           
        } else {

        	return 'empty';
        }

        

    }


    public function cekdatanis($nis) {


        $query = $this->db->query('SELECT siswa_nis FROM raport_siswa WHERE siswa_nis="'.$nis.'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

       
         return TRUE;
           
        } else {

        	return FALSE;
        }

        

    }

     private function ambil_kelas($nis) {
        $query = $this->db->query('SELECT siswa_kelas FROM raport_siswa WHERE siswa_nis="'.$this->db->escape_str($nis).'"');

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

        
          return $row->siswa_kelas;
           
        } else {
          return FALSE;
        }

        

    }








}
