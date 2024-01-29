<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in </title>
</head>
<body>
    <h1>Log in</h1>
    <form action="login.php" method = "POST">
        <input type="text" name = "username" placeholder="username"><br/><br/>
        <input type="password" name="password" placeholder="password"><br/><br/>
        <button type="submit">Log in</button>
        <?php 
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </form>
    
</body>
</html>