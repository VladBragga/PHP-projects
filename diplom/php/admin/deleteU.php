<?php
session_start();
if($_SESSION['user']['role'] != 'головний' && $_SESSION['user']['role'] != 'адміністратор')
{
	header('Location:http://diplom/index.php');
}
$id = $_GET['id'];

include '../connect.php';

include '../function/getId.php';

$funs = new get_id; 
$user = $funs->get_users_one($id);
$riffs = $get_id->get_riff_id_user($id);
$checker = mysqli_fetch_assoc($riffs);
  
        mysqli_query($link, "DELETE FROM `user_riff` WHERE `users_id` = '$id'");
        mysqli_query($link, "DELETE FROM `comment` WHERE `users_id` = '$id'");
        mysqli_query($link, "DELETE FROM `rating` WHERE `id_users` = '$id'");
        mysqli_query($link, "DELETE FROM `users` WHERE `id_users` = '$id'");
        if($checker != 0)
        {      
        foreach($riffs as $riff){
            $id_r = $riff['id_riff'];
            mysqli_query($link, "DELETE FROM `riff` WHERE `id_riff` = '$id_r'");
        }
    }
        $avatar = $user['user_photo']; 
        if(file_exists($avatar)) unlink($avatar); 

        header('Location:http://diplom/admin.php');
