<?php
//palindrome string
$str="madamw";
$rev="";
for($i=strlen($str)-1;$i>=0;$i--){
    $rev=$rev.$str[$i];
}
if($rev==$str){
    echo "Palindrome";
}
else{
    echo "Not Palindrome";
    }
?>