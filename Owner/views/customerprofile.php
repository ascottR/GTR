<?php
include "../database/config.php";
include "../login/login.php";


?>

<html>
    <head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="assets/css/renterprofilecss.css">
    </head>
    <body>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <br>
                    <div class="d-flex justify-content-between align-items-center experience"><a href="../../index.php"><span class="border px-3 p-1 add-experience">Back<i class="fa fa-plus"></i></span></a></div>
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $fname; ?></span><span class="text-black-50"><?php echo $email; ?></span><span> </span></div>
                    <form action="../controller/process_update_profile.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" name="fname" value="<?php echo $fname; ?>"></div>
                        <br>
                        <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control"  name="phone" value="<?php echo $number; ?>"></div>  
                        <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">          
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </form>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="d-flex justify-content-between align-items-center experience">My Bookings</h4>
                        </div>
                        
                            <?php include "../controller/myBookings.php";?>
                          
                            <!--ajaxfor cancel-->
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script>
                                function cancelBookings(bookingID, action) {
                                    // Use AJAX to send the request to cancel_booking.php
                                    $.ajax({
                                        type: "POST",
                                        url: "../controller/cancel_booking.php",
                                        data: { bookingID: bookingID },
                                        success: function (response) {
                                            // Handle the response from the server
                                            alert(response);
                                            location.reload(); // You can replace this with your desired behavior
                                        },
                                        error: function (error) {
                                            console.error("Error cancelling booking: " + error);
                                        }
                                    });
                                }
                            </script>

                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="d-flex justify-content-between align-items-center experience">Bookings Requests</h4>
                        </div>                        <div class="col-md-12">

  <!--display booking into a table-->
                <?php include_once "../controller/bookingDisplay.php"; ?>
                              </div>
                        </div> <br>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

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

    </body>
</html>