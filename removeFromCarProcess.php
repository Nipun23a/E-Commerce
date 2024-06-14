<?php

require "connection.php";

$cid=$_POST["pid"];

Database::iud("DELETE FROM `cart` WHERE `id`='".$cid."'");

echo "success";
?>