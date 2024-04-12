<?php
include_once "../database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingID = $_POST['bookingID'];

    // Use a prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "DELETE FROM booking_confirmed WHERE BookingID = ?");
    mysqli_stmt_bind_param($stmt, "i", $bookingID);
    $deleteResult = mysqli_stmt_execute($stmt);

    if ($deleteResult) {
        echo "Booking canceled successfully";
    } else {
        echo "Error canceling booking: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid request";
}
?>
