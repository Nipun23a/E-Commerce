<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Order Invoice</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="bg-dark bg-opacity-10">
    <?php
    require "header.php";
    ?>
    <div class="container-fluid">
        <div class="row">



            <div class="col-12 bg-white shadow ">
                <div class="row">

                    <div class="col-1 d-none d-lg-block mt-2">
                        <img src="resources/logo.svg" class="img-thumbnail bg-secondary bg-transparent border-0 name" style="height: 60px;">
                    </div>
                    <div class="col-7 d-none d-lg-block">

                    </div>
                    <div class="col-12 my-3 text-end col-lg-4">
                        <label class="btn btn-success bg-opacity-50 font-quicksand fw-bold">Print <i class="bi bi-printer-fill"></i></label>
                        <label class="btn btn-secondary  font-quicksand fw-bold">Save Img <i class="bi bi-image-fill"></i></label>
                        <label class="btn btn-danger  font-quicksand fw-bold">Export PDF <i class="bi bi-file-pdf-fill"></i></i></label>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 mt-3 ">
                        <div class="row mx-2 ">

                            <div class="col-1 bg-dark bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white"></span>
                            </div>
                            <div class="col-7 bg-primary bg-opacity-75 border col-lg-3">
                                <span class="font-quicksand fs-5 fw-bold text-white">Product</span>
                            </div>
                            <div class="bg-primary bg-opacity-75 border  d-none d-lg-block col-lg-2">
                                <span class="font-quicksand fs-5 fw-bold text-white">Seller</span>
                            </div>
                            <div class="bg-primary bg-opacity-75 border  d-none d-lg-block col-lg-1">
                                <span class="font-quicksand fs-5 fw-bold text-white">Order Id</span>
                            </div>
                            <div class="col-6 bg-primary bg-opacity-75 border col-lg-1 d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white">Quantity</span>
                            </div>
                            <div class="col-5 bg-primary bg-opacity-75 border col-lg-2 ">
                                <span class="font-quicksand fs-5 fw-bold text-white">Price</span>
                            </div>
                            <div class="col-2 bg-primary bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white">Total</span>
                            </div>

                        </div>
                    </div>
              
                        <div class="col-12 mt-3 ">
                            <div class="row mx-2 shadow">

                                <div class="col-1 bg-dark bg-opacity-75 border d-none d-lg-block">
                                    <span class="font-quicksand fs-5 fw-bold text-white"></span>
                                </div>
                                <div class="col-7 bg-white border col-lg-3">
                                    <span class="font-quicksand fs-5 fw-bold "></span>
                                </div>
                                <div class="bg-white border  d-none d-lg-block col-lg-2">
                                    <span class="font-quicksand fs-5 fw-bold">Saman Kumara</span>
                                    <span class="font-quicksand fs-6">saman92@gmail.com</span>
                                </div>
                                <div class="bg-white border  d-none d-lg-block col-lg-1">
                                    <span class="font-quicksand fs-5 fw-bold">022</span>
                                </div>
                                <div class="col-6 bg-white border col-lg-1 d-none d-lg-block">
                                    <span class="font-quicksand fs-5 fw-bold">01</span>
                                </div>
                                <div class="col-5 bg-white border col-lg-2 ">
                                    <span class="font-quicksand fs-5 fw-bold">Rs. 230000.00</span>
                                </div>
                                <div class="col-2 bg-white border d-none d-lg-block">
                                    <span class="font-quicksand fs-5 fw-bold">Rs. 230000.00</span>
                                </div>

                            </div>
                        </div>

                 
                </div>
            </div>

            <div class="col-6 col-lg-3 mt-3">
                <div class="card">
                    <h5 class="card-header font-quicksand fw-bold">Order Information</h5>
                    <div class="card-body">
                        <p class="card-text font-quicksand fs-5 fw-bold">Invoice ID : 00123</p>
                        <p class="card-text font-quicksand"><b>Seller : </b> Saman Kumara</p>
                        <p class="card-text font-quicksand"><b>Buyer : </b> Pasindu Lakshan</p>
                        <p class="card-text font-quicksand"><b>Order Date : </b> 2022-05-04</p>
                        <p class="card-text font-quicksand"><b>Payement Method : </b> PayPal</p>
                    </div>
                </div>
            </div>



            <div class="col-6  col-lg-3 mt-3">
                <div class="card">
                    <h5 class="card-header font-quicksand fw-bold">Shipping Information</h5>
                    <div class="card-body">
                        <h6 class="card-title font-quicksand"><b>Tracking No : </b> 00101</h6>
                        <p class="card-text font-quicksand"></p>
                        <p class="card-text font-quicksand"><b>Shipping Address : </b> Nagoda, Galle</p>
                        <p class="card-text font-quicksand"><b>Fees To : </b> Galle : Rs. 300.00</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 text-end">
                                <p class="card-title font-quicksand fs-2 fw-bold">Total</p>
                                <p class="card-text font-quicksand fs-2">Shipping Fees</p><br /><br /><br /><br /><br />
                                <p class="card-text font-quicksand fs-2">Discounts</p><br />
                                <p class="card-text font-quicksand fs-2">Sub Total</p>
                            </div>
                            <div class="col-6 text-end">
                                <p class="card-title fs-2 font-quicksand">Rs. 230000.00</p>
                                <p class="card-title fs-3 font-quicksand">Rs. 300.00</p>
                                <p class="card-title fs-3 font-quicksand">Rs. 200.00</p>
                                <hr class="boder border-dark" />
                                <p class="card-title fs-2 font-quicksand">Rs. 230500.00</p>
                                <hr class="boder border-dark" />
                                <p class="card-text font-quicksand fs-3">0.00</p>
                                <hr class="boder border-dark" />
                                <p class="card-text font-quicksand fs-2 fw-bold text-danger">Rs. 230500.00</p>
                                <hr class="boder border-dark" />
                                <hr class="boder border-dark" />
                            </div>
                        </div>
                    </div>
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