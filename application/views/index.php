<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
</head>
<body>


  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Penentuan Lahan</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo site_url('index.php/promethee')?>">Beranda</a></li>
          <li><a href="<?php echo site_url('index.php/promethee')?>">Daftar Lahan</a></li>
          <li><a href="<?php echo site_url('index.php/promethee/pilih_lahan')?>">Saran Lahan</a></li>
          <li><a href="<?php echo site_url('index.php/promethee/tambah_lahan')?>">Tambah Lahan</a></li>
          <li><a href="<?php echo site_url('admin/c_admin')?>">Login</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
<br><br><br>
	<h2><strong><p align="center">Penentuan Lahan Perkebunan Kopi</p></strong></h2>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<br><br>
				<a href="<?php echo site_url('admin/c_admin')?>" class="btn btn-success bold">Admin</a>
				<a href="<?php echo site_url('member/c_member')?>" class="btn btn-primary bold">User</a>
			</div>
		</div>
	</div>

</body>
</html>