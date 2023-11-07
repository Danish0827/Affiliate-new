<?php
session_start();
require_once('dbconfig/dbcon.php'); // Replace with your database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];
    $pemail = $_POST['pemail'];
    $ppassword = $_POST['ppassword'];
    $pphone = $_POST['pphone'];
    $cpname = $_POST['cpname'];
    $pstatus = $_POST['pstatus'];
    $type = $_POST['type'];

    if ($type == 'add') {
        // Insert data into the database
        $sql = "INSERT INTO publisher (publisher_name, pusr_email, pusr_password, pusr_contact, company_names, pusr_status) VALUES ('$pname', '$pemail', '$ppassword', '$pphone', '$cpname', '$pstatus')";

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
        $query = "SELECT * FROM publisher WHERE publisher_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $companyID);
        $stmt->execute();
        $result = $stmt->get_result();
        $existingCompanyData = $result->fetch_assoc();
        $stmt->close();

        // Update data in the database
        // Build your SQL query
        $sql = "UPDATE publisher SET publisher_name = '$pname', pusr_email = '$pemail', pusr_password = '$ppassword', pusr_contact = '$pphone', company_names = '$cpname', pusr_status = '$pstatus' WHERE publisher_id = $companyID";

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
        $stmt = $con->prepare("DELETE FROM publisher WHERE id = $companyID");

        if ($stmt->execute()) {
            // Data updated successfully

            $_SESSION["msg"] = "Company deleted";
            $stmt->close();
        } else {
            echo "Error updating data";
        }
    }
    header("Location:publisher.php");
}
