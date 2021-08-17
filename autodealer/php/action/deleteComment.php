<?
session_start();
if(($_SESSION['user']['role'] != "адміністратор") && ($_SESSION['user']['role'] != "творец"))
{
	header('Location:http://autodealer/index.php');
}
$id_car = $_GET['car'];
$id_comment = $_GET['id'];

include '../connect.php';

mysqli_query($link, "DELETE FROM `comment` WHERE `id` = '$id_comment'");

header('Location:http://autodealer/06_product_page.php?id='.$id_car);