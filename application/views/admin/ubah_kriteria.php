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
                    <input type="text" class="form-control border-input" name="kriteria" value="<?php echo $u->kriteria ?>"> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Bobot</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="text" class="form-control border-input" name="bobot" value="<?php echo $u->bobot ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Min Max</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input type="text" class="form-control border-input" name="minmax" value="<?php echo $u->min_max ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tipe Preferensi</label>
                  <div class="col-sm-6">
                    <select class="form-control border-input selectpicker" name="tipe">
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
              <div class="form-group">
                <label class="col-sm-3 control-label">Nilai P</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="number" class="form-control border-input" name="p" value="<?php echo $u->p ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nilai Q</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="number" class="form-control border-input" name="q" value="<?php echo $u->q ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nilai Gausian</label>
                <div class="col-sm-6">
                  <div class="input-group">
                   <input type="number" class="form-control border-input" name="g" value="<?php echo $u->g ?>">
                 </div>
               </div>
             </div>
             <div class="form-group">
              <label class="col-sm-3 control-label">Batas Maks Gol I</label>
              <div class="col-sm-6">
                <div class="input-group">
                 <input type="text" class="form-control border-input" name="gol1" value="<?php echo $u->gol1 ?>">
               </div>
             </div>
           </div>
           <div class="form-group">
            <label class="col-sm-3 control-label">Batas Maks Gol II</label>
            <div class="col-sm-6">
              <div class="input-group">
               <input type="text" class="form-control border-input" name="gol2" value="<?php echo $u->gol2 ?>">
             </div>
           </div>
         </div>
         <div class="form-group">
          <label class="col-sm-3 control-label">Batas Maks Gol III</label>
          <div class="col-sm-6">
            <div class="input-group">
             <input type="text" class="form-control border-input" name="gol3" value="<?php echo $u->gol3 ?>">
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
