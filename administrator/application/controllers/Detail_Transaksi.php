<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

// Deklarasi pembuatan class Transaksi
class Transaksi extends CI_Controller
{
	// Konstruktor			
	function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model'); // Memanggil Transaksi_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url','jupyter_helper')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('upload'); // Memanggil upload yang terdapat pada helper
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
	}

	// Fungsi untuk menampilkan halaman Transaksi
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
		$this->load->view('transaksi/transaksi_list'); // Menampilkan halaman utama transaksi
		$this->load->view('footer_list'); // Menampilkan bagian footer
	}

	// Fungsi JSON
	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Transaksi_model->json();
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

		// Menampilkan data pelanggan yang ada di database berdasarkan id-nya yaitu id_transaksi
		$row = $this->Transaksi_model->get_by_id($id);

		// Jika data transaksi tersedia maka akan ditampilkan
		if ($row) {
			$data = array(
				'button' => 'Read',
				'back'   => site_url('transaksi'),
				'id_transaksi' => $row->id_transaksi,
				'kode_transaksi' => $row->kode_transaksi,
				'deksripsi_transaksi' => $row->deskripsi_transaksi,
				'jumlah' => $row->jumlah,
				'total' => $row->total,
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->load->view('transaksi/transaksi_read', $data); // Menampilkan halaman detail transaksi
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika data transaksi tidak tersedia maka akan ditampilkan informasi 'Record Not Found'
		else {
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->session->set_flashdata('message', 'Record Not Found');
			$this->load->view('footer'); // Menampilkan bagian footer
			redirect(site_url('transaksi'));
		}
	}

	// Fungsi menampilkan form Create transaksi
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
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);

		// Menampung data yang diinputkan
		$data = array(
			'button' => 'Create',
			'back'   => site_url('transaksi'),
			'action' => site_url('transaksi/create_action'),
			'id_transaksi' => set_value('id_transaksi'),
			'kode_transaksi' => set_value('kode_transaksi'),
			'id_pelanggan' => set_value('id_pelanggan'),
			'nama_pelanggan' => set_value('nama_pelanggan'),
			'id_produk' => set_value('id_produk'),
			'deskripsi_transaksi' => set_value('deskripsi_transaksi'),
			'jumlah' => set_value('jumlah'),
			'total' => set_value('total'),
		);

		$this->db->select_max('id_detail_transaksi');
		$data['b'] = $this->db->get('detail_transaksi');
		if($data['b']->num_rows() == 0){
			$data['abc'] = 1000;
		}
		else{
			$data['abc'] = intval($data['b']->row_array()['id_detail_transaksi']) + 1;
		}
		$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 	 
		$this->load->view('transaksi/transaksi_form', $data); // Menampilkan halaman form transaksi
		$this->load->view('footer'); // Menampilkan bagian footer
	}

	// Fungsi untuk melakukan aksi simpan data
	public function create_action()
	{

		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$this->_rules(); // Rules atau aturan bahwa setiap form harus diisi

		// Jika form pelanggan belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		}
		// Jika form pelanggan telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {
			// konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder image
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_transaksi')); //nama file photo dirubah menjadi nama berdasarkan id_pelanggan
			$this->upload->initialize($config);

			// Jika file photo ada 
			if (!empty($_FILES['photo']['name'])) {

				if ($this->upload->do_upload('photo')) {
					$photo = $this->upload->data();
					$dataphoto = $photo['file_name'];
					$this->load->library('upload', $config);

					$data = array(
						'id_transaksi' => $this->input->post('id_transaksi', TRUE),
						'kode_transaksi' => $this->input->post('kode_transaksi', TRUE),
						'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
						'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
						'id_produk' => $this->input->post('id_produk', TRUE),
						'deskripsi_transaksi' => $this->input->post('deskripsi_transaksi', TRUE),
						'jumlah' => $this->input->post('jumlah', TRUE),
						'total' => $this->input->post('total', TRUE),
					);

					$this->Transaksi_model->insert($data);
				}

				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('transaksi'));
			}
			// Jika file photo kosong 
			else {

				$data = array(
					'id_transaksi' => $this->input->post('id_transaksi', TRUE),
					'kode_transaksi' => $this->input->post('kode_transaksi', TRUE),
					'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
					'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
					'id_produk' => $this->input->post('id_produk', TRUE),
					'deskripsi_transaksi' => $this->input->post('deskripsi_transaksi', TRUE),
					'jumlah' => $this->input->post('jumlah', TRUE),
					'total' => $this->input->post('total', TRUE),
				);

				$this->Transaksi_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('transaksi'));
			}
		}
	}

	// Fungsi menampilkan form Update transaksi
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

		// Jika id-nya dipilih maka data transaksi ditampilkan ke form edit pelanggan
		if ($row) {
			$data = array(
				'button' => 'Update',
				'back'   => site_url('transaksi'),
				'action' => site_url('transaksi/update_action'),
				'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
				'kode_transaksi' => set_value('kode_transaksi', $row->kode_transaksi),
				'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
				'nama_pelanggan' => set_value('nama_pelanggan', $row->nama_pelanggan),
				'id_produk' => set_value('id_produk', $row->id_produk),
				'deskripsi_transaksi' => set_value('deskripsi_transaksi', $row->deskripsi_transaksi),
				'jumlah' => set_value('jumlah', $row->jumlah),
				'total' => set_value('total', $row->total),
			);

			$data = array(
				'button' => 'Create',
				'back'   => site_url('transaksi'),
				'action' => site_url('transaksi/create_action'),
				'id_transaksi' => set_value('id_transaksi'),
				'kode_transaksi' => set_value('kode_transaksi'),
				'id_pelanggan' => set_value('id_pelanggan'),
				'nama_pelanggan' => set_value('nama_pelanggan'),
				'id_produk' => set_value('id_produk'),
				'deskripsi_transaksi' => set_value('deskripsi_transaksi'),
				'jumlah' => set_value('jumlah'),
				'total' => set_value('total'),
			);
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users 
			$this->load->view('transaksi/transaksi_form', $data); // Menampilkan form transaksi
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transaksi'));
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
			$this->update($this->input->post('id_transaksi', TRUE));
		}
		// Jika form transaksi telah diisi dengan benar 
		// maka sistem akan melakukan update data transaksi kedalam database
		else {
			// Konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_transaksi')); //nama file photo dirubah menjadi nama berdasarkan id_transaksi
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
						'photo' => $dataphoto,
						'id_jenis' => $this->input->post('id_jenis', TRUE),
					);

					$this->Transaksi_model->update($this->input->post('id_pelanggan', TRUE), $data);
				}

				$this->session->set_flashdata('message', 'Update Record Success');
				redirect(site_url('pelanggan'));
			}
			// Jika file photo kosong 
			else {
				// Menampung data yang diinputkan

				$data = array(
					'id_transaksi' => $this->input->post('id_pelanggan', TRUE),
					'kode_transaksi' => $this->input->post('kode_transaksi', TRUE),
					'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
					'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
					'id_produk' => $this->input->post('id_produk', TRUE),
					'deskripsi_transaksi' => $this->input->post('deskripsi_transaksi', TRUE),
					'jumlah' => $this->input->post('jumlah', TRUE),
					'total' => $this->input->post('total', TRUE),
				);

				$this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
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

		//jika id id_detail_transaksi yang dipilih tersedia maka akan dihapus
		if ($row) {
			// menghapus data berdasarkan id-nya yaitu id_detail_transaksi
			if ($this->Transaksi_model->delete($id) > 0) {

				// menampilkan informasi 'Delete Record Success' setelah data detailTransaksi dihapus 
				$this->session->set_flashdata('message', 'Delete Record Success');
			}
			// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
			else {

				$this->session->set_flashdata('message', 'Can not Delete This Record !');
			}
			redirect(site_url('transaksi'));
		}
		//jika id_detail_transaksi yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('transaksi'));
		}
	}

	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
	public function _rules()
	{
		$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
		$this->form_validation->set_rules('kode_transaksi', 'kode_transaksi', 'trim|required');
		$this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim|required');
		$this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
		$this->form_validation->set_rules('id_produk', 'id_produk', 'trim|required');
		$this->form_validation->set_rules('deskripsi_transaksi', 'deskripsi_transaksi', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
		$this->form_validation->set_rules('total', 'total', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function analisis($file = "data.csv")
	{
		$isRunning = exec('jupyter nbconvert \analisis\\'.$file.' --to html --no-input --post serve');

		if($isRunning){
			return error_log('jupyter telah dijalankan: ' . $isRunning);
		}
	} 

	public function currentdir()
	{
		return $isRunning = exec("py -m notebook");
		// return $tita;
	} 
}
