<?php
include_once "../Database/config.php";
//include "../login/login.php";
//session_start();

$userId = $_SESSION["customer_id"];
$currentDate = date('Y-m-d');

// Query to retrieve data using JOIN
$query = "SELECT * 
          FROM booking_confirmed
          JOIN customer ON booking_confirmed.CustomerID = customer.CustomerID
          WHERE customer.CustomerID = $userId ";

$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {



    while ($row = mysqli_fetch_assoc($result)) {


       // if ($currentDate <= $row['endDate']) {
        echo "<div class='card'>
        <p><strong>Booking ID:</strong>{$row['BookingID']}</p>
        <p><strong>Vehicle ID:</strong>{$row['ListedVehicleID']}</p>
        <p><strong>Start Date:</strong>{$row['startDate']}</p>
        <p><strong>End Date:</strong>{$row['endDate']}</p>
        <p><strong>Booking Date:</strong>{$row['BookingDate']}</p>
        <p><strong>Status:</strong>{$row['BookingStatus']}</p>
    
        <form id='uploadForm{$row['BookingID']}' action='../controller/uploadSlip.php' method='post' enctype='multipart/form-data'>
            <input type='hidden' name='bookingId' value='{$row['BookingID']}'>
            <input type='file' id='image' name='image' accept='image/*' required>
            <input type='submit' value='Upload'>
        </form>
    
        <button class='btn' onclick='cancelBookings({$row['BookingID']}, \"Delete\")'>Cancel</button>
    </div>";
    

        //}
    }

    echo "</table>";

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}
