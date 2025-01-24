<?php
include '../../../database.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
//update trạng thái booking
if (isset($data['id']) && isset($data['status'])) {
    $id = intval($data['id']);
    $status = $con->real_escape_string($data['status']);

    $sql = "UPDATE roombook SET status = '$status' WHERE id = $id";

    if ($con->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $con->error]);
    }
}
// Trường hợp không hợp lệ
else {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
}

$con->close();
?>