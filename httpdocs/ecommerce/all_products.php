<!DOCTYPE>
<?php

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
			<!--Header ends from here-->	
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
			
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Everyone! <b style="color:yellow">Shopping Cart - </b> Total Items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
					
					</span>
				
				</div>
			
				<div id="products_box">
				
					<?php
	
						$get_pro = "select * from products";
	
						$run_pro = mysqli_query($con, $get_pro);
	
						while($row_pro=mysqli_fetch_array($run_pro)){
		
							$pro_id = $row_pro['product_id'];
							$pro_men = $row_pro['product_men'];
							$pro_women = $row_pro['product_women'];
							$pro_kids = $row_pro['product_kids'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
		
						echo "
		
							<div id='single_product'>
				
								<h3>$pro_title</h3>
				
	<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
			
		<p><b>$ $pro_price</b></p>
				
<a href ='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				
								<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
			
							</div>
						";
	

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