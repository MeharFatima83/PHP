<?php
session_start();

if(!isset($_SESSION['accountNo'])){
    header("Location: login.php");
    exit();
}

include 'connection.php';

$accountNo = $_SESSION['accountNo'];

// ✅ Fetch existing PIN
$sql = "SELECT pin FROM emp WHERE id='$accountNo'";
$res = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($res);

// ❌ Block only normal access (allow reset)
if(!empty($data['pin']) && !isset($_GET['reset'])){
    $_SESSION['error'] = "PIN already set";
    header("Location: index.php");
    exit();
}

// ✅ FORM PROCESS
if(isset($_POST['setpin'])){

    $pin = $_POST['pin'];
    $confirmPin = $_POST['confirmPin'];

    // ❌ Validation
    if(strlen($pin) != 4 || !is_numeric($pin)){
        $_SESSION['error'] = "PIN must be 4 digits";
        header("Location: setpin.php".(isset($_GET['reset'])?"?reset=true":""));
        exit();
    }

    if($pin != $confirmPin){
        $_SESSION['error'] = "PIN does not match";
        header("Location: setpin.php".(isset($_GET['reset'])?"?reset=true":""));
        exit();
    }

    // 🔐 Hash PIN
    $hashedPin = password_hash($pin, PASSWORD_DEFAULT);

    $update = "UPDATE emp SET pin='$hashedPin' WHERE id='$accountNo'";

    if(mysqli_query($connection, $update)){
        $_SESSION['success'] = isset($_GET['reset']) 
            ? "PIN Reset Successfully" 
            : "PIN Set Successfully";

        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Error setting PIN";
        header("Location: setpin.php".(isset($_GET['reset'])?"?reset=true":""));
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Set PIN</title>
</head>

<body style="margin:0;font-family:Arial;background:linear-gradient(to right,#43cea2,#185a9d);">

<div style="width:350px;margin:120px auto;background:white;padding:25px;border-radius:10px;box-shadow:0 0 15px rgba(0,0,0,0.2);">

<h2 style="text-align:center;margin-bottom:20px;">
<?php echo isset($_GET['reset']) ? "Reset Your PIN" : "Set Your PIN"; ?>
</h2>

<!-- ✅ MESSAGE -->
<?php
if(isset($_SESSION['error'])){
    echo "<div style='background:#ff4d4d;color:white;padding:10px;text-align:center;margin-bottom:10px;border-radius:5px;'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
}
?>

<form method="POST">

<input type="password" name="pin" placeholder="Enter 4-digit PIN" required
style="width:100%;padding:10px;margin-bottom:10px;border-radius:5px;border:1px solid #ccc;">

<input type="password" name="confirmPin" placeholder="Confirm PIN" required
style="width:100%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;">

<button type="submit" name="setpin"
style="width:100%;padding:10px;background:#28a745;color:white;border:none;border-radius:5px;">
Set PIN
</button>

<p style="text-align:center;margin-top:10px;">
<a href="setpin.php?reset=true">Forgot PIN? Reset here</a>
</p>

</form>

</div>

</body>
</html>