<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css') ?>"> 
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>">

    <title><?= $judul; ?></title>
</head>
<body>

<div class="row">
    <div class="col-sm">
        <?= $this->session->flashdata('pesan'); ?>
    </div>
</div>

    <form action="<?= base_url('logincontroller'); ?>" method="post">
        <input type="text" id="username" name="username"><br>
        <?= form_error('username') ?>
        <input type="password" id="password" name="password"><br>

        <button type="submit">Login</button>
    </form>
    
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


</body>
</html>