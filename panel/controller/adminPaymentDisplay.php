<?php

// Assuming you have a database connection established in config.php
include_once "../Database/config.php";

// Query to retrieve all columns from multiple tables using JOIN
$query = "SELECT * 
                    FROM payment
                    JOIN booking_confirmed ON payment.BookingID = booking_confirmed.BookingID
                    JOIN vehicle_owner ON booking_confirmed.VehicleOwnerID  = vehicle_owner.VehicleOwnerID 
                    JOIN customer ON booking_confirmed.CustomerID  = customer.CustomerID ";

$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {

    // Fetch data and display it in an HTML table
    echo "<table border='1'>
                        <tr>
                            <th>Customer Name</th>
                            <th>Payment ID</th>
                            <th>Booking ID</th>
                            <th>Cutomer Contact</th>
                            <th>Vehical Owner</th>
                            <th>Owner Contact</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Payement Date</th>
                            <th>Action</th>
                        </tr>";
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        echo "<tr data-id='{$row['PaymentID']}'>
                            <td>{$row['FirstName']}</td>
                            <td>{$row['PaymentID']}</td>
                            <td>{$row['BookingID']}</td>
                            <td>{$row['PhoneNumber']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['ContactNumber']}</td>
                            <td>{$row['Amount']}</td>
                            <td>{$row['PaymentStatus']}</td>
                            <td>{$row['PaymentDate']}</td>
                            <td>
                            <button type = 'button' class='btn btn-outline btn-primary btn-xs' onclick='confirmActions({$row['PaymentID']}, \"Confirmed\", {$count})'>Confirm</button>
                            <p></p>
                            <button type = 'button' class='btn btn-outline btn-danger btn-xs' onclick='confirmActions({$row['PaymentID']}, \"Rejected\", {$count})'>Reject</button>
                            </td>
                            <td>
                <form id='viewSlipForm{$count}' action='../views/displaySlip.php' method='post' target='_blank'>
                    <input type='hidden' name='payment_id' value='{$row['PaymentID']}'>
                    <button class = 'btn btn-success btn-default btn-xs' type='submit' form='viewSlipForm{$count}'>View Slip</button>
                </form>
            </td>
                        </tr>";
    }

    echo "</table>";

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
