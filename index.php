<?php
echo "Hello, Mehar Babyyy!";
?>

<form method="post" action="check.php">
 <input type="text" name="username" placeholder="Username"><br><br>
 <input type="password" name="password" placeholder="password"><br><br>
 <?php $captcha=rand(111,999);?>
 
 <label for="captcha">Captcha: <?php echo $captcha; ?></label><br><br>
 <input type="hidden" name="realcaptcha" value="<?php echo $captcha; ?>">
 <input type="text" name="captcha" placeholder="Enter Captcha" ><br><br>
 <input type="submit" value="Submit">
</form>
