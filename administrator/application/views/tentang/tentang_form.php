<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Tentang</a></li>
        <li class="active"><?php echo $button ?> Tentang</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Form input dan edit Tentang-->
		<legend><?php echo $button ?> Tentang</legend>
        <form role="form" action="<?php echo $action; ?>" method="post" method="post" enctype="multipart/form-data">
		<input type="hidden" class="form-control" name="id_tentang" id="id_tentang" value="<?php echo $id_tentang; ?>" />
		<input type="hidden" class="form-control" name="gambar" id="gambar" value="<?php echo $gambar; ?>" />
	    <div class="form-group">
            <label for="varchar">Judul Tentang<?php echo form_error('judul_tentang') ?></label>
            <input type="text" class="form-control" name="judul_tentang" id="judul_tentang" placeholder="Judul Tentang" value="<?php echo $judul_tentang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Isi <?php echo form_error('isi_tentang') ?></label>
            <input type="text" class="form-control" name="isi_tentang" id="isi_tentang" placeholder="Isi Tentang" value="<?php echo $isi_tentang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan Tambahan <?php echo form_error('keterangan_tambahan') ?></label>
            <input type="text" class="form-control" name="keterangan_tambahan" id="keterangan_tambahan" placeholder="Keterangan Tambahan" value="<?php echo $keterangan_tambahan; ?>" />
        </div>	   
		<div class="form-group">
			 <label for="varchar">Gambar <?php echo form_error('gambar') ?></label>
				<div>
					<?php
						if($gambar==""){
							echo"<p class='help-block'>Silahkan upload gambar pendukung tentang</p>";
						}
						else{
					?>
							<div>			
								<img width="300px" src="../../../images/tentang/<?php echo $gambar; ?>">
							</div><br />
					<?php
								}
					?>
					<input type="file" name="gambar" id="gambar">							
				</div>
		</div>				
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tentang') ?>" class="btn btn-default">Cancel</a>
	</form>
    