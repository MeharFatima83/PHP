<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>

<body style="font-family: Arial; background: linear-gradient(to right, #667eea, #764ba2); display:flex; justify-content:center; align-items:center; height:100vh;">

<form method="POST" style="background:white; padding:30px; border-radius:10px; width:300px; box-shadow:0px 0px 15px rgba(0,0,0,0.2);">
    
    <h2 style="text-align:center; margin-bottom:20px;">Login</h2>

    <input type="text" name="username" placeholder="Enter Username/Email" 
    style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;" required>

    <input type="password" name="pass" placeholder="Enter Password" 
    style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;" required>

    <input type="submit" name="login" value="Login" 
    style="width:100%; padding:10px; background:#667eea; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">

</form>

</body>
</html>

<?php

if(isset($_POST['login'])){

    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM emp WHERE email='$user' OR name='$user'";
    $store = mysqli_query($connection, $sql);

    if(mysqli_num_rows($store) > 0){

        $row = mysqli_fetch_assoc($store);

        // 🔐 Password + Active check
        if(password_verify($pass, $row['password']) && $row['is_active'] == 1){

            // ✅ Common session
            $_SESSION['user'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['accountNo'] = $row['id'];

            // 🔥 ROLE SYSTEM
            $_SESSION['superuser'] = $row['superuser'];

            if($row['superuser'] == 1 || $row['superuser'] == 2){
                $_SESSION['user-type'] = 1; // admin
                header("Location: admin.php");
            } else {
                $_SESSION['user-type'] = 0; // normal user
                header("Location: user.php");
            }

            exit();

        } else {
            echo "<p style='text-align:center; color:red;'>Invalid password or inactive account ❌</p>";
        }

    } else {
        echo "<p style='text-align:center; color:red;'>User not found ❌</p>";
    }
}
?>

<?php include 'footer.php'; ?>