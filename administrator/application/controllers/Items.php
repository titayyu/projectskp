<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Items
class Items extends CI_Controller
{
    // Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Items_model'); // Memanggil Items_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman items
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
        $this->load->view('items/items_list'); // Menampilkan halaman utama items
		$this->load->view('footer_list'); // Menampilkan bagian footer
    }
	
	// Fungsi JSON
	public function json() {
        header('Content-Type: application/json');
        echo $this->Items_model->json();
    }
	
	// Fungsi untuk menampilkan halaman items secara detail
    public function read($id){
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
		
		// Query untuk menampilkan items dan program studinya
		$sql   = "SELECT * FROM kategori, items 
		          WHERE kategori.id_kategori = items.id_kategori
				  AND items.kode_items = '$id'";		
		$row = $this->db->query($sql)->row();			
		
		// Jika data items tersedia maka akan ditampilkan
        if ($row) {
			
            $data = array(
			'button' => 'Read',
			'back'   => site_url(''),
			'kode_items' => $row->kode_items,
			'nama_items' => $row->nama_items,
			'nama_kategori' => $row->nama_kategori,
			);
			
			$this->load->view('header',$dataAdm);
            $this->load->view('items/items_read', $data);
			$this->load->view('footer');
        } 
		// Jika data items tidak tersedia maka akan ditampilkan informasi 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }
	
	// Fungsi menampilkan form Create items
    public function create(){
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
		
		// Menampung data yang diinputkan
        $data = array(
            'button' => 'Create',
			'back'   => site_url('items'),
            'action' => site_url('items/create_action'),
			'kode_items' => set_value('kode_items'),
			'nama_items' => set_value('nama_items'),
			'id_kategori' => set_value('id_kategori'),
		);
		$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 	
        $this->load->view('items/items_form', $data); // Menampilkan halaman form items
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form items belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form items telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
            $data = array(
			'kode_items' => $this->input->post('kode_items',TRUE),
			'nama_items' => $this->input->post('nama_items',TRUE),
			'id_kategori' => $this->input->post('id_kategori',TRUE),
			);
           
            $this->Items_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items'));
        }
    }
    
	// Fungsi menampilkan form Update items
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
		
		// Menampilkan data berdasarkan id-nya yaitu kode_items
        $row = $this->Items_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data items ditampilkan ke form edit items
        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('items'),
                'action' => site_url('items/update_action'),
				'kode_items' => set_value('kode_items', $row->kode_items),
				'nama_items' => set_value('nama_items', $row->nama_items),
				'id_kategori' => set_value('id_kategori', $row->id_kategori),
				);
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 	
            $this->load->view('items/items_form', $data); // Menampilkan form items
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	
		
		// Jika form items belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_items', TRUE));
        } 
		// Jika form items telah diisi dengan benar 
		// maka sistem akan melakukan update data items kedalam database
		else {
            $data = array(
			'kode_items' => $this->input->post('kode_items',TRUE),
			'nama_items' => $this->input->post('nama_items',TRUE),
			'id_kategori' => $this->input->post('id_kategori',TRUE),
			);

            $this->Items_model->update($this->input->post('kode_items', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items'));
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $row = $this->Items_model->get_by_id($id);
		
		//jika id items yang dipilih tersedia maka akan dihapus
        if ($row) {
            $this->Items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items'));
        } 
		//jika id items yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('kode_items', 'kode items', 'trim|required');
	$this->form_validation->set_rules('nama_items', 'nama items', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');

	$this->form_validation->set_rules('kode_items', 'kode_items', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Items.php */
/* Location: ./application/controllers/Items.php */
/* Please DO NOT modify this information : */
?>