<?php
include_once "../Database/config.php";
include "../login/login.php";

$query = "SELECT * FROM listed_vehicles WHERE VehicleOwnerID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);
