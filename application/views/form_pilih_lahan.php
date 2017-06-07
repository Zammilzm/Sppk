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
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Penentuan Lahan</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('index.php/promethee')?>">Beranda</a></li>
          <li><a href="<?php echo base_url('index.php/promethee')?>">Daftar Lahan</a></li>
          <li><a href="<?php echo base_url('index.php/promethee/pilih_lahan')?>">Saran Lahan</a></li>
          <li><a href="<?php echo base_url('index.php/promethee/tambah_lahan')?>">Tambah Lahan</a></li>
          <li><a href="<?php echo base_url('index.php/promethee/tambah_lahan')?>"></a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">

   <br><br><br>

   <div class="col-md-8 col-md-offset-2 ">
    <form method="POST" action="<?php echo base_url('index.php/f/saran_lahan')?>"> 
     <h2><strong><p align="center">Form Tambah Lahan</p></strong></h2>
     <hr>
     <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Kecamatan</label>
          <select class="form-control border-input selectpicker" name="kec">
            <option value="0" selected="">- Kecamatan -</option>
            <option value="Ajung">Ajung</option>
            <option value="Ambulu">Ambulu</option>
            <option value="Arjasa">Arjasa</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Kelurahan/Desa</label>
          <select class="form-control border-input selectpicker" name="desa">
            <option value="0" selected="">- Kelurahan/Desa -</option>
            <option value="">Ajung</option>
            <option value="">Komplangan</option>
            <option value="">Mangaran</option>
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label>Harga</label>
          <div class="input-group">
            <input type="text" class="form-control border-input" name="harga">
            <span class="input-group-addon">.00.000</span>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label>Luas</label>
          <div class="input-group">
            <input type="text" class="form-control border-input" name="luas">
            <span class="input-group-addon">/m<sup>2</sup></span>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label>Ketinggian</label>
          <div class="input-group">
            <input type="text" class="form-control border-input" name="ketinggian">
            <span class="input-group-addon">mdpl</span>
          </div>
        </div>
      </div>
<!--       <div class="col-sm-4">
        <div class="form-group">
          <label>Curah Hujan</label>
          <div class="input-group">
            <input type="text" class="form-control border-input" name="curahHujan">
            <span class="input-group-addon">mm/th</span>
          </div>
        </div>
      </div> -->
      <div class="col-sm-6">
        <div class="form-group">
          <label>Akses Jalan</label>
          <select class="form-control border-input selectpicker" name="aksesJalan">
            <option value="" selected="">- Akses Jalan -</option>
            <option value="Mudah">Mudah</option>
            <option value="Sulit">Sulit</option>
          </option>
        </select>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Suhu</label>
        <div class="input-group">
          <input type="num" class="form-control border-input" name="suhu">
          <span class="input-group-addon"><sup>o</sup>C</span>
        </div>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <input type="submit" class="form-control btn-confirm-d btn-info btn-fill" value="Pilih" name="">
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