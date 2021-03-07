<?php 
session_start();
$_SESSION['prava']="-";

unset($_SESSION['user']); 
header('Location: /login.php'); die();
?>