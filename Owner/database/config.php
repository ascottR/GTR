<?php

$host = "localhost";
$dbname = "carrentalsystem";
$username = "root";
$password = "";
$conn;

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn) {
    echo "<script> console.log(\"connected\")</script>";
} else {
    echo "<script> console.log(\"not connected\")</script>";
}
