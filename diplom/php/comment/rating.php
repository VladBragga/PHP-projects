<?
session_start();
include "../connect.php";

$users_id = $_SESSION['user']['id'];

$id_riff = $_SESSION['riff']['id_rating'];
$value = $_POST['rating'];

$check_rating = mysqli_query($link, "SELECT rating.id_users, rating.id_riff, rating.value
 FROM `rating` WHERE `id_riff` = '$id_riff'");

$check_me = mysqli_fetch_assoc($check_rating);

if($check_me === NULL) {
    mysqli_query($link, "INSERT INTO `rating` (`id`, `id_users`, `id_riff`, `value`)
     VALUES (NULL, '$users_id', '$id_riff', '$value')");
}
else{
    $check_rating2 = mysqli_query($link, "SELECT rating.id_users, rating.id_riff, rating.value
    FROM `rating` WHERE `id_riff` = '$id_riff' and `id_users` = '$users_id'");

    $check_me2 = mysqli_fetch_assoc($check_rating2); // если чувак уже головал

    if($check_me2 === NULL) {
        mysqli_query($link, "INSERT INTO `rating` (`id`, `id_users`, `id_riff`, `value`)
        VALUES (NULL, '$users_id', '$id_riff', '$value')");
    }
}
header('Location:http://diplom/track_detail.php?id='.$id_riff);
unset($_SESSION['riff']['id_rating']);


