<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Admin Sign In</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="bg-secondary bg-opacity-10">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-dark">
                <div class="row my-2 text-center">
                    <div class="col-12">
                        <span class="fs-2 font-quicksand fw-bold text-white">Please Sign Here</span>
                    </div>
                </div>
            </div>

            <div class="col-6 d-none d-lg-block my-5 shadow">
                <img src="resources/adminSignLogo.jpg" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 my-5 d-grid bg-white shadow">
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="font-quicksand fs-5 fw-bold">Your Email Address</span>
                    </div>
                    <div class="col-12 mt-3">
                        <input type="text" class="form-control font-quicksand" placeholder="Email" id="email">
                    </div>

                    <div class="col-12 mt-5">
                        <span class="font-quicksand fs-5 fw-bold">Your Password</span>
                    </div>
                    <div class="col-12 mt-3">
                        <input type="password" class="form-control font-quicksand" placeholder="Password" id="password">
                    </div>

                    <div class="col-12 mt-5 col-lg-12">
                        <label class="btn btn-secondary font-quicksand fs-5 fw-bold" onclick="adminSignInCodeSend();">Send Verification Code</label>
                    </div>

                </div>
            </div>

            <div class="modal" tabindex="-1" id="adminSignInModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-quicksandfw-bold">Sign in Here</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-floating">
                                <input type="text" class="form-control" id="vcode" placeholder="Code"> 
                                <label for="vcode">Varification Code</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary font-quicksand fs-6 fw-bold" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary font-quicksand fs-6 fw-bold" onclick="adminSignProcess();">Sign In</button>
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