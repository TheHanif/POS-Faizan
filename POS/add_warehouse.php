<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product in Warehouse</p>
			</div>
			
			<?php 
			$product = new product();
			$all_product = $product->get_product();

			$warehouse = new warehouse();
			
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_product_warehouse'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $warehouse->update_product_warehouse($_POST, $ID);
				}else{ // Insert new
					$results = $warehouse->insert_product_warehouse($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Inventory Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$product_result = $warehouse->get_products($ID);
			}
			?>

			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-12">
				<h4>Product Detail: </h4>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="itemname" class="col-sm-3 control-label">Product Name: </label>
					<div class="col-sm-8" style="margin-top:7px;">
						<?php 
						if(isset($ID)){
							foreach ($all_product as $all_product => $product) {
								if($product->p_id == $product_result->product_id){
									echo $product->p_name;
									echo '<input type="hidden" name="product_id" value="'.$product_result->product_id.'" />';
								}
							} 
						}
						else {
						?>	
						<select name="product_id" id="product_id">
							<?php 
							foreach ($all_product as $product) { ?>
							<option value="<?php echo $product->p_id; ?>"<?php (isset($ID))? $pro = $product_result->product_id : ''; if(isset($ID)){if($product->p_id == $pro){echo 'selected=selected';}}?>><?php echo $product->p_name; ?></option>
							<?php
							}
							?>
						</select>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="product_cost" class="col-sm-3 control-label">Cost: </label>
					<div class="col-sm-8">
						<input type="text" name="product_cost" id="product_cost" value="<?php echo (isset($ID))? $product_result->cost : '' ?>" class="form-control <?php echo $product->p_cost; ?>" required>
					</div>
				</div>
			</div>
			<div class="col-md-6">	
				<div class="form-group">
				    <label for="product_price" class="col-sm-3 control-label">Price: </label>
					<div class="col-sm-8">
						<input type="text" name="product_price" id="product_price" value="<?php echo (isset($ID))? $product_result->price : '' ?>" class="form-control <?php echo $product->p_price; ?>" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
					<label for="product_quantity" class="col-sm-3 control-label">Quantity: </label>
					<div class="col-sm-8">
						<input type="text" name="product_quantity"  value="<?php echo (isset($ID))? $product_result->quantity : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-6">	
				<div class="form-group">
					<label for="product_barcode" class="col-sm-3 control-label">Barcode: </label>
					<div class="col-sm-8">
						<input type="text" name="product_barcode"  id="product_barcode" value="<?php echo (isset($ID))? $product_result->barcode : '' ?>" class="form-control" required>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<hr/>
			<div class="col-md-12">
				<h4>Product Detail: </h4>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Type</label>
					<div class="col-sm-8">
						<input type="text" name="product_type" value="<?php echo (isset($ID))? $product_result->skutype : '' ?>" class="form-control" required>
					</div>
			  	</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Volume</label>
					<div class="col-sm-8">
						<select name="product_volume">
							<?php 
							foreach($product_volume as $product_volume=>$value){ ?>
							<option value="<?php echo $product_volume; ?>" <?php (isset($ID))? $pro = $product_result->skuvalue : ''; if(isset($ID)){if($product_volume == $pro){echo 'selected=selected';}}?>><?php echo $value; ?></option>
							<?php	
							}
							?>
						</select>
					</div>
			  	</div>
			</div>
			<div class="clear"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn submitBtn" name="add_product_warehouse"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product in Warehouse</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>

<!--
<form action="add_inventory.php<?php echo isset($ID)? ('?id='.$ID) : ''; ?> " method="post">
	<label for="name">Item Name: <input type="text" name="inv_name" value="<?php echo (isset($ID))? $inventory_result->inv_name : '' ?>"></label><br>
	<label for="cost">Cost: <input type="text" name="inv_cost" value="<?php echo (isset($ID))? $inventory_result->inv_cost : '' ?>"></label><br>
	<label for="price">Price: <input type="text" name="inv_price" value="<?php echo (isset($ID))? $inventory_result->inv_price : '' ?>"></label><br>
	<label for="quantity">Quantity: <input type="text" name="inv_quantity" value="<?php echo (isset($ID))? $inventory_result->inv_quantity : '' ?>"></label><br>
	<label for="barcode">Barcode: <input type="text" name="inv_barcode" value="<?php echo (isset($ID))? $inventory_result->inv_barcode : '' ?>"></label><br><br>
	<input type="submit" name="add_inventory" value="Add Item">
</form>
-->
<?php require_once 'footer.php'; ?>