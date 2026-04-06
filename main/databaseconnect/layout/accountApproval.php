<?php

session_start();

if(isset($_SESSION['user'])){

    include "connection.php";
    // ❗ column name fix (superuser → is_superuser)
    $sql = "select * from emp where superuser = 0";// aise user jo khud admin n ho

    $info = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Approval</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9;">
    
    <?php include "adminheader.php"; ?>

    <h2 style="text-align: center; color: #333;">Account Approval</h2>

    <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #007bff; color: white; text-align: left;">
                <th style="padding: 15px; border-bottom: 2px solid #ddd;">ID</th>
                <th style="padding: 15px; border-bottom: 2px solid #ddd;">Name</th>
                <th style="padding: 15px; border-bottom: 2px solid #ddd;">Status</th>
                <th style="padding: 15px; border-bottom: 2px solid #ddd; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
        while($row = mysqli_fetch_assoc($info)){
        ?>
            <tr style="text-align:center;">
                <td style="padding:10px; border:1px solid #ddd;"><?php echo $row['id']; ?></td>
                <td style="padding:10px; border:1px solid #ddd;"><?php echo $row['name']; ?></td>

                <!-- ❗ column name fix (isActive → is_active check karna DB me) -->
                <td style="padding:10px; border:1px solid #ddd;">
                    <?php echo ($row['is_active']) ? "<p class='active'>Active</p>" : "<p class='inactive'>InActive</p>"; ?>
                </td>

                <td style="padding:10px; border:1px solid #ddd;">
                    <a href="approved.php?id=<?php echo $row['id'].'1'; ?>" 
                       style="padding:5px 10px; background:#27ae60; color:white; text-decoration:none; border-radius:5px;">
                        Approve
                    </a>

                    &nbsp; &nbsp; &nbsp;

                    <a href="approved.php?id=<?php echo $row['id'].'0'; ?>" 
                       style="padding:5px 10px; background:#e74c3c; color:white; text-decoration:none; border-radius:5px;">
                        Reject
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>

        </tbody>
    </table>

    <script>
        let active = document.getElementsByClassName('active');
        let inactive = document.getElementsByClassName('inactive');
        
        for(let i=0; i<active.length; i++){
            active[i].style.color = "green";
            active[i].style.fontWeight = "bold";
        }

        for(let i=0; i<inactive.length; i++){
            inactive[i].style.color = "red";
            inactive[i].style.fontWeight = "bold";
        }
    </script>

</body>
</html>

<?php
} else {
    header("location:login.php");
    exit(); // ❗ important
}
?>