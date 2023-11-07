<?php
if (isset($_POST['offerid'])) {
    $selectedOfferId = $_POST['offerid'];

    // Fetch the order link for the selected offer from your data source
    // Replace this with your actual database query or data retrieval logic
    $offlink = ''; // Initialize with an empty string

    // You should retrieve the actual $offlink value based on $selectedOfferId here

    // Send the $offlink as the response
    echo $offlink;
}
