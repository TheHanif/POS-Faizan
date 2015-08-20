<?php 
require_once 'common/init.php';

$inventorty = new inventory();

if(isset($_GET['bc'])){
	$barcode = $_GET['bc'];
	$results = $inventorty->get_product($barcode);

	print_f($results);
	
	if ($results) {
		foreach($results as $res){
			$barcode_detail = array (
							'product_id' => $res->inv_id,
							'name' => $res->p_name,
							'price' => $res->inv_price,
							'quantity' => 1,
							'discount_id' => $res->discount_id,
							'discount_product_id' => $res->discount_product_id,
							'discount_type' => $res->discount_type,
							'discount_amount' => $res->discount_amount,
							'discount_min_purchase_qty' => $res->discount_min_purchase_qty,
							'discount_mode' => $res->discount_mode,
							'offer_id' => $res->offer_id,
							'offer_discount_id' => $res->offer_discount_id,
							'offer_product_id' => $res->offer_product_id,
							'offer_product_quantity' => $res->offer_product_quantity,
							'offer_status' => $res->offer_status,
							);
			$_SESSION['barcode'] = $barcode;
			print_f($_SESSION['barcode']);
			$_SESSION['barcode_detail'] = $barcode_detail;
			print_f($_SESSION['barcode_detail']);
		}
	}else{
		echo 'Error';
	} 
}

/*
echo $barcode = $_GET['bc'];

$barcode_detail = array (
	'product_id' => 1,
	'name' => 'Shahsons Picasso Ball Pen',
	'price' => '100',
	'quantity' => 1,
	);

$_SESSION['barcode'] = $barcode;
$_SESSION['barcode_detail'] = $barcode_detail;
*/

// print_f($barcode_detail);

?>