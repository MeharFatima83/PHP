<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "database1";

$conn = mysqli_connect($host, $username, $password, $database) 
        or die("Connection failed: " . mysqli_connect_error());
?>