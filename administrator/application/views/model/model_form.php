<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Model</a></li>
        <li class="active"><?php echo $button ?> Model</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit Model-->
			<legend><?php echo $button ?> Model</legend>	
        <form role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
		<input type="hidden"  class="form-control" name="id_model" id="id_model" value="<?php echo $id_model; ?>" />
		<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
	    <div class="form-group">
            <label for="varchar">Nama Model <?php echo form_error('nama_model') ?></label>
            <input type="text" class="form-control" name="nama_model" id="nama_model" placeholder="Nama Model" value="<?php echo $nama_model; ?>" />
        </div>
	    
		<div class="form-group">
			<label for="varchar">Photo <?php echo form_error('photo') ?></label>
				<div>
					<?php
						if($photo==""){
							echo"<p class='help-block'>Silahkan upload foto model </p>";
						}
						else{
					?>
							<div>			
								<img src="../../../images/model/<?php echo $photo; ?>">
							</div><br />
					<?php
						}
					?>
					<input type="file" name="photo" id="photo">							
				</div>
		</div>	
				
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('model') ?>" class="btn btn-default">Cancel</a>
	</form>
    