<?php
include_once "../Database/config.php";
include_once "../login/login.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve BookingID (replace this with your actual logic to get the ID)
    $vehicleOwnerID = $_POST['bookingId']; // Replace with your logic to get the actual BookingID

    // Directory where the images will be stored
    $uploadDirectory = '../../panel/slip/';

    // Retrieve other form data
   
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
            $insertQuery = "UPDATE payment SET slip_path = ? WHERE BookingID = ?";

            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, "si", $imgSavedLocation, $vehicleOwnerID);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Slip Uploaded Successfully'); location.href='../views/customerprofile.php';</script>";
            } else {
                echo "<script>alert('Error updating data in the database: " . mysqli_error($conn) . "'); location.href='../views/customerprofile.php';</script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); location.href='../views/customerprofile.php';</script>";
        }
    }
}
?>
