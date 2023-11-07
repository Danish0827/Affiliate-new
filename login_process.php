<?php
session_start();
require_once('dbconfig/dbcon.php'); // Replace with your database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind the query
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    // echo $sql;
    // die();
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header('Location: index'); // Redirect to the dashboard or some other page
        exit(); // Make sure to exit after redirection
    } else {
        echo "Invalid email or password.";
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
