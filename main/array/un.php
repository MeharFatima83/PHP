<?php
$arr=array(1,4,4,1,5,2);
$map=[];
foreach ($arr as $value){
    if(isset($map[$value])){
        $map[$value]++;
    } else {
        $map[$value] = 1;
    }
    foreach($arr as $value){
        if($map[$value]==1){
            echo "Unique value: " . $value . "\n";
        }
    }
}
//“Using HashMap reduces time complexity from O(n²) to O(n) at the cost of extra space.”
?>