<?php
session_start();
require "connection.php";

$email = $_POST["em"];
$password = $_POST["pw"];
$remember = $_POST["rem"];

if (empty($email)) {
    echo "Please enter your Email Address.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($password)) {
    echo "Please enter your Password.";
} else {

    $result = Database::search("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    $resultNum = $result->num_rows;

    if ($resultNum == 1) {
        $cdata = $result->fetch_assoc();
        $_SESSION["user"]= $cdata;
  
        if($remember==true){
            setcookie("em",$email,time()+(60*60*24*365));
            setcookie("pw",$password,time()+(60*60*24*365));
        }

        if($remember==false){
            setcookie("em","",-1);
            setcookie("pw","",-1);
        }

        echo"success";
    } else {
        echo "Invalied Email Address or Password.";
    }
}
?>
