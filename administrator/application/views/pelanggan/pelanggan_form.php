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
		
			<!-- Form input dan edit Pelanggan-->
			<legend><?php echo $button ?> Pelanggan</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<input type="hidden"  class="form-control" name="photo" id="photo" value="<?php echo $photo; ?>" />
				<div class="form-group">
					<label class="col-sm-2" for="char">ID Pelanggan</label>
					<div class="col-sm-4">
						<input type="text"   class="form-control" name="id_pelanggan" id="id_pelanggan" placeholder="id_pelanggan" value="<?php echo $id_pelanggan; ?>" />
						<?php echo form_error('id_pelanggan'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
						<?php echo form_error('nama') ?>
					</div>
				</div>	
						
				
				<div class="form-group">
					<label class="col-sm-2"  for="varchar">Alamat </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
						<?php echo form_error('alamat') ?>
					</div>
				</div>
					
				
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Telp </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
						<?php echo form_error('telp') ?>
					</div>
				</div>
					
				
					 
				<div class="form-group"> 
					<label class="col-sm-2" for="int">Jenis Pelanggan</label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT id_jenis,nama_jenis FROM jenis'); 
							   $dropdowns = $query->result();
							//    print_r($dropdowns);
							   foreach($dropdowns as $dropdown) {
								//    print_r($dropdown);
									   $dropDownList[$dropdown->id_jenis] = $dropdown->nama_jenis;
									} 
								  $finalDropDown = $dropDownList; 
							  echo  form_dropdown('id_jenis',$finalDropDown , $id_jenis, 
									'class="form-control" id="id_jenis"'); 	
									// print_r($finalDropDown);
									// print_r($id_jenis);
							  echo form_error('id_jenis') 
						  ?> 
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2" for="photo">Photo</label>
						<div class="col-sm-4">
							<?php
								if($photo==""){
									echo"<p class='help-block'>Silahkan upload foto pelanggan </p>";
								}
								else{
							?>
									<div>			
										<img src="<?php echo base_url()?>images/<?php echo $photo; ?>">
									</div><br />
							<?php
								}
							?>
							<input type="file" name="photo" id="photo">							
						</div>
				</div>	
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a>
				</form>  