<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

// Deklarasi pembuatan class Detail_Transaksi_model
class Detail_Transaksi_model extends CI_Model
{
	private $table = 'detail_transaksi';
	private $id = 'id_detail_transaksi';
	private $order = 'DESC';

	// Konstrutor    
	function __construct()
	{
		parent::__construct();
	}

	// Tabel data dengan nama transaksi
	// query relasi antara tabel transaksi --- pelanggan
	// transaksi ---- produk
	function json()
	{
		$this->datatables->select("id_detail_transaksi, id_transaksi,tanggal,id_pelanggan,id_kategori, deskripsi_transaksi, quantity, harga,total");
		$this->datatables->from('detail_transaksi');
		$this->datatables->add_column('action',  anchor(site_url('transaksi/update/$1'), '<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>') . "  " . anchor(site_url('transaksi/delete/$1'), '<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_detail_transaksi');
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
	function total_rows($q = NULL)
	{
		$this->db->like('id_detail_transaksi', $q);
		$this->db->or_like('id_transaksi', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('id_pelanggan', $q);
		$this->db->or_like('id_kategori', $q);
		$this->db->or_like('deskripsi_transaksi', $q);
		$this->db->or_like('quantity', $q);
		$this->db->or_like('harga', $q);
		$this->db->or_like('total', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// Menampilkan data dengan jumlah limit
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('id_detail_transaksi', $q);
		$this->db->or_like('id_transaksi', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->or_like('id_pelanggan', $q);
		$this->db->or_like('id_kategori', $q);
		$this->db->or_like('deskripsi_transaksi', $q);
		$this->db->or_like('quantity', $q);
		$this->db->or_like('harga', $q);
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

		// mengembalikan nilai 1 jika berhasil dan 0 jika gagal
		return $this->db->affected_rows();
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */
