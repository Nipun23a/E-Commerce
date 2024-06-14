<?php
session_start();
if(isset($_SESSION["admin"])){
   
    ?>
    
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Admin Panel</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-dark">
                <div class="row my-2">
                    <div class="col-2 col-lg-1">
                        <img src="resources/logo.png" class="img-thumbnail bg-dark border-0 bg-white" style="height: 70px; ;">
                    </div>
                    <div class="col-7 col-lg-2">
                        <span class="fs-2 font-quicksand fw-bold text-white">Dashboard</span>
                    </div>
                    <div class="col-lg-6 text-center d-none d-lg-block">
                        <span class="fs-4 font-quicksand fw-bold text-white">Total Active Time</span><br/>
                        <span class="fs-5 font-quicksand  text-white">01 Years : 02 Months : 7 Days : 11 Hours : 20 Min</span>
                    </div>
                    <div class="col-3 col-lg-2 text-end">
                        <div class="row">
                            <div class="col-12">
                                <span class="fs-5 font-quicksand fw-bold text-white"><?php echo $_SESSION["admin"]["fname"]." ".$_SESSION["admin"]["lname"];?></span>
                            </div>
                            <div class="col-12 d-none d-lg-block">
                                <span class="fs-6 font-quicksand text-white"><?php echo $_SESSION["admin"]["email"];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 text-center  d-none d-lg-block">
                        <div class="row">
                            <div class="col-12 pointer">
                                <span data-bs-toggle="offcanvas" data-bs-target="#lg-slide-nav" aria-controls="offcanvasRight"> 
                                <img src="resources/user_img/user_icon.svg" class="img-thumbnail rounded-circle" style="height: 70px;">
                                    
                                </span>
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
                            </div>
                            <div class="end text-center mb-5">
                                <button class="btn btn-danger fs-5 font-quicksand fw-bold" onclick="signOutAdmin();">
                                Log out
                                </button><br/>
                                <span class="fs-5 pointer font-quicksand text-primary">Contact</span><br />
                                <span class="fs-5 pointer font-quicksand text-primary">Help and support</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-2 bg-dark bg-opacity-75" style="height: 100%">
                <div class="row my-2">
                    <div class="col-12 text-center">
                        <span class="text-white fw-bold fs-5 font-quicksand">Navigation</span>
                    </div>
                </div>
                <hr class="border border-2 border-dark" />
                <div class="row my-3">
                    <div class="col-1"></div>
                    <div class="col-10  font-quicksand">
                        <div class="btn-group d-grid " role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary fw-bold text-white " for="btnradio1">Dashboard</label>
                            <br />
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary fw-bold text-white" for="btnradio2">Manage Products</label>
                            <br />
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-primary fw-bold text-white" for="btnradio3">Manage Users</label>
                            <br />
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                            <label class="btn btn-outline-primary fw-bold text-white" for="btnradio4">Selling History</label>
                        </div>
                    </div>
                </div>
                <hr class="border border-2 border-dark" />
                <div class="row my-2">
                    <div class="col-12 text-center">
                        <span class="text-white fw-bold fs-5 font-quicksand">Search Selling History</span>
                    </div>
                </div>
                <hr class="border border-2 border-dark" />
                <div class="col-12 mb-2">
                    <span class="text-white fs-6 font-quicksand">Date From :</span>
                </div>
                <div class="col-12">
                    <input type="date" class="form-control" />
                </div>
                <div class="col-12 mt-4">
                    <span class="text-white fs-6 font-quicksand">Date To :</span>
                </div>
                <div class="col-12 my-2">
                    <input type="date" class="form-control" />
                </div>
                <div class="col-12 my-2 d-grid  mb-4">
                    <button class="btn btn-success fs-5 text-white fw-bold font-quicksand">Search</button>
                </div>

            </div>

            <div class="col-12 col-lg-10">

                <div class="row  bg-dark bg-opacity-25">

                    <div class="col-10 my-3">
                        <span class="fw-bold fs-5 font-quicksand">This Month Summary</Summary></span>
                    </div>

                </div>
                <div class="row bg-dark bg-opacity-10">

                    <div class="col-12 my-4">
                        <div class="row g-2 justify-content-center">

                            <div class="col-lg-3 bg-primary bg-opacity-75 rounded text-center d-grid me-2" style="height: 100px;">
                                <span class="fw-bold text-white fs-5 font-quicksand mt-2">Total Sellings</span><br />
                                <span class=" text-white fs-5 font-quicksand">10 Products</span><br />
                            </div>
                            <div class="col-lg-3 bg-danger bg-opacity-75 rounded text-center d-grid  me-2" style="height: 100px;">
                                <span class="fw-bold text-white fs-5 font-quicksand mt-2">Total Erning</span><br />
                                <span class=" text-white fs-5 font-quicksand">Rs. 100000.00</span><br />
                            </div>
                            <div class="col-lg-3 bg-success bg-opacity-75 rounded text-center d-grid me-2" style="height: 100px;">
                                <span class="fw-bold text-white fs-5 font-quicksand ">Total Returns</span><br />
                                <span class=" text-white fs-5 font-quicksand">5 Products</span><br />
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row  bg-dark bg-opacity-25">

                    <div class="col-10 my-3">
                        <span class="fw-bold fs-5 font-quicksand">Today Summary</Summary></span>
                    </div>

                </div>
                <div class="row bg-dark bg-opacity-10">
                    <div class="col-12 my-4">
                        <div class="row g-2 justify-content-center">

                            <div class="col-lg-3 bg-primary bg-opacity-75 rounded text-center d-grid me-2" style="height: 100px;">
                                <span class="fw-bold text-white fs-5 font-quicksand mt-2">Total Sellings</span><br />
                                <span class=" text-white fs-5 font-quicksand">5 Products</span><br />
                            </div>
                            <div class="col-lg-3 bg-danger bg-opacity-75 rounded text-center d-grid  me-2" style="height: 100px;">
                                <span class="fw-bold text-white fs-5 font-quicksand mt-2">Total Erning</span><br />
                                <span class=" text-white fs-5 font-quicksand">Rs. 5000.00</span><br />
                            </div>
                            <div class="col-lg-3 bg-success bg-opacity-75 rounded text-center d-grid me-2" style="height: 100px;">
                                <span class="fw-bold text-white fs-5 font-quicksand ">Total Returns</span><br />
                                <span class=" text-white fs-5 font-quicksand">5 Products</span><br />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row  bg-primary bg-opacity-25">

                    <div class="col-10 my-3 text-center">
                        <span class="fw-bold fs-5 font-quicksand">Most Popular Items</Summary></span>
                    </div>

                </div>
                <div class="row bg-primary bg-opacity-10">
                    <div class="col-12 my-4">
                        <div class="row g-2 justify-content-center">

       

                        </div>
                    </div>
                </div>




            </div>
        </div>


        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
</body>

</html>
    
    <?php
    
}else{
    header("Location: adminSignin.php");
}
?>
<!DOCTYPE html>
