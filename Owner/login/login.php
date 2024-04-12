<?php
session_start();
$email = $_SESSION["email"];
include_once "../database/config.php";

// Assuming you have a valid database connection stored in $conn
if ($conn) {
    try {
        // Prepare the SQL statement
        $query = "SELECT * FROM vehicle_owner WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $query);

        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        // Check if there are any rows returned
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);

            // Now you can use $row to access the data
            $id = $row['VehicleOwnerID'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $Email = $row['Email'];
            $number = $row['ContactNumber'];
            // Add other fields as needed
        } else {
            throw new Exception("No user found with the provided email.");
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } catch (Exception $e) {
        echo "<script> alert(\"Error: " . $e->getMessage() . "\")</script>";
    } finally {
    }
} else {
    echo "<script> alert(\"Error: Unable to connect to the database.\")</script>";
}
