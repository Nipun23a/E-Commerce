<?php
require "connection.php";
$pid=$_POST["pid"];
$status=$_POST["state"];

Database::iud("UPDATE `product` SET `status_id`='".$status."' WHERE `id`='".$pid."'");
echo "success";

?> 