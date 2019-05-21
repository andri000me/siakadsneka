<?php
class Datamapel extends Adminraport_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Libralie and Model
        $this->load->model('mapel_m');
        $this->load->model('konfigurasi_m');

    }

    public function index()
    {

        $data       = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        $this->data['tahun_ajaran_admin'] = $dataoption['aktivasi_tahun_ajaran_admin'];
        $this->data['semester_admin']     = $dataoption['aktivasi_semester_admin'];

        //Load Data View Data Mapel
        $this->data['subview'] = 'admin/datamapel/index';
        $this->load->view('admin/admindesain', $this->data);

    }

    public function ajax_list()
    {
        $list = $this->mapel_m->get_datatables();
        $data = array();
        $no   = $this->input->post('start');
        foreach ($list as $mapel) {
            $no++;

            if ($mapel->mapel_status == 1) {
                $status = '<span class="label btn-warning"><i class="glyphicon glyphicon-ok "></i> Active </span>';
            } else {
                $status = '<span class="label btn-success"><i class="glyphicon glyphicon-remove "></i> Not Active </span>';
            }

            $row = array();
            // $row[] = '<input type="checkbox" class="checkboxes" value="1"/>';
            //$row[] = '<input name="checkbox[]" class="checkbox1" type="checkbox" id="checkbox[]"  value="'.$mapel->mapel_id.'">';
            $row[] = $no;
            $row[] = $mapel->mapel_nama;
            $row[] = '<span class="badge label-info label-sm">' . $mapel->mapel_sort . '</span>';
            $row[] = $status;
            //$row[] = $mapel->dob;

            //add html for action
            $row[] = '<a href="javascript:void()" onclick="edit_person(' . "'" . $mapel->mapel_id . "'" . ')" class="btn btn-xs blue"><i class="fa fa-edit"></i> Edit </a> ';

            $data[] = $row;
        }

        $output = array(
            "draw"            => $this->input->post('draw'),
            "recordsTotal"    => $this->mapel_m->count_all(),
            "recordsFiltered" => $this->mapel_m->count_filtered(),
            "data"            => $data,
        );
        //output to json format

        echo json_encode($output);

    }

    public function ajax_edit($id)
    {

        $data = $this->mapel_m->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
        //dump($this->sortdata());

    }

    public function ajax_add()
    {
        $this->_validate();

        $data       = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        $tahun_ajaran_admin = $dataoption['aktivasi_tahun_ajaran_admin'];
        //$semester_admin =  $dataoption['aktivasi_semester_admin'];
        $data = array(
            'mapel_nama'        => htmlspecialchars($this->input->post('mapel_nama')),
            'mapel_tahunajaran' => $tahun_ajaran_admin,
            //'mapel_semester' => $semester_admin,
            'mapel_sort'        => htmlspecialchars($this->input->post('mapel_sort')),
            'mapel_status'      => htmlspecialchars($this->input->post('mapel_status')),
        );
        $this->mapel_m->save($data);
        echo json_encode(array("status" => true));
    }

    public function ajax_update()
    {
        $this->_validate();

        $data       = $this->konfigurasi_m->get_option_data('aktivasi_sistem');
        $dataoption = stripslashes($data['option_data']);
        $dataoption = unserialize($data['option_data']);

        $tahun_ajaran_admin = $dataoption['aktivasi_tahun_ajaran_admin'];
        //$semester_admin =  $dataoption['aktivasi_semester_admin'];
        $data = array(
            'mapel_nama'        => htmlspecialchars($this->input->post('mapel_nama')),
            'mapel_tahunajaran' => $tahun_ajaran_admin,
            //'mapel_semester' => $semester_admin,
            'mapel_sort'        => htmlspecialchars($this->input->post('mapel_sort')),
            'mapel_status'      => htmlspecialchars($this->input->post('mapel_status')),

        );
        $this->mapel_m->update(array('mapel_id' => $this->input->post('mapel_id')), $data);
        echo json_encode(array("status" => true));
    }

    public function ajax_delete($id)
    {
        $this->mapel_m->delete_by_id($id);
        echo json_encode(array("status" => true));
    }

    public function ajax_multiple_delete()
    {
        $ids = (explode(',', $this->input->get_post('ids')));
        $this->mapel_m->ajax_multiple_delete($ids);
    }

    private function sortdata()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user

        $id = $this->input->post('mapel_id');
        $this->db->where('mapel_sort', $this->input->post('mapel_sort'));
        !$id || $this->db->where('mapel_id !=', $id);
        $this->db->where('mapel_tahunajaran =', $this->konfigurasi_m->konfig_tahun());
        //$this->db->where('mapel_semester =', $this->konfigurasi_m->konfig_semester());
        $sort = $this->mapel_m->get();

        return $sort;
    }

    private function mapeldata()
    {
        // Do NOT validate if email already exists
        // UNLESS it's the email for the current user

        $id = $this->input->post('mapel_id');
        $this->db->where('mapel_nama', $this->input->post('mapel_nama'));
        !$id || $this->db->where('mapel_id !=', $id);
        $this->db->where('mapel_tahunajaran =', $this->konfigurasi_m->konfig_tahun());
        //$this->db->where('mapel_semester =', $this->konfigurasi_m->konfig_semester());
        $mapelnama = $this->mapel_m->get();

        return $mapelnama;
    }

    private function _validate()
    {
        $data                 = array();
        $data['error_string'] = array();
        $data['inputerror']   = array();
        $data['status']       = true;

        if (count($this->mapeldata())) {
            $data['inputerror'][]   = 'mapel_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Data mapel <b>' . $this->input->post('mapel_nama') . '</b> sudah tersedia.';
            $data['status']         = false;
        }

        $expr = '/^[1-9][0-9]*$/';
        if (preg_match($expr, $this->input->post('mapel_sort')) == false && trim($this->input->post('mapel_sort') !== '') && trim($this->input->post('mapel_sort') !== null)) {
            $data['inputerror'][]   = 'mapel_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong> Data mapel sort harus diisi dengan <b> format angka</b>.';
            $data['status']         = false;
        }

        if (count($this->sortdata())) {
            $data['inputerror'][]   = 'mapel_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Data mapel sort angka <b>' . $this->input->post('mapel_sort') . '</b> sudah digunakan.';
            $data['status']         = false;
        }

        if ($this->input->post('mapel_nama') == '') {
            $data['inputerror'][]   = 'mapel_nama';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>nama mapel</b>.';
            $data['status']         = false;
        }

        if ($this->input->post('mapel_sort') == '') {
            $data['inputerror'][]   = 'mapel_sort';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>mapel sort</b>.';
            $data['status']         = false;
        }

        if ($this->input->post('mapel_status') == '') {
            $data['inputerror'][]   = 'mapel_status';
            $data['error_string'][] = '<i class="fa fa-warning"></i> <strong>Warning: </strong>Anda belum menginput data <b>mapel status</b>.';
            $data['status']         = false;
        }

        if ($data['status'] === false) {
            echo json_encode($data);
            exit();
        }
    }

}
