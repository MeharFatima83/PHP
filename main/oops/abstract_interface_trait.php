<?php
trait stateGovt{
    public function display(){
    echo "stateGovt";
    }
}

interface Govt{
   public function order();
}
interface Center{
    public function center();
}

abstract class RBI{
    public $pin=null;
    abstract function changePin($digit);
    public function show(){
        echo "Payment done";
    }
}
class SBI extends RBI{
    public function changePin($digit){
        echo $digit;
    }
}
class PNJ extends SBI implements Govt,Center{
    use stateGovt;
    public function changePin($digit){
        echo $digit;
    }
    public function order(){
        echo "interface Govt";
    }
    public function center(){
        echo "interface Center";
    }
}
$p = new PNJ;
$p->display();
$p->changePin(22);

?>