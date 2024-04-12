<?php

// Assuming you have a database connection established in config.php
include_once "../Database/config.php";

// Query to retrieve all columns from multiple tables using JOIN
$query = "SELECT * 
                    FROM listed_vehicles
                    JOIN vehicle_owner ON listed_vehicles.VehicleOwnerID = vehicle_owner.VehicleOwnerID";

$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {

    // Fetch data and display it in an HTML table
    echo "<thead>
                        <tr>
                            <th>Vehical ID</th>
                            <th>Owner Name</th>
                            <th>Make</th>
                            <th>Vehical Type</th>
                            <th>Fuel Type</th>
                            <th>Location</th>
                            <th>Listing Status</th>
                            <th>Owner Contact</th>
                            <th>Action</th>
                        </tr>
                        </thead>";
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        echo "<tbody><tr data-id='{$row['VehicleID']}'>
                            <td>{$row['VehicleID']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['Make']}</td>
                            <td>{$row['vehicle_type']}</td>
                            <td>{$row['fuelType']}</td>
                            <td>{$row['location']}</td>
                            <td>{$row['status']}</td>
                            <td>{$row['ContactNumber']}</td>
                            <td>
                            <button type = 'button' class='btn btn-outline btn-primary btn-xs' onclick='confirmAction({$row['VehicleID']}, \"Confirmed\", {$count})'>Confirm</button>
                            <button type = 'button' class='btn btn-outline btn-danger btn-xs' onclick='confirmAction({$row['VehicleID']}, \"Rejected\", {$count})'>Reject</button>
                            </td>
                        </tr>
                        </tbody>";
    }

    echo "</table>";

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
//<td><button type="button" class="btn btn-outline btn-primary btn-xs">Approve</button><a href="#">       </a><button type="button" class="btn btn-outline btn-primary btn-xs">Reject</button></td>