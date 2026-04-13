<?php
session_start();

if(isset($_SESSION['user-type'])){

    if($_SESSION['user-type']==1){

        include 'connection.php';
        include 'adminheader.php';

        $myRole = $_SESSION['superuser'];

        // stats
        $totalUsers = mysqli_fetch_row(mysqli_query($connection,"SELECT COUNT(*) FROM emp WHERE superuser=0"))[0];
        $pending = mysqli_fetch_row(mysqli_query($connection,"SELECT COUNT(*) FROM emp WHERE is_active=0 AND superuser=0"))[0];
        $totalAdmins = mysqli_fetch_row(mysqli_query($connection,"SELECT COUNT(*) FROM emp WHERE superuser IN (1,2)"))[0];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>

<body style="
margin:0;
font-family:Arial;
background:linear-gradient(135deg,#667eea,#764ba2);
min-height:100vh;
">

<!-- MAIN CONTENT -->
<div style="
margin-left:220px;
padding:20px;
background:rgba(255,255,255,0.15);
backdrop-filter:blur(10px);
min-height:100vh;
">

<h2 style="margin-bottom:10px;color:white;">Dashboard</h2>

<!-- 🔥 CARDS -->
<div style="display:flex;gap:20px;flex-wrap:wrap;margin-top:20px;">

<!-- Total Users -->
<div style="
background:linear-gradient(135deg,#ff9a9e,#fad0c4);
color:black;
padding:25px;
width:220px;
border-radius:15px;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
transition:0.3s;
"
onmouseover="this.style.transform='scale(1.05)'" 
onmouseout="this.style.transform='scale(1)'">
<h3>Total Users</h3>
<p style="font-size:28px;font-weight:bold;"><?php echo $totalUsers; ?></p>
</div>

<!-- Pending Users -->
<div style="
background:linear-gradient(135deg,#f7971e,#ffd200);
color:black;
padding:25px;
width:220px;
border-radius:15px;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
transition:0.3s;
"
onmouseover="this.style.transform='scale(1.05)'" 
onmouseout="this.style.transform='scale(1)'">
<h3>Pending Users</h3>
<p style="font-size:28px;font-weight:bold;"><?php echo $pending; ?></p>
</div>

<!-- Total Admins -->
<?php if($myRole == 2){ ?>
<div style="
background:linear-gradient(135deg,#43e97b,#38f9d7);
color:black;
padding:25px;
width:220px;
border-radius:15px;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
transition:0.3s;
"
onmouseover="this.style.transform='scale(1.05)'" 
onmouseout="this.style.transform='scale(1)'">
<h3>Total Admins</h3>
<p style="font-size:28px;font-weight:bold;"><?php echo $totalAdmins; ?></p>
</div>
<?php } ?>

</div>

<!-- 🔥 QUICK ACTIONS -->
<div style="
margin-top:30px;
background:rgba(255,255,255,0.9);
padding:25px;
border-radius:15px;
box-shadow:0 10px 20px rgba(0,0,0,0.1);
">

<h3 style="margin-bottom:15px;">Quick Actions</h3>

<?php if($myRole == 2){ ?>

<a href="adminManagement.php" style="
display:inline-block;
margin:10px;
padding:12px 20px;
background:linear-gradient(135deg,#36d1dc,#5b86e5);
color:white;
text-decoration:none;
border-radius:8px;
font-weight:bold;
">
Manage Admins
</a>

<?php } ?>

<a href="accountApproval.php" style="
display:inline-block;
margin:10px;
padding:12px 20px;
background:linear-gradient(135deg,#11998e,#38ef7d);
color:white;
text-decoration:none;
border-radius:8px;
font-weight:bold;
">
Approve Users
</a>

</div>

</div>

</body>
</html>

<?php
    }
    else{
        header("location: user.php");
    }

}
else{
    header("location: login.php");
}
?>