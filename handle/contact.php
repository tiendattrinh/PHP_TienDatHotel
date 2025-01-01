<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, phone, message) VALUE ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($con, $sql)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error data" . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Request denied";
}

?>