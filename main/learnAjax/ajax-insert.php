<?php
$name=$_POST['name'];
$rollnumber=$_POST['rollnumber'];
$email=$_POST['email'];
$conn=mysqli_connect("localhost","root","","database1")or die("connection failed");
$sql="insert into User(name,rollnumber,email) values('{$name}','{$rollnumber}','{$email}')";
// $result=mysqli_query($conn,$sql)or die("sql query failed");
if(mysqli_query($conn,$sql)){
echo 1;
}
else{
    echo 0;
}
?>