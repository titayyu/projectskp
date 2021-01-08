<section class="content-header">
      <h1>
        E-KINERJA
        <small>Politeknik Negeri Pangkajenne Kepulauan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Pengajuan LKP</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
			<!-- Menampilkan Data Model -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h4 style="margin-top:0px">Drs. Basri</h4>
            </div>
           -<!--<div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div> -->
        </div>
        <table class="table table-bordered table-striped" id="mytable"><center>
            <thead>
                <tr>
                    <th><center>No</th>
                    <th><center>Pegawai</th> 
                    <th><center>Keterangan</th> 
          <th><center>Action</th>
                </tr>
            </thead>

            <thead class="">
                      <td><center>1</td>
                      <td><center>Jayadi Pebwanartha, S.Si</td>
                      <td><center>Disetujui</td>
                      <td class="col-md-2"><center>
            <?php echo anchor(site_url('persetujuanskp/create'), 'Lihat Pengajuan', 'class="btn-sm btn-primary"'); ?>
                      </td>
            </thead>
            
            <thead class="">
                      <td><center>2</td>
                      <td><center>Siti Marufah, S.Pd</td>
                      <td><center>Disetujui</td>
                      <td class="col-md-2"><center>
            <?php echo anchor(site_url('persetujuanskp/create'), 'Lihat Pengajuan', 'class="btn-sm btn-primary"');?>
                      </td>
            </thead>

            <thead class="">
                      <td><center>3</td>
                      <td><center>Saifuddin, S.Sos.I., M.Pd</td>
                      <td><center>Belum disetujui</td>
                      <td class="col-md-2"><center>
            <?php echo anchor(site_url('Persetujuanlkp/create'), 'Lihat Pengajuan', 'class="btn-sm btn-primary"'); ?>
        <!--    < ?php if($_SESSION['level'] == 'manager'){}else{ echo anchor(site_url('Persetujuanlkp/create'), 'Lihat Pengajuan', 'class="btn-sm btn-primary"'); }?> -->
                      </td>
            </thead>      
        </table>
          <!-- <div class="col-md-4 text-right">
          <?php if($_SESSION['level'] == 'manager'){}else{ echo anchor(site_url('Persetujuanlkp/create'), 'Create', 'class="btn btn-primary"'); }?>
	    </div> -->
     <!--    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script> -->
     <!--   <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script> -->
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
                    ajax: {"url": "model/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_model",
                            "orderable": false
                        },					
						{"data": "nama_model"},				
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
		<!--// Tampil Data Model -->  