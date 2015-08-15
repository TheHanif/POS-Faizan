<?php require_once 'common/init.php';

$inventory = new inventory();

$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

if (isset($_POST['add_inventory'])) {
	
	// Update old record
	if (isset($ID)) {
		$results = $inventory->inv_update($_POST, $ID);
	}else{ // Insert new
		$results = $inventory->inv_insert($_POST);
	}

	if ($results) {
		echo 'Success';
	}else{
		echo 'Error';
	}
}

if (isset($ID)) {
	$inventory_result = $inventory->inv_get($ID);
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Inventroy</title>
</head>
<body>

<?php include ABSPATH.'include/menu.php'; ?>
<hr>
	<h2>Add Inventory</h2>

<form action="add_inventory.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
	
	<label for="name">Item Name: <input type="text" name="inv_name" value="<?php echo (isset($ID))? $inventory_result->inv_name : '' ?>"></label><br>
	<label for="cost">Cost: <input type="text" name="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>"></label><br>
	<label for="price">Price: <input type="text" name="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>"></label><br>
	<label for="quantity">Quantity: <input type="text" name="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>"></label><br>
	<label for="barcode">Barcode: <input type="text" name="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>"></label><br><br>
	<input type="submit" name="add_inventory" value="Add Item">

</form>

</body>
</html>