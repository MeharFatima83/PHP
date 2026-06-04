<?php
include "connection.php";

$sql = "SELECT * FROM registration";
$result = mysqli_query($conn, $sql);

if($result){
    $store = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($store);
} else {
    echo json_encode(["error" => "Query failed"]);
}
?>

