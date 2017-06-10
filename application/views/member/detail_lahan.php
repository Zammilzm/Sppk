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
        <li><a href="<?php echo site_url('member/c_member/form_tambah_lahan')?>">Tambah Lahan</a></li>
        <li><a href="<?php echo site_url('member/c_member/daftar_lahan')?>">Daftar Lahan</a></li>
        <li><a href="<?php echo site_url('member/c_member/pilih_lahan')?>">Saran lahan</a></li>
        <li><a href="<?php echo site_url('member/c_member/kritik_saran')?>">Kritik dan Saran</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


  <div class="container">

   <br><br><br>
   <h2><strong><p align="center">Detail Lahan</p></strong></h2>
   <br><br>

   <div class="col-md-6 col-md-offset-3 ">
     <?php foreach($alternatif as $u){ ?>
     <table class="table tbl-detail">
      <tr>
        <td width="80px;">Id Lahan  </td>
        <td>: <?php echo $u->id_alternatif ?></td>
      </tr>
      <tr>
        <td>Kecamatan </td>
        <td>: <?php echo $u->kecamatan ?></td>
      </tr>
      <tr>
        <td>Alamat </td>
        <td>: <?php echo $u->alamat ?></td>
      </tr>
      <tr>
        <td>Harga </td>
        <td>: <?php echo $u->harga ?></td>
      </tr>
      <tr>
        <td>Luas </td>
        <td>: <?php echo $u->luas ?></td>
      </tr>
      <tr>
        <td>Ketinggian </td>
        <td>: <?php echo $u->ketinggian ?></td>
      </tr>
      <tr>
        <td>Suhu </td>
        <td>: <?php echo $u->suhu ?></td>
      </tr>
      <tr>
        <td>Akses Jalan </td>
        <td>: <?php echo $u->ket ?></td>
      </tr>
    </table>

    <?php } ?>
    <hr>
    <a href="<?php echo site_url('member/c_member/daftar_lahan')?>" class="btn btn-info bold" >Kembali</a>
  </div>
</div> <!-- /container -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>