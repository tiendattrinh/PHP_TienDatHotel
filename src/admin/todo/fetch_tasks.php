<?php
include '../../../database.php';

$sql = "SELECT id, text, time, complete FROM todo ORDER BY id DESC";
$result = $con->query($sql);

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = [
        "id" => $row['id'],
        "text" => $row['text'],
        "time" => $row['time'],
        "complete" => (int) $row['complete'], // Trả về kiểu số
    ];
}

echo json_encode($tasks);
?>