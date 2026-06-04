<?php
include 'db.php';
header("Access-Control-Allow-Origin:*");//used to take all request which is present in this page but it is not secure
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$method=$_SERVER['REQUEST_METHOD'];
if($method=="GET"){
    global $conn;
    $arr=[];
    $sql="select * from student";
    $data=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($data)){
        $arr[]=$row;
    }
    echo json_encode($arr);
}
else if($method=='POST'){
   global $conn;
   $rawData=file_get_contents("php://input");
   $data=json_decode($rawData);
   $sql="insert into student(name,email,mobile)values('$data->name','$data->email','$data->mobile')";
   if(mysqli_query($conn,$sql)){
    echo json_encode(True);
   }
}
else if($method=="PUT"){
    global $conn;
    $rawData=file_get_contents("php://input");
    $data=json_decode($rawData);
    $sql="UPDATE  student  SET name='$data->name',email='$data->email',mobile='$data->mobile' where id='$data->id'";
    if(mysqli_query($conn,$sql)){
        echo json_encode(True);
    }
}
else if($method=="DELETE"){   
    global $conn;
    $id=$_REQUEST['id'];
    $sql="DELETE from student where id='$id' ";
    $data=mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)){
        echo json_encode(True);
    }
    else{
        echo json_encode(False);
    }
  
}

?>