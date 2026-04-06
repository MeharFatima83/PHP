<!-- <?php
$n=5;

$marks=[];
$isGraceValid=true;
$failSub=0;

for($i=0;$i<$n;$i++){
    echo "Enter marks for subject ".($i+1).": ";
}

for($i=0;$i<$n;$i++){
    if($marks[$i]<33){
        $failSub++;
        $diff=33-$marks[$i];

        if($diff<=2){
            $marks[$i]=33;
        }
        else{
            $isGraceValid=false;
        }
    }
}

$total=array_sum($marks);
$percentage=$total/$n;

// ✅ fixed logic
if($isGraceValid && $failSub<=2){
    $result="Pass with grace";
}
elseif(!$isGraceValid || $failSub>2){
    $result="Fail";
}
else{
    $result="Pass";
}

echo "Total Marks: $total\n";
echo "Percentage: $percentage%\n";
echo "Result: $result\n";
?> -->
<?php
if(isset($_POST['submit'])){
    $marks = $_POST['marks'];
    $n = count($marks);

    $failSub = 0;
    $isGraceValid = true;

    for($i=0;$i<$n;$i++){
        if($marks[$i] < 33){
            $failSub++;
            if((33 - $marks[$i]) <= 2){
                $marks[$i] = 33;
            } else {
                $isGraceValid = false;
            }
        }
    }

    $total = array_sum($marks);
    $percentage = $total / $n;

    if($failSub == 0){
        $result = "Pass";
    }
    elseif($failSub <= 2 && $isGraceValid){
        $result = "Pass with grace";
    }
    else{
        $result = "Fail";
    }

    echo "Total: $total <br>";
    echo "Percentage: $percentage <br>";
    echo "Result: $result";
}
?>

<form method="POST">
    Marks: <br>
    <input type="number" name="marks[]" required><br>
    <input type="number" name="marks[]" required><br>
    <input type="number" name="marks[]" required><br>
    <input type="number" name="marks[]" required><br>
    <input type="number" name="marks[]" required><br><br>

    <input type="submit" name="submit">
</form>



<?php
// Online PHP compiler to run PHP program online
// Print "Try programiz.pro" message
$marks=[33,31,45,34,56];
$failcount=0;
for($i=0;$i<5;$i++){
    if($marks[$i]<33){
        $failcount++;
        
    }
    if($failcount<=2 && (33-$marks[$i])<=2){
        $marks[$i]=33;
    }
    else{
        $marks[$i]=10;//direct fail
    }
    
}
$total=array_sum($marks);
$perentage=$total/5;
if($failcount==0){
    echo "pass";
}
else if ($failcount>2){
    echo "fail";
}
else{
    echo "pass with grace";
}

?>