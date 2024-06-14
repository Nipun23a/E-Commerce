<?php

require "connection.php";

$category = $_POST["category"];

$category_rs = Database::search("SELECT * FROM `category` WHERE `name`='" . $category . "'");
$category_rs_num=$category_rs->num_rows;
$category_data=$category_rs->fetch_assoc();

if ($category_rs_num==1) {
    if($category_data["status_id"]=="2"){
        Database::iud("UPDATE `category` SET `status_id`='1' WHERE `name`='".$category."'");
    echo"New Category added successful.";
    }else{
        echo "Category has been aleready exist.";
    }
}else{
    Database::iud("INSERT INTO `category`(`name`,`status_id`) VALUES('".$category."','1');");
    echo"New Category added successful.";
}

?>