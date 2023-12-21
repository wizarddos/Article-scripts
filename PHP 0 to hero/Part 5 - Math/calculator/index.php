<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action="calculate.php" method="GET">
        <input type="number" name="num1" id="" />
        <input type="number" name="num2" id="" />
        <select name = "operation">
            <option value ="add">Add</option>
            <option value ="subtract">Subtract</option>
            <option value ="multiply">Multiply</option>
            <option value ="divide">Divide</option>
            <option value = "expon">Exponentiation</option>
            <option value = "root"> Square Root</option>
            <option value = "modulo">Modulo</option>
        </select>

        <button type="submit">Calculate</button>
    </form>
    <?php
        if(isset($_SESSION['result'])){
            echo "Result is:";
            echo $_SESSION['result'];
            exit();
        }
    ?>
</body>
</html>