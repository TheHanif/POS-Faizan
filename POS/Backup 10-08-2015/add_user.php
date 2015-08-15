<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add User</title>
</head>
<body>

<?php include ABSPATH.'include/menu.php'; ?>
<hr>

<?php 
$user = new user();

$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

if (isset($_POST['add_user'])) {
	// Update old record
	if (isset($ID)) {
		$results = $user->update_user($_POST, $ID);
	}else{ // Insert new
		$results = $user->add_user($_POST);
	}

	if ($results) {
		echo $results;
	}else{
		echo 'Error';
	}
	print_f($results);
} 

if (isset($ID)) {
	$user_result = $user->get_user($ID);
}
?>

<h2>Add User</h2>
<form action="" method="post">
	<label for="fname">First Name <input type="text" name="fname" id="fname" value="<?php echo (isset($ID))? $user_result->fname : '' ?>" required></label> <br>
	<label for="lname">Last Name <input type="text" name="lname" id="lname" value="<?php echo (isset($ID))? $user_result->lname : '' ?>" required></label> <br>
	<label for="email">Email <input type="email" name="email" id="email" value="<?php echo (isset($ID))? $user_result->email : '' ?>" required></label> <br>
	<label for="username">Username <input type="text" name="username" id="username" value="<?php echo (isset($ID))? $user_result->login : '' ?>" required></label> <br>
	<label for="password">Password <input type="password" name="password" id="password" value="<?php echo (isset($ID))? $user_result->password : '' ?>" required></label> <br>
	<label for="mobile">Mobile <input type="text" name="mobile" id="mobile" value="<?php echo (isset($ID))? $user_result->mobile : '' ?>" required></label> <br>
	<label for="phone">Phone <input type="text" name="phone" id="phone" value="<?php echo (isset($ID))? $user_result->phone : '' ?>" required></label> <br>
	<label for="address">Address <input type="text" name="address" id="address" value="<?php echo (isset($ID))? $user_result->address : '' ?>" required></label> <br>
	<label for="city">City <input type="text" name="city" id="city" value="<?php echo (isset($ID))? $user_result->city : '' ?>" required></label> <br>
	<label for="country">Country <input type="text" name="country" id="country" value="<?php echo (isset($ID))? $user_result->country : '' ?>" required></label> <br>
	<label for="nic">NIC <input type="text" name="nic" id="nic" value="<?php echo (isset($ID))? $user_result->nic : '' ?>" required></label> <br>
	<label for="dob">Date of Birth <input type="date" name="dob" id="dob" value="<?php echo (isset($ID))? $user_result->dob : '' ?>" required></label> <br>
	<label for="photo">Photo <input type="file" name="photo" id="photo"></label> <br>
	<label for="designation">Designation 
		<select name="designation" id="designation" required>
			<?php 
			foreach($designation as $designation=>$value){
				?>
					<option value="<?php echo $designation; ?>" <?php (isset($ID))? $des = $user_result->designation : ''; if(isset($ID)){if($designation == $des){echo 'selected=selected';}}?>><?php echo $value; ?></option>
				<?php
			}
			?>
		</select>
	</label> <br>
	<label for="permission">Permission Allow</label> <br>
	<?php 
	foreach($capabilities as $capability=>$value){
		?>
			<?php
			if(isset($ID)){
				$user_capabilities = $user_result->capabilities;
				$user_capabilities = (!empty($user_capabilities))? json_decode($user_capabilities) : array();
			}

				?>
				<label><input type="checkbox" <?php echo (isset($ID) && in_array($capability, $user_capabilities))? 'checked' : ''; ?> name="capabilities[]" value="<?php echo $capability; ?>"><?php echo $value; ?></label><br/>
		<?php
		}
	?>
	<input type="submit" name="add_user" value="Add User">
</form>
</body>
</html>