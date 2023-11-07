<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}
?>
<?php include('includes/head.php') ?>
<style>
    faseta {
        font-weight: bolder;
        font-size: 20px;
        margin: 4px 120px;
    }
</style>

<body>
    <?php
    $query = "SELECT * FROM offers 
    LEFT JOIN advertiser ON offers.offers_id = advertiser.advertiser_id 
    LEFT JOIN publisher ON offers.offers_id = publisher.publisher_id;";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $companyOffer = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    // print_r($companyOffer);


    $withoutquery = "SELECT * FROM advertiser";
    $withstmt = $con->prepare($withoutquery);
    $withstmt->execute();
    $withresult = $withstmt->get_result();
    $withoutCompanyData = $withresult->fetch_all(MYSQLI_ASSOC);
    $withstmt->close();

    $withoutquery1 = "SELECT * FROM publisher";
    $withstmt1 = $con->prepare($withoutquery1);
    $withstmt1->execute();
    $withresult1 = $withstmt1->get_result();
    $withoutCompanyData1 = $withresult1->fetch_all(MYSQLI_ASSOC);
    $withstmt1->close();


    $withoutquery2 = "SELECT * FROM offers";
    $withstmt2 = $con->prepare($withoutquery2);
    $withstmt2->execute();
    $withresult2 = $withstmt2->get_result();
    $withoutCompanyData2 = $withresult2->fetch_all(MYSQLI_ASSOC);
    $withstmt2->close();
    ?>

    <!--start wrapper-->
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
                            <li class="breadcrumb-item active" aria-current="page">Conversions Report</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="ms-auto">
                    <div class="col">
             
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Add Company</button>
                 
                        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content ">
                                    <form action="add_company_process.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name='type' value="add">
                                        <div class="modal-header border-dark">
                                            <h5 class="modal-title text-dark">Add Company</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Name</label>
                                                <input class="form-control form-control-lg mb-3" name="cname" type="text" placeholder="ex. SagarTech" aria-label=".form-control-lg example" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Domain:</label>
                                                <input type="url" class="form-control-lg form-control" name="cdomain" placeholder="https://example.com" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Email:</label>
                                                <input type="email" class="form-control-lg form-control" name="cemail" placeholder="example@gmail.com" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Contact:</label>
                                                <input type="number" class="form-control-lg form-control" name="cphone" placeholder="123456789" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Password:</label>
                                                <input type="password" class="form-control-lg form-control" name="cpassword" placeholder="password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Status:</label>
                                                <select class="form-select" id="statusSelect">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer border-dark">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="vontac">
                    <h1>DE</h1>
                </div></div> -->
            </div>
            <!--end breadcrumb-->
            <style>
                ::-ms-input-placeholder {
                    /* Edge 12-18 */
                    color: black !important;
                }

                ::placeholder {
                    color: black !important;
                }
            </style>
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0">Filter</h5>
                    <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="filter-section">
                            <!-- <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">Advertiser</label>
                                <select class="form-select" id="statusSelect">
                                    <?php
                                    // foreach ($withoutCompanyData as $key => $Offer) {
                                    ?>
                                        <option h value="<? //= $Offer['id'] 
                                                            ?>">
                                            <p><? //= $Offer['id'] 
                                                ?></p>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p><? //= $Offer['advertiser_name'] 
                                                ?></p>
                                        </option>
                                    <?php
                                    //}
                                    ?>
                                </select>
                            </div> -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">Publisher</label>
                                <select class="form-select" id="statusSelect">
                                    <?php
                                    foreach ($withoutCompanyData1 as $key => $Offer1) {
                                    ?>
                                        <option value="<?= $Offer1['publisher_id'] ?>">
                                            <p><?= $Offer1['publisher_id'] ?></p>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p><?= $Offer1['publisher_name'] ?></p>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">Offers</label>
                                <select class="form-select" id="statusSelect">
                                    <?php
                                    foreach ($withoutCompanyData2 as $key => $Offer2) {
                                    ?>
                                        <option value="<?= $Offer2['offers_id'] ?>">
                                            <p><?= $Offer2['offers_id'] ?></p>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p><?= $Offer2['offer_name'] ?></p>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">Start Date</label>
                                <input type="text" id="startDate" placeholder="Start" class="form-control datepicker" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold">End Date</label>
                                <input type="text" id="endDate" placeholder="End" class="form-control datepicker" />
                            </div>
                        </div>
                        <div class="modal-footer border-dark" style="justify-content: start;gap: 10px;">
                            <!-- <button type="submit" class="btn btn-danger">Today</button> -->
                            <!-- <button type="submit" class="btn btn-danger">Yesterday</button> -->
                            <button type="button" id="selectMonthButton" class="btn btn-danger">Month</button>
                            <!-- <button type="submit" class="btn btn-danger">Clear Dates</button> -->
                            <button type="submit" class="btn btn-danger">Filter</button>
                        </div>
                    </form>
                </div>
            </div>



            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Conversions Report</h5>


                        <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Publisher Name</th>
                                    <th>Offer Name</th>
                                    <th>Visited</th>
                                    <th>Conversions</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($companyOffer as $key => $conver) {
                                ?>
                                    <tr>
                                        <td><b class="mb-0 semibold"><?= $conver['publisher_name'] ?></b></td>
                                        <td><b class="mb-0 semibold"><?= $conver['offer_name'] ?></b></td>
                                        <td><b class="mb-0 semibold">2</b></td>
                                        <td><b class="mb-0 semibold">2</b></td>
                                        <td><b class="mb-0 semibold">₹ <?= $conver['payout'] ?></b></td>
                                    <?php
                                }
                                    ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




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



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/plugins/datetimepicker/js/legacy.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
    <script src="assets/js/form-date-time-pickes.js"></script>

    <!--app-->
    <script src="assets/js/app.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize datepicker
            $(".datepicker").datepicker();

            // Function to select the entire month's date
            function selectMonth() {
                var currentDate = new Date();
                var firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

                $("#startDate").datepicker("setDate", firstDay);
                $("#endDate").datepicker("setDate", lastDay);
            }

            // Attach the click event to the "Month" button
            $("#selectMonthButton").click(function() {
                selectMonth();
            });
        });
    </script> -->
</body>

</html>