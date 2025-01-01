function showConfirmation(event) {
    event.preventDefault(); // Ngừng hành động gửi form mặc định

    // Tạo đối tượng FormData từ form
    const form = document.getElementById("contactForm");
    const formData = new FormData(form);

    // Sử dụng AJAX để gửi form
    const xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Gửi thành công, hiển thị modal thông báo
            document.getElementById("myModal").style.display = "block";

            // Đóng modal sau 3 giây
            setTimeout(function () {
                closeModal();  // Đóng modal
            }, 3000);
        } else {
            console.error("Error sending form data.");
        }
    };
    xhr.send(formData); // Gửi dữ liệu form bằng AJAX
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
    location.reload();
}

// Close the modal when clicked outside of it
window.onclick = function (event) {
    if (event.target == document.getElementById("myModal")) {
        closeModal();
    }
}