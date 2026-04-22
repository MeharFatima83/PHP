<?php
 abstract class shape{
     abstract function area();
 }
 class circle extends shape{
     public $r;
     public function __construct($r){
         $this->r=$r;
     }
     public function area(){
         $result=3.14*$this->r*$this->r;
         echo "area of circle is: ".$result;
         }
 }
 class rectangle extends shape{
     public $l;
     public $b;
      public function __construct($l,$b){
         $this->l=$l;
         $this->b=$b;
     }
     public function area(){
         $rec=$this->l*$this->b;
         echo "area of rectangle is: ".$rec;
     }
 }
 $c=new circle(3);
 $r=new rectangle(3,4);
 $c->area();
 $r->area();
?>