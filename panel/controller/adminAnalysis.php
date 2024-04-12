<?php

include_once "../Database/config.php";

// Assuming you have a database connection established in config.php


$currentDate = date('Y-m-d');

// Query to get the number of customers
$queryNumCustomers = "SELECT COUNT(CustomerID) AS people FROM customer";
$resultNumCustomers = mysqli_query($conn, $queryNumCustomers);
$rowNumCustomers = mysqli_fetch_assoc($resultNumCustomers);
$numCustomers = $rowNumCustomers['people'];

// Query to get the number of vehicle owners
$queryNumVehicleOwners = "SELECT COUNT(VehicleOwnerID) AS owners FROM vehicle_owner";
$resultNumVehicleOwners = mysqli_query($conn, $queryNumVehicleOwners);
$rowNumVehicleOwners = mysqli_fetch_assoc($resultNumVehicleOwners);
$numVehicleOwners = $rowNumVehicleOwners['owners'];

// Query to get the number of listed vehicles
$queryNumVehicles = "SELECT COUNT(VehicleID) AS listed FROM listed_vehicles WHERE status = 'Confirmed'";
$resultNumVehicles = mysqli_query($conn, $queryNumVehicles);
$rowNumVehicles = mysqli_fetch_assoc($resultNumVehicles);
$numVehicles = $rowNumVehicles['listed'];

// Query to get the number of pending bookings
$queryNumPendingBookings = "SELECT COUNT(BookingID) AS bReq FROM booking_confirmed WHERE DATE(BookingDate) BETWEEN DATE_FORMAT('$currentDate', '%Y-%m-01') AND '$currentDate' AND 	BookingStatus ='Pending'";
$resultNumPendingBookings = mysqli_query($conn, $queryNumPendingBookings);
$rowNumPendingBookings = mysqli_fetch_assoc($resultNumPendingBookings);
$numPendingBookings = $rowNumPendingBookings['bReq'];

// Query to get the number of total bookings for the month
$queryNumTotalBookingsForTheMonth = "SELECT COUNT(BookingID) AS listed FROM booking_confirmed WHERE DATE(BookingDate) BETWEEN DATE_FORMAT('$currentDate', '%Y-%m-01') AND '$currentDate'";
$resultNumTotalBookingsForTheMonth = mysqli_query($conn, $queryNumTotalBookingsForTheMonth);
$rowNumTotalBookingsForTheMonth = mysqli_fetch_assoc($resultNumTotalBookingsForTheMonth);
$numTotalBookingsForTheMonth = $rowNumTotalBookingsForTheMonth['listed'];

// Query to get the gross income
$queryGrossIncome = "SELECT SUM(Amount) AS totalIncome FROM payment  WHERE DATE(PaymentDate) BETWEEN DATE_FORMAT('$currentDate', '%Y-%m-01') AND '$currentDate'";
$resultGrossIncome = mysqli_query($conn, $queryGrossIncome);
$rowGrossIncome = mysqli_fetch_assoc($resultGrossIncome);
$grossIncome = $rowGrossIncome['totalIncome'];

// Query to get the sum of Amount from car_owner_payment
$queryAmountPayedToOwner = "SELECT SUM(Amount) AS sysExpense FROM car_owner_payment  WHERE DATE(PaymentDate) BETWEEN DATE_FORMAT('$currentDate', '%Y-%m-01') AND '$currentDate'";
$resultAmountPayedToOwner = mysqli_query($conn, $queryAmountPayedToOwner);
$rowAmountPayedToOwner = mysqli_fetch_assoc($resultAmountPayedToOwner);
$amountPayedToOwner = $rowAmountPayedToOwner['sysExpense'];

// Display the result
$netCommision = $grossIncome - $amountPayedToOwner;
