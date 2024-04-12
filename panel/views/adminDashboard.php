<?php
include_once "../controller/adminAnalysis.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div id="numCustomers">
        <?php
        echo "Number of Customers: $numCustomers<br>";
        ?>
    </div>

    <div id="numVehicalOwners">
        <?php
        echo "Number of Vehicle Owners: $numVehicleOwners<br>";
        ?>
    </div>

    <div id="numVehicals">
        <?php
        echo "Number of Listed Vehicles: $numVehicles<br>";
        ?>
    </div>

    <div id="numCus">
        <?php
        echo "Number of Pending Bookings: $numPendingBookings<br>";
        ?>
    </div>

    <div id="numCus">
        <?php
        echo "Number of Total Bookings for the Month: $numTotalBookingsForTheMonth<br>";
        ?>
    </div>

    <div id="numCus">
        <?php
        echo "Gross Income: $grossIncome<br>";
        ?>
    </div>

    <div id="numCus">
        <?php
        echo "Net Income: $netCommision<br>";
        ?>
    </div>

    <button type="button" id="bookingManagement">Manage Bookings</button>
    <div id="bookingDiv">
        <?php include "../controller/adminBookingsDisplay.php";  ?>
    </div>

    <button type="button" id="vehicalManagement">Manage Vehicles</button>
    <div id="vehicalDiv">
        <?php include_once "../controller/adminVehicalDisplay.php"; ?>
    </div>

    <script>
        function confirmAction(id, action, count) {
            // Make an AJAX request to update the status in the database
            $.ajax({
                type: 'GET',
                url: '../controller/update_status.php',
                data: {
                    id: id,
                    action: action,
                    count: count
                },
                success: function(response) {
                    // Update the specific row in the HTML without reloading the entire page
                    // Assuming your row has a unique identifier, such as a data-id attribute
                    var row = $("tr[data-id='" + id + "']");
                    response = action;
                    row.find("td:eq(6)").text(response); // Assuming status is in the 7th column (index 6)

                    // Optionally, you can also disable the buttons or perform other UI updates based on the response

                    console.log("Status updated successfully: " + response);
                },
                error: function(error) {
                    console.error("Error updating status: " + error.responseText);
                }
            });
        }
    </script>

    <button type="button" id="userMangement">Manage Users</button>
    <div id="manageUsers">
        <?php include_once "../controller/adminUserDsiplay.php"; ?>
        <?php include_once "../controller/adminUser2Display.php"; ?>
    </div>
    </script>

    <button type="button" id="paymentMangement">Manage Users</button>
    <div id="managePayment">
        <?php include_once "../controller/adminPaymentDisplay.php"; ?>
    </div>

    <script>
        function confirmActions(id, action, count) {
            // Make an AJAX request to update the status in the database
            $.ajax({
                type: 'GET',
                url: '../controller/update_status_payment.php',
                data: {
                    id: id,
                    action: action,
                    count: count
                },
                success: function(response) {
                    // Update the specific row in the HTML without reloading the entire page
                    // Assuming your row has a unique identifier, such as a data-id attribute
                    var row = $("tr[data-id='" + id + "']");
                    response = action;
                    row.find("td:eq(7)").text(response); // Assuming status is in the 7th column (index 6)

                    // Optionally, you can also disable the buttons or perform other UI updates based on the response

                    console.log("Status updated successfully: " + response);
                },
                error: function(error) {
                    console.error("Error updating status: " + error.responseText);
                }
            });
        }
    </script>

    

    <script src="../js/adminDashboard.js"></script>
    <script src="../js/adminVehicals.js"></script>
    <script src="../js/adminCustomer.js"></script>
    <script src="../js/adminPayment.js"></script>
</body>

</html>