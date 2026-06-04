<?php
include 'connection.php';

$username = $_POST['username'];

$query = "SELECT * FROM registration WHERE username='$username'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    echo 1; // exists
} else {
    echo 0; // available
}
?>