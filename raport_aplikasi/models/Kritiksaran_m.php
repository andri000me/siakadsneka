<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritiksaran_M extends MY_Model {

	protected $table = 'raport_kritiksaran';
	protected $column = array('kritiksaran_id','kritiksaran_nama','kritiksaran_email', 'kritiksaran_judul'); //set column field database for order and search
	protected $order = array('kritiksaran_id' => 'desc'); // default order 
	protected $primary_id = 'kritiksaran_id';
	protected $_primary_key = 'kritiksaran_id';
	protected $_table_name = 'raport_kritiksaran';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query()
	{
		
		$this->db->select('*');
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

	





}
