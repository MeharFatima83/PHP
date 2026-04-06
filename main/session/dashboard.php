<!-- Dashboard UI -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f6f9;
}

.navbar {
    background: #667eea;
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
}

.container2 {
    padding: 30px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.logout-btn {
    background: red;
    color: white;
    padding: 8px 15px;
    border-radius: 6px;
    text-decoration: none;
}

.logout-btn:hover {
    background: darkred;
}
</style>
</head>
<body>

<div class="navbar">
    <div>Dashboard</div>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

<div class="container2">
    <div class="card">
        <h2>Welcome User 🎉</h2>
        <p>You are successfully logged in.</p>
    </div>
</div>

</body>
</html>




<?php
session_start();
$isLoggedIn = ((isset($_SESSION['username'])?? false)) || (isset($_COOKIE['loginId']) && $_COOKIE['loginId'] == 10);
//browser close kr diya to session me username gayab ho gya to or wli condition chlegi
// if (isset($_SESSION['username']) && isset($_SESSION['time']) && (time() - $_SESSION['time'] < 10)) {
    if($isLoggedIn){
        $p=isset($_SESSION['username']) ? $_SESSION['username'] : "login successful";//agr username session me hai to whi le lega  ?? ka mtlb hai agr username exist kre to whi le lo wrna dusra side wla
        echo $p;
    // echo "hi " . $_SESSION['username'];
    ?>
    <br>
    <a href="logout.php">Logout</a>
    <?php

} else {
    unset($_SESSION['username']);
    echo "hi guest";
}
?>