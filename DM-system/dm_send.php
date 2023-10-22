<?php

session_start();

if(!isset($_SESSION['isLoged'])){
    header("Location: index.php");
    exit();
}

$to = htmlentities($_POST['to'], ENT_QUOTES, "UTF-8");
$content = htmlentities($_POST['message'], ENT_HTML5, "UTF-8");

require_once "creds.php";

$db = new PDO($db_dsn, $db_user, $db_pass);
$sql = "SELECT * FROM `users` WHERE `login` = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$to]);

if(!$stmt->rowCount()){
    $_SESSION['err'] = "That user does not exist";
    header("Location: secret.php");
    exit();
}

$sql = "SELECT `id` FROM `users` WHERE `login` = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$to]);
$fid = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

try{

    $sql = "INSERT INTO `messages` VALUES(?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([NULL, $content, $fid, $_SESSION['uid'], date("Y-m-d H:i:s")]);
    $_SESSION['err'] = "Message sent";

    header('Location: secret.php');
}catch(PDOException $e){
    $_SESSION['err'] = "Server error - please try again later";
    header("Location: secret.php");
    exit();
}