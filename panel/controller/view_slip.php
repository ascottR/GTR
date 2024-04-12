<?php
// Assuming you have a database connection established in config.php
include_once "../Database/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_id'])) {
    $paymentId = $_POST['payment_id'];

    // Query to retrieve slip file path from the database
    $query = "SELECT slip_path FROM payment WHERE PaymentID = $paymentId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $slipPath = $row['slip_path'];
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

