<?php
class MY_Model extends CI_Model
{

    /**
     * Raport Model Variabel For PHP Server Side
     *
     */
    protected $_table_name     = '';
    protected $_primary_key    = '';
    protected $_primary_filter = 'intval';
    protected $_order_by       = '';
    public $rules              = array();
    protected $_timestamps     = false;

    /**
     * Raport Model Variabel For AJAX Server Side
     *
     */
    protected $table      = '';
    protected $column     = array(); //set column field database for order and search
    protected $order      = array(); // default order
    protected $primary_id = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('tanggal');
    }

    /**
     * Raport Model For ALL
     * @author Ofani Dariyan <ofanidariyan@hotmail.com>
     * @copyright Copyright (c) 2015 through 2016, Ofani Dariyan (20 December 2015)
     */

    /**
     * Raport Function Model Variabel For PHP Server Side
     *
     */
    public function get($id = null, $single = false)
    {

        if ($id != null) {
            $filter = $this->_primary_filter;
            $id     = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }

        if (!count($this->db->qb_orderby)) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = false)
    {
        $this->db->where($where);
        return $this->get(null, $single);
    }

    public function kirim($data, $id = null)
    {

        // Set timestamps
        if ($this->_timestamps == true) {
            $datawaktu        = $this->tanggal->time_now();
            $now              = date('Y-m-d H:i:s');
            $data['created']  = $datawaktu;
            $data['modified'] = $datawaktu;
        }

        // Insert
        if ($id === null) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = null;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id     = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->insert($this->_table_name);
        }

        return $id;
    }

    public function save_data($data, $id = null)
    {

        // Set timestamps
        if ($this->_timestamps == true) {
            $datawaktu              = $this->tanggal->time_now();
            $now                    = date('Y-m-d H:i:s');
            $id || $data['created'] = $datawaktu;
            $data['modified']       = $datawaktu;
        }

        // Insert
        if ($id === null) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = null;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id     = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }

    /**
     * Raport Function Model Variabel For AJAX Server Side
     *
     */

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {

        $this->db->from($this->table);
        $this->db->where($this->primary_id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where($this->primary_id, $id);
        $this->db->delete($this->table);
    }

    public function ajax_multiple_delete($ids)
    {

        $count = 0;
        foreach ($ids as $id) {
            $did = intval($id) . '<br>';
            $this->db->where($this->primary_id, $did);
            $this->db->delete($this->table);
            $count = $count + 1;
        }

        if ($this->input->get_post('ids') == '') {
            echo '<div class="alert alert-danger alert-dismissable error-hapus fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data yang akan dihapus !!!</div><div class="tutup-mapel-hr"> <hr><div>';
        } else {
            echo '<div class="alert alert-success alert-dismissable error-hapus fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Sebanyak <strong>' . $count . '</strong> data berhasil dihapus.</div><div class="tutup-mapel-hr"> <hr><div>';
        }

        $count = 0;
    }

    public function ajax_multiple_delete_hakmapel($ids)
    {

        $count = 0;
        foreach ($ids as $id) {
            $did = intval($id) . '<br>';

            if ($this->input->get_post('ids') == '') {
                '';
            } else {
                if ($this->get_status_kirim($id) == 2) {

                    if ($count != 0) {

                        echo '<div class="alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Sebanyak <strong>' . $count . '</strong> data berhasil dihapus.</div><div class="tutup-mapel-hr"><div>';
                        echo '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data Tidak Bisa Dihapus, <b>Karena Status Nilai Sudah Terkirim !!!</b> (Proses Multiple Delete Data Berikutnya Dihentikan)</div><div class="tutup-mapel-hr"> <hr><div>';

                    } else {
                        echo '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Data Tidak Bisa Dihapus, <b>Karena Status Nilai Sudah Terkirim !!!</b> (Proses Multiple Delete Data Berikutnya Dihentikan)</div><div class="tutup-mapel-hr"><hr><div>';

                    }

                    exit();

                }
            }

            $this->db->where($this->primary_id, $did);
            $this->db->delete($this->table);
            $count = $count + 1;
        }

        if ($this->input->get_post('ids') == '') {
            echo '<div class="alert alert-danger alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-warning"></i> <strong>Warning: </strong> Anda belum melakukan seleksi data yang akan dihapus !!!</div><div class="tutup-mapel-hr"> <hr><div>';
        } else {
            echo '<div class="alert alert-success alert-dismissable fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <i class="fa fa-check"></i> <strong>Successfully: </strong> Sebanyak <strong>' . $count . '</strong> data berhasil dihapus. </div><div class="tutup-mapel-hr"> <hr><div>';
        }

        $count = 0;
    }

    private function get_status_kirim($id)
    {
        $query = $this->db->query('SELECT haknilai_kirim FROM raport_haknilai WHERE haknilai_id="' . $id . '"');

        if ($query->num_rows() > 0) {
            $row = $query->row();

            $row->haknilai_kirim;

        }

        return $row->haknilai_kirim;

    }

}
