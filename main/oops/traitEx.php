<?php
trait A{
    public function display(){
        echo "This is trait A\n";
    }
}

trait B{
    use A;
    public function display1(){
        echo "This is trait B\n";
    }
}

trait C{
    use B;
}

class test{
    use C;
}

$obj = new test();
$obj->display();
$obj->display1();
//can use multiple traits in a classl

















?>