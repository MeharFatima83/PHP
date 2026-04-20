<?php
include 'database.php';
include 'student.php';
$db=new Database();
$user=new User($db->conn());
$user->id=$_REQUEST['id'];
$user->delete();
header("Location:read.php");

?>