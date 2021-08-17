<?
session_start();
include "../connect.php";

$riff_name = filter_var(trim($_POST['riff_name']), FILTER_SANITIZE_STRING);
$id_creator = $_POST['id_creator'];
$genre_id = $_POST['genre_id'];
$desc = $_POST['description'];
$description =  filter_var($desc, FILTER_SANITIZE_STRING);
$god = $_POST['god'];
$types_img = ["image/jpeg", "image/png"];
$types_file = ["application/pdf", "application/octet-stream"];
$types_audio = ["audio/mpeg"];

$poster_size = $_FILES["riff_photo"]["size"] / 1048576;
$tab_size = $_FILES["tab"]["size"] / 1048576;
$tab_photo_size = $_FILES["photo_tab"]["size"] / 1048576;
$audio_size = $_FILES["riff_audio"]["size"] / 1000000;

$max_size_img_file = 2;
$max_size_audio = 8;

if($poster_size > $max_size_img_file){
    $_SESSION['error_size'] = 'Занадто великий розмір файлу!';
    header('Location:http://diplom/add_track.php');
    exit();
}
if($tab_size > $max_size_img_file){
    $_SESSION['error_size'] = 'Занадто великий розмір файлу!';
    header('Location:http://diplom/add_track.php');
    exit();
}
if($tab_photo_size > $max_size_img_file){
    $_SESSION['error_size'] = 'Занадто великий розмір файлу!';
    header('Location:http://diplom/add_track.php');
    exit();
}
if($audio_size > $max_size_audio){
    $_SESSION['error_size'] = 'Занадто великий розмір файлу!';
    header('Location:http://diplom/add_track.php');
    exit();
}

if(!in_array($_FILES["photo_tab"]["type"], $types_img)) {
    $_SESSION['error_type'] = 'Файл неправильного формату для цього поля!';
    header('Location:http://diplom/add_track.php');
    exit();
}
if(!in_array($_FILES["riff_photo"]["type"], $types_img)){
    $_SESSION['error_type'] = 'Файл неправильного формату для цього поля!';
    header('Location:http://diplom/add_track.php');
    exit();
}
if(!in_array($_FILES["tab"]["type"], $types_file)){
    $_SESSION['error_type'] = 'Файл неправильного формату для цього поля!';
    header('Location:http://diplom/add_track.php');
    exit();
}
if(!in_array($_FILES["riff_audio"]["type"], $types_audio)){
    $_SESSION['error_type'] = 'Файл неправильного формату для цього поля!';
    header('Location:http://diplom/add_track.php');
    exit();
}
$date = date("Y-m-d H:i:s");

$poster = 'B:/OpenServer/domains/diplom/uploads/riff/poster/' .time(). $_FILES["riff_photo"]["name"];
move_uploaded_file($_FILES["riff_photo"]["tmp_name"], $poster); 

$audio = 'B:/OpenServer/domains/diplom/uploads/riff/audio/' .time(). $_FILES["riff_audio"]["name"];
move_uploaded_file($_FILES["riff_audio"]["tmp_name"], $audio); 

$photo_tab = 'B:/OpenServer/domains/diplom/uploads/riff/photo_tab/' .time(). $_FILES["photo_tab"]["name"];
move_uploaded_file($_FILES["photo_tab"]["tmp_name"], $photo_tab); 

$tab = 'B:/OpenServer/domains/diplom/uploads/riff/tab/' .time(). $_FILES["tab"]["name"];
move_uploaded_file($_FILES["tab"]["tmp_name"], $tab); 

if(!mysqli_query($link, "INSERT INTO `riff` (`id_riff`, `riff_name`, `riff_photo`, `god`, `tabulatura`, 
`photo_tab`, `riff_audio`, `genre_id`, `date`, `id_creator`, `description`) 
VALUES (NULL, '$riff_name', '$poster', '$god', '$tab', '$photo_tab', '$audio', '$genre_id', '$date', 
'$id_creator', '$description')"))

{
    die('error');
}

$get_id = mysqli_query($link, "SELECT * FROM `riff` WHERE `date` = '$date'");

$id =  mysqli_fetch_all($get_id);
 $id_riff = $id[0][0];
 $id_users = $_SESSION['user']['id'];

mysqli_query($link, "INSERT INTO `user_riff` (`id`, `id_riff`, `users_id`) VALUES (NULL, '$id_riff', '$id_users')");

header('Location:http://diplom/profile.php');
?>
