<?php
require_once "Faker-master\src\autoload.php";
//$faker=Faker\Factory::create();
//for indianname,email--use below
$faker=Faker\Factory::create('en_IN');
echo $faker->name;
 $conn=mysqli_connect("localhost","root","","database1");
 for( $i=0;$i<=100;$i++){
    $sql="insert into registration(username,email,mobile)values('$faker->name','$faker->email','$faker->phoneNumber')";
    if(mysqli_query($conn,$sql)){
        echo "seeded";

    }
    else{
        echo "not seeded";
    }

 }
?>