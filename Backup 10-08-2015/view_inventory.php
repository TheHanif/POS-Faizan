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
<h2>View Inventory</h2>
<?php 
$inventory = new inventory();

$results = $inventory->get_int();

if ($results) {
?>
	<table border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Product Cost</th>
			<th>Product Price</th>
			<th>Product Quantity</th>
			<th>Product Barcode</th>
			<th>Action</th>
		</tr>
			<?php 
			foreach($results as $res){
			echo '<tr>';
			echo '<td>'. $res->inv_id .'</td>';
			echo '<td>'. $res->inv_name .'</td>';
			echo '<td>'. $res->inv_cost.'</td>';
			echo '<td>'. $res->inv_price .'</td>';
			echo '<td>'. $res->inv_quantity .'</td>';
			echo '<td>'. $res->inv_barcode .'</td>';
			echo '<td><a href="add_inventory.php?id='.$res->inv_id.'">Edit</a></td>';
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