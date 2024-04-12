

<html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
      <link rel="stylesheet" href="assets/css/addvehicle.css">

<style>
      .btn-custom{
    color:#fff;background-color:#4e4ffa;border-color:#4e4ffa
  }
  .btn-danger:hover{
    color:#fff;background-color:#3d3dff;border-color:#3d3dff
  }
  .btn-danger.focus,.btn-danger:focus{
    box-shadow: 0 0 0 .2rem rgba(78, 79, 250, .5);
  }
  .btn-danger.disabled,.btn-danger:disabled{
    color:#fff;background-color:#4e4ffa;border-color:#4e4ffa
  }
  .btn-danger:not(:disabled):not(.disabled).active,.btn-danger:not(:disabled):not(.disabled):active,.show>.btn-danger.dropdown-toggle{
    color:#fff;background-color:#3d3dff;border-color:#3d3dff
  }
  .btn-danger:not(:disabled):not(.disabled).active:focus,.btn-danger:not(:disabled):not(.disabled):active:focus,.show>.btn-danger.dropdown-toggle:focus{
    box-shadow: 0 0 0 .2rem rgba(78, 79, 250, .5);
  } </style>
    </head>
    <body>
        <div class="container mt-5 p-3 rounded cart">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="product-details mr-2">
                        <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><a href="../../index.php"><span class="ml-2">Back</span></a></div>
                        <hr>
                        <h6 class="mb-0">Add Vehicle</h6>
                        <div class="d-flex justify-content-between">
                        </div>

                <?php

                include "../controller/displayVehicals.php";
                while ($row = mysqli_fetch_assoc($result)) {
                
                    $imgPath = $row['img_path'];
                    
                    echo " <div class='d-flex justify-content-between align-items-center mt-3 p-2 items rounded'>";
                    echo " <div class='d-flex flex-row'><img class='rounded' src='$imgPath' alt='Vehicle Image' width='200' height='150'>";
                    echo " <div class='ml-2'><span class='font-weight-bold d-block'>" . $row['Make'] . "  " . $row['Model'] . " </span><span class='spec'>Plate Number : " . $row['LicensePlate'] . " </span><br><span class='spec'>Year : " . $row['Year'] . "</span><br><span class='spec'>Vehicle Type: " . $row['vehicle_type'] . " </span><br><span class='spec'>Seat Count:  " . $row['seatCount'] . " </span><br><span class='spec'>Status: " . $row['status'] . " </span><br><span class='spec'>Price: LKR" . $row['price'] . " </span></div></div>";
                
                    echo "<div class='d-flex flex-row align-items-center'><span class='d-block ml-5 font-weight-bold'>
                    <button class='delButton btn btn-danger btn-block d-flex justify-content-between mt-3' data-vehicle-id='{$row['VehicleID']}' >Remove</button>";
                    echo "<button type='button' class='btn btn-custom btn-block d-flex justify-content-between mt-2' data-vehicle-id='{$row['VehicleID']}'>Update Price</button></span></div> </div>";

                }
            ?>
            </div>
        </div>           


                <div class="col-md-4">
                    <div class="payment-info">
                        <div class="d-flex justify-content-between align-items-center"><span>Add Vehicle</span></div><span class="type d-block mt-3 mb-1">Vehicle type</span>
    
                        <form action="../controller/upload.php" id="vehicleListingForm" enctype="multipart/form-data" method="post">            
                            <label class="radio"> <input type="radio" name="vehicalType" value="sedan" checked> <span><img width="30" src="assets/images/sedan.png"/></span> </label>
                            <label class="radio"> <input type="radio" name="vehicalType" value="suv"> <span><img width="30" src="assets/images/suv.png"/></span> </label>
                            <label class="radio"> <input type="radio" name="vehicalType" value="pickup"> <span><img width="30" src="assets/images/pickup.png"/></span> </label>
                            <label class="radio"> <input type="radio" name="vehicalType" value="lorry"> <span><img width="30" src="assets/images/lorry.png"/></span> </label>
                            <label class="radio"> <input type="radio" name="vehicalType" value="bus"> <span><img width="30" src="assets/images/bus.png"/></span> </label>

                            <div><label class="credit-card-label">Make</label><input type="text" class="form-control credit-inputs" name="make"></div>
                            <div><label class="credit-card-label">Model</label><input type="text" class="form-control credit-inputs" name="model" ></div>
                            <div><label class="credit-card-label">Year</label><input type="number" class="form-control credit-inputs" name="year" ></div>
                            <div><label class="credit-card-label">Vehicle Reg No</label><input type="text" class="form-control credit-inputs" id="licenseplate" name="licenseplate" required></div>
                            <div><label class="credit-card-label">Number of seats</label><input type="number" class="form-control credit-inputs" min="1" max="60" id="seat" name="seat"  required></div>
                            <input type="hidden" name="vehicalOwnerID" id="vehicalOwnerID" value="<?php echo $id; ?>">
                            <div><label class="credit-card-label">Location</label>
                                <select class="form-control credit-inputs" id="cars" name="location">
                                <option value="Colombo">Colombo</option>
                            <option value="Kaluthara">Kaluthara</option>
                            <option value="Galle">Galle</option>
                            <option value="Matara">Matara</option>
                            </select>

                            <div><label class="credit-card-label">Fuel Type</label>
                                <select class="form-control credit-inputs" id="cars" name="fuelType">
                                <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                            </select>

                            <div><label class="credit-card-label">Transmission Type</label>
                                <select class="form-control credit-inputs" id="cars" name="transmission">
                                <option value="Auto">Auto</option>
                                <option value="Manual">Manual</option>
                                <option value="Trriptonic">Trriptonic</option>
                            </select>
                            </div>
                            <div><label class="credit-card-label">Daily Charge </label><input type="number" class="form-control credit-inputs" placeholder="LKR"  type="number" id="price" name="price" min="0" required ></div>
                            <label for="image">Vehicle Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                            <hr class="line">
                            <div class="d-flex justify-content-between information"></div><button class="btn btn-custom btn-block d-flex justify-content-between mt-3 " type="submit"><span>Confirm Vehicle Information<i class="fa fa-long-arrow-right ml-1"></i></span></button></div>
                        </form> 
                </div>
            </div>
        </div>


      <!--remove vehical ajax button-->

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.delButton').on('click', function() {

        
                
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



<form method="post" action="../controller/update_price.php" id="myForm"  style="display:none;position:fixed;z-index:9999;top:400px;left: 500px;background-color=black;background">
        <label for="price">New Price:</label>
        <input type="hidden" id="vehicleId" name="vehicleId" readonly>
        <input type="text" name="price" id="price" placeholder="New Price">

        <input type="submit" value="Change Price">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all buttons with the class 'myButton'
            var buttons = document.querySelectorAll('.btn');

            // Attach a click event listener to each button
            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the 'data-vehicle-id' attribute value from the clicked button
                    var vehicleId = button.getAttribute('data-vehicle-id');

                    // Set the value of the 'vehicleId' input field in the form
                    document.getElementById('vehicleId').value = vehicleId;

                    // Show the form
                    document.getElementById('myForm').style.display = 'block';
                });
            });
        });
    </script>



    <script src="../js/toggle.js"></script>
    <script src="../js/displayVehical.js"></script>
    <script src="../js/manageProfile.js"></script>
    </body>
</html>