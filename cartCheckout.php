<?php
require "connection.php";

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
            $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
            $cartrsnum = $cartrs->num_rows;

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


                    <?php

                    $carttotqty = 0;
                    $cartdfeestot = 0;
                    $cartdpricetot = 0;
                    for ($i = 0; $i < $cartrsnum; $i++) {
                        $cartitem = $cartrs->fetch_assoc();

                        $carttotqty = $carttotqty + $cartitem["qty"];
                        $productrs = Database::search("SELECT * FROM `product` INNER JOIN `users` ON `product`.`users_email`=`users`.`email` WHERE `product`.`id`='" . $cartitem["product_id"] . "'");
                        $product = $productrs->fetch_assoc();

                        $cartdfeestot = $cartdfeestot + $product["delivery_fee"];
                        $cartdpricetot = $cartdpricetot + ($product["price"] * $cartitem["qty"]);
                    }
                    ?>


                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Total Items</span>
                        <input type="text" name="product_name" class="form-control" value="<?php echo $carttotqty ?>" disabled required />
                    </div>
                    <div class="row mt-3">
                        <span class="font-quicksand fs-5">Total Price</span>
                        <input type="text" name="product_name" class="form-control" value="Rs. <?php echo $cartdpricetot+$cartdfeestot; ?>.00" disabled required />
                    </div>

                    <div class="row my-4">
                        <input type="hidden" name="amount" value="<?php echo $cartdpricetot+$cartdfeestot; ?>">
                        <input type="hidden" name="product_name" value="More than one item.">
                    </div>
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51PRB5KITJDLyY2z9wsKZpYLidsxIWF64Rssr96rPSncVPdPB6tVvNt4Vf21qp3oX4ADq0tJrr1kaLl3jojcMf8vT00zQJdOsad" data-amount=<?php echo ($cartdpricetot+$cartdfeestot) * 100 ?> data-name="Item Cart" data-description="Features 6.7″ display, Apple A14 Bionic chipset, 3687 mAh battery, 512 GB storage, 6 GB RAM" data-image="resources/product_images/Samsung-Galaxy-A37.jpg" data-currency="lkr" data-locale="auto">
                    </script>
                </form>
            </div>
            <div class="col-1 d-none d-lg-block">

            </div>

            <div class="col-12 col-lg-6 mt-4">
                <div class="row">
                    <div class="col-6">
                        <h4 class="font-quicksand">Items</h4>
                    </div>
                    <div class="col-3">
                        <h4 class="font-quicksand">Price</h4>
                    </div>
                    <div class="col-2">
                        <h4 class="font-quicksand">Quantity</h4>
                    </div>
                </div>
                <?php
                $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
                $cartrsnum = $cartrs->num_rows;
                for ($i = 0; $i < $cartrsnum; $i++) {
                    $cartitem = $cartrs->fetch_assoc();

                    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartitem["product_id"] . "'");
                    $product = $productrs->fetch_assoc();

                ?>

                    <div class="row mt-3">
                        <div class="col-6">
                            <span class="font-quicksand"><?php echo $product["title"]; ?></span>
                        </div>
                        <div class="col-3">
                            <span class="font-quicksand">Rs. <?php echo $product["price"]; ?>.00</span>
                        </div>
                        <div class="col-2">
                            <span class="font-quicksand"><?php echo $cartitem["qty"]; ?></span>
                        </div>

                    </div>
                <?php
                }
                ?>
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