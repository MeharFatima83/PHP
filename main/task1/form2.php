

    <?php
session_start();

if(isset($_POST['back'])){
    header("Location: form1.php");
    exit();
}

if(isset($_POST['next'])){
        $highSchool=$_POST['highSchool'];
    $intermediate=$_POST['intermediate'];
    $graduation=$_POST['graduation'];
    $_SESSION['highSchool']=$highSchool;
    $_SESSION['intermediate']=$intermediate;
    $_SESSION['graduation']=$graduation;

    header("Location: form3.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form 2</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #11998e, #38ef7d);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

form {
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    width:300px;
}

h1 {
    position:absolute;
    top:40px;
    color:white;
}

input {
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:1px solid #ccc;
}

input[type="submit"] {
    background:#11998e;
    color:white;
    border:none;
    cursor:pointer;
}

input[name="back"] {
    background:#ff6b6b;
}
</style>

</head>
<body>

<h1>Academic Info</h1>

<form method="POST">
    <input type="text" name="highSchool" placeholder="High School" value="<?php echo $_SESSION['highSchool'] ?? ''; ?>">
    <input type="text" name="intermediate" placeholder="Intermediate" value="<?php echo $_SESSION['intermediate'] ?? ''; ?>">
    <input type="text" name="graduation" placeholder="Graduation" value="<?php echo $_SESSION['graduation'] ?? ''; ?>">
    
    <input type="submit" name="back" value="Back">
    <input type="submit" name="next" value="Next">
</form>

</body>
</html>