<?php
include_once "../Database/config.php";

// Assuming you have a valid session variable set for email
$email = $_SESSION["email"];

$currentDate = date('Y-m-d');

// Query to retrieve data using JOIN
$query = "SELECT * 
          FROM booking_confirmed
          JOIN vehicle_owner ON booking_confirmed.VehicleOwnerID = vehicle_owner.VehicleOwnerID
          WHERE vehicle_owner.Email = ?";

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the query was successful
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // if ($currentDate <= $row['endDate']) {
        echo " <div class='card'>
            <p><strong>Booking ID:</strong>{$row['BookingID']}</p>
            <p><strong>Vehicle ID:</strong>{$row['ListedVehicleID']}</p>
            <p><strong>Start Date:</strong> {$row['startDate']}</p>
            <p><strong>End Date:</strong>{$row['endDate']} </p>
            <p><strong>Booking Date:</strong>{$row['BookingDate']}</p>
            <p><strong>Status:</strong> {$row['BookingStatus']}</p>
            <button class='btn' onclick='confirmActionBooking({$row['BookingID']}, \"Confirmed\")'>Confirm</button><br>
            <button class='btn-reject' onclick='confirmActionBooking({$row['BookingID']}, \"Rejected\")'>Reject</button>
        </div> ";
        // }
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}

// Close the prepared statement
mysqli_stmt_close($stmt);
?>
