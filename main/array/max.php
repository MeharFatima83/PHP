<?php
$arr=[25,93,13,83,55];
$max=PHP_INT_MIN;
for($i=0;$i<count($arr)-1;$i++){
    if($arr[$i]>$max){
        $max=$arr[$i];
    }
}
echo "the maximum number is:".$max;

?>
