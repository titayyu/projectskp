<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Jenis_model
class Jenis_model extends CI_Model
{
	// Property yang bersifat public  
    public $table = 'jenis';
    public $id = 'id_jenis';
    public $order = 'DESC';
	
	// Konstrutor   
    function __construct()
    {
        parent::__construct();
    }

	 // Tabel data dengan nama jenis pelanggan
    function json() {		
        $this->datatables->select('id_jenis, kode_jenis, nama_jenis');
        $this->datatables->from('jenis');       
        $this->datatables->add_column('action', anchor(site_url('jenis/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')." ".anchor(site_url('jenis/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_jenis');
        return $this->datatables->generate();
    }

    // Menampilkan semua data 
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // menampilkan jumlah data	
    function total_rows($q = NULL) {
        $this->db->like('id_jenis', $q);
		$this->db->or_like('kode_jenis', $q);
		$this->db->or_like('nama_jenis', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
		
		$this->db->select('*');
		$this->db->from('jenis');		
        $this->db->order_by($this->id, $this->order);    
		$this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // Menambahkan data kedalam database
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // Menghapus data kedalam database
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Jenis_model.php */
/* Location: ./application/models/Jenis_model.php */
/* Please DO NOT modify this information : */