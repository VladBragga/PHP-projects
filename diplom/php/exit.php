<?php 
session_start();
$_SESSION['prava']="-";

unset($_SESSION['users']); 
unset($_SESSION['user']); 
header('Location: ../index.php'); 
die();
?>