<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

// Deklarasi pembuatan class Pelanggan_model
class Pelanggan_model extends CI_Model
{
	// Property yang bersifat public   
	public $table = 'pelanggan';
	public $id = 'id_pelanggan';
	public $order = 'DESC';

	// Konstrutor    
	function __construct()
	{
		parent::__construct();
	}

	// Tabel data dengan nama pelanggan
	function json($level)
	{
		$this->datatables->select("id_pelanggan, nama, alamat, telp");
		$this->datatables->from('pelanggan');

		if ($level=='manager'){
			$this->datatables->add_column('action', anchor(site_url('pelanggan/read/$1'), '<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>'), 'id_pelanggan');
		}
		else {$this->datatables->add_column('action', anchor(site_url('pelanggan/read/$1'), '<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>') . "  " . anchor(site_url('pelanggan/update/$1'), '<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>') . "  " . anchor(site_url('pelanggan/delete/$1'), '<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pelanggan');
		}
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
	function total_rows($q = NULL)
	{
		$this->db->like('id_pelanggan', $q);
		$this->db->or_like('id_pelanggan', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('telp', $q);
		$this->db->or_like('id_jenis', $q);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// Menampilkan data dengan jumlah limit
	function get_limit_data($limit, $start = 0, $q = NULL)
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->like('id_pelanggan', $q);
		$this->db->or_like('id_pelanggan', $q);
		$this->db->or_like('nama', $q);
		$this->db->or_like('alamat', $q);
		$this->db->or_like('telp', $q);
		$this->db->or_like('id_jenis', $q);
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

		return $this->db->affected_rows();
	}
}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
/* Please DO NOT modify this information : */
