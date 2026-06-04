<?php
include 'db.php';
header("Access-Control-Allow-Origin:*");//used to take all request which is present in this page but it is not secure
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$method=$_SERVER['REQUEST_METHOD'];
if($method=="GET"){
    global $conn;
    $_SESSION['id']=$_REQUEST['id'];
    $arr=[];
    $sql="select * from student where id='".$_SESSION['id']."'";
    $data=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($data)){
        $arr[]=$row;
    }
    echo json_encode($arr);
}
?>