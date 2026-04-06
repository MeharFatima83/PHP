<?php
$arr=[25,93,13,83,55];
$max=PHP_INT_MIN;
$smax=0;
for($i=0;$i<count($arr)-1;$i++){
    if($arr[$i]>$max){
        $max=$arr[$i];
    }
    if($arr[$i]>$smax && $arr[$i]<$max){
        $smax=$arr[$i];
    }
}
echo "the maximum number is:".$max;
echo "the second maximum number is:".$smax;     
?>
