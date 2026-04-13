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