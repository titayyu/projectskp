<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Transaksi</a></li>
        <li class="active"><?php echo $button ?> Transaksi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data transaksi -->  
			<legend><?php echo $button ?> Transaksi</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('transaksi/update/'.$id_transaksi) ?>" class="btn btn-primary">Update</a>	
			<!-- Button cancel untuk kembali ke halaman transaksi list -->	
			<a href="<?php echo site_url('transaksi') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data transaksi secara detail -->
			 <table class="table table-striped table-bordered">
			 	<tr><td>Kode Transaksi</td><td><?php echo $kode_transaksi; ?></td></tr>
				 <tr><td>ID Pelanggan</td><td><?php echo inputtext('id_pelanggan','pelanggan','nama_pelanggan','id_pelanggan',$id_pelanggan); ?></td></tr>
				 <tr><td>Nama Pelanggan</td><td><?php echo inputtext('id_pelanggan','pelanggan','nama_pelanggan','id_pelanggan',$id_pelanggan); ?></td></tr>
				 <tr><td>ID Produk</td><td><?php echo inputtext('id_produk','produk','nama_produk','id_produk',$id_produk); ?></td></tr>
				<tr><td>Deskripsi Transaksi</td><td><?php echo $deskripsi_transaksi; ?></td></tr>
				<tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
				<tr><td>Total</td><td><?php echo $jumlah; ?></td></tr>
				
			 </table>
