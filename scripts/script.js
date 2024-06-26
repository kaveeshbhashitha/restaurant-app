// button to go to top
let mybutton = document. ("scrollToTopBtn");

window.onscroll = function() {
    scrollFunction()
};

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
