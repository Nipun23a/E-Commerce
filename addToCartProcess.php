<?php 

require"connection.php";
session_start();

$productid=$_POST["pid"];
$quantity=$_POST["qty"];
$email=$_SESSION["user"]["email"];

Database::iud("INSERT INTO `cart` (`product_id`,`user_email`,`qty`) VALUES ('".$productid."','".$email."','".$quantity."')");

echo "success"
?>