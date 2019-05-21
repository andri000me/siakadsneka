<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_M extends MY_Model {

	protected $table = 'raport_prestasi';
	protected $column = array('prestasi_id','prestasi_nis','siswa_nama','kelas_nama','prestasi_bidang','prestasi_tingkat','prestasi_peringkat'); //set column field database for order and search
	protected $order = array('prestasi_id' => 'desc'); // default order 
	protected $primary_id = 'prestasi_id';
	protected $_primary_key = 'prestasi_id';
	protected $_table_name = 'raport_prestasi';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query()
	{
		$this->db->select('prestasi_id,prestasi_nis,siswa_nama,kelas_nama,prestasi_bidang, prestasi_tingkat, prestasi_peringkat, kelas_kk, kelas_tahun, siswa_kelas');
        $this->db->from($this->table);
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_prestasi.prestasi_nis', 'left');

        if ($this->session->userdata('user_level') == 5) {
			
	      	$this->db->where('prestasi_tahunajaran', $this->konfigurasi_m->konfig_tahun());
	      	$this->db->where('prestasi_semester', $this->konfigurasi_m->konfig_semester());
		} else {
			
	      	$this->db->where('prestasi_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
	      	$this->db->where('prestasi_semester', $this->konfigurasi_m->konfig_semester_client());
		}
      	
		$i = 0;
		
		foreach ($this->column as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('prestasi_bidang', $_POST['columns'][5]['search']['value']);
					$this->db->like('prestasi_tingkat', $_POST['columns'][6]['search']['value']);
					$this->db->like('prestasi_peringkat', $_POST['columns'][7]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('prestasi_bidang', $_POST['columns'][5]['search']['value']);
					$this->db->like('prestasi_tingkat', $_POST['columns'][6]['search']['value']);
					$this->db->like('prestasi_peringkat', $_POST['columns'][7]['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}


		if (!empty($_POST['columns'][5]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('prestasi_bidang', $_POST['columns'][5]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('prestasi_tingkat', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('prestasi_peringkat', $_POST['columns'][7]['search']['value']);
				
					}
					$this->db->group_end(); //close bracket

			

			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('prestasi_tingkat', $_POST['columns'][6]['search']['value']);
					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('prestasi_bidang', $_POST['columns'][5]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('prestasi_peringkat', $_POST['columns'][7]['search']['value']);
				
					}

				
					$this->db->group_end(); //close bracket
					
			} elseif (!empty($_POST['columns'][7]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('prestasi_peringkat', $_POST['columns'][7]['search']['value']);
					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('prestasi_bidang', $_POST['columns'][5]['search']['value']);
				
					}

					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('prestasi_tingkat', $_POST['columns'][6]['search']['value']);
				
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

	public function get_data_kelas()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT kelas_code, kelas_nama FROM raport_kelas WHERE kelas_status="aktif" ORDER BY kelas_code asc');
	
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

    public function get_data_siswa_aktif_saring($id) {
      
        $query = $this->db->query('SELECT siswa_nis, siswa_nama FROM raport_siswa WHERE siswa_kelas="'.$this->db->escape_str($id).'"  ORDER BY siswa_nis asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_datasiswa_prestasi($id)
	{
		
		
		$this->db->select('prestasi_id,prestasi_nis,prestasi_nama,prestasi_deskripsi,prestasi_bidang, prestasi_tingkat, prestasi_peringkat, siswa_kelas');
        $this->db->from($this->table);
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_prestasi.prestasi_nis', 'left');
		$this->db->where($this->primary_id, $id);
		$query = $this->db->get();

		return $query->row();
	}


	





}
