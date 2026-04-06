<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" ><br><br>
        <input type="password" name="password" placeholder="Password"> <br><br>
        <input type="submit" name="submit" value="Login">
    </form>

<?php
if (isset($_REQUEST['submit'])){
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];

if($username=="chetu" && $password=="12345"){
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['time']=time();
    setcookie("loginId", 10,(time()+86400)*30, "/"); 
    header("location:dashboard.php");
    
}
else{
    echo "hi guest";
}
}
?>


</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login UI</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 320px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s;
}

input:focus {
    border-color: #667eea;
    box-shadow: 0 0 5px rgba(102,126,234,0.5);
}

button {
    width: 100%;
    padding: 12px;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
}

button:hover {
    background: #5a67d8;
}

.link {
    margin-top: 15px;
    display: block;
    color: #667eea;
    text-decoration: none;
}

.link:hover {
    text-decoration: underline;
}
  </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="submit">Login</button>
    </form>
</div>

</body>
</html>


