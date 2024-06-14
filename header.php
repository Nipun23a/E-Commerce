<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="col-12 border-bottom">
        <div id="header" class="row mb-3">
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <div class="row">

                    <div class="col-2 d-none d-lg-block">
                        <div class="row">
                            <div class=" col-6  pointer" onclick="goHome();">
                                <img src="resources/logo.png" class="img-fluid">
                            </div>
                            <!-- <div class="col-6 mt-4 bg-danger">
                                <span class="font-quicksand"><?php echo $_SESSION["user"]["fname"] . " " . $_SESSION["user"]["lname"]; ?></span>
                            </div> -->
                        </div>


                    </div>

                    <div class="col-9 d-none d-lg-block text-center">

                        <div class="grid mt-4">
                            <button class="h-btn col-2 fs-4" onclick="goHome();"><i class="bi bi-house-fill mt-1"></i></button>
                            <button class="h-btn col-2 fs-4" onclick="goProfile();"><i class="bi bi-person-circle mt-1"></i></button>
                            <button class="h-btn col-3 fs-4" onclick="goMyProducts();"><i class="bi bi-unity mt-1"></i></button>
                            <button class="h-btn col-3 fs-4" onclick="goPurchaseHistory();"><i class="bi bi-receipt mt-1"></i></button>
                        </div>
                        <div class="grid">
                            <button class="h-btn col-2 font-quicksand fw-bold" onclick="goHome();">Home</button>
                            <button class="h-btn col-2 font-quicksand fw-bold" onclick="goProfile();">My Profile</button>
                            <button class="h-btn col-3 font-quicksand fw-bold" onclick="goMyProducts();">My Products</button>
                            <button class="h-btn col-3 font-quicksand fw-bold" onclick="goPurchaseHistory();">Purchase History</button>
                        </div>
                    </div>

                    <div class="col-1 d-block d-lg-none">

                    </div>
                

                    <div class="col-1 d-none d-lg-block pt-2 text-end">
                        <!-- <a href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-cart-plus-fill pointer text-black-50" viewBox="0 0 16 16">
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                            </svg>
                        </a> -->
                        <div class="d-none d-lg-block mt-4">
                            <span class="border-0 fs-5 pointer h-btn font-quicksand" data-bs-toggle="offcanvas" data-bs-target="#lg-slide-nav" aria-controls="offcanvasRight">More <i class="bi bi-caret-down-square"></i></span>
                        </div>
                    </div>

                    <div class="d-block d-lg-none col-2 my-5">
                        <label class="fs-1 more-btn pointer" data-bs-toggle="offcanvas" data-bs-target="#sm-slide-nav" aria-controls="offcanvasRight"><i class="bi bi-text-right"></i></label>
                    </div>

                    <div class="col-12 ">
                        <div class="offcanvas offcanvas-end slide-nav bg-white bg-opacity-25 blur" tabindex="-1" id="sm-slide-nav" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close font-quicksand" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-5">

                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="home.php"><i class="bi bi-house-fill mt-1"></i> Home</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="profile.php"><i class="bi bi-person-circle mt-1"></i> My Profile</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="manageProducts.php"><i class="bi bi-unity mt-1"></i> My Products</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link"><i class="bi bi-receipt mt-1"></i> Purchase History</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="cart.php"><i class="bi bi-cart-plus-fill"></i> Cart</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="sellingHistory.php"><i class="bi bi-cash-coin"></i> My Sellings</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link"><i class="bi bi-envelope"></i> Massages</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="watchlist.php"><i class="bi bi-bag-heart"></i> Watch List</a><br /><br />
                            </div>
                            <div class="end text-center mb-5">
                                <span class="fs-5 pointer font-quicksand text-danger fw-bold" onclick="signOutUser();">Log out</span><br /><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Contact</span><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Help and support</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="offcanvas offcanvas-end slide-nav bg-white bg-opacity-25 blur " tabindex="-1" id="lg-slide-nav" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close font-quicksand" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                                </div>
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="cart.php"><i class="bi bi-cart-plus-fill"></i> Cart</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="sellingHistory.php"><i class="bi bi-cash-coin"></i> My Sellings</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link"><i class="bi bi-envelope"></i> Massages</a><br /><br />
                                <a class="fs-4 font-quicksand pointer slide-nav-link" href="watchlist.php"><i class="bi bi-bag-heart"></i> Watch List</a><br /><br />
                            </div>
                            <div class="end text-center mb-5">
                                <span class="fs-5 pointer font-quicksand text-danger fw-bold" onclick="signOutUser();">Log out</span><br /><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Contact</span><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Help and support</span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            } else {
            ?>
                <div class="row">

                    <div class="col-2 d-none d-lg-block">
                        <div class="row">
                            <div class=" col-4 mt-4">
                                <img src="resources/logo.svg" class="img-fluid" style="height: 80px;">
                            </div>
                            <div class="col-8 mt-4">
                                <span class="fs-3 fw-bold font-quicksand">New Tech</span><br />
                            </div>
                        </div>


                    </div>

                    <div class="col-7 d-none d-lg-block text-center">
                        <div class="mt-4">
                            <a class="fs-4 pointer font-quicksand" style="color: blue;" href="index.php">Please sign or register first.</a><br />

                        </div>
                    </div>

                    <div class="col-1 d-block d-lg-none">

                    </div>
                    <div class="col-9 col-lg-2 my-3 d-grid">
                        <div class="search-box">
                            <button class="btn-search"><i class="bi bi-search"></i></button>
                            <input type="text" class="input-search" placeholder="Type to Search...">
                        </div>

                    </div>

                    <div class="col-1 d-none d-lg-block pt-4">
                        <span class="border-0 fs-4 pointer" data-bs-toggle="offcanvas" data-bs-target="#lg-slide-nav" aria-controls="offcanvasRight">More <i class="bi bi-caret-down-square"></i></span>
                    </div>

                    <div class="d-block d-lg-none col-2 my-5">
                        <label class="fs-1 more-btn pointer" data-bs-toggle="offcanvas" data-bs-target="#sm-slide-nav" aria-controls="offcanvasRight"><i class="bi bi-text-right"></i></label>
                    </div>

                    <div class="col-12 ">
                        <div class="offcanvas offcanvas-end slide-nav bg-white bg-opacity-25 blur" tabindex="-1" id="sm-slide-nav" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close font-quicksand  bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-5 text-center">
                                <a class="fs-4 pointer font-quicksand" style="color: blue;">Please sign or <br /> register first.</a><br />
                            </div>
                            <div class="end text-center mb-5">
                                <span class="fs-5 pointer font-quicksand text-primary">Contact</span><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Help and support</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="offcanvas offcanvas-end slide-nav bg-white bg-opacity-25 blur " tabindex="-1" id="lg-slide-nav" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close font-quicksand bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-5 text-center">
                                <a class="fs-4 pointer font-quicksand" style="color: blue;" href="index.php">Please sign or <br /> register first.</a><br />
                            </div>
                            <div class="end text-center mb-5">
                                <span class="fs-5 pointer font-quicksand text-primary">Contact</span><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Help and support</span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="row">
        <!--go to top button -->

        <div class="d-none" id="top-btn">
            <div class="fixed-bottom align-self-end px-5">
                <div class="row justify-content-end">
                    <button style="width: 50px; height: 50px; border-radius: 30px;" class="border-0 fs-4" onclick="gotoTop();"><i class="bi bi-arrow-up-circle-fill"></i></button>
                </div>
            </div>
        </div>

        <!--go to top button -->
    </div>


    <script src="bootstrap.min.js"></script>
    <script src="script.js"></script>


</body>

</html>