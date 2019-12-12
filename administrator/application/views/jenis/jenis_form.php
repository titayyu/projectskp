<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Jenis Pelanggan</a></li>
        <li class="active"><?php echo $button ?> Jenis Pelanggan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input atau edit Jenis-->
			<legend><?php echo $button ?> Jenis Pelanggan</legend>	
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">Kode Jenis Pelanggan <?php echo form_error('kode_jenis') ?></label>
					<input type="text" class="form-control" name="kode_jenis" id="kode_jenis" placeholder="Kode Jenis" value="<?php echo $kode_jenis; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Nama Jenis Pelanggan<?php echo form_error('nama_jenis') ?></label>
					<input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Nama Jenis" value="<?php echo $nama_jenis; ?>" />
				</div>
				
				<input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" /> 
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('jenis') ?>" class="btn btn-default">Cancel</a>
			</form>
			<!--// Form Jenis-->