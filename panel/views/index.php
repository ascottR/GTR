<?php
include_once "../controller/adminAnalysis.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Admin Panel</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/admin.css">
   
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="adminlogin.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->

                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.png" alt="">
                            </div>
                            <div class="user-info">
                                <div>Administrator</div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->

                    <li class="selected">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="bookingstable.php"><i class="fa fa-table fa-fw"></i>Bookings</a>
                    </li>

                    <li>
                        <a href="vehiclestable.php"><i class="fa fa-table fa-fw"></i>Vehicles</a>
                    </li>

                    <li>
                        <a href="userstable.php"><i class="fa fa-table fa-fw"></i>Users</a>
                    </li>
                    
                    <li>
                        <a href="paymentstable.php"><i class="fa fa-table fa-fw"></i>Payments</a>
                    </li>
                        
                   
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
            </div>


            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                    <b><?php echo "$numPendingBookings";
                        ?> 
                        </b>Pending Bookings

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <b><?php echo "$numCustomers";
                        ?> </b>Total Customers  
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                    <b><?php echo "$numVehicleOwners";
                        ?> </b>Car Renters

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                    <b><?php echo "$numVehicles";
                        ?> </b>Listed Vehicles
                    </div>
                </div>
                <!--end quick info section -->
            </div>



               


                <div class="row">
                    <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body selected ">
                            <i class="fa fa-bar-chart-o fa-3x"></i>
                            <h3><?php echo " $grossIncome";?></h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Gross Income
                            </span>
                        </div>
                    </div>

                </div>

                
                <div class="row">
                    <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body selected ">
                            <i class="fa fa-bar-chart-o fa-3x"></i>
                            <h3><?php echo " $netCommision";?></h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Net Income
                            </span>
                        </div>
                    </div>

                </div>
                                
                <div class="row">
                    <div class="col-lg-3">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body selected">
                            <i class="fa fa-bar-chart-o fa-3x"></i>
                            <h3><?php echo " $numTotalBookingsForTheMonth";?></h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Total Bookings For Month
                            </span>
                        </div>
                    </div>

                </div>


                </div>

            </div>

            <div class="row">
                <div class="col-lg-4">
                    
                </div>
            </div>

   

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->



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

    

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>
    
</body>

</html>
