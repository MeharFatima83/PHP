<?php
$conn=mysqli_connect("localhost","root","","database1");
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];
$sql="select * from student where name='$name'";

$sql="insert into student(name,email,mobile)value('$name','$email',''$mobile)";
if(mysqli_query($conn,$sql)){
 echo true;
}
else{
    echo false;
}

?>