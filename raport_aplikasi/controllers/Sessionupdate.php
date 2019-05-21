<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sessionupdate extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        echo 'cek session by : NiceDream and Dee Hardy';
    }

   

}