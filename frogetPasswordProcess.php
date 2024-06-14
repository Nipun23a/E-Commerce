
<?php
require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $email = $_GET["e"];
    $resultset = Database::search("SELECT * FROM `users` WHERE `email`='" . $email . "'");
    $n = $resultset->num_rows;

    if ($n === 1) {
        $code = uniqid();

        Database::iud("UPDATE `users` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'johnsillva734@gmail.com';
        $mail->Password = 'qhreumpvizgmfflv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('johnsillva734@gmail.com', 'New Tech');
        $mail->addReplyTo('johnsillva734@gmail.com', 'New Tech');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'New Tech Froget Password verification Code';
        $bodyContent = '<h1 style="color:green">Your Verification Code Is:' . $code . '<h1/>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 1;
        }
    } else {
        echo "Email address not found";
    }
} else {
    echo "Please Enter Your Email Address.";
}
?>



