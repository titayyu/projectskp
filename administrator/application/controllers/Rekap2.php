<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Informasi
class Rekap2 extends CI_Controller
{
     // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Rekap2_model'); // Memanggil Fasilitas_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library         
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }

    public function index(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$data = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'=> 'Tita Jaya',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);		
		$this->load->view('header_list',$data); // Menampilkan bagian header dan object data users 
        $this->load->view('rekap2/rekap2_list'); // Menampilkan halaman utama fasilitas
		$this->load->view('footer_list'); // Menampilkan bagian footer
    } 
    
	// Fungsi JSON
    public function json() {
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);

        header('Content-Type: application/json');
        echo $this->Rekap2_model->json($row->level);
    }
	
	/*
    public function read($id) 
    {
        $row = $this->Fasilitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_fasilitas' => $row->id_fasilitas,
		'nama_fasilitas' => $row->nama_fasilitas,
		'icon_fasilitas' => $row->icon_fasilitas,
	    );
            $this->load->view('fasilitas/fasilitas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitas'));
        }
    }
	*/
	
	// Fungsi menampilkan form Create fasilitas
    public function create() {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
				'wa'       => 'Web administrator',
				'tita_jaya'=> 'Tita Jaya',
				'back'     => site_url('rekap2'),
				'username' => $rowAdm->username,
				'email'    => $rowAdm->email,
				'level'    => $rowAdm->level,
		);	
		
		// Menampung data yang diinputkan		
        $data = array(
            'button' => 'Create',
            'action' => site_url('rekap2/create_action'),
			'id_fasilitas' => set_value('id_fasilitas'),
			'nama_fasilitas' => set_value('nama_fasilitas'),
			'icon_fasilitas' => set_value('icon_fasilitas'),
		);
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('rekap2/rekap2_form', $data); // Menampilkan form  fasilitas
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		
       // Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form fasilitas belum diisi dengan benar 
		// maka sistem akan meminta admin untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form fasilitas telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
					'id_fasilitas' => $this->input->post('id_fasilitas',TRUE),
					'nama_fasilitas' => $this->input->post('nama_fasilitas',TRUE),
					'icon_fasilitas' => $this->input->post('icon_fasilitas',TRUE),
					);
           
            $this->Fasilitas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rekap2'));
        }
    }
    
	// Fungsi menampilkan form fasilitas
    public function update($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
				'wa'       => 'Web administrator',
				'tita_jaya'=> 'Tita Jaya',
				'back'   => site_url('informasi'),
				'username' => $rowAdm->username,
				'email'    => $rowAdm->email,
				'level'    => $rowAdm->level,
		);	
		
		// Menampilkan data berdasarkan id-nya yaitu id_fasilitas
        $row = $this->Rekap2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('rekap2'),
                'action' => site_url('rekap2/update_action'),
				'id_fasilitas' => set_value('id_fasilitas', $row->id_fasilitas),
				'nama_fasilitas' => set_value('nama_fasilitas', $row->nama_fasilitas),
				'icon_fasilitas' => set_value('icon_fasilitas', $row->icon_fasilitas),
			);
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('rekap2/rekap2_form', $data); // Menampilkan form  fasilitas
			$this->load->view('footer'); // Menampilkan bagian footer
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekap2'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		
        // Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	 
		
		// Jika form fasilitas belum diisi dengan benar 
		// maka sistem akan meminta admin untuk menginput ulang	
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_fasilitas', TRUE));
        } 
		// Jika form fasilitas telah diisi dengan benar 
		// maka sistem akan melakukan update data fasilitas kedalam database
		else {
            $data = array(
						'id_fasilitas' => $this->input->post('id_fasilitas',TRUE),
						'nama_fasilitas' => $this->input->post('nama_fasilitas',TRUE),
						'icon_fasilitas' => $this->input->post('icon_fasilitas',TRUE),
						);

            $this->Rekap2_model->update($this->input->post('id_fasilitas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rekap2'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $row = $this->Rekap2_model->get_by_id($id);
		
		//jika id_fasilitas yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Rekap2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rekap2'));
        } 
		// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekap2'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('id_fasilitas', 'id fasilitas', 'trim|required');
	$this->form_validation->set_rules('nama_fasilitas', 'nama fasilitas', 'trim|required');
	$this->form_validation->set_rules('icon_fasilitas', 'icon fasilitas', 'trim|required');

	$this->form_validation->set_rules('id_fasilitas', 'id_fasilitas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fasilitas.php */