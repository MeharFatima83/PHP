<?php
$result = ""; 

if(isset($_REQUEST['num1']) && isset($_REQUEST['num2']) && isset($_REQUEST['operation'])){

    if($_REQUEST['operation']=='add'){
        $result = $_REQUEST['num1'] + $_REQUEST['num2'];
    }
    else if($_REQUEST['operation']=='sub'){
        $result = $_REQUEST['num1'] - $_REQUEST['num2'];
    }
    else if($_REQUEST['operation']=='mul'){
        $result = $_REQUEST['num1'] * $_REQUEST['num2'];
    }
    else if($_REQUEST['operation']=='div'){
        if($_REQUEST['num2'] == 0){
            $result = "Cannot divide by zero ";
        } else {
            $result = $_REQUEST['num1'] / $_REQUEST['num2'];
        }
    }
}
?>

<form method="post" action="">
    <input type="number" name="num1" placeholder="num1"><br><br>
    <input type="number" name="num2" placeholder="num2"><br><br>

    <select name="operation">
        <option value="add">Add</option>
        <option value="sub">Sub</option>
        <option value="mul">Mul</option>    
        <option value="div">Div</option>
    </select><br><br>

    <input type="submit" value="Show Answer">
</form>

<h2>Answer: <?php echo $result; ?></h2>