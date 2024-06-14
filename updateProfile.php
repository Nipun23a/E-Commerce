<?php
require "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$add1 = $_POST["a1"];
$add2 = $_POST["a2"];
$city = $_POST["c"];
$gender = $_POST["g"];
$postalcode = $_POST["pcode"];
$image = $_FILES['image'];

if ($image['error'] === UPLOAD_ERR_OK) {
    $image_tmp_path = $image['tmp_name'];
    $image_name = $image['name'];

    // Generate a unique file name
    $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
    $unique_name = uniqid() . '.' . $image_extension;

    // Set the destination path for the uploaded image
    $destination_path = 'resources/users' . $unique_name;

    // Move the uploaded file to the destination path
    if (move_uploaded_file($image_tmp_path, $destination_path)) {
        if ($city == 0) {
            Database::iud("UPDATE `users` SET `fname`='" . $fname . "', `lname`='" . $lname . "', `mobile`='" . $mobile . "', `user_image`='" . $destination_path . "' WHERE `email`='" . $email . "'");
            echo "Information update success";
        } else {
            Database::iud("UPDATE `users` SET `fname`='" . $fname . "', `lname`='" . $lname . "', `mobile`='" . $mobile . "', `user_image`='" . $destination_path . "' WHERE `email`='" . $email . "'");
            Database::iud("UPDATE `user_has_address` SET `line1`='" . $add1 . "', `line2`='" . $add2 . "', `city_id`='" . $city . "', `postal_code`='" . $postalcode . "' WHERE `users_email`='" . $email . "'");
            echo "Information update success";
        }
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "Error uploading image: " . $image['error'];
}
?>