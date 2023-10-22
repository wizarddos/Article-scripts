<?php

session_start();

if(!isset($_SESSION['isLoged'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dm.css" />
    <title>Secret website</title>
</head>
<body>
    <h1>Welcome on secret page - Private DM's</h1>

    <main>
        <section class = "sendMsg">
            <article class = "conversation">
                <noscript>Can't load iframe with messages - enable your JavaScript and refresh the page</noscript>
            </article>
            <form method="POST" action="dm_send.php">
                <label> To:
                <input type="text" name="to" placeholder="To:"  class = "form-field"/></label>
                <br/><br/>
                <label> Content:<br/>
                <textarea id="" cols="30" rows="5" maxlength ="249" name="message"></textarea><br/></label>
                <br/>
                <button type="submit" class = "btn-submit">Send</button> 
                <br/>
                <?php 
                    if(isset($_SESSION['err'])){
                        echo $_SESSION['err'];
                        unset($_SESSION['err']);
                    }
                ?>
            </form>
        </section>
        <section class = "friends">
            <ul class = "friends-list">
                <?php
                    $sql = "SELECT DISTINCT `users`.`login` 
                            FROM `messages` 
                            RIGHT JOIN `users` ON `users`.`id` = `messages`.`sender` 
                            WHERE `destination` = ?
                            UNION
                            SELECT DISTINCT `users`.`login`
                            FROM `messages`
                            RIGHT JOIN `users` ON `users`.`id` = `messages`.`destination` 
                            WHERE `sender` = ?
                    ";
                    require_once "creds.php";
                    try{
                        $db = new PDO($db_dsn, $db_user, $db_pass);
                        $stmt = $db->prepare($sql);
                        $stmt->execute([$_SESSION['uid'], $_SESSION['uid']]);

                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($result as $user){
                            echo '<li><button class="friend" name = '.$user['login'].'>'.$user['login'].'</button></li>';
                        }
                    }catch(PDOException $e){ 
                        echo "Server error - Can't fetch friends </br>";
                    }
                ?>
            </ul>
        </section>
    </main>
    <script src ="conversation.js"></script>
</body> 
</html>