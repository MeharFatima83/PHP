<?php
//write and read data in file
//write
$f=fopen("file1.txt","w");
fwrite($f,"hello php i am here");
fclose($f);
//read
$f=fopen("file1.txt","r");
echo fread($f,filesize("file1.txt"));
fclose($f);
?>
<?php

$f=fopen("file1.txt","a");
     fwrite($f," mehar\n");
     fclose($f); 
 $f=fopen("file1.txt","r");
 echo fread($f,filesize("file1.txt"));
 fclose($f);
 ?>
<?php
$f=fopen("file1.txt","r+");
fwrite($f,"fatima");
fclose($f);
$f=fopen("file1.txt","r");
echo fread($f,filesize("file1.txt"));
fclose($f);
?>
<?php
$name="samar";
$f=fopen("users.txt","a+");
fwrite($f,$name."\n");
fclose($f);

$f=fopen("users.txt","a+");
fwrite($f,"today i studied file handling");
fclose($f);
?>
