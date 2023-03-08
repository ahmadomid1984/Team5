<?php
	// Connect to database
    $servername = "db";
    $username = "omid";
    $password = "omid123";
    $dbname = "omid";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>