
        <h2 style="margin-top:0px">Kategori Izin Kehadiran</h2>
		
		
		 <?php if($_SESSION['level'] == 'manager'){}else{echo site_url('kategori/update/'.$id_kategori); }?>
		 
		 <a href="<?php echo site_url('kategori') ?>" class="btn btn-warning">Cancel</a>
		 
        <table class="table table-striped table-bordered">
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Jenis Kategori Izin Kehadiran</td><td><?php echo $nama_kategori; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kategori') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
