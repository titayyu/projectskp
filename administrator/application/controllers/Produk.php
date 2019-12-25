<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Produk
class Produk extends CI_Controller
{
     // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model'); // Memanggil Produk_model yang terdapat pada models
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
			'tita_jaya'     => 'Tita Jaya',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);		
		$this->load->view('header_list',$data); // Menampilkan bagian header dan object data users 
        $this->load->view('produk/produk_list');  // Menampilkan halaman utama produk list
		$this->load->view('footer_list'); // Menampilkan bagian footer
    } 
    
	// Fungsi JSON
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produk_model->json();
    }
	
	// Fungsi menampilkan form Create produk 
    public function create(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'     => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);	
		
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
			'back'   => site_url('produk'),
			'id_produk' => set_value('id_produk'),
			'id_kategori' => set_value('id_kategori'),
			'nama_produk' => set_value('nama_produk'),
		);
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('produk/produk_form', $data); // Menampilkan halaman form produk
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		
        // Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form produk belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form produk telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
	    );
           
            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produk'));
        }
    }
    
	// Fungsi menampilkan form Update Produk
    public function update($id){
		
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'     => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);	
		
		// Menampilkan data berdasarkan id-nya yaitu id_produk
        $row = $this->Produk_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data produk ditampilkan ke form edit
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
				'back'   => site_url('produk'),
				'id_produk' => set_value('id_produk', $row->id_produk),
				'id_kategori'=> set_value('id_kategori', $row->id_kategori),
				'nama_produk' => set_value('nama_produk', $row->nama_produk),
				);
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('produk/produk_form', $data); // Menampilkan form produk
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	
		
		// Jika form produk belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang       
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } 
		// Jika form produk telah diisi dengan benar 
		// maka sistem akan melakukan update data produk kedalam database
		else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'id_kategori'=> $this->input->post('id_kategori',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
	    );

            $this->Produk_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produk'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $row = $this->Produk_model->get_by_id($id);
		
		//jika id produk yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produk'));
        } 
		//jika id produk yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules(){
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id katgeori', 'trim|required');
	$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');

	$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */