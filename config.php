<?php
    require_once 'vendor/autoload.php';

    $stripeDetails = array(
        "secretKey" => "sk_test_51PRB5KITJDLyY2z92ew4fs8ZRXoYNmg99mVGfHi0WfvkFAi7g9CfKtGvTpYmY6UBBvfyxxmIU6DsuXKisUbgTn0500ipxYIvW8",
        "publishableKey" => "pk_test_51PRB5KITJDLyY2z9wsKZpYLidsxIWF64Rssr96rPSncVPdPB6tVvNt4Vf21qp3oX4ADq0tJrr1kaLl3jojcMf8vT00zQJdOsad"
    );
    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);

?>