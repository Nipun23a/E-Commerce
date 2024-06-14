<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo.svg">

</head>

<body>
    <?php
    require "header.php";
    require "connection.php";
    $udatars = Database::search("SELECT * FROM `users` INNER JOIN `user_has_address` ON `users`.`email`=`user_has_address`.`users_email`  INNER JOIN `city` ON `user_has_address`.`city_id`= `city`.`id`INNER JOIN `district` ON `city`.`district_id`=`district`.`id`INNER JOIN `province` ON `district`.`id`=`province`.`id` WHERE `users_email`='" . $_SESSION["user"]["email"] . "';");
    $udata = $udatars->fetch_assoc();
    ?>

    <div class="container-fluid">
        <div class="row mt-4">

            <div class="col-12 col-lg-4">
                <div class="row justify-content-center">
                <div class="col-11 text-center border rounded py-5">
                    <?php
                    $image_path = $udata['user_image'] ?? ''; // Get the image path from the database or set an empty string
                    $image_src = $image_path ? $image_path : 'default_image.jpg'; // Use the image path if available, otherwise use a default image
                    ?>
                    <img id="preview-image" src="<?php echo $image_src; ?>" class="img-thumbnail rounded-circle bg-dark" style="height: 400px; width: 400px;">
                    <input type="file" id="image-upload" class="btn btn-outline-success mt-5" onchange="previewImage(event)">
                    <label for="image-upload" class="btn btn-outline-success mt-5">Upload Profile Image</label>
                </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-11 border py-3 rounded">

                        <div class="row text-center">
                            <div class="col-12 py-2 border-bottom">
                                <h3 class="font-quicksand fw-bold">Edit your profile</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <span class="fs-5 font-quicksand">First Name</span>
                                <input type="text" class="form-control mt-2" id="fname" value="<?php echo $_SESSION["user"]["fname"]; ?>" />
                            </div>
                            <div class="col-6">
                                <span class="fs-5 font-quicksand">Last Name</span>
                                <input type="text" class="form-control mt-2" id="lname" value="<?php echo $_SESSION["user"]["lname"]; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <span class="fs-5 font-quicksand">Email Address</span>
                                <input type="text" class="form-control mt-2" id="email" value="<?php echo $_SESSION["user"]["email"]; ?>" disabled>
                            </div>
                            <div class="col-6">
                                <span class="fs-5 font-quicksand" >Mobile Number</span>
                                <input type="text" class="form-control mt-2" id="mobile" value="<?php echo $_SESSION["user"]["mobile"]; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <span class="fs-5 font-quicksand" >Address Line 1</span>
                                <input type="text" class="form-control mt-2" id="add1" value="<?php echo $udata["line1"]; ?>">
                            </div>
                            <div class="col-12  mt-4">
                                <span class="fs-5 font-quicksand">Address Line 2</span>
                                <input type="text" class="form-control mt-2" id="add2" value="<?php echo $udata["line2"]; ?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <span class="fs-5 font-quicksand">Select City</span>
                                <select id="city"  class="form-select mt-2">
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
                            </div>
                            <div class="col-4">
                                <span class="fs-5 font-quicksand">Select Province</span>
                                <select class="form-select mt-2" id="province" >
                                    <option value="0" selected>None</option>
                                    <?php
                                    $provincers = Database::search("SELECT * FROM `province`");
                                    $provincersnum = $provincers->num_rows;
                                    for ($i = 0; $i < $provincersnum; $i++) {
                                        $province = $provincers->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $province["id"]; ?>"><?php echo $province["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <span class="fs-5 font-quicksand">Select Distric</span>
                                <select class="form-select mt-2" id="district">
                                    <option value="0"  selected>None</option>
                                    <?php
                                    $districtrs = Database::search("SELECT * FROM `district`");
                                    $districtrsnum = $districtrs->num_rows;
                                    for ($i = 0; $i < $districtrsnum; $i++) {
                                        $district = $districtrs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $district["id"]; ?>"><?php echo $district["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <span class="fs-5 font-quicksand">Select Gender</span>
                                <select class="form-select mt-2" id="gender">
                                    <option value="0"  selected>None</option>
                                    <?php
                                    $genderrs = Database::search("SELECT * FROM `gender`");
                                    $genderrsnum = $genderrs->num_rows;
                                    for ($i = 0; $i < $genderrsnum; $i++) {
                                        $gender = $genderrs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $gender["id"]; ?>"><?php echo $gender["gender_name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <span class="fs-5 font-quicksand">Postal Code</span>
                                <input type="text" class="form-control mt-2" id="postalcode" value="<?php echo $udata["postal_code"];?>">
                            </div>
                            <div class="col-4 text-center">
                                <span class="fs-5 font-quicksand">Registerd Date</span><br>
                                <label class="font-quicksand fs-5 mt-2">2022-05-07</label>
                            </div>
                        </div>
                        <div class="row justify-content-center my-5">
                            <div class="col-3 d-grid">
                                <button class="btn btn-outline-primary fs-4 font-quicksand fw-bold" onclick="saveProfile();">Save
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                    </svg>
                                </button>
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
    function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function() {
        const previewImage = document.getElementById('preview-image');
        previewImage.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    }
}
function saveProfile() {

var fname = document.getElementById("fname").value;
var lname = document.getElementById("lname").value;
var email = document.getElementById("email").value;
var mobile = document.getElementById("mobile").value;
var addl1 = document.getElementById("add1").value;
var addl2 = document.getElementById("add2").value;
var city = document.getElementById("city").value;
var province = document.getElementById("province").value;
var district = document.getElementById("district").value;
var gender = document.getElementById("gender").value;
var postalcode = document.getElementById("postalcode").value;


var form = new FormData();
form.append("f", fname);
form.append("l", lname);
form.append("e", email);
form.append("m", mobile);
form.append("a1", addl1);
form.append("a2", addl2);
form.append("c", city);
form.append("p", province);
form.append("d", district);
form.append("g", gender);
form.append("pcode", postalcode);
form.append('image', document.getElementById('image-upload').files[0]);

const xhr = new XMLHttpRequest();
    xhr.open('POST', 'updateProfile.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
        } else {
            alert(xhr.statusText);
        }
    };
    xhr.send(form);
}

</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>

</html>