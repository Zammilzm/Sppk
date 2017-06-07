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
          <li><a href="<?php echo site_url('admin/c_admin')?>">Beranda</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lahan <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('admin/c_admin')?>">Daftar Lahan</a></li>
              <li><a href="<?php echo site_url('admin/c_admin/daftar_verifikasi')?>">Verifikasi Lahan</a></li>
            </ul>
          </li>
          <li><a href="<?php echo site_url('admin/c_admin/kriteria')?>">Data Kriteria</a></li>
          <li><a href="<?php echo site_url('admin/c_admin/kritik')?>">Kritik dan Saran</a></li>
          <li><a href="<?php echo site_url('admin/c_admin/logout')?>">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">

   <br><br><br>

   <div class="col-md-8 col-md-offset-2 ">
     <?php foreach($alternatif as $u){ ?>
     <form method="POST" action="<?php echo site_url('admin/c_alternatif/update')?>"> 
       <h2><strong><p align="center">Form Ubah Lahan</p></strong></h2>
       <hr>
       <div class="row">
        <input type="hidden" class="form-control " name="id" value="<?php echo $u->id_alternatif ?>"> 
        <div class="col-md-3">
          <div class="form-group">
            <label>Kecamatan</label>
            <select class="form-control border-input selectpicker" name="kec">
              <option value="<?php echo $u->id_kecamatan ?>" selected="">- <?php echo $u->kecamatan ?> -</option>
              $i=1;
              <?php foreach($kecamatan as $k){ 
                if ($k->id!==$u->id_kecamatan) {
                  echo "<option value='$k->id'>$k->kecamatan</option>";
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control border-input" name="alamat" value="<?php echo $u->alamat ?>"> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Harga</label>
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="number" class="form-control border-input" name="harga" value="<?php echo $u->harga ?>">
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Luas</label>
            <div class="input-group">
              <input type="number" class="form-control border-input" name="luas" value="<?php echo $u->luas ?>">
              <span class="input-group-addon">/m<sup>2</sup></span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Ketinggian</label>
            <div class="input-group">
              <input type="number" class="form-control border-input" name="ketinggian" value="<?php echo $u->ketinggian ?>">
              <span class="input-group-addon">mdpl</span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Akses Jalan</label>
            <select class="form-control border-input selectpicker" name="akses" value="<?php echo $u->akses_jalan ?>">
              <option value="0" selected="">- Akses Jalan -</option>
              <option value="Baik">Baik</option>
              <option value="Sedang">Sedang</option>
              <option value="Buruk">Buruk</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Suhu</label>
            <div class="input-group">
              <input type="number" class="form-control border-input" name="suhu" value="<?php echo $u->suhu ?>">
              <span class="input-group-addon"><sup>o</sup>C</span>
            </div>
          </div>
        </div>
      </div>

      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <input type="submit" class="form-control btn-confirm-d btn-info btn-fill" value="Simpan" name="">
          </div>
        </div>
      </div>
    </form> 
    <?php } ?>
  </div>
</div> <!-- /container -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>