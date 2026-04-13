<?php
session_start();

if(isset($_SESSION['user'])){

include "connection.php";
$sql = "select * from emp where superuser = 0";
$info = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Account Approval</title>
</head>

<body style="margin:0;font-family:Arial;background:#f4f4f9;">

<?php include "adminheader.php"; ?>

<!-- ✅ MAIN CONTENT -->
<div style="
margin-left:220px;
padding:20px;
">

<h2 style="margin:10px 0 15px 0;">Account Approval</h2>

<div style="
background:white;
padding:15px;
border-radius:10px;
box-shadow:0 0 8px rgba(0,0,0,0.1);
">

<table style="width:100%;border-collapse:collapse;text-align:center;">

<thead>
<tr style="background:#667eea;color:white;">
<th style="padding:10px;">ID</th>
<th style="padding:10px;">Name</th>
<th style="padding:10px;">Status</th>
<th style="padding:10px;">Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($info)){ ?>

<tr style="border-bottom:1px solid #ddd;">
<td style="padding:8px;"><?php echo $row['id']; ?></td>

<td style="padding:8px;"><?php echo $row['name']; ?></td>

<td style="padding:8px;">
<?php echo ($row['is_active']) 
? "<span style='color:green;font-weight:bold;'>Active</span>" 
: "<span style='color:red;font-weight:bold;'>Inactive</span>"; ?>
</td>

<td style="padding:8px;">

<a href="approved.php?id=<?php echo $row['id'].'1'; ?>" 
style="padding:5px 10px;background:#27ae60;color:white;text-decoration:none;border-radius:5px;">
Approve
</a>

&nbsp;

<a href="approved.php?id=<?php echo $row['id'].'0'; ?>" 
style="padding:5px 10px;background:#e74c3c;color:white;text-decoration:none;border-radius:5px;">
Reject
</a>

</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>

</body>
</html>

<?php
} else {
header("location:login.php");
exit();
}
?>