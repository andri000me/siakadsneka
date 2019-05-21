<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_siswa_M extends MY_Model {

	protected $table = 'raport_users';
	protected $column = array('user_id','siswa_nis','siswa_nama','nama_kelas','siswa_handphone','nama_kk','siswa_email','kelas_tahun2','kelas_code2'); //set column field database for order and search
	protected $order = array('siswa_nis' => 'asc'); // default order 
	protected $primary_id = 'user_id';
	protected $_primary_key = 'user_id';
	protected $_table_name = 'raport_users';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	 public function _get_datatables_query()
	{
		
		$this->db->select('user_id,siswa_nis,siswa_nama,nama_kelas,siswa_handphone,nama_kk,siswa_email,kelas_tahun2,kelas_code2');
       	$this->db->from($this->table);
       	$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_users.user_login', 'left');
       	$this->db->join('(SELECT siswa_nis as nis_kelas,kelas_code as kelas_code2, kelas_nama as nama_kelas,kelas_kk as nama_kk, kelas_tahun as kelas_tahun2 FROM raport_siswa as datakelas LEFT JOIN raport_kelas ON raport_kelas.kelas_code = datakelas.siswa_kelas) as hasil_kelas', 'hasil_kelas.nis_kelas = raport_users.user_login', 'left');
        $this->db->where('user_level', 1);
		$this->db->having('siswa_nis IS NOT NULL');
		$i = 0;
		
		foreach ($this->column as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('kelas_tahun2', $_POST['columns'][5]['search']['value']);
					$this->db->like('kelas_code2', $_POST['columns'][4]['search']['value']);
					
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('kelas_tahun2', $_POST['columns'][5]['search']['value']);
					$this->db->like('kelas_code2', $_POST['columns'][4]['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][5]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_tahun2', $_POST['columns'][5]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('kelas_code2', $_POST['columns'][4]['search']['value']);
				
					}

	
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][4]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('kelas_code2', $_POST['columns'][4]['search']['value']);
					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('kelas_tahun2', $_POST['columns'][5]['search']['value']);
				
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

	public function count_all_siswa()
	{
		$this->db->from($this->table);
		 $this->db->where('user_level', 1);
		return $this->db->count_all_results();
	}
	public function get_by_idsiswa($id)
	{
		$this->db->select('user_id,siswa_nis,siswa_nama,siswa_handphone,siswa_email');
		$this->db->from($this->table);
		$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_users.user_login', 'left');
        $this->db->where('user_level', 1);
		$this->db->where($this->primary_id, $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function get_data_angkatan()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT DISTINCT kelas_tahun FROM raport_kelas  ORDER BY kelas_tahun desc ');
	
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

    function get_data_kelas_saring($id) {
      	$dataedit = str_replace("-", "/", $id);
        $query = $this->db->query('SELECT DISTINCT kelas_code, kelas_nama FROM raport_siswa
				LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas
				WHERE kelas_tahun="'.$this->db->escape_str($dataedit).'"  ORDER BY kelas_code asc ');
        
        if ($query->num_rows() > 0) return $query->result();              
    }


    public function hapus_data_siswa($id)
	{
		$this->db->where('user_login', $id);
		$this->db->delete($this->table);
	}
	



	





}
