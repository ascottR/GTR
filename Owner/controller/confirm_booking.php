<?php
include_once "../database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have columns named 'BookingID' and 'BookingStatus' in your booking_confirmed table
    $bookingId = $_POST['bookingId'];
    $status = $_POST['status'];

    // Update the booking status in the database
    if ($status == "Confirmed") {
        $updateSql = "UPDATE booking_confirmed SET BookingStatus = '$status' WHERE BookingID = $bookingId";
        $updateResult = mysqli_query($conn, $updateSql);
    } else if ($status == "Rejected") {
        $deleteSql = "DELETE FROM booking_confirmed WHERE BookingID = $bookingId";
        $deleteResult = mysqli_query($conn, $deleteSql);
    }

    if (isset($updateResult) && $updateResult) {
        echo "Booking status updated successfully";
    } else if (isset($deleteResult) && $deleteResult) {
        echo "Booking record deleted successfully";
    } else {
        echo "Error updating/deleting booking status in the database: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
