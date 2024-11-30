<?php 
	session_start();
	error_reporting(0); 
	include "config/koneksi.php"; 
  include "config/class_paging.php"; 
	if(empty($_SESSION['admin_nis']) AND empty($_SESSION['admin_password'])) { include "index.php"; } else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>e-Voting PILKETOS SMKN 1 BAWANG</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">e-Voting PILKETOS SMKN 1 BAWANG</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
         	<?php
				if($_GET['page']=='admin_home') {
					echo" <li class='active'>";
				} else {
					echo" <li class=''>";
				}
			?><a href="admin_halaman.php?page=admin_home">Home</a></li>
         	<?php
				if($_GET['page']=='data_mhs' OR  $_GET['page']=='data_mhs_tambah' OR  $_GET['page']=='data_mhs_edit'){
					echo" <li class='active'>";
				} else {
					echo" <li class=''>";
				}
			?><a href="admin_halaman.php?page=data_mhs">Data siswa</a></li>
         	<?php
				if($_GET['page']=='data_admin' OR  $_GET['page']=='data_admin_tambah' OR  $_GET['page']=='data_admin_edit') {
					echo" <li class='active'>";
				} else {
					echo" <li class=''>";
				}
			?><a href="admin_halaman.php?page=data_admin">Data admin</a></li>
         	<?php
				if($_GET['page']=='data_kahim' OR  $_GET['page']=='data_kahim_tambah' OR  $_GET['page']=='data_kahim_edit') {
					echo" <li class='active'>";
				} else {
					echo" <li class=''>";
				}
			?><a href="admin_halaman.php?page=data_kahim">Data Calon Katua Dan Wakil Osis</a></li>
         	<?php
				if($_GET['page']=='data_suara') {
					echo" <li class='active'>";
				} else {
					echo" <li class=''>";
				}
			?><a href="admin_halaman.php?page=data_suara">Data Suara Masuk</a></li>
         	<?php
				if($_GET['page']=='tgl_pemilihan') {
					echo" <li class='active'>";
				} else {
					echo" <li class=''>";
				}
			?><a href="admin_halaman.php?page=tgl_pemilihan">Tanggal Pemilihan</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
         <?php include "content.php"; ?>
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Menu Content</a> 
            <a href="admin_halaman.php?page=admin_home" class="list-group-item">Home</a>
            <a href="admin_halaman.php?page=data_mhs" class="list-group-item">Data siswa</a>
            <a href="admin_halaman.php?page=data_admin" class="list-group-item">Data admin</a>
            <a href="admin_halaman.php?page=data_kahim" class="list-group-item">Data Calon Katua Dan Wakil Osis</a>
            <a href="admin_halaman.php?page=data_suara" class="list-group-item">Data Suara Masuk</a> 
            <a href="admin_halaman.php?page=tgl_pemilihan" class="list-group-item">Tanggal Pemilihan</a>         
            <a href="logout.php" class="list-group-item" onClick="return confirm('Apakah anda akan Keluar?');">Logout</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; 2024 Septia Windi | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
        </p>
      </footer>

    </div><!--/.container-->

  </body>
</html>

<?php } ?>