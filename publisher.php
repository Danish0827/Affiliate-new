<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit();
}

function generateRandomAlphaNumeric($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Example usage:
$length = 6; // Change this to the desired length
$randomString = generateRandomAlphaNumeric($length);


?>
<?php include('includes/head.php') ?>

<body>
    <?php
    // Fetch the company data to populate the table
    $query = "SELECT *
    FROM publisher
    LEFT JOIN offers ON offers.offers_id = publisher.publisher_id;";

    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $companyUser = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    $withoutquery = "SELECT * FROM publisher";
    $withstmt = $con->prepare($withoutquery);
    $withstmt->execute();
    $withresult = $withstmt->get_result();
    $withoutCompanyData = $withresult->fetch_all(MYSQLI_ASSOC);
    $withstmt->close();




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
                            <li class="breadcrumb-item active" aria-current="page">Publisher</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Add Publisher</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content ">
                                    <form action="add_users_process.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name='type' value="add">
                                        <div class="modal-header border-dark">
                                            <h5 class="modal-title text-dark">Add Publisher</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Publisher Name</label>
                                                <input class="form-control mb-3" type="text" name="pname" placeholder="Name" aria-label=".form-control-lg example">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Email ID</label>
                                                <input type="email" class="form-control" name="pemail" placeholder="example@gmail.com" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Password</label>
                                                <input type="password" class="form-control" name="ppassword" placeholder="password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Contact No</label>
                                                <input type="number" class="form-control" name="pphone" placeholder="123456789" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Name</label>
                                                <input class="form-control mb-3" type="text" name="cpname" placeholder="ex. SagarTech" aria-label=".form-control-lg example">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Company Status:</label>
                                                <select name="pstatus" class="form-select" id="statusSelect">
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
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Publisher Details</h5>
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
                                    <th>Pusr ID</th>
                                    <th>Publisher Name</th>
                                    <th>Email ID</th>
                                    <th>Company Name</th>
                                    <th>Status</th>
                                    <th>Edit Publisher</th>
                                    <th>Tracking Links</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($companyUser as $key => $Users) {

                                    // $sql = 'SELECT * FROM order_details WHERE user_id = "' . $Users['uunique_id'] . '" AND company_id = "' . $uniId . '"';
                                    // $res = mysqli_query($con, $sql);

                                    // $orderIds = []; // Array to store non-empty order_id values

                                    // while ($row = mysqli_fetch_assoc($res)) {
                                    //     if (!empty($row['order_id'])) {
                                    //         $orderIds[] = $row['order_id'];
                                    //     }
                                    // }
                                    // $count = mysqli_num_rows($res);
                                    // $purchasedcount = count($orderIds);  // Count the number of non-empty order_id values


                                ?>
                                    <tr>
                                        <td><b><?= $Users['publisher_id'] ?> </b></td>
                                        <td><b class="mb-0 semibold"><?= $Users['publisher_name'] ?></b></td>
                                        <td><b class="p-0"> <?= $Users['pusr_email'] ?></td>
                                        <td><b class="p-0"> <?= $Users['company_names'] ?></b></td>
                                        <td><b class="p-0"> <?= $Users['pusr_status'] ?></b></td>
                                        <!-- <td><b class="p-0">Rs 2666.5</b></td> -->

                                        <td>
                                            <div style="justify-content: center;" class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <!-- <a style="padding: 7px 14px;background: #3461ff!important;color: white !important;border-radius: 5px;" href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a> -->
                                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom">

                                                    <div class="col">
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleWarningModal<?= $Users['publisher_id'] ?>">Edit</button>

                                                        <div class="modal fade" id="exampleWarningModal<?= $Users['publisher_id'] ?>" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                <div class="modal-content ">
                                                                    <form action="add_users_process.php" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" name='type' value="update">
                                                                        <input type="hidden" name="company_id" value="<?= $Users['publisher_id'] ?>">
                                                                        <div class="modal-header border-dark">
                                                                            <h5 class="modal-title text-dark">Edit Publisher</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body text-dark">
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Publisher Name</label>
                                                                                <input class="form-control mb-3" type="text" name="pname" value="<?= $Users['publisher_name'] ?>" placeholder="Name" aria-label=".form-control-lg example">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Email ID</label>
                                                                                <input type="email" class="form-control" name="pemail" value="<?= $Users['pusr_email'] ?>" placeholder="example@gmail.com" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Password</label>
                                                                                <input type="password" class="form-control" name="ppassword" value="<?= $Users['pusr_password'] ?>" placeholder="password" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Contact No</label>
                                                                                <input type="number" class="form-control" name="pphone" value="<?= $Users['pusr_contact'] ?>" placeholder="123456789" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Company Name</label>
                                                                                <input class="form-control mb-3" type="text" name="cpname" value="<?= $Users['company_names'] ?>" placeholder="ex. SagarTech" aria-label=".form-control-lg example">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label fw-bold">Company Status:</label>
                                                                                <select name="pstatus" class="form-select" id="statusSelect">
                                                                                    <option value="active" <?php echo ($Users['pusr_status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                                                                    <option value="inactive" <?php echo ($Users['pusr_status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer border-dark">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
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
                                            <div style="justify-content: center;" class="table-actions d-flex align-items-center gap-3 fs-6">
                                                <a href="offergetlinks?pusr_id=<?= $Users['publisher_id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleDangerModal">Get Links</button>
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


</body>

</html>