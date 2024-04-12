document.addEventListener('DOMContentLoaded', function() {
    // Your code here
    const paymentMangement = document.getElementById('paymentMangement');
    const managePayment = document.getElementById('managePayment');
    let count = 0;

    paymentMangement.addEventListener('click', function() {
        // Increment the click count
        count++;

        // Toggle the display of vehicalManageDiv based on the odd/even count
        if (count % 2 !== 0) {
            managePayment.style.display = 'block';
        } else {
            managePayment.style.display = 'none';
        }

   
    });
});
