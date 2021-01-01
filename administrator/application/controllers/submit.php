<?php
//$idtransaksi
//$idpelanggan
//&tanggal

$sql=query(`insert into transaksi(id_transaksi,id_pelanggan,tanggal) values($idtransaksi,$idpelanggan,$tanggal))`)
// (date_format(dd/mm/yy)
try $sql{
    'coba masuk'
}
?>