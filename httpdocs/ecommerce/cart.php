<!DOCTYPE>
<?php
session_start();

include("functions/functions.php");
include("inludes/db.php");

?>
<html>
		<head>
		<title>Hamro Pasal</title>
		
		<link href="styles/footer.css" rel="stylesheet">
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
<!--Main container starts from here-->
	<div class="main_wrapper">
		<body>
	
		
		<!--Header starts from here-->
		<div class="header_wrapper">
			<ul>
			<a href="index.php"><img id="logo" src="Img/logo.jpg"/></a>
			<img id="banner" src="Img/banner.jpg"/>
			</ul>
		<ul>
		
			<!--Navigation bar starts from here-->
			<div class="menubar">
			
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">Products</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact</a></li>
				
				</ul>
		
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder= "Search a Product"/>
						<input type="submit" name="search" value="Search"/>
					</form>
				</div>
		
			</div>
			</ul>
			</div>
			<!--header ends from here-->
			
			<!--Navigation bar ends from here-->
		
		<!--Content_wrapper starts from here-->
		<div class="content_wrapper">
			
			<div id ="sidebar"> 
			
				<div id="sidebar_title">Men</div>
				
				<ul id="saman">
					
					<?php getMen(); ?>					
									
				</ul>
				
				<div id="sidebar_title">Women</div>
				
				<ul id="saman">
					
					<?php getWomen(); ?>
									
				</ul>
				
				<div id="sidebar_title">Kids</div>
				
				<ul id="saman">
					
					<?php getKids(); ?>
									
				</ul>
				
			</div>
			<div id="content_area"> 
			
			<?php scart(); ?>
							
			<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					<?php
					
						if(isset($_SESSION['customer_email'])){
							
							echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'> Your</b>";
	
						}
						
						else{
							
							echo "<b>Welcome!</b>";
							
						}
					
					?>
					
					
					<b style="color:yellow">Shopping Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="index.php" style="color:yellow">Back to Shop</a>
					
					<?php
					
						if(!isset($_SESSION['customer_email'])){
							
							echo "<a href='checkout.php' style='color:orange'>Login</a>";
							
						}
						else{
							
							echo "<a href='logout.php' style='color:orange'>Logout</a>";
							
						}
					
					?>
					
					</span>
				
				</div>
								
				<div id="products_box">
				
					<form action="" method="post" enctype="multipart/form-data">
						
						<table align="center" width="700" bgcolor="skyblue">
													
							<tr align="center">
							
							<th>Remove</th>
							<th>Products</th>
							<th>Quantity</th>
							<th>Total Price</th>
							
							</tr>
							
							
							<?php
								$total = 0;
		
								global $con;
		
								$ip = getIp();
		
								$sel_price = "select * from scart where ip_addr='$ip'";
		
								$run_price = mysqli_query($con, $sel_price);
			
									while($p_price=mysqli_fetch_array($run_price)){
				
										$pro_id = $p_price['pr_id'];
					
										$pro_price = "select * from products where product_id='$pro_id'";
				
										$run_pro_price = mysqli_query($con,$pro_price);
				
										while($pp_price = mysqli_fetch_array($run_pro_price)){
						
											$product_price = array($pp_price['product_price']);
											
											$product_title = $pp_price['product_title'];
											
											$product_image = $pp_price['product_image'];
											
											$single_price = $pp_price['product_price'];
						
											$values = array_sum($product_price);
						
											$total += $values;
					
						
								?>
								
							<tr align="center">
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
								<td><?php echo $product_title; ?><br>
									<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60">
								</td>
								<td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>" /></td>
								
								<?php
								
									if(isset($_POST['update_cart'])){
										
										$qty = $_POST['qty'];
										
										$update_qty = "update scart set qty='$qty'";
										
										$run_qty = mysqli_query($con, $update_qty);
										
										$_SESSION['qty'] = $qty;
										
										$total = $total*$qty;
	
									}
								
								?>
								
								<td><?php echo "$" . $single_price; ?></td>
							</tr>
							
						<?php }} ?>
						
						<tr>
								<td colspan="4" align="right"><b>Sub Total:</b></td>
								<td><?php echo "$" . $total; ?></td>
						</tr>
							
						<tr align="center">
							<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
							<td><input type="submit" name="continue" value="Continue Shopping" /></td>
							<td><a href="checkout.php" style="text-decoration:none"><button>Checkout</a></button></td>
						</tr>

						</table>
					
					</form>
					
					<?php
					
				//	function updatecart(){ 						
						global $con;
					
						$ip = getIp();
					
						if(isset($_POST['update_cart'])){
							
							foreach($_POST['remove'] as $remove_id){
								
								$delete_product = "delete from scart where pr_id='$remove_id' AND ip_addr='$ip'";
								
								$run_delete = mysqli_query($con, $delete_product);
								
								if($run_delete){
									
									echo "<script>window.open('cart.php','_self')</script>";
									
								}
								
							}

						}
						
						if(isset($_POST['continue'])){
							
							echo "<script>window.open('index.php','_self')</script>";
							
						}
					
					//	echo $up_cart = updatecart();
					
				//	}
					
					?>
					
				</div>
			
			</div>
		</div>
		<!--Content_wrapper ends from here-->
		
		</body>


		<footer>

		    <div class="footer" id="footer">
		        <div class="container">
		            <div class="row">
		                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
		                    <h3> Categories </h3>
		                    <ul>
		                        <li> <a href="#"> Men </a> </li>
		                        <li> <a href="#"> Women </a> </li>
		                        <li> <a href="#"> Kids </a> </li>
		                        <li> <a href="#"> All </a> </li>
		                    </ul>
		                </div>
		                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
		                    <h3> Menu </h3>
		                    <ul>
		                        <li> <a href="#"> Home </a> </li>
		                        <li> <a href="#"> Products </a> </li>
		                        <li> <a href="#"> Orders</a> </li>
		                        <li> <a href="#"> My Cart</a> </li>
		                    </ul>
		                </div>
		                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
		                    <h3> Connect  </h3>
		                    <ul>
		                        <li> <a href="#"> Login </a> </li>
		                        <li> <a href="#"> Register </a> </li>
		                        <li> <a href="#"> My Account </a> </li>
		                        <li> <a href="#"> FAQ(s) </a> </li>
		                    </ul>
		                </div>
		                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
		                    <h3> Contact Info </h3>
		                    <ul>
		                        <li> Email: </li>
		                        <li> <a href="#">info@hamropasal.com </a> </li>
		                        <li> Address: </li>
		                        <li>901 8th St S</li>
		                        <li>Moorhead, MN 56562</li>
		                        

		                    </ul>
		                </div>
		                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
		                    <h3> Stay Updated! </h3>
		                    <ul>
		                        <li>
		                            <div class="input-append newsletter-box text-center">
		                                <input type="text" class="full text-center" placeholder="Email ">
		                                <button class="btn  bg-gray" type="button"> Subscribe <i class="fa fa-long-arrow-right"> </i> </button>
		                            </div>
		                        </li>
		                    </ul>
		                    <ul class="social">
		                        <li> <a href="#"> <i class=" fa fa-facebook"></i> </a> </li>
		                        <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
		                        <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
		                        <li> <a href="#"> <i class="fa fa-pinterest"></i> </a> </li>
		                        <li> <a href="#"> <i class="fa fa-youtube"></i> </a> </li>
		                    </ul>
		                </div>
		            </div>
		            <!--/.row--> 
		        </div>
		        <!--/.container--> 
		    </div>
		    <!--/.footer-->
		   
		    <div class="footer-bottom">
		        <div class="container">
		            <p class="pull-left"> Copyright © Hamropasal.com 2018. All rights reserved. </p>
		            <div class="pull-right">
		                <ul class="nav nav-pills payments">
		                	<li><i class="fa fa-cc-visa"></i></li>
		                    <li><i class="fa fa-cc-mastercard"></i></li>
		                    <li><i class="fa fa-cc-amex"></i></li>
		                    <li><i class="fa fa-cc-paypal"></i></li>
		                </ul> 
		            </div>
		        </div>
		    </div>
		    <!--/.footer-bottom--> 
		</footer>
	</div>
	<!--Main container ends from here-->
</html>