<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Jadwal</a></li>
        <li class="active"><?php echo $button ?> Jadwal</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Jadwal Pelanggan-->
			<legend><?php echo $button ?> Jadwal Pelanggan</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-2" for="char">ID Jadwal Pelanggan</label>
					<div class="col-sm-4">
						<input type="text"   class="form-control" name="id_jadwal" id="id_jadwal" placeholder="ID jadwal" value="<?php echo $id_jadwal; ?>" />
						<?php echo form_error('id_jadwal'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama_jadwal" id="nama_jadwal" placeholder="Nama jadwal" value="<?php echo $nama_jadwal; ?>" />
						<?php echo form_error('nama_jadwal') ?>
					</div>
				</div>	
						
				
				<div class="form-group">
					<label class="col-sm-2"  for="varchar">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat_jadwal" id="alamat_jadwal" placeholder="Alamat jadwal" value="<?php echo $alamat_jadwal; ?>" />
						<?php echo form_error('alamat_jadwal') ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Telp </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="telp_jadwal" id="telp_jadwal" placeholder="Telp_jadwal" value="<?php echo $telp_jadwal; ?>" />
						<?php echo form_error('telp_jadwal') ?>
					</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('jadwal') ?>" class="btn btn-default">Cancel</a>
				</form>  