<?php
include "a.php";
include "b.php";


$t1=new A\test;
$t1->display();
$t2=new B\test;
$t2->display();

?> 
//Namespace same naam ki classes ko differentiate karta hai
//Har  object ko use karne se pehle create karna zaruri hai
//$t2 missing tha → error aa raha tha