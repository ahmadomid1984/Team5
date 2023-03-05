<?php
$servername = "db";
$username = "coffeecrush";
$password = "coffee123";
$dbname = "coffeecrush";

// Creating connection
$conn = new mysqli ($servername, $username, $password, $dbname);

// Checking the connection
if ($conn -> connect_error){
    die("connection failed:".$conn->connect_error);

}
?>

