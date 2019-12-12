
<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Produk</a></li>
        <li class="active"><?php echo $button ?> Produk</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Form input dan edit Produk-->
		<legend><?php echo $button ?> Produk</legend>
        <form action="<?php echo $action; ?>" method="post">
		<input type="hidden" class="form-control" name="id_produk" id="id_produk"  value="<?php echo $id_produk; ?>" />
	    <div class="form-group">
            <label for="varchar">Nama Produk <?php echo form_error('nama_produk') ?></label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Deskripsi Produk <?php echo form_error('deskripsi_produk') ?></label>
            <input type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk" placeholder="Deskripsi Produk" value="<?php echo $deskripsi_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- // Form input dan edit Produk-->  