<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajene Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="<?php echo $back ?>">SKP</a></li>
        <li class="active">Create SKP</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="box">        
		<!-- Pegawai dan Pejabat Penilai-->
        <form action="<?php echo $action; ?>" method="post">
		<input type="hidden" class="form-control" name="id_transaksi" id="id_transaksi"  value="<?php echo $id_transaksi; ?>" />

        <div class="box-body">
            <label class="col-sm-2" for="char">Pegawai</label>
                <div class="col-sm-4">
                </div>

            <label class="col-sm-2" for="char">Pejabat Penilai</label>
                <div class="col-sm-4">
                </div>
        </div>

        <div class="box-body">
            <div class="col-sm-2">Nama</div>           
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Saifuddin, S.Sos.I., M.Pd" readonly/>
                </div>
            <div class="col-sm-2">Nama</div>
			    <div class="col-sm-4">
				<input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Drs. Subki" readonly/>
                </div>

            <div class="col-sm-2">NIP</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="196705222001121001" readonly/>
                </div>
            <div class="col-sm-2">NIP</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="196808051993031003" readonly/>
                </div>

            <div class="col-sm-2">Pangkat/Golongan</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Penata / (IIIc)" readonly/>
                </div>
            <div class="col-sm-2">Pangkat/Golongan</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Pembina / (IV/a)" readonly/>
                </div>

            <div class="col-sm-2">Jabatan</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Kasubbag. Organisasi dan Tata Laksana" readonly/>
                </div>
            <div class="col-sm-2">Jabatan</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Kabbag. Organisasi dan Kepegawaian" readonly/>
                </div>

            <div class="col-sm-2">Unit Kerja</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Bagian Organisasi dan Kepegawaian" readonly/>
                </div>
            <div class="col-sm-2">Unit Kerja</div>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Biro AUAK Polipangkep" readonly/>
                </div>
      </div>

        <!-- Tabel tugas jabatan -->       
            <div class="box-body">
            <label class="col-sm-12" for="char">Tugas Jabatan</center></label>

        <div class="box-body">
        <table class="table table-bordered table-striped" id="mytable">
				<thead>
					<tr>
                        <th><center>No</th>
                        <th class="col-sm-2"><center>Kegiatan</th>
                        <th><center>Deskripsi</th>
                        <th><center>AK</th>
                        <th><center>Kuantitas</th>
                        <th><center>Kualitas</th>
                        <th><center>Waktu</th>
                        <th><center>Biaya</th>
                        <th><center>Action</th>
                    </tr>
                </thead>
                <thead class="">
                        <td><center>1</td>
                        <td class="col-sm-2"><center>RKT</td>
                        <td><center>Menyusun Rencana Kegiatan Tahunan (RKT)</td>
                        <td><center>0</td>
                        <td><center>1 Kegiatan</td>
                        <td><center>100</td>
                        <td><center>1 Bulan</td>
                        <td><center>0</td>
                        <td class="col-md-2"><center>
                        <a class="btn btn-social-icon btn-primary" href=""><i class="fa fa-pencil"></i></a>  
                        <a class="btn btn-social-icon btn-danger" href=""><i class="fa fa-remove"></i></a>  
                      </td>
                </thead>
                <thead class="">
                        <td><center>2</td>
                        <td class="col-sm-2"><center>RAB</td>
                        <td><center>Menyusun Rencana Anggaran Biaya (RAB) Sub Bagian</td>
                        <td><center>0</td>
                        <td><center>1 Kegiatan</td>
                        <td><center>100</td>
                        <td><center>1 Bulan</td>
                        <td><center>0</td>
                        <td class="col-md-2"><center>
                        <a class="btn btn-social-icon btn-primary" href=""><i class="fa fa-pencil"></i></a>  
                        <a class="btn btn-social-icon btn-danger" href=""><i class="fa fa-remove"></i></a>  
                      </td>
                </thead>
                <thead class="">
                        <td><center>3</td>
                        <td class="col-sm-2"><center>Pengusulan SK</td>
                        <td><center>Melaksanakan Pengusulan SK Tugas Belajar/Izin Belajar</td>
                        <td><center>0</td>
                        <td><center>60 Usulan SK</td>
                        <td><center>100</td>
                        <td><center>6 Bulan</td>
                        <td><center>0</td>
                        <td class="col-md-2"><center>
                        <a class="btn btn-social-icon btn-primary" href=""><i class="fa fa-pencil"></i></a>  
                        <a class="btn btn-social-icon btn-danger" href=""><i class="fa fa-remove"></i></a>  
                      </td>
                </thead>
        </tbody>
		</table>
        <a class="btn btn-social-icon btn-primary" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus"></i></a></div>
        </div>          

    <!-- Tabel tugas tambahan -->       
            <div class="box-body">
            <label class="col-sm-12" for="char">Tugas Tambahan</center></label>

        <div class="box-body">
        <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th><center>No</th>
                        <th class="col-sm-2"><center>Kegiatan</th>
                        <th class="col-sm-8"><center>Deskripsi</th>
                        <th><center>Action</th>
                    </tr>
                </thead>
                <thead class="">
                        <td><center>1</td>
                        <td class="col-sm-2"><center>Anggota kegiatan</td>
                        <td class="col-sm-8"><center>Menjadi anggota dalam berbagai kegiatan diluar tupoksi</td>
                        <td class="col-md-2"><center>
                        <a class="btn btn-social-icon btn-primary" href=""><i class="fa fa-pencil"></i></a>  
                        <a class="btn btn-social-icon btn-danger" href=""><i class="fa fa-remove"></i></a>  
                      </td>
                </thead>
        </table>
        <a class="btn btn-social-icon btn-primary" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus"></i></a></div>
    </div>
    
    <div class="box-body">
    <center><a href="<?php echo site_url('skp/create') ?>" class="btn btn-primary">Submit</a>
	</form>


    <!-- // Form input dan edit transaksi-->  	
			<!-- ============ MODAL ADD BARANG =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Tugas Tambahan</h3>
            </div>
            <form class="form-horizontal" method="POST">
                <div class="modal-body">
                     
                     <div class="form-group">
                        <label class="col-xs-3">Kegiatan</label>
                        <div class="col-xs-9">
                            <input id="deskripsi_transaksi" name="deskripsi_transaksi" class="form-control" type="text" placeholder="Kegiatan..." required>
                            <?php echo form_error('produk'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-3">Deskripsi</label>
                        <div class="col-xs-9">
                            <input id="deskripsi_transaksi" name="deskripsi_transaksi" class="form-control" type="text" placeholder="Deskripsi kegiatan..." required>
                            <?php echo form_error('deskripsi_transaksi'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >Angka Kredit</label>
                        <div class="col-xs-9">
                            <input id="quantity" name="quantity" class="form-control" type="text" placeholder="Angka kredit..." required>
                            <?php echo form_error('quantity'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >Kuantitas/Output</label>
                        <div class="col-xs-9">
                            <input id="quantity" name="quantity" class="form-control" type="text" placeholder="Kuantitas..." required>
                            <?php echo form_error('quantity'); ?>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="col-xs-3" >Kualitas/Mutu</label>
                        <div class="col-xs-9">
                            <input id="ukuran" name="ukuran" class="form-control" type="text" placeholder="Kualitas..." required>
                            <?php echo form_error('ukuran'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3" >Waktu</label>
                        <div class="col-xs-9">
                            <input id="harga" name="harga" class="form-control" type="text" placeholder="Waktu..." required>
                            <?php echo form_error('harga'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3" >Biaya</label>
                        <div class="col-xs-9">
                            <input id="harga" name="harga" class="form-control" type="text" placeholder="Biaya..." required>
                            <?php echo form_error('harga'); ?>
                        </div></div></div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="simpan" aria-hidden="true">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!--END MODAL ADD BARANG-->
        </div>
			<!-- /.box-body -->
			<div class="box-footer">
				<center>E-Kinerja <a href="http://www.polipangkep.ac.id"><strong>Polipangkep</strong></a> - 2021</center>
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
		<strong>Copyright &copy; 2021 <a href="https://adminlte.io">Politeknik Negeri Pangkajene Kepulauan</a>.</strong> All rights
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
