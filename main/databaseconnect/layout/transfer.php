<?php
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['user-type'])){
    if($_SESSION['user-type']==0){

include "header.php";
include "connection.php";
?>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(to right, #667eea, #764ba2);
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    margin-top: 80px;
}

form {
    background: #fff;
    padding: 25px;
    width: 350px;
    border-radius: 12px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 6px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background: #2980b9;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

input[type="submit"]:hover {
    background: #1f6391;
}
</style>

<div class="container">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h2>Transfer Money</h2>

    <input type="number" id="accountNo" name='account' placeholder="Enter Receiver's ID" required>

    <input type="text" id="name" name='name' placeholder="Receiver Name" readonly>

    <input type="number" name='amount' placeholder="Enter Amount" required>

    <input type="submit" value="Transfer">
</form>
</div>

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $account=$_REQUEST['account'];
    $amount=$_REQUEST['amount'];

    $sql="select availableBalance from usertransaction where userId='$_SESSION[accountNo]' order by transactionDate desc limit 1 ";
    $senderBalance=mysqli_fetch_assoc(mysqli_query($connection,$sql));

    $sql1="select availableBalance from usertransaction where userId='$account' order by transactionDate desc limit 1 ";
    $receiverBalance=mysqli_fetch_assoc(mysqli_query($connection,$sql1));

    if($senderBalance['availableBalance']>$amount){
        
        // sender
        $updatedSenderBalance=$senderBalance['availableBalance']-$amount;
        $transSenderId='debit'.rand(111,999);

        $sqlSender="insert into usertransaction(userId,transactionId,transactionType,availableBalance,transactionAmount) 
        values('$_SESSION[accountNo]','$transSenderId','debit','$updatedSenderBalance','$amount')";
        mysqli_query($connection,$sqlSender);

        // receiver
        $updatedReceiverBalance=$receiverBalance['availableBalance']+$amount;
        $transReceiverId='credit'.rand(111,999);

        $sqlReceiver="insert into usertransaction(userId,transactionId,transactionType,availableBalance,transactionAmount) 
        values('$account','$transReceiverId','credit','$updatedReceiverBalance','$amount')";
        mysqli_query($connection,$sqlReceiver);

        header("location:user.php");
    }
    else{
        echo "Insufficient Data";
    }
}

}
else
    header("location:admin.php");

}
else
    header("location:login.php");
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $('#accountNo').keyup(function(){
        let account = $(this).val();

        $.ajax({
            url: 'accountVerify.php',
            method: "POST",
            data: { account: account },
            success: function(result){
                if(result){
                    $('#name').val(result);
                }
            }
        });
    });
});
</script>