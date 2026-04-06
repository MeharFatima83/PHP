<H1> Calculator</H1>

<form method="POST" action="">
<input type ='number' name="num1" placeholder="enter one"><br><br>
<input type='number' name="num2" placeholder="enter two"><br><br>
<select name="operation">
    <option value="add">Add</option>
    <option value="sub">Sub</option>
    <option value="mul">Mul</option>
    <option value="div">Div</option>
</select><br><br>
<input type ="submit" value=" Show Answer">
</form>
<?php
$result="";
if(isset($_REQUEST['num1']) && isset($_REQUEST['num2']) && isset($_REQUEST['operation'])){
    if($_REQUEST['operation']=='add'){
        
    $result=$_REQUEST['num1']+$_REQUEST['num2'];
    }
    else if($_REQUEST['operation']=='sub'){
        
       $result=$_REQUEST['num1']-$_REQUEST['num2'];
       }
    else if($_REQUEST['operation']=='mul'){
        
          $result=$_REQUEST['num1']*$_REQUEST['num2'];
        }
     else if($_REQUEST['operation']=='div'){
               if($_REQUEST['num2']==0){
               $result= "Can't devide by zero";
               }
               else{
                   $result=$_REQUEST['num1']/$_REQUEST['num2'];
               }
        }
   
  
}
?>
<h2>Answer: <?php echo $result; ?></h2>