document.addEventListener('DOMContentLoaded', function() {
    // Your code here
    const vehicalManagement = document.getElementById('vehicalManagement');
    const vehicalDiv = document.getElementById('vehicalDiv');
    let count = 0;

    vehicalManagement.addEventListener('click', function() {
        // Increment the click count
        count++;

        // Toggle the display of vehicalManageDiv based on the odd/even count
        if (count % 2 !== 0) {
            vehicalDiv.style.display = 'block';
        } else {
            vehicalDiv.style.display = 'none';
        }

   
    });
});
