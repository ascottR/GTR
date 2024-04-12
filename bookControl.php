<?php
include_once "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customerId = $_POST["customerId"];
    $vehicleId = $_POST["vehicleId"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $totalCost = $_POST["totalCost"];
    $requestStatus = "Pending";
    $bookingDate = date("Y-m-d H:i:s"); // Current date and time
    
    // Retrieve VehicleOwnerID from listed_vehicles table
    $vehicleOwnerIDQuery = "SELECT VehicleOwnerID FROM listed_vehicles WHERE VehicleID = $vehicleId";
    $result = $conn->query($vehicleOwnerIDQuery);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $vehicleOwnerID = $row["VehicleOwnerID"];
    } else {
        // Handle the case where VehicleOwnerID is not found
        echo "Error: Unable to retrieve VehicleOwnerID.";
        exit();
    }

    // Perform the database insert for booking
    $bookingSql = "INSERT INTO booking_confirmed(VehicleOwnerID, CustomerID, ListedVehicleID, TotalCost, BookingStatus, startDate, endDate, BookingDate)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $bookingStmt = $conn->prepare($bookingSql);
    $bookingStmt->bind_param("iiidssss", $vehicleOwnerID, $customerId, $vehicleId, $totalCost, $requestStatus, $startDate, $endDate, $bookingDate);

    if ($bookingStmt->execute()) {
        // Booking request successful

        // Get the last inserted BookingID
        $bookingId = $bookingStmt->insert_id;

        // Insert payment data
        $paymentSql = "INSERT INTO payment(BookingID, Amount, PaymentStatus, PaymentDate)
                       VALUES (?, ?, 'Pending', ?)";

        $paymentStmt = $conn->prepare($paymentSql);
        $paymentStmt->bind_param("ids", $bookingId, $totalCost, $bookingDate);

        if ($paymentStmt->execute()) {
            echo "Booking request and payment successful!";
        } else {
            echo "Error in payment: " . $paymentStmt->error;
        }

        // Close the payment statement
        $paymentStmt->close();
    } else {
        // Booking request failed
        echo "Error: " . $bookingStmt->error;
    }

    // Close the booking statement
    $bookingStmt->close();
}

// Close the database connection
$conn->close();
?>
