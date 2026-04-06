<?php
for($i=1;$i<=sqrt(11);$i++){
    if(11%i==0){
      $list[]=$i;
      if((11/$i)!=$i) {
        $list[]=(11/$i);
         } 
    }
        
}
sort($list);
echo implode(",",$list);
?>