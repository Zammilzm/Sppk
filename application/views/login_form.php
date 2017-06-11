<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
	<!-- Custom Theme files -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/stylelogin.css') ?>">
	<!-- for-mobile-apps -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="keywords" content="Flat Login Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- //for-mobile-apps -->
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
	<!--google fonts-->
</head>
<body>
	<!--header start here-->
	<h1>Admin Login</h1>
	<div class="header agile">
		<div class="wrap">
			<div class="login-main wthree">
				<div class="login">
					<h3>Login</h3>
					<form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
						<input type="text" placeholder="Username" required="" name="username">
						<input type="password" placeholder="Password" name="password">
						<input type="submit" value="Login">
					</form>
					<div class="clear"> 
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>