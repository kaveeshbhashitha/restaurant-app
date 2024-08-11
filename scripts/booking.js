document.addEventListener("DOMContentLoaded", function () {
    const days = document.querySelectorAll(".day");
    const bookingDetailsModal = document.getElementById("bookingDetailsModal");
    const bookingDetails = document.getElementById("bookingDetails");
    const closeModal = document.querySelector(".close");

    days.forEach(day => {
        day.addEventListener("click", function () {
            const bookingInfo = this.querySelector(".booking-info").innerHTML;
            bookingDetails.innerHTML = bookingInfo;
            bookingDetailsModal.style.display = "block";
        });
    });

    // Close modal
    closeModal.onclick = function () {
        bookingDetailsModal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == bookingDetailsModal) {
            bookingDetailsModal.style.display = "none";
        }
    }
});