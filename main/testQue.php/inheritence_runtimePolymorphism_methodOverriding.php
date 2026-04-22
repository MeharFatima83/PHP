<?php
 class shape{
  public function area(){
      echo "Area:";
  }  
 }
class circle extends shape{
    private $r;
    public function __construct($r){
        $this->r=$r;
    }
    public function area(){
       $result=3.14*$this->r*$this->r;
       echo "circle area is : ".$result;
       echo"\n";
    }
}
class rectangle extends shape{
    private $l,$b;
    public function __construct($l,$b){
        $this->l=$l;
        $this->b=$b;
    }
    public function area(){
      $rec=$this->l*$this->b;
      echo "rectangle area is:".$rec;
    }
}
$c=new circle(3);
$r=new rectangle(3,4);
$c->area();
$r->area();
?>