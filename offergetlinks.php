<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}


// Check if param1 is set in the URL
if (isset($_GET['pusr_id'])) {
    $pusr_id = $_GET['pusr_id'];
    echo "Value of param1 is: " . $pusr_id;
} else {
    echo "param1 is not set in the URL.";
}
$off = '';
$trackinglink = "";
if (isset($_POST['submit'])) {
    $order_link =  $_POST['offerid'];
    $trackinglink = $order_link . "&pusr_id=" . $pusr_id;
}

// // Check if param2 is set in the URL
// if (isset($_GET['param2'])) {
//     $param2Value = $_GET['param2'];
//     echo "Value of param2 is: " . $param2Value;
// } else {
//     echo "param2 is not set in the URL.";
// }

?>
<?php include('includes/head.php') ?>

<body>
    <?php
    $query = "SELECT * FROM offers";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $companyOffer = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    // print_r($companyOffer);
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
                <div style="border: none;" class="breadcrumb-title pe-3"><b>Get Links</b></div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Get Links <? //= $order_link 
                                                ?></h5>
                    <? //= $offer_id . " " . $pusr_id  
                    ?>
                    <div class="modal-body text-dark">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Select Offer</label>
                                <select class="form-select" id="statusSelect" name="offerid">
                                    <option>select Offer</option>
                                    <?php
                                    print_r($offer);
                                    foreach ($companyOffer as $key => $Offer2) {
                                    ?>
                                        <option value="<?= $Offer2['order_link'] ?>">
                                            <p><?= $Offer2['offers_id'] ?></p>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p><?= $Offer2['offer_name'] ?></p>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer border-dark mb-3" style="justify-content: left;">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>

                        <script>
                            // Add an event listener for the select element to detect changes
                            document.getElementById('statusSelect').addEventListener('change', function() {
                                var selectedOfferId = this.value;

                                // Send an AJAX request to fetch the order link for the selected offer
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajax_get_order_link.php', // Replace with the actual URL of your PHP script
                                    data: {
                                        offerid: selectedOfferId
                                    },
                                    success: function(response) {
                                        // Update the $offlink value based on the response from the server
                                        var offlink = response;
                                        // You can update the interface or do further processing as needed
                                    }
                                });
                            });
                        </script>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tracking Link</label>
                            <textarea class="form-control mb-3" type="text" name="uname" placeholder="Enter.." aria-label=".form-control-lg example"><?= $trackinglink ?></textarea>
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


    <!-- Bootstrap bundle JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>


</body>

</html>