<?php
//compile time polymorphism method overloading
class calc{
     public function __call($name,$args){
        if($name=="add"){
             $result=0;
            foreach($args as $val){
                $result=$result+$val;
            }
            return $result;
        }
     }
}
$obj=new calc();
echo $obj->add(3,5,78,42,13,78,54);
?>
<?php
//runtime polymorphism method overriding
//with abstraction


abstract class details{
    abstract public function personalDetail();
    abstract public function professionalDetail();

}
class child extends details{
    public function personalDetail(){
        echo "Name: Mehar\n";
        echo "Age: 22\n";
        echo "City: Noida\n";
    }
    public function professionalDetail(){
        echo "Organization: Chetu\n";
        echo "Designation: Software Engineer\n";
        echo "Experience: 1 month present\n";
    }
}
class child2 extends details{
    public function personalDetail(){
        echo "Name: Shazz\n";
        echo "Age: 29\n";
        echo "City: Mumbai\n";
    }
    public function professionalDetail(){
        echo "Organization: Private\n";
        echo "Designation: Electrical Engineer\n";
        echo "Experience: 8 years present\n";
    }
}
echo "first use--\n";
$obj1=new child();
$obj1->personalDetail();
$obj1->professionalDetail();
echo "second use--\n";
$obj2=new child2();
$obj2->personalDetail();    
$obj2->professionalDetail();
?>