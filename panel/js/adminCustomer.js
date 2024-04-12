document.addEventListener('DOMContentLoaded', function() {
    // Your code here
    const userMangement = document.getElementById('userMangement');
    const manageUsers = document.getElementById('manageUsers');
    let count = 0;

    userMangement.addEventListener('click', function() {
        // Increment the click count
        count++;

        // Toggle the display of vehicalManageDiv based on the odd/even count
        if (count % 2 !== 0) {
            manageUsers.style.display = 'block';
        } else {
            manageUsers.style.display = 'none';
        }

   
    });
});
