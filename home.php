<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Tech - Home</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="imageslider.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?php
    require "header.php";
    require "connection.php";
    ?>
    <div class="container-fluid">
        <div class="row">

        <div class="col-2 d-none d-lg-block text-center" style="margin-top: 100px;">
                <?php
                $brandrs = Database::search("SELECT * FROM `brand` WHERE `status_id`='1' LIMIT 10;");
                $brandrsnum = $brandrs->num_rows;

                for ($i = 0; $i < $brandrsnum; $i++) {
                    $brand = $brandrs->fetch_assoc();
                ?>
                    <button class="mt-3 btn-brands font-quicksand">
                   <?php echo $brand["name"];?>
                    </button><br>
                <?php
                }
                ?>
            </div>

            <div class="col-12 col-lg-10">
                <div class="demo-cont">
                    <!-- slider start -->
                    <div class="fnc-slider example-slider">
                        <div class="fnc-slider__slides">
                            <!-- slide start -->
                            <div class="fnc-slide m--blend-green m--active-slide">
                                <div class="fnc-slide__inner">
                                    <div class="fnc-slide__mask">
                                        <div class="fnc-slide__mask-inner"></div>
                                    </div>
                                    <div class="fnc-slide__content">
                                        <h2 class="fnc-slide__heading">
                                            <div class="fnc-slide__heading-line">
                                                <span>Apple</span>
                                            </div>
                                            <div class="fnc-slide__heading-line">
                                                <span>iPhone 13</span>
                                            </div>
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <!-- slide end -->
                            <!-- slide start -->
                            <div class="fnc-slide m--blend-dark">
                                <div class="fnc-slide__inner">
                                    <div class="fnc-slide__mask">
                                        <div class="fnc-slide__mask-inner"></div>
                                    </div>
                                    <div class="fnc-slide__content">
                                        <h2 class="fnc-slide__heading">
                                            <div class="fnc-slide__heading-line">
                                                <span>GoPro</span>
                                            </div>
                                            <div class="fnc-slide__heading-line">
                                                <span>Hero 9</span>
                                            </div>
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <!-- slide end -->
                            <!-- slide start -->
                            <div class="fnc-slide m--blend-red">
                                <div class="fnc-slide__inner">
                                    <div class="fnc-slide__mask">
                                        <div class="fnc-slide__mask-inner"></div>
                                    </div>
                                    <div class="fnc-slide__content">
                                        <h2 class="fnc-slide__heading">
                                            <div class="fnc-slide__heading-line">
                                                <span>Macbook</span>
                                            </div>
                                            <div class="fnc-slide__heading-line">
                                                <span>Pro</span>
                                            </div>
                                        </h2>

                                    </div>
                                </div>
                            </div>
                            <!-- slide end -->
                            <!-- slide start -->
                            <div class="fnc-slide m--blend-blue">
                                <div class="fnc-slide__inner">
                                    <div class="fnc-slide__mask">
                                        <div class="fnc-slide__mask-inner"></div>
                                    </div>
                                    <div class="fnc-slide__content">
                                        <h2 class="fnc-slide__heading">
                                            <div class="fnc-slide__heading-line">
                                                <span>Canon</span>
                                            </div>
                                            <div class="fnc-slide__heading-line">
                                                <span>EOS R10</span>
                                            </div>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- slide end -->
                        </div>
                        <nav class="fnc-nav">
                            <div class="fnc-nav__bgs">
                                <div class="fnc-nav__bg m--navbg-green m--active-nav-bg"></div>
                                <div class="fnc-nav__bg m--navbg-dark"></div>
                                <div class="fnc-nav__bg m--navbg-red"></div>
                                <div class="fnc-nav__bg m--navbg-blue"></div>
                            </div>
                            <div class="fnc-nav__controls">
                                <button class="fnc-nav__control">
                                    Apple iPone 13
                                    <span class="fnc-nav__control-progress"></span>
                                </button>
                                <button class="fnc-nav__control">
                                    GoPro Hero 9
                                    <span class="fnc-nav__control-progress"></span>
                                </button>
                                <button class="fnc-nav__control">
                                    Macbook Pro
                                    <span class="fnc-nav__control-progress"></span>
                                </button>
                                <button class="fnc-nav__control">
                                    Canon EOS R10
                                    <span class="fnc-nav__control-progress"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>

       

            <div class="col-12">
                <?php
                require "homeContent.php";
                ?>
            </div>

            <?php
            require "footer.php";
            ?>

        </div>

        <script>

        </script>
        <script src="animation.js"></script>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>