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

$db = new mysqli("localhost", "root", "", "firstproject");

$sql = "SELECT * FROM `users` WHERE `username` = ?";
if($db->connect_errno != 0){
    $_SESSION['error'] =  "Error in database connection";
    header("Location: index.php");
    die();
}

$stmt = $db->prepare($sql);
$stmt->bind_param("s", $username_s);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows < 1){
    $_SESSION['error'] =  "invalid username or password ";
    header("Location: index.php");
    die();
}

$row = $result->fetch_assoc();

if(!password_verify($password_s, $row['password'])){
    $_SESSION['error'] =  "invalid username or password ";
    header("Location: index.php");
    die();
}

$db->close();
$_SESSION['isLoged'] = true;
header("Location: secret.php");