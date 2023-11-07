<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" /> -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />

    <title>Danish - Login Page</title>
</head>

<body class="bg-login">

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-4 mx-auto">
                        <div class="card shadow rounded-5 overflow-hidden">
                            <div class="card-body p-4 p-sm-5">
                                <!-- <h5 class="card-title">Sign In</h5>
                <p class="card-text mb-5">See your growth and get consulting support!</p> -->
                                <form class="form-body" action="login_process.php" method="POST">
                                    <div class="d-grid">
                                        <!-- <a class="" href="javascript:;"><span class="d-flex justify-content-center align-items-center"> -->
                                        <img class="m-auto" src="assets/images/brand-logo-2.png" width="160" alt="">
                                        </span>
                                        <!-- </a> -->
                                    </div>
                                    <div class="login-separater text-center mb-4">
                                        <!-- <hr> -->
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                                                <input type="email" class="form-control radius-30 ps-5" name="email" id="email" placeholder="Email Address" required>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" class="form-control radius-30 ps-5" name="password" id="password" placeholder="Enter Password" required>
                                                <i style="position: absolute;top: 10px;right: 20px;" class="bi bi-eye-slash" id="togglePassword"></i>
                                            </div>
                                        </div>
                                        <!-- <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a> -->
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary radius-30">Log In</button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                      <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a>
                      </p>
                    </div> -->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#inputChoosePassword");
        // console.log(togglePassword);
        // console.log();
        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type");

            if (type === "password") {
                password.setAttribute("type", "text");
            } else {
                password.setAttribute("type", "password");
            }


            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        // const form = document.querySelector("form");
        // form.addEventListener('submit', function(e) {
        //     e.preventDefault();
        // });
    </script>
    <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->



</body>

</html>