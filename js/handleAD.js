// ==========================ẩn hiện menu giao diện mobile ================================
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector(".close-btn");
    const overlay = document.querySelector(".overlay");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.add("open");
        overlay.style.display = "block";  // Hiển thị overlay khi sidebar mở
    });

    closeBtn.addEventListener("click", function () {
        sidebar.classList.remove("open");
        overlay.style.display = "none";  // Ẩn overlay khi sidebar đóng
    });

    overlay.addEventListener("click", function () {
        sidebar.classList.remove("open");
        overlay.style.display = "none";  // Ẩn overlay khi bấm ra ngoài
    });
});


// ========================= input search booking ==================================
// Lắng nghe sự kiện nhập liệu trên ô tìm kiếm
document.getElementById('search-input').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase(); // Lấy giá trị nhập và chuyển thành chữ thường
    const tableRows = document.querySelectorAll('.orders-table tbody tr'); // Lấy tất cả các hàng trong bảng

    tableRows.forEach(row => {
        const clientName = row.children[1].textContent.toLowerCase(); // Lấy nội dung cột "Client"

        // So sánh giá trị nhập với tên khách hàng
        if (clientName.includes(searchValue)) {
            row.style.display = ''; // Hiển thị hàng nếu khớp
        } else {
            row.style.display = 'none'; // Ẩn hàng nếu không khớp
        }
    });
});


// =========================nút sắp xếp send message ==================================
let isDesc = true; // Trạng thái sắp xếp ban đầu
document.getElementById('filter-button').addEventListener('click', function () {
    // Đổi trạng thái sắp xếp
    isDesc = !isDesc;
    // Hiển thị bảng tương ứng
    document.getElementById('table-desc').style.display = isDesc ? 'table' : 'none';
    document.getElementById('table-asc').style.display = isDesc ? 'none' : 'table';
});


// ==========================nút info booking=====================================
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("infoModal");
    const modalDetails = document.getElementById("modal-details");
    const closeModal = document.querySelector(".close-btn-booking");

    // Mở modal khi bấm vào nút info
    document.querySelectorAll(".view-info").forEach((icon) => {
        icon.addEventListener("click", (e) => {
            const row = e.target.closest("tr");
            const data = JSON.parse(row.getAttribute("data-info"));

            // Tạo nội dung chi tiết dạng bảng
            let detailsHtml = `
            <tr><th>Client</th><td>${data.name}</td></tr>
            <tr><th>Email</th><td>${data.email}</td></tr>
            <tr><th>Phone</th><td>${data.phone}</td></tr>
            <tr><th>Room</th><td>${data.room_name}</td></tr>
            <tr><th>Guest</th><td>${data.guest}</td></tr>
            <tr><th>Meal</th><td>${data.meal}</td></tr>
            <tr><th>Arrival</th><td>${data.arrival}</td></tr>
            <tr><th>Departure</th><td>${data.departure}</td></tr>
            <tr><th>Total Days</th><td>${data.total_day}</td></tr>
            <tr><th>Payment</th><td>${data.pay}</td></tr>
            <tr><th>Status</th><td>${data.status}</td></tr>
            
        `;
            modalDetails.innerHTML = detailsHtml;
            modal.style.display = "flex";
        });
    });
    // Đóng modal
    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });
    // Đóng modal khi bấm ngoài
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});


// ================nút cập nhật trạng thái status booking========================
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("statusModal");
    const statusSelect = document.getElementById("statusSelect");
    const saveBtn = document.getElementById("saveStatusBtn");
    const closeModal = document.getElementById("closeModalstt");
    let selectedRow;

    document.querySelectorAll(".hd-check-booking").forEach(icon => {
        icon.addEventListener("click", function () {
            modal.style.display = "flex";
            selectedRow = this.closest("tr");
        });
    });

    saveBtn.addEventListener("click", () => {
        const newStatus = statusSelect.value;
        const bookingId = selectedRow.querySelector("td:first-child").textContent.replace("#", "");

        // Gửi AJAX để cập nhật trạng thái
        fetch("booking/handle_ad.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: bookingId, status: newStatus })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    selectedRow.querySelector("td:nth-child(8)").textContent = newStatus;
                    modal.style.display = "none";
                } else {
                    alert("Failed to update status");
                }
            })
            .catch(error => console.error("Error:", error));
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });
});


// ================ nút xóa booking========================
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            if (confirm('Are you sure you want to delete this booking?')) {
                fetch('./booking/handle_delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Booking deleted successfully.');
                            location.reload(); // Reload the page to reflect the changes
                        } else {
                            alert('Error deleting booking: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while processing your request.');
                    });
            }
        });
    });
});


// ================nút cập nhật contact status ========================
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("statusModal-ct");
    const statusSelect = document.getElementById("statusSelect-ct");
    const saveBtn = document.getElementById("saveStatusBtn-ct");
    const closeModal = document.getElementById("closeModal-ct");
    let selectRow;

    document.querySelectorAll(".hd-check-contact").forEach(icon => {
        icon.addEventListener("click", function () {
            modal.style.display = "flex";
            selectRow = this.closest("tr");
        })
    })

    saveBtn.addEventListener("click", () => {
        const newStatus = statusSelect.value;
        const contactId = selectRow.querySelector("td:first-child").textContent.replace("#", "");

        // Gửi AJAX để cập nhật trạng thái
        fetch("contact/handle_ad_ct.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: contactId, status: newStatus })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    selectRow.querySelector("td:nth-child(7)").textContent = newStatus;
                    modal.style.display = "none";
                } else {
                    alert("Failed to update status");
                }
            })
            .catch(error => console.error("Error:", error));
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });
});


// ================ nút xóa contact========================
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-btn-ct');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-idct');

            if (confirm('Are you sure you want to delete this contact?')) {
                fetch('./contact/handle_delete_ct.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Contact deleted successfully.');
                            location.reload(); // Reload the page to reflect the changes
                        } else {
                            alert('Error deleting contact: ' + data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while processing your request.');
                    });
            }
        });
    });
});


// ================================ xử lý đóng mở modal nút thêm todo-list ================================
// Mở modal
document.getElementById("openModal").addEventListener("click", function () {
    document.getElementById("addnote").style.display = "flex";
});

// Đóng modal
document.getElementById("closeModal_addNote").addEventListener("click", function () {
    document.getElementById("addnote").style.display = "none";
});

// Thêm công việc
document.getElementById("addNoteBtn").addEventListener("click", function () {
    const taskText = document.getElementById("taskText").value;
    const taskTime = document.getElementById("taskTime").value;

    if (taskText && taskTime) {
        // Gửi dữ liệu lên server qua AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "todo/add_task.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Task added successfully!");
                location.reload(); // Refresh trang sau khi thêm thành công
            } else {
                alert("Error adding task.");
            }
        };
        xhr.send(`task_text=${taskText}&task_time=${taskTime}`);
    } else {
        alert("Please fill in all fields.");
    }
});


// ================================ xử lý checkbox, xóa, gửi, nhận dữ liệu và load lại trang của todo-list ================================
// Hàm lấy dữ liệu từ server và hiển thị
function fetchTasks() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "todo/fetch_tasks.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const tasks = JSON.parse(xhr.responseText);

            // Render danh sách công việc
            const taskList = document.getElementById("taskList");
            taskList.innerHTML = ""; // Xóa danh sách cũ

            tasks.forEach(task => {
                const li = document.createElement("li");

                li.innerHTML = `
        <input type="checkbox" ${task.complete == 1 ? "checked" : ""} data-id="${task.id}">
        <span style="text-decoration: ${task.complete == 1 ? "line-through" : "none"}; 
        color: ${task.complete == 1 ? "#888" : "inherit"};"> ${task.text}
        </span>
        <span class="time">${task.time} <i class="fas fa-trash" data-id="${task.id}"></i></span>
    `;
                taskList.appendChild(li);
            });
            // Thêm sự kiện xóa và hoàn thành công việc
            addTaskEvents();
        }
    };
    xhr.send();
}

// Hàm thêm sự kiện cho các nút xóa và checkbox
function addTaskEvents() {
    // Xóa công việc
    document.querySelectorAll(".fa-trash").forEach(icon => {
        icon.addEventListener("click", function () {
            const taskId = this.getAttribute("data-id");
            deleteTask(taskId);
        });
    });

    // Đánh dấu hoàn thành công việc
    // Đảm bảo rằng chọn đúng các checkbox đã render
    const checkboxes = document.querySelectorAll("input[type='checkbox']");
    if (checkboxes.length === 0) {
        console.error("No checkboxes found.");
        return;
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const taskId = this.getAttribute("data-id");
            const complete = this.checked ? 1 : 0;

            // Cập nhật giao diện ngay lập tức
            const taskText = this.nextElementSibling; // <span> chứa nội dung công việc
            if (taskText) {
                taskText.style.textDecoration = complete ? "line-through" : "none";
                taskText.style.color = complete ? "#888" : "inherit";
            }

            // Gửi yêu cầu cập nhật trạng thái lên server
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "todo/update_task_status.php", true); // Đúng file xử lý
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log("Task status updated successfully");
                } else {
                    console.error("Failed to update task status.");
                }
            };
            xhr.send(`id=${taskId}&complete=${complete}`);
        });
    });

}

// Hàm xóa công việc
function deleteTask(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "todo/delete_task.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            fetchTasks(); // Load lại danh sách công việc
        }
    };
    xhr.send(`id=${id}`);
}

// Hàm cập nhật trạng thái hoàn thành
function updateTaskStatus(id, complete) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "todo/update_task_status.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            fetchTasks(); // Load lại danh sách công việc
        }
    };
    xhr.send(`id=${id}&complete=${complete}`);
}

// Gọi hàm fetchTasks khi tải trang
document.addEventListener("DOMContentLoaded", fetchTasks);
