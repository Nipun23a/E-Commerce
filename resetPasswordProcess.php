<?php

require "connection.php";

$em=$_POST["em"];
$vc=$_POST["vc"];
$newpw=$_POST["newpw"];
$newcpw=$_POST["newcpw"];

if(empty($em)){
    echo"Email address is missing..";
}else if(empty($newpw)){
    echo"Please enter New Password.";
}else if(empty($vc)){
    echo"Please enter verification code.";
}else if(empty($newcpw)){
    echo"Please enter Confirm Password.";
}else if($newpw!=$newcpw){
    echo"Your new passsword & confirm password is mismatch.";
}else if(strlen($newpw)<=5 || strlen($newpw)>20){
    echo"Password length should be between 5 to 20ec";
}else{

    $result=    Database::search("SELECT * FROM `users` WHERE `email`='".$em."' AND `verification_code`='".$vc."'");
    $numrs=$result->num_rows;

        if($numrs==1){
        Database::iud("UPDATE `users` SET `password`='".$newpw."' WHERE `email`='".$em."'");
        echo"success";
        }else{
            echo"Invalied Emaill Addess or Verification Code.";
        }
}

?>