<?php
session_start();

if(!isset($_SESSION['accountNo'])){
    header("Location: login.php");
    exit();
}

include 'connection.php';

$accountNo = $_SESSION['accountNo'];

// ✅ Check agar already PIN set hai
$sql = "SELECT pin FROM emp WHERE id='$accountNo'";
$res = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($res);

if(!empty($data['pin'])){
    echo "<script>alert('PIN already set'); window.location.href='index.php';</script>";
    exit();
}

// ✅ Form submit
if(isset($_POST['setpin'])){

    $pin = $_POST['pin'];
    $confirmPin = $_POST['confirmPin'];

    // Validation
    if(strlen($pin) != 4 || !is_numeric($pin)){
        echo "<script>alert('PIN must be 4 digits');</script>";
    }
    elseif($pin != $confirmPin){
        echo "<script>alert('PIN does not match');</script>";
    }
    else{
        $update = "UPDATE emp SET pin='$pin' WHERE id='$accountNo'";

        if(mysqli_query($connection, $update)){
            echo "<script>alert('PIN Set Successfully'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error setting PIN');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Set PIN</title>
</head>

<body style="margin:0;font-family:Arial;background:linear-gradient(to right,#43cea2,#185a9d);">

<div style="
width:350px;
margin:120px auto;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 0 15px rgba(0,0,0,0.2);
">

<h2 style="text-align:center;margin-bottom:20px;">Set Your PIN</h2>

<form method="POST">

<input type="password" name="pin" placeholder="Enter 4-digit PIN"
style="width:100%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;" required>

<input type="password" name="confirmPin" placeholder="Confirm PIN"
style="width:100%;padding:10px;margin-bottom:20px;border-radius:5px;border:1px solid #ccc;" required>

<button type="submit" name="setpin"
style="width:100%;padding:10px;background:#28a745;color:white;border:none;border-radius:5px;font-weight:bold;cursor:pointer;">
Set PIN
</button>

</form>

</div>

</body>
</html>