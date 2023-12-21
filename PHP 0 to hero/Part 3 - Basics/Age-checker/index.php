<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Age checker</title>
</head>
<body>
    <h1>Are you old enough to access this page?</h1>
    <form action="" method="GET">
        <input type="number" name="age" id="" placeholder="Enter your age">
        <button type="submit">Check age</button>
    </form>
    <?php
        if(!isset($_GET['age'])){
            exit();
        }

        if(!is_numeric($_GET['age'])){
            echo "<p>Your age must be a number</p>";
            exit();
        }

        if($_GET['age'] < 18){
            echo "<p>Access denied - You are too young to visit this website</p>";
        }else{
            echo "<p>Access granted - Welcome, this is only for adult users";
        }
    ?>
</body>
</html>