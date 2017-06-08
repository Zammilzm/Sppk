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


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Floyd</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminasset/plugins/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminasset/plugins/fontawesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminasset/css/theme-floyd.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminasset/css/theme-helper.css') ?>">
</head>
<body>
  <div id="wrapper">
    <div id="sidebar">
      <div id="sidebar-wrapper">
        <div class="sidebar-title">
          <span class="text-size-40 text-loose">Jember</span><br>
          <span class="text-size-18 text-grey">Lahan Kopi Jember</span>
        </div>
        <div class="sidebar-avatar">
          <div class="sidebar-avatar-image"><img class="img-circle" src="<?php echo base_url('assets/img/avatar.jpg'); ?>" /></div>
          <div class="sidebar-avatar-text">Admin</div>
        </div>
        <ul class="sidebar-nav">
          <li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>  
          <li><a href="<?php echo site_url('admin/c_admin')?>"><i class="fa fa-fw fa-font"></i><span>List Lahan</span></a></li>
          <li><a href="<?php echo site_url('admin/c_admin/daftar_verifikasi')?>"><i class="fa fa-fw fa-list-alt"></i><span>Verifikasi Lahan</span></a></li>
          <li class="active"><a href="<?php echo site_url('admin/c_admin/kriteria')?>"><i class="fa fa-fw fa-paint-brush"></i><span>Data Kriteria</span></a></li>
          <li><a href="<?php echo site_url('admin/c_admin/kritik')?>"><i class="fa fa-fw fa-wrench"></i><span>Kritik dan Saran</span></a></li>
          <li><a href="<?php echo site_url('admin/c_admin/logout')?>"><i class="fa fa-fw fa-power-off"></i><span>LogOut</span></a></li>
        </ul>
      </div>
    </div>
    <div id="main-panel">
      <div id="top-nav">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <!-- Navbar toggle button -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                <i class="fa fa-bars"></i>
              </button>
              <!-- Sidebar toggle button -->
              <button type="button" class="sidebar-toggle">
                <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> Edit Kriteria</a>
            </div>
          </div>
        </nav>
      </div>
      <div id="content">
        <div class="container-fluid">
         <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Edit Kriteria</h3>
                <span class="text-grey">Fitur ini memungkinkan admin untuk mengedit data kriteria lahan kopi</span>
              </div>
              <div class="panel-body">
               <?php foreach($kriteria as $u){ ?>
               <form method="POST" action="<?php echo site_url('admin/c_kriteria/ubah_kriteria')?>" style="border-radius: 0px;" class="form-horizontal group-border-dashed"> 
                 <input type="hidden" class="form-control " name="id" value="<?php echo $u->id_kriteria ?>"> 
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Kriteria</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="kriteria" value="<?php echo $u->kriteria ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                      <input type="number" class="form-control" name="harga" value="<?php echo $u->harga ?>">
                      <span class="input-group-addon">/m<sup>2</sup></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Luas</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                     <input type="number" class="form-control" name="luas" value="<?php echo $u->luas ?>">
                     <span class="input-group-addon">m<sup>2</sup></span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                <label class="col-sm-3 control-label">Ketinggian</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="number" class="form-control" name="ketinggian" value="<?php echo $u->ketinggian ?>">
                    <span class="input-group-addon">mdpl</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Akses</label>
                <div class="col-sm-6">
                  <select class="form-control border-input selectpicker" name="akses">
                    <option value="<?php echo $u->akses ?>" selected="">- <?php echo $u->akses ?> -</option>
                    $i=1;
                    <?php foreach($akses as $k){ 
                      if ($k->id!==$u->akses) {
                        echo "<option value='$k->id'>$k->Akses</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Suhu</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="number" class="form-control" name="suhu" value="<?php echo $u->suhu ?>">
                    <span class="input-group-addon"><sup>o</sup>C</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3 col-lg-offset-3">
                  <input type="submit" class="form-control btn-confirm-d btn-info btn-fill" value="Simpan" name="">
                </div>
              </div>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/theme-floyd.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</html>
