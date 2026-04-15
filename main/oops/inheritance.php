<?php
class Employee{
    public $name;
    public $org;
    public $designation;
    public function  __construct($name,$org,$designation){
        $this->name=$name;
        $this->org=$org;
        $this->designation=$designation;
    }
    public function display(){
    echo $this->name;
    echo $this->org;
    echo $this->designation;
}
}
$emp=new Employee("Mehar","Private","Developer");
$emp->display();

?>
//--------------------------------------------------------------
<?php
class Employee{
    public $name;
    public $org;
    public $designation;
    public function  __construct($name,$org,$designation){
        $this->name=$name;
        $this->org=$org;
        $this->designation=$designation;
    }
    public function display(){
    echo $this->name;
    echo $this->org;
    echo $this->designation;
}
}
class AdvanceInfo extends Employee{
    public $salary;
    public $bonus;
    public $leaves;
    public function __construct($name,$org,$designation,$salary,$bonus,$leaves) {
        parent::__construct($name,$org,$designation);
        $this->salary=$salary;
        $this->bonus=$bonus;
        $this->leaves=$leaves;
    }

public function display1(){
    parent::display();
    echo $this->salary;
    echo $this->bonus;
    echo $this->leaves;
}
}
$emp=new AdvanceInfo("Mehar","Private","Developer",50000,5000,20);
$emp->display();
echo "\n";
$Em=new AdvanceInfo("Khushi","Private","HR",45000,4000,15);
$Em->display1();

?>  