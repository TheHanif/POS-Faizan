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

	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="../../lib/jquery.tinyscrollbar.js"></script>
        <script src="assets/js/jquery.tinyscrollbar.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                var $scrollbar = $("#scrollbar1");

                $scrollbar.tinyscrollbar();
            });
        </script>


         <!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
		typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);
		b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
		mixpanel.init("");</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<img src="assets/images/logo.png" class="img-responsive" />
			</div>
			<div class="col-md-10">
				<div style="background-color: #ccc; min-height: 40px; width: 100%; text-align: center; text-transform: uppercase; color: #828282;">
						<h3 style="margin: 0px; padding-top: 7px;">Advertisement Banner</h3>
				</div>
			</div>
		</div><!-- Advertisement Header Row Close -->

		<div class="row">
			<div class="col-md-10">
				<h1>Welcome to <?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></h1>
			</div>
			<div class="col-md-2 marginTop marginBottom">
				<p class="nomargin"><a href="login.php?logout=true">Logout</a></p>
			</div>

			<div class="col-md-4">
				<p><strong>Current Date &amp; Time:</strong> <?php 
					$date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
 					echo $date->format("F j, Y, g:i a"); ?></p>
			</div>
			<div class="col-md-2">
				<p><strong>Shift No: </strong> 5 </p>
			</div>
			<div class="col-md-3">
				<p><strong>Terminal / Point No: </strong> 2 </p>
			</div>
			<div class="col-md-3">
				<p><strong>Bill No: </strong> 015484 </p>
			</div>
		</div><!-- Header Row Close -->

		<div class="row">
			<div class="col-md-2">
				<p><strong>Customer Name: </strong></p>
			</div>
			<div class="col-md-10">
				<input type="text" name="customer_name" value="" placeholder="Enter Customer Name"> 
			</div>
		</div><!-- Row Close -->

		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12">
					<h3>Pepsi 250ml</h3>
				</div>
				<div class="col-md-8">
					<h3 class="nomargin">21315456</h3>
				</div>
				<div class="col-md-4">
					<h3 class="nomargin">Rs. 30.00</h3>
				</div>
				
				<div class="col-md-12">
					<div class="bold">
	                    <div class="col-md-1 nopadding">#</div>
	                    <div class="col-md-5">Description</div>
	                    <div class="col-md-2 nopadding">Price</div>
	                    <div class="col-md-2">Qty</div>
	                    <div class="col-md-2 nopadding">Total</div>
                	</div>
					<div id="scrollbar1">
			            <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
			            <div class="viewport">
			                <div class="overview">
			                <ul>
			                    <li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2"><input type="text" value="1" style="width:30px;"/></div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2"><input type="text" value="1" style="width:30px;"/></div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                	<li class="col-md-12 nopadding">
				                    <div class="col-md-1 nopadding">1</div>
				                    <div class="col-md-5">Pepsi 1ltr</div>
				                    <div class="col-md-2 nopadding">70</div>
				                    <div class="col-md-2">1</div>
				                    <div class="col-md-2 nopadding">70</div>
			                	</li>
			                </ul>
			                </div>
			            </div>
			        </div>

			        <div class="bold">
	                    <div class="col-md-10">Sub Total</div>
	                    <div class="col-md-2">800</div>
	                    
	                    <div class="col-md-10">Discount</div>
	                    <div class="col-md-2">100</div>

						<div class="col-md-10">Tax</div>
	                    <div class="col-md-2">400</div>
						
	                    <div class="col-md-10">Total</div>
	                    <div class="col-md-2">1100</div>
                	</div>
				</div>
			</div><!-- Left Col Close -->
			<div class="col-md-4">
				<div class="col-md-4">
					<button>Hold</button>
				</div>
				<div class="col-md-4">
					<button>Switch</button>
				</div>
				<div class="col-md-4">
					<button>Edit</button>
				</div>
				<div class="col-md-4">
					<button>Cash </button>
				</div>
				<div class="col-md-4">
					<button>Card</button>
				</div>
				<div class="col-md-4">
					<button>Settings</button>
				</div>
				<div class="col-md-4">
					<button>Delete</button>
				</div>
				<div class="col-md-4">
					<button>Report</button>
				</div>

				<div class="clearfix"></div>
				<div class="col-md-4">
					<button>7</button>
				</div>
				<div class="col-md-4">
					<button>8</button>
				</div>
				<div class="col-md-4">
					<button>9</button>
				</div>
				<div class="col-md-4">
					<button>4</button>
				</div>
				<div class="col-md-4">
					<button>5</button>
				</div>
				<div class="col-md-4">
					<button>6</button>
				</div>
				<div class="col-md-4">
					<button id="button_one">1</button>
				</div>
				<div class="col-md-4">
					<button>2</button>
				</div>
				<div class="col-md-4">
					<button>3</button>
				</div>
				<div class="col-md-4">
					<button>0</button>
				</div>
				<div class="col-md-8">
					<button>Checkout</button>
				</div>
				<div class="clearfix"></div>

				<div class="col-md-12">
					<p>Total Amount: </p>
					<h2>Rs. 180/-</h2>
				</div>
			</div><!-- Right Col Close -->
		</div><!-- Row Close -->	

	</div><!-- Container Close -->

	<!--Attched Bootstrap JS  -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).keypress(function(e) {
		  if(e.which == 49) {
		    alert('Press 1');
		  }
		  else if(e.which == 71) {
		    alert('Press G');
		  }
		});


	</script>
</body>
</html>