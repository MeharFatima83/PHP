<?php
$conn = mysqli_connect("localhost","root","","database1");
$search=$_REQUEST['search'];
$sql="select * from registration where username like '$search%'";
$data=mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
header('Content-Type:application/json');
print_r(json_encode($data));
?>