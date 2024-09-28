<?php

$host = 'localhost'; 
$db   = 'otp'; 
$user = 'root'; 
$pass = ''; 

// Create a new mysqli connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    // echo "connected to db";
}
?>
<!-- INSERT INTO `otp` (`sno`, `email`, `password`, `otp`) VALUES ('1', 'gmail@gmail.com', '1234', '11'); -->