<?php

$host = "localhost";
$username = "sagarte1_affiliate";
$password = "affiliate@123";
$database = "sagarte1_affiliate";

// connection
$con = mysqli_connect("$host", "$username", "$password", "$database");


// check connection

// if (!$con) {
//     header("Location: ../errors/db.php");
//     die();
// } else {
//     echo "connected database";
// }
