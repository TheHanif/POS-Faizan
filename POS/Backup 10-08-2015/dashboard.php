<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
</head>
<body>

<?php include ABSPATH.'include/menu.php'; ?>
<hr>
	<h2>Dashboard</h2>
	<?php 
	echo $_SESSION['user']->first_name;
	?>
</body>
</html>