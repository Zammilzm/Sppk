<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/paper-dashboard.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/themify-icons.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css') ?>">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>
<body class="bg_form">
	<div class="wrapper">

		<div class="sidebar" data-background-color="black" data-active-color="warning">

			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="#" class="simple-text">
						SIMPUS RAMBIPUJI
					</a>
				</div>

				<ul class="nav">
					<li>
						<a href="/loket">
							<i class="ti-home"></i>
							<p>Beranda</p>
						</a>
					</li>
					<li>
						<a href="/loket/kunjungan">
							<i class="ti-user"></i>
							<p>Kunjungan</p>
						</a>
					</li>
					<li class="active">
						<a href="/loket/pasien">
							<i class="ti-wheelchair"></i>
							<p>Pasien</p>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="main-panel">

			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar bar1"></span>
							<span class="icon-bar bar2"></span>
							<span class="icon-bar bar3"></span>
						</button>
						<a class="navbar-brand" href="#">Loket - Pasien</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="ti-settings"></i>
									<p>Pengaturan akun</p>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="ti-power-off"></i>
									<p>Keluar</p>
								</a>
							</li>
						</ul>

					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row bread">
						<div class="col-md-10 col-md-offset-1">
							<div class="card">
								<div class="content">
									<h6>Beranda / Pasien / <span class="active">Tambah Lahan</span></h6>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="card">
								<div class="header">
									<div class="row">
										<div class="col-sm-6">
											<h4 class="title">Tambah Data Lahan</h4>  
											<p class="category">Lengkapi isian dibawah untuk menambah data lahan.</p>
										</div>
										<div class="col-sm-6 text-right">
											<a href="/loket/pasien"><button onclick="return confirm('Batal menambahkan lahan?')" class="btn btn-danger btn-fill"><i class="ti-close"></i> Batal</button></a>
										</div>
									</div>
								</div>
								<div class="content table-responsive ">
									<form action="/loket/pasien/tambah" method="post" >
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Kecamatan</label>
													<select class="form-control border-input selectpicker" name="kec">
														<option value="0" selected="">- Kecamatan -</option>
														<option value="a">Ajung</option>
														<option value="a">Ambulu</option>
														<option value="a">Arjasa</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Kelurahan/Desa</label>
													<select class="form-control border-input selectpicker" name="kec">
														<option value="0" selected="">- Kelurahan/Desa -</option>
														<option value="">Ajung</option>
														<option value="">Komplangan</option>
														<option value="">Mangaran</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Alamat Lengkap</label>
													<input type="text" name="tgl" class="form-control border-input" placeholder="Masukkan alamat lengkap">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Harga</label>
													<input type="text" class="form-control border-input">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Luas Lahan</label>
													<input type="text" class="form-control border-input">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Akses Jalan</label>
													<select class="form-control border-input selectpicker" name="jenkel">
														<option value="0" selected="">- Akses Jalan -</option>
														<option value="L">Makadam</option>
														<option value="P">Tanah</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Ketinggian</label>
													<input type="text" name="ortu" class="form-control border-input" placeholder="Masukkan ketinggian">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Suhu</label>
													<input type="number" name="telp" class="form-control border-input" placeholder="Masukkan suhu">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Curah hujan</label>
													<input type="number" name="telp" class="form-control border-input" placeholder="Masukkan suhu">
												</div>
											</div>
										</div>

										<div class="footer">

											<hr>
											<div class="text-success">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="submit" class="form-control btn-info btn-fill" value="Tambah Lahan" name="">
														</div>
													</div>
												</div>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')  ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-checkbox-radio.js')  ?>"></script>
	<script src="<?php echo base_url('assets/js/chartist.min.js')  ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-notify.js')  ?>"></script>
	<script src="<?php echo base_url('assets/js/paper-dashboard.js')  ?>"></script>
	<script src="<?php echo base_url('assets/js/demo.js')  ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-select.js')  ?>" type="text/javascript"></script>
</body>
</html>