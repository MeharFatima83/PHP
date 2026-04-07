<?php
session_start();

if(!isset($_SESSION['accountNo'])){
    header("Location: login.php");
    exit();
}

include 'connection.php';

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
if(isset($_POST['deposit'])){

    $amount = $_POST['amount'];
    $pin = $_POST['pin'];

    // 🔐 PIN fetch
    $checkPin = "SELECT pin FROM emp WHERE id='$accountNo'";
    $resPin = mysqli_query($connection, $checkPin);
    $rowPin = mysqli_fetch_assoc($resPin);

    //  PIN not set
    if(empty($rowPin['pin'])){
        echo "<script>alert('Please set your PIN first'); window.location.href='setpin.php';</script>";
        exit();
    }

    //  Wrong PIN
    if($pin != $rowPin['pin']){
        echo "<script>alert('Wrong PIN');</script>";
        exit();
    }

    //  Latest balance
    $sql = "SELECT * FROM usertransaction 
            WHERE userId='$accountNo' 
            ORDER BY transactionDate DESC 
            LIMIT 1";

    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);

    $balance = $data ? $data['availableBalance'] : 0;

    //  Validation
    if($amount <= 0 || !is_numeric($amount)){
        echo "<script>alert('Invalid Amount');</script>";
    } 
    else {
         //unique transaction id generate karne ke liye uniqid function use kiya hai, jisse har transaction ka alag id milega. isliye prefix "txn_" diya hai taaki easily identify ho sake ki ye transaction id hai.kyuki duplicate transaction id se database me confusion ho sakta hai, isliye uniqid use kiya hai. aur true parameter dene se aur bhi unique id generate hota hai, jisme microseconds bhi include hota hai, isse chances of duplicate id aur bhi kam ho jata hai.
        $newBalance = $balance + $amount;
         $txnId = uniqid("txn_", true);

        //  Insert CREDIT
        $insert = "INSERT INTO usertransaction 
        (userId, availableBalance, transactionId, transactionDate, transactionType, transactionAmount) 
        VALUES ('$accountNo','$newBalance','$txnId',NOW(),'credit','$amount')";

        if(mysqli_query($connection, $insert)){
            echo "<script>alert('Deposit Successful'); window.location.href='user.php';</script>";
            exit();
        } else {
            echo "<script>alert('Transaction Failed');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Money</title>
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

<h2 style="text-align:center;margin-bottom:20px;">Deposit Money</h2>

<form method="POST" action="">

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

<button type="submit" name="deposit"
style="width:100%;padding:10px;background:#ff4d6d;color:white;border:none;border-radius:5px;font-weight:bold;cursor:pointer;">
Deposit
</button>

</form>

</div>

</body>
</html>
//phle form chla form me data aa gya account no aur name ka, ab form submit hone par data process hoga aur database me update hoga, baki code withdraw.php se milta julta hai, bas transaction type aur balance calculation me difference hai.