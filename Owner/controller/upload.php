<?php
include_once "../Database/config.php";
include_once "../login/login.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve vehicleOwnerID (replace this with your actual logic to get the ID)
    $vehicleOwnerID = $_POST['vehicalOwnerID']; // Replace with your logic to get the actual vehicleOwnerID

    // Directory where the images will be stored
    $uploadDirectory = '../images/';

    // Retrieve other form data
    $vehicleOwnerID = $_POST['vehicalOwnerID'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $fuelType = $_POST['fuelType'];
    $vehicalType = $_POST['vehicalType'];
    $location = $_POST['location'];
    $licenseplate = $_POST['licenseplate'];
    $price = $_POST['price'];
    $seat = $_POST['seat'];
    $transmission = $_POST['transmission'];
    $status = "Pending";
    $imgSavedLocation = "";

    // Handle image upload
    $targetDirectory = $uploadDirectory . $vehicleOwnerID . '/';
    if (!file_exists($targetDirectory)) {
        // Create the directory if it doesn't exist
        mkdir($targetDirectory, 0777, true);
    }

    $date = date("Ymd_His"); // Get the current date and time
    $targetFile = $targetDirectory . $vehicleOwnerID . '_' . $date . '_' . basename($_FILES["image"]["name"]);

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, the file already exists.'); location.href='../views/dashboard.php';</script>";
    } else {
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File upload successful, you can now handle the other form data as needed
            // For simplicity, I'm just echoing the data, replace this with your actual logic
            $imgSavedLocation = $targetFile;

            // Insert data into the database
            $insertQuery = "INSERT INTO listed_vehicles (VehicleOwnerID, Make, Model, vehicle_type, Year, LicensePlate, seatCount, transmission, fuelType, location, img_path, status, price ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, "isssisssssssi", $vehicleOwnerID, $make, $model, $vehicalType, $year, $licenseplate, $seat, $transmission, $fuelType, $location, $imgSavedLocation, $status, $price);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Congradulations Now You Are a Service Seller'); location.href='../views/dashboard.php';</script>";
            } else {
                echo "<script>alert('Error inserting data into the database: " . mysqli_error($conn) . "'); location.href='../views/dashboard.php';</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); location.href='../views/dashboard.php';</script>";
        }
    }
}
