<?php
// Include your database connection file
include_once "../Database/config.php";
include "../login/login.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $id;
    $customerId = $_SESSION["customer_id"];

    // Collect form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Use a prepared statement to prevent SQL injection
    $stmtVehicleOwner = mysqli_prepare($conn, "UPDATE vehicle_owner SET fname = ?, lname = ?, Email = ?, ContactNumber = ? WHERE VehicleOwnerID = ?");
    mysqli_stmt_bind_param($stmtVehicleOwner, "ssssi", $fname, $lname, $email, $phone, $userId);
    $updateResultVehicleOwner = mysqli_stmt_execute($stmtVehicleOwner);

    // Use a prepared statement to prevent SQL injection
    $stmtCustomer = mysqli_prepare($conn, "UPDATE customer SET FirstName = ?, LastName = ?, Email = ?, PhoneNumber = ? WHERE CustomerID = ?");
    mysqli_stmt_bind_param($stmtCustomer, "ssssi", $fname, $lname, $email, $phone, $customerId);
    $updateResultCustomer = mysqli_stmt_execute($stmtCustomer);

    if ($updateResultVehicleOwner && $updateResultCustomer) {
        echo "<script> alert(\"Profile updated successfully\"); window.location.href = \"../views/customerprofile.php\";</script>";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }

    // Close the prepared statements
    mysqli_stmt_close($stmtVehicleOwner);
    mysqli_stmt_close($stmtCustomer);
} else {
    echo "Invalid request";
}
?>
