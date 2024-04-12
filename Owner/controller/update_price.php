<?php
// Include your database connection file
include_once "../Database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a column named 'id' in your database table
    $vehicleId = $_POST['vehicleId'];
    $newPrice = $_POST['price'];

    // Update the price in the database
    $updateSql = "UPDATE listed_vehicles SET price = '$newPrice' WHERE VehicleID = $vehicleId";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        header("Location: ../views/addvehicles.php");
        exit(); 
    } else {
        echo "Error updating price in the database";
    }
} else {
    echo "Invalid request";
}
