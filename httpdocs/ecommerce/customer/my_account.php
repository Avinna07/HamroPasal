<!DOCTYPE>
<?php

session_start();
include("functions/functions.php");

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
			<a href="../index.php"><img id="logo" src="Img/logo.jpg"/></a>
			<img id="banner" src="Img/banner.jpg"/>
		</ul>	
		<ul>
			
		
			<!--Navigation bar starts from here-->
			<div class="menubar">
			
				<ul id="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../all_products.php">Products</a></li>
					<li><a href="../cart.php">Shopping Cart</a></li>
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
			<!--header ends from here-->
			<!--Navigation bar ends from here-->
		
		<!--Content_wrapper starts from here-->
		<div class="content_wrapper">
			
			<div id ="sidebar"> 
			
				<div id="sidebar_title">My Account:</div>
				
				<ul id="saman">
				
				<?php
				
					$user = $_SESSION['customer_email'];
					
					$get_img = "select * from customers where customer_email='$user'";
					
					$run_img = mysqli_query($con, $get_img);
					
					$row_img = mysqli_fetch_array($run_img);
					
					$c_image = $row_img['customer_image'];
					
					$c_name = $row_img['customer_name'];
				
					echo "<p style='text-align:center;'> <img src='customer_images/$c_image' width='150' height='150'/>";
				
				?>
					
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>
									
				</ul>
				
			</div>
			<div id="content_area">
					
					<?php scart(); ?>
							
			<div id="shopping_cart">
					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
					
					<?php
					
						if(isset($_SESSION['customer_email'])){
							
							echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
	
						}
					
					?>
					
					<?php
					
						if(!isset($_SESSION['customer_email'])){
							
							echo "<a href='../checkout.php' style='color:orange'>Login</a>";
							
						}
						else{
							
							echo "<a href='logout.php' style='color:orange'>Logout</a>";
							
						}
					
					?>
					
					</span>
				
			</div>
					<div id = "products_box">
					
						<?php
							if(!isset($_GET['my_orders'])){
								if(!isset($_GET['edit_account'])){
									if(!isset($_GET['change_pass'])){
										if(!isset($_GET['delete_account'])){
											
											echo "<h2 style='padding:20px;'>Welcome: $c_name</h2>
											<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
							
										}
									}
								}
							}
						?>
						
						<?php
						
							if(isset($_GET['edit_account'])){
								
								include("edit_account.php");
								
							}
							
							if(isset($_GET['change_pass'])){
								
								include("change_pass.php");
								
							}
							
							if(isset($_GET['delete_account'])){
								
								include("delete_account.php");
								
							}
						
						
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