<?php
require "connection.php";
$em = $_POST["email"];
$vc = $_POST["vcode"];

session_start();

$adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $em . "'");
$adminrs_num = $adminrs->num_rows;

if ($adminrs_num == 1) {
    $admin = $adminrs->fetch_assoc();
    $admin_vc = $admin["code"];

    $userrs = Database::search("SELECT * FROM `users` WHERE `email`='" . $em . "'");
    $user = $userrs->fetch_assoc();


    if ($admin_vc === $vc) {
        $_SESSION["admin"] = $user;

        echo "success";
    } else {
        echo "wrong";
    }
}
