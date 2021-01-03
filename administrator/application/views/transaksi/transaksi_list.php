<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajene Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">SKP</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
    <!-- Default box -->
    <div class="box">        
        <div class="box-body">		
		<!-- Tampil Data transaksi -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px"></h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
	    </div>
        </div>
        
        <table class="table table-bordered table-striped" id="mytable"><center>
            <thead>
                <tr>
                    <th class="col-md-1"><center>No</th>
                    <th><center>Periode</th>	
					<th class="col-md-2"><center>Action</th>
                </tr>
            </thead>
            <thead class="">
                      <td class="col-md-1"><center>1</td>
                      <td><center>2019</td>
                      <td class="col-md-2"><center>
                      <?php echo anchor(site_url('transaksi/create'), '<i class="fa fa-folder-open"></i>', 'class="btn btn-primary"'); ?>
                      </td>
            </thead>
            <thead class="">
                      <td class="col-md-1"><center>2</td>
                      <td><center>2020</td>
                      <td class="col-md-2"><center>
                      <?php echo anchor(site_url('transaksi/create'), '<i class="fa fa-folder-open"></i>', 'class="btn btn-primary"'); ?>
                      </td>
          </thead>
          <thead class="">
                      <td><center>3</td>
                      <td><center>2021</td>
                      <td class="col-md-2"><center>
                      <?php echo anchor(site_url('transaksi/create'), '<i class="fa fa-folder-open"></i>', 'class="btn btn-danger"'); ?>
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
        </script>