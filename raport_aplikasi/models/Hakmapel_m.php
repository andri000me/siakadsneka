<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hakmapel_M extends MY_Model {

	protected $table = 'raport_haknilai';
	protected $column = array('haknilai_id','guru_nama','mapel_nama','kelas_nama', 'haknilai_kkm','haknilai_metode','haknilai_kirim','haknilai_status','kelas_kk', 'haknilai_kkm2'); //set column field database for order and search
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

	 public function _get_datatables_query()
	{
		$this->db->select('haknilai_id,guru_nama,mapel_nama,kelas_nama,kelas_kk, kelas_tahun, haknilai_kelas, haknilai_kkm, haknilai_kkm2, haknilai_metode ,haknilai_mapel, haknilai_kirim,haknilai_status');
        $this->db->from('raport_haknilai');
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_haknilai.haknilai_kodeguru', 'left');
        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = raport_haknilai.haknilai_mapel', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_haknilai.haknilai_kelas', 'left');

        if ($this->session->userdata('user_level') == 5) {
        	$this->db->where('haknilai_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        } else {
        	$this->db->where('haknilai_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
        }
        
        //$this->db->where('haknilai_semester', $this->konfigurasi_m->konfig_semester());


		$i = 0;
		
		foreach ($this->column as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('haknilai_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('haknilai_metode', $_POST['columns'][6]['search']['value']);
					$this->db->like('haknilai_kirim', $_POST['columns'][7]['search']['value']);
					
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('haknilai_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('haknilai_metode', $_POST['columns'][6]['search']['value']);
					$this->db->like('haknilai_kirim', $_POST['columns'][7]['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}


		if (!empty($_POST['columns'][4]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('haknilai_kelas', $_POST['columns'][4]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('haknilai_metode', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('haknilai_kirim', $_POST['columns'][7]['search']['value']);
					
					}
					$this->db->group_end(); //close bracket

			

			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('haknilai_metode', $_POST['columns'][6]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('haknilai_kelas', $_POST['columns'][4]['search']['value']);
				
					}

					if (!empty($_POST['columns'][7]['search']['value'])) {
						$this->db->where('haknilai_kirim', $_POST['columns'][7]['search']['value']);
					
					}
				
					$this->db->group_end(); //close bracket
					
			} elseif (!empty($_POST['columns'][7]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('haknilai_kirim', $_POST['columns'][7]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('haknilai_metode', $_POST['columns'][6]['search']['value']);
				
					}

					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('haknilai_kelas', $_POST['columns'][4]['search']['value']);
					
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


	 public function get_data_guru()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT guru_kode, guru_nama FROM raport_guru WHERE guru_status=1');
	
		$daftarguru = $query->num_rows();
	
		// Return key => value pair array
		$array = array();
		if (count($daftarguru )) {
			foreach ($query->result()  as $munculguru) {
				$array[''] = '';
				$array[$munculguru->guru_kode] = $munculguru->guru_nama;
			}
		}
	
		return $array;
    }


    public function get_data_kelas()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT kelas_code, kelas_nama FROM raport_kelas WHERE kelas_status="aktif"');
	
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

    public function get_data_mapel($tahun)
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_mapel WHERE mapel_tahunajaran="'.$this->db->escape_str($tahun).'" AND mapel_status=1');
	
		$daftarmapel = $query->num_rows();
	
		// Return key => value pair array
		$array = array('' => '');
		if (count($daftarmapel )) {
			foreach ($query->result()  as $munculmapel) {
				$array[''] = '';
				$array[$munculmapel->mapel_id] = $munculmapel->mapel_nama;
			}
		}
	
		return $array;
    }

    public function get_data_mapel_global()
    {
    	// Fetch pages without parents
    	$query = $this->db->query('SELECT mapel_id, mapel_nama FROM raport_mapel WHERE mapel_status=1');
	
		$daftarmapel = $query->num_rows();
	
		// Return key => value pair array
		$array = array('' => '');
		if (count($daftarmapel )) {
			foreach ($query->result()  as $munculmapel) {
				$array[''] = '';
				$array[$munculmapel->mapel_id] = $munculmapel->mapel_nama;
			}
		}
	
		return $array;
    }





	





}
