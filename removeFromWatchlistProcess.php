<?php
require "connection.php";

$wid=$_POST["wid"];

Database::iud("DELETE FROM `watchlist` WHERE `id`='".$wid."';");
echo "success";
?>