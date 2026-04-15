<?php


class Person {
    private $age;

    public function __set($prop, $value){
        if($prop == "age"){
            if($value <= 0){
                echo "Invalid age";
            } else {
                $this->age = $value;
                echo "Age set successfully: " . $this->age;
            }
        }
    }
}
$obj = new Person();
$obj->age =0; 




?>