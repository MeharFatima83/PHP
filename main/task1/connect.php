<?php
$username="root";
$host="localhost";
$password="";
$database="database1";
$connect=mysqli_connect("$host", "$username", "$password", "$database")or die("connection failed").mysqli_error($connect);