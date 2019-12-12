<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Jadwal
class Jadwal extends CI_Controller //dilihat dari sini letaknya di folder controller
{
     // Konstruktor			
	function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model'); // Memanggil Jadwal_model yang terdapat pada models
		$this->load->model('Users_model'); // Memanggil Users_model yang terdapat pada models
        $this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('upload'); // Memanggil upload yang terdapat pada helper
		$this->load->library('datatables'); // Memanggil datatables yang terdapat pada library
    }
	
	// Fungsi untuk menampilkan halaman Jadwal
    public function index(){   
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
		
		$this->load->view('header_list', $dataAdm); // Menampilkan bagian header dan object data users 
        $this->load->view('jadwal/jadwal_list'); // Menampilkan halaman utama Jadwal
		$this->load->view('footer_list'); // Menampilkan bagian footer
    }
	
	// Fungsi JSON
	public function json() {
        header('Content-Type: application/json');
        echo $this->Jadwal_model->json();
    }
	
	// Fungsi untuk menampilkan halaman Jadwal secara detail
    public function read($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'=> 'Tita_Jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
		
		// Menampilkan data Jadwal yang ada di database berdasarkan id-nya yaitu id_jadwal
        $row = $this->Jadwal_model->get_by_id($id);
		
		// Jika data Jadwal tersedia maka akan ditampilkan
        if ($row) {
            $data = array(
				'button' => 'Read',
				'back'   => site_url('jadwal'),
				'id_jadwal' => $row->id_jadwal,
				'nama_jadwal' => $row->nama_jadwal,
				'alamat_jadwal' => $row->alamat_jadwal,
				'telp_jadwal' => $row->telp_jadwal,
			);
            $this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			$this->load->view('jadwal/jadwal_read', $data); // Menampilkan halaman detail Jadwal
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika data Jadwal tidak tersedia maka akan ditampilkan informasi 'Record Not Found'
		else {
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
            $this->session->set_flashdata('message', 'Record Not Found');
			$this->load->view('footer'); // Menampilkan bagian footer
            redirect(site_url('jadwal'));
        }
    }
	
	// Fungsi menampilkan form Create Jadwal
    public function create(){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
			'wa'       => 'Web administrator',
			'tita_jaya'=> 'tita_jaya',
			'username' => $rowAdm->username,
			'email'    => $rowAdm->email,
			'level'    => $rowAdm->level,
		);
	  
	  // Menampung data yang diinputkan
      $data = array(
        'button' => 'Create',
		'back'   => site_url('jadwal'),
        'action' => site_url('jadwal/create_action'),
	    'id_jadwal' => set_value('id__jadwal'),
	    'nama_jadwal' => set_value('nama_jadwal'),
	    'alamat_jadwal' => set_value('alamat_jadwal'),
	    'telp_jadwal' => set_value('telp_jadwal'),
	  );
        $this->load->view('header',$dataAdm ); // Menampilkan bagian header dan object data users 	 
        $this->load->view('jadwal/jadwal_form', $data); // Menampilkan halaman form Jadwal
		$this->load->view('footer'); // Menampilkan bagian footer
    }
    
	// Fungsi untuk melakukan aksi simpan data
    public function create_action(){
		
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form Jadwal belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		// Jika form Jadwal telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {	
			// konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder image
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_jadwal')); //nama file photo dirubah menjadi nama berdasarkan id_Jadwal
			$this->upload->initialize($config);
			
			// Jika file photo ada 
			if(!empty($_FILES['photo']['name'])){
				
				if ($this->upload->do_upload('photo')){
					$photo = $this->upload->data();	
					$dataphoto = $photo['file_name'];					
					$this->load->library('upload', $config);		    
					
					$data = array(
						'id_jadwal' => $this->input->post('id_jadwal',TRUE),
						'nama_jadwal' => $this->input->post('nama_jadwal',TRUE),
						'alamat_jadwal' => $this->input->post('alamat_jadwal',TRUE),
						'telp_jadwal' => $this->input->post('telp_jadwal',TRUE),
					); 
					
					$this->Jadwal_model->insert($data);
				}
				
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('jadwal'));			
			}
			// Jika file photo kosong 
			else{		
			
				$data = array(
					'id_jadwal' => $this->input->post('id_jadwal',TRUE),
					'nama_jadwal' => $this->input->post('nama_jadwal',TRUE),
					'alamat_jadwal' => $this->input->post('alamat_jadwal',TRUE),
					'telp_jadwal' => $this->input->post('telp_jadwal',TRUE),	
				);            
				
				$this->Jadwal_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('jadwal'));	
			}
					
        }
    }
    
	// Fungsi menampilkan form Update Jadwal
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
		
		// Menampilkan data berdasarkan id-nya yaitu id_Jadwal
        $row = $this->Jadwal_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data Jadwal ditampilkan ke form edit Jadwal
        if ($row) {
            $data = array(
                'button' => 'Update',
				'back'   => site_url('jadwal'),
                'action' => site_url('jadwal/update_action'),
				'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
				'nama_jadwal' => set_value('nama_jadwal', $row->nama_jadwal),
				'alamat_jadwal' => set_value('alamat_jadwal', $row->alamat_jadwal),
				'telp_jadwal' => set_value('telp_jadwal', $row->telp_jadwal),
			);
		    $this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('jadwal/jadwal_form', $data); // Menampilkan form Jadwal
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
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
		
		// Jika form Jadwal belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
        } 
		// Jika form Jadwal telah diisi dengan benar 
		// maka sistem akan melakukan update data Jadwal kedalam database
		else{	
			// Konfigurasi untuk melakukan upload photo
			$config['upload_path']   = './images/';    //path folder
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diupload jpg|png|jpeg			
			$config['file_name']     = url_title($this->input->post('id_jadwal')); //nama file photo dirubah menjadi nama berdasarkan id_Jadwal
			$this->upload->initialize($config);
		
			
        }
    }
    
	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
    public function delete($id){
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
	
        $row = $this->Jadwal_model->get_by_id($id);
		
		//jika id id_Jadwal yang dipilih tersedia maka akan dihapus
        if ($row) {
			// menghapus data berdasarkan id-nya yaitu id_Jadwal
			if($this->Jadwal_model->delete('jadwal',array('id_jadwal'->$id))){
				
				// menampilkan informasi 'Delete Record Success' setelah data Jadwal dihapus 
				$this->session->set_flashdata('message', 'Delete Record Success');
				
				// menghapus file photo
				unlink("./images/".$row->photo);
			}
			// jika data tidak ada yang dihapus maka akan menampilkan 'Can not Delete This Record !'
			else{
			
				$this->session->set_flashdata('message', 'Can not Delete This Record !');	
			}
            redirect(site_url('jadwal'));				
			
        } 
		//jika id_Jadwal yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }
	
	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
    public function _rules() 
    {
	$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim|required');
	$this->form_validation->set_rules('nama_jadwal', 'nama_jadwal', 'trim|required');
	$this->form_validation->set_rules('alamat_jadwal', 'alamat_jadwal', 'trim|required');
	$this->form_validation->set_rules('telp_jadwal', 'telp_jadwal', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */
/* Please DO NOT modify this information : */