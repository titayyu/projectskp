
<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Identitas</a></li>
        <li class="active"><?php echo $button ?> Identitas</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Form input dan edit Identitas -->
		<legend><?php echo $button ?> Identitas</legend>	
        <form role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		<input type="hidden"  class="form-control" name="id_identitas" id="id_identitas" value="<?php echo $id_identitas; ?>" />
		<input type="hidden"  class="form-control" name="favicon" id="favicon" value="<?php echo $favicon; ?>" />
	    <div class="form-group">
            <label for="varchar">Nama Pemilik <?php echo form_error('nama_pemilik') ?></label>
            <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Judul Website <?php echo form_error('judul_website') ?></label>
            <input type="text" class="form-control" name="judul_website" id="judul_website" placeholder="Judul Website" value="<?php echo $judul_website; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Meta Deskripsi <?php echo form_error('meta_deskripsi') ?></label>
            <input type="text" class="form-control" name="meta_deskripsi" id="meta_deskripsi" placeholder="Meta Deskripsi" value="<?php echo $meta_deskripsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Meta Keyword <?php echo form_error('meta_keyword') ?></label>
            <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Meta Keyword" value="<?php echo $meta_keyword; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat_website') ?></label>
            <input type="text" class="form-control" name="alamat_website" id="alamat_website" placeholder="Alamat" value="<?php echo $alamat_website; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email_website') ?></label>
            <input type="text" class="form-control" name="email_website" id="email_website" placeholder="Email" value="<?php echo $email_website; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp <?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp_website" id="telp_website" placeholder="Telp" value="<?php echo $telp_website; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Facebook <?php echo form_error('facebook') ?></label>
            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $facebook; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Twitter <?php echo form_error('twitter') ?></label>
            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $twitter; ?>" />
        </div>
	
		<div class="form-group">
			<label for="varchar">Favicon <?php echo form_error('favicon') ?></label>

					<?php
						if($favicon==""){
								echo"<p class='help-block'>Silahkan upload favicon </p>";
						}
						else{
					?>
						<div>			
							<img width="100px" src="../../../images/<?php echo $favicon; ?>">
							
						</div><br />
					<?php
						}
					?>
					<div>	
						<input type="file" name="favicon" id="favicon">	
					</div>		
				
		</div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('identitas') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!--// Form Identitas -->