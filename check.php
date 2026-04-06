<?php
if(isset($_REQUEST['username'])){
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $captcha=$_REQUEST['captcha'];
    $realcaptcha=$_REQUEST['realcaptcha'];
    if($captcha==$realcaptcha)
    {
    echo $captcha ."is correct";
    }  
    else{
        echo $captcha ." not correct";
    }  
}
?>
<?php
print_r($_POST);
?>