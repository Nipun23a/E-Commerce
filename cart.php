<?php

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - My Cart</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "connection.php";
    require "header.php";
    ?>
    <div class="container-fluid">
        <div class="row">



            <div class="col-12 bg-white shadow ">
                <div class="row">

                    <div class="col-1">

                    </div>
                    <div class="col-6 col-lg-4 my-3">
                        <input type="text" class="form-control font-quicksand" placeholder="Search on your Cart" />
                    </div>
                    <div class="col-1 my-3">
                        <a class="fs-4 name text-black-50"> <i class="bi bi-search"></i></a>
                    </div>
                    <div class="col-5 col-lg-5 text-end my-3">
                        <a class="font-quicksand fs-5 fw-bold text-black-50 " href="watchlist.php">Watchlist</a>
                    </div>
                    <div class="col-1 d-none d-lg-block text-center my-1">
                        <span class="fs-2 name"><i class="bi bi-bag-heart"></i></span>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-8 mt-4">
                <div class="row">

                    <div class="col-12">
                        <span class="fs-2 font-quicksand fw-bold">Your Shopping Cart - <span class="fs-4 font-quicksand fw-bold text-black-50">(01 Item)</span></span>
                    </div>
                    <hr class="border border-2 border-dark" />

                    <div class="col-12">

                        <?php
                        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
                        $cartrsnum = $cartrs->num_rows;
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

                            
                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $cartitem["product_id"] . "'");
                        $image = $imagers->fetch_assoc();
                        ?>


                            <div class="card my-4 shadow">
                                <h5 class="card-header"><?php echo $product["title"]; ?></h5>
                                <div class="card-body">
                                    <h6 class="card-title">Seller : <a href="#"><u><?php echo $product["fname"] . " " . $product["lname"]; ?></u></a></h6>
                                    <div class="row">

                                        <div class="col-6">
                                            <img src="<?php echo $image["code"];?>" class="img-fluid" style="height: 300px;">
                                        </div>
                                        <div class="col-12 col-lg-6">

                                            <div class="row">
                                                <div class="col-5 text-end">
                                                    <h5 class="font-quicksand">Quantity :</h5>
                                                </div>
                                                <div class="col-7">
                                                    <input type="number" class="form-control font-quicksand" id="qty<?php echo $cartitem["id"]; ?>" value="<?php echo $cartitem["qty"]; ?>" onchange='productTotal("<?php echo $product["price"]; ?>","<?php echo $cartitem["id"]; ?>");' />
                                                </div>
                                            </div>
                                            <div class="row  mt-2">
                                                <div class="col-5 text-end">
                                                    <h5 class="font-quicksand">Price :</h5>
                                                </div>
                                                <div class="col-7">
                                                    <h5 class="font-quicksand">
                                                        <del>
                                                            <?php
                                                            $cprice = $product["price"];
                                                            $price = $cprice * (30 / 100);
                                                            echo $cprice + $price;
                                                            ?>
                                                        </del>
                                                    </h5>
                                                    <h6 class="font-quicksand text-danger">- (30% Off)</h6>
                                                    <h4 class="font-quicksand text-danger">Rs. <?php echo $product["price"]; ?>.00</h4>
                                                </div>
                                            </div>
                                            <div class="row  mt-2">
                                                <div class="col-5 text-end">
                                                    <h5 class="font-quicksand">Shipping Fees:</h5>
                                                </div>
                                                <div class="col-7">
                                                    <h5 class="font-quicksand">Rs. <?php echo $product["delivery_fee"]; ?>.00</h5>
                                                    <hr class="border border-dark" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5 text-end">
                                                    <h4 class="font-quicksand fw-bold">Total :</h4>
                                                </div>
                                                <div class="col-7">
                                                    <h4 class="font-quicksand text-success" id="cardtot<?php echo $cartitem["id"]; ?>">Rs. <?php echo $product["price"] * $cartitem["qty"]; ?>.00</h4>
                                                    <hr class="border border-dark" />
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <p class="card-text"><?php echo $product["description"]; ?></p>
                                        </div>
                                        <div class="col-8 mt-2">

                                        </div>
                                        <div class="col-12 col-lg-2 mt-2 d-grid ">
                                            <a href="#" class="btn btn-danger font-quicksand fw-bold" onclick='removeFromCart("<?php echo $cartitem["id"]; ?>");'>Remove Item</a>
                                        </div>
                                        <div class="col-12 col-lg-2 mt-2">
                                            <form action="singleProductCheckout.php" class="d-grid" method="post">
                                                <input type="hidden" name="pid" value="<?php echo $product["id"]; ?>">
                                                <input type="hidden" name="qty" id="totqty" value="<?php echo $cartitem["qty"]; ?>">
                                                <button class="btn btn-success fs-5 font-quicksand"  type="submit">Buy</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>


                </div>
            </div>

            <div class="col-12 col-lg-4 bg-light shadow" style="height: 100%;">

                <div class="row mt-3">
                    <div class="col-6 text-center">
                        <h4 class="font-quicksand fw-bold text-black-50">Total Items:</h4>
                    </div>
                    <div class="col-6">
                        <h4 class="font-quicksand"><?php echo $carttotqty; ?> Item</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-center">
                        <h4 class="font-quicksand fw-bold text-black-50">Total Shipping Fees:</h4>
                    </div>
                    <div class="col-6">
                        <h4 class="font-quicksand">Rs. <?php echo $cartdfeestot; ?>.00</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-center">
                        <h4 class="font-quicksand fw-bold text-black-50">Total Items Fees:</h4>
                    </div>
                    <div class="col-6">
                        <h4 class="font-quicksand">Rs. <?php echo $cartdpricetot; ?>.00</h4>
                        <hr class="border border-dark" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <h3 class="font-quicksand fw-bold">Total:</h3>
                    </div>
                    <div class="col-6">
                        <h3 class="font-quicksand text-danger">Rs. <?php echo $cartdfeestot + $cartdpricetot; ?>.00</h3>
                        <hr class="border border-dark" />
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 d-grid">
                        <a class="btn btn-primary font-quicksand fs-4 fw-bold" href="cartCheckout.php">Go To Checkout</a>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <?php
    require "footer.php";
    ?>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>