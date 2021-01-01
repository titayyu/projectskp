<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Informasi
class Jadwal extends CI_Controller
{
     // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model'); // Memanggil Jadwal_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library         
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }

    public function index(){		
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$data = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'=> 'Tita Jaya',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);		
	
		$this->load->view('header_list',$data); // Menampilkan bagian header dan object data users 
        $this->load->view('jadwal/jadwal_list'); // Menampilkan halaman utama jadwal
		$this->load->view('footer_list'); // Menampilkan bagian footer
    } 
    
	// Fungsi JSON
    public function json() {

		$row = $this->Users_model->get_by_id($this->session->userdata['username']);
		
        header('Content-Type: application/json');
        echo $this->Jadwal_model->json($row->level);
    }
	
	
	
	// Fungsi menampilkan form Create jadwal
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
				'back'     => site_url('jadwal'),
				'username' => $rowAdm->username,
				'email'    => $rowAdm->email,
				'level'    => $rowAdm->level,
		);	
		
		// Menampung data yang diinputkan		
        $data = array(
            'button' => 'Create',
            'action' => site_url('jadwal/create_action'),
			'id_jadwal' => set_value('id_jadwal'),
			'nama_jadwal' => set_value('nama_jadwal'),
			'alamat_jadwal' => set_value('alamat_jadwal'),
			'telp_jadwal' => set_value('telp_jadwal'),
			'tanggal_jadwal' => set_value('tanggal_jadwal'),
		);
		
		$data['uuid'] = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
		mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
	);
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('jadwal/jadwal_form', $data); // Menampilkan form  jadwal
		$this->load->view('footer'); // Menampilkan bagian footer
    }

	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		
       // Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form jadwal belum diisi dengan benar 
		// maka sistem akan meminta admin untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form jadwal telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
					'id_jadwal' => $this->input->post('id_jadwal',TRUE),
					'nama_jadwal' => $this->input->post('nama_jadwal',TRUE),
					'alamat_jadwal' => $this->input->post('alamat_jadwal',TRUE),
					'telp_jadwal' => $this->input->post('telp_jadwal',TRUE),
					'tanggal_jadwal' => $this->input->post('tanggal_jadwal',TRUE),
					);
           
            $this->Jadwal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jadwal'));
        }
    }
    
	// Fungsi menampilkan form jadwal
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
		
		// Menampilkan data berdasarkan id-nya yaitu id_jadwal
        $row = $this->Jadwal_model->get_by_id($id);
		// echo json_encode($id);die;
        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('jadwal'),
                'action' => site_url('jadwal/update_action'),
				'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
				'nama_jadwal' => set_value('nama_jadwal', $row->nama_jadwal),
				'alamat_jadwal' => set_value('alamat_jadwal', $row->alamat_jadwal),
				'telp_jadwal' => set_value('telp_jadwal', $row->telp_jadwal),
				'tanggal_jadwal' => set_value('tanggal_jadwal', $row->tanggal_jadwal),
			);
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('jadwal/jadwal_form', $data); // Menampilkan form  jadwal
			$this->load->view('footer'); // Menampilkan bagian footer
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		
        // Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	 
		
		// Jika form jadwal belum diisi dengan benar 
		// maka sistem akan meminta admin untuk menginput ulang	
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
        } 
		// Jika form jadwal telah diisi dengan benar 
		// maka sistem akan melakukan update data jadwal kedalam database
		else {
            $data = array(
						'id_jadwal' => $this->input->post('id_jadwal',TRUE),
						'nama_jadwal' => $this->input->post('nama_jadwal',TRUE),
						'alamat_jadwal' => $this->input->post('alamat_jadwal', TRUE),
						'telp_jadwal' => $this->input->post('telp_jadwal', TRUE),
						'tanggal_jadwal' => $this->input->post('tanggal_jadwal', TRUE),
						);

            $this->Jadwal_model->update($this->input->post('id_jadwal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jadwal'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $row = $this->Jadwal_model->get_by_id($id);
		
		//jika id jadwal yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jadwal'));
        } 
		// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('id_jadwal', 'id jadwal', 'trim|required');
	$this->form_validation->set_rules('nama_jadwal', 'nama jadwal', 'trim|required');
	$this->form_validation->set_rules('alamat_jadwal', 'alamat jadwal', 'trim|required');
	$this->form_validation->set_rules('telp_jadwal', 'telp jadwal', 'trim|required');
	$this->form_validation->set_rules('tanggal_jadwal', 'tanggal jadwal', 'trim|required');

	$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jadwal.php */