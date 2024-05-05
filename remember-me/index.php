<?php 
    session_start(); 
?>
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
        <label><input type="checkbox" name="remember-me"> Remember me </label><br/>
        <?php 
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </form>
    
</body>
</html>

<?php
    if(!isset($_COOKIE['save-login'])){
        die();   
    }

    $cookie = explode(":", $_COOKIE['save-login']);

    try{
        require_once "connect.php";
        $db = new PDO($dsn, $user, $password);

        $sql = "DELETE FROM `tokens` WHERE `expiry` < UNIX_TIMESTAMP(NOW())";
        $stmt = $db->query($sql);

        $sql = "SELECT * FROM `tokens` WHERE `selector` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$cookie[0]]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($cookie[1], $result['validator'])){
            $_SESSION['isLoged'] = true;
            header("Location: secret.php");
        }


    }catch(PDOException $e){
        echo "Cookie checking failed";
        die();
    }
    
?>