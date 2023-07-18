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
    <title>Secret website</title>
</head>
<body>
    <h1>Welcome on secret page</h1>
</body>
</html>