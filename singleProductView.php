<?php
require "connection.php";


$pid = $_GET["pid"];

$productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
$productrsnum = $productrs->num_rows;

$products = $productrs->fetch_assoc();
$qty = 1;
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - <?php echo $products["title"]; ?></title>
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


            <div class="col-12 col-lg-7">
                <div class="row ">

                    <div class="col-12 my-3">
                        <div class="row justify-content-center">

                            <div class="col-4 col-lg-2" onclick="setimg1();">
                                <img src="resources/product_images/Samsung-Galaxy-M35.jpg" class="img-thumbnail" id="img1">
                            </div>
                            <div class="col-4 col-lg-2" onclick="setimg2();">
                                <img src="resources/product_images/Samsung-Galaxy-A37.jpg" class="img-thumbnail" id="img2">
                            </div>
                            <div class="col-4 col-lg-2" onclick="setimg3();">
                                <img src="resources/product_images/Samsung-Galaxy-M35.jpg" class="img-thumbnail" id="img3">
                            </div>

                        </div>
                    </div>

                    <div class="col-12 my-3">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 border border-primary">
                                <img class="img-fluid" src="resources/product_images/Samsung-Galaxy-A37.jpg" style="height: 500px;" id="mainImg">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-5 mt-5">
                <div class="row">

                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item fs-5"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item fs-5"><a href="#">Mobile Phones</a></li>
                                <li class="breadcrumb-item active fs-5" aria-current="page">Buy</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12">
                        <span class="fs-5 font-quicksand name">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </span>&nbsp;&nbsp;
                        <span class="fs-6 font-quicksand"> 3 / 5 (645)</span>
                    </div>
                    <div class="col-12 mt-4 mb-3">
                        <span class="fs-4 font-quicksand fw-bold"><?php echo $products["title"]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="fs-4 font-quicksand name"><i class="bi bi-heart"></i></span>
                    </div>
                    <hr class="border border-dark border-1" />
                    <div class="col-12 mt-3">

                        <div class="row">
                            <div class="col-3">
                                <span class="fs-5 font-quicksand fw-bold">Specification</span>
                            </div>
                            <div class="col-9">
                                <ul class="list-group list-group-flush fw-bold">
                                    <li class="list-group-item text-black-50"><?php echo $products["description"]; ?></li>
                                </ul>
                            </div>
                        </div>

                        <hr class="border border-dark border-1" />

                        <div class="row">
                            <div class="col-3">
                                <span class="fs-5 font-quicksand fw-bold">Warrenty</span>
                            </div>
                            <div class="col-9">
                                <ul class="list-group list-group-flush fw-bold">
                                    <li class="list-group-item text-black-50">2 Years</li>
                                </ul>
                            </div>
                        </div>
                        <hr class="border border-dark border-1" />

                        <div class="row">
                            <div class="col-3">
                                <span class="fs-5 font-quicksand fw-bold">Delivery Fees</span>
                            </div>
                            <div class="col-9">
                                <ul class="list-group list-group-flush fw-bold">
                                    <li class="list-group-item text-black-50">
                                        <select class="form-select" onchange="dfeesProcess();" id="city">
                                            <option value="0" selected>None</option>
                                            <?php
                                            $cityrs = Database::search("SELECT * FROM `city`");
                                            $cityrsnum = $cityrs->num_rows;
                                            for ($i = 0; $i < $cityrsnum; $i++) {
                                                $city = $cityrs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </li>
                                    <li class="list-group-item text-black-50" id="dfeeslbl">Rs. 0.00</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <hr class="border border-dark border-1" />


                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-3">
                                <span class="fs-5 font-quicksand fw-bold">Quantity</span>
                                <!-- This -->
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-2">
                                        <label class="btn fw-bold fs-3" onclick='plus(<?php echo $products["price"]; ?>);'><i class="bi bi-plus-lg"></i></label>
                                    </div>
                                    <div class="col-8 text-center border border-2 border-primary rounded-3">
                                        <label class="btn fw-bold fs-4 font-quicksand" id="qty">1</label>
                                    </div>
                                    <div class="col-2">
                                        <label class="btn fw-bold fs-3" onclick='mines(<?php echo $products["price"]; ?>);'><i class="bi bi-dash-lg"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-dark border-1" />

                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">
                                <span class="fs-5 font-quicksand fw-bold">Price</span>
                            </div>
                            <div class="col-9">
                                <span class="fs-4 font-quicksand text-black-50">
                                    <del>
                                        <?php
                                        $products["price"] = $products["price"];
                                        $price = $products["price"] * (30 / 100);
                                        echo "Rs. " . $products["price"] + $price . ".00";
                                        ?>
                                    </del></span>&nbsp;&nbsp;&nbsp;
                                <span class="fs-4 font-quicksand text-danger"> - 30% Off</span><br />
                                <span class="fs-3 font-quicksand text-danger fw-bold" id="totprice">Rs. <?php echo $products["price"]; ?>.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-6 d-grid">
                                <?php
                                if (isset($_SESSION["user"])) {
                                ?>
                                    <button class="btn btn-primary fs-5 font-quicksand fw-bold" onclick='addToCart("<?php echo $pid; ?>");'>Add to Cart</button>
                                <?php
                                } else {
                                ?>

                                    <button type="button" class="btn btn-primary fs-5 font-quicksand fw-bold" onclick="alertShowing();">Add to Cart</button>


                                    <div class="modal" tabindex="-1" id="signaleartbox">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h5 class="modal-title">Please Sign up or Register First..</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-danger" href="index.php">Click to Sign up or Register.</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-6 d-grid">
                                <?php
                                if (isset($_SESSION["user"])) {
                                ?>

                                    <form action="singleProductCheckout.php" method="post">

                                        <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                                        <input type="hidden" name="qty" id="totqty" value="1">


                                        <button class="btn btn-success fs-5 font-quicksand" style="width: 200px;" type="submit">Buy</button>
                                    </form>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-success fs-5 font-quicksand fw-bold" style="width: 200px;" onclick="alertShowing();">Buy Product</button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <?php
            require "footer.php";
            ?>

        </div>
    </div>

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>