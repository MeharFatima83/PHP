<?php
$conn=mysqli_connect('localhost','root','','database1');

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];

$sql="select * from users where name='$name'";
if(mysqli_fetch_row(mysqli_query($conn,$sql))>0)
        {
            echo false;
        }
else{







$sql="insert into student(name,email,mobile)values('$name','$email','$mobile')";
if(mysqli_query($conn,$sql))
        echo true;
else
        echo false;

}
?>