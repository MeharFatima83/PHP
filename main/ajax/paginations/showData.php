<?php

$conn = mysqli_connect('localhost','root','','database1');

header('Content-Type: application/json');

$limit = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM registration LIMIT $offset,$limit";

$result = mysqli_query($conn,$sql);

$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

// Total Records
$totalRows = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) as total FROM registration")
)['total'];

$totalPages = ceil($totalRows / $limit);//30PAGE

echo json_encode([
    "data" => $data,
    "totalPages" => $totalPages
]);