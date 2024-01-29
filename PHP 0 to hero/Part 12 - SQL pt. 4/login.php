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
    $db = new PDO("mysql:host=localhost;dbname=firstproject", "root", "");

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
    header("Location: secret.php");
}catch(PDOException $e){
    $_SESSION['error'] =  "Server error - ".$e;
    header("Location: index.php");
}