<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>

<div style="
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 30px;
background:rgba(0,0,0,0.6);
backdrop-filter:blur(8px);
color:white;
font-family:Arial;
position:fixed;
top:0;
left:0;
right:0;
z-index:1000;
box-sizing:border-box;
">

    <!-- Left Logo -->
    <div style="display:flex;align-items:center;gap:8px;">
        <span style="font-size:22px;">🏦</span>
        <span style="font-size:20px;font-weight:bold;">
            BalanceBook
        </span>
    </div>

    <!-- Center Menu -->
    <div style="display:flex;gap:15px;">

        <a href="index.php" style="text-decoration:none;color:white;font-weight:bold;">
            Home
        </a>

        <?php if(isset($_SESSION['accountNo'])){ ?>

        <a href="withdraw.php" style="text-decoration:none;color:white;font-weight:bold;">
            Withdraw
        </a>

        <a href="deposite.php" style="text-decoration:none;color:white;font-weight:bold;">
            Deposit
        </a>

        <a href="transfer.php" style="text-decoration:none;color:white;font-weight:bold;">
            Transfer
        </a>

        <?php } ?>

    </div>

    <!-- Right Side -->
    <div style="display:flex;align-items:center;">

        <?php if(isset($_SESSION['accountNo'])){ ?>

            <a href="user.php" 
            style="text-decoration:none;margin-right:10px;padding:8px 15px;
            background:white;color:black;border-radius:20px;font-weight:bold;">
            <?php echo "Hi ".$_SESSION['user']; ?>
            </a>

            <a href="logout.php" 
            style="text-decoration:none;padding:8px 15px;
            background:#ff4d6d;color:white;border-radius:20px;font-weight:bold;">
            Logout</a>

        <?php } else { ?>

            <a href="login.php" 
            style="text-decoration:none;margin-right:10px;padding:8px 15px;
            background:white;color:black;border-radius:20px;font-weight:bold;">
            Login</a>

            <a href="register.php" 
            style="text-decoration:none;padding:8px 15px;
            background:#667eea;color:white;border-radius:20px;font-weight:bold;">
            Register</a>

        <?php } ?>

    </div>

</div>