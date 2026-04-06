<?php

$sal = (int)readline("enter salary: ");
$leave = (int)readline("enter leave: ");

$deduction = 0;
if($leave > 2){
    $deduction = ($leave - 2) * 230;
    echo "Deduction: $deduction\n";
}

// allowance
$hra = 0.07 * $sal;
$fa = 0.12 * $sal;
$ta = 1000;
$da = 0.09 * $sal;

$allowance = $hra + $fa + $ta + $da;
$gross = $sal + $allowance - $deduction;

echo "Gross Salary: $gross\n";

// tax
$tax = 0;

if($gross <= 20000){
    $tax = 0;
}
elseif($gross <= 40000){
    $tax = ($gross - 20000) * 0.05;
}
elseif($gross <= 70000){
    $tax = (20000 * 0.05) + ($gross - 40000) * 0.10;
}
elseif($gross <= 105000){
    $tax = (20000 * 0.05) + (30000 * 0.10) + ($gross - 70000) * 0.15;
}
elseif($gross <= 115000){
    $tax = (20000 * 0.05) + (30000 * 0.10) + (35000 * 0.15) + ($gross - 105000) * 0.20;
}
else{
    $tax = (20000 * 0.05) + (30000 * 0.10) + (35000 * 0.15) + (10000 * 0.20) + ($gross - 115000) * 0.25;
}

echo "Tax: $tax\n";

$net = $gross - $tax;
echo "Net Salary: $net\n";

?>