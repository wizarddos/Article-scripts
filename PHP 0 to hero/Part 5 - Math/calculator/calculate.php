<?php
session_start();

if(!isset($_GET['num1'])){
    header("Location: index.php");
    exit();
}

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operation = $_GET['operation'];
$result = 0;

switch($operation){
    case "add": $result = $num1 + $num2; break;
    case "subtract": $result = $num1 - $num2; break;
    case "multiply": $result = $num1*$num2; break;
    case "divide": $result = $num1/$num2; break;
    case "expon": $result = $num1**$num2; break;
    case "root": $result = sqrt($num1); break;
    case "modulo": $result = $num1%$num2; break;

    default: $result = "Invalid operation chosen"; break;
}

$_SESSION['result'] = $result;

header("Location: index.php");