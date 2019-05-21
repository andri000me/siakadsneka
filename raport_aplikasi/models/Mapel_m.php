<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_M extends MY_Model {

	protected $table = 'raport_mapel';
	protected $column = array('mapel_nama','mapel_sort','mapel_status'); //set column field database for order and search
	protected $order = array('mapel_sort' => 'asc'); // default order 
	protected $primary_id = 'mapel_id';
	protected $_primary_key = 'mapel_id';
	protected $_table_name = 'raport_mapel';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		//$this->db->where('mapel_tahunajaran', $this->konfig_tahun());
		//$this->db->where('mapel_semester', $this->konfig_semester());
		
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

	 private function konfig_tahun() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_tahun_ajaran_admin'];
    }


     private function konfig_semester() {
         $data = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        return $dataoption['aktivasi_semester_admin'];
    }


	





}
