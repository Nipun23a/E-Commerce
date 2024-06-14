<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Manage User</title>
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
                        <img src="resources/logo.svg" class="img-thumbnail bg-dark border-0" style="height: 70px; ;">
                    </div>
                    <div class="col-10 col-lg-11">
                        <span class="fs-2 font-quicksand fw-bold text-white">Manage Users</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-2 bg-secondary bg-opacity-10 rounded" style="height: 100vh;">
                <div class="row">

                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" class="form-control font-quicksand" placeholder="Search User">
                            </div>
                            <div class="col-2">
                                <label class="fs-4 name"><i class="bi bi-search"></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 my-3">
                        <div class="row">
                            <div class="col-2">

                            </div>
                            <div class="col-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label font-quicksand fw-bold" for="flexRadioDefault1">
                                        All Users
                                    </label>
                                </div>
                                <br />
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label font-quicksand fw-bold" for="flexRadioDefault2">
                                        Blocked Users
                                    </label>
                                </div>
                                <br />
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                    <label class="form-check-label font-quicksand fw-bold" for="flexRadioDefault3">
                                        Active Users
                                    </label>
                                </div>
                                <br />
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" checked>
                                    <label class="form-check-label font-quicksand fw-bold" for="flexRadioDefault4">
                                        Deactive Users
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-10 ">
                <div class="row my-3">

                    <div class="col-12 mt-2 border border-2 border-dark rounded">
                        <div class="row">

                            <div class="col-1 bg-dark bg-opacity-75 border">
                                <span class="font-quicksand fs-5 fw-bold text-white">ID</span>
                            </div>
                            <div class="col-3 bg-primary bg-opacity-75 border col-lg-2">
                                <span class="font-quicksand fs-5 fw-bold text-white">Name</span>
                            </div>
                            <div class="col-2 bg-primary bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white">Email Address</span>
                            </div>
                            <div class="col-3 bg-primary bg-opacity-75 border col-lg-2">
                                <span class="font-quicksand fs-5 fw-bold text-white">Contact No.</span>
                            </div>
                            <div class="col-2 bg-primary bg-opacity-75 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 fw-bold text-white">Register Date</span>
                            </div>
                            <div class="col-2 bg-primary bg-opacity-75 border col-lg-1">
                                <span class="font-quicksand fs-5 fw-bold text-white">User Type</span>
                            </div>
                            <div class="col-3 col-lg-2 bg-primary bg-opacity-75 border">
                                <span class="font-quicksand fs-5 fw-bold text-white">Action</span>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 my-3">
                        <div class="row rounded shadow">

                            <div class="col-1 border">
                                <span class="font-quicksand fs-5">01</span>
                            </div>
                            <div class="col-3 border col-lg-2">
                                <span class="font-quicksand fs-5">Pasindu Lakshan</span>
                            </div>
                            <div class="col-2 border d-none d-lg-block">
                                <p class="font-quicksand fs-5 text-break">pasindulakshan@gmail.com</p>
                            </div>
                            <div class="col-3 border col-lg-2">
                                <span class="font-quicksand fs-5 ">0785623369</span>
                            </div>
                            <div class="col-2 border d-none d-lg-block">
                                <span class="font-quicksand fs-5 ">2022-07-20</span><br />
                                <span class="font-quicksand fs-5">10:58:36</span>
                            </div>
                            <div class="col-2 border col-lg-1">
                                <span class="font-quicksand fs-5 ">Seller</span>
                            </div>
                            <div class="col-3 col-lg-2 border d-grid">
                                <button class="font-quicksand fs-5 btn btn-success my-3 fw-bold" onclick="setStatus();">Active&nbsp;&nbsp;<i class="bi bi-caret-down-square"></i></button>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="row rounded shadow">

                            <div class="col-1 border">
                                <span class="font-quicksand fs-5">03</span>
                            </div>
                            <div class="col-3 border col-lg-2">
                                <span class="font-quicksand fs-5">Sandaru Chamika</span>
                            </div>
                            <div class="col-2 border d-none d-lg-block">
                                <p class="font-quicksand fs-5 text-break">chamika34@gmail.com</p>
                            </div>
                            <div class="col-3 border col-lg-2">
                                <span class="font-quicksand fs-5">0785624656</span>
                            </div>
                            <div class="col-2 border d-none d-lg-block">
                                <span class="font-quicksand fs-5">2022-09-20</span><br />
                                <span class="font-quicksand fs-5">10:58:36</span>
                            </div>
                            <div class="col-2 border col-lg-1">
                                <span class="font-quicksand fs-5">Customer</span>
                            </div>
                            <div class="col-3 col-lg-2 border d-grid">
                                <button class="font-quicksand fs-5 btn btn-danger my-3 fw-bold" onclick="setStatus();">Blocked&nbsp;&nbsp;<i class="bi bi-caret-down-square"></i></button>
                            </div>

                        </div>
                    </div>

                    <div class="modal" tabindex="-1" id="ActionModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Change User Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label font-quicksand" for="flexRadioDefault1">
                                            Block
                                        </label>
                                    </div>
                                    <br />
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label font-quicksand" for="flexRadioDefault2">
                                            Deactive
                                        </label>
                                    </div>
                                    <br />
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                                        <label class="form-check-label font-quicksand" for="flexRadioDefault3">
                                            Remove
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
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
        </div>


        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
</body>

</html>