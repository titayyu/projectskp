
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
                <input type="text"   class="form-control" name="id_transaksi" id="transaksi_id" placeholder="transaksi_id" 
                value="<?= $a; ?>" readonly/>
                <?php echo form_error('id_transaksi'); ?>
              </div>

        <label class="col-sm-2" for="int">Pelanggan</label>
			<div class="col-sm-4">
				<select class="form-control" id="pelanggan" name="pelanggan">
                    <option>Pilih Pelanggan</option>
                    <?php foreach($pelanggan as $row)
                    {
                    ?>
                        <option value="<?php echo $row->id_pelanggan?>"><?php echo $row->nama;?></option>
                    <?php
                    }?>
                </select> 
            </div>
      </div>
      <br>

    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
				<div class="pull-right"><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Tambah Rincian</a></div>  
        <table class="table table-bordered table-striped" id="mytable">
				<thead>
					<tr>
						<th width="80px">No</th>
						<th>Nama Barang</th>
						<th>Deskripsi</th>
                        <th>Quantity</th>
                        <th>Ukuran</th>
						<th>Harga</th>
						<th width="200px">Total</th>
					</tr>
        </thead>
        <tbody id="detail_cart">
            <?php
            $no = 1;
        foreach ($this->cart->contents() as $items) {
            echo '
				<tr>
					<td>'.$no++.'</td>
                    <td>'.$items['name'].'</td>
					<td>'.$items['deskripsi'].'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.$items['ukuran'].'</td>
                    <td>'.$items['price'].'</td>
					<td>'.$items['subtotal'].'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        echo '<tr>
                <th colspan="6">Total</th>
                <th colspan="3">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>';
        ?>

        </tbody>

			</table>
        
	    <button type="submit" class="btn btn-primary">Create</button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- // Form input dan edit transaksi-->  
		
		
			<!-- ============ MODAL ADD BARANG =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Detail Transaksi</h3>
            </div>
            <form class="form-horizontal" method="POST">
                <div class="modal-body">
 
                    <div class="form-group">
                        <!-- <label class="control-label col-xs-3" >ID Detail Transaksi</label> -->
                        <div class="col-xs-8"> 
                            <input id="id_detail_transaksi" name="id_detail_transaksi" class="form-control" value="<?=$uuid?>" type="hidden" placeholder="ID Detail Transaksi..." required>
                            <?php echo form_error('id_detail_transaksi'); ?>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-8">
                        <select class="form-control" id="produk" name="produk" required>
                            <option>Pilih Produk</option>
                            <?php foreach($produk as $row)
                            {
                            ?>
                                <option value="<?php echo $row->id_produk?>"><?php echo $row->nama_produk;?></option>
                            <?php
                            }?>
                        </select> 
                            <?php echo form_error('produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Deskripsi</label>
                        <div class="col-xs-8">
                            <input id="deskripsi_transaksi" name="deskripsi_transaksi" class="form-control" type="text" placeholder="Deskripsi Transaksi..." required>
                            <?php echo form_error('deskripsi_transaksi'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Quantity</label>
                        <div class="col-xs-8">
                            <input id="quantity" name="quantity" class="form-control" type="text" placeholder="Quantity..." required>
                            <?php echo form_error('quantity'); ?>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ukuran</label>
                        <div class="col-xs-8">
                            <input id="ukuran" name="ukuran" class="form-control" type="text" placeholder="Ukuran..." required>
                            <?php echo form_error('ukuran'); ?>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-8">
                            <input id="harga" name="harga" class="form-control" type="text" placeholder="Harga..." required>
                            <?php echo form_error('harga'); ?>
                        </div>
                    </div>
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" id="tutup" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="simpan" aria-hidden="true">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD BARANG-->
        </div>
			<!-- /.box-body -->
			<div class="box-footer">
				<center>E-KINERJA APPLICATION <a href="http://www.titajaya.co.id"><strong>Tita Ayu</strong></a> - 2019</center>
			</div>
			<!-- /.box-footer-->
		  </div>
		  <!-- /.box -->
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->

	  <footer class="main-footer">
		<div class="pull-right hidden-xs">
		  <b>Version</b> 2.4.0
		</div>
		<strong>Copyright &copy; 2019 <a href="https://adminlte.io">Tita Ayu</a>.</strong> All rights
		reserved.
	  </footer>  
	</div>
	<!-- ./wrapper -->
	<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/js/adminlte.min.js') ?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
	<script>
        $(document).ready(function(){
            $('#simpan').click(function(){
                // var transaksi_id = $('#transaksi_id').val();
                // var tgl = $('#tanggal').val();
                var id = $('#id_detail_transaksi').val();
                var deskripsi = $('#deskripsi_transaksi').val();
                var produk = $('#produk').val();
                var qty = $('#quantity').val();
                var ukuran = $('#ukuran').val();
                var harga = $('#harga').val();
                var total = $('#total').val();
                // var pelanggan = $('#pelanggan').val();
                // console.log(pelanggan);
                $.ajax({
                    url: '<?php echo base_url('transaksi/tambah_rincian')?>',
                    type: 'POST',
                    data: {
                        'id': id, 'produk':produk, 'deskripsi': deskripsi, 'qty': qty, 'ukuran': ukuran, 'harga': harga, 'total': total
                    },
                    success: function(res){
                        if(res ==1){
                            window.location.reload()
                        }
                    }
                });
            });
        });
        </script>
	</body>
</html>
