<?php
class Calculator{
    public static function add($a,$b){
        return $a+$b;
    }
    public static function sub($a,$b){
        return $a-$b;
    }
      public static function mul($a,$b){
        return $a*$b;
    }
      public static function div($a,$b){
        if($b==0){
            return "Division by zero error!";
        }
        return $a/$b;
    }
}
echo "Addition:".Calculator::add(10,5)." ";
echo "sub:".Calculator::sub(10,5)." ";
echo "mul:".Calculator::mul(10,5)." ";
echo "div:".Calculator::div(10,0)." ";
?>
//without creating object we can call static method using class name and scope resolution operator(::)
//without static keyword calcuklator- 
<?php
class Calculator1 {
    public $result;

public function add($a,$b){
    $this->result =$a+$b;
    return $this->result;
    
}
public function sub($a,$b){
    $this->result =$a-$b;
    return $this->result;
    
}
public function mul($a,$b){
    $this->result =$a*$b;
    return $this->result;
    
}
public function div($a,$b){
    $this->result =$a/$b;
    return $this->result;
    
}
}

$calc=new Calculator1();
echo "Add:".$calc->add(10,7)." ";
echo "sub:".$calc->sub(12,4)." " ;
echo "mul:" .$calc->mul(3,9)." ";
echo "div:".$calc->div(3,9)." ";



?>