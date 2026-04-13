<?php
session_start();

if(!isset($_SESSION['accountNo'])){
    header("Location: login.php");
    exit();
}

include 'connection.php';
include 'header.php';

$accountNo = $_SESSION['accountNo'];

//  Account Name fetch
$sqlUser = "SELECT name FROM emp WHERE id='$accountNo'";
$resUser = mysqli_query($connection, $sqlUser);

if($resUser && mysqli_num_rows($resUser) > 0){
    $userData = mysqli_fetch_assoc($resUser);
    $accountName = $userData['name'];
} else {
    $accountName = "User";
}

//  FORM PROCESS
if(isset($_POST['withdraw'])){

    $amount = $_POST['amount'];
    $pin = $_POST['pin'];

    //  PIN fetch
    $checkPin = "SELECT pin FROM emp WHERE id='$accountNo'";
    $resPin = mysqli_query($connection, $checkPin);
    $rowPin = mysqli_fetch_assoc($resPin);

    //  PIN not set
    if(empty($rowPin['pin'])){
        $_SESSION['error'] = "Please set your PIN first";
        header("Location: setpin.php");
        exit();
    }

    //  Wrong PIN (HASH VERIFY)
    if(!password_verify($pin, $rowPin['pin'])){
        $_SESSION['error'] = "Wrong PIN";
        header("Location: withdraw.php");
        exit();
    }

    // Invalid amount
    if(!is_numeric($amount) || $amount <= 0){
        $_SESSION['error'] = "Enter valid amount";
        header("Location: withdraw.php");
        exit();
    }

    //  Latest balance fetch
    $sql = "SELECT * FROM usertransaction 
            WHERE userId='$accountNo' 
            ORDER BY transactionDate DESC 
            LIMIT 1";

    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);

    if(!$data){
        $_SESSION['error'] = "No transaction found";
        header("Location: withdraw.php");
        exit();
    }

    $balance = $data['availableBalance'];

    //  Insufficient balance
    if($amount > $balance){
        $_SESSION['error'] = "Insufficient Balance";
        header("Location: withdraw.php");
        exit();
    }

    //  Withdraw process
    $newBalance = $balance - $amount;
    $transId = 'debit'.rand(111,999);

    $insert = "INSERT INTO usertransaction 
    (userId, availableBalance, transactionId, transactionDate, transactionType, transactionAmount) 
    VALUES 
    ('$accountNo','$newBalance','$transId',NOW(),'debit','$amount')";

    if(mysqli_query($connection, $insert)){
        $_SESSION['success'] = "Withdraw Successful";
        header("Location: user.php");
        exit();
    } else {
        $_SESSION['error'] = "Transaction Failed";
        header("Location: withdraw.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Withdraw Money</title>
</head>

<body style="margin:0;font-family:Arial;background:linear-gradient(to right,#667eea,#764ba2);">

<div style="
width:350px;
margin:120px auto;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 0 15px rgba(0,0,0,0.2);
">

<h2 style="text-align:center;margin-bottom:20px;">Withdraw Money</h2>

<!-- ✅ ERROR MESSAGE -->
<?php
if(isset($_SESSION['error'])){
    echo "<div style='
        background:#ff4d4d;
        color:white;
        padding:10px;
        text-align:center;
        margin-bottom:10px;
        border-radius:5px;
    '>
        ".$_SESSION['error']."
    </div>";
    unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
    echo "<div style='
        background:#28a745;
        color:white;
        padding:10px;
        text-align:center;
        margin-bottom:10px;
        border-radius:5px;
    '>
        ".$_SESSION['success']."
    </div>";
    unset($_SESSION['success']);
}
?>

<form method="POST">

<input type="text" 
value="<?php echo $accountNo; ?>"
style="width:100%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;" readonly>

<input type="text" 
value="<?php echo $accountName; ?>"
style="width:100%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;" readonly>

<input type="number" name="amount" placeholder="Enter Amount"
style="width:100%;padding:10px;margin-bottom:15px;border-radius:5px;border:1px solid #ccc;" required>

<input type="password" name="pin" placeholder="Enter PIN"
style="width:100%;padding:10px;margin-bottom:20px;border-radius:5px;border:1px solid #ccc;" required>

<button type="submit" name="withdraw"
style="width:100%;padding:10px;background:#ff4d6d;color:white;border:none;border-radius:5px;font-weight:bold;cursor:pointer;">
Withdraw
</button>

</form>

<!-- 🔐 Reset PIN -->
<p style="text-align:center;margin-top:10px;">
    <a href="setpin.php" style="color:#007bff;text-decoration:none;">
        Forgot PIN? Reset here
    </a>
</p>

</div>

</body>
</html>