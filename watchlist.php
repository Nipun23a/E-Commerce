<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - My Watchlist</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "header.php";
    require "connection.php";
    ?>
    <div class="container-fluid">
        <div class="row">



            <div class="col-3 bg-white shadow ">
                <div class="row">

                    <div class="col-10 my-3">
                        <input type="text" class="form-control font-quicksand" placeholder="Search on your Watchlist" />
                    </div>
                    <div class="col-1 my-3">
                        <a class="fs-4 name text-black-50"><i class="bi bi-search"></i></a>
                    </div>
                    <div class="col-12">
                        <div class="row my-2">
                            <div class="col-12 text-center">
                                <span class="fw-bold fs-5 font-quicksand">Navigation</span>
                            </div>
                        </div>
                        <hr class="border border-2 border-dark" />
                        <div class="row my-3">
                            <div class="col-1"></div>
                            <div class="col-10  font-quicksand">
                                <div class="btn-group d-grid " role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary fw-bold" for="btnradio1">Cart</label>
                                    <br />
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-primary fw-bold" for="btnradio2">Recent Viewed</label>
                                    <br />
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                    <label class="btn btn-outline-primary fw-bold" for="btnradio3">Offers</label>
                                    <br />
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                                    <label class="btn btn-outline-primary fw-bold" for="btnradio4">Saved Items</label>
                                </div>
                            </div>
                        </div>
                        <hr class="border border-2 border-dark" />

                    </div>

                </div>
            </div>
            <?php

            $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE  `users_email`='" . $_SESSION["user"]["email"] . "'");
            $watchlistrsnum = $watchlistrs->num_rows;
            ?>
            <div class="col-12 col-lg-9">
                <div class="row">

                    <div class="col-11">
                        <span class="fs-2 font-quicksand fw-bold">Your Watch List - <span class="fs-4 font-quicksand fw-bold text-black-50">(<?php echo $watchlistrsnum; ?> Item)</span></span>
                    </div>
                    <div class="col-1">
                        <span class="fs-3 name text-black-50"><i class="bi bi-calendar-heart-fill"></i></span>
                    </div>
                    <hr class="border border-2 border-dark" />


                    <?php
                    for ($i = 0; $i < $watchlistrsnum; $i++) {
                        $watchlistdata = $watchlistrs->fetch_assoc();
                        $productrs = Database::search("SELECT * FROM `product` INNER JOIN `users` ON `product`.`users_email`=`users`.`email` WHERE `product`.`id`='" . $watchlistdata["product_id"] . "';");
                        $product = $productrs->fetch_assoc();

                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watchlistdata["product_id"] . "'");
                        $image = $imagers->fetch_assoc();
                    ?>


                        <div class="col-12 my-3">
                            <div class="card shadow">
                                <h5 class="card-header"><?php echo $product["title"]; ?></h5>
                                <div class="card-body">
                                    <h6 class="card-title">Seller : <a href="#"><u><?php echo $product["fname"] . " " . $product["lname"]; ?></u></a></h6>
                                    <div class="row">

                                        <div class="col-6 border rounded">
                                            <img src="<?php echo $image["code"]; ?>" class="img-fluid" style="height: 300px;">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row  mt-2">
                                                <div class="col-5 text-end">
                                                    <h5 class="font-quicksand">Price :</h5>
                                                </div>
                                                <div class="col-7">
                                                    <h5 class="font-quicksand"><del>
                                                            <?php
                                                            $product["price"] = $product["price"];
                                                            $price = $product["price"] * (30 / 100);
                                                            echo "Rs. " . $product["price"] + $price . ".00";
                                                            ?> </del></h5>
                                                    <h6 class="font-quicksand text-danger">- (12% Off)</h6>
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
                                                    <h4 class="font-quicksand text-success">Rs. <?php echo $product["price"] + $product["delivery_fee"]; ?>.00</h4>
                                                    <hr class="border border-dark" />
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <p class="card-text">Features 6.7″ display, Apple A14 Bionic chipset, 3687 mAh battery, 512 GB storage, 6 GB RAM.</p>
                                        </div>
                                        <div class="col-8 mt-2">

                                        </div>
                                        <div class="col-12 col-lg-2 mt-2 d-grid ">
                                            <button href="#" class="btn btn-danger font-quicksand fw-bold" onclick='removeFromWatchlist(<?php echo $watchlistdata["id"]; ?>);'>Remove Item</button>
                                        </div>
                                        <div class="col-12 col-lg-2 mt-2 d-grid">
                                            <button href="#" class="btn btn-secondary font-quicksand fw-bold" onclick='addToCart("<?php echo $product["id"]; ?>");'>Add to Cart</button>
                                        </div>
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
    </div>

    <?php
    require "footer.php";
    ?>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>