<?php
include '../../../database.php';
header('Content-Type: application/json');

// Đọc dữ liệu từ yêu cầu AJAX
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $id = intval($data['id']);

    // Xóa dữ liệu từ bảng roombook
    $sql = "DELETE FROM roombook WHERE id = $id";

    if ($con->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $con->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
}

$con->close();
?>