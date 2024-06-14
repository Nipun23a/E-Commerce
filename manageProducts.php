<?php
require "connection.php";
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Manage Products</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "header.php";
    ?>
    <div class="container-fluid">
        <div class="row">



            <div class="col-12 col-lg-2 bg-opacity-10  border-end" style="height: 100vh;">
                <div class="row my-3">


                    <div class="col-12 mt-3">
                        <div class="row my-2">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white" id="basic-addon1"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-12 d-grid mt-5">
                                <a href="addProduct.php" class="font-quicksand fw-bold fs-5 btn btn-danger">Add New Product</a>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-12 mt-5 text-center">
                                <span class="font-quicksand fs-5 fw-bold">Categories</span>
                            </div>
                        </div>

                        <?php
                        $category_rs = Database::search("SELECT * FROM `category` WHERE `status_id`='1'");
                        $category_rs_num = $category_rs->num_rows;
                        for ($x = 0; $x < $category_rs_num; $x++) {
                            $category_data = $category_rs->fetch_assoc();
                        ?>
                            <div class="row my-2 mt-3">
                                <div class="col-9 bg-dark bg-opacity-25 mx-2 rounded shadow">
                                    <span class="font-quicksand fs-6" id="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></span>
                                </div>
                                <div class="col-1 text-center">
                                    <span class="name" id="<?php echo $category_data["name"]; ?>" onclick='deleteCategory("<?php echo $category_data["id"]; ?>");'><i class="bi bi-trash3-fill"></i></span>
                                </div>

                                <!-- Category Delete Massage -->
                                <div class="modal" tabindex="-1" id="deleteCategoryModal<?php echo $category_data["id"]; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content font-quicksand">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Remove Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to remove this category ?</p>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                                <button type="button" class="btn btn-danger" onclick='deleteCategoryItem("<?php echo $category_data["id"]; ?>","categorydeleteprocess.php","Category Removed Succefully");'>Remove <i class="bi bi-trash3-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category Delete Massage -->

                            </div>
                        <?php
                        }
                        ?>

                        <div class="row mt-3">
                            <div class="col-12 text-center d-grid">
                                <button class="btn btn-primary fw-bold font-quicksand" onclick="addNewCategory();">Add New Category</button>
                            </div>

                            <!--add category Modal -->
                            <div class="modal" tabindex="-1" id="addCategoryModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="category" placeholder="Category" id="">
                                                <label for="category">Category Name</label>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="addnewcategoryProcess();">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--add category Modal -->

                        </div>

                    </div>

                </div>
            </div>


            <div class="col-12 col-lg-10">
                <div class="row my-3 g-2 gx-2">

                    <div class="col-11 mx-2">
                        <div class="row rounded">

                            <div class="col-1 bg-dark bg-opacity-75 border">
                                <span class="font-quicksand fs-5 fw-bold text-white">ID</span>
                            </div>
                            <div class="col-5 bg-primary bg-opacity-75 border col-lg-3">
                                <span class="font-quicksand fs-5 fw-bold text-white">Product</span>
                            </div>
                            <div class="col-1 bg-primary bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white">Product Image</span>
                            </div>
                            <div class="col-3 bg-primary bg-opacity-75 border  d-none d-lg-block col-lg-2">
                                <span class="font-quicksand fs-5 fw-bold text-white">Quantity</span>
                            </div>
                            <div class="col-6 bg-primary bg-opacity-75 border col-lg-2">
                                <span class="font-quicksand fs-5 fw-bold text-white">Price</span>
                            </div>
                            <div class="col-2 bg-primary bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white">Delivery Fees</span>
                            </div>
                            <div class="col-1 bg-primary bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white"></span>
                            </div>

                        </div>
                    </div>

                    <?php
                    $total_records = Database::search("SELECT COUNT(*) FROM `product` WHERE `users_email`='" . $_SESSION["user"]["email"] . "'")->fetch_row()[0];
                    $records_per_page = 10;
                    $total_pages = ceil($total_records / $records_per_page);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $records_per_page;    
                    $product_rs = Database::search("SELECT * FROM `product` WHERE `users_email`='" . $_SESSION["user"]["email"] . "' LIMIT $offset, $records_per_page");
                    $product_rs_num = $product_rs->num_rows;
                    for ($x = 0; $x < $product_rs_num; $x++) {
                        $product_data = $product_rs->fetch_assoc();

                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                        $image = $imagers->fetch_assoc();
                    ?>


                        <div class="col-11 mx-2">
                            <div class="row border rounded-3 bg-white shadow my-2">

                                <div class="col-1 bg-dark bg-opacity-50 border">
                                    <span class="font-quicksand fs-5 fw-bold text-white"><?php echo $product_data["id"]; ?></span>
                                </div>
                                <div class="col-5 border col-lg-3">
                                    <span class="font-quicksand fs-5 fw-bold "><?php echo $product_data["title"]; ?></span>
                                </div>
                                <div class="col-1 border d-none d-lg-block d-grid text-center">
                                    <label class="btn btn-secondary my-2 font-quicksand fw-bold" onclick='viewPImage("<?php echo $product_data["title"]; ?>","<?php echo $image["code"]; ?>");'>View</label>
                                </div>
                                <div class="col-3 border  d-none d-lg-block col-lg-2 text-center">
                                    <span class="font-quicksand fs-5 fw-bold"><?php echo $product_data["qty"]; ?></span>
                                </div>
                                <div class="col-6 border col-lg-2">
                                    <span class="font-quicksand fs-5 fw-bold ">Rs. <?php echo $product_data["price"]; ?>.00</span>
                                </div>
                                <div class="col-2 border d-none d-lg-block">
                                    <span class="font-quicksand fs-5 fw-bold">Rs. <?php echo $product_data["delivery_fee"]; ?>.00</span><br />
                                </div>
                                <div class="col-1 border d-none d-lg-block d-grid text-center">
                                    <label class="btn btn-danger my-2 font-quicksand fw-bold" id="<?php echo $product_data["id"]; ?>" onclick='productStatusChangeModal("<?php echo $product_data["id"]; ?>");'>Action</label>
                                </div>

                            </div>
                        </div>



                        <!-- Product action model -->
                        <div class="modal" tabindex="-1" id="ProductActionModal<?php echo $product_data["id"]; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <?php
                                    if ($product_data["status_id"] == "1") {
                                    ?>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Product is activated</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="form-check">
                                                <button class="btn btn-outline-danger" onclick='productStatusChange("<?php echo $product_data["id"]; ?>","1");'>Deactivate Product</button>
                                                <button class="btn btn-outline-primary" onclick='updateProduct("<?php echo $product_data["id"]; ?>");'>Update Product</button>
                                                <button class="btn btn-outline-danger" onclick='deleteCategoryItem("<?php echo $product_data["id"]; ?>","itemdeleteprocess.php","Item Removed Succefully");'>Delete Product</button>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Product is Deactivated</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <div class="form-check">
                                                <button class="btn btn-outline-primary" onclick='productStatusChange("<?php echo $product_data["id"]; ?>","0");'>Active Product</button>
                                                <button class="btn btn-outline-primary" onclick='updateProduct("<?php echo $product_data["id"]; ?>");'>Update Product</button>
                                                <button class="btn btn-outline-danger" onclick='productStatusChange("<?php echo $product_data["id"]; ?>","1");'>Delete Product</button>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <!-- Product action model -->



                        <!-- Image view model -->

                        <div class="modal" tabindex="-1" id="ImageModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ptitle"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="" class="img-thumbnail" id="model_img">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Image view model -->
                    <?php
                    }
                    ?>
                </div>


                <div class="col-12 my-5">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <nav aria-label="Page navigation example" class="fs-5">
                                <ul class="pagination">
                                    <li class="page-item <?php echo ($current_page == 1) ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo ($current_page - 1); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item <?php echo ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo ($current_page + 1); ?>" aria-label="Next">
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
    </div>


    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>