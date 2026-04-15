<?php
$x=10;
echo "before unset: ".$x;
unset($x);
echo "after unset: ".$x;
?>

<?php
class details{
    public $name="Mehar";
    private $org="Chetu";
    public function show(){
        echo $this->name;
        echo $this->org;
    }
}
$obj=new details();
echo "before unset: ".$obj->name;
unset($obj->name);//name unset ho jyga kyuki prublic hai accessable hai
echo "after unset: ".$obj->name;
echo "before unset: ".$obj->org;//ab aa rha hai you cant unset private property ab iske  liye unset magic method call hoga
//jb access hi nhi ho rha hai to unset kaha se hoga
?>
//unset magic method 
<?php
class info {
    public $City = "Noida";
    private $chetu = 10;

    public function __unset($val){
        if($val == "chetu"){
            unset($this->chetu);
            echo "chetu property has been unset.";
        } 
    }
}

$obj = new info();

unset($obj->City); // delete ho jayega
unset($obj->chetu);    // message aayega
?>