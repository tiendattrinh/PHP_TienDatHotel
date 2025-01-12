// Đối tượng lưu dữ liệu phòng
const roomData = {
    "Deluxe Room": {
        image: "../../../images/room1.jpg",
        name: "Deluxe Room",
        price: "450",
    },
    "Standard Room": {
        image: "../../../images/room2.png",
        name: "Standard Room",
        price: "180",
    },
    "Suite": {
        image: "../../../images/room4.jpg",
        name: "Suite",
        price: "300",
    },
    "Family Room": {
        image: "../../../images/room3.jpg",
        name: "Family Room",
        price: "200",
    },
};

// Lắng nghe sự kiện thay đổi trên select
document.getElementById('room').addEventListener('change', function () {
    const selectedRoom = this.value; // Lấy giá trị phòng đã chọn
    const room = roomData[selectedRoom]; // Lấy dữ liệu phòng từ đối tượng

    // Cập nhật giao diện
    document.getElementById('room-image').src = room.image;
    document.getElementById('room-name').textContent = room.name;
    document.getElementById('room-price').textContent = room.price;
});