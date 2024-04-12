<?php

// Assuming you have a database connection established in config.php
include_once "../Database/config.php";

// Query to retrieve all columns from multiple tables using JOIN
$query = "SELECT * FROM vehicle_owner";

$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {

    // Fetch data and display it in an HTML table
    echo "<thead>
                        <tr>
                            <th>Owner ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number Type</th>
                            <th>Created Date</th>
                        </tr></thead>";
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        echo "<tbody><tr data-id='{$row['VehicleOwnerID']}'>
                            <td>{$row['VehicleOwnerID']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['lname']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['ContactNumber']}</td>
                            <td>{$row['CreatedAt']}</td>
                        </tr></tbody>";
    }

    echo "</table>";

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
