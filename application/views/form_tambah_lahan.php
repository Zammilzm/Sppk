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
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Nav header</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
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
      <form method="POST" action="proses tambah.php"> 
             <h2><strong><p align="center">Form Tambah Lahan</p></strong></h2>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control border-input" name="Alamat"> </textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Desa</label>
              <input type="text" class="form-control border-input" name="Nama">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Kecamatan</label>
              <input type="text" class="form-control border-input" name="Nama">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Kota/Kab</label>
              <input type="text" class="form-control border-input" name="TglLahir">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Harga</label>
              <div class="input-group">
                <input type="text" class="form-control border-input">
                <span class="input-group-addon">.00.000</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Luas</label>
              <div class="input-group">
                <input type="text" class="form-control border-input">
                <span class="input-group-addon">/m<sup>2</sup></span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Ketinggian</label>
              <div class="input-group">
                <input type="text" class="form-control border-input">
                <span class="input-group-addon">mdpl</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Curah Hujan</label>
              <div class="input-group">
                <input type="text" class="form-control border-input">
                <span class="input-group-addon">mm/th</span>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Akses Jalan</label>
              <input type="text" class="form-control border-input">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Suhu</label>
              <div class="input-group">
                <input type="text" class="form-control border-input">
                <span class="input-group-addon"><sup>o</sup>C</span>
              </div>
            </div>
          </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="submit" class="form-control btn-confirm-d btn-info btn-fill" value="Tambah" name="">
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