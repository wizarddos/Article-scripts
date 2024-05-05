<?php
session_start();

if(empty($_POST['username'])){
    $_SESSION['error'] = "No username specified";
    header("Location: index.php");
    die();
}

if(empty($_POST['password'])){
    $_SESSION['error'] = "No password specified";
    header("Location: index.php");
    die();
}

$username_s = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
$password_s = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

try{
    require_once "connect.php";
    $db = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM `users` WHERE `username` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username_s]);

    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$results){
        $_SESSION['error'] =  "invalid username or password ";
        header("Location: index.php");
        die();
    }
    if(!password_verify($password_s, $results['password'])){
        $_SESSION['error'] =  "invalid username or password ";
        header("Location: index.php");
        die();
    }

    $_SESSION['isLoged'] = true;

    if(isset($_POST['remember-me'])){
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));

        $cookie = $selector.":".$validator;
        $expiration_date = time()+60*60*24*30;

        $sql = "INSERT INTO `tokens` VALUES(?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([NULL, $selector, password_hash($validator, PASSWORD_DEFAULT), $expiration_date, $results['user_id']]);
    
        setcookie("save-login", $cookie, $expiration_date, "","", false ,true);
    }

    header("Location: secret.php");
}catch(PDOException $e){
    $_SESSION['error'] =  "Server error - ".$e;
    header("Location: index.php");
}