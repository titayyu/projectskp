
<section class="content-header">
      <h1>
        E-KINERJA 
        <small>POLIPANGKEP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Izin Kehadiran Pegawai</a></li>
        <li class="active"><?php echo $button ?> Izin Kehadiran Pegawai</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Form input dan edit Produk-->
		<legend><?php echo $button ?> Izin Kehadiran Pegawai</legend>
        <form role="form" class="form-horizontal" action="<?php echo $action; ?>" method="post">
    <input type="hidden" class="form-control" name="id_produk" id="id_produk"  value="<?php echo $id_produk; ?>" />

        <div class="form-group">
              <label class="col-sm-2" for="char">NIK Pegawai</label>
              <div class="col-sm-4">
                <input type="text"   class="form-control" name="id_produk" id="id_produk" placeholder="id_produk" value="<?php echo $id_produk; ?>" />
                <?php echo form_error('id_produk'); ?>
              </div>
            </div>
        
        <div class="form-group"> 
					<label class="col-sm-2" for="int">Kategori Izin</label>
					<div class="col-sm-4">
						 <?php 
							   $query = $this->db->query('SELECT id_kategori,nama_kategori FROM kategori'); 
							   $dropdowns = $query->result();
							   foreach($dropdowns as $dropdown) {
									   $dropDownList[$dropdown->id_kategori] = $dropdown->nama_kategori;
									} 
								  $finalDropDown = $dropDownList; 
							  echo  form_dropdown('id_kategori',$finalDropDown , $id_kategori, 
									'class="form-control" id="id_kategori"'); 	
									// print_r($finalDropDown);
							  echo form_error('id_kategori') 
						  ?> 
					</div>
        </div>

        <div class="form-group">
          <div class="col-sm-2"><label for="varchar">Alasan Izin <?php echo form_error('nama_produk') ?></label></div>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" />
            </div>
        </div>
        
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- // Form input dan edit Produk-->  