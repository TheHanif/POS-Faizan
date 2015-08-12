<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View User</title>
	<link href="assets/css/reset.css" rel="stylesheet">
	<link href="assets/css/general.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<script type="text/javascript" src="assets/js/jquery.latest.js"></script>
	<script type="text/javascript">
 	$(document).ready(function(){

 		$("#product_id").on('change', function(event) {
 			event.preventDefault();
 			console.log($(this).val());
 		});
	});
	</script>
</head>
<body>

<header>
	<div class="container">
		<div class="row">
			<div class="col-md-7"><a href="dashboard.php"><img src="assets/images/logo.png" class="logo"/></a></div>
			<div class="col-md-3 userDetail"><img src="assets/images/user_image.png"/><p><?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></p><span> <?php $desig = $_SESSION['user']->designation; echo str_replace("_"," ","$desig"); ?></span></div>
			<div class="col-md-1"><a href="login.php?logout=true"><img src="assets/images/login.png" class="logoutBtn" /></a></div>
			<div class="col-md-1">
				<div class="navbar-collapse settingBtn">
					<ul class="navbar-right nomargin">
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/images/setting_icon.png"/><span class="caret"></span></a>
						  <ul class="dropdown-menu">
						    <li><a href="#">Action</a></li>
						    <li><a href="#">Another action</a></li>
						    <li><a href="#">Something else here</a></li>
						    <li role="separator" class="divider"></li>
						    <li><a href="#">Separated link</a></li>
						  </ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</div>
	</div>
</header>

<?php include ABSPATH.'include/menu.php'; ?>