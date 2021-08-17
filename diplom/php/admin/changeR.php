<?php
session_start();
if($_SESSION['user']['role'] != 'головний' && $_SESSION['user']['role'] != 'адміністратор')
{
	header('Location:http://diplom/index.php');
}
include '../connect.php';

include '../function/getId.php';

$id = $_GET['id'];

$riff_name = filter_var(trim($_POST['riff_name']), FILTER_SANITIZE_STRING);
$id_creator = $_POST['id_creator'];
$genre_id = $_POST['genre_id'];
$desc = $_POST['description'];
$description =  filter_var($desc, FILTER_SANITIZE_STRING);
$god = $_POST['god'];

$funs =	new get_id();
$riffs = $funs->get_riff_one_id($id);

if($riff_name != $riffs['riff_name']){
    $sql = "UPDATE `riff` SET `riff_name` = '$riff_name' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($id_creator !== $riffs['id_creator']){
    $sql = "UPDATE `riff` SET `id_creator` = '$id_creator' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($genre_id != $riffs['genre_id']){
    $sql = "UPDATE `riff` SET `genre_id` = '$genre_id' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($god != $riffs['god']){
    $sql = "UPDATE `riff` SET `god` = '$god' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($description != $riffs['description']){
    $sql = "UPDATE `riff` SET `description` = '$description' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}


if($_FILES["tab"]["name"] != NULL){
    $tab = 'B:/OpenServer/domains/diplom/uploads/riff/tab/' .time(). $_FILES["tab"]["name"];
    move_uploaded_file($_FILES["tab"]["tmp_name"], $tab); 

    $tab_del = $riffs['tabulatura'];
    if(file_exists($tab_del)) unlink($tab_del); 

    $sql = "UPDATE `riff` SET `tabulatura` = '$tab' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($_FILES["photo_tab"]["name"] != NULL){
    $photo_tab = 'B:/OpenServer/domains/diplom/uploads/riff/photo_tab/' .time(). $_FILES["photo_tab"]["name"];
    move_uploaded_file($_FILES["photo_tab"]["tmp_name"], $photo_tab);

    $tab_photo = $riffs['photo_tab'];
    if(file_exists($tab_photo)) unlink($tab_photo); 

    $sql = "UPDATE `riff` SET `photo_tab` = '$photo_tab' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($_FILES["riff_audio"]["name"] != NULL){
    $audio = 'B:/OpenServer/domains/diplom/uploads/riff/audio/' .time(). $_FILES["riff_audio"]["name"];
    move_uploaded_file($_FILES["riff_audio"]["tmp_name"], $audio); 

    $audio_del = $riffs['riff_audio'];
    if(file_exists($audio_del)) unlink($audio_del);  

    $sql = "UPDATE `riff` SET `riff_audio` = '$audio' WHERE `id_riff` = '$id'";
    mysqli_query($link, $sql);
}
if($_FILES["riff_photo"]["name"] != NULL){ 
    $poster = 'B:/OpenServer/domains/diplom/uploads/riff/poster/' .time(). $_FILES["riff_photo"]["name"]; 
    move_uploaded_file($_FILES["riff_photo"]["tmp_name"], $poster); 

    $poster_del = $riffs['riff_photo']; 
    if(file_exists($poster_del)) unlink($poster_del); 

    $sql = "UPDATE `riff` SET `riff_photo` = '$poster' WHERE `id_riff` = '$id'"; 
    mysqli_query($link, $sql); 
}

header('Location:http://diplom/admin.php');




