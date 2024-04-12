document.addEventListener('DOMContentLoaded', function() {
    var cards = document.querySelectorAll('.card');
    var locationFilter = document.getElementById('locationFilter');
    var transmissionFilter = document.getElementById('transmissionFilter');
    var bodyTypeFilter = document.getElementById('bodyTypeFilter');
    var fuelTypeFilter = document.getElementById('fuelTypeFilter'); // Add this line
    var makeFilter = document.getElementById('makeFilter'); // Add this line
    var seatCountFilter = document.getElementById('seatCountFilter'); // Add this line

    // Populate filter options dynamically based on card attributes
    var locations = new Set();
    var transmissions = new Set();
    var bodyTypes = new Set();
    var fuelTypes = new Set(); 
    var makes = new Set(); 
    var seatCounts = new Set(); 

    cards.forEach(function(card) {
        locations.add(card.getAttribute('data-location'));
        transmissions.add(card.getAttribute('data-transmission'));
        bodyTypes.add(card.getAttribute('data-body-type'));
        fuelTypes.add(card.getAttribute('data-fuel-type')); // Add this line
        makes.add(card.getAttribute('data-make')); // Add this line
        seatCounts.add(card.getAttribute('data-seat-count')); // Add this line
    });

    console.log(fuelTypes); //debug 

    populateOptions(locationFilter, locations);
    populateOptions(transmissionFilter, transmissions);
    populateOptions(bodyTypeFilter, bodyTypes);
    populateOptions(fuelTypeFilter, fuelTypes); // Add this line
    populateOptions(makeFilter, makes); // Add this line
    populateOptions(seatCountFilter, seatCounts); // Add this line

    function populateOptions(select, values) {
        values.forEach(function(value) {
            var option = document.createElement('option');
            option.value = value;
            option.textContent = value;
            select.appendChild(option);
        });
    }

    // Attach change events to filter controls
    locationFilter.addEventListener('change', filterCards);
    transmissionFilter.addEventListener('change', filterCards);
    bodyTypeFilter.addEventListener('change', filterCards);
    fuelTypeFilter.addEventListener('change', filterCards); // Add this line
    makeFilter.addEventListener('change', filterCards); // Add this line
    seatCountFilter.addEventListener('change', filterCards); // Add this line

    function filterCards() {
        var selectedLocation = locationFilter.value;
        var selectedTransmission = transmissionFilter.value;
        var selectedBodyType = bodyTypeFilter.value;
        var selectedFuelType = fuelTypeFilter.value; // Add this line
        var selectedMake = makeFilter.value; // Add this line
        var selectedSeatCount = seatCountFilter.value; // Add this line

        cards.forEach(function(card) {
            var cardLocation = card.getAttribute('data-location');
            var cardTransmission = card.getAttribute('data-transmission');
            var cardBodyType = card.getAttribute('data-body-type');
            var cardFuelType = card.getAttribute('data-fuel-type'); // Add this line
            var cardMake = card.getAttribute('data-make'); // Add this line
            var cardSeatCount = card.getAttribute('data-seat-count'); // Add this line

            var isVisible =
                (!selectedLocation || cardLocation === selectedLocation) &&
                (!selectedTransmission || cardTransmission === selectedTransmission) &&
                (!selectedBodyType || cardBodyType === selectedBodyType) &&
                (!selectedFuelType || cardFuelType === selectedFuelType) && // Add this line
                (!selectedMake || cardMake === selectedMake) && // Add this line
                (!selectedSeatCount || cardSeatCount === selectedSeatCount); // Add this line

            card.style.display = isVisible ? 'block' : 'none';
        });
    }
});
