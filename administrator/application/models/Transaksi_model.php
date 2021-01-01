<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Transaksi_model
class Transaksi_model extends CI_Model
{
   
    // bagian properti   
    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';
    
   // konstrutor    
   function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama transaksi
    function json($level) {
        $this->datatables->select("id_transaksi, p.id_pelanggan, nama nama_pelanggan, t.tanggal");
        $this->datatables->from('transaksi t');
        $this->datatables->join('pelanggan p', 't.id_pelanggan=p.id_pelanggan');

        if ($level=='manager'){
        $this->datatables->add_column('action', anchor(site_url('transaksi/cetak/$1'), '<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>'), 'id_transaksi');
        }

        else {$this->datatables->add_column('action', anchor(site_url('transaksi/cetak/$1'), '<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>'), 'id_transaksi');
        }
        return $this->datatables->generate();
    }

   function get_transaksi(){
       $this->db->select('*');
       $this->db->from('detail_transaksi');
       return $this->db->get()->result();
   }

   function get_list_produk_transaksi_id($id){
       $this->db->select('pd.nama_produk,
       dt.deskripsi_transaksi,
       dt.quantity,
       dt.ukuran,
       dt.harga,
       dt.total');
       $this->db->from('transaksi t');
       $this->db->join('detail_transaksi dt','dt.id_transaksi = t.id_transaksi');
       $this->db->join('produk pd', 'dt.id_produk = pd.id_produk');
       $this->db->where('t.id_transaksi',$id);
       return $this->db->get()->result();
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

    // Menampilkan nama berdasarkan id_pelanggan
    function get_pelanggan_info_by_transaksi_id($id)
    {
        $this->db->select('t.id_transaksi,
        t.id_pelanggan,
        t.tanggal,
        p.nama,
        p.alamat,
        p.telp');
        $this->db->from('transaksi t');
        $this->db->join('pelanggan p', 't.id_pelanggan=p.id_pelanggan');
        $this->db->where('t.id_transaksi', $id);
        return $this->db->get()->row();
    }
    
    // menampilkan jumlah data	
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_transaksi', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->or_like('nama_pelanggan', $q);
        $this->db->or_like('id_produk', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->from($this->table);
			return $this->db->count_all_results();
	}

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_transaksi', $q);
        $this->db->or_like('id_pelanggan', $q);
        $this->db->or_like('nama_pelanggan', $q);
        $this->db->or_like('id_produk', $q);
		$this->db->or_like('tanggal', $q);
		$this->db->limit($limit, $start);
			return $this->db->get($this->table)->result();
	}

    // Menambahkan data kedalam database
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return true;
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