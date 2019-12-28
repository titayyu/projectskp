<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model'); // Memanggil Transaksi_model yang terdapat pada transaksi
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada transaksi
		$this->load->library('session');
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('upload'); // Memanggil upload yang terdapat pada helper
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
	}

	// Fungsi untuk menampilkan halaman utama transaksi
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
		$this->load->view('transaksi/transaksi_list');
		$this->load->view('footer_list'); // Menampilkan bagian footer
	}

	// Fungsi JSON
	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Transaksi_model->json();
	}

	// Fungsi untuk menampilkan halaman transaksi secara detail
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
			'tita_jaya' => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampilkan data transaksi yang ada di database berdasarkan id-nya yaitu id_transaksi
		$row = $this->Transaksi_model->get_by_id($id);
		if ($row) {
			$data = array(
				'button' => 'Read',
				'back'   => site_url('transaksi'),
				'id_transaksi' => $row->id_transaksi,
				'id_pelanggan' => $row->id_pelanggan,
				'id_produk' => $row->id_produk,
				'tanggal' => $row->tanggal,
			);

			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->load->view('transaksi/transaksi_read', $data); // Menampilkan halaman detail model
			$this->load->view('footer'); // Menampilkan bagian footer
		} else {
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->session->set_flashdata('message', 'Record Not Found');
			$this->load->view('footer'); // Menampilkan bagian footer
			redirect(site_url('transaksi'));
		}
	}

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
			'tita_jaya' => 'Tita Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		
		$dataTransaksiBarang = array(
			'id_produk' => set_value('id_produk'),
			'jumlah' => set_value('jumlah'),
			'total' => set_value('total'),
		);
		// $this->session->barang_transaksi($dataTransaksiBarang);
		
		$data = array(
			'button' => 'Create',
			'action' => site_url('transaksi/create_action'),
			'back'   => site_url('transaksi'),
			'id_transaksi' => set_value('id_transaksi'),
			'id_pelanggan' => set_value('id_pelanggan'),
			'id_produk' => set_value('id_produk'),
			'tanggal' => set_value('tanggal'),
		);

		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
		$this->load->view('transaksi/transaksi_form', $data); // Menampilkan halaman form transaksi
		$this->load->view('footer'); // Menampilkan bagian footer
	}

	public function create_action()
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

		$this->_rules();

		// Menampung data yang diinputkan
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {

			// konfigurasi untuk melakukan upload photo
			$config['upload_path']   = '../images/';    //path folder image
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('')); //nama file photo dirubah menjadi nama berdasarkan nidn	
			$this->upload->initialize($config);

			// Jika file photo ada 
			if (!empty($_FILES['photo']['name'])) {

				if ($this->upload->do_upload('photo')) {
					$photo = $this->upload->data();
					$dataphoto = $photo['file_name'];
					$this->load->library('upload', $config);

					$data = array(
						'nama_model' => $this->input->post('nama_model', TRUE),
						'photo' => $dataphoto,
					);

					$this->Transaksi_model->insert($data);
				}

				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('transaksi'));
			}
			// Jika file photo kosong 
			else {

				$data = array(
					'nama_model' => $this->input->post('nama_model', TRUE),
				);

				$this->Model_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('model'));
			}
		}
	}

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

		// Menampilkan data berdasarkan id-nya yaitu id_transaksi
		$row = $this->Transaksi_model->get_by_id($id);

		// Jika id-nya dipilih maka data transaksi ditampilkan ke form edit transaksi
		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('transaksi/update_action'),
				'back'   => site_url('transaksi'),
				'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
				'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
				'id_produk' => set_value('id_produk', $row->id_produk),
				'tanggal' => set_value('tanggal', $row->tanggal),
			);

			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
			$this->load->view('transaksi/transaksi_form', $data); // Menampilkan form transaksi
			$this->load->view('footer'); // Menampilkan bagian footer
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transaksi'));
		}
	}

	public function update_action()
	{

		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$this->_rules(); // Rules atau aturan bahwa setiap form harus diisi	 	

		// Jika form  belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_transaksi', TRUE));
		}
		// Jika form telah diisi dengan benar 
		// maka sistem akan melakukan update data  kedalam database
		else {

			// Konfigurasi untuk melakukan upload photo
			$config['upload_path']   = '../images/';    //path folder
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('')); //nama file photo dirubah menjadi nama berdasarkan nidn	
			$this->upload->initialize($config);

			// Jika file photo ada 
			if (!empty($_FILES['photo']['name'])) {

				// Menghapus file image lama
				unlink("../images/" . $this->input->post('photo'));


				// Upload file image baru
				if ($this->upload->do_upload('photo')) {
					$photo = $this->upload->data();
					$dataphoto = $photo['file_name'];
					$this->load->library('upload', $config);

					$data = array(
						'id_transaksi' => $this->input->post('id_transaksi', TRUE),
						'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
						'photo' => $dataphoto,
					);

					$this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
				}

				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('transaksi'));
			}
			// Jika file photo kosong 
			else {
				$data = array(
					'id_transaksi' => $this->input->post('id_transaksi', TRUE),
					'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
					'tanggal' => $this->input->post('tanggal', TRUE),
				);

				$this->Transaksi_model->update($this->input->post('id_pelanggan', TRUE), $data);
				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('transaksi'));
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

		$row = $this->Transaksi_model->get_by_id($id);

		//jika id id_transaksi yang dipilih tersedia maka akan dihapus
		if ($row) {

			// menghapus file photo
			unlink("../images/" . $row->photo);

			$this->Transaksi_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('transaksi'));
		}
		//jika id yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transaksi'));
		}
	}

	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
	public function _rules()
	{
		$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');
		$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-23 06:06:55 */
/* http://harviacode.com */
