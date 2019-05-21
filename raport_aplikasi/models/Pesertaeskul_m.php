<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesertaeskul_M extends MY_Model {

	protected $table = 'raport_pesertaeskul';
	protected $column = array('pesertaeskul_id','pesertaeskul_nis','siswa_nama','eskul_nama','kelas_nama','pesertaeskul_status'); //set column field database for order and search
	protected $order = array('pesertaeskul_id' => 'desc'); // default order 
	protected $primary_id = 'pesertaeskul_id';
	protected $_primary_key = 'pesertaeskul_id';
	protected $_table_name = 'raport_pesertaeskul';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('konfigurasi_m');
	}

	 public function _get_datatables_query()
	{
		$this->db->select('pesertaeskul_id,pesertaeskul_nis,siswa_nama,siswa_kelas,kelas_nama,kelas_tahun,pesertaeskul_status,pesertaeskul_status, eskul_nama, kelas_kk');
        $this->db->from($this->table);
        $this->db->join('raport_eskul', 'raport_eskul.eskul_id = raport_pesertaeskul.pesertaeskul_dataeskul', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_pesertaeskul.pesertaeskul_kelas', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_pesertaeskul.pesertaeskul_nis', 'left');

      	if ($this->session->userdata('user_level') == 5) {
			$this->db->where('pesertaeskul_tahunajaran', $this->konfigurasi_m->konfig_tahun());
		} else {
			$this->db->where('pesertaeskul_tahunajaran', $this->konfigurasi_m->konfig_tahun_client());
		}
      	
      	//$this->db->where('pesertaeskul_semester', $this->konfigurasi_m->konfig_semester());
      	
		$i = 0;
		
		foreach ($this->column as $item) // loop column 
		{
			
			if(!empty($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('pesertaeskul_dataeskul', $_POST['columns'][5]['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					$this->db->like('siswa_kelas', $_POST['columns'][4]['search']['value']);
					$this->db->like('pesertaeskul_dataeskul', $_POST['columns'][5]['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			$column[$i+1] = $item; // set column array variable to order processing
			$i++;

		}

		if (!empty($_POST['columns'][4]['search']['value'])) {
				

				$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
					if (!empty($_POST['columns'][5]['search']['value'])) {
						$this->db->where('pesertaeskul_dataeskul', $_POST['columns'][5]['search']['value']);
				
					}
					$this->db->group_end(); //close bracket

			

			} elseif (!empty($_POST['columns'][5]['search']['value'])) {
				
				
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->where('pesertaeskul_dataeskul', $_POST['columns'][5]['search']['value']);
					if (!empty($_POST['columns'][4]['search']['value'])) {
						$this->db->where('siswa_kelas', $_POST['columns'][4]['search']['value']);
				
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

    public function get_data_eskul() {
        $query = $this->db->query('SELECT eskul_id, eskul_nama FROM raport_eskul WHERE eskul_tahunajaran="'.$this->konfigurasi_m->konfig_tahun().'" AND eskul_status=1 AND eskul_kategori=2 ORDER BY eskul_id asc');
        
        if ($query->num_rows() > 0) return $query->result();              
    }

    public function get_datapeserta_eskul($id)
	{
		
		
		$this->db->select('pesertaeskul_id,pesertaeskul_nis,siswa_kelas,pesertaeskul_status,pesertaeskul_dataeskul');
        $this->db->from($this->table);
        $this->db->join('raport_eskul', 'raport_eskul.eskul_id = raport_pesertaeskul.pesertaeskul_dataeskul', 'left');
        //$this->db->join('raport_kelas', 'raport_kelas.kelas_code = raport_pesertaeskul.pesertaeskul_kelas', 'left');
      	$this->db->join('(SELECT siswa_nis, siswa_nama, siswa_kelas, kelas_nama, kelas_tahun, kelas_kk FROM raport_siswa LEFT JOIN raport_kelas ON raport_kelas.kelas_code = raport_siswa.siswa_kelas) as data_siswa', 'data_siswa.siswa_nis = raport_pesertaeskul.pesertaeskul_nis', 'left');
		$this->db->where($this->primary_id, $id);
		$query = $this->db->get();

		return $query->row();
	}


	





}
