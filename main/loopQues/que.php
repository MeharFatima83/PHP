<?php
$n=readline("Enter a num:");
for($i=0;$i<$n;$i++){
    for($j=0;$j<$i;$j++){
        echo ($i+$j)%2 ." ";
    }
    echo "\n";

}
?>