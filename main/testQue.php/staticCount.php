<?php
class car{
    static $count=0;
    public function __construct(){
        self::$count++;
        
    }
    public function display(){
        echo "count is:".self::$count;
    }
}
$c1=new car();
$c2=new car();
$c2->display();
?>