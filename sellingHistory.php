<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Transactions</title>
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
    <div class="container-fluid bg-dark bg-opacity-10">
        <div class="row">

            <div class="col-12 bg-white shadow ">
                <div class="row">

                    <div class="col-1 d-none d-lg-block mt-2">
                        <img src="resources/logo.svg" class="img-thumbnail bg-secondary bg-transparent border-0 name" style="height: 60px;">
                    </div>
                    <div class="col-6 col-lg-2 my-3">
                        <span class="font-quicksand fs-5 fw-bold">Search Transaction</span>
                    </div>
                    <div class="col-12 col-lg-3 my-3 d-flex">
                        <span class="font-quicksand">Date From</span>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-lg-3 my-3 d-flex">
                        <span class="font-quicksand">Date To</span>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-lg-1 my-3">
                        <a class="fs-4 name text-black-50"> <i class="bi bi-search"></i></a>
                    </div>
                    <div class="col-2 my-3 text-end">
                        <label class="btn btn-danger bg-opacity-50 font-quicksand fw-bold fs-5">Trash <i class="bi bi-trash-fill"></i></label>
                    </div>

                </div>
            </div>


            <div class="col-12 mt-3 ">
                <div class="rounded row mx-2 ">

                    <div class="col-1 bg-dark bg-opacity-75 border d-none d-lg-block">
                        <span class="font-quicksand fs-5 fw-bold text-white">Receipt Id</span>
                    </div>
                    <div class="col-10 bg-primary bg-opacity-75 border col-lg-3">
                        <span class="font-quicksand fs-5 fw-bold text-white">Product</span>
                    </div>
                    <div class="bg-primary bg-opacity-75 border  d-none d-lg-block col-lg-2">
                        <span class="font-quicksand fs-5 fw-bold text-white">Buyer</span>
                    </div>
                    <div class="col-6 bg-primary bg-opacity-75 border col-lg-1 d-none d-lg-block">
                        <span class="font-quicksand fs-5 fw-bold text-white">Quantity</span>
                    </div>
                    <div class="col-6 bg-primary bg-opacity-75 border col-lg-2 d-none d-lg-block">
                        <span class="font-quicksand fs-5 fw-bold text-white">Cash</span>
                    </div>
                    <div class="col-2 bg-primary bg-opacity-75 border d-none d-lg-block">
                        <span class="font-quicksand fs-5 fw-bold text-white">Date & Time</span>
                    </div>
                    <div class="col-2 col-lg-1 ">

                    </div>

                </div>
            </div>

            <?php 
            $transactionrs=Database::search("SELECT *FROM `invoice` WHERE `users_email`='wijayapasindu475@gmail.com'  AND `status`='1';");
            $transactionrsnum=$transactionrs->num_rows;

            for ($i=0; $i < $transactionrsnum; $i++) { 
                $transaction=$transactionrs->fetch_assoc();

                $productrs=Database::search("SELECT * FROM `product` WHERE `id`='".$transaction["product_id"]."';");
               $product= $productrs->fetch_assoc();
                ?>
        
            <div class="col-12">
                <div class="row mx-2 py-4">

                    <div class="col-1 bg-dark bg-opacity-75 border d-none d-lg-block">
                        <span class="font-quicksand fs-5 fw-bold text-white"><?php echo $transaction["id"];?></span>
                    </div>
                    <div class="col-10  bg-white border col-lg-3">
                        <div class="card my-2">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-header font-quicksand"><?php echo  $product["title"];?></h5>
                                </div>
                                <div class="col-4 mt-3">
                                    <img src="resources/product_images/apple-iphone-12-pro-max.jpg" class="img-thumbnail" style="height: auto;">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                    
                                        <h6 class="card-title font-quicksand"><b>Tracking No. - :</b> <?php echo $transaction["order_id"];?></h6>
                                        <p class="card-text font-quicksand"><?php echo  $product["description"];?></p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    $buyerrs=Database::search("SELECT * FROM `users` WHERE `email`='".$transaction["buyer_email"]."';");
                    $buyer=$buyerrs->fetch_assoc();
                    
                    ?>

                    <div class=" bg-white  d-none d-lg-block col-lg-2">
                        <div class="card my-2">
                            <div class="card-body">
                                <h6 class="card-title font-quicksand fw-bold"><?php echo  $buyer["fname"]." ". $buyer["lname"];?></h6>
                                <p class="card-text font-quicksand"><?php echo  $buyer["email"];?></p>
                                <p class="card-text font-quicksand"><?php echo  $buyer["mobile"];?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 bg-white border col-lg-1 d-none d-lg-block text-center">
                        <br />
                        <span class="font-quicksand fs-5 fw-bold"><?php echo $transaction["qty"];?></span>
                    </div>
                    <div class="col-6 bg-white border col-lg-2 d-none d-lg-block">
                        <br />
                        <span class="font-quicksand fs-5 fw-bold">Rs. <?php echo $transaction["total"];?>.00</span>
                    </div>
                    <div class="col-2 bg bg-white border d-none d-lg-block">
                        <br />

                        <span class="font-quicksand fs-5 fw-bold"><?php  
                        $input=$transaction["date"];
                        $date=strtotime($input);
                        echo date("Y-m-d",$date);
                        ?></span><br />
                        <span class="font-quicksand fs-5"><?php echo date("h:i:s",$date);?></span>
                    </div>
                    <div class="col-2 col-lg-1 mt-4">
                        <label class="btn btn-danger bg-opacity-50 font-quicksand fs-1" onclick='moveSellTransaction(<?php echo $transaction["id"];?>);'><i class="bi bi-trash-fill"></i></label>
                    </div>

                </div>

                <!-- Modal -->
                <div class="modal" tabindex="-1" id="trashModel<?php echo $transaction["id"];?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-quicksand">Do you sure that transacion move to Trash?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <p class="font-quicksand fs-6 fw-bold"><?php echo  $product["title"];?></p>
                                    <p class="font-quicksand fs-6">Buyer : <?php echo  $buyer["fname"]." ". $buyer["lname"];?></p></p>
                                    <p class="font-quicksand fs-6">Price :Rs. <?php echo  $transaction["total"];?>.00</p></p>
                                </div>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick='moveSellTransactionProcess("<?php echo $transaction["id"];?>");'>Move <i class="bi bi-trash-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

            </div>

            <?php
            }
            ?>

            
            <div class="col-12 my-5">
                    <div class="row ">

                        <div class="col-4"></div>

                        <div class="col-4">
                            <nav aria-label="Page navigation example" class="fs-5">
                                <ul class="pagination">
                                    <li class="page-item ">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-4"></div>

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