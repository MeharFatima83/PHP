<?php
$n=readline("Enter a num:");
$temp=0;
$sum=0;
for($i=0;$i<=$n;$i++){
    $temp=$temp*10+$n;
    $sum=$sum+$temp;
    echo $temp." ";
}
echo "The sum is:".$sum;
?>