<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompetensi_M extends MY_Model {

	protected $table = 'raport_kompetensi';
	protected $column = array('kompetensi_id','kompetensi_nama','mapel_nama','kompetensi_pengetahuan','kompetensi_keterampilan','kompetensi_sikap','kompetensi_semesterfilter','kompetensi_kelompok'); //set column field database for order and search
	protected $order = array('kompetensi_id' => 'desc'); // default order 
	protected $primary_id = 'kompetensi_id';
	protected $_primary_key = 'kompetensi_id';
	protected $_table_name = 'raport_kompetensi';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query()
	{
		$this->db->select('kompetensi_id,kompetensi_nama, mapel_nama,kompetensi_pengetahuan,kompetensi_keterampilan,kompetensi_sikap,kompetensi_semesterfilter,kompetensi_kelompok');
        $this->db->from($this->table);
        $this->db->join('raport_mapel', 'raport_mapel.mapel_id = raport_kompetensi.kompetensi_mapel', 'left');
        //$this->db->where('kompetensi_tahunajaran', $this->konfigurasi_m->konfig_tahun());
        $this->db->where('kompetensi_semester', $this->konfigurasi_m->konfig_semester());
      
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
