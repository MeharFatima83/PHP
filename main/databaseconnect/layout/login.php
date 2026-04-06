<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body style="font-family: Arial; background: linear-gradient(to right, #667eea, #764ba2); display:flex; justify-content:center; align-items:center; height:100vh;">

    <form action="" method="POST" style="background:white; padding:30px; border-radius:10px; width:300px; box-shadow:0px 0px 15px rgba(0,0,0,0.2);">
        
        <h2 style="text-align:center; margin-bottom:20px;">Login</h2>

        <input type="text" name="username" placeholder="Enter Username/Email" 
        style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;" required>

        <input type="password" name="pass" placeholder="Enter Password" 
        style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;" required>

        <input type="submit" value="Login" 
        style="width:100%; padding:10px; background:#667eea; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">

    </form>

</body>
</html>

<?php
include 'connection.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM emp WHERE email='$user' OR name='$user'";
    $store = mysqli_query($connection, $sql);

    if(mysqli_num_rows($store) > 0){

        $credential = mysqli_fetch_row($store);

        if(password_verify($pass, $credential[3]) && $credential[4] == 1){

            $_SESSION['user-type'] = $credential[5];
            $_SESSION['user'] = $credential[1];
            $_SESSION['email']= $credential[2];
            $_SESSION['accountNo'] = $credential[0];

            if($credential[5]){
                header("location: admin.php");
            } else {
                header("location: user.php");
            }
            exit();

        } else {
            echo "<p style='text-align:center; color:red;'>Invalid password ❌</p>";
        }

    } else {
        echo "<p style='text-align:center; color:red;'>User not found ❌</p>";
    }
}
?>
<?php 
include 'footer.php'; 
?>