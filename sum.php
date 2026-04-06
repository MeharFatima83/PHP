<?php
$array=array(1,2,3,4,5,6,9);
$sum=0;
for($i=0;$i<count($array);$i++){
    $sum=$sum+$array[$i];
}
echo "The sum of the array is: ".$sum;
//count digit
$num=23455;
$count=0;
while($num!=0){
    $digit=$num%10;
    $count++;
    $num=(int)($num/10);
}
echo "The number of digits in the number is: ".$count;

//sum of digit
$n1=45623;
$s=0;
while($n1!=0){
    $dig=$n1%10;
    $s=$s+$dig;
    $n1=(int)($n1/10);
}
echo "The sum of the digits in the number is: ".$s;
?>