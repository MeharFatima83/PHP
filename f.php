
<?php $captcha=rand(111,999);?>
<form method='POST' action=' '>
    <input type='text' name='username' placeholder='Enter your name'><br><br>
    
    <input type=number name='MobNo' placeholder='Enter your mob no'><br><br>
    <input type='text' name='password' placeholder="enter your password"><br><br>
    
    <label for='captcha'>Captcha: <?php echo $captcha; ?></label><br><br>
    
     <input type='hidden' name='realcaptcha' value="<?php echo $captcha; ?>">
    <input type='number' name='captcha' placeholder="enter the captcha"><br><br>
    <input type='submit' name='submit' value='submit'>
</form>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $MobNo=$_POST['MobNo'];
    $password=$_POST['password'];
    $captcha=$_POST['captcha'];
    $realcaptcha=$_POST['realcaptcha'];
    if($realcaptcha==$captcha){
        echo "Success";
     }
    else{
        echo "Failure";
    }
 
}
?>
   



