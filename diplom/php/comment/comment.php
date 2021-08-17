<?
session_start();
include "../connect.php";

$date = date("Y-m-d H:i:s");

$users_id = $_SESSION['user']['id'];
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$id_riff = $_SESSION['riff']['id'];


if(!mysqli_query($link, "INSERT INTO `comment` (`id`, `users_id`, `id_riff`, `comment`, `date`) 
VALUES (NULL, '$users_id', '$id_riff', '$message', '$date')")){
    die('Error 404');
};

header('Location:http://diplom/track_detail.php?id='.$id_riff);

unset($_SESSION['riff']['id']);
