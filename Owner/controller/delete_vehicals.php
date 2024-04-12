<?php

include_once "../Database/config.php";
include "../login/login.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $id;
    $vehicleId = $_POST['id']; // Use $_POST to retrieve data sent via AJAX

    // Fetch the image path from the database
    $sql = "SELECT img_path FROM listed_vehicles WHERE VehicleOwnerID = $userId AND VehicleID = $vehicleId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $imgPath = $row['img_path'];

        // Delete the image file
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }

        // Delete the row from the database
        $deleteSql = "DELETE FROM listed_vehicles WHERE VehicleID = $vehicleId";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            echo "Vehicle deleted successfully";
        } else {
            echo "Error deleting vehicle from the database";
        }
    } else {
        echo "Error fetching image path from the database";
    }
} else {
    echo "Invalid request";
}

// Close the database connection
