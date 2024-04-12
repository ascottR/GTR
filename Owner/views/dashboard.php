<?php
include "../database/config.php";
include "../login/login.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <nav>
        <div id="mainToggle">
            <div id="left"></div>
            <div id="right"></div>
        </div>
    </nav>

    <!-- Display user's current profile data here -->
    <div id="profile">
        <h1>profile</h1>
        <?php
        include_once "../controller/displayProfile.php";
        ?>
    </div>

    <div id="dashboard">
        <div id="addVehical">
            add vehicle
        </div>
        <div id="manageProfile">
            <h4>ManageProfile</h4>
        </div>

    </div>


    <!--vehical listing form-->
    <section id="addVehicalForm">
        <h2>Vehicle Listing Form</h2>

        
        <form action="../controller/upload.php" id="vehicleListingForm" enctype="multipart/form-data" method="post">
            <label for="make">Make:</label>
            <input type="text" id="make" name="make" required>

            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required>

            <label for="vehicalType">Vehical Type:</label>
            <select id="vehicalType" name="vehicalType" required>
                <option value="Petrol">sedan</option>
                <option value="Diesel">suv</option>
                <option value="Electric">bus</option>
                <option value="Hybrid">jeep</option>
            </select>

            <label for="year">Year:</label>
            <input type="number" id="year" name="year" min="1900" max="2099" required>

            <label for="fuelType">Fuel Type:</label>
            <select id="fuelType" name="fuelType" required>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
            </select>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="licenseplate">License Plate:</label>
            <input type="text" id="licenseplate" name="licenseplate" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" required>

            <label for="seat">Seat Count:</label>
            <input type="number" id="seat" name="seat" min="0" required>

            <label for="transmission">Transmission:</label>
            <select id="transmission" name="transmission" required>
                <option value="auto">Auto</option>
                <option value="manual">Manual</option>
            </select>

           
            <label for="image">Vehicle Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <input type="hidden" name="vehicalOwnerID" id="vehicalOwnerID" value="<?php echo $id; ?>">
            <input type="submit" value="Submit">
            
        </form>

        <!--displayform javascript-->
        <script>
            function submitForm() {
                var form = document.getElementById('vehicleListingForm');
                var formData = new FormData(form);

                
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
            }
        </script>
    </section>

    <!-- Display vehicle images in a grid -->
    <button type="button" id="vehicalDisplayBtn">Manage Vehicles</button>
    <div id="vehicleGrid" style="display: none; justify-content: space-evenly">
        <?php

        include "../controller/displayVehicals.php";
        while ($row = mysqli_fetch_assoc($result)) {
            $imgPath = $row['img_path'];
            
            echo "<div class='vehicleCard'>";
            echo "<img src='$imgPath' alt='Vehicle Image' width='200px' height='200px'>";
            echo "<br>";
            

            echo "<br> <br> Current Price : " . $row['price'] . "<br>";
            echo "<button type='button' class='deleteButton' data-vehicle-id='{$row['VehicleID']}'>Remove</button> ";
            echo "<button type='button' class='updatePriceButton' data-vehicle-id='{$row['VehicleID']}'>Update Price</button> ";

            echo "<div id='formContainer{$row['VehicleID']}' style='display:none;position:fixed;z-index:9999;top:50px;left: 300px;'>";
            echo "<form id='updatePriceForm{$row['VehicleID']}'>";
            echo "New Price: <input type='text' name='newPrice' id='newPrice{$row['VehicleID']}' required>";
            echo "<input type='hidden' name='vehicleId' value='{$row['VehicleID']}'>";
            echo "<button type='button' class='submitUpdatePrice' data-vehicle-id='{$row['VehicleID']}'>Submit</button>";
            echo "</form>";
            echo "</div>";


            echo "</div>";
        }
        ?>
    </div>

    <!--remove vehical ajax button-->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.deleteButton').on('click', function() {
                
                var vehicleId = $(this).data('vehicle-id');

               
                if (confirm('Are you sure you want to delete this vehicle?')) {
                    
                    $.ajax({
                        type: 'POST',
                        url: '../controller/delete_vehicals.php', 
                        data: {
                            id: vehicleId
                        },
                        success: function(response) {
                           
                            alert('Vehical Removed Successfully');
                            console.log(response) 
                            setTimeout(function() {
                                location.reload();
                            }, 300);
                        },
                        error: function(error) {
                            
                            console.log(error);
                        }
                    });
                }
            });

          
            $('.updatePriceButton').on('click', function() {
                
                var vehicleId = $(this).data('vehicle-id');

               
            });
        });
    </script>


<!--update price vehical ajax button-->
    <script>
        $(document).ready(function() {
            
            $('.updatePriceButton').on('click', function() {
               
                var vehicleId = $(this).data('vehicle-id');

            
                $('[id^=formContainer]').hide();
                $('#formContainer' + vehicleId).show();
            });

           
            $('.submitUpdatePrice').on('click', function() {
                
                var vehicleId = $(this).data('vehicle-id');
                var newPrice = $('#newPrice' + vehicleId).val();

              
                $.ajax({
                    type: 'POST',
                    url: '../controller/update_price.php',
                    data: {
                        id: vehicleId,
                        price: newPrice
                    },
                    success: function(response) {
                        
                        alert('Price Updated Successfully');
                        console.log(response) 
                        setTimeout(function() {
                            location.reload();
                        }, 300);
                        $('#formContainer' + vehicleId).hide();
                    },
                    error: function(error) {
                    
                        console.log(error);
                    }
                });
            });
        });
    </script>

<!--update profile form-->

    <section id="UpdateProfile" style="display:none;">

        <h2>Update Profile</h2>

        <form action="../controller/process_update_profile.php" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $Email; ?>" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $number; ?>" required>


            <button type="submit">Update Profile</button>
        </form>

    </section>


    <!--display booking into a table-->
    <?php include_once "../controller/bookingDisplay.php"; ?>


    <!-- booking status change ajax-->
    <script>
        function confirmActionBooking(bookingId, status) {
            // Send an AJAX request to the server to handle the confirmation or rejection
            $.ajax({
                type: 'POST',
                url: '../controller/confirm_booking.php', // Replace with the actual path to your PHP file
                data: {
                    bookingId: bookingId,
                    status: status
                },
                success: function(response) {
                    // Update the UI or handle the response as needed
                    alert(response); // You can replace this with your own logic
                    location.reload(); // Reload the page to reflect the updated status
                },
                error: function(error) {
                    // Handle errors if any
                    console.log(error);
                }
            });
        }
    </script>

    <script src="../js/toggle.js"></script>
    <script src="../js/displayVehical.js"></script>
    <script src="../js/manageProfile.js"></script>
</body>

</html>