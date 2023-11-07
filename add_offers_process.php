<?php
session_start();
require_once('dbconfig/dbcon.php'); // Replace with your database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $advrname = $_POST['advrname'];
    $oname = $_POST['oname'];
    // $oprelink12 = $_POST['oprelink12'];
    // $oprelinkid = $_POST['oprelink12']+$_POST['oprelinkid'];
    $oprelink = $_POST['oprelink12'] . $_POST['oprelinkid'];
    $otraclink = $_POST['otraclink'];
    $opayout = $_POST['opayout'];
    $opubpayout = $_POST['opubpayout'];
    $odec = $_POST['odec'];
    $overallcap = $_POST['overallcap'];
    $dailycaps = $_POST['dailycaps'];
    $secondoffer = $_POST['secondoffer'];
    $acesstype = $_POST['acesstype'];
    $currencytype = $_POST['currencytype'];
    $allowedgeo = implode(', ', $_POST['allowedgeo']);
    $expiration = $_POST['expiration'];
    $offertype = $_POST['offertype'];
    $state = $_POST['state'];
    $trackipcity = $_POST['trackipcity'];
    $orderlink = $_POST['oprelink12'] . $_POST['oprelinkid'] . "&order_id=" . $_POST['offer_id'];
    $type = $_POST['type'];

    if ($type == 'add') {
        // Insert data into the database
        $sql = "INSERT INTO offers (offer_advertiser_name	, offer_name, preview_link, tracking_link, payout, publisher_payout, descriptions,overall_cap,daily_caps,secondary_offer,acess_type,currency_type,allowed_geo,expiration,offer_type,states,	track_ip_city,order_link) VALUES ('$advrname', '$oname', '$oprelink', '$otraclink', '$opayout', '$opubpayout','$odec', '$overallcap', '$dailycaps', '$secondoffer', '$acesstype', '$currencytype', '$allowedgeo', '$expiration', '$offertype', '$state', '$trackipcity','$orderlink')";
        // echo $sql;
        // die();
        // Execute the query
        if ($con->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Close the connection
        $con->close();


        $_SESSION["msg"] = "Company added successfully";
    } elseif ($type == 'update') {
        $companyID = $_POST['company_id'];

        // Fetch existing company data
        $query = "SELECT * FROM offers WHERE offers_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $companyID);
        $stmt->execute();
        $result = $stmt->get_result();
        $existingCompanyData = $result->fetch_assoc();
        $stmt->close();

        // Update data in the database
        // Build your SQL query
        $sql = "UPDATE offers SET offer_name = '$oname', preview_link = '$oprelink', tracking_link = '$otraclink', payout = '$opayout', publisher_payout  = '$opubpayout',descriptions ='$odec',overall_cap ='$overallcap',daily_caps ='$dailycaps',secondary_offer = '$secondoffer',acess_type = '$acesstype',currency_type ='$currencytype',allowed_geo = '$allowedgeo',expiration = '$expiration',offer_type ='$offertype',states = '$state',track_ip_city = '$trackipcity',order_link = '$orderlink' WHERE offers_id = $companyID";

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
        $stmt = $con->prepare("DELETE FROM offers WHERE offers_id = $companyID");

        if ($stmt->execute()) {
            // Data updated successfully

            $_SESSION["msg"] = "Company deleted";
            $stmt->close();
        } else {
            echo "Error updating data";
        }
    }
    header("Location:offers.php");
}
