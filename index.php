<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>GTRch</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

        <!--flaticon.css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
		
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
	
	<body>
 

	
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
                    <br>
				        <div class="container">
				        <div class="navbar">
				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.php">GTR<span></span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class="scroll" id = "contact" ><a href="#custom-footer">contact</a></li>
									<li><button id="btn-postAd" class="scroll btn btn-account " onclick="location.href='Owner/views/addvehicles.php'" >Post Ad</button></li>
									<li><button id="btn-account" class="btn btn-account scroll"  onclick="location.href='Owner/views/customerprofile.php'">Account</button></li>
									<li><button id="btn-logout" class="btn btn-logout scroll" onclick="location.href='logout.php'" >logout</button></li>
									<li><button id="btn-signup" class="btn btn-signup scroll" onclick="location.href='signup.php'">Sign Up</button></li>
        							<li><button id="btn-login" class="btn btn-login scroll" onclick="location.href='loginbase.php'">Login</button></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
							</div>
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">
					<h2>get your desired car in resonable price</h2>
				</div>
			</div>

			<div class="container">
			<div class="row">
				
				<div class="col-md-12">
					<!-- Date Filter Form -->

					<form id="bookingForm" >
						<label for="startDate">Start Date:</label>
						<input type="date" id="startDate" name="startDate" required>

						<label for="endDate">End Date:</label>
						<input type="date" id="endDate" name="endDate" required>
             
						<a href = "#featured-cars"><button type="button" onclick="checkAvailability()">Check Availability</button></a>
					</form>

					<div class="model-search-content">
						<div class="row">
							<div class="col-md-offset-1 col-md-2 col-sm-12">
								<div class="single-model-search">
									<h2>Location:</h2>
									<div class="model-select-icon">
										<select class="form-control" id="locationFilter" >
										<option value="">All Location</option>

											
											<!-- Add options dynamically based on available locations -->
										</select>
									</div>
								</div>
								<div class="single-model-search">
									<h2>Transmission:</h2>
									<div class="model-select-icon">
										<select class="form-control" id="transmissionFilter">
											<option value="">All Transmissions</option>
											
											<!-- Add options dynamically based on available transmissions -->
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-offset-1 col-md-2 col-sm-12">
								<div class="single-model-search">
									<h2>Body Type:</h2>
									<div class="model-select-icon">
										<select class="form-control" id="bodyTypeFilter">
											<option value="">All Body Types</option>
											<!-- Add options dynamically based on available body types -->
										</select>
									</div>
								</div>
								<div class="single-model-search">
									<h2>Fuel Type:</h2>
									<div class="model-select-icon">
										<select class="form-control" id="fuelTypeFilter">
											<option value="">All Fuel Types</option>
											<!-- Add options dynamically based on available fuel types -->
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-offset-1 col-md-2 col-sm-12">
								<div class="single-model-search">
									<h2>Make:</h2>
									<div class="model-select-icon">
										<select class="form-control" id="makeFilter">
											<option value="">All Makes</option>
											<!-- Add options dynamically based on available makes -->
										</select>
									</div>
								</div>
								<div class="single-model-search">
									<h2>Seat Count:</h2>
									<div class="model-select-icon">
										<select class="form-control" id="seatCountFilter">
											<option value="">All Seat Counts</option>
											<!-- Add options dynamically based on available seat counts -->
										</select>
									</div>
								</div>
							</div>
							<!-- Add more sections as needed -->

						</div>
					</div>
				</div>
			</div>
		</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

        

		<!--featured-cars start -->
		<section id="featured-cars" class="featured-cars">
			<div class="container">
				<div id = "card-container" class="card-container row">

				</div>
			</div><!--/.container-->
		</section><!--/.featured-cars-->
		<!--featured-cars end -->

		<!-- Custom Footer with Contact Info and Copyright -->
		<footer id="custom-footer" class="custom-footer">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="footer-contact">
							<p>Email: info@GTR.com | Phone: +94 (77) 6648689</p>
						</div>
						<div class="copyright">
							<p>&copy; Designed & Developed By BrandBuzz</p>
						</div>
					</div>
				</div>
			</div>
		</footer>


         


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>

		<!--card display JS-->
		<script>
			// Define the checkAvailability function outside of the $(document).ready block
			function checkAvailability() {
				var startDate = $("#startDate").val();
				var endDate = $("#endDate").val();

				$.ajax({
					type: "POST",
					url: "filterdate.php",
					data: {
						startDate: startDate,
						endDate: endDate
					},
					success: function(response) {
						$("#card-container").html(response);
					}
				});
			}

			// Call checkAvailability on page load within $(document).ready
			$(document).ready(function () {
				checkAvailability();
			});


		</script>

	    <!-- nav bar changes   -->
		
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				// Assume that isUserLoggedIn is a variable that indicates whether the user is logged in or not
				var isUserLoggedIn = <?php echo json_encode(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]); ?>;
				
				// Get references to the login and account buttons
				var contact = document.getElementById('contact');
				var postAdButton = document.getElementById('btn-postAd');
				var loginButton = document.getElementById('btn-login');
				var signupButton = document.getElementById('btn-signup');
				var accountButton = document.getElementById('btn-account');
				var logoutButton = document.getElementById('btn-logout');


				// Function to toggle button visibility based on login status
				function toggleButtonsVisibility() {
					if (isUserLoggedIn) {

						contact.style.display = 'none';
						loginButton.style.display = 'none';
						signupButton.style.display = 'none';
						postAdButton.style.display = 'inline-block';
						accountButton.style.display = 'inline-block'; 
						logoutButton.style.display = 'inline-block'; 

					} else {

						contact.style.display = 'inline-block';
						loginButton.style.display = 'inline-block'; 
						signupButton.style.display = 'inline-block';
						postAdButton.style.display = 'none'; 
						accountButton.style.display = 'none';
						logoutButton.style.display = 'none';

					}
				}

				// Call the function initially to set the initial visibility
				toggleButtonsVisibility();
			});

		</script>

		<script>
		function showPopup(vehicleId) {


			var startDate = $("#startDate").val();
   			var endDate = $("#endDate").val();

			var isUserLoggedIn = <?php echo json_encode(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]); ?>;
			

			if (!isUserLoggedIn) {
				alert("Please select a start date and end date.");
				// If not logged in, redirect to the login page
				window.location.href = 'loginbase.php'; 
				return;
			}

			if (!startDate || !endDate) {
				// If date range is not selected, display a separate popup
				alert("Please select a start date and end date.");
				return;
			}



			// Get the card details using the unique identifier (vehicleId)
			var card = document.querySelector('.card[data-id="' + vehicleId + '"]');


			// Calculate total days, price per day, and total cost (replace these with your actual calculation logic)
			var totalDays = calculateTotalDays(startDate, endDate);
			var pricePerDay = card.getAttribute('data-price'); 
			var totalCost = totalDays * pricePerDay;


			// Create the popup content with input fields for start date and end date
			var popupContent =
				'<div class="popup-container">' +
				'<h2>' + card.querySelector('h2').textContent + '</h2>' +
				'<p>Location: ' + card.getAttribute('data-location') + '</p>' +
				'<p>Features: ' + card.getAttribute('data-body-type') + ' | ' + card.getAttribute('data-fuel-type') + ' | ' + card.getAttribute('data-transmission') + '</p>' +
				'<label for="startDate">Start Date:</label>' +
				'<span id="popupStartDate">' + startDate + '</span><br>' +
				'<label for="endDate">End Date:</label>' +
				'<span id="popupEndDate">' + endDate + '</span><br>' +
				'<label for="totalDays">Total Days:</label>' +
				'<span id="popupTotalDays">' + totalDays + '</span><br>' +
				'<label for="pricePerDay">Price Per Day:</label>' +
				'<span id="popupPricePerDay">$' + pricePerDay + '</span><br>' +
				'<label for="totalCost">Total Cost:</label>' +
				'<span id="popupTotalCost">$' + pricePerDay * totalDays + '</span><br>' +
				'<button class="popbtn-rent" onclick="rentVehicle(' + vehicleId + ')">Confirm</button>' +
				'<button class="popbtn-close" onclick="closePopup()" class="btn-close">Close</button>'+
				'</div>';


			// Create the popup element
			var popup = document.createElement('div');
			popup.className = 'popup';
			popup.innerHTML = popupContent;

			// Append the popup to the body
			document.body.appendChild(popup);

			// Disable scrolling on the background
			document.body.style.overflow = 'hidden';
		}

		function calculateTotalDays(startDate, endDate) {
			// Replace this with your actual calculation logic to get the total number of days
			var start = new Date(startDate);
			var end = new Date(endDate);
			var timeDifference = Math.abs(end - start);
			var totalDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

			return totalDays;
		}

		function closePopup() {
			// Remove the popup
			var popup = document.querySelector('.popup');
			if (popup) {
				popup.remove();
				// Enable scrolling on the background
				document.body.style.overflow = 'auto';
			}
		}

		function rentVehicle(vehicleId) {
			// Get the selected start date and end date
			var startDate = document.getElementById('startDate').value;
			var endDate = document.getElementById('endDate').value;

			console.log("Start Date:", startDate);
			console.log("End Date:", endDate);

			// Get the card details using the unique identifier (vehicleId)
			var card = document.querySelector('.card[data-id="' + vehicleId + '"]');

			// Calculate total days, price per day, and total cost (replace these with your actual calculation logic)
			var totalDays = calculateTotalDays(startDate, endDate);
			var pricePerDay = card.getAttribute('data-price');
			var totalCost = totalDays * pricePerDay;

			console.log("Total Cost:", totalCost);

			// Check if the customer is logged in
			var customerId = <?php echo isset($_SESSION["customer_id"]) ? json_encode($_SESSION["customer_id"]) : 'null'; ?>;

			if (customerId !== null) {
				// Perform AJAX request
				$.ajax({
					type: "POST",
					url: "bookControl.php",
					data: {
						customerId: customerId,
						vehicleId: vehicleId,
						startDate: startDate,
						endDate: endDate,
						totalCost: totalCost
					},
					success: function (response) {
						// Handle the server response (if needed)
						console.log(response);
						alert("Your Booking Placed");
					},
					error: function (xhr, status, error) {
						console.error("AJAX Error:", status, error);
						alert("Failed to place booking. Please try again.");
					}
				});
			} else {
				// Handle the case when the customer is not logged in
				alert("Please log in before placing a booking.");
				// Redirect to the login page or show a login modal
			}

			// Close the popup
			closePopup();
		}
    </script>

<!-- Add the following script to your HTML file -->
<script>
    // Function to update filter options based on the data
    function updateFilterOptions(data, filterId) {
        var filterDropdown = document.getElementById(filterId);

        // Clear existing options
        filterDropdown.innerHTML = '<option value="">All ' + filterId.replace('Filter', '') + '</option>';

        // Add options dynamically based on available data
        for (var i = 0; i < data.length; i++) {
            var option = document.createElement('option');
            option.value = data[i];
            option.text = data[i];
            filterDropdown.add(option);
        }
    }

    // Function to filter cards based on selected options
    function filterCards() {
        // Get selected filter values
        var location = document.getElementById('locationFilter').value;
        var transmission = document.getElementById('transmissionFilter').value;
        var bodyType = document.getElementById('bodyTypeFilter').value;
        var fuelType = document.getElementById('fuelTypeFilter').value;
        var make = document.getElementById('makeFilter').value;
        var seatCount = document.getElementById('seatCountFilter').value;

        // Loop through cards and show/hide based on selected filters
        var cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            var card = cards[i];
            var cardLocation = card.getAttribute('data-location');
            var cardTransmission = card.getAttribute('data-transmission');
            var cardBodyType = card.getAttribute('data-body-type');
            var cardFuelType = card.getAttribute('data-fuel-type');
            var cardMake = card.getAttribute('data-make');
            var cardSeatCount = card.getAttribute('data-seat-count');

            var showCard = true;

            if (location && location !== cardLocation) {
                showCard = false;
            }
            if (transmission && transmission !== cardTransmission) {
                showCard = false;
            }
            if (bodyType && bodyType !== cardBodyType) {
                showCard = false;
            }
            if (fuelType && fuelType !== cardFuelType) {
                showCard = false;
            }
            if (make && make !== cardMake) {
                showCard = false;
            }
            if (seatCount && seatCount !== cardSeatCount) {
                showCard = false;
            }

            // Show or hide the card based on the filters
            if (showCard) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }
    }

    // Event listeners for filter dropdown changes
    document.getElementById('locationFilter').addEventListener('change', filterCards);
    document.getElementById('transmissionFilter').addEventListener('change', filterCards);
    document.getElementById('bodyTypeFilter').addEventListener('change', filterCards);
    document.getElementById('fuelTypeFilter').addEventListener('change', filterCards);
    document.getElementById('makeFilter').addEventListener('change', filterCards);
    document.getElementById('seatCountFilter').addEventListener('change', filterCards);

    // Assuming you have data for each filter option, you can call updateFilterOptions like this:
    // Replace ['Option1', 'Option2', 'Option3'] with your actual data for each filter
    updateFilterOptions(['Matara', 'Galle', 'Colombo','Kalutara', 'Gampaha', 'Kandy','Ranthnapura', 'Kurunagala', 'Jaffna'], 'locationFilter');
    updateFilterOptions(['Auto', 'Manual', 'Trriptonic'], 'transmissionFilter');
    updateFilterOptions(['Sedan', 'SUV','Pickup', 'Bus'], 'bodyTypeFilter');
    updateFilterOptions(['Petrol', 'Diesel', 'Electric'], 'fuelTypeFilter');
    updateFilterOptions(['Toyota', 'Nissan', 'BMW'], 'makeFilter');
    updateFilterOptions(['2', '4', '6'], 'seatCountFilter');
</script>

        
    </body>
	
</html>