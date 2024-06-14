<?php 

require "connection.php";
session_start();
$pid=$_POST["pid"];

$watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='".$pid."' AND  `users_email`='" . $_SESSION["user"]["email"] . "'");
$watchlistrsnum=$watchlistrs->num_rows;

if($watchlistrsnum==1){
    echo "Item has been already added.";
}else{
    Database::iud("INSERT INTO `watchlist` (`product_id`,`users_email`) VALUES ('".$pid."','".$_SESSION["user"]["email"]."');");
    echo "success";
}
?>