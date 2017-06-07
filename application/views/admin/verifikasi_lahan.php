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



<br><br><br>
	<h2><strong><p align="center">Data Saran Lahan</p></strong></h2>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<br><br>

				<table class="table table-striped table-bordered">
					<thead class=" danger">
						<th width="30px;">No.</th>
						<th>Daerah</th>
						<th>Luas</th>
						<th>Harga</th>
						<th>Ketinggian (mdpl)</th>
						<th>Suhu (<sup>o</sup>C)</th>
						<th>Akses jalan</th>
						<th width="190px;">Aksi</th>
					</thead>

					<tbody>

						<?php
						$i=1;
						 foreach($alternatif as $u){ ?>
						<tr>
							<td><?php echo $i++ ?> </td>
							<td><?php echo $u->kecamatan ?></td>
							<td><?php echo $u->luas ?></td>
							<td><?php echo $u->harga ?></td>
							<td><?php echo $u->ketinggian ?></td>
							<td><?php echo $u->suhu ?></td>
							<td><?php echo $u->akses?></td>
							<td>
								<a href="<?php echo site_url('admin/c_saranLahan/detail_verifikasi/'.$u->id_alternatif) ?>"><button class="btn btn-success bold">Detail</button></a>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>