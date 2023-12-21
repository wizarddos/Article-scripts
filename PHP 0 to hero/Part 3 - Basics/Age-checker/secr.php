<?php 
    $var = "password";
?>

<?=  
    password_hash($var, PASSWORD_DEFAULT)
?>