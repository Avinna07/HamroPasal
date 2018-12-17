<?php 
$name = $_POST['name'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];

$formcontent="From: $name \n Email: $email \n Message: $message";
$recipient = "beesal10@trainfutbol.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You! We will be in touch with you very soon.";
?>