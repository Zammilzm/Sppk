<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
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
					<li><a href="<?php echo site_url('member/c_member/daftar_lahan')?>">Daftar Lahan</a></li>
					<li><a href="<?php echo site_url('member/c_member/form_tambah_lahan')?>">Tambah Lahan</a></li>
					<li><a href="<?php echo site_url('member/c_member/pilih_lahan')?>">Saran lahan</a></li>
					<li><a href="<?php echo site_url('member/c_member/kritik_saran')?>">Kritik dan Saran</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>




	<br><br><br>
	<h2><strong><p align="center">Pilih Kriteria </p></strong></h2>
	
	<div class="container-fluid">
		<form method="POST" action="<?php echo site_url('member/c_hitung/hitung_prediksi')?>">
			<div class="row">
				<div class="col-sm-9 col-md-offset-2">
					<hr>
					<table class="table tbl-detail">
						<tr>
							<td width="80px;">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-success ">
										<input type="checkbox" name="Kriteria[]" value="luas">
										<span class="glyphicon glyphicon-ok"></span>
									</label>
								</div>
							</td>
							<td><?php echo $kriteria[0]->kriteria ?> Lahan</td>
							<td>
								<input name="luas" value="1" type="radio"><<?php echo $kriteria[0]->gol1 ?> m2
							</td>
							<td>
								<input name="luas" value="2" type="radio"><?php echo $kriteria[0]->gol1 ?> - <?php echo $kriteria[0]->gol2 ?> m2
							</td>
							<td>
								<input name="luas" value="3" type="radio">lebih dari <?php echo $kriteria[0]->gol2 ?> m2
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-success ">
										<input type="checkbox" name="Kriteria[]" value="harga" >
										<span class="glyphicon glyphicon-ok"></span>
									</label>
								</div>
							</td>
							<td><?php echo $kriteria[1]->kriteria ?> Lahan</td>
							<td>
								<input name="harga" value="3" type="radio">< Rp.<?php echo $kriteria[1]->gol3 ?>
							</td>
							<td>
								<input name="harga" value="2" type="radio">Rp.<?php echo $kriteria[1]->gol3 ?> - Rp.<?php echo $kriteria[1]->gol2 ?>
							</td>
							<td>
								<input name="harga" value="1" type="radio">lebih dari Rp.<?php echo $kriteria[1]->gol1 ?>
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-success ">
										<input type="checkbox" name="Kriteria[]" value="ketinggian" >
										<span class="glyphicon glyphicon-ok"></span>
									</label>
								</div>
							</td>
							<td><?php echo $kriteria[2]->kriteria ?>  Lahan</td>
							<td>
								<input name="ketinggian" value="1" type="radio"><<?php echo $kriteria[2]->gol1 ?> mdpl
							</td>
							<td>
								<input name="ketinggian" value="2" type="radio"><?php echo $kriteria[2]->gol1?> - <?php echo $kriteria[2]->gol2  ?> mdpl
							</td>
							<td>
								<input name="ketinggian" value="3" type="radio">lebih dari <?php echo $kriteria[2]->gol2 ?> mdpl
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-success">
										<input type="checkbox"  name="Kriteria[]" value="akses">
										<span class="glyphicon glyphicon-ok"></span>
									</label>
								</div>
							</td>
							<td><?php echo $kriteria[3]->kriteria ?></td>
							<td>
								<input name="akses" value="3" type="radio">Baik
							</td>
							<td>
								<input name="akses" value="2" type="radio">Sedang
							</td>
							<td>
								<input name="akses" value="1" type="radio">Buruk
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-success">
										<input type="checkbox" name="Kriteria[]" value="suhu" >
										<span class="glyphicon glyphicon-ok"></span>
									</label>
								</div>
							</td>
							<td><?php echo $kriteria[4]->kriteria ?></td>
							<td>
								<input name="suhu" value="3" type="radio"><?php echo $kriteria[4]->gol3-3 ?>-<?php echo $kriteria[4]->gol3-1?>
							</td>
							<td>
								<input name="suhu" value="2" type="radio"><?php echo ($kriteria[4]->gol3) ?>-<?php echo $kriteria[4]->gol2 ?>
							</td>
							<td>
								<input name="suhu" value="1" type="radio"><?php echo ($kriteria[4]->gol2+1)?>-<?php echo $kriteria[4]->gol1 ?>
							</td>
						</tr>
					</table>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" class="form-control btn-confirm-d btn-success btn-fill" value="Saran Lahan" name="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>