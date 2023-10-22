<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="login" placeholder="Enter login:">
        <input type="password" name="password" placeholder="Enter password:">
        <button type="submit">Log in</button>
    </form>
    <?php
        if(isset($_SESSION['errorMsg'])){
            echo $_SESSION['errorMsg'];
            unset($_SESSION['errorMsg']);
        }
    ?>
</body>
</html>