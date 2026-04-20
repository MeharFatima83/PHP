<?php
session_start();
include 'connect.php';

if(isset($_POST['back'])){
    header("Location: form2.php");
    exit();
}

if(isset($_POST['submit'])){
    $fatherName = $_POST['fatherName'];
    $fatherOccupation = $_POST['fatherOccupation'];
    $contact = $_POST['contact'];

    $_SESSION['fatherName'] = $fatherName;
    $_SESSION['fatherOccupation'] = $fatherOccupation;
    $_SESSION['contact'] = $contact;

    $sql = "INSERT INTO formdata(username,MobNo,email,highschool,intermediate,graduation,fathername,fatherOccupation,contact)
    VALUES ('".$_SESSION['username']."','".$_SESSION['MobNo']."','".$_SESSION['email']."','".$_SESSION['highSchool']."','".$_SESSION['intermediate']."','".$_SESSION['graduation']."','".$_SESSION['fatherName']."','".$_SESSION['fatherOccupation']."','".$_SESSION['contact']."')";

    if(mysqli_query($connect,$sql)){
        echo "<script>
        alert(' Data inserted successfully');
        window.location.href='form1.php';
        </script>";
        session_destroy(); // reset form
    } else {
        echo "<script>alert(' Error: ".mysqli_error($connect)."');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form 3</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #232526, #414345);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

form {
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    width:300px;
}

h1 {
    position:absolute;
    top:40px;
    color:white;
}
input:invalid {
    border: 2px solid red;
}

input:valid {
    border: 2px solid green;
}

input {
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:1px solid #ccc;
}

input[type="submit"] {
    background:#333;
    color:white;
    border:none;
    cursor:pointer;
}

input[name="back"] {
    background:#ff4d4d;
}
</style>

</head>
<body>

<h1>Personal Info</h1>

<form method="POST">
    <input type="text" name="fatherName" placeholder="Father Name"
        value="<?php echo $_SESSION['fatherName'] ?? ''; ?>">

    <input type="text" name="fatherOccupation" placeholder="Occupation"
        value="<?php echo $_SESSION['fatherOccupation'] ?? ''; ?>">

   <input type="tel" name="contact" placeholder="Contact"
       pattern="[0-9]{10}" required
       value="<?php echo $_SESSION['contact'] ?? ''; ?>">

    <input type="submit" name="back" value="Back">
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>