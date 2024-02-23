<?php

require "cartFunctions.php";

$quantity = $_POST['h'];
$price = $_POST['i'];

echo calculateTotal($price, $quantity);

checkQuantity($price, $quantity);