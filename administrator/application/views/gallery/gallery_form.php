<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajene Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo $back ?>">Persetujuan SKP</a></li>
        <li class="active">Create Persetujuan SKP</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
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
                        <th><center>Kegiatan</th>
                        <th><center>Deskripsi</th>
                        <th><center>Angka Kredit</th>
                        <th><center>Kuantitas</th>
                        <th><center>Kualitas</th>
                        <th><center>Waktu</th>
                        <th><center>Biaya</th>
                    </tr>
                </thead>
                <thead class="">
                        <td><center>1</td>
                        <td><center>RKT</td>
                        <td><center>Menyusun Rencana Kegiatan Tahunan (RKT)</td>
                        <td><center>0</td>
                        <td><center>1 Kegiatan</td>
                        <td><center>100</td>
                        <td><center>1 Bulan</td>
                        <td><center>0</td>
                        
                </thead>
                <thead class="">
                        <td><center>2</td>
                        <td><center>RAB</td>
                        <td><center>Menyusun Rencana Anggaran Biaya (RAB) Sub Bagian</td>
                        <td><center>0</td>
                        <td><center>1 Kegiatan</td>
                        <td><center>100</td>
                        <td><center>1 Bulan</td>
                        <td><center>0</td>
                        
                </thead>
                <thead class="">
                        <td><center>3</td>
                        <td><center>Pengusulan SK</td>
                        <td><center>Melaksanakan Pengusulan SK Tugas Belajar/Izin Belajar</td>
                        <td><center>0</td>
                        <td><center>60 Usulan SK</td>
                        <td><center>100</td>
                        <td><center>6 Bulan</td>
                        <td><center>0</td>
                        
                </thead>
        </tbody>
		</table>
        </div>
        </div>          

    <!-- Tabel tugas tambahan -->       
            <div class="box-body">
            <label class="col-sm-12" for="char">Tugas Tambahan</center></label>

        <div class="box-body">
        <table class="table table-bordered table-striped" id="mytable">
                <thead>
                    <tr>
                        <th><center>No</th>
                        <th><center>Kegiatan</th>
                        <th><center>Deskripsi</th>
                        <th><center>Angka Kredit</th>
                        <th><center>Kuantitas</th>
                        <th><center>Kualitas</th>
                        <th><center>Waktu</th>
                        <th><center>Biaya</th>
                    </tr>
                </thead>
                <thead class="">
                        <td><center>1</td>
                        <td><center>Anggota kegiatan</td>
                        <td><center>Menjadi anggota dalam berbagai kegiatan diluar tupoksi</td>
                        <td><center>0</td>
                        <td><center>0</td>
                        <td><center>0</td>
                        <td><center>0</td>
                        <td><center>0</td>
                        
                </thead>
        </table>

        <div class="pull-left">
        </div>
    </div>
    
    <div class="box-body">
        <div class="pull-right">
	    <a href="<?php echo site_url('gallery') ?>" class="btn btn-primary">Setujui</a>

        </div>
    </div>

    <div class="box-body">
        <div class="">
            <div class="col-sm-13">
                <input type="text" class="form-control" name="id_transaksi" id="transaksi_id" placeholder="" 
                value="Belum Disetujui" readonly/>
                </div> 
    </div>
	</form>				
    </body>
</html>