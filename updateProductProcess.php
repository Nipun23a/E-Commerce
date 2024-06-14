<?php
require "connection.php";

// Get the form data
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$delivery_fee = $_POST['delivery_fee'];
$quantity = $_POST['qty'];
$description = $_POST['description'];

// Prepare the SQL update query
$update_query = "UPDATE product SET title = ?, price = ?, delivery_fee = ?, qty = ?, description = ? WHERE id = ?";

// Execute the update query
try {
    $update_result = Database::iud($update_query, "sdidsi", $title, $price, $delivery_fee, $quantity, $description, $id);

    if (!$update_result) {
        echo "Product updated successfully!";
    } else {
        echo "Product updated successfully!";
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
}
?>
