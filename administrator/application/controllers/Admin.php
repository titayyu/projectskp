<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Admin
class Admin extends CI_Controller {
	
	// Konstrutor 
	function __construct() {
		parent::__construct();
		$this->load->model('Users_model');
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	}
	
	// Fungsi untuk menampilkan halaman utama admin bey kamu lihat ga. lihat
	public function index() {
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$data = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'=> 'TITA JAYA',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);
		$this->load->view('beranda',$data);// Menampilkan halaman utama admin
	} 
	
	// Fungsi melakukan logout
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
/* Please DO NOT modify this information : */
?>