<?php
    $host = "localhost";
    $user = "root";
    $password = "12980";
    $db = "teacher";
    $conn = mysqli_connect($host, $user, $password, $db);
    if ($conn != true) {
        echo "Connection Failed. <br>".mysqli_connect_error();
        exit();
    }
?>