<?php
require "connection.php";

$item = $_POST["cid"];

if (isset($item)) {
    $stmt = "SELECT 'code' FROM `images` WHERE `product_id` = ?";
    $result = Database::search($stmt, "i", $item);
    while ($row = $result->fetch_assoc()) {
        $imagePath = $row['code'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    $stmt = "DELETE FROM `images` WHERE `product_id` = ?";
    Database::iud($stmt, "i", $item);
    $stmt = "DELETE FROM `product` WHERE `id` = ?";
    Database::iud($stmt, "i", $item);

    echo "success";
} else {
    echo "Unknown error, please try again later.";
}
?>
