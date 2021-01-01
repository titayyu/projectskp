<?php

class Tentang_model extends CI_Model
{
   
   // bagian properti
   
    public $table = 'tentang';
    public $id = 'id_tentang';
    public $order = 'DESC';
    
	// konstrutor
    //****************************   
   function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($level) {
        $this->datatables->select("id_tentang,judul_tentang, IF(aktif = 'Y', 'Aktif', 'Tidak') as status");
        $this->datatables->from('tentang');    
        if ($level=='manager'){
            $this->datatables->add_column('action', '-', 'id_tentang');
		}
    else {    
        $this->datatables->add_column('action', anchor(site_url('tentang/aktif_action/$1'),'<button type="button" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></button>')." ".anchor(site_url('tentang/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('tentang/delete/$1'),'<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_tentang');
    }
        return $this->datatables->generate();
    }

   
   // membaca isi semua rekaman : $this->table
   //*******************************************   
   function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // membaca 1 rekaman menggunakan kunci primary
    //*******************************************  
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // membaca dan menghitung jumlah rekaman
	//*******************************************
    function total_rows($q = NULL) {
        $this->db->like('id_tentang', $q);
	$this->db->or_like('id_tentang', $q);
	$this->db->or_like('judul_tentang', $q);
	$this->db->or_like('isi_tentang', $q);
	$this->db->or_like('keterangan_tambahan', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('aktif', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // memabaca sejemlah rekaman dengan limit 
	//****************************************
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tentang', $q);
	$this->db->or_like('id_tentang', $q);
	$this->db->or_like('judul_tentang', $q);
	$this->db->or_like('isi_tentang', $q);
	$this->db->or_like('keterangan_tambahan', $q);
	$this->db->or_like('gambar', $q);
	$this->db->or_like('aktif', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // menambahkan isi rekaman 
	//*************************************
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // mengubah rekaman
	//************************************
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	// Merubah aktif kedalam database
	public function update_aktif($id) {		
		$query = $this->db->where('id_tentang  ='.$id);		
		$this->db->update($this->table, array('aktif' => 'Y'),$query);		
		return true;
	}
	
	// Merubah tidak aktif kedalam database
	public function update_tidakAktif($id) {		
		$query = $this->db->where('id_tentang   !='.$id);		
		$this->db->update($this->table, array('aktif' => 'N'),$query);		
		return true;
	}
	

    // menghapus rekaman
	//**********************************
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tentang_model.php */
/* Location: ./application/models/Tentang_model.php */