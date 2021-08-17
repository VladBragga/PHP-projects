<?php
session_start();
if($_SESSION['user']['role'] != 'творец' && $_SESSION['user']['role'] != 'адміністратор')
{
	header('Location:http://autodealer/index.php');
}
$id = $_GET['id'];

include '../connect.php';

include '../action/get.php';

$funs = new get_id(); 
$user = $funs->get_users_one($id);
  
        mysqli_query($link, "DELETE FROM `comment` WHERE `id_users` = '$id'");
        mysqli_query($link, "DELETE FROM `rating` WHERE `id_users` = '$id'");
        mysqli_query($link, "DELETE FROM `users` WHERE `id_users` = '$id'");

        $avatar = 'B:/OpenServer/domains/autodealer/'.$user['photo']; 
        if(file_exists($avatar)) unlink($avatar); 

        header('Location:http://autodealer/05_admin.php');
