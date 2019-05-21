<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_M extends MY_Model {

	protected $table = 'raport_absensi';
	protected $column = array('absensi_id','absensi_nis','siswa_nama','kelas_nama','absensi_keterangan','absensi_waktu','guru_nama'); //set column field database for order and search
	protected $order = array('absensi_id' => 'desc'); // default order 
	protected $primary_id = 'absensi_id';
	protected $_primary_key = 'absensi_id';
	protected $_table_name = 'raport_absensi';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	public function _get_datatables_query()
	{
		$this->db->select('absensi_id,absensi_nis,siswa_nama,kelas_nama,kelas_tahun,absensi_keterangan,absensi_waktu, guru_nama');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_absensi.absensi_kodeguru', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_absensi.absensi_kelas', 'left');
      	//$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->where('absensi_tahunajaran', $this->konfigurasi_m->konfig_tahun());
      	$this->db->where('absensi_semester', $this->konfigurasi_m->konfig_semester());
      	
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


	public function _get_datatables_query_guru()
	{
		$this->db->select('absensi_id,absensi_nis,siswa_nama,kelas_nama,kelas_tahun,absensi_keterangan,absensi_waktu, guru_nama');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_absensi.absensi_kodeguru', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_absensi.absensi_kelas', 'left');
      	//$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');

      	
      		$this->db->where('absensi_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
	      	$this->db->where('absensi_semester', $this->konfigurasi_m->konfig_semester_client());
	      	$this->db->where('absensi_kodeguru',$this->session->userdata('user_login'));
      	
      	
      	
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


	public function _get_datatables_query_guru_all()
	{
		$this->db->select('absensi_id,absensi_nis,siswa_nama,kelas_nama,kelas_tahun,absensi_keterangan,absensi_waktu, guru_nama');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_absensi.absensi_kodeguru', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_absensi.absensi_kelas', 'left');
      	//$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');

      	
      		$this->db->where('absensi_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
	      	$this->db->where('absensi_semester', $this->konfigurasi_m->konfig_semester_client());
	      	
      	
      	
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

	public function get_datatables_guru()
	{
		$this->_get_datatables_query_guru();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_guru()
	{
		$this->_get_datatables_query_guru();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_guru()
	{
		$this->db->select('absensi_id,absensi_nis,siswa_nama,kelas_nama,kelas_tahun,absensi_keterangan,absensi_waktu, guru_nama');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_absensi.absensi_kodeguru', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_absensi.absensi_kelas', 'left');
      	//$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->where('absensi_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
      	$this->db->where('absensi_semester', $this->konfigurasi_m->konfig_semester_client());
      	$this->db->where('absensi_kodeguru',$this->session->userdata('user_login'));
      	
		return $this->db->count_all_results();
	}




	public function get_datatables_guru_all()
	{
		$this->_get_datatables_query_guru_all();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
	}

	public function count_filtered_guru_all()
	{
		$this->_get_datatables_query_guru_all();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_guru_all()
	{
		$this->db->select('absensi_id,absensi_nis,siswa_nama,kelas_nama,kelas_tahun,absensi_keterangan,absensi_waktu, guru_nama');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_absensi.absensi_kodeguru', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_absensi.absensi_kelas', 'left');
      	//$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->where('absensi_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
      	$this->db->where('absensi_semester', $this->konfigurasi_m->konfig_semester_client());
      		
		return $this->db->count_all_results();
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

    public function get_datasiswa_absensi($id)
	{
		
		
		$this->db->select('absensi_id,absensi_nis,siswa_kelas, absensi_keterangan,absensi_waktu');
        $this->db->from($this->table);
        $this->db->join('raport_guru', 'raport_guru.guru_kode = raport_absensi.absensi_kodeguru', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_absensi.absensi_kelas', 'left');
      	//$this->db->join('raport_siswa', 'raport_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_absensi.absensi_nis', 'left');
		$this->db->where($this->primary_id, $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function statusabsensi() {

        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query('SELECT * FROM raport_hakabsensi WHERE hakabsensi_kodeguru="'.$this->session->userdata('user_login').'" AND hakabsensi_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND hakabsensi_status="1"');
        //$query = $this->db->get();
        
        return $query->row();
    
	}

	public function statusabsensi_cek($kelas) {

        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user
        $query = $this->db->query('SELECT * FROM raport_hakabsensi WHERE hakabsensi_kodeguru="'.$this->session->userdata('user_login').'" AND hakabsensi_tahunajaran="'.$this->konfigurasi_m->konfig_tahun_client().'" AND hakabsensi_kelas="'.$this->db->escape_str($kelas).'" AND hakabsensi_status="1"');
        //$query = $this->db->get();
        
       

        if ($query->num_rows() > 0)
        {
          return 1;
        } else {
        	return 0;
        }
    
	}

	public function ajax_multiple_delete_absensi($ids){
         
       $count = 0;
        foreach ($ids as $id){
           $did = intval($id).'<br>';
            $this->db->where($this->primary_id, $did);
            $this->db->delete($this->table);  
            $count = $count+1;
       }
        
       		 $data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;

            if ($this->input->get_post('ids') == '') {
            	$data['inputerror'][] = 'absensi_hapus';
            	$data['error_string'][] = ' <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data yang akan dihapus !!!.';
	            $data['status'] = FALSE;
	        	echo json_encode($data);
       		} else {
       		   $data['inputerror'][] = 'absensi_hapus';
               $data['sukses_string'][] = '<i class="fa fa-check"></i> <strong>Successfully: </strong> Sebanyak <strong>'. $count.'</strong> data berhasil dihapus.';
               $data['status'] = TRUE;
	         echo json_encode($data);
	         exit();
       		}
       
        
        
        
        $count = 0;
}




	





}
