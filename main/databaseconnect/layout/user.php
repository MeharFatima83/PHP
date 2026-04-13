<?php
session_start();
if(isset($_SESSION['user-type'])){

if($_SESSION['user-type']==0){

include 'connection.php';
include 'header.php';

$sql = "select availableBalance from usertransaction where userId='$_SESSION[accountNo]' order by transactionDate desc";
$ava = mysqli_query($connection, $sql);
$available = mysqli_fetch_row($ava);

// Last Credit
$sql = "SELECT transactionAmount FROM usertransaction 
        WHERE userId='$_SESSION[accountNo]' 
        AND transactionType='credit' 
        ORDER BY transactionDate DESC LIMIT 1";
$lc = mysqli_query($connection, $sql);
$LastC = mysqli_fetch_row($lc);

// Last Debit
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

<body style="margin:0;font-family:Arial;">

<!-- space for header -->
<div style="margin-top:70px;"></div>

<!-- Background same as home -->
<div style="
width:100%;
height:calc(100vh - 70px);
position:relative;
overflow:hidden;
">

<!-- Background Image -->
<img src="https://images.unsplash.com/photo-1601597111158-2fceff292cdc"
style="width:100%;height:100%;object-fit:cover;">

<!-- Overlay -->
<div style="
position:absolute;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
">



<!-- Cards -->
<div style="
display:flex;
gap:30px;
flex-wrap:wrap;
justify-content:center;
">

<!-- Available Balance -->
<div style="
background:white;
padding:20px;
width:220px;
text-align:center;
border-radius:12px;
box-shadow:0px 0px 15px rgba(0,0,0,0.3);
">
<h3>Available Balance</h3>
<p style="font-size:22px;font-weight:bold;color:yellow">
₹<?php echo ($available[0] ?? 0); ?>
</p>
</div>
        
<!-- Credit -->
<div style="
background:white;
padding:20px;
width:220px;
text-align:center;
border-radius:12px;
box-shadow:0px 0px 15px rgba(0,0,0,0.3);
">
<h3>Credit Amount</h3>
<p style="font-size:22px;font-weight:bold;color:green;">
₹<?php echo ($LastC[0] ?? 0); ?>
</p>
</div>

<!-- Debit -->
<div style="
background:white;
padding:20px;
width:220px;
text-align:center;
border-radius:12px;
box-shadow:0px 0px 15px rgba(0,0,0,0.3);
">
<h3>Debit Amount</h3>
<p style="font-size:22px;font-weight:bold;color:red;">
₹<?php echo ($LastD[0] ?? 0); ?>
</p>
</div>

</div>

</div>
</div>

</body>
</html>

<?php
include 'footer.php';
}
else{
    header("location: admin.php");
}
}
else{
    header("location: login.php");
}
?>