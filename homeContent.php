<?php


$categoryrs = Database::search("SELECT * FROM `category` WHERE `status_id`='1' LIMIT 5");
$categoryrsnum = $categoryrs->num_rows;

for ($x = 0; $x < $categoryrsnum; $x++) {
    $category = $categoryrs->fetch_assoc();
?>

    <!-- mobile phones collapse -->
    <div class="row justify-content-center mt-5">

        <div class="col-11 shadow p-3 rounded category-heading">
            <div class="row pointer " data-toggle="collapse" href="#collaps<?php echo $category["id"]; ?>">
                <div class="col-8">
                    <span class="font-quicksand fw-bold fs-2"><?php echo $category["name"]; ?></span>
                </div>
                <div class="col-4 text-end">
                    <button class="fs-1 bg-transparent border-0"><i class="bi bi-filter-circle-fill"></i></button>
                </div>
            </div>
        </div>

        <div class="collapse show col-11 border shadow" id="collaps<?php echo $category["id"]; ?>">

            <div class="row">
                <?php
                $productsrs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $category["id"] . "'");
                $productsrsnum = $productsrs->num_rows;

                for ($i = 0; $i < $productsrsnum; $i++) {
                    $products = $productsrs->fetch_assoc();
                ?>


                    <div class="card shadow m-4" style="width: 18rem;">
                        <?php 
                        $imagers=Database::search("SELECT * FROM `images` WHERE `product_id`='".$products["id"]."'");
                        $image=$imagers->fetch_assoc();
                        ?>
                        <img src="<?php echo $image["code"];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold font-quicksand fs-4"><?php echo $products["title"]; ?></h5>
                            <p>
                                <?php echo $products["description"]; ?>
                            </p>
                            <span class="font-quicksand">Price:&nbsp;<del>Rs.
                                    <?php
                                    $pprice = $products["price"];
                                    $price = $pprice * (30 / 100);
                                    echo $pprice + $price;
                                    ?>
                                    .00 </del></span><br />
                            <span class="font-quicksand fw-bold fs-5 text-danger">Rs. <?php echo $products["price"]; ?>.00 - (30% Off)</span><br />
                            <div class="row mt-3">
                                <div class="col-6 d-grid">
                                    <a class="btn btn-danger" href="singleProductView.php?pid=<?php echo $products["id"]; ?>">Buy Now</a>
                                </div>
                                <?php
                                if (isset($_SESSION["user"])) {
                                ?>
                                    <div class="col-3 d-grid">
                                        <button class="btn btn-outline-secondary fs-4" onclick='addtoWatchlist("<?php echo $products["id"]; ?>");'><i class="bi bi-bag-heart-fill"></i></button>
                                    </div>
                                    <div class="col-3 d-grid">
                                        <a class="btn btn-outline-primary fs-4" onclick='addToCart("<?php echo $products["id"]; ?>");'><i class="bi bi-cart-fill"></i></a>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-3 d-grid">
                                        <button class="btn btn-outline-secondary fs-4" onclick="alertShowing();"><i class="bi bi-bag-heart-fill"></i></button>
                                    </div>
                                    <div class="col-3 d-grid">
                                        <a class="btn btn-outline-primary fs-4" onclick="alertShowing();"><i class="bi bi-cart-fill"></i></a>
                                    </div>

                                    <!-- aleart -->
                                    <div class="modal" tabindex="-1" id="signaleartbox">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Please Sign up or Register First..</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-danger" href="index.php">Click to Sign up or Register.</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- aleart -->
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                    </div>

                <?php
                }
                ?>
            </div>

            <div class="row pb-4 justify-content-center">
                <div class="col-2">
                    <span class="fs-4 pointer" style="color: blue;"><u>See More...</u></span>
                </div>
            </div>


        </div>

    </div>
    <!--mobile phones collapse -->


<?php
}
?>