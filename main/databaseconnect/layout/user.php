<?php

session_start();
if(isset($_SESSION['user-type'])){

if($_SESSION['user-type']==0){

include 'connection.php';
include 'header.php';

$sql = "select availableBalance from usertransaction where userId='$_SESSION[accountNo]' order by transactionDate desc";
$ava = mysqli_query($connection, $sql);//structure store kr rha hai hai $ava me

$available = mysqli_fetch_row($ava);//ab $available me available balance store ho gya hai , mysqli_fetch_row -> pura ek array return krta hai ab uss array me sirf available balnace hi hai to whi print krega//
// last credited 
$sql = "SELECT transactionAmount FROM usertransaction 
        WHERE userId='$_SESSION[accountNo]' 
        AND transactionType='credit' 
        ORDER BY transactionDate DESC LIMIT 1";

$lc = mysqli_query($connection, $sql);
$LastC = mysqli_fetch_row($lc);

$sql = "SELECT transactionAmount FROM usertransaction 
        WHERE userId='$_SESSION[accountNo]' 
        AND transactionType='debit' 
        ORDER BY transactionDate DESC LIMIT 1";

$ld = mysqli_query($connection, $sql);

$LastD = mysqli_fetch_row($ld);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>

<body style="font-family: Arial; background: linear-gradient(to right, #667eea, #764ba2); margin:0; padding:0;">

    <!-- Top Balance Text -->
    <p style="text-align:center; color:white; font-weight:bold; margin-top:30px; font-size:18px;">
        <!-- Available Balance: ₹<?php echo ($available[0] ?? 0); ?> -->
    </p>

    <!-- Cards -->
    <div style="display:flex; justify-content:space-around; margin-top:50px;">

        <!-- Available Balance -->
        <div style="background:#f1f5ff; padding:20px; width:220px; text-align:center; border-radius:12px; box-shadow:0px 0px 15px rgba(0,0,0,0.2);">
            <h3 style="margin-bottom:10px;">Available Balance</h3>
            <p style="font-size:22px; font-weight:bold; color:#333;">
                ₹<?php echo ($available[0] ?? 0); ?>
            </p>
        </div>

        <!-- Credit Amount -->
        <div style="background:#e6fffa; padding:20px; width:220px; text-align:center; border-radius:12px; box-shadow:0px 0px 15px rgba(0,0,0,0.2);">
            <h3 style="margin-bottom:10px;">Credit Amount</h3>
            <p style="font-size:22px; font-weight:bold; color:green;">
                ₹<?php echo ($LastC[0] ?? 0); ?>
            </p>
        </div>

        <!-- Debit Amount -->
        <div style="background:#fff5f5; padding:20px; width:220px; text-align:center; border-radius:12px; box-shadow:0px 0px 15px rgba(0,0,0,0.2);">
            <h3 style="margin-bottom:10px;">Debit Amount</h3>
            <p style="font-size:22px; font-weight:bold; color:red;">
                ₹<?php echo ($LastD[0] ?? 0); ?>
            </p>
        </div>

    </div>

</body>
</html>

<?php
include 'footer.php';
?>
<?php
}
else{
    header("location: admin.php");
}
}
else{
    header("location: login.php");//agr session set nhi hai to login page pr bhej dega
}
?>