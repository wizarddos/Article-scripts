<?php
session_start();
if(!isset($_SESSION['uid'])){
    echo "Server error - no user id available";
    exit();
}

$uid = $_SESSION['uid'];
$friend = htmlentities($_GET['friend'], ENT_QUOTES, "UTF-8");
$isValid = true;

try{
    require_once "creds.php";
    $db = new PDO($db_dsn, $db_user, $db_pass);

    $sql = "SELECT `id`, `login` FROM `users` WHERE `login` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$friend]);

    if(!$stmt->rowCount()){
        echo "This user does not exist";
       $isValid = false;
    }

    $fid = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    $sql = "SELECT * FROM `messages`  WHERE (`destination` = ? AND `sender` = ?) OR (`destination`= ? AND `sender` = ?)  LIMIT 15";
    $stmt = $db->prepare($sql);
    $stmt->execute([$fid, $uid, $uid, $fid]);
    $messages =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($messages as $message){
        $datetime = $message['timestamp'];
        $content = $message['content'];
        $sender = $message['sender'] === $fid ? $friend : $_SESSION['login'];

        echo<<<END
            $content 
            <br/>
            Sent by $sender at $datetime
            <br/><br/>
        END;
    }

}catch(PDOException $e){
    echo "Internal server error - try again ";
}