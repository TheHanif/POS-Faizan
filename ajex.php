<?php 
require_once 'common/init.php';
$terminallist = new terminal();


// Terminal Edit Function
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
	$itemqty		= $_POST['itemqty'];
	$arrayDelete 	= $_POST['rowarray'];
	print_f($itemqty);
	die();
	$terminallist->update_qty_item($itemqty, $arrayDelete);
	return 'sucess';
}

// Terminal Delete Function
if(isset($_GET['delete'])){
	$product_id		= $_GET['delete'];
	$terminallist->delete_item_list($product_id);
	return 'sucess';
}

// Terminal Add Function
if(isset($_POST['action']) && $_POST['action'] == 'add'){
	$product_qty	= $_POST['latestqty'];
	$terminallist->add_item_list($product_qty);
	return 'sucess';
}


?>