<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}
?>
<?php include('includes/head.php') ?>

<body>
    <?php
    // Fetch the company data to populate the table
    $query = "SELECT * FROM advertiser";

    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $companyData = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    ?>


    <div class="wrapper">
        <!--start top header-->
        <?php include('includes/header.php') ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php include('includes/sidebar.php') ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="index"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                <?php
                /// foreach ($companyData as $data) { 
                ?>
                <a style="color: black;" href="company-users?c_id=<?= $data['id'] ?>&uniId=<?= $data['cunique_id'] ?>&url=<?= $data['company_domain'] ?>">
                    <div class="col">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <h6 class="mb-3">Our Advertiser<? //= $data['company_name']; 
                                                                        ?></h6>
                                        <h4 class="mb-0">53<? //= $data['user_count']; 
                                                            ?></h4>
                                        <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>Total Advertiser</span></p>
                                    </div>
                                    <div class="ms-auto widget-icon text-white">
                                        <img src="images/<? //= $data['company_logo']; 
                                                            ?>" class="rounded-circle" width="50" height="50" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <?php
                // } 
                ?>

            </div><!--end row-->




        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Mode</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- <h6 class="mb-0">Theme Variation</h6> -->
                    <!-- <hr> -->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3" checked>
                        <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                    </div>

                </div>
            </div>
        </div>
        <!--end switcher-->

    </div>
    <!--end wrapper-->


    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/index.js"></script>
    <script>
        new PerfectScrollbar(".review-list");
        new PerfectScrollbar(".chat-talk");
    </script>


</body>

</html>