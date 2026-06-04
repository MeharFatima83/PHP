<?php
//register backend
include 'connection.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];

if($password != $rpassword){
    echo 0;
    exit();
}

$query = "INSERT INTO registration (username, email, password) 
          VALUES ('$username', '$email', '$password')";

$result = mysqli_query($conn, $query);

if($result){
    echo 1;
} else {
    echo 0;
}
?>