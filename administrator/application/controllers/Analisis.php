<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Menu
class Analisis extends CI_Controller
{
	// Konstrutor 
    function __construct()
    {
        parent::__construct();
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library       
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
    public function index(){
					
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'     => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		); 
			
		$this->load->view('header_list',$dataAdm); 
        $this->load->view('transaksi/transaksi_analisa'); 
		$this->load->view('footer_list'); 
		
    } 	
	
}

?>