<?php
include '../../../database.php'; // Kết nối tới database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $room = mysqli_real_escape_string($con, $_POST['room']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $arrival = mysqli_real_escape_string($con, $_POST['arrival']);
    $departure = mysqli_real_escape_string($con, $_POST['departure']);
    $guests = (int) $_POST['guests'];
    $meal = mysqli_real_escape_string($con, $_POST['meal']);
    $total = (float) $_POST['total'];
    $status = 'Pending Confirmation';
    $note = ''; // Bạn có thể thêm note nếu cần

    // Tính số ngày ở
    $arrival_date = new DateTime($arrival);
    $departure_date = new DateTime($departure);
    $total_days = $departure_date->diff($arrival_date)->days;

    // Thêm dữ liệu vào bảng `roombook`
    $query = "INSERT INTO roombook (name, email, phone, room_name, guest, meal, arrival, departure, total_day, pay, status, note)
              VALUES ('$name', '$email', '$phone', '$room', $guests, '$meal', '$arrival', '$departure', $total_days, $total, '$status', '$note')";

    if (mysqli_query($con, $query)) {
        header("Location: ../../../src/user/booking/booking.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>