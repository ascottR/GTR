<?php
// Include your database connection file
include_once "../database/config.php";
include_once "../login/login.php";


$vehicleOwnerId = $Email;

// Use a prepared statement to prevent SQL injection
$stmt = mysqli_prepare($conn, "SELECT * FROM vehicle_owner WHERE VehicleOwnerID = ?");
mysqli_stmt_bind_param($stmt, "s", $userId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    echo "ID: " . $id . "<br>";
    echo "First Name: " . $fname . "<br>";
    echo "Last Name: " . $lname . "<br>";
    echo "Email: " . $Email . "<br>";
    echo "Phone: " . $number . "<br>";
} else {
    echo "<script>alert('Error fetching profile data'); location.href='../views/dashboard.php';</script>";
}
