<?php
require "connection.php";
session_start();
$category = $_POST["category"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$condition = $_POST["condition"];
$colour = $_POST["color"];
$title = $_POST["title"];
$price = $_POST["cost"];
$dfees = $_POST["dfees"];
$qty = $_POST["qty"];
$description = $_POST["description"];
$datenow = date("Y-m-d H:i:s");
$user_email = $_SESSION["user"]["email"] ;



// Validate input
if (empty($category) || empty($brand) || empty($model) || empty($colour) || empty($title) || empty($price) || empty($dfees) || empty($qty) || $qty < 1 || empty($description)) {
    echo "Please provide all required information.";
    exit;
}

// Check if product already exists
$stmt = "SELECT * FROM `product` WHERE `price` = ? AND `qty` = ? AND `description` = ? AND `title` = ? AND `delivery_fee` = ? AND `status_id` = 1 AND `category_id` = ? AND `color_id` = ? AND `condition_id` = ? AND `users_email` = ?";
$result = Database::search($stmt, "ssssdiiis", $price, $qty, $description, $title, $dfees, $category, $colour, $condition, $_SESSION["user"]["email"] );
if ($result->num_rows === 1) {
    echo "Product has already been saved.";
} else {
    // Insert product into the database
    $stmt = "INSERT INTO `product` (`price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee`, `status_id`, `category_id`, `model_has_brand_id`, `color_id`, `condition_id`, `users_email`) VALUES (?, ?, ?, ?, ?, ?, 1, ?, ?, ?, ?, ?)";
    Database::iud($stmt, "ddsssidiiis", $price, $qty, $description, $title, $datenow, $dfees, $category, $brand, $colour, $condition, $_SESSION["user"]["email"]);
    $productId = Database::$connection->insert_id;

    // Handle image upload
    $imageDir = 'resources/product_images/';
    $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (!is_dir($imageDir)) {
        mkdir($imageDir, 0755, true); // Create directory if it doesn't exist
    }

    if (isset($_FILES['img']['name']) && is_array($_FILES['img']['name'])) {
        foreach ($_FILES['img']['name'] as $key => $imageName) {
            $imageTmpName = $_FILES['img']['tmp_name'][$key];
            $imageSize = $_FILES['img']['size'][$key];
            $imageError = $_FILES['img']['error'][$key];
            $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($imageExt, $allowedTypes)) {
                if ($imageError === 0) {
                    if ($imageSize < 5000000) { // 5MB limit
                        $newImageName = uniqid('', true) . "." . $imageExt;
                        $imageDestination = $imageDir . $newImageName;
                        if (move_uploaded_file($imageTmpName, $imageDestination)) {
                            // Insert image path into the database
                            $stmt = "INSERT INTO `images` (`product_id`, `code`) VALUES (?, ?)";
                            Database::iud($stmt, "is", $productId, $imageDestination);
                        } else {
                            echo "Failed to upload image " . $imageName;
                        }
                    } else {
                        echo "Image " . $imageName . " is too large.";
                    }
                } else {
                    echo "Error uploading image " . $imageName;
                }
            } else {
                echo "Invalid file type for image " . $imageName;
            }
        }
    }

    echo "success";
}
?>