<?php
$servername = "db";
$username = "crush";
$password = "crush123";
$dbname = "crush";

// creating connection
$conn = mysqli_connect ($servername, $username, $password, $dbname);

// check the connection
if (!$conn){
    echo "connection failed";
}
?>