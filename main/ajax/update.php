<?php
$conn = mysqli_connect("localhost","root","","database1");

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];

$sql = "UPDATE registration SET username='$username', email='$email', mobile='$mobile' WHERE id='$id'";

if(mysqli_query($conn,$sql)){
    echo "Updated successfully";
} else {
    echo "Update failed";
}
?>