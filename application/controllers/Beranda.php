<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	// Konstruktor	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model'); // Memanggil Informasi_model yang terdapat pada models
		//$this->load->model('Fasilitas_model'); // Memanggil Fasilitas_model yang terdapat pada models
		$this->load->model('Kontak_model'); // Memanggil Kontak_model yang terdapat pada models
		$this->load->library('form_validation'); // Memanggil form_validation yang terdapat pada library 
		$this->load->helper(array('form', 'url')); // Memanggil form dan url yang terdapat pada helper		
		$this->load->helper('my_function'); // Memanggil fungsi my_function yang terdapat pada helper	
    }

	// Fungsi untuk menampilkan halaman utama Beranda
	public function index()
	{	
		// Query identitas 
		$queryTitle = "SELECT judul_website, nama_pemilik, alamat_website, telp_website, email_website, facebook, twitter FROM identitas";		
		$tampilTitle = $this->db->query($queryTitle)->result();
		
		// Query benefit
		$queryFasilitas = "SELECT nama_fasilitas, icon_fasilitas FROM fasilitas";
		$tampilFasilitas = $this->db->query($queryFasilitas)->result();
		
		// Query tentang tentang 
		$queryTentang = "SELECT judul_tentang, isi_tentang, keterangan_tambahan, gambar FROM tentang WHERE aktif = 'Y'";
		$tampilTentang = $this->db->query($queryTentang)->result();
		
		// Query tentang produk
		$queryKategori = "SELECT nama_kategori, deskripsi_kategori, icon FROM kategori";
		$tampilKategori = $this->db->query($queryKategori)->result();
		
		// Query tentang model
		$queryModel = "SELECT nama_model, photo FROM model";
		$tampilModel = $this->db->query($queryModel)->result();
		
		// Query tentang informasi terkini
		$queryInformasi1 = "SELECT informasi.id_informasi, 
		                                 informasi.username, 
										 informasi.judul_informasi, 
										 informasi.isi_informasi, 
										 informasi.tanggal, 
										 informasi.hari, 
										 informasi.gambar,
										 kategori.nama_kategori
								  FROM informasi, kategori 
								  WHERE informasi.id_kategori = kategori.id_kategori
								  AND informasi.aktif='Y' 
								  ORDER BY id_informasi 
								  DESC LIMIT 0,1";
		$tampilInformasi1 = $this->db->query($queryInformasi1)->result();
		
		// Query tentang informasi terkini
		$queryInformasi2 = "SELECT informasi.id_informasi, 
		                                 informasi.username, 
										 informasi.judul_informasi, 
										 informasi.isi_informasi, 
										 informasi.tanggal, 
										 informasi.hari, 
										 informasi.gambar,
										 kategori.nama_kategori
								  FROM informasi, kategori 
								  WHERE informasi.id_kategori = kategori.id_kategori
								  AND informasi.aktif='Y' 
								  ORDER BY id_informasi 
								  DESC LIMIT 1,1";
		$tampilInformasi2 = $this->db->query($queryInformasi2)->result();
		
		// Query gallery
		$queryGallery = "SELECT judul_gallery, gambar FROM gallery WHERE aktif='Y'";
		$tampilGallery = $this->db->query($queryGallery)->result();
				
		$data = array(
						'identitas_data' => $tampilTitle,
						'fasilitas_data' => $tampilFasilitas,	
						'tentang_data' => $tampilTentang,						
						'kategori_data' => $tampilKategori,
						'tampilinformasi1_data' => $tampilInformasi1,
						'tampilinformasi2_data' => $tampilInformasi2,
						'tampilgallery_data' => $tampilGallery,
						'model_data' => $tampilModel,
						'action' => site_url('beranda/create_action'), // untuk melakukan aksi memanggil create_action
						'id_kontak' => set_value('id_kontak'), // memberi nilai pada id_kontak
						'nama' => set_value('nama'), // memberi nilai pada nama
						'email' => set_value('email'), // memberi nilai pada email
						'telp' => set_value('telp'), // memberi nilai pada telp
						'pesan' => set_value('pesan'), // memberi nilai pada pesan
					  );
							
		$this->load->view('beranda',$data);
	}
	
	// Melakukan input data kontak
    public function create_action(){
        $this->_rules();
       
            $data = array(					
					'nama' => $this->input->post('nama',TRUE),
					'email' => $this->input->post('email',TRUE),
					'telp' => $this->input->post('telp',TRUE),
					'pesan' => $this->input->post('pesan',TRUE),
					);
			
            $this->Kontak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('beranda'));
        
    }
    
	// Fungsi rules atau aturan untuk pengisian pada form create
    public function _rules(){
	$this->form_validation->set_rules('id_kontak', 'id kontak', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');

	$this->form_validation->set_rules('id_kontak', 'id_kontak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
