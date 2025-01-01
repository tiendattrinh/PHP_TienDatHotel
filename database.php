<?php
$con = mysqli_connect("localhost", "root", "", "tdhotel");

if (!$con) {
    die("Error database" . mysqli_connect_error());
}
?>