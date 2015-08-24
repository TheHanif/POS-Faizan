<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$accounts = new accounts();
			
			// Create General Ledger 
			/*
			$amount = '2000';
			$type = 'credit';
			$account = 'Purchase';
			$account_type = 'General Purchase';
			$date = '24-08-2015';
			$results = $accounts->create_general_ledger($amount, $type, $account, $account_type, $date);
			print_f($results);
			*/

			// Create Sales 
			/*
			$product_id = 2;
			$cost = 20.50;
			$price = 25.00;
			$quantity = 2;
			$total = $price * $quantity;
			$date = '24-08-2015';
			$results = $accounts->create_sales($product_id, $cost, $price, $quantity, $total, $date);
			print_f($results);
			*/

			// Create Profit Loss 
			/*
			$product_id = 2;
			$cost = 20.50;
			$price = 25.00;
			$quantity = 2;
			$cost1 = $cost * $quantity;
			$price1 = $price * $quantity;
			$profit = $price1 - $cost1;
			$date = '24-08-2015';
			$results = $accounts->create_profitloss($product_id, $cost, $price, $quantity, $profit, $date);
			print_f($results);
			*/

			// Create Payable / Receviable
			/*
			$amount = 2000;
			$account = 'bank';
			$person = 'waqar_zaka';
			$date = '24-08-2015';
			$due_date = '31-08-2015';
			$type = 'payable';
			$status = 1;
			$results = $accounts->create_payable_receviable($amount, $account, $person, $date, $due_date, $type, $status);
			print_f($results);
			*/

			// Create Purchase
			/*
			$product = 'Chair';
			$cost = 250.0;
			$quantity = 2;
			$date = '24-08-2015';
			$account = 'Expences';
			$account_type = 'Fixed Expences';
			$results = $accounts->create_purchase($product, $cost, $quantity, $date, $account, $account_type);
			print_f($results);
			*/

			// Get Sales
			//$product_id = 2;
			$to_date = '2015-08-24';
			$to_date = $accounts->_date('Y-m-d H:i:s', $to_date);
			$from_date = '2015-08-31';
			$from_date = $accounts->_date('Y-m-d H:i:s', $from_date);
			$results = $accounts->get_sales(null, $to_date, $from_date);
			print_f($results);
			

			?>			
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>