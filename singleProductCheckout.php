<?php
require "connection.php";
$pid = $_POST["pid"];
$qty = $_POST["qty"];

$productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$productrsnum = $productrs->num_rows;

$imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid. "'");
$image = $imagers->fetch_assoc();

$product = $productrs->fetch_assoc();

$totprice = $product["price"] * $qty;
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Checkout</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>

            <div class="col-1 d-none d-lg-block">
            </div>
            <div class="col-12 col-lg-4 my-5">
                <form autocomplete="off" action="checkout-charge.php" method="POST">
                    <div class="row">
                        <span class="font-quicksand fs-5">Name</span>
                        <input type="text" class="form-control" name="c_name" required />
                    </div>
                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Home Address</span>
                        <input type="text" class="form-control" name="address" required />
                    </div>
                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Contact Number</span>
                        <input type="number" id="ph" name="phone" pattern="\d{10}" class="form-control" maxlength="10" required />
                    </div>
                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Product</span>
                        <input type="text" name="product_name" class="form-control" value="<?php echo $product["title"]; ?>" disabled required />
                    </div>
                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Quantity</span>
                        <input type="text" name="price" class="form-control" id="qty" value="<?php echo $qty; ?>" disabled required />
                    </div>
                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Total Price</span>
                        <input type="text" name="price" class="form-control" value="Rs. <?php echo $totprice; ?>.00" disabled required />
                    </div>
                    <div class="row my-4">
                        <input type="hidden" name="amount" value="<?php echo $totprice; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product["title"]; ?>">
                        <input type="hidden" name="qty" value="<?php echo $qty; ?>">
                        <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    </div>
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51PRB5KITJDLyY2z9wsKZpYLidsxIWF64Rssr96rPSncVPdPB6tVvNt4Vf21qp3oX4ADq0tJrr1kaLl3jojcMf8vT00zQJdOsad" data-amount="<?php echo $totprice*100?>" data-name="<?php echo $product["title"];?>" data-currency="lkr" data-locale="auto">
                    </script>
                    </script>
             
                </form>
            </div>

            <div class="col-12 col-lg-6 mt-4">
                <div class="checkout-container">
                    <h4 class="font-quicksand text-center">Product Name&nbsp;:&nbsp;<?php echo $product["title"]; ?></h4>
                    <img class="img-fluid" src="<?php echo $image["code"]; ?>" />
                    <div class="row text-end">
                        <span class="font-quicksand">Price &nbsp;:&nbsp;Rs. <?php echo $product["price"]; ?>.00</span>
                    </div>
                </div>
            </div>

            <?php
            require "footer.php";
            ?>

        </div>
    </div>
    <script>
        function goback() {
            window.history.go(-1);
        }

        $('#ph').on('keypress', function() {
            var text = $(this).val().length;
            if (text > 9) {
                return false;
            } else {
                $('#ph').text($(this).val());
            }

        });
    </script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>