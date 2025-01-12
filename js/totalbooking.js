document.addEventListener("DOMContentLoaded", function () {
    // Giá phòng theo loại
    const roomPrices = {
        "Deluxe Room": 450,
        "Standard Room": 180,
        "Suite": 300,
        "Family Room": 200,
    };

    // Hàm tính tổng chi phí
    function calculateTotal() {
        const roomType = document.getElementById("room").value;
        const arrivalDateInput = document.getElementById("arrival");
        const departureDateInput = document.getElementById("departure");
        const guests = parseInt(document.getElementById("guests").value);
        const mealType = document.getElementById("meal").value;

        const arrivalDate = new Date(arrivalDateInput.value);
        const departureDate = new Date(departureDateInput.value);
        const currentDate = new Date(); // Lấy ngày hiện tại

        // Kiểm tra nếu ngày Arrival nhỏ hơn ngày hiện tại
        if (arrivalDate < currentDate) {
            alert("Arrival date CANNOT BE EARLIER than today.");
            arrivalDateInput.value = ""; // Reset ngày arrival
            document.querySelector(".form-total").textContent = "Total: $0";
            return;
        }

        // Kiểm tra nếu ngày Departure <= ngày Arrival
        if (departureDate <= arrivalDate && departureDateInput.value !== "") {
            alert("Departure date MUST BE LATE than arrival date.");
            departureDateInput.value = ""; // Reset ngày departure
            document.querySelector(".form-total").textContent = "Total: $0";
            return;
        }

        // Kiểm tra nếu ngày chưa được chọn
        if (!arrivalDateInput.value || !departureDateInput.value) {
            document.querySelector(".form-total").textContent = "Total: $0";
            return;
        }

        // Tính số ngày ở
        const days = (departureDate - arrivalDate) / (1000 * 60 * 60 * 24);

        // Giá phòng
        let roomPricePerNight = roomPrices[roomType];

        // Tính giá theo số khách
        let guestMultiplier = 1;
        if (guests === 2) {
            guestMultiplier = 1.2;
        } else if (guests === 3) {
            guestMultiplier = 1.3;
        } else if (guests === 4) {
            guestMultiplier = 1.4;
        }
        roomPricePerNight *= guestMultiplier;

        // Tính giá theo loại meal
        let mealCost = 0;
        if (mealType === "Snacks +$40") {
            mealCost = 40;
        } else if (["Breakfast +$80", "Lunch +$80", "Dinner +$80"].includes(mealType)) {
            mealCost = 80;
        }

        // Tổng chi phí
        const total = days * (roomPricePerNight + mealCost);

        // Cập nhật tổng giá
        document.querySelector(".form-total").textContent = `Total: $${total.toFixed(2)}`;
        document.getElementById("total").value = total.toFixed(2);
    }

    // Gán sự kiện onchange cho các input
    document.getElementById("room").addEventListener("change", calculateTotal);
    document.getElementById("arrival").addEventListener("change", calculateTotal);
    document.getElementById("departure").addEventListener("change", calculateTotal);
    document.getElementById("guests").addEventListener("change", calculateTotal);
    document.getElementById("meal").addEventListener("change", calculateTotal);
});