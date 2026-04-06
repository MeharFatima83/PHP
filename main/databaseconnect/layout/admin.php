<?php

session_start();
if(isset($_SESSION['user-type'])){

if($_SESSION['user-type']==1){

    include 'adminheader.php';
}
else{
    header("location: user.php");
}
}
else{
    header("location: login.php");
}

?>