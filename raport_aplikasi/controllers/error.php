<?php
class Error extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        
    }

    public function index(){
    	// Load view
    	//add_meta_title($this->data['article']->title);
       $this->data['header'] = '<meta http-equiv=REFRESH content=3;url='.site_url().'>'; //
         $this->data['judul'] = '404 Not Found'; 
    	$this->data['subview'] = 'error';
    	$this->load->view('errors/html/errorku');
    	
    }


	
}