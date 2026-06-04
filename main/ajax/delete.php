<?php
include "connection.php";

$id = $_POST['id'];

$query = "DELETE FROM registration WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if($result){
    echo true;
} else {
    echo false;
}
?>