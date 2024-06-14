<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Sign In</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">


</head>

<body class="main-body">

    <div class="container-fluid min-vh-100 d-flex justify-content-center ">
        <div class="row align-content-center">
            <!-- header    -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold title1 display-2">The Mobile Store</h1>
                    </div>
                </div>

            </div>
            <!-- header    -->
            <!-- body -->

            <div class="col 12 p-3">

                <div class="row justify-content-center">


                    <div class="col-12 col-lg-6  blur rounded-3 shadow bg-white bg-opacity-50">

                        <div class="col-12" id="signUpBox">

                            <div class="row g-3 text-center my-3">

                                <div class="col-12">
                                    <h1 class="h2 text-center font-quicksand fw-bold ">Create your Account </h1>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label fw-bold font-quicksand fs-5 ">First Name</label>
                                    <input type="text" name="" class="form-control" id="fname" />
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label fw-bold font-quicksand fs-5 ">Last Name</label>
                                    <input type="text" name="" class="form-control" id="lname" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold font-quicksand fs-5 ">Email Address</label>
                                    <input type="text" name="" class="form-control" id="email" />
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label class="form-label fw-bold font-quicksand fs-5 ">Password</label>
                                    <input type="password" name="" class="form-control" id="pw" />
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label class="form-label fw-bold font-quicksand fs-5 ">Confirm Password</label>
                                    <input type="password" name="" class="form-control" id="cpw" />
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label class="form-label fw-bold font-quicksand fs-5 ">Mobile Number</label>
                                    <input type="text" name="" class="form-control" id="mobile" />
                                </div>

                                <div class="col-12 col-lg-6">

                                    <label class="form-label fw-bold font-quicksand fs-5 ">Gender</label>
                                    <select class="form-select" id="gender">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>

                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-success fw-bold font-quicksand fs-5" onclick="createNewAccount();">Create New Account</button>
                                </div>

                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-danger fw-bold font-quicksand fs-5" onclick="changeView();">Already have an account? Sign In</button>
                                </div>

                            </div>

                        </div>


                        <div class="col-12 d-none" id="signInBox">
                            <div class="row g-2 my-3">

                                <?php
                                $email1 = "";
                                $password1 = "";

                                if (isset($_COOKIE["em"])) {
                                    $email1 = $_COOKIE["em"];
                                } else if (isset($_COOKIE["pw"])) {
                                    $password1 = $_COOKIE["pw"];
                                }
                                ?>

                                <div class="col-12">
                                    <h1 class="h3 text-center fw-bold font-quicksand">Sign in to your Account</h1>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold font-quicksand fs-5">Email Address</label>
                                    <input type="text" class="form-control" id="femail" value="<?php echo $email1; ?>" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold font-quicksand fs-5">Password</label>
                                    <input type="password" class="form-control" id="fpw" value="<?php echo $password1; ?>" />
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
                                        <label class="form-check-label fw-bold fs-5 font-quicksand"> Remember Me </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                    <a class="font-quicksand fs-6 name" onclick="frogetPassword();">Froget Password</a>
                                </div>

                                <div>
                                    <br />
                                </div>

                                <div class="col-12 d-grid">
                                    <button class="btn btn-success fw-bold font-quicksand fs-5" onclick="signInCustomer();">Sign In</button>
                                </div>

                                <div class="col-12 d-grid mt-3">
                                    <button class="btn btn-danger fw-bold font-quicksand fs-5" onclick="changeView();">Create New Account</button>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div class="modal" tabindex="-1" id="fpwmodal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-quicksand fw-bold">Froget your password here.</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <p class="font-quicksand text-danger">Please check Email inbox.</p>
                            <p class="font-quicksand fw-bold fs-5">Verification Code.</p>
                            <input type="text" class="form-control font-quicksand" placeholder="######" id="verify_code"/>
                        </div>

                        <div class="modal-body">
                            <p class="font-quicksand fw-bold fs-5">Create new Password.</p>
                            <input type="text" class="form-control font-quicksand" placeholder="New Password" id="new_pw"/>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control font-quicksand" placeholder="Confirm Password" id="new_cpw"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" onclick="resetPassword();">Reset Password</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->



        <script src="bootstrap.js"></script>
        <script src="script.js"></script>

</body>

</html>