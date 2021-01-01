<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

// Deklarasi pembuatan class Kategori
class Kategori extends CI_Controller 
{
	// Konstruktor			
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model'); // Memanggil kategori_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('upload'); // Memanggil upload yang terdapat pada helper
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
	}

	
	public function index()
	{
			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(
			'wa'       => 'Web administrator',
			'tita_jaya' => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		$this->load->view('header_list', $dataAdm); 
		$this->load->view('kategori/kategori_list'); 
		$this->load->view('footer_list'); 
	}

	// Fungsi JSON
	public function json()
	{
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);

		header('Content-Type: application/json');
		echo $this->Kategori_model->json($rowAdm->level);
	}

	// Fungsi untuk menampilkan halaman kategori secara detail
	public function read($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(
			'wa'       => 'Web administrator',
			'tita_jaya' => 'Tita_Jaya',
			'back'     => site_url('kategori'),
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampilkan data kategori yang ada di database berdasarkan id-nya yaitu id_kategori
		$row = $this->Kategori_model->get_by_id($id);

		// Jika data kategori tersedia maka akan ditampilkan
		if ($row) {
			$data = array(
				'button' => 'Read',
				'back'   => site_url('kategori'),
				'id_kategori' => $row->id_kategori,
				'nama_kategori' => $row->nama_kategori,
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->load->view('kategori/kategori_read', $data); // Menampilkan halaman detail kategori
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika data kategori tidak tersedia maka akan ditampilkan informasi 'Record Not Found'
		else {
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->session->set_flashdata('message', 'Record Not Found');
			$this->load->view('footer'); // Menampilkan bagian footer
			redirect(site_url('kategori'));
		}
	}

	// Fungsi menampilkan form Create kategori
	public function create()
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(
			'wa'       => 'Web administrator',
			'tita_jaya' => 'tita_jaya',
			'back'   => site_url('kategori'),
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampung data yang diinputkan
		$data = array(
			'button' => 'Create',
			'action' => site_url('kategori/create_action'),
			'id_kategori' => set_value('id_kategori'),
			'nama_kategori' => set_value('nama_kategori'),
		);

		$this->db->select_max('id_kategori');
		$data['b'] = $this->db->get('kategori')->row_array();
		$data['a'] = intval($data['b']['id_kategori']) + 1;

		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 	 
		$this->load->view('kategori/kategori_form', $data); // Menampilkan halaman form kategori
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
					 'id_kategori' => $this->input->post('id_kategori',TRUE),
					 'nama_kategori' => $this->input->post('nama_kategori',TRUE),
					 );
			
			 $this->Kategori_model->insert($data);
			 $this->session->set_flashdata('message', 'Create Record Success');
			 redirect(site_url('kategori'));
		 }
	 }

	// Fungsi menampilkan form Update kategori
	public function update($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(
			'wa'       => 'Web administrator',
			'tita_jaya' => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampilkan data berdasarkan id-nya yaitu id_kategori
		$row = $this->Kategori_model->get_by_id($id);

		// Jika id-nya dipilih maka data kategori ditampilkan ke form edit kategori
		if ($row) {
			$data = array(
				'button' => 'Update',
				'back'   => site_url('kategori'),
				'action' => site_url('kategori/update_action'),
				'id_kategori' => set_value('id_kategori', $row->id_kategori),
				'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
			$this->load->view('kategori/kategori_form', $data); // Menampilkan form kategori
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kategori'));
		}
	}

	// Fungsi untuk melakukan aksi update data
	public function update_action(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	
		
		// Jika form kategori belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang       
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } 
		// Jika form kategori telah diisi dengan benar 
		// maka sistem akan melakukan update data kategori kedalam database
		else {
            $data = array(
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori'));
        }
    }
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
	public function delete($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$row = $this->Kategori_model->get_by_id($id);

		//jika id id_detail_transaksi yang dipilih tersedia maka akan dihapus
		if ($row) {
			// menghapus data berdasarkan id-nya yaitu id_detail_transaksi
			if ($this->Kategori_model->delete($id) > 0) {

				// menampilkan informasi 'Delete Record Success' setelah data detailTransaksi dihapus 
				$this->session->set_flashdata('message', 'Delete Record Success');
			}
			// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
			else {

				$this->session->set_flashdata('message', 'Can not Delete This Record !');
			}
			redirect(site_url('kategori'));
		}
		//jika id_detail_transaksi yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kategori'));
		}
	}

	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
	public function _rules()
	{
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
