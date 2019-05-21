<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_guru_M extends MY_Model {

	protected $table = 'raport_users';
	protected $column = array('user_id','guru_kode','guru_nama','guru_notelp','guru_email'); //set column field database for order and search
	protected $order = array('user_id' => 'asc'); // default order 
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
		
		$this->db->select('user_id,guru_kode,guru_nama,guru_notelp,guru_email');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_users.user_login', 'left');
        $this->db->where('user_level', 2);
      
		
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

	public function count_all_guru()
	{
		$this->db->from($this->table);
		 $this->db->where('user_level', 2);
		return $this->db->count_all_results();
	}
	public function get_by_idguru($id)
	{
		$this->db->select('user_id,guru_kode,guru_nama,guru_notelp,guru_email');
		$this->db->from($this->table);
		$this->db->join('raport_guru', 'raport_guru.guru_kode = raport_users.user_login', 'left');
        $this->db->where('user_level', 2);
		$this->db->where($this->primary_id, $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function hapus_data_guru($id)
	{
		$this->db->where('user_login', $id);
		$this->db->delete($this->table);
		
	}



	





}
