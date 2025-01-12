function showBookingConfirmation(event) {
    event.preventDefault(); // Ngừng hành động submit form mặc định

    // Tạo đối tượng FormData từ form
    const form = document.querySelector("form[action='../handle/submit_booking.php']");
    const formData = new FormData(form);

    // Sử dụng AJAX để gửi form
    const xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Gửi thành công, hiển thị modal thông báo
            document.getElementById("bookingModal").style.display = "block";

            // Đóng modal sau 3 giây
            setTimeout(function () {
                closeBookingModal(); // Đóng modal
            }, 3000);
        } else {
            console.error("Error sending booking data.");
        }
    };
    xhr.send(formData); // Gửi dữ liệu form bằng AJAX
}

function closeBookingModal() {
    document.getElementById("bookingModal").style.display = "none";
    location.reload();
}

// Close the modal when clicked outside of it
window.onclick = function (event) {
    if (event.target == document.getElementById("bookingModal")) {
        closeBookingModal();
    }
};
