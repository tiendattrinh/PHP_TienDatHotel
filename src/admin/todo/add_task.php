<?php
include '../../../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_text = $_POST['task_text'];
    $task_time = $_POST['task_time'];

    $sql = "INSERT INTO todo (text, time, complete) VALUES ('$task_text', '$task_time', 0)";
    if (mysqli_query($con, $sql)) {
        echo "Task added successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>