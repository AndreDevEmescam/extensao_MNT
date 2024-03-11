<?php

    $hostname = "192.168.70.24";
    $username = "root";
    $password = "2562";
    $database = "emescamextensao";

    // connection
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // check
    if (!$conn) {
        die("Error :" . mysqli_connect_error());
    }
 
?>