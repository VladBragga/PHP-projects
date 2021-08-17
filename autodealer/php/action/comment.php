<?
session_start();
include "../connect.php";

$date = date("Y-m-d H:i:s");

$id_users = $_SESSION['user']['id'];
$comment = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$id_car = $_SESSION['cars']['id'];


if(!mysqli_query($link, "INSERT INTO `comment` (`id`, `id_users`, `id_cars`, `comment`, `date`) 
VALUES (NULL, '$id_users', '$id_car', '$comment', '$date')")){
    die('Error 404');
};

header('Location:http://autodealer/06_product_page.php?id='.$id_car);

unset($_SESSION['cars']['id']);
