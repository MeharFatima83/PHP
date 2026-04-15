<?php
class hint{
    public $num1=null;
    public $num2=null;
    public function __construct(int $x,int $y){
        $this->num1=$x;
        $this->num2=$y;

    }
}
$obj=new hint(10,50);
echo $obj->num1;
echo $obj->num2;

?>