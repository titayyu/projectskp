<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Produk_model
class Produk_model extends CI_Model
{
   
    // bagian properti   
    public $table = 'produk';
    public $id = 'id_produk';
    public $order = 'DESC';
    
   // konstrutor    
   function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama produk
    function json($level) {
        $this->datatables->select("id_produk, id_kategori, nama_produk");
        $this->datatables->from('produk');
        if ($level=='manager'){
            $this->datatables->add_column('action', '-', 'id_produk');
		}
    else { 

        $this->datatables->add_column('action', anchor(site_url('produk/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('produk/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_produk');
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
    function total_rows($q = NULL) {
        $this->db->like('id_produk', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('id_kategori', $q);
		$this->db->or_like('nama_produk', $q);
		$this->db->from($this->table);
			return $this->db->count_all_results();
	}

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_produk', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('id_kategori', $q);
		$this->db->or_like('nama_produk', $q);
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

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */
/* Please DO NOT modify this information : */