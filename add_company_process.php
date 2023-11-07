<?php
session_start();
require_once('dbconfig/dbcon.php'); // Replace with your database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aname = $_POST['aname'];
    $cemail = $_POST['cemail'];
    $cpassword = $_POST['cpassword'];
    $cphone = $_POST['cphone'];
    $cname = $_POST['cname'];
    $cstatus = $_POST['cstatus'];
    $type = $_POST['type'];

    if ($type == 'add') {
        // Insert data into the database
        $sql = "INSERT INTO advertiser (advertiser_name, advr_email, advr_password, advr_contact, company_names, company_status) VALUES ('$aname', '$cemail', '$cpassword', '$cphone', '$cname', '$cstatus')";

        // Execute the query
        if ($con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Close the connection
        $con->close();

        // if ($stmt->execute()) {
        //     // Data inserted successfully

        //     // Upload file
        //     $targetDir = 'images/';
        //     $targetFile = $targetDir . basename($clogo['name']);
        //     $uploadOk = true;
        //     $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        //     // Check if file already exists
        //     if (file_exists($targetFile)) {
        //         $uploadOk = false;
        //     }

        //     // Check file size, type, etc. here...

        //     if ($uploadOk) {
        //         // Create the 'images' folder if it doesn't exist
        //         if (!is_dir($targetDir)) {
        //             mkdir($targetDir, 0777, true);
        //         }

        //         // Move uploaded file to the target directory
        //         if (move_uploaded_file($clogo['tmp_name'], $targetFile)) {
        //             // File uploaded successfully
        //         } else {
        //             // Error uploading file
        //         }
        //     } else {
        //         // Error uploading file due to validation checks
        //     }

        //     $stmt->close();
        // }

        $_SESSION["msg"] = "Company added successfully";
    } elseif ($type == 'update') {
        $companyID = $_POST['company_id'];

        // Fetch existing company data
        $query = "SELECT * FROM advertiser WHERE advertiser_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $companyID);
        $stmt->execute();
        $result = $stmt->get_result();
        $existingCompanyData = $result->fetch_assoc();
        $stmt->close();

        // Update data in the database
        // Build your SQL query
        $sql = "UPDATE advertiser SET advertiser_name = '$aname', advr_email = '$cemail', advr_password = '$cpassword', advr_contact = '$cphone', company_names = '$cname', company_status = '$cstatus' WHERE advertiser_id = $companyID";

        // Execute the query
        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Close the connection
        $con->close();
    } elseif ($type == 'delete') {
        $companyID = $_POST['company_id'];

        // Update data in the database
        $stmt = $con->prepare("DELETE FROM companys WHERE advertiser_id = $companyID");

        if ($stmt->execute()) {
            // Data updated successfully

            $_SESSION["msg"] = "Company deleted";
            $stmt->close();
        } else {
            echo "Error updating data";
        }
    }
    header("Location:advertiser.php");
}
