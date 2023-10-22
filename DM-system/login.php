<?php

session_start();

if(!isset($_POST['login']) || !isset($_POST['password'])){
    header("Location: index.php");
    exit();
}

require_once "creds.php";


$login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
$password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
$isValid = true;
$errorMsg = "";

if(empty($login) || empty($password)){
    $isValid = false;
    $errorMsg = "Login and/or Password can't be empty";
}

if(strlen($password) < 8){
    $isValid = false;
    $errorMsg = "Password must have at least 8 characters" ;
}

if(!$isValid){
    $_SESSION['errorMsg'] = $errorMsg;
    header("Location: index.php");
    exit();
}

$db = new PDO($db_dsn, $db_user, $db_pass);

$sql = "SELECT * FROM `users` WHERE `login`=?";

$stmt = $db->prepare($sql);
$stmt->execute([$login]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$stmt->rowCount()){
    $isValid = false;
    $errorMsg = "Incorrect username or password";
}else{
    if(!password_verify($password, $result['password'])){
        $isValid = false;
        $errorMsg = 'Incorrect username or password';
    }
}


if(!$isValid){
    $_SESSION['errorMsg'] = $errorMsg;
    header("Location: index.php");
    exit();
}

$_SESSION['uid'] = $result['id'];
$_SESSION['login'] = $result['login'];
$_SESSION['isLoged'] = true;
header("Location: secret.php");