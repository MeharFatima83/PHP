<?php
session_start();

if(!isset($_SESSION['accountNo'])){
    header("Location: login.php");
    exit();
}

include 'connection.php';
include 'header.php';

$accountNo = $_SESSION['accountNo'];

// Account Name fetch from emp table
$sqlUser = "SELECT name FROM emp WHERE id='$accountNo'";
$resUser = mysqli_query($connection, $sqlUser);

if($resUser && mysqli_num_rows($resUser) > 0){
    $userData = mysqli_fetch_assoc($resUser);
    $accountName = $userData['name'];
} else {
    $accountName = "User";
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

</div>

</body>
</html>

<?php
if(isset($_POST['withdraw'])){

    $amount = $_POST['amount'];

    // ✅ Latest balance fetch
    $sql = "SELECT * FROM usertransaction 
            WHERE userId='$accountNo' 
            ORDER BY transactionDate DESC 
            LIMIT 1";

    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);

    if(!$data){
        echo "<script>alert('No transaction found');</script>";
        exit();
    }

    $balance = $data['availableBalance'];

    // ✅ Validation
    if($amount <= 0){
        echo "<script>alert('Invalid Amount');</script>";
    }
    elseif($amount > $balance){
        echo "<script>alert('Insufficient Balance');</script>";
    }
    else{
        $newBalance = $balance - $amount;
        $transId = 'debit'.rand(111,999);

        // ✅ Insert debit entry
     $insert = "INSERT INTO usertransaction 
      (userId, availableBalance, transactionId, transactionDate, transactionType, transactionAmount) 
      VALUES 
      ('$accountNo','$newBalance','$transId',NOW(),'debit','$amount')";

        if(mysqli_query($connection, $insert)){
            echo "<script>alert('Withdraw Successful'); window.location.href='user.php';</script>";
        } else {
            echo "<script>alert('Transaction Failed');</script>";
        }
    }
}
?>