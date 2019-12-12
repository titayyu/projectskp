
	<section class="content-header">
      <h1>
       Tita Jaya
        <small>My Customer My Number One Priority</small>
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
		
		   <!-- Form input dan edit items-->
		   <legend><?php echo $button ?> Daftar Items</legend>	
			<form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
				<label for="varchar">Kode Produk <?php echo form_error('kode_items') ?></label>
				<input type="text" class="form-control" name="kode_items" id="kode_items" placeholder="Kode items" value="<?php echo $kode_items; ?>" />
			</div>
			<div class="form-group">
				<label for="varchar">Nama Produk <?php echo form_error('nama_items') ?></label>
				<input type="text" class="form-control" name="nama_items" id="nama_items" placeholder="Nama items" value="<?php echo $nama_items; ?>" />
			</div>
			<div class="form-group">
				<label for="int">Jenis <?php echo form_error('id_jenis') ?></label>			
				<?php 
					echo combobox('id_jenis','jenis','nama_jenis','id_jenis', $id_jenis);
				?> 	
			</div>
			
			 <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('items') ?>" class="btn btn-default">Cancel</a>
		</form>
		<!--// Form items-->