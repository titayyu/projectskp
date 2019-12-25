
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
        <form action="<?php echo $action; ?>" method="post">
		<input type="hidden" class="form-control" name="id_transaksi" id="id_transaksi"  value="<?php echo $id_transaksi; ?>" />

      <div class="form-group">
              <label class="col-sm-2" for="char">ID Transaksi</label>
              <div class="col-sm-4">
                <input type="text"   class="form-control" name="id_transaksi" id="id_transaksi" placeholder="id_transaksi" value="<?php echo $id_transaksi; ?>" />
                <?php echo form_error('id_transaksi'); ?>
              </div>

        <label class="col-sm-2" for="int">Pelanggan</label>
			<div class="col-sm-4">
				<?php 
					$query = $this->db->query('SELECT id_pelanggan, nama FROM pelanggan'); 
					$dropdowns = $query->result();
					//    print_r($dropdowns);
					foreach($dropdowns as $dropdown) {
					//    print_r($dropdown);
					$dropDownList[$dropdown->id_pelanggan] = $dropdown->nama;
									} 
					$finalDropDown = $dropDownList; 
					echo  form_dropdown('id_kategori',$finalDropDown , $id_pelanggan, 
					'class="form-control" id="id_pelanggan"'); 	
					// print_r($finalDropDown);
					echo form_error('id_pelanggan') 
						  ?> 
			</div>
      </div>
      <br>
    <div class="form-group"> 
			<label class="col-sm-2" for="int">Barang</label>
			<div class="col-sm-4">
				<?php 
					$query = $this->db->query('SELECT * FROM produk'); 
					$dropdowns = $query->result();
					//    print_r($dropdowns);
					foreach($dropdowns as $dropdown) {
					//    print_r($dropdown);
					$dropDownList[$dropdown->id_produk] = $dropdown->nama_produk;
									} 
					$finalDropDown = $dropDownList; 
					echo  form_dropdown('id_produk',$finalDropDown , $id_produk, 
					'class="form-control" id="id_produk"'); 	
					// print_r($finalDropDown);
					echo form_error('id_produk') 
						  ?> 
			</div>
    </div>

    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
        <table class="table table-bordered table-striped" id="mytable">
				<thead>
					<tr>
						<th width="80px">No</th>
						<th>ID Detail Transaksi</th>
						<th>Nama Barang</th>
						<th>Quantity</th>
						<th>Harga</th>
						<th>Total</th>
						<th width="200px">Action</th>
					</tr>
        </thead>
        <tbody>
					<tr>
						<th>1</th>
						<th>iniid</th>
						<th>Kain Sutra</th>
						<th>1</th>
						<th>1.000.000</th>
						<th>1.000.000</th>
						<th width="200px">delete</th>
					</tr>
        </tbody>

			</table>
        
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- // Form input dan edit transaksi-->  