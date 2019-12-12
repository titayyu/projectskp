<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Jenis
class Jenis extends CI_Controller
{
    // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_model'); // Memanggil Jenis_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman jenis
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
        $this->load->view('jenis/jenis_list'); // Menampilkan halaman jenis (program studi)
		$this->load->view('footer_list'); // Menampilkan bagian footer
    }
	
	// Fungsi JSON
	public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_model->json();
    }
	
	
	// Fungsi menampilkan form Create Jenis
    public function create(){
	  // Jika session data username tidak ada maka akan dialihkan kehalaman login			
	 if (!isset($this->session->userdata['username'])) {
		redirect(base_url("login"));
	 }
	 
	 // Menampilkan data berdasarkan id-nya yaitu username
	 $row = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'=> 'Tita Jaya',
			'username' => $row->username,
			'email'    => $row->email,
			'level'    => $row->level,
		);	
		
	 // Menampung data yang diinputkan	
     $data = array(
        'button' => 'Create',
		'back'   => site_url('jenis'),
        'action' => site_url('jenis/create_action'),
	    'id_jenis' => set_value('id_jenis'),
	    'kode_jenis' => set_value('kode_jenis'),
		'nama_jenis' => set_value('nama_jenis'),
	 );
	 
     $this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
	 $this->load->view('jenis/jenis_form', $data); // Menampilkan halaman utama yaitu form jenis
	 $this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form jenis belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form jenis telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
			'id_jenis' => $this->input->post('id_jenis',TRUE),
			'kode_jenis' => $this->input->post('kode_jenis',TRUE),
			'nama_jenis' => $this->input->post('nama_jenis',TRUE),
		);
           
          $this->Jenis_model->insert($data); 
          $this->session->set_flashdata('message', 'Create Record Success');
          redirect(site_url('jenis'));
        }
    }
    
	// Fungsi menampilkan form Update jenis
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
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);	
		// Menampilkan data berdasarkan id-nya yaitu id_jenis
        $row = $this->Jenis_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data jenis ditampilkan ke form edit jenis
        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('jenis'),
                'action' => site_url('jenis/update_action'),
				'id_jenis' => set_value('id_jenis', $row->id_jenis),
				'kode_jenis' => set_value('kode_jenis', $row->kode_jenis),
				'nama_jenis' => set_value('nama_jenis', $row->nama_jenis),
				);
			
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('jenis/jenis_form', $data); // Menampilkan form jenis
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	 
		
		// Jika form jenis belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } 
		// Jika form jenis telah diisi dengan benar 
		// maka sistem akan melakukan update data jenis kedalam database
		else {
            $data = array(
			'id_jenis' => $this->input->post('id_jenis',TRUE),
			'kode_jenis' => $this->input->post('kode_jenis',TRUE),
			'nama_jenis' => $this->input->post('nama_jenis',TRUE),
			);

            $this->Jenis_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $row = $this->Jenis_model->get_by_id($id);
		
		
        
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
	$this->form_validation->set_rules('kode_jenis', 'kode jenis', 'trim|required');
	$this->form_validation->set_rules('nama_jenis', 'nama jenis', 'trim|required');

	$this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis.php */
/* Location: ./application/controllers/Jenis.php */
/* Please DO NOT modify this information : */
?>