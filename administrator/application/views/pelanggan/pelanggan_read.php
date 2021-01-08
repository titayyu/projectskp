<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Pelanggan</a></li>
        <li class="active"><?php echo $button ?> Pelanggan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Tampil Data Pelanggan -->  
			<legend><?php echo $button ?> Pelanggan</legend>
			<!-- Button untuk melakukan update -->
			<?php if($_SESSION['level'] == 'manager'){}else{ echo site_url('pelanggan/update/'.$id_pelanggan);} ?>	
			<!-- Button cancel untuk kembali ke halaman pelanggan list -->	
			<a href="<?php echo site_url('pelanggan') ?>" class="btn btn-warning">Cancel</a>
			<p></p>
			 <!-- Menampilkan data pelanggan secara detail -->
			 <table class="table table-striped table-bordered">
				<tr><td>ID Pelanggan</td><td><?php echo $id_pelanggan; ?></td></tr>
				<tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
				<tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
			 </table>
	  