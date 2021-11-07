<?php  
Class Dashboard extends CI_Controller{
    
    
    function index(){
        $this->load->view('temp/header');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('temp/footer');
    }
}
?>