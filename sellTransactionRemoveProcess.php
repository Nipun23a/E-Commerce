<?php
require "connection.php";

$pid= $_POST["pid"];

Database::iud("UPDATE `invoice` SET `status`='2' WHERE `id`='".$pid."';");
echo "success";

?>