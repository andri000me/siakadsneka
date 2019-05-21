<?php

class Page extends Login_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
       
       
    }

    public function index() {
        
        
       
        // Load the view
        
        //$this->load->view('welcome_message');
    
    	redirect(site_url().'user/login');
    }
    
    


    
}