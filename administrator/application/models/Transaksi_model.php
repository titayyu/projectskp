<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Transaksi_model
class Transaksi_model extends CI_Model
{
	// Property yang bersifat public   
    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';
    
	// Konstrutor    
    function __construct()
    {
        parent::__construct();
    }
	
    // Tabel data dengan nama transaksi
    // query relasi antara tabel transaksi --- pelanggan
    // transaksi ---- produk
    function json() {		
        $this->datatables->select("id_transaksi, kode_transaksi, deskripsi_transaksi, jumlah, total");
        $this->datatables->from('transaksi');        
        $this->datatables->add_column('action', anchor(site_url('transaksi/read/$1'),'<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>')."  ".anchor(site_url('transaksi/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('transaksi/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_transaksi');
        return $this->datatables->generate();
    }
	
    // Menampilkan semua data 
      // query relasi antara tabel transaksi --- pelanggan
    // transaksi ---- produk
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // Menampilkan semua data berdasarkan id-nya
      // query relasi antara tabel transaksi --- pelanggan
    // transaksi ---- produk
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // menampilkan jumlah data	
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_transaksi', $q);
        $this->db->or_like('kode_transaksi', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->or_like('nama_pelanggan', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('deskripsi_transaksi', $q);
		$this->db->or_like('jumlah', $q);
		$this->db->or_like('total', $q);
		$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_transaksi', $q);
        $this->db->or_like('kode_transaksi', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->or_like('nama_pelanggan', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('deskripsi_transaksi', $q);
		$this->db->or_like('jumlah', $q);
		$this->db->or_like('total', $q);
		$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */