<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
	<title>Lahan Kopi Jember</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetdash/css/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetdash/css/material-kit.css') ?>">
	<link href="../assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="landing-page">
	<nav class="navbar navbar-transparent navbar-absolute">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hover" href="http://www.creative-tim.com">Perkebunan Kopi Jember</a>
			</div>

			<div class="collapse navbar-collapse" id="navigation-example">
				<ul class="nav navbar-nav navbar-right">
					<li style="background-color: #9FA3A4;">
						<a href="<?php echo site_url('member/c_member')?>">
							<i class="material-icons">home</i> Beranda
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('member/c_member/form_tambah_lahan')?>">
							<i class="material-icons">notifications</i> Tambah Saran Lahan
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('member/c_member/daftar_lahan')?>">
							<i class="material-icons">flight takeoff</i> Daftar Lahan Di Jember
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('member/c_member/pilih_kriteria')?>">
							<i class="material-icons">directions run</i> Saran Rekomendasi Lahan
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('member/c_member/kritik_saran')?>">
							<i class="material-icons">notifications</i> Tambah Saran Lahan
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="wrapper">
		<div class="header header-filter" style="background-image: url('assetdash/img/kebun.jpg');">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1 class="title">Tentukan Lahan Perkebunan Anda</h1>
						<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.</h4>
							<br />
							<a href="#" class="btn btn-danger btn-lg">
								<i class="fa fa-calendar-o"></i> Klik Selengkapnya
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="main main-raised">
				<div class="container">
					<div class="section text-center section-landing">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<h2 class="title">FITUR LAHAN PERKEBUNAN JEMBER</h2>
								<h5 class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
								</div>
							</div>

							<div class="features">
								<div class="row">
									<div class="col-md-6">
										<div class="info">
											<div class="icon icon-primary">
												<i class="material-icons">chat</i>
											</div>
											<h4 class="info-title">Info Lahan</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quidem, necessitatibus.</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="info">
											<div class="icon icon-success">
												<i class="material-icons">verified_user</i>
											</div>
											<h4 class="info-title">Tambah Lahan</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam harum ipsum debitis temporibus quae</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="section text-center">
							<h2 class="title">About Us</h2>

							<div class="team">
								<div class="row">
									<div class="col-md-3">
										<div class="team-player">
											<img src="assetdash/img/anne.jpg" alt="Thumbnail Image" class="img-raised img-circle">
											<h4 class="title">ANNE RUFAEDAH<br />
												<small class="text-muted">PROGRAMMER</small>
											</h4>
											<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat.</p>
												<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
												<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin"></i></a>
											</div>
										</div>
										<div class="col-md-3">
											<div class="team-player">
												<img src="assetdash/img/zammil.jpg" alt="Thumbnail Image" class="img-raised img-circle">
												<h4 class="title">ZAMMIL<br />
													<small class="text-muted">PROJECT MANAGER</small>
												</h4>
												<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
													quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
													consequat. </p>
													<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
													<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
											<div class="col-md-3">
												<div class="team-player">
													<img src="assetdash/img/alvi.jpg" alt="Thumbnail Image" class="img-raised img-circle">
													<h4 class="title">KHASANUL ALVIANI<br />
														<small class="text-muted">DESIGNER</small>
													</h4>
													<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
														tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
														quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
														consequat</p>
														<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
														<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin"></i></a>
													</div>
												</div>
												<div class="col-md-3">
													<div class="team-player">
														<img src="assetdash/img/ocha.jpg" alt="Thumbnail Image" class="img-raised img-circle">
														<h4 class="title">YOSAFAT PARULIAN D<br />
															<small class="text-muted">ANALYST</small>
														</h4>
														<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
															tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
															quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
															consequat</p>
															<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
															<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-linkedin"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<footer class="footer">
										<div class="container">
											<nav class="pull-left">
												<ul>
													<li>
														<a href="landing-page.html">
															Beranda
														</a>
													</li>
													<li>
														<a href="signup-page.html">
															Tambah Saran Lahan
														</a>
													</li>
													<li>
														<a href="">
															Daftar Lahan Di Jember
														</a>
													</li>
													<li>
														<a href="">
															Saran Rekomendasi Lahan
														</a>
													</li>
												</ul>
											</nav>
											<div class="copyright pull-right">
												&copy; 2017, by Sppk Team
											</div>
										</div>
									</footer>

								</div>
							</body>

							<!--   Core JS Files   -->
							<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
							<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
							<script src="../assets/js/material.min.js"></script>
							<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

							</html>
