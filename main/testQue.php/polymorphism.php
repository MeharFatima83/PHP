<?php
 class animal{
     public function sound(){
         echo "sound";
     }
 }
 class dog extends animal{
     public function sound(){
         echo "dog barks";
     }
 
 }
 class cat extends animal{
     public function sound(){
         echo " cat mews";
     }
 }
 $c1=new cat();
 $d1=new dog();
 $c1->sound();
 $d1->sound();
?>