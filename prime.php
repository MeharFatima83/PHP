<?php
// $n=100;
// $isPrime=true;
// if($n<2){
//     $isPrime=false;
// }
// for($i=2;$i<=sqrt($n);$i++){
//     if($n%$i==0){
//         $isPrime=true;
//         break;
//     }
// }
// if($isPrime){
//     echo "$n is a prime number.";
// } else {
//     echo "$n is not a prime number.";
// }

?>
//rnge of 1 to 100 prime
<?php

for($n=2;$n<=100;$n++){
     $isPrime=true;
    for($i=2;$i<=sqrt($n);$i++){
        if($n%$i==0){
            $isPrime=false;
            break;
        }
    }
    if($isPrime){
        echo " ".$n;
     }
    
    }



?>