<!DOCTYPE>
<?php

session_start();
include("functions/functions.php");
include("includes/db.php");

?>
<html>
	<head>
			<title>Hamro Pasal</title>
		<!--importing some css from w3school demo files-->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
						<input type="text" name"user_query" placeholder= "Search a Product"/>
						<input type="submit" name="search" value="Search"/>
					</form>
				</div>
		
			</div>
			</ul>
			</div>
			<!--header ends here-->
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
					
					Welcome Everyone! <b style="color:yellow">Shopping Cart - </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
					
					</span>
				
				</div>
								
					<form action="customer_register.php" method="post" enctype="multipart/form-data" />
					
						<table align="center" width="750">
						
							<tr align="center">
								<td colspan="6"><h2>Create an Account</h2></td>
							</tr>
							
							<tr>
								<td align="right">Customer Name:</td>
								<td><input type="text" name="c_name" required /></td>			
							</tr>
							
							<tr>
								<td align="right">Customer Email:</td>
								<td><input type="text" name="c_email" required /></td>			
							</tr>
							
							<tr>
								<td align="right">Customer Password:</td>
								<td><input type="password" name="c_pass" required /></td>			
							</tr>
							
							<tr>
								<td align="right">Customer Image</td>
								<td><input type="file" name="c_image" required /></td>			
							</tr>
							
							<tr>
								<td align="right">Customer Country:</td>
								<td>
									<select name="c_country">
										<option>Select a Country</option>
										<option>United States of America</option>
										<option>Unitd Kingdom</option>
									</select>
								</td>			
							</tr>
							
							<tr>
								<td align="right">Customer City:</td>
								<td><input type="text" name="c_city" required /></td>			
							</tr>
							
							<tr>
								<td align="right">Customer Contact</td>
								<td><input type="text" name="c_contact" required /></td>			
							</tr>
							
							<tr>
								<td align="right">Customer Address</td>
								<td><input type="text" name="c_address" required /></td>			
							</tr>
							
							<tr align="center">
								<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
							</tr>
							
						</table>
						
					</form>	
			<div>
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
<?php
	if(isset($_POST['register'])){
		
			
			$ip = getIp();
			
			$c_name = $_POST['c_name'];
			$c_email = $_POST['c_email'];
			$c_pass = $_POST['c_pass'];
			$c_image = $_FILES['c_image']['name'];
			$c_image_tmp = $_FILES['c_image']['tmp_name'];
			$c_country = $_POST['c_country'];
			$c_city = $_POST['c_city'];
			$c_contact = $_POST['c_contact'];
			$c_address = $_POST['c_address'];
		
		
		
			move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
			$insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";
		
			$run_c = mysqli_query($con, $insert_c);
			
			$sel_cart = "select * from cart where ip_addr='$ip'";
			
			$run_cart = mysqli_query($con, $sel_cart);
			
			$check_cart = mysqli_num_rows($run_cart);
			
			if($check_cart==0){
				
				$_SESSION['customer_email']=$c_email;
				
				echo "<script>alert('Account has been created sussefully!')</script>";
				
				echo "<script>window.open('customer/my_account.php','_self')</script>";
				
			}
			else{			
			
				$_SESSION['customer_email']=$c_email;
				
				echo "<script>alert('Account has been created sussefully!')</script>";
				
				echo "<script>window.open('checkout.php','_self')</script>";
				
			}
		
		
	}






?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
