<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_M extends MY_Model {

	protected $table = 'raport_guru';
	protected $column = array('guru_id','guru_kode','guru_nama','guru_jenjang','guru_notelp','guru_status'); //set column field database for order and search
	protected $order = array('guru_id' => 'asc'); // default order 
	protected $primary_id = 'guru_id';
	protected $_primary_key = 'guru_id';
	protected $_table_name = 'raport_guru';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	 public function _get_datatables_query()
	{
		$this->db->select('guru_id,guru_kode,guru_nama,guru_jenjang,guru_notelp,guru_status, guru_group');
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
					$this->db->like('guru_group', $_POST['columns'][5]['search']['value']);
					$this->db->like('guru_status', $_POST['columns'][6]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('guru_group', $_POST['columns'][5]['search']['value']);
					$this->db->like('guru_status', $_POST['columns'][6]['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][5]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('guru_group', $_POST['columns'][5]['search']['value']);
					if (!empty($_POST['columns'][6]['search']['value'])) {
						$this->db->where('guru_status', $_POST['columns'][6]['search']['value']);
				
					}

	
					$this->db->group_end(); //close bracket

			} elseif (!empty($_POST['columns'][6]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('guru_status', $_POST['columns'][6]['search']['value']);
					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('guru_group', $_POST['columns'][5]['search']['value']);
				
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

	public function hapus_data_guru($id)
	{
		$this->db->where('guru_kode', $id);
		$this->db->delete($this->table);
	}
	
	public function hapus_data_guru_multiple($ids){
	         
	       $count = 0;
	        foreach ($ids as $id){
	           $did = intval($id);
	            $this->db->where('guru_kode', $did);
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

	public function get_data_guru($id)
	{
		
		$this->db->select('*');
        $this->db->from($this->table);
       	$this->db->where('guru_kode', $id);
		$query = $this->db->get();

		return $query->row();
	}




}
