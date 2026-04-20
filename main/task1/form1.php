




 <?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username=$_POST['username'];//input fiels se data varible me store krna
    $MobNo=$_POST['MobNo'];
    $email=$_POST['email'];
    $_SESSION['username']=$username;//variable se session me data store krna taki throwout pages access kr sake
    $_SESSION['MobNo']=$MobNo;
    $_SESSION['email']=$email;

    header("Location: form2.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form 1</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #667eea, #764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

form {
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    width:300px;
}

h1 {
    position:absolute;
    top:40px;
    color:white;
}

input {
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:1px solid #ccc;
}
input:invalid {
    border: 2px solid red;
}

input:valid {
    border: 2px solid green;
}

input[type="submit"] {
    background:#667eea;
    color:white;
    border:none;
    cursor:pointer;
}
</style>

</head>

<body>

<h1>User Information</h1>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Enter name"
        value="<?php echo $_SESSION['username'] ?? ''; ?>">

   <input type="tel" name="MobNo" placeholder="Enter mobile"
       pattern="[0-9]{10}" required
       value="<?php echo $_SESSION['MobNo'] ?? ''; ?>">

    <input type="email" name="email" placeholder="Enter email"
        value="<?php echo $_SESSION['email'] ?? ''; ?>" required>

    <input type="submit" value="Next">
</form>

</body>
</html>