document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('mainToggle');
    const leftBtn = document.getElementById('left');
    const rightBtn = document.getElementById('right');
    const dashboard = document.getElementById('dashboard');
    const addVehicalForm = document.getElementById('addVehicalForm');
    const addVehical = document.getElementById('addVehical');
    let count = 0;
    let formCount = 0;

    toggleBtn.addEventListener('click', function() {

        count++;

        if ( count % 2 != 0) {
            leftBtn.style.backgroundColor = '#000';
            rightBtn.style.backgroundColor = '#fff';
            dashboard.style.display = 'flex';
        }
        else {
            leftBtn.style.backgroundColor = '#fff';
            rightBtn.style.backgroundColor = '#000';
            dashboard.style.display = 'none';
        }
        
    });

    addVehical.addEventListener('click' , function() {

        formCount++;

        if ( formCount % 2 != 0) {
            addVehicalForm.style.display = 'block';
        }
        else {
            addVehicalForm.style.display = 'none';
        }
    })
});
