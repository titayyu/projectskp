<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajene Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Persetujuan SKP</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
      <div class="box-body">
      <div class="box-body">
		
		<!-- Menampilkan Data Gallery -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px"></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            
        <table class="table table-bordered table-striped" id="mytable"><center>
            <thead>
                <tr>
                    <th><center>No</th>
                    <th class="col-sm-5"><center>Pegawai</th> 
                    <th class="col-sm-5"><center>Keterangan</th> 
                    <th class="col-sm-2"><center>Action</th>
                </tr>
            </thead>

            <thead class="">
                      <td><center>1</td>
                      <td class="col-sm-5"><center>Jayadi Pebwanartha, S.Si</td>
                      <td class="col-sm-5"><center>Disetujui</td>
                      <td class="col-md-2"><center>
            <?php echo anchor(site_url('persetujuanskp/create'), '<i class="fa fa-eye"></i>', 'class="btn btn-primary"'); ?>
                      </td>
            </thead>
            
            <thead class="">
                      <td><center>2</td>
                      <td class="col-sm-5"><center>Siti Marufah, S.Pd</td>
                      <td class="col-sm-5"><center>Disetujui</td>
                      <td class="col-md-2"><center>
            <?php echo anchor(site_url('persetujuanskp/create'), '<i class="fa fa-eye"></i>', 'class="btn btn-primary"'); ?>
                      </td>
            </thead>

            <thead class="">
                      <td><center>3</td>
                      <td class="col-sm-5"><center>Saifuddin, S.Sos.I., M.Pd</td>
                      <td class="col-sm-5"><center>Belum disetujui</td>
                      <td class="col-md-2"><center>
            <?php echo anchor(site_url('persetujuanskp/create'), '<i class="fa fa-eye"></i>', 'class="btn btn-primary"'); ?>
      <!--      < ?php if($_SESSION['level'] == 'manager'){}else{ echo anchor(site_url('persetujuanskp/create'), '<i class="fa fa-eye"></i>', 'class="btn btn-primary"'); }?> -->
                      </td>
            </thead>      
        </table>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
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
            });
        </script>
		<!-- // Menampilkan Data Gallery -->