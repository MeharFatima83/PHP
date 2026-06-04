
<?php
$conn = mysqli_connect("localhost","root","","database1");

$id = $_POST['id'];

$sql = "SELECT * FROM registration WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>