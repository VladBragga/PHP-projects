<?php
session_start();
if(!$_SESSION['user'])
{
	header('Location:http://diplom/index.php');
}
$id = $_GET['id'];

include '../connect.php';

include '../function/getId.php';

$funs = new get_id; 
$riff = $funs->get_riff_one_id($id);

        mysqli_query($link, "DELETE FROM `user_riff` WHERE `id_riff` = '$id'");
        mysqli_query($link, "DELETE FROM `riff` WHERE `id_riff` = '$id'");
        mysqli_query($link, "DELETE FROM `comment` WHERE `id_riff` = '$id'");
        mysqli_query($link, "DELETE FROM `rating` WHERE `id_riff` = '$id'");

        $poster = $riff['riff_photo']; 
        $tab = $riff['tabulatura'];
        $tab_photo = $riff['photo_tab'];
        $audio = $riff['riff_audio'];

        if(file_exists($poster)) unlink($poster); 
        if(file_exists($tab)) unlink($tab); 
        if(file_exists($tab_photo)) unlink($tab_photo); 
        if(file_exists($audio)) unlink($audio); 

        header('Location:http://diplom/profile.php');
