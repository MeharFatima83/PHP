<?php
$n1=9;
$n2=12;
$gcd=1;
for($i=1;$i<min($n1,$n2);$i++){
    if($n1%$i==0 && $n2%$i==0){
        $gcd=$i;
    }
}
echo $gcd;