<?php
 include 'connection.php';
?>
<form action ="" method="POST">
    
    <input type="number" name="id" placeholder="Enter your ID"><br>
    <input type="text" name="name" placeholder="Enter your name"><br>
    <input type="text" name="email" placeholder="Enter your email"><br>
    <input type="text" name="password" placeholder="Enter your password"><br>   
    <input type="text" name="rPassword" placeholder="Re-enter your password"><br>   
    <input type="submit">
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
   
    
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $R_password=$_REQUEST['rPassword'];
    if($password==$R_password){
        echo "User registred successfully";
    }
    else{
        echo "Password does not match";
    }

}
?>
