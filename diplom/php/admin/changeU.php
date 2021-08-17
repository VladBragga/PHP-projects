<?
session_start();
include "../connect.php";

$role =  $_GET['bool'];

$id_users =  $_GET['id'];

 $role == 'true' ?  $role_num = 2 : $role_num = 1;

 $sql = "UPDATE `users` SET `role`= '$role_num' WHERE `id_users` = '$id_users'";

 mysqli_query($link, $sql);

 header('Location:http://diplom/admin.php');
