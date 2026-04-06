<?php
include 'connection.php';

$id=$_REQUEST['id'];

$status=$id[-1];
$update=substr($id,0,strlen($id)-1);
$sql="update emp set is_active=$status where id=$update";

// echo "$status";
// echo "$update";

if(mysqli_query($connection,$sql))
{
    header("Location: accountApproval.php");
}

?>
