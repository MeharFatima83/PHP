<?php
session_start();

if(isset($_SESSION['user'])){

include "connection.php";

/* ================= ADD ADMIN ================= */
if(isset($_POST['addAdmin'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $insert = "INSERT INTO emp(name,email,password,superuser,is_active)
               VALUES('$name','$email','$pass','$role',1)";
    mysqli_query($connection,$insert);
}

/* ================= UPDATE ADMIN ================= */
if(isset($_POST['updateAdmin'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $update = "UPDATE emp SET name='$name',email='$email',superuser='$role' WHERE id='$id'";
    mysqli_query($connection,$update);
}

/* ================= ACTIVATE / DEACTIVATE ================= */
if(isset($_GET['status'])){
    $id = $_GET['id'];
    $status = $_GET['status'];

    mysqli_query($connection,"UPDATE emp SET is_active='$status' WHERE id='$id'");
}

/* ================= FETCH ADMINS ================= */
$sql = "SELECT * FROM emp WHERE superuser IN (1,2)";
$data = mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Management</title>
</head>

<body style="margin:0;font-family:Arial;background:#f4f4f9;">

<?php include "adminheader.php"; ?>

<div style="margin-left:220px;padding:20px;">

<h2>Admin Management</h2>

<!-- ================= ADD ADMIN ================= -->
<div style="background:white;padding:15px;border-radius:10px;margin-bottom:20px;box-shadow:0 0 8px rgba(0,0,0,0.1);">
<h3>Add Admin</h3>

<form method="POST">
<input type="text" name="name" placeholder="Name" required style="width:100%;padding:8px;margin:5px 0;">
<input type="email" name="email" placeholder="Email" required style="width:100%;padding:8px;margin:5px 0;">
<input type="password" name="password" placeholder="Password" required style="width:100%;padding:8px;margin:5px 0;">

<select name="role" style="width:100%;padding:8px;margin:5px 0;">
    <option value="1">Admin</option>
    <option value="2">Super Admin</option>
</select>

<button type="submit" name="addAdmin"
style="padding:8px 15px;background:#27ae60;color:white;border:none;border-radius:5px;">
Add Admin
</button>
</form>
</div>

<!-- ================= ADMIN LIST ================= -->
<div style="background:white;padding:15px;border-radius:10px;box-shadow:0 0 8px rgba(0,0,0,0.1);">

<table style="width:100%;border-collapse:collapse;text-align:center;">

<tr style="background:#667eea;color:white;">
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<tr style="border-bottom:1px solid #ddd;">
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>
<?php echo ($row['superuser']==2) ? "Super Admin" : "Admin"; ?>
</td>

<td>
<?php echo ($row['is_active']) ? 
"<span style='color:green;'>Active</span>" : 
"<span style='color:red;'>Inactive</span>"; ?>
</td>

<td>

<!-- Activate / Deactivate -->
<?php if($row['is_active']){ ?>
<a href="?id=<?php echo $row['id']; ?>&status=0"
style="background:red;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;">
Deactivate
</a>
<?php } else { ?>
<a href="?id=<?php echo $row['id']; ?>&status=1"
style="background:green;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;">
Activate
</a>
<?php } ?>

&nbsp;

<!-- EDIT BUTTON -->
<button onclick="editAdmin(<?php echo $row['id']; ?>,'<?php echo $row['name']; ?>','<?php echo $row['email']; ?>','<?php echo $row['superuser']; ?>')"
style="padding:5px 10px;background:#2980b9;color:white;border:none;border-radius:5px;">
Edit
</button>

</td>
</tr>

<?php } ?>

</table>
</div>

</div>

<!-- ================= EDIT MODAL ================= -->
<div id="editBox" style="
display:none;
position:fixed;
top:30%;
left:50%;
transform:translate(-50%,-50%);
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px black;
">

<form method="POST">
<input type="hidden" name="id" id="eid">

<input type="text" name="name" id="ename" placeholder="Name" required style="width:100%;padding:8px;margin:5px 0;">
<input type="email" name="email" id="eemail" placeholder="Email" required style="width:100%;padding:8px;margin:5px 0;">

<select name="role" id="erole" style="width:100%;padding:8px;margin:5px 0;">
    <option value="1">Admin</option>
    <option value="2">Super Admin</option>
</select>

<button type="submit" name="updateAdmin"
style="padding:8px 15px;background:#27ae60;color:white;border:none;border-radius:5px;">
Update
</button>

<button type="button" onclick="closeBox()" style="padding:8px;">Cancel</button>

</form>
</div>

<script>
function editAdmin(id,name,email,role){
    document.getElementById('editBox').style.display='block';
    document.getElementById('eid').value=id;
    document.getElementById('ename').value=name;
    document.getElementById('eemail').value=email;
    document.getElementById('erole').value=role;
}

function closeBox(){
    document.getElementById('editBox').style.display='none';
}
</script>
<h2>active admin</h2>
</body>
</html>

<?php
}else{
    header("location:login.php");
}
?>