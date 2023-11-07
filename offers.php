<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

$countries = [
    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
    "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
    "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
    "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica",
    "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Democratic Republic of the Congo (Congo-Kinshasa)", "Denmark", "Djibouti", "Dominica", "Dominican Republic",
    "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini (fmr. 'Swaziland')", "Ethiopia", "Fiji", "Finland",
    "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea",
    "Guinea-Bissau", "Guyana", "Haiti", "Holy See", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran",
    "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya",
    "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein",
    "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania",
    "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar (formerly Burma)", "Namibia",
    "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia (formerly Macedonia)", "Norway",
    "Oman", "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland",
    "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino",
    "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands",
    "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland",
    "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
    "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu",
    "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
];
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
    // Fetch the company data to populate the table
    // Your code for executing the SELECT query
    $query = "SELECT *
FROM offers
LEFT JOIN advertiser ON offers.offer_advertiser_name = advertiser.advertiser_id    
LEFT JOIN publisher ON offers.offers_id = publisher.publisher_id;";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $companyOffer = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();


    // Get the last inserted ID from the offers table
    $getLastInsertedIdQuery = "SELECT MAX(offers_id) AS last_id FROM offers";
    $stmt = $con->prepare($getLastInsertedIdQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    $lastIdRow = $result->fetch_assoc();
    $lastInsertedId = $lastIdRow['last_id'];
    $stmt->close();

    // $lastInsertedId now contains the last inserted ID from the offers table

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



    // Sort the array based on the 'id' field
    // usort($withoutCompanyData, function ($a, $b) {
    //     return $a['id'] - $b['id'];
    // });

    // Get the last row's id and increment it by 1
    $lastId = end($withoutCompanyData)['id'];
    $newId = $lastId + 1;

    // Now you can use the $newId for whatever purpose you need

    // Sorting variable can be updated as well
    $sortingVariable = $newId;

    // Rest of your code...
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
                            <li class="breadcrumb-item active" aria-current="page">Offers</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Add Offer</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content ">
                                    <form action="add_offers_process.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="type" value="add">
                                        <input type="hidden" name="offer_id" value="<?= $lastInsertedId + 1 ?>">
                                        <div class="modal-header border-dark">
                                            <h5 class="modal-title text-dark">Add Offer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Advertiser</label>
                                                <!-- <select name="advrname" class="form-select" id="statusSelect"> -->
                                                <!-- <select name="advrname" class="form-select" id="single-select-optgroup-field" data-placeholder="Choose anything" multiple> -->
                                                <select name="advrname" class="form-select" id="single-select-optgroup-field" data-placeholder="Choose one thing" onchange="updateInputValue(this)" required>
                                                    <option></option>
                                                    <?php
                                                    foreach ($withoutCompanyData as $key => $Offer) {
                                                    ?>
                                                        <option value="<?= $Offer['advertiser_id'] ?>">
                                                            <?= $Offer['advertiser_id'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $Offer['advertiser_name'] ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Offer Name</label>
                                                <input type="text" class="form-control" name="oname" placeholder="" required>
                                            </div>
                                            <label class="form-label fw-bold">Preview Link</label>
                                            <div class="input-group mb-3">
                                                <input type="url" class="form-control" name="oprelink12" placeholder="https://example.com" aria-label="https://example.com" required>
                                                <span class="input-group-text" id="basic-addon2"><span id="selectedValue"></span></span>
                                                <input type="hidden" class="form-control" name="oprelinkid" id="oprelink" placeholder="https://example.com">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Tracking Link</label>
                                                <input type="url" class="form-control" name="otraclink" placeholder="https://example.com" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Payout</label>
                                                <input type="number" class="form-control" name="opayout" placeholder=" " required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Publisher Payout</label>
                                                <input type="number" class="form-control" name="opubpayout" placeholder="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Description</label>
                                                <textarea required class="form-control" style="width: 100%;" name="odec" id="" rows="2"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Overall Caps</label>
                                                <input type="number" class="form-control" name="overallcap" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Daily Caps</label>
                                                <input type="number" class="form-control" name="dailycaps" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Secondary Offer</label>
                                                <input type="text" class="form-control" name="secondoffer" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Acess Type</label>
                                                <select class="form-select" id="statusSelect" name="acesstype">
                                                    <option value="Public">Public</option>
                                                    <option value="Private">Private</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Currency Type</label>
                                                <select class="form-select" id="statusSelect" name="currencytype">
                                                    <option value="IND">IND</option>
                                                    <option value="USD">USD</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Allowed Geo</label>
                                                <select class="form-select" id="multiple-select-field" name="allowedgeo[]" data-placeholder="Choose anything" multiple required>
                                                    <?php
                                                    foreach ($countries as $key => $conty) {
                                                    ?>
                                                        <option value="<?= $conty ?>"><?= $conty ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Expiration</label>
                                                <input type="date" class="form-control" name="expiration" placeholder="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Offer Type</label>
                                                <select class="form-select" id="statusSelect" name="offertype">
                                                    <option value="s2s">s2s</option>
                                                    <option value="Image">Image</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Status</label>
                                                <select class="form-select" id="statusSelect" name="state">
                                                    <option value="active">active</option>
                                                    <option value="inactive">inactive</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Track IP City</label>
                                                <select class="form-select" id="statusSelect" name="trackipcity">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
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
                </div>
            </div>
            <script>
                function updateInputValue(selectElement) {
                    var selectedValue = selectElement.value;
                    document.getElementById('oprelink').value = "?advr_id=" + selectedValue;
                    document.getElementById('selectedValue').textContent = "?advr_id=" + selectedValue; // Set the span text
                }
            </script>
            <div class="row">
                <div class="col-md-6">
                    <div style="border-right: none;" class="breadcrumb-title mb-3"><b>Offers</b></div>
                    <div class="mb-3 col-md-6">
                        <select class="form-select" id="statusSelect">
                            <option value="all">All Offers</option>
                            <option value="active">Active Offers</option>
                            <option value="inactive">Inactive Offers</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary mb-3" id="filterButton">Filter</button>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Customer Details
                        </h5>
                        <?php
                        if (isset($_SESSION["msg"])) {
                            echo "<faseta>" . $_SESSION["msg"] . "</faseta>";
                            unset($_SESSION["msg"]);
                        }
                        ?>
                        <form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Offer ID</th>
                                    <th>Offer Name</th>
                                    <th>Advertiser Name</th>
                                    <!-- <th>Currency</th> -->
                                    <th>Our Payout</th>
                                    <th>Publisher Payout</th>
                                    <th>Status</th>
                                    <th>Postback</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($companyOffer as $key => $Offer) {
                                ?>
                                    <tr>
                                        <td><b class="mb-0 semibold"><?= $Offer['offers_id'] ?></b></td>
                                        <td><b class="mb-0 semibold"><?= $Offer['offer_name'] ?></b></td>
                                        <td><b class="mb-0 semibold"><?= $Offer['offer_advertiser_name'] ?> <?= $Offer['advertiser_name'] ?></b></td>
                                        <!-- <td><b class="mb-0 semibold"><? //= $Offer['currency_type'] 
                                                                            ?></b></td> -->
                                        <td><b class="mb-0 semibold">₹ <?= $Offer['payout'] ?></b></td>
                                        <td><b class="mb-0 semibold">₹ <?= $Offer['publisher_payout'] ?></b></td>
                                        <!-- <td><b class="mb-0 semibold"><? //= $Offer['offer_type'] 
                                                                            ?></b></td> -->
                                        <td><b class="mb-0 semibold"><?= $Offer['states'] ?></b></td>
                                        <td>
                                            <div style="justify-content: center;" class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleDangerModal<?= $Offer['offers_id'] ?>">Get Links</button>

                                                        <div class="modal fade" id="exampleDangerModal<?= $Offer['offers_id'] ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content ">
                                                                    <form action="" method="post">
                                                                        <div class="modal-header border-dark">
                                                                            <h5 class="modal-title text-dark">Get Links</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body text-dark">
                                                                            <textarea class="form-control" style="width: 100%;padding:20px" name="" id="" rows="4"><?= $Offer['preview_link'] ?>&offer_id=<?= $Offer['offers_id'] ?></textarea>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <!-- <a style="padding: 7px 14px;background: #3461ff!important;color: white !important;border-radius: 5px;" href="" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a> -->
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                    <div class="col">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleWarningModal<?= $Offer['offers_id'] ?>"><i class="bi bi-pencil-fill m-0"></i></button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleWarningModal<?= $Offer['offers_id'] ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content ">
                                                                    <form action="add_offers_process.php" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" name='type' value="update">
                                                                        <input type="hidden" name="company_id" value="<?= $Offer['offers_id'] ?>">
                                                                        <div class="modal-header border-dark">
                                                                            <h5 class="modal-title text-dark">Edit Offer</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body text-dark">
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Advertiser</label>
                                                                                <!-- <select class="form-select" id="statusSelect" disabled> -->
                                                                                <select class="form-select" id="single-select-disabled-field" data-placeholder="Choose one thing" disabled>
                                                                                    <option value="<?= $Offer['offer_advertiser_name'] ?> <?= $Offer['advertiser_name'] ?>" selected>
                                                                                        <p>(<?= $Offer['advertiser_id'] ?>)</p>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        <p><?= $Offer['advertiser_name'] ?></p>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Offer Name</label>
                                                                                <input type="text" class="form-control" value="<?= $Offer['offer_name'] ?>" name="oname" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Preview Link</label>
                                                                                <input class="form-control mb-3" name="oprelink12" value="<?= $Offer['preview_link'] ?>" type="url" placeholder="https://example.com">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Tracking Link</label>
                                                                                <input type="url" class="form-control" name="otraclink" value="<?= $Offer['tracking_link'] ?>" placeholder="https://example.com">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Payout</label>
                                                                                <input type="number" class="form-control" name="opayout" value="<?= $Offer['payout'] ?>" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Publisher Payout</label>
                                                                                <input type="number" class="form-control" name="opubpayout" value="<?= $Offer['publisher_payout'] ?>" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Description</label>
                                                                                <textarea class="form-control" style="width: 100%;" name="odec" value="" id="" rows="2"><?= $Offer['descriptions'] ?></textarea>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Overall Caps</label>
                                                                                <input type="number" class="form-control" name="overallcap" value="<?= $Offer['overall_cap'] ?>" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Daily Caps</label>
                                                                                <input type="number" class="form-control" name="dailycaps" value="<?= $Offer['daily_caps'] ?>" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Secondary Offer</label>
                                                                                <input type="text" class="form-control" value="<?= $Offer['secondary_offer'] ?>" name="secondoffer" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Acess Type</label>
                                                                                <select class="form-select" id="statusSelect" name="acesstype">
                                                                                    <option value="Public" <?php echo ($Offer['acess_type'] == 'Public') ? 'selected' : ''; ?>>Public</option>
                                                                                    <option value="Private" <?php echo ($Offer['acess_type'] == 'Private') ? 'selected' : ''; ?>>Private</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Currency Type</label>
                                                                                <select class="form-select" id="statusSelect" name="currencytype">
                                                                                    <option value="USD" <?php echo ($Offer['currency_type'] == 'USD') ? 'selected' : ''; ?>>USD</option>
                                                                                    <option value="IND" <?php echo ($Offer['currency_type'] == 'IND') ? 'selected' : ''; ?>>IND</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Allowed Geo</label>
                                                                                <select class="form-select jhdfjdyfjjy" name="allowedgeo[]" data-placeholder="Choose anything" multiple required>
                                                                                    <?php
                                                                                    $selectedCountries = explode(', ', $Offer['allowed_geo']);
                                                                                    foreach ($countries as $key => $conty) {
                                                                                        $selected = (in_array($conty, $selectedCountries)) ? 'selected' : '';
                                                                                    ?>
                                                                                        <option value="<?= $conty ?>" <?= $selected ?>><?= $conty ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Expiration</label>
                                                                                <input type="date" class="form-control" name="expiration" value="<?= $Offer['expiration'] ?>" placeholder="">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Offer Type</label>
                                                                                <select class="form-select" id="statusSelect" name="offertype">
                                                                                    <option value="s2s" <?php echo ($Offer['offer_type'] == 's2s') ? 'selected' : ''; ?>>s2s</option>
                                                                                    <option value="Image" <?php echo ($Offer['offer_type'] == 'Image') ? 'selected' : ''; ?>>Image</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">State</label>
                                                                                <select class="form-select" id="statusSelect" name="state">
                                                                                    <option value="active" <?php echo ($Offer['states'] == 'active') ? 'selected' : ''; ?>>active</option>
                                                                                    <option value="inactive" <?php echo ($Offer['states'] == 'inactive') ? 'selected' : ''; ?>>inactive</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Track IP City</label>
                                                                                <select class="form-select" id="statusSelect" name="trackipcity">
                                                                                    <option value="yes" <?php echo ($Offer['track_ip_city'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                                                                    <option value="no" <?php echo ($Offer['track_ip_city'] == 'no') ? 'selected' : ''; ?>>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer border-dark">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-warning">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        $('#single-select-optgroup-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });
            // $('#multiple-select-field').change(function() {

            //     console.log($('#multiple-select-field').val())
            // })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.jhdfjdyfjjy').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });

            // Add an event listener for the select change event
            $('.jhdfjdyfjjy').on('change', function() {
                var selectedOption = $(this).val();

                // Check if a specific option is selected (e.g., 'United States')
                if (selectedOption && selectedOption.includes('United States')) {
                    // Trigger the modal to open
                    $('#myModal').modal('show');
                }
            });
        });
    </script>



</body>

</html>