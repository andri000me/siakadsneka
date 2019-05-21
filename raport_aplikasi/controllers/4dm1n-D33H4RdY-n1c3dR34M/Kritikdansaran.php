<?php
class Kritikdansaran extends Adminraport_Controller {

    public function __construct(){
        parent::__construct();
        //Load Libraries and Model
        
    }

    public function lihatdata() {
    	
    	//Load Data View KritikdanSaran Lihat Data
    	$this->data['subview'] = 'admin/kritikdansaran/lihatdata';
    	$this->load->view('admin/admindesain', $this->data);
    	
    }

   

   


    
   
}