<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Transaksi</a></li>
        <li class="active"><?php echo $button ?> Transaksi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Form input dan edit transaksi-->
			<legend><?php echo $button ?> Transaksi</legend>		 
			<form role="form" class="form-horizontal"  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label class="col-sm-2" for="char">ID Transaksi</label>
					<div class="col-sm-4">
						<input type="text"   class="form-control" name="id_transaksi" id="id_transaksi" placeholder="id_transaksi" value="<?php echo $id_transaksi; ?>" />
						<?php echo form_error('id_transaksi'); ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Kode Transaksi</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" placeholder="kode_transaksi" value="<?php echo $kode_transaksi; ?>" />
						<?php echo form_error('kode_transaksi') ?>
					</div>
				</div>	

				<div class="form-group"> 
					<label class="col-sm-2" for="int">ID Pelanggan</label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT id_pelanggan,nama_pelanggan FROM pelanggan');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_pelanggan] = $dropdown->nama_pelanggan;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_pelanggan',$finalDropDown , $id_pelanggan, 
								    'class="form-control" id="id_pelanggan"'); 	
							  echo form_error('id_pelanggan') 
						  ?> 
					</div>
				</div>

				<div class="form-group"> 
					<label class="col-sm-2" for="int">Nama Pelanggan</label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT id_pelanggan,nama_pelanggan FROM pelanggan');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_pelanggan] = $dropdown->nama_pelanggan;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_pelanggan',$finalDropDown , $id_pelanggan, 
								    'class="form-control" id="id_jenis"'); 	
							  echo form_error('nama_pelanggan') 
						  ?> 
					</div>
				</div>

				<div class="form-group"> 
					<label class="col-sm-2" for="int">ID Produk</label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT id_produk,nama_produk FROM produk');
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_produk] = $dropdown->nama_produk;
									}
								  $finalDropDown = array_merge(array("" => "-- Pilihan --"), $dropDownList); 
							  echo  form_dropdown('id_produk',$finalDropDown , $id_produk, 
								    'class="form-control" id="id_produk"'); 	
							  echo form_error('id_produk') 
						  ?> 
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2"  for="varchar">Deskripsi Transaksi </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="deskripsi_transaksi" id="deskripsi_transaksi" placeholder="deskripsi_transaksi" value="<?php echo $deskripsi_transaksi; ?>" />
						<?php echo form_error('deskripsi_transaksi') ?>
					</div>
				</div>
					
				<div class="form-group">
					<label class="col-sm-2" for="varchar">Jumlah</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="jumlah" value="<?php echo $jumlah; ?>" />
						<?php echo form_error('jumlah') ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2" for="varchar">Total</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="total" id="total" placeholder="total" value="<?php echo $total; ?>" />
						<?php echo form_error('total') ?>
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
					<a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
				</form>  