<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Update Products</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="bg-dark bg-opacity-10">
    <?php
    require "header.php";
    require "connection.php";

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
    
        // Fetch product details from the database
        $stmt = "SELECT * FROM product WHERE id = ?";
        $result = Database::search($stmt, "i", $product_id);
        $product = $result->fetch_assoc();
    
        if (!$product) {
            echo "Product not found.";
            exit;
        }
    } else {
        echo "No product ID provided.";
        exit;
    }
    ?>
    <div class="container-fluid">
        <div class="row">



            <div class="col-12 bg-white shadow ">
                <div class="row">

                    <div class="col-1 d-none d-lg-block mt-2">
                        <img src="resources/logo.png" class="img-thumbnail bg-secondary bg-transparent border-0 name" style="height: 60px;">
                    </div>
                    <div class="col-6 col-lg-7 my-3">
                        <span class="font-quicksand fs-4 fw-bold">Update your Products</span>
                    </div>
                    <div class="col-6 my-3 text-end col-lg-4">
                        <a href="addProduct.php" class="btn btn-secondary bg-opacity-50 font-quicksand fw-bold fs-5">Add Product <i class="bi bi-plus-circle-dotted"></i></i></a>
                        <a href="#" class="btn btn-danger bg-opacity-50 font-quicksand fw-bold fs-5">Remove Product <i class="bi bi-trash-fill"></i></i></a>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="row">

                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <h5 class="card-header font-quicksand fw-bold">Select Product Category</h5>
                            <div class="card-body">
                                <select class="form-control font-quicksand">
                                    <option value="0">Select</option>
                                    <?php
                                        $category_query = "SELECT * FROM category";
                                        $category_result = Database::search($category_query);
                                        while($category = $category_result -> fetch_assoc()){
                                            $selected = ($product['category_id'] == $category['id']) ? 'selected' : '';
                                            echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <h5 class="card-header font-quicksand fw-bold">Select Product Brand</h5>
                            <div class="card-body">
                                <select class="form-control font-quicksand">
                                <?php
                                        $modelBrand = $product['model_has_brand_id'];
                                        $mbrand_query = "SELECT * FROM model_has_brand WHERE id = ?";
                                        $mbrand_result = Database::search($mbrand_query, "i", $modelBrand);
                                        $modelBrand = $mbrand_result->fetch_assoc();

                                        $brand_query = "SELECT * FROM brand";
                                        $brand_result = Database::search($brand_query);

                                        if ($modelBrand) {
                                            $brand_id = $modelBrand['brand_id'];
                                            while ($brand = $brand_result->fetch_assoc()) {
                                                $selected = ($brand_id == $brand['id']) ? 'selected' : '';
                                                echo "<option value='" . $brand['id'] . "' $selected>" . $brand['name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value='0'>Select</option>";
                                        }
                                ?>
                                </select>
                            </div>
                            <h5 class="card-header font-quicksand fw-bold">Select Product Model</h5>
                            <div class="card-body">
                                <select class="form-control font-quicksand">
                                <?php
                                        $modelBrand = $product['model_has_brand_id'];
                                        $mbrand_query = "SELECT * FROM model_has_brand WHERE id = ?";
                                        $mbrand_result = Database::search($mbrand_query, "i", $modelBrand);
                                        $modelBrand = $mbrand_result->fetch_assoc();

                                        $brand_query = "SELECT * FROM model";
                                        $brand_result = Database::search($brand_query);

                                        if ($modelBrand) {
                                            $brand_id = $modelBrand['modell_id'];
                                            while ($brand = $brand_result->fetch_assoc()) {
                                                $selected = ($brand_id == $brand['id']) ? 'selected' : '';
                                                echo "<option value='" . $brand['id'] . "' $selected>" . $brand['name'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value='0'>Select</option>";
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
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" <?php echo ($product['condition_id'] == '0') ? 'checked' : ''; ?>>
                                    <label class="form-check-label font-quicksand" for="flexRadioDefault1">
                                        Brand New
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" <?php echo ($product['condition_id'] == '1') ? 'checked' : ''; ?>>
                                    <label class="form-check-label font-quicksand" for="flexRadioDefault2">
                                        Used
                                    </label>
                                </div>
                            </div>
                            <h5 class="card-header font-quicksand fw-bold">Select Product Colour</h5>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault-color" id="flexRadioDefault1" <?php echo ($product['color_id'] == '1') ? 'checked' : ''; ?> >
                                    <label class="form-check-label font-quicksand" for="flexRadioDefault1">
                                        Rose Gold
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault-color" id="flexRadioDefault2"  <?php echo ($product['color_id'] == '2') ? 'checked' : ''; ?>>
                                    <label class="form-check-label font-quicksand" for="flexRadioDefault2">
                                        Ocean Blue
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault-color" id="flexRadioDefault3" <?php echo ($product['color_id'] == '3') ? 'checked' : ''; ?>>
                                    <label class="form-check-label font-quicksand" for="flexRadioDefault3">
                                        Dark Gray
                                    </label>
                                </div>
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
                                            <input type="text" class="form-control font-quicksand" id="product-title" value="<?php echo $product['title']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card-body">
                                            <span class="fw-bold fs-5 font-quicksand">Cost Per Item</span>
                                            <div class="input-group mb-3 font-quicksand">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">Rs. </span>
                                                <input type="text" class="form-control" id="product-price" aria-label="Dollar amount (with dot and two decimal places)" value="<?php echo $product['price']; ?>">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <span class="fw-bold fs-5 font-quicksand">Dilivery Fees</span>
                                            <div class="input-group mb-3 font-quicksand">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">Rs. </span>
                                                <input type="text" class="form-control" id="product-delivery" aria-label="Dollar amount (with dot and two decimal places)" value="<?php echo $product['delivery_fee']; ?>">
                                                <span class="input-group-text bg-secondary bg-opacity-50 fw-bold">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card-body">
                                            <span class="fw-bold fs-5 font-quicksand">Quantity</span>
                                            <input type="number" id="product-qty"class="form-control" value="<?php echo $product['qty']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="card-header font-quicksand fw-bold">Select Product Category</h5>
                                        <div class="card-body mt-2">
                                            <span class="fw-bold fs-5 font-quicksand">Product Title</span>
                                            <textarea class="form-control font-quicksand" id="product-des"cols="12" rows="10"><?php echo $product['description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <h5 class="card-header font-quicksand fw-bold">Images in your Products</h5>
                                            <?php
                                                    $images_query = "SELECT * FROM images WHERE product_id = " . $product['id'];
                                                    $images_result = Database::search($images_query);

                                                    while ($image = $images_result->fetch_assoc()) {
                                                        echo '<div class="col-4 bg-secondary bg-opacity-10 rounded border">
                                                                <div class="card-body mt-2">
                                                                    <img src="' . $image['code'] . '" class="img-fluid">
                                                                </div>
                                                            </div>';
                                                    }
                                                    ?>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center my-3">
                                    <button class="font-quicksand fs-5 fw-bold btn btn-danger" onclick="updateProduct('<?php echo $product_id ?>');">Save your Product</button>
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
    <script>
    function updateProduct(productId) {
    var id = productId;
    var title = document.getElementById('product-title').value;
    var price = document.getElementById('product-price').value;
    var delivery_fee = document.getElementById('product-delivery').value;
    var quantity = document.getElementById('product-qty').value;
    var description = document.getElementById('product-des').value;

    var formData = new FormData();
    formData.append("id", id);
    formData.append("title", title);
    formData.append("price", price);
    formData.append("delivery_fee", delivery_fee);
    formData.append("qty", quantity);
    formData.append("description", description);

    console.log(formData); // Correct variable name

    // Send an AJAX request to the server
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState === XMLHttpRequest.DONE && r.status === 200) {
            alert(r.responseText);
        }
    };
    r.open('POST', 'updateProductProcess.php', true);
    r.send(formData);
}
    </script>
    <script src="bootstrap.js"></script>
</body>
</html>