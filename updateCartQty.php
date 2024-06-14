<?php

require "connection.php";

$q= $_POST["qty"];
$id= $_POST["cid"];

Database::iud("UPDATE `cart` SET `qty`='".$q."' WHERE `id`='".$id."';");

echo"success";
?>