<?php
require"connection.php"; 

$category=$_POST["cid"];

if(isset($category)){
    Database::iud("UPDATE `category` SET `status_id`='2' WHERE `id`='".$category."'");
    echo"success";
}else{
    echo"Uknown erorr please try again letter";
}
?>