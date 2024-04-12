<?php

// Assuming you have a database connection established in config.php
include_once "../Database/config.php";

// Query to retrieve all columns from multiple tables using JOIN
$query = "SELECT * 
          FROM booking_confirmed
          JOIN customer ON booking_confirmed.CustomerID = customer.CustomerID
          JOIN vehicle_owner ON booking_confirmed.VehicleOwnerID  = vehicle_owner.VehicleOwnerID";

$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Fetch data and display it in an HTML table
    echo "<thead>
            <tr>
                <th>BookingID</th>
                <th>Booking Date</th>
                <th>Customer Name</th>
                <th>Owner Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Booking Status</th>
                <th>Owner Contact</th>
                
            </tr>
            </thead>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <tbody>
        <tr>
                <td>{$row['BookingID']}</td>
                <td>{$row['BookingDate']}</td>
                <td>{$row['FirstName']}</td>
                <td>{$row['fname']}</td>
                <td>{$row['startDate']}</td>
                <td>{$row['endDate']}</td>
                <td>{$row['BookingStatus']}</td>
                <td>{$row['ContactNumber']}</td>
              </tr>
              </tbody>";
    }

   

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
