<?php
$conn=mysqli_connect('localhost','root','','database1');

$name=$_REQUEST['myid'];

$sql="delete from users where id='$id'";

if(mysqli_query($conn,$sql))
        echo 1;
else
        echo 0;