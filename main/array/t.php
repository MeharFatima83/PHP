   <?php
$arr = array(
    array("Name"=>"Nadiya","Age"=>21,"City"=>"Saudi",
    "Marks"=>array(
        "Maths"=>85,
        "Science"=>90,
        "English"=>88
    )
    
    ),
    array("Name"=>"Sakshi","Age"=>22,"City"=>"Lucknow", "Marks"=>array(
        "Maths"=>85,
        "Science"=>90,
        "English"=>88
    )),
    array("Name"=>"Mehar","Age"=>21,"City"=>"Lucknow", "Marks"=>array(
        "Maths"=>85,
        "Science"=>90,
        "English"=>88
    )),
    array("Name"=>"Khushi","Age"=>21,"City"=>"BKT", "Marks"=>array(
        "Maths"=>85,
        "Science"=>90,
        "English"=>88
    )),
    array("Name"=>"Ritika","Age"=>21,"City"=>"Banaras", "Marks"=>array(
        "Maths"=>85,
        "Science"=>90,
        "English"=>88
    )),
    array("Name"=>"Ankita","Age"=>21,"City"=>"Kanpur", "Marks"=>array(
        "Maths"=>85,
        "Science"=>90,
        "English"=>88
    ))
);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">

<!-- Heading -->
<tr>
<?php
foreach($arr[0] as $key => $val){
    echo "<th>$key</th>";
}
?>
</tr>

<!-- Data -->
<?php
foreach($arr as $row){
    echo "<tr>";

    foreach($row as $key => $val){

        if(is_array($val)){   //  Marks case
            echo "<td>";
            foreach($val as $subject => $m){
                echo "$subject: $m <br>";
            }
            echo "</td>";
        } else {
            echo "<td>$val</td>";
        }

    }

    echo "</tr>";
}
?>

</table>

</body>
</html>



 //with stying table-----------------------------------------------------------------------
<?php
$arr = array(
    array("Name"=>"Nadiya","Age"=>21,"City"=>"Saudi"),
    array("Name"=>"Sakshi","Age"=>22,"City"=>"Lucknow"),
    array("Name"=>"Mehar","Age"=>21,"City"=>"Lucknow"),
    array("Name"=>"Khushi","Age"=>21,"City"=>"BKT"),
    array("Name"=>"Ritika","Age"=>21,"City"=>"Banaras"),
    array("Name"=>"Ankita","Age"=>21,"City"=>"Kanpur")
);
?>

<?php
$arr = array(
    array(
        "Name"=>"Nadiya",
        "Age"=>21,
        "City"=>"Saudi",
        "Marks"=>array("Maths"=>85,"Science"=>90,"English"=>88)
    ),
    array(
        "Name"=>"Sakshi",
        "Age"=>22,
        "City"=>"Lucknow",
        "Marks"=>array("Maths"=>80,"Science"=>85,"English"=>82)
    ),
    array(
        "Name"=>"Mehar",
        "Age"=>21,
        "City"=>"Lucknow",
        "Marks"=>array("Maths"=>75,"Science"=>88,"English"=>90)
    )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Table</title>
</head>

<body class="bg-light">

<div class="container mt-5">
    
    <h2 class="text-center mb-4">Student Data</h2>

    <div class="card shadow-lg p-4">

        <table class="table table-bordered table-hover text-center align-middle">

            <!-- Heading -->
            <thead class="table-dark">
                <tr>
                    <?php
                    foreach($arr[0] as $key => $val){
                        echo "<th>$key</th>";
                    }
                    ?>
                </tr>
            </thead>

            <!-- Data -->
            <tbody>
                <?php
                foreach($arr as $row){
                    echo "<tr>";

                    foreach($row as $key => $val){

                        if(is_array($val)){  // Marks
                            echo "<td>";
                            foreach($val as $subject => $m){
                                echo "<span class='badge bg-primary me-1'>$subject: $m</span>";
                            }
                            echo "</td>";
                        } else {
                            echo "<td>$val</td>";
                        }

                    }

                    echo "</tr>";
                }
                ?>
            </tbody>

        </table>

    </div>
</div>

</body>
</html>