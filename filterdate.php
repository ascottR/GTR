<?php
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the booking details from the front end
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Check for available vehicles in the selected date range
    $sql = "SELECT * FROM listed_vehicles
            WHERE VehicleID NOT IN (
                SELECT ListedVehicleID FROM booking_confirmed
                WHERE (startDate BETWEEN '$startDate' AND '$endDate')
                OR (endDate BETWEEN '$startDate' AND '$endDate')
                OR ('$startDate' BETWEEN startDate AND endDate)
                OR ('$endDate' BETWEEN startDate AND endDate)
            )" ;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display vehicles as cards
        while ($row = $result->fetch_assoc()) {

            echo '<div class="card" data-id="' . $row['VehicleID'] . '" data-location="' . $row['location'] . '" data-transmission="' . $row['transmission'] . '" data-body-type="' . $row['vehicle_type'] . '" data-fuel-type="' . $row['fuelType'] . '" data-make="' . $row['Make'] . '" data-seat-count="' . $row['seatCount'] . '"  data-price ="' . $row['price'] . '">';
            echo '<h2>' . $row['Make'] . ' ' . $row['Model'] . '</h2>';

            // Display the image if img_path is not empty
            if (!empty($row['img_path'])) {
                echo '<img src="./Owner/controller/' . $row['img_path'] . '" alt="' . $row['Make'] . ' ' . $row['Model'] . '">';
            } else {
                echo '<p>No image available</p>';
            }
                        echo '<p> Location : ' . $row['location'] . '</p>';
            echo '<p> Location : ' . $row['location'] . '</p>';
            echo '<p> Features : ' . $row['vehicle_type'] . ' | ' . $row['fuelType'] . ' | '. $row['transmission'] . '</p>';
            echo '<p> Price Per Day : ' . $row['price'] . '</p>';

            echo '<button class="btn-rent" onclick="showPopup(' . $row['VehicleID'] . ')">Rent</button>';
            
            echo '</div>';

        }

    } else {
        echo "No available vehicles for the selected date range.";
    }
}

// Close the database connection
$conn->close();
?>
