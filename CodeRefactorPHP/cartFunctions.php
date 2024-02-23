<?php 

function calculateTotal(int $price, int $quantity){
    $total = $price * $quantity;

    if ($total > 100) {
        return "Total is greater than 100!";
    } else {
        return "Total is less than or equal to 100!";
    }
}

function checkQuantity(int $price, int $quantity){
    if ($quantity <= 0) {
        echo "Invalid quantity!";
        return 0;
    }

    if ($quantity < 10) {
        echo calculateTotal($price, $quantity);
    } else {
        echo "Quantity is greater than or equal to 10!";
    }    
    
}

function listArrayItems(array $array){
    if (!is_array($array)) {
        echo "Invalid items!";
        return 0;
    }

    if (count($array) < 0) {
        echo "No items to print!";
    }
        
    foreach ($array as $item) {
        echo $item . "<br>";
    }
}