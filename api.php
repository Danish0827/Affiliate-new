<?php
include 'dbconfig/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['advr_id'], $_GET['order_id'], $_GET['pusr_id'], $_GET['order_details'], $_GET['redirect_url'], $_GET['customeruID'], $_GET['type'])) {
        $advr_id = $_GET['advr_id'];
        $order_id = $_GET['order_id'];
        $pusr_id = $_GET['pusr_id'];
        $order_details = $_GET['order_details'];
        $redirect_url = $_GET['redirect_url'];
        $customer_id = $_GET['customeruID'];
        $type = $_GET['type'];

        if ($type === 'add') {
            // Ensure proper escaping of values to prevent SQL injection
            $advr_id = mysqli_real_escape_string($con, $advr_id);
            // echo $advr_id;
            $order_id = mysqli_real_escape_string($con, $order_id);
            $pusr_id = mysqli_real_escape_string($con, $pusr_id);
            $customer_id = mysqli_real_escape_string($con, $customer_id);

            $sql = "INSERT INTO order_details (advr_id_api, offers_id_api, pusr_id_api, customer_uniqueid) VALUES ('$advr_id', '$order_id', '$pusr_id', '$customer_id')";

            if (mysqli_query($con, $sql)) {
                // echo "Order details inserted successfully";
                header("Location: $redirect_url");
                exit;
            } else {
                echo "Failed to insert order details: " . mysqli_error($con);
            }
        } elseif ($type === 'update') {
            // Update the order_id based on customer_uniqueid
            $customer_id = mysqli_real_escape_string($con, $customer_id);


            $update_sql = "UPDATE order_details SET order_details_api = '$order_details' WHERE customer_uniqueid = '$customer_id'";

            if (mysqli_query($con, $update_sql)) {
                echo "Order details updated successfully";
                if (!isset($_COOKIE['redirectcookie'])) {
                    // The cookie does not exist, so we set it
                    setcookie('redirectcookie', '1', time() + 120); // 120 seconds = 2 minutes
                }
                header("Location: $redirect_url");
                exit;
            } else {
                echo "Failed to update order details: " . mysqli_error($con);
            }
        } else {
            echo "Invalid type";
        }
    } else {
        echo "Missing required parameters";
    }
} else {
    echo "Unsupported request method";
}

$con->close();
