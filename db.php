<?php
    $servername = "localhost";
    $username = "root";
    $password = "toor";

    // Create connection
    $conn = new mysqli($servername, $username, $password, "askus");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>