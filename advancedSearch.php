<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Advanced Search</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "header.php";
    ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-3 bg-dark bg-opacity-10" style="height: 100%;">

                <div class="row">
                    <div class="col-12 my-3 text-center">
                        <span class="font-quicksand fs-4 fw-bold fw-bolder ">Search Products</span>
                    </div>
                    <div class="col-10 my-1">
                        <input type="text" class="font-quicksand form-control fs-5" placeholder="Search By Name" />
                    </div>
                    <div class="col-2">
                        <label class="fs-2 name"><i class="bi bi-search"></i></label>
                    </div>
                </div>
                <hr class="border border-primary border-2" />
                <div class="row">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold fw-bolder">Category</span>
                    </div>
                    <div class="col-8 my-1 text-center font-quicksand">
                        <select class="form-select fs-6">
                            <option value="0">Select Category</option>
                            <option value="1">Mobile Phones</option>
                            <option value="2">Laptops</option>
                            <option value="3">Camaras</option>
                        </select>
                    </div>
                </div>
                <hr class="border border-primary border-2" />
                <div class="row">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold fw-bolder">Brand</span>
                    </div>
                    <div class="col-8 my-1 text-center font-quicksand">
                        <select class="form-select fs-6">
                            <option value="0">Select Brand</option>
                            <option value="1">Samsung</option>
                            <option value="2">Lenavo</option>
                            <option value="3">Sony</option>
                        </select>
                    </div>
                </div>
                <hr class="border border-primary border-2" />
                <div class="row">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold fw-bolder">Warrenty Period</span>
                    </div>
                    <div class="col-8 my-1 text-center font-quicksand">
                        <select class="form-select fs-6">
                            <option value="0">Less Than 6 Months</option>
                            <option value="1">Less Than 1 Year</option>
                            <option value="2">Leass Than 3 Year</option>
                            <option value="3">Nore</option>
                        </select>
                    </div>
                </div>
                <hr class="border border-primary border-2" />
                <div class="row">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold ">Color</span>
                    </div>
                    <div class="col-8 my-1 text-center font-quicksand">
                        <select class="form-select fs-6">
                            <option value="0">Dark Mat</option>
                            <option value="1">Ocean Blue</option>
                            <option value="2">Material Dark</option>
                            <option value="3">Gold</option>
                        </select>
                    </div>
                </div>

                <hr class="border border-primary border-2" />
                <div class="row">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold">Price From</span>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control font-quicksand fs-5" placeholder="Rs." />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold">Price To</span>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control font-quicksand fs-5" placeholder="Rs." />
                    </div>
                </div>
                <hr class="border border-primary border-2" />
                <div class="row">
                    <div class="col-4 my-1 text-center">
                        <span class="font-quicksand fs-5 fw-bold ">Others</span>
                    </div>
                    <div class="col-8 my-1 text-center font-quicksand">
                        <select class="form-select fs-6">
                            <option value="0">Price Low to High</option>
                            <option value="1">Price High to Low</option>
                            <option value="2">Quantity Low to High</option>
                            <option value="2">Quantity High to Low</option>
                            <option value="3">Deactive Items</option>
                        </select>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 d-grid">
                        <button class="btn btn-secondary font-quicksand fw-bold fs-5">Search <i class="bi bi-search"></i></button>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-9">
                <div class="row my-3 gx-2 g-2 justify-content-center">


                    <div class="card me-3 border shadow" style="width: 18rem;">
                        <img src="resources/product_images/apple-iphone-12-pro-max.jpg" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">Apple iPhone 12 Pro Max</h5>
                            <p class="card-text">Features 6.7″ display, Apple A14 Bionic chipset, 3687 mAh battery, 512 GB storage, 6 GB RAM.</p>
                            <span class="font-quicksand">Quantity:&nbsp;10</span><br />
                            <span class="font-quicksand">Price:&nbsp;<del>Rs. 250000.00 </del></span><br />
                            <span class="font-quicksand fw-bold fs-5 text-danger">Rs. 230000.00 - (12% Off)</span><br />
                            <a href="#" class="btn btn-primary">Add to cart</a>
                            <a href="#" class="btn btn-secondary">Buy</a>
                            <a href="#" class="btn btn-success"><i class="bi bi-heart-fill"></i></i></a>

                        </div>
                    </div>

                    <div class="card me-3 border shadow" style="width: 18rem;">
                        <img src="resources/product_images/Samsung-Galaxy-A32-blue.jpg" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">Samsung Galaxy A32</h5>
                            <p class="card-text">6.56 Inch big FHD+ 90Hz Refresh rate display,4800 mAh big battery,Fast charging,5G support,8GB RAM,128GB storage.</p>
                            <span class="font-quicksand">Quantity:&nbsp;5</span><br />
                            <span class="font-quicksand">Price:&nbsp;<del>Rs. 80000.00 </del></span><br />
                            <span class="font-quicksand fw-bold fs-5 text-danger">Rs. 78000.00 - (12% Off)</span><br />
                            <a href="#" class="btn btn-primary">Add to cart</a>
                            <a href="#" class="btn btn-secondary">Buy</a>
                            <a href="#" class="btn btn-success"><i class="bi bi-heart-fill"></i></i></a>

                        </div>
                    </div>

                    <div class="card me-3 border shadow" style="width: 18rem;">
                        <img src="resources/product_images/hp.jpg" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">HP Pavilion Laptop</h5>
                            <p class="card-text">Windows 11 HomeIntel® Core™ i5-1135G7 (up to 4.2 GHz, 8 MB L3 cache, 4 cores) + Intel® Iris® Xe Graphics8 GB DDR4-3200 SDRAM (2 X 4 GB)512 GB PCIe® NVMe™ M.2 SSD.</p>
                            <span class="font-quicksand">Quantity:&nbsp;12</span><br />
                            <span class="font-quicksand">Price:&nbsp;<del>Rs. 150000.00 </del></span><br />
                            <span class="font-quicksand fw-bold fs-5 text-danger">Rs. 120000.00 - (12% Off)</span><br />
                            <a href="#" class="btn btn-primary">Add to cart</a>
                            <a href="#" class="btn btn-secondary">Buy</a>
                            <a href="#" class="btn btn-success"><i class="bi bi-heart-fill"></i></i></a>
                        </div>
                    </div>

                    <div class="col-12 my-5">
                        <div class="row">

                            <div class="col-4"></div>

                            <div class="col-4">
                                <nav aria-label="Page navigation example" class="fs-5">
                                    <ul class="pagination">
                                        <li class="page-item ">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item "><a class="page-link" href="#">1</a></li>
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

        </div>
    </div>


    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>