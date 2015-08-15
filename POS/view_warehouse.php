<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Product in Warehouse</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$warehouse = new warehouse();
				$results = $warehouse->get_products();

				$product = new product();
				$all_product = $product->get_product();
				if ($results) {
				?>
				<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Product Name</th>
						<th>Product Cost</th>
						<th>Product Price</th>
						<th>Product Quantity</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){ ?>
						<tr>
						<td><?php echo $res->p_name; ?></td>
						<td><?php echo $res->cost; ?></td>
						<td><?php echo $res->price; ?></td>
						<td><?php echo $res->quantity; ?></td>
						<td><a href="add_warehouse.php?id=<?php echo $res->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						</tr>
						<?php
						}
						?>
				</table>
				<?php
				}else{
					echo 'Error';
				} 
				?>
			</div>
		<div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>