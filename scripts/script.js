// Go up button code
let mybutton = document.getElementById("scrollToTopBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

mybutton.onclick = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

//js code for handle menu pages
function showMenu(menu) {
    // Hide all menus
    document.querySelectorAll('.menu').forEach(function(menu) {
        menu.classList.add('hidden');
    });

    // Show the selected menu
    document.getElementById(menu).classList.remove('hidden');

    // Remove 'selected' class from all buttons
    document.querySelectorAll('.menu-buttons button').forEach(function(button) {
        button.classList.remove('selected');
    });

    // Add 'selected' class to the clicked button
    document.getElementById('btn-' + menu).classList.add('selected');
}
