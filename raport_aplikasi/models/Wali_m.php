<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_M extends MY_Model {

	protected $table = 'raport_wali';
	protected $column = array('wali_id','guru_nama','kelas_nama','wali_status'); //set column field database for order and search
	protected $order = array('wali_id' => 'desc'); // default order 
	protected $primary_id = 'wali_id';
	protected $_primary_key = 'wali_id';
	protected $_table_name = 'raport_wali';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query()
	{
		$this->db->select('wali_id, wali_kelas, guru_nama, kelas_nama, kelas_kk, kelas_tahun, wali_status');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_wali.wali_kodeguru', 'left');
        $this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_wali.wali_kelas', 'left');
        
        if ($this->session->userdata('user_level') == 5) {
        	$this->db->where('wali_tahunajaran', $this->konfigurasi_m->konfig_tahun());
      
        } else {
        	 $this->db->where('wali_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
      
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


    public function get_data_kelas_saring($id) {
        $query = $this->db->query('SELECT kelas_code, kelas_nama FROM raport_kelas WHERE kelas_tahun="'.$this->db->escape_str($id).'" ORDER BY kelas_code asc');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_data_kelas_saring_guru($id) {
        $query = $this->db->query('SELECT kelas_code, kelas_nama FROM raport_hakabsensi LEFT JOIN raport_kelas ON raport_kelas.kelas_code=raport_hakabsensi.hakabsensi_kelas WHERE kelas_tahun="'.$this->db->escape_str($id).'" AND hakabsensi_kodeguru = "'.$this->session->userdata('user_login').'" AND hakabsensi_status="1" ORDER BY kelas_code asc');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function statuswali() {

        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query('SELECT kelas_nama FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1"');
        //$query = $this->db->get();
        
        return $query->row();
    
	}

	public function statuswali_cek() {

        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query('SELECT kelas_nama FROM raport_wali LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_wali.wali_kelas WHERE wali_kodeguru="'.$this->session->userdata('user_login').'" AND wali_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND wali_status="1"');
        //$query = $this->db->get();
        
       

        if ($query->num_rows() > 0)
        {
        $row = $query->row();

         $row->kelas_nama;
           return 1;
        } else {
        	return 0;
        }
    
	}




	





}
