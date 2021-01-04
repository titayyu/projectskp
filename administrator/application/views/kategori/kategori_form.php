<section class="content-header">
      <h1>
        E-KINERJA
        <small>POLIPANGKEP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Kategori</a></li>
        <li class="active"><?php echo $button ?> Kategori</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Form input dan edit Kategori-->
		<legend><?php echo $button ?> Kategori</legend>
        <form action="<?php echo $action; ?>" method="post">
		<input type="hidden" class="form-control" name="id_kategori" id="id_kategori" value="<?php if($button == "Create"){echo $a; }else{ echo $id_kategori ;} ?>" /> 
    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>	
				
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>