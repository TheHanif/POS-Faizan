<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Terminal</title>
	<link href="assets/css/reset.css" rel="stylesheet">
	<link href="assets/css/general.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/tinyscrollbar.css" rel="stylesheet" >

	<script type="text/javascript" src="assets/js/jquery.latest.js"></script>
        
        <script src="assets/js/jquery.tinyscrollbar.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                var $scrollbar = $("#scrollbar1");
                $scrollbar.tinyscrollbar();
                subtotalcalc();

                $("#latest_product_submit").on('submit', function(event) {
                	event.preventDefault();
                	latestqty=$("#latestqty").val();
                	$.post('terminal_list.php', {'latestqty': latestqty}, function(data) {
                		console.log(data);
                		$(data).appendTo('.overview').find('ul');
                		subtotalcalc(); // Refresh Subtotal Section

                		$('.product_list').each(function(index, el) {
					    	$(this).find('.product').find('div').first().text((index+1));
					    });
                	});
                });

            	$(".overview").on('click', '.itemDelete',function(event) {
                	event.preventDefault();
                	var $this = $(this);
                	$.get($this.attr('href'), function(data){
                		$this.parents('li').remove();
                		subtotalcalc(); // Refresh Subtotal Section

                		$('.product_list').each(function(index, el) {
					    	$(this).find('.product').find('div').first().text((index+1));
					    });

                	});
                });
            	
                function subtotalcalc (event) {
                	//alert('Press Hit Button');
                	// Sub Total All Amount Table and save in subtotal variable
                	var subtotal = 0;
				    $('.subtotalAmt').each(function() {
				        subtotal += parseInt($(this).val());
				    });
				    // Display Value to Sub Total Amount
				    $("#subtotalAmount").text(subtotal);
				    // Display Value to Discount Amount
				    var discounst = 50;
				    $("#discountAmount").text(discounst);
				    //Display Value to Tax Amount
				    var tax = 100;
				    $("#taxAmount").text(tax);
				    //Display Value to Total Amount
				    var totalamount = subtotal+tax - discounst;
			        $("#totalAmount").text(totalamount);
			        $(".finalAmount").text('Rs. '+totalamount);
                }

				var $calState = false;
                $(document).keypress(function(e) {
				  // Delete Button
				  if(e.which == 68) {
				    alert('Press Delete');
					var itemNumber = prompt("Enter Item Number", "0");
					if (itemNumber != null) {
					    alert("You Select Item # " + itemNumber);
					    var $overview = $('.overview');
					    $overview.find('ul').find('li').eq((itemNumber-1)).find('a').click();
					}else {
						alert('No Item Select');
					}
				  }
				  // Hold Button
				  else if(e.which == 72) {
				    alert('Press Hold');
				    window.location.href = "old.php";
				  }
				  // Switch Button
				  else if(e.which == 83) {
				    alert('Press Switch');
				     $('#switchModal').click();
				  }

				  // Checkout Button
				  else if((e.keyCode == 10 || e.keyCode == 13) && e.ctrlKey) {
				  	$calState = true;
				    $("#latestqty").prop('disabled', true);
				    $(".calculator input").prop('disabled', false);
				    $(".calculator").css({opacity: 1});
				  }
				  // Calculator Button 
				  else if($calState == true && (e.which == 49 || e.which == 50 || e.which == 51 || e.which == 52 || e.which == 53 || e.which == 54 || e.which == 55 || e.which == 56 || e.which == 57 || e.which == 48 || e.which == 190)) {
				    var $codeVal = String.fromCharCode(e.which);
				    var current = $(".calculator input").val();
				    newcurrent = current+$codeVal; 
				    if(current == '0'){newcurrent = $codeVal; }
				    // current = 0;
				    $(".calculator input").val(newcurrent);
				  }
				  // Calculator Enter Button
				  else if($calState == true && e.which == 13) {
				        // alert('Press Enter');
					    var totalamount = parseInt($("#totalAmount").text());
					    var balanceamount = newcurrent-totalamount; 
					    $(".calculator input").val(balanceamount);
					    $(".calculator input").css({
					    	    background: '#00FF13',
	    						color: '#000'
					    });
					    console.log(balanceamount);
				  }
				});

				$(document).keyup(function(e) {
				  // Calculator C Button
				  if(e.which == 27) {
				    // alert('Press Esc');
				    $(".calculator input").val(0);
				  }
				  // Calculator Dacemal Button 
				  else if($calState == true && (e.keyCode == 110 || e.keyCode == 190)) {
				  	// alert('Press Decimal');
				    var current = $(".calculator input").val();
				    newcurrent = current+ '.'; 
				    if(current == '0'){newcurrent = $codeVal; }
				    // current = 0;
				    $(".calculator input").val(newcurrent);
				  }
				});
            });
        </script> 
</head>
<body>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Swtich Sessions</h4>
	      </div>
	      <div class="modal-body">
	        <?php
				//print_f($_SESSION['hold_session'][3]);
				foreach ($_SESSION['hold_session'] as $key => $value) {
					echo $key .'</BR>';
					//print_f($value);
					//echo $value[$barcode]['quantity'];
				}
	        ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>



	<div class="container">
		<div class="row">
			<div class="col-md-12 userHead">
				<ul>
					<li class="col-md-3">
						<p>WELCOME : <?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></p>
					</li>
					<li class="col-md-3">
						<p>Date &amp; Time : <span><?php $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
 						echo $date->format("j-n-Y, g:i a"); ?></span></p>
					</li>
					<li class="col-md-2">
						<p>Shift Number : <span> 5 </span></p>
					</li>
					<li class="col-md-3">
						<p>Terminal Point Number : <span> 8 </span></p>
					</li>
					<li class="col-md-1">
						<p><a href="login.php?logout=true"><img src="assets/images/login.png"/></a></p>
					</li>
				</ul>
			</div>
			<div class="col-md-12 compHead">
					<div class="col-md-3">
						<img src="assets/images/logo.png" class="img-responsive marginauto" />
					</div>
					<div class="col-md-4 col-md-offset-1">
						<p>Customer Name : <span> <input type="text" value="Raheel Ghani"></span></p>
					</div>
					<div class="col-md-4">
						<p class="alignRight">Bill Number : <span> 156 </span></p>
					</div>
				</ul>
			</div>
		</div><!-- Row Close -->

		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12 latestScan">
					<form action="#" method="post" name="latest_product_submit" id="latest_product_submit">
						<div class="col-md-10 nopadding">
							<h1><?php echo $_SESSION['barcode_detail']['name']; ?></h1>
							<p>Free Pencil</p>
							<p><?php echo $_SESSION['barcode']; ?></p>
						</div>
						<div class="col-md-2 latestQty">
							<input type="text" name="latestqty" id="latestqty" value="<?php echo $_SESSION['barcode_detail']['quantity']; ?>">
						</div>
					</form>
				</div><!-- latestScan Close -->

				<div class="col-md-12 productTable">
					<ul class="headingTable">
	                    <li class="col-md-1 nopadding">#</li>
	                    <li class="col-md-5">Description</li>
	                    <li class="col-md-2 nopadding">Price</li>
	                    <li class="col-md-2">Qty</li>
	                    <li class="col-md-2 nopadding noborderRight">Total</li>
	                    <div class="clearfix"></div>
                	</ul>
					<div id="scrollbar1">
			        <!--    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div> -->
			            <div class="viewport">
			                <div class="overview">
			                <ul>
			                	<?php 
			                	$subtotalamount = 0;
			                	$count = 1;
			                	if(isset($_SESSION['terminal_list'])){
									foreach ($_SESSION['terminal_list'] as $key => $value) {
										$barcode = key($value);
									?>
									<li class="col-md-12 nopadding product_list">
					                    <div class="product">
						                    <div class="col-md-1 nopadding alignCenter"><?php echo $count; ?></div>
						                    <div class="col-md-5 "><?php echo $value[$barcode]['name']; ?><a class="itemDelete" href="terminal_list.php?product_id=<?php echo $key ?>" style="color:#fff;"><span class="glyphicon glyphicon-trash floatRight" aria-hidden="true"></span></a></div>
						                    <div class="col-md-2 alignRight paddingright30"><?php echo $price = number_format((float)$value[$barcode]['price'], 2, '.', '') ?></div>
						                    <div class="col-md-2 alignCenter"><input type="text" value="<?php echo $qty = $value[$barcode]['quantity']; ?>"/></div>
						                    <div class="col-md-2 alignRight paddingright30"><?php echo $subtotal = number_format((float)$price * $qty, 2, '.', ''); ?><input type="hidden" class="subtotalAmt" value="<?php echo $subtotal; ?>" /></div>
						                    <div class="clearfix"></div>
					                	</div>
					                	<div class="productoffer">
					                		<div class="col-md-5 col-md-offset-1">Free Pencil</div>
						                    <div class="col-md-6 nopadding"></div>
						                    <div class="clearfix"></div>
					                	</div>
				                	</li><!-- One Product Close -->
									<?php
									$subtotalamount += $subtotal;
									$count++;
				                	}
				                } // Close If Session Line
			                	?>
			                </ul>
			                </div>
			            </div>
			        </div>
				</div><!-- Product Table Close -->
				
				<div class="col-md-12 marginTop subTotal">
					<ul>
						<li class="col-md-12">
							<div class="col-md-10">Sub Total</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="subtotalAmount">0</span></div>
						</li>
						<li class="col-md-12 bgdark">
							<div class="col-md-10">Discount</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="discountAmount">0</span></div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10">Taxes</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="taxAmount">0</span></div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10">Totals</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="totalAmount">0</span></div>
						</li>
					</ul>
				</div><!-- latestScan Close -->

				<div class="col-md-12 finalBill nopaddingRight">
					<div class="col-md-6 nopadding">
						<h1>Billed Amount</h1>
					</div>
					<div class="col-md-6 marginTop alignRight nopaddingRight">
						<span class="finalAmount">
							Rs. 0.00
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 terminalControl">
				<div class="col-md-6 nopadding">
					<button>Hold<br/><span>(caps h)</span></button>
				</div>
				<div class="col-md-6 nopadding">
					<button id="switchModal" data-toggle="modal" data-target="#myModal">switch<br/><span>(caps s)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>configuration setting<br/><span>(F3)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>delete<br/><span>(caps d)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>change / edit<br/><span>(F5)</span></button>
				</div>

				<div class="col-md-4 nopadding">
					<button>REPORT<br/><span>(F2)</span></button>
				</div>

				<div class="col-md-4 nopadding">
					<button>cash<br/><span>(F7)</span></button>
				</div>

				<div class="col-md-4 nopadding">
					<button>card<br/><span>(F8)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button class="bgcheckoutBtn" id="checkoutBtn">checkout<br/><span>(cltr + enter)</span></button>
				</div>

				<div class="clearfix"></div>
				<div class="calculator">
					<div class="col-md-12 nopadding">
						<input type="text" value="0"  disabled="disabled" /> 
					</div>
					<div class="col-md-9 nopadding">
						<div class="col-md-4 nopadding">
							<button>7</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>8</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>9</button>
						</div>	
						<div class="col-md-4 nopadding">
							<button>4</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>5</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>6</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>1</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>2</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>3</button>
						</div>
						<div class="col-md-8 nopadding">
							<button class="zeroBtn">0</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>.</button>
						</div>
					</div>
					<div class="col-md-3 nopadding">
						<div class="col-md-12 nopadding">
							<button class="clearBtn">C</button>
						</div>
						<div class="col-md-12 nopadding">
							<button class="clearBtn" style="font-size:15px;">Enter</button>
						</div>	
					</div>
					
				</div>
				
				
				
				<div class="clearfix"></div>
			</div><!-- Right Col Close -->
		</div><!-- Row Close -->


		<div class="row footer">
			<div class="col-md-4">
				<p>Copyright 2015 </p>
			</div>

			<div class="col-md-4">
				<p>email: info@webnet.com.pk</p>
			</div>

			<div class="col-md-4 ">
				<img src="assets/images/powered_logo.png" class="img-responsive marginauto flogo" />
			</div>
		</div>
	</div><!-- Container Close -->




	
	<!--Attched Bootstrap JS  -->
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>