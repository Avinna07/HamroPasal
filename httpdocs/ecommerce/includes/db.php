<?php

$con = mysqli_connect("localhost","train_ecommerce","Ecommerce123","trainfut_ecommerce");

if (mysqli_connect_errno()){
	
	echo "Failed to connect to MYSQL:" . mysqli_connect_error();
	
}

?>