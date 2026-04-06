<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body style="font-family: Arial; background: linear-gradient(to right, #667eea, #764ba2); display:flex; justify-content:center; align-items:center; height:100vh;">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" 
    style="background:white; padding:30px; border-radius:10px; width:300px; box-shadow:0px 0px 15px rgba(0,0,0,0.2);">
        
        <h2 style="text-align:center; margin-bottom:20px;">Register</h2>

        <input type="text" name="name" placeholder="Name" required
        style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;"><br>

        <input type="email" name="email" placeholder="Email" required
        style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;"><br>

        <input type="password" name="pass" placeholder="Password" required
        style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;"><br>

        <input type="password" name="retype" placeholder="Retype password" required
        style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;"><br>

        <input type="submit" value="Register"
        style="width:100%; padding:10px; background:#ff7eb3; color:white; border:none; border-radius:5px; cursor:pointer; font-weight:bold;">
    
    </form>

</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    $user = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $retype = $_POST['retype'];

    if($pass == $retype){

        $hashPassword = password_hash($pass, PASSWORD_DEFAULT);

        // default is_active = 0
        $sql = "INSERT INTO emp(name,email,password,is_active) VALUES('$user','$email','$hashPassword',0)";

        if(mysqli_query($connection, $sql)){
            header("Location: login.php");
            
        } else {
            echo "<p style='text-align:center; color:red;'>Something went wrong ❌</p>";
        }

    } else {
        echo "<p style='text-align:center; color:red;'>Password not matched ❌</p>";
    }
}
?>