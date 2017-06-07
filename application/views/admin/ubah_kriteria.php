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
     <?php foreach($kriteria as $u){ ?>
     <form method="POST" action="<?php echo site_url('admin/c_kriteria/ubah_kriteria')?>"> 
       <h2><strong><p align="center">Form Ubah Kriteria</p></strong></h2>
       <hr>
       <div class="row">
        <input type="hidden" class="form-control " name="id" value="<?php echo $u->id_kriteria ?>"> 
        <div class="col-md-4">
          <div class="form-group">
            <label>Kriteria</label>
            <input type="text" class="form-control border-input" name="kriteria" value="<?php echo $u->kriteria ?>"> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Bobot</label>
            <input type="text" class="form-control border-input" name="bobot" value="<?php echo $u->bobot ?>"> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
          <label>Min/Max</label>
              <input type="text" class="form-control border-input" name="minmax" value="<?php echo $u->min_max ?>">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Tipe Preferensi</label>
              <select class="form-control border-input selectpicker" name="tipe" >
                <option value="<?php echo $u->tipe_preferensi ?>" selected=""><?php echo $u->tipe_preferensi ?></option>
                <?php
                for ($i=1; $i <7 ; $i++) { 
                  if ($i != $u->tipe_preferensi ) {
                    echo "<option value='$i'>$i</option>";
                  }
                }
                ?>
              </select>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Nilai p</label>
              <input type="number" class="form-control border-input" name="p" value="<?php echo $u->p ?>">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Nilai q</label>
              <input type="number" class="form-control border-input" name="q" value="<?php echo $u->q ?>">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Nilai gausian</label>
              <input type="number" class="form-control border-input" name="g" value="<?php echo $u->g ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Batas Maks Gol I</label>
              <input type="text" class="form-control border-input" name="gol1" value="<?php echo $u->gol1 ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Batas Maks Gol II</label>
              <input type="text" class="form-control border-input" name="gol2" value="<?php echo $u->gol2 ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Batas Maks Gol III</label>
              <input type="text" class="form-control border-input" name="gol3" value="<?php echo $u->gol3 ?>">
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