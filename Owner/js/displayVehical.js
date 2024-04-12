const vehicalDiv = document.getElementById('vehicleGrid');
const displayVehicalBtn = document.getElementById('vehicalDisplayBtn');
let count = 0;

displayVehicalBtn.addEventListener('click', function () {
    count++;
    if (count % 2 != 0) {
        vehicalDiv.style.display = 'flex';
    } else {
        vehicalDiv.style.display = 'none';
    }
});
