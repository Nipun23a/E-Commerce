<?php
require "connection.php";
session_start();
$pid = $_GET["pid"];
$qty = $_GET["qty"];
$order_id = uniqid();
$uemail = $_SESSION["user"]["email"];

// Fetch the product data
$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");

// Check if the query returned any results
if ($product_rs->num_rows > 0) {
    $product_data = $product_rs->fetch_assoc();
    $price = $product_data["price"];
    $total = $price * $qty;
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    // Insert the invoice data
    Database::iud("INSERT INTO `invoice`(`order_id`,`product_id`,`users_email`,`buyer_email`,`date`,`total`,`qty`,`status`)
    VALUES ('" . $order_id . "','" . $pid . "','" . $product_data["users_email"] . "','" . $uemail . "','" . $date . "','" . $total . "','" . $qty . "','1')");
} else {
    // Handle the case when the product is not found
    echo "Product not found.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Success</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center" style="margin-top: 50vh;">
                <h1 class="font-quicksand fw-bold">Your Transaction has been Successfully Completed</h1>
                <span class="font-quicksand fs-4 mt-3">Your Order Id : <b style="color: red;"><?php echo $order_id ?></b></span>
            </div>
        </div>
    </div>
</body>
</html>