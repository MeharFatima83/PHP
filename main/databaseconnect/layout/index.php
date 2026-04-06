<?php
include 'connection.php';
include 'header.php';
?>

<!-- Space for fixed header -->
<div style="margin-top:70px;"></div>

<!-- Hero Section -->
<div style="
width:100%;
height:calc(100vh - 70px);
position:relative;
overflow:hidden;
">

    <!-- Background Image -->
    <img src="https://images.unsplash.com/photo-1601597111158-2fceff292cdc"
    style="
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    ">

    <!-- Overlay Content -->
    <div style="
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    color:white;
    text-align:center;
    background:rgba(0,0,0,0.5);
    padding:30px;
    border-radius:10px;
    width:90%;
    max-width:500px;
    ">

        <h1 style="margin:0;font-size:34px;">
            Welcome to BalanceBook
        </h1>

        <p style="font-size:18px;margin:10px 0;">
            Safe, Secure & Fast Banking Experience
        </p>

        <a href="login.php" style="
        display:inline-block;
        margin-top:10px;
        padding:10px 20px;
        background:#667eea;
        color:white;
        text-decoration:none;
        border-radius:5px;
        font-weight:bold;
        ">
        Get Started
        </a>

    </div>

</div>

<?php
include 'footer.php';
?>