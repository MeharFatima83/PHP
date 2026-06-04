<?php
$conn=mysqli_connect('localhost','root','','database1');
$sql='select * from student';

header('content-type:application/json');

$data=mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);

print_r(json_encode($data));