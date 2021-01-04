<section class="content-header">
      <h1>
        E-KINERJA POLIPANGKEP
        <small>Izin Kehadiran Pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Daftar Items</a></li>
        <li class="active"><?php echo $button ?> Daftar Items</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data items -->   
			<legend><?php echo $button ?> Produk</legend>
			<!-- Button untuk melakukan update -->
			<a href="<?php echo site_url('items/update/'.$kode_items) ?>" class="btn btn-primary">Update</a>
			<!-- Button cancel untuk kembali ke halaman  list -->
			<a href="<?php echo site_url('items') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			<table class="table table-striped table-bordered">
				<tr><td>NIK Pegawai</td><td><?php echo $kode_items; ?></td></tr>
				<tr><td>Alasan Izin</td><td><?php echo $nama_items; ?></td></tr>
				<tr>
					<td>Divisi</td>
					<td><?php echo $id_kategori; ?></td>
				</tr>
					<tr><td></td><td><a href="<?php echo site_url('items') ?>" class="btn btn-default">Cancel</a></td></tr>
			</table>
			<!--// Tampil Data Produk -->  