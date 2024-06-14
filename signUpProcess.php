<?php

require"connection.php";

$fname=$_POST["f"];
$lname=$_POST["l"];
$email=$_POST["e"];
$pw=$_POST["pw"];
$cpw=$_POST["cpw"];
$mobile=$_POST["m"];
$gender=$_POST["g"];
$rdate=date("Y-m-d H:i:s");

$emailrs=Database::search("SELECT * FROM `users` WHERE `email`='".$email."'");
$emailnum=$emailrs->num_rows;

if($emailnum==1){
    echo "Already create account";
}else{
    if (empty($fname)) {
        echo "Plese enter your First Name.";
    } else if (strlen($fname) > 50) {
        echo "First Name mus be less than 50 charcters.";
    }else if (empty($lname)) {
        echo "Plese enter your Last Name.";
    } else if (strlen($lname) > 50) {
        echo "Last Name mus be less than 50 charcters.";
    }else if (empty($email)) {
        echo "Plese enter your Email Address.";
    } else if (strlen($email) >= 100) {
        echo "Last Name mus be less than 50 charcters.";
    }else if (empty($pw)) {
        echo "Plese enter your Password.";
    }else if (empty($cpw)) {
        echo "Plese enter your Confirm Password.";
    }else if(strlen($pw)<5 || strlen($pw)>20){
        echo"Pasword length should be between 05 and 20";
    }else if($pw!=$cpw){
        echo"Password is not maching with confirm password";
    }else if(empty($mobile)){
        echo "Plese enter your Mobile Number.";
    }else if(!preg_match("/0[1,7,8,9][0,1,2,3,4,5,6,7,8][0-9]/",$mobile)){
        echo"Invalid Mobile Number";
    }else if(strlen($mobile)!=10){
        echo "Mobile Number should contain 10 charcters";
    }else if($emailnum!=0){
        echo"Email Address has aleready exixst";
    }else{
        
        Database::iud("INSERT INTO `users`(`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`status_id`,`gender_id`) 
        VALUES ('".$fname."','".$lname."','".$email."','".$pw."','".$mobile."','".$rdate."','1','".$gender."')");
    
        echo"success";
    
    }
}
