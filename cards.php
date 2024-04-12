<?php
include_once "config.php";

// Fetch listed vehicles data using prepared statement
$sql = "SELECT * FROM listed_vehicles";
$stmt = mysqli_prepare($conn, $sql);

// Check if the statement is prepared successfully
if ($stmt) {
    // Execute the statement
    mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $vehicleID, $vehicleOwnerID, $make, $model, $vehicle_type, $year, $licensePlate, $seatCount, $transmission, $fuelType, $location, $img_path);

// Display vehicles as cards
while (mysqli_stmt_fetch($stmt)) {
    echo '<div class="card" data-location="' . $location . '"  data-transmission="' . $transmission . '" data-body-type="' . $vehicle_type . '"  data-fuel-type="' . $fuelType . '"  data-make="' . $make . '"    data-seat-count="' . $seatCount . '">';
    echo '<h2>' . $make . ' ' . $model . '</h2>';
    
    // Display the image if img_path is not empty
    if (!empty($img_path)) {
        echo '<img src="' . $img_path . '" alt="' . $make . ' ' . $model . '">';
    } else {
        echo '<p>No image available</p>';
    }
    echo '<p> Location : ' . $location . '</p>';
    echo '<p> Features : ' . $vehicle_type . ' | ' . $fuelType . ' | '. $transmission . '</p>';
    echo '<button>Rent</button>';
    echo '</div>';
}


    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the error, e.g., log it or display an error message
    echo "Error in prepared statement: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
