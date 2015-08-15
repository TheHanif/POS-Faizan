<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View User</title>
</head>
<body>

<?php include ABSPATH.'include/menu.php'; ?>
<hr>
<h2>View User</h2>
<?php 
$user = new user();

$results = $user->get_users();

if ($results) {
?>
	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>User Name</th>
			<th>Email</th>
			<th>Designation</th>
			<th>Mobile</th>
			<th>Action</th>
		</tr>
			<?php 
			foreach($results as $res){
			echo '<tr>';
			echo '<td>'. $res->fname .'</td>';
			echo '<td>'. $res->lname .'</td>';
			echo '<td>'. $res->login .'</td>';
			echo '<td>'. $res->email.'</td>';
			echo '<td>'. $res->designation .'</td>';
			echo '<td>'. $res->mobile .'</td>';
			echo '<td><a href="add_user.php?id='.$res->id.'">Edit</a></td>';
			echo '</tr>';
			}
			?>
	</table>
<?php
}else{
	echo 'Error';
} 
?>
</body>
</html>