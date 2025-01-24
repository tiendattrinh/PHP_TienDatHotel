<?php
include '../../../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $complete = $_POST['complete'];

    // Kiểm tra dữ liệu trước khi cập nhật
    if (!isset($id) || !isset($complete)) {
        echo "Invalid input";
        exit;
    }

    $sql = "UPDATE todo SET complete = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $complete, $id);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $con->error;
    }

    $stmt->close();
}
?>