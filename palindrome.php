<?php
$rev=0;
$n=4347;
$og=$n;
while($n!=0){
$digit=$n%10;
$rev=($rev*10)+$digit;
$n=(int)($n/10);
}
if($rev==$og){
    echo "Palindrome";
}
else{
    echo "Not Palindrome";
}
?>
