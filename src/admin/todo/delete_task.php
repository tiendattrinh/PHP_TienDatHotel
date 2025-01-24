<?php
include '../../../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM todo WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        echo "Task deleted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>