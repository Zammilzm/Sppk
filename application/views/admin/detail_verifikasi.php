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
          <li  class="active"><a href="<?php echo site_url('admin/c_admin/daftar_verifikasi')?>"><i class="fa fa-fw fa-list-alt"></i><span>Verifikasi Lahan</span></a></li>
          <li><a href="<?php echo site_url('admin/c_admin/kriteria')?>"><i class="fa fa-fw fa-paint-brush"></i><span>Data Kriteria</span></a></li>
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
              <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> Lahan User Siap Verifikasi</a>
            </div>
          </div>
        </nav>
      </div>
      <div id="content">
        <div class="container-fluid">
          <div class="row">
            <br><br><br>
            <h2><strong><p align="center">Detail Lahan</p></strong></h2>
            <br><br>

            <div class="col-md-6 col-md-offset-3 ">
             <div class="panel panel-default">
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
                  <td>: <?php echo $u->akses ?></td>
                </tr>
              </table>

              <?php } ?>
              <hr>
              <a href="<?php echo site_url('admin/c_saranLahan/verifikasi/'.$u->id_alternatif.'/Disetujui')?>" class="btn btn-info bold" >Verifikasi</a>
              <a href="<?php echo site_url('admin/c_saranLahan/verifikasi/'.$u->id_alternatif.'/Ditolak')?>" class="btn btn-info bold" >Tolak</a>
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