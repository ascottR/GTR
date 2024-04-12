const bookingManagement = document.getElementById('bookingManagement');
const bookingDiv = document.getElementById('bookingDiv');
let count = 0;
bookingManagement.addEventListener('click', function() {
    count++;
    if( count %2 != 0) bookingDiv.style.display = 'block';
    else bookingDiv.style.display = 'none';
})



