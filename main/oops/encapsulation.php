<?php
class details{
    public $location ="Noida";
    private $company="Chetu";
    public function display(){
        echo $this->location;
        // echo $this->company;
    }
}
$obj=new details();
$obj->company;//can,t access private variable
?>
//when use protected variable then we can access in child class but not in main class
//when use private variable then we can,t access in child class and main class
//protected--------------------------------------
<?php
class details{
    public $location ="Noida";
    protected $company="Chetu";
    public function display(){
        echo $this->location;
        // echo $this->company;
    }
}
class child extends details{
    public function showdetails(){
        echo $this->company;
    }
}
$obj=new child();
$obj->showdetails();//can,t access private variable
?>
//same function name ho skta hai parent aur child class me pr wo override kr dega agr parent::name use nhi kroge to 
<?php
class details{
    public $location ="Noida";
    protected $company="Chetu";
    public function display(){
        echo $this->location;
        // echo $this->company;
    }
}
class child extends details{
    public function display(){
        parent::display();
        echo $this->company;
        
    }
    
}
$obj=new child();
$obj->display();

 
?>
//getter and setter
<?php
class details{
    public $location ="Noida";
    private $company="Chetu";
    public function getcompany(){
        return $this->company;
    }
    public function setcompany($name){
        $this->company=$name;
    }
}
class child extends details{
    public function display(){
        echo "company name: ".$this->getcompany();
    }
    public function changename(){
        
        $this->setcompany("Infosys");
        
    }
}
$obj=new child();
$obj->display();

echo "\n company name changed now new name is ";
$obj->changename();
$obj->display();


 
?>
//--value changed
-<?php
class details{
    public $location ="Noida";
    private $company=10;
    public function getcompany(){
        return $this->company;
    }
    public function setcompany($val){
        $this->company=$val;
    }
}
class child extends details{
    public function display(){
        echo "Value: ".$this->getcompany();
    }
    public function changeval(){
        
        $this->setcompany(20);
        
    }
}
$obj=new child();
$obj->display();

echo "\n company name changed now new name is ";
$obj->changeval();
$obj->display();
isset($obj->company);//accessing private variable outside the class which is not possible so it will print nothing
//but want to check then we can do it will the help of isset() magic method which will return false if variable is not set or not accessible and true if it is accessible



 
?>
//isset() magic method is used to check if a variable is set and is not null. It returns true if the variable exists and has a value other than null, and false otherwise. In the context of private variables, isset() can be used to check if the variable is accessible from outside the class, which will return false for private variables.
<?php
class details{
    public $location="Noida";
    private $chetu=10;
    public function __isset($val){
        if($val=="chetu"){
            return isset($this->$val);
        }
       
    }
}
$obj=new details();
var_dump(isset($obj->location)); // true, because location is public
var_dump(isset($obj->chetu)); // false, because chetu is private and __
?>
