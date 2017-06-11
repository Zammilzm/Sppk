<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/slider.css') ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/slider.js') ?>"></script>
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
        <li><a href="<?php echo site_url('member/c_member')?>">Beranda</a></li>
        <li><a href="<?php echo site_url('member/c_member/form_tambah_lahan')?>">Tambah Saran Lahan</a></li>
        <li><a href="<?php echo site_url('member/c_member/daftar_lahan')?>">Daftar Lahan Di Jember</a></li>
        <li><a href="<?php echo site_url('member/c_member/pilih_lahan')?>">Saran Rekomendasi Lahan</a></li>
        <li><a href="<?php echo site_url('member/c_member/kritik_saran')?>">Tambah Kritik dan Saran</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


  <div class="container">

   <br><br><br>

   <div class="col-md-8 col-md-offset-2 ">
    <form method="POST" action="<?php echo site_url('member/c_member/tambah_saran')?>"> 
     <h2><strong><p align="center">Form Kritik dan Saran</p></strong></h2>
     <hr>
     <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control border-input" name="nama">          
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control border-input" name="email"> 
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label>Kritik</label>
          <textarea class="form-control border-input" name="kritik"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label>Saran</label>
          <textarea class="form-control border-input" name="saran"></textarea>
        </div>
      </div>
    

    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <input type="submit" class="form-control btn-confirm-d btn-info btn-fill" value="Kirim" name="">
        </div>
      </div>
    </div>
  </form>
</div>
</div> <!-- /container -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>