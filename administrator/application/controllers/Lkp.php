<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

// Deklarasi pembuatan class Pelanggan
class Lkp extends CI_Controller //dilihat dari sini letaknya di folder controller
{
	// Konstruktor			
	function __construct()
	{
		parent::__construct();
		$this->load->model('Lkp_model'); // Memanggil Pelanggan_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('upload'); // Memanggil upload yang terdapat pada helper
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
	}

	
	public function index()
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

		$this->load->view('header_list', $dataAdm); // Menampilkan bagian header dan object data users 
		$this->load->view('Lkp/Lkp_list'); // Menampilkan halaman utama pelanggan
		$this->load->view('footer_list'); // Menampilkan bagian footer
	}

	// Fungsi JSON
	public function json()
	{
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		
		header('Content-Type: application/json');
		echo $this->Pelanggan_model->json($rowAdm->level);
	}

	// Fungsi untuk menampilkan halaman pelanggan secara detail
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
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampilkan data pelanggan yang ada di database berdasarkan id-nya yaitu id_pelanggan
		$row = $this->Pelanggan_model->get_by_id($id);

		// Jika data pelanggan tersedia maka akan ditampilkan
		if ($row) {
			$data = array(
				'button' => 'Read',
				'back'   => site_url('pelanggan'),
				'id_pelanggan' => $row->id_pelanggan,
				'nama' => $row->nama,
				'alamat' => $row->alamat,
				'telp' => $row->telp,
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->load->view('Lkp/Lkp_read', $data); // Menampilkan halaman detail pelanggan
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika data pelanggan tidak tersedia maka akan ditampilkan informasi 'Record Not Found'
		else {
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->session->set_flashdata('message', 'Record Not Found');
			$this->load->view('footer'); // Menampilkan bagian footer
			redirect(site_url('Lkp'));
		}
	}

	// Fungsi menampilkan form Create Pelanggan
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
			'back'   => site_url('pelanggan'),
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampung data yang diinputkan
		$data = array(
			'button' => 'Create',
			'action' => site_url('Lkp/create_action'),
			'id_pelanggan' => set_value('id_pelanggan'),
			'nama' => set_value('nama'),
			'alamat' => set_value('alamat'),
			'telp' => set_value('telp'),
		);
		$this->db->select_max('id_pelanggan');
		$data['b'] = $this->db->get('pelanggan')->row_array();
		$data['a'] = intval($data['b']['id_pelanggan']) + 1;
		// var_dump($data['a']);

		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 	 
		$this->load->view('Lkp/Lkp_form', $data); // Menampilkan halaman form pelanggan
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
					 'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
					 'nama' => $this->input->post('nama',TRUE),
					 'alamat' => $this->input->post('alamat',TRUE),
					 'telp' => $this->input->post('telp',TRUE),
					 );
			
			 $this->Pelanggan_model->insert($data);
			 $this->session->set_flashdata('message', 'Create Record Success');
			 redirect(site_url('Lkp'));
		 }
	 }
	// Fungsi menampilkan form Update Pelanggan
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
		$this->db->select_max('id_pelanggan');
		$data['b'] = $this->db->get('pelanggan')->row_array();

		// Menampilkan data berdasarkan id-nya yaitu id_pelanggan
		$row = $this->Pelanggan_model->get_by_id($id);

		// Jika id-nya dipilih maka data pelanggan ditampilkan ke form edit pelanggan
		if ($row) {
			$data = array(
				'button' => 'Update',
				'back'   => site_url('Lkp'),
				'action' => site_url('Lkp/update_action'),
				'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
				'nama' => set_value('nama', $row->nama),
				'alamat' => set_value('alamat', $row->alamat),
				'telp' => set_value('telp', $row->telp),
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
			$this->load->view('Lkp/Lkp_form', $data); // Menampilkan form pelanggan
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('Lkp'));
		}
	}

	// Fungsi untuk melakukan aksi update data
	public function update_action()
	{

		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	 			

		// Jika form pelanggan belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_pelanggan', TRUE));
		}
		// Jika form pelanggan telah diisi dengan benar 
		// maka sistem akan melakukan update data pelanggan kedalam database
		else {
			// Konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_pelanggan')); //nama file photo dirubah menjadi nama berdasarkan id_pelanggan
			$this->upload->initialize($config);

			// Jika file photo ada 
			if (!empty($_FILES['photo']['name'])) {

				// Menghapus file image lama
				unlink("./images/" . $this->input->post('photo'));

				// Upload file image baru
				if ($this->upload->do_upload('photo')) {
					$photo = $this->upload->data();
					$dataphoto = $photo['file_name'];
					$this->load->library('upload', $config);

					// Menampung data yang diinputkan
					$data = array(
						'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
						'nama' => $this->input->post('nama', TRUE),
						'alamat' => $this->input->post('alamat', TRUE),
						'telp' => $this->input->post('telp', TRUE),
					);

					$this->Pelanggan_model->update($this->input->post('id_pelanggan', TRUE), $data);
				}

				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('Lkp'));
			}
			// Jika file photo kosong 
			else {
				// Menampung data yang diinputkan
				$data = array(
					'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
					'nama' => $this->input->post('nama', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'telp' => $this->input->post('telp', TRUE),
				);

				$this->Pelanggan_model->update($this->input->post('id_pelanggan', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('Lkp'));
			}
		}
	}

	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
	public function delete($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$row = $this->Pelanggan_model->get_by_id($id);

		//jika id id_pelanggan yang dipilih tersedia maka akan dihapus
		if ($row) {
            $this->Pelanggan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Lkp'));
        } 
		// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Lkp'));
        }
	}

	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
	public function _rules()
	{
		$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'telp', 'trim|required');
		$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
/* Please DO NOT modify this information : */
