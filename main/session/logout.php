<?php
SESSION_START();
unset($_SESSION['username']);
unset($_SESSION['time']);
session_destroy();
setcookie("loginId", "", time()-3600, "/"); 
header("location:dashboard.php");
?>