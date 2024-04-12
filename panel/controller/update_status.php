<?php
// Include your database connection file
include_once "../Database/config.php";

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Update the status based on the action
    $newStatus = ($action == 'Confirmed') ? 'Confirmed' : 'Rejected';

    $updateQuery = "UPDATE listed_vehicles SET status = '$newStatus' WHERE VehicleID = $id";
    $result = mysqli_query($conn, $updateQuery);

    // Check for success or failure and send a response
    if ($result) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid parameters";
}
