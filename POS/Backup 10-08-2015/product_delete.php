<?php 
require_once 'common/init.php';

if(isset($_GET['product_id'])){
	unset($_SESSION['terminal_list'][$_GET['product_id']]);
	echo 'sucess';
}

print_f($_SESSION['terminal_list']);
?>