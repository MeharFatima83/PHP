<?php
include 'connection.php';
session_start();

if(isset($_POST['account'])){

    $account=$_REQUEST['account'];

    $sql="select name, id from emp where id='$account' and is_active=1";
    $result=mysqli_query($connection, $sql);
    $data=mysqli_fetch_assoc($result);

    if($data)
    {
        if($_SESSION['accountNo']==$data['id'])
            echo "Same account not allowed";
        else
            echo $data['name'];

    }
    else
        echo "Account not found";
    
}
?>