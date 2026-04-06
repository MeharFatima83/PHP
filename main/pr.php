<?php
$n=8;
for($i=2;$i<=sqrt($n);$i++){
    $isPrime=true;
    if(($n%$i)==0){
        $isPrime=false;
        echo "not prime";
        break;
    }
    else{
        $isPrime=true;
        echo "prime";
    }
}
if($n<=10){
  for($i=1;$i<=10;$i++){
    echo $n ."x".$i."=".($n*$i);

    echo "<br>";
  }
    
}
?>