const manageProfile = document.getElementById('manageProfile');
const updateProfile = document.getElementById('UpdateProfile'); // Corrected variable name
let counts = 0;

manageProfile.addEventListener('click', function() {
    counts++; // Increment the counts variable

    if (counts % 2 !== 0) {
        // If counts is odd, show the updateProfile element
        updateProfile.style.display = 'block';
    } else {
        // If counts is even, hide the updateProfile element
        updateProfile.style.display = 'none';
    }
});
