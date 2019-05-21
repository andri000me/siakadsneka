<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_M extends MY_Model {

	protected $table = 'raport_kelas';
	protected $column = array('kelas_code','kelas_nama','kelas_code','kelas_bk','kelas_kk','kelas_tahun','kelas_tingkat','kelas_sort','kelas_status','kelas_pk'); //set column field database for order and search
	protected $order = array('kelas_code' => 'desc'); // default order 
	protected $primary_id = 'kelas_code';
	protected $_primary_key = 'kelas_code';
	protected $_table_name = 'raport_kelas';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	 public function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		
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



	
	public function jumlahkelas($data1, $data2, $data3, $data4) {

		$this->db->select('siswa_nis, siswa_nama, kelas_nama, count(siswa_nis) as jumlah_siswa');
		$this->db->from('raport_siswa');
		$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_siswa.siswa_kelas', 'left');
        $this->db->where('(kelas_nama LIKE "%'.$data1.'%" OR kelas_nama LIKE "%'.$data2.'%" OR kelas_nama LIKE "%'.$data3.'%" OR kelas_nama LIKE "%'.$data4.'%") AND kelas_status = "aktif"');
      
		return $this->db->count_all_results();
	}




}
