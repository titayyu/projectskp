<section class="content-header">
      <h1>
        Tita Jaya
        <small>My Customer My Number One Priority</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?php echo $back ?>">Model</a></li>
        <li class="active"><?php echo $button ?> Model</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">        
        <div class="box-body">
		
		<!-- Tampil Data Model -->  
		<legend><?php echo $button ?> Model</legend>		
    <!-- Button untuk melakukan update -->
    
		<?php if($_SESSION['level'] == 'manager'){}else{echo site_url('model/update/'.$id_model);} ?>
		<!-- Button cancel untuk kembali ke halaman model list --> 
		<a href="<?php echo site_url('model') ?>" class="btn btn-warning">Cancel</a>
		<p></p> 
		 <!-- Menampilkan data model secara detail -->
        <table class="table table-striped table-bordered">
	    <tr><td>Photo</td><td><img src="../../../images/model/<?php echo $photo; ?>"</td></tr>
	    <tr><td>Nama Model</td><td><?php echo $nama_model; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('model') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
      