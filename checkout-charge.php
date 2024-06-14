<?php
    include("./config.php");

    $token = $_POST["stripeToken"];
    $contact_name = $_POST["c_name"];
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = $_POST["phone"];
    $email           = $_POST["stripeEmail"];
    $qty           = $_POST["qty"];
    $pid           = $_POST["pid"];
    $address         = $_POST["address"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["product_name"];
    $charge = \Stripe\Charge::create([
      "amount" => $amount * 100, 
      "currency" => "LKR",
      "source" => $token,
      "description" => "CHARGE_DESCRIPTION"
  ]);

    if($charge){
      header("Location:buyNowProcess.php?pid=$pid&qty=$qty");
    } 
?>