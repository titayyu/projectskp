<!doctype html>
<html>
    <head>
        <title>Detail tentang/title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tentang Read</h2>
		
		
		 <a href="<?php echo site_url('tentang/update/'.$id_tentang) ?>" class="btn btn-primary">Update</a>
		 
		 <a href="<?php echo site_url('tentang') ?>" class="btn btn-warning">Cancel</a>
		 
        <table class="table table-striped table-bordered">
	    <tr><td>Id Tentang</td><td><?php echo $id_tentang; ?></td></tr>
	    <tr><td>Judul Tentang</td><td><?php echo $judul_tentang; ?></td></tr>
	    <tr><td>Isi Tentang</td><td><?php echo $isi_tentang; ?></td></tr>
	    <tr><td>Keterangan Tambahan</td><td><?php echo $keterangan_tambahan; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Aktif</td><td><?php echo $aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tentang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>