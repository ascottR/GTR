<?php
include_once "config.php";

// Function to sanitize input data
function sanitize_input($data) {
    // Remove leading and trailing whitespace
    $data = trim($data);
    // Remove backslashes
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $firstName = sanitize_input($_POST["firstName"]);
    $lastName = sanitize_input($_POST["lastName"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);
    $phoneNumber = sanitize_input($_POST["phoneNumber"]);

    // Hash the password (you should use a more secure hashing method in a real application)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Get the current date and time
    $createdAt = date("Y-m-d H:i:s");

    // Insert data into the 'customer' table
    $sqlCustomer = "INSERT INTO customer (FirstName, LastName, Email, Password, PhoneNumber, CreatedAt)
        VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmtCustomer = $conn->prepare($sqlCustomer);
    $stmtCustomer->bind_param("ssssss", $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $createdAt);
    $stmtCustomer->execute();

    // Insert data into the 'vehicle_owner' table
    $sqlVehicleOwner = "INSERT INTO vehicle_owner (fname, lname, Email, Password, ContactNumber, CreatedAt)
        VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmtVehicleOwner = $conn->prepare($sqlVehicleOwner);
    $stmtVehicleOwner->bind_param("ssssss", $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $createdAt);
    $stmtVehicleOwner->execute();

    if ($stmtCustomer->affected_rows > 0 && $stmtVehicleOwner->affected_rows > 0) {
        header("Location: loginbase.php");
        exit();
    } else {
        echo "Error: " . $stmtCustomer->error . "<br>" . $stmtVehicleOwner->error;
    }

    // Close the prepared statements
    $stmtCustomer->close();
    $stmtVehicleOwner->close();
}

// Close the database connection
$conn->close();
?>
