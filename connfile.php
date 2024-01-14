<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "crud";
    $conn = mysqli_connect($server, $user, $password, $database);
    if ($conn) {
        // echo "Connect to php my admin <br>";
        } else {
            echo "Connection failed" . mysqli_connect_error();
    }
?>