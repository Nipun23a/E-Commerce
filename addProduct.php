<?php
require "connection.php";
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Add Products</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "header.php";
    ?>
    <div class="container-fluid bg-dark bg-opacity-10">
        <div class="row">



            <div class="col-12 bg-white shadow ">
                <div class="row">

                    <div class="col-1 d-none d-lg-block mt-2">
                        <img src="resources/logo.png" class="img-thumbnail bg-secondary bg-transparent border-0 name" style="height: 60px;">
                    </div>
                    <div class="col-6 col-lg-7 my-3">
                        <span class="font-quicksand fs-4 fw-bold">Add your new Products here</span>
                    </div>
                    <div class="col-6 my-3 text-end col-lg-4">
                        <a href="updateProduct.php" class="btn btn-danger bg-opacity-50 font-quicksand fw-bold fs-5">Edit Products <i class="bi bi-pencil-square"></i></a>
                        <a href="manageProducts.php" class="btn btn-secondary bg-opacity-50 font-quicksand fw-bold fs-5">Manage Products <i class="bi bi-ui-checks-grid"></i></a>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="row">

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <h5 class="card-header font-quicksand fw-bold">Select Product Category</h5>
                            <div class="card-body">
                                <select class="form-control font-quicksand" id="category">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $category_rs = Database::search("SELECT * FROM `category` WHERE `status_id`='1'");
                                    $category_rs_num = $category_rs->num_rows;
                                    for ($x = 0; $x < $category_rs_num; $x++) {

                                        $category_rs_data = $category_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $category_rs_data["id"]; ?>"><?php echo $category_rs_data["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <h5 class="card-header font-quicksand fw-bold">Select Product Brand</h5>
                            <div class="card-body">
                                <select class="form-control font-quicksand" id="brand">
                                    <option value="0">Select Brand</option>
                                    <?php
                                    $category_rs = Database::search("SELECT * FROM `brand` WHERE `status_id`='1'");
                                    $category_rs_num = $category_rs->num_rows;
                                    for ($x = 0; $x < $category_rs_num; $x++) {

                                        $category_rs_data = $category_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $category_rs_data["id"]; ?>"><?php echo $category_rs_data["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <h5 class="card-header font-quicksand fw-bold">Select Product Model</h5>
                            <div class="card-body">
                                <select class="form-control font-quicksand" id="model">
                                    <option value="0">Select Model</option>
                                    <?php
                                    $category_rs = Database::search("SELECT * FROM `model` WHERE `status_id`='1'");
                                    $category_rs_num = $category_rs->num_rows;
                                    for ($x = 0; $x < $category_rs_num; $x++) {

                                        $category_rs_data = $category_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $category_rs_data["id"]; ?>"><?php echo $category_rs_data["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <h5 class="card-header font-quicksand fw-bold">Select Product Condition</h5>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="condition" id="brandnew" checked>
                                    <label class="form-check-label font-quicksand" for="pcondition-brandnew">
                                        Brand New
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="condition" id="used">
                                    <label class="form-check-label font-quicksand" for="pcondition-used">
                                        Used
                                    </label>
                                </div>
                            </div>
                            <h5 class="card-header font-quicksand fw-bold">Select Product Colour</h5>
                            <div class="card-body">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="clr-radio" id="clr0" checked>
                                    <label class="form-check-label font-quicksand" for="clr0">
                                        Select Colour
                                    </label>
                                </div>
                                <?php
                                $color_rs = Database::search("SELECT * FROM `color` WHERE `status_id`='1'");
                                $color_rs_num = $color_rs->num_rows;
                                for ($x = 0; $x < $color_rs_num; $x++) {

                                    $color_rs_data = $color_rs->fetch_assoc();
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="<?php echo $color_rs_data["id"]; ?>" name="clr-radio" id="clr<?php echo $color_rs_data["id"]; ?>">
                                        <label class="form-check-label font-quicksand" for="clr<?php echo $color_rs_data["id"]; ?>">
                                            <?php echo $color_rs_data["name"]; ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="row">

                            <div class="card">
                                <div class="row">

                                    <div class="col-12">
                                        <h5 class="card-header font-quicksand fw-bold">Select Product Category</h5>
                                        <div class="card-body mt-2">
                                            <span class="fw-bold fs-5 font-quicksand">Product Title</span>
                                            <input type="text" class="form-control font-quicksand" id="ptitle">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card-body">
                                            <span class="fw-bold fs-5 font-quicksand">Cost Per Item</span>
                                            <div class="input-group mb-3 font-quicksand">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">Rs. </span>
                                                <input type="text" class="form-control" id="cost" aria-label="Dollar amount (with dot and two decimal places)">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <span class="fw-bold fs-5 font-quicksand">Dilivery Fees</span>
                                            <div class="input-group mb-3 font-quicksand">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">Rs. </span>
                                                <input type="text" id="dfees" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <span class="fw-bold fs-5 font-quicksand">Quantity</span>
                                            <input type="number" id="qty" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="card-header font-quicksand fw-bold">Select Product Category</h5>
                                        <div class="card-body mt-2">
                                            <span class="fw-bold fs-5 font-quicksand">Product Description</span>
                                            <textarea class="form-control font-quicksand" cols="12" rows="10" id="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <h5 class="card-header font-quicksand fw-bold">Images in your Products</h5>
                                            <div class="col-4 bg-secondary bg-opacity-10 rounded border">
                                                <div class="card-body mt-2">
                                                    <img src="resources/img-blank.svg" id="preview0" class="img-fluid"/>
                                                </div>
                                            </div>
                                            <div class="col-4 bg-secondary bg-opacity-10 rounded border">
                                                <div class="card-body mt-2">
                                                    <img src="resources/img-blank.svg" class="img-fluid" id="preview1"/>
                                                </div>
                                            </div>
                                            <div class="col-4 bg-secondary bg-opacity-10 rounded border">
                                                <div class="card-body mt-2">
                                                    <img src="resources/img-blank.svg" class="img-fluid" id="preview2"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 my-4 text-center">
                                        <input type="file" id="imageuploader" class="d-none" accept="img/*" multiple>
                                        <label for="imageuploader" class="col-6 btn btn-success font-quicksand fw-bold" onclick="loadImages();">Upload Image</label>
                                    </div>
                                    <div class="col-12 text-center my-3">
                                        <button class="font-quicksand fs-5 fw-bold btn btn-danger" onclick="saveProduct();">Save your Product</button>
                                    </div>

                                </div>


                            </div>


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