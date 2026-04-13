<?php
session_start();

if(!isset($_SESSION['accountNo'])){
    header("Location: login.php");
    exit();
}

include 'connection.php';

$accountNo = $_SESSION['accountNo'];

// ✅ Account Name fetch
$sqlUser = "SELECT name FROM emp WHERE id='$accountNo'";
$resUser = mysqli_query($connection, $sqlUser);

if($resUser && mysqli_num_rows($resUser) > 0){
    $userData = mysqli_fetch_assoc($resUser);
    $accountName = $userData['name'];
} else {
    $accountName = "User";
}

// ✅ FORM PROCESS
if(isset($_POST['deposit'])){

    $amount = $_POST['amount'];
    $pin = $_POST['pin'];

    // 🔐 PIN fetch
    $checkPin = "SELECT pin FROM emp WHERE id='$accountNo'";
    $resPin = mysqli_query($connection, $checkPin);
    $rowPin = mysqli_fetch_assoc($resPin);

    // ❌ PIN not set
    if(empty($rowPin['pin'])){
        $_SESSION['error'] = "Please set your PIN first";
        header("Location: setpin.php");
        exit();
    }

    // ❌ Wrong PIN
    if(!password_verify($pin, $rowPin['pin'])){
        $_SESSION['error'] = "Wrong PIN";
        header("Location: deposite.php");
        exit();
    }

    // ❌ Invalid amount
    if(!is_numeric($amount) || $amount <= 0){
        $_SESSION['error'] = "Enter valid amount";
        header("Location: deposite.php");
        exit();
    }

    // ✅ Latest balance
    $sql = "SELECT * FROM usertransaction 
            WHERE userId='$accountNo' 
            ORDER BY transactionDate DESC 
            LIMIT 1";

    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);

    $balance = $data ? $data['availableBalance'] : 0;

    $newBalance = $balance + $amount;
    $transId = 'credit'.rand(111,999);

    // ✅ Insert
    $insert = "INSERT INTO usertransaction 
    (userId, availableBalance, transactionId, transactionDate, transactionType, transactionAmount) 
    VALUES ('$accountNo','$newBalance','$transId',NOW(),'credit','$amount')";

    if(mysqli_query($connection, $insert)){
        $_SESSION['success'] = "Deposit Successful";
        header("Location: user.php");
        exit();
    } else {
        $_SESSION['error'] = "Transaction Failed";
        header("Location: deposite.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Money</title>
</head>

<body style="margin:0;font-family:Arial;background:linear-gradient(to right,#667eea,#764ba2);">

<div style="width:350px;margin:120px auto;background:white;padding:25px;border-radius:10px;box-shadow:0 0 15px rgba(0,0,0,0.2);">

<h2 style="text-align:center;margin-bottom:20px;">Deposit Money</h2>

<!-- ✅ Messages -->
<?php
if(isset($_SESSION['error'])){
    echo "<div style='background:#ff4d4d;color:white;padding:10px;text-align:center;margin-bottom:10px;border-radius:5px;'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
    echo "<div style='background:#28a745;color:white;padding:10px;text-align:center;margin-bottom:10px;border-radius:5px;'>".$_SESSION['success']."</div>";
    unset($_SESSION['success']);
}
?>

<form method="POST">

<input type="text" value="<?php echo $accountNo; ?>" readonly
style="width:100%;padding:10px;margin-bottom:10px;border-radius:5px;border:1px solid #ccc;">

<input type="text" value="<?php echo $accountName; ?>" readonly
style="width:100%;padding:10px;margin-bottom:10px;border-radius:5px;border:1px solid #ccc;">

<input type="number" name="amount" placeholder="Enter Amount" required
style="width:100%;padding:10px;margin-bottom:10px;border-radius:5px;border:1px solid #ccc;">

<input type="password" name="pin" placeholder="Enter PIN" required
style="width:100%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;">

<button type="submit" name="deposit"
style="width:100%;padding:10px;background:#ff4d6d;color:white;border:none;border-radius:5px;">
Deposit
</button>

</form>

<!-- 🔐 FIXED RESET LINK -->
<p style="text-align:center;margin-top:10px;">
    <a href="setpin.php?reset=true">Forgot PIN? Reset here</a>
</p>

</div>
</body>
</html>