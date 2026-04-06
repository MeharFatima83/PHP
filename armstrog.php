//armstrong
<?php
$sum=0;
for($n=100;$n<1000;$n++){
    $og=$n;
    $temp=$n;
    while($temp!=0){
        $dig=$temp%10;
        $sum=$sum+($dig*$dig*$dig);
        $temp=(int)($temp/10);
    }
    if($sum==$og){
        echo  $og." ";
    }
    $sum=0; // Reset the sum for the next iteration

}

?>