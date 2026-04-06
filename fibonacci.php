<?php
function fib($n){
    $one=0;
    $two=1;
    echo $one." ".$two." ";
    for($i=2;$i<$n;$i++){
        $three=$one+$two;
        echo $three." ";
        $two=$three;
        $one=$two;
    }

}
    fib(6);
?>