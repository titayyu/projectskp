<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SalesTrend_model extends CI_Model
{
   
    // bagian properti   
    public $table = 'salestrend';
    
   // konstrutor    
   function __construct()
    {
        parent::__construct();
    }

   function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    function getByYears(){
        return $this->db->query("SELECT tanggal, SUM(jumlah_transaksi) as jumlah_transaksi FROM `salestrend` GROUP BY tanggal")->result_array();
    }

}
