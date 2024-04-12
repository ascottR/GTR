<?php

include_once "../Database/config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["password"];

    $stmt = mysqli_prepare($conn, "SELECT * FROM customer WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $inputEmail);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $resultSet = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultSet)) {
            $hashedPassword = $row["Password"];

            if ($inputPassword == $hashedPassword) {
                $_SESSION["customer_id"] = $row["CustomerID"];
                $_SESSION["fname"] = $row["FirstName"];
                $_SESSION["lname"] = $row["LastName"];
                $_SESSION["email"] = $row["Email"];
                $_SESSION["pass"] = $row["Password"];
                $_SESSION["contact"] = $row["PhoneNumber"];
                $_SESSION["startedDay"] = $row["CreatedAt"];

                header("Location: ../views/customerDashboard.php");
                exit();
            } else {
                echo "<script> alert(\"Incorrect password\"); window.location.href='../views/login.php';</script>";

                exit();
            }
        } else {
            echo "<script> alert(\"User not found\"); window.location.href='../views/login.php';</script>";

            exit();
        }
    } else {
        echo "Error in query execution";
    }
}
