<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajenne Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">LKP</li>
        <li class="active">Upload Data LKP</li>
        <li class="active">Finalisasi Data LKP</li>
        <li class="active">Daftar LKP</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
        <!-- tabel data diri pegawai dan penilai -->
        <table class="table table-bordered table-striped" id="">
				<tr>
						<th width="30px">No</th>
						<th >PEJABAT PENILAI</th>
						<th width="30px">No</th>
						<th >PEGAWAI YANG DINILAI</th>	
				</tr>
				<tr>
						<td width="30px"><center>1</center></td>
						<td >Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Saifuddin, S.Sos.I.,M.Pd</td>
						<td width="30px"><center>1</center></td>
						<td >Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Drs. Subki</td>
				</tr>
				<tr>
						<td width="30px"><center>2</center></td>
						<td >NIP&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;196705222001121001</td>
						<td width="30px"><center>2</center></td>
						<td >NIP&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;196808051993031003</td>
				</tr>
				<tr>
						<td width="30px"><center>3</center></td>
						<td >Pangkat/Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Penata / (IIIc)</td>
						<td width="30px"><center>3</center></td>
						<td >Pangkat/Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Pengatur / (IV/a)</td>
				</tr>
				<tr>
						<td width="30px"><center>4</center></td>
						<td >Jabatan&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Kasubbag. Organisasi dan Tata Laksana</td>
						<td width="30px"><center>4</center></td>
						<td >Jabatan&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;:&nbsp;Kasubbag. Organisasi dan Kepegawaian</td>
				</tr>
				<tr>
						<td width="30px"><center>5</center></td>
						<td >Unit Kerja&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Bagian Organisasi dan Kepegawaian</td>
						<td width="30px"><center>5</center></td>
						<td >Unit Kerja&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Biro BAUK Polipangkep</td>
				</tr>
			</table>
      <legend>Daftar LKP</legend>
			 <!-- Menampilkan data pelanggan secara detail -->
			 <table class="table table-striped table-bordered">
       <tr><td width="30px"><center>No</center></td><td><center>Laporan</center></td><td><center>Tahun</center></td><td><center>Status</center></td><td><center>Action</center></td></tr>
       <tr><td width="30px"><center>1</center></td><td><center>Laporan LKP</center></td><td><center>2019</center></td>
       <td><center>Disetujui</center></td><td><center><a class="btn btn-sm btn-default" data-toggle="Lkp" data-target="#modal_add_new"> Update Berkas</a></center></td></tr>
       <tr><td width="30px"><center>2</center></td><td><center>Laporan LKP</center></td><td><center>2020</center></td>
       <td><center>Disetujui</center></td><td><center><a class="btn btn-sm btn-default" data-toggle="Lkp" data-target="#modal_add_new"> Update Berkas</a></center></td></tr>
       <tr><td width="30px"><center>3</center></td><td><center>Laporan LKP</center></td><td><center>2021</center></td>
       <td><center>Belum Disetujui</center></td><td><center><?php if($_SESSION['level'] == 'manager'){}else{echo anchor(site_url('Lkp'), 'Update Berkas', 'class="btn-sm btn-primary"');} ?></center></td></tr>
      
			 </table>
      
	  
	  