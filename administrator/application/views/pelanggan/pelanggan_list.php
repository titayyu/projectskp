<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajenna Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">LKP</li>
		<li class="active">Input Data LKP</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Menampilkan Data Pelanggan -->
			<div class="row" style="margin-bottom: 10px">
				<div class="col-md-4">
					<h4 style="margin-top:0px">Amriliani Hambali S.Pd, M.Pd</h4>
				</div>
				<!-- Menampilkan Data Pegawai -->
			<table class="table table-bordered table-striped" id="">
				<tr>
						<th width="50px"><center>No</center></th>
						<th >PEJABAT PENILAI</th>
						<th width="50px"><center>No</center></th>
						<th >PEGAWAI YANG DINILAI</th>	
				</tr>
				<tr>
						<td width="50px"><center>1</center></td>
						<td >Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Ir. Miss Rahmayanti, M.Si</td>
						<td width="50px"><center>1</center></td>
						<td >Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Amriliani Hambali S.Pd, M.Pd</td>
				</tr>
				<tr>
						<td width="50px"><center>2</center></td>
						<td >NIP&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;198106252014041001</td>
						<td width="50px"><center>2</center></td>
						<td >NIP&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;197209181999031005</td>
				</tr>
				<tr>
						<td width="50px"><center>3</center></td>
						<td >Pangkat/Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Penata Gol.III/C</td>
						<td width="50px"><center>3</center></td>
						<td >Pangkat/Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Pengatur Tingkat I Gol.II/d</td>
				</tr>
				<tr>
						<td width="50px"><center>4</center></td>
						<td >Jabatan&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Ketua Jurusan Budidaya Tanaman Perkebunan</td>
						<td width="50px"><center>4</center></td>
						<td >Jabatan&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;:&nbsp;Pengelola Lab. Tanaman</td>
				</tr>
				<tr>
						<td width="50px"><center>5</center></td>
						<td >Unit Kerja&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Budidaya Tanaman Perkebunan</td>
						<td width="50px"><center>5</center></td>
						<td >Unit Kerja&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Budidaya Tanaman Perkebunan</td>
				</tr>
			</table>
			<!--	<div class="col-md-4 text-center">
					<div style="margin-top: 4px"  id="message">
						<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
					</div>
				</div> -->
			</div>
			<table class="table table-bordered table-striped" id="mytable">
				<thead>
					<tr>
						<th width="80px"><center>No</center></th>
						<th><center>Kegiatan Jabatan</center></th>
						<th></th>
						<th><center>Kuatitas</center></th>
						<th width="200px"><center>Action</center></th>					
						<th><center>Tanggal Upload</center></th>
					</tr>
				</thead>
			
			</table>
			<div class="col-md-4 text-right">
				<?php if($_SESSION['level'] == 'manager'){}else{echo anchor(site_url('pelanggan/create'), '<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Create', 'class="btn btn-primary"'); }?>
			</div>
			<!-- Memanggil jQuery -->
			<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script> 
			<!-- Memanggil jQuery data tables -->
		<!-- <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script> -->
			<!-- Memanggil Bootstrap data tables -->
		<!--	<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script> -->
			
			<!-- JavaScript yang berfungsi untuk menampilkan data dari tabel pelanggan dengan AJAX -->
			<script type="text/javascript">
				$(document).ready(function() {
					$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
					{
						return {
							"iStart": oSettings._iDisplayStart,
							"iEnd": oSettings.fnDisplayEnd(),
							"iLength": oSettings._iDisplayLength,
							"iTotal": oSettings.fnRecordsTotal(),
							"iFilteredTotal": oSettings.fnRecordsDisplay(),
							"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
							"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
						};
					};
					
					var t = $("#mytable").dataTable({
						initComplete: function() {
							var api = this.api();
							$('#mytable_filter input')
									.off('.DT')
									.on('keyup.DT', function(e) {
										if (e.keyCode == 13) {
											api.search(this.value).draw();
										}
							});
						},
						oLanguage: {
							sProcessing: "loading..."
						},
						processing: true,
						serverSide: true,
						ajax: {"url": "pelanggan/json", "type": "POST"},
						columns: [
							{
								"data": "id_pelanggan",
								"orderable": false
							},
								{"data": "id_pelanggan"},
								{"data": "nama"},
								{"data": "alamat"},
								{"data": "telp"},
							{
								"data" : "action",
								"orderable": false,
								"className" : "text-center"
							}
						],
						order: [[0, 'desc']],
						rowCallback: function(row, data, iDisplayIndex) {
							var info = this.fnPagingInfo();
							var page = info.iPage;
							var length = info.iLength;
							var index = page * length + (iDisplayIndex + 1);
							$('td:eq(0)', row).html(index);
						}
					});
				});
			</script>
		<!--// Tampil Data Pelanggan -->    