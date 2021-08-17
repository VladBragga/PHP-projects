<?
session_start();
include "../connect.php";
include "../action/get.php";
$func = new get_id();

$id = $_GET['id'];
$car = $func->get_car($id);

$mark = $_POST['mark'];
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$god = $_POST['god'];
$carcase = $_POST['carcase'];
$typeEngine = $_POST['typeEngine'];
$geare_box = $_POST['geare_box'];
$power = filter_var(trim($_POST['power']), FILTER_SANITIZE_STRING);
$engine = filter_var(trim($_POST['engine']), FILTER_SANITIZE_STRING);
$size = filter_var(trim($_POST['size']), FILTER_SANITIZE_STRING);
$price = $_POST['price'];
$link_of = filter_var(trim($_POST['link_of']), FILTER_SANITIZE_STRING);
$link_no = filter_var(trim($_POST['link_no']), FILTER_SANITIZE_STRING);
$opis = trim($_POST['opis']);
$country = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);
$level = $_POST['level'];

if($god != $car['god']){
    $sql = "UPDATE `cars` SET `god` = '$god' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($name != $car['name']){
    $sql = "UPDATE `cars` SET `name` = '$name' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($power != $car['power']){
    $sql = "UPDATE `cars` SET `power` = '$power' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($price != $car['price']){
    $sql = "UPDATE `cars` SET `price` = '$price' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($level != $car['level']){
    $sql = "UPDATE `cars` SET `level` = '$level' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($country != $car['country']){
    $sql = "UPDATE `cars` SET `country` = '$country' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($opis != $car['description']){
    $sql = "UPDATE `cars` SET `description` = '$opis' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($mark != $car['id_mark']){
    $sql = "UPDATE `cars` SET `id_mark` = '$mark' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($engine != $car['engine']){
    $sql = "UPDATE `cars` SET `engine` = '$engine' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($link_of != $car['link_of']){
    $sql = "UPDATE `cars` SET `link_of` = '$link_of' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($link_no != $car['link_no']){
    $sql = "UPDATE `cars` SET `link_no` = '$link_no' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($carcase != $car['id_carcase']){
    $sql = "UPDATE `cars` SET `id_carcase` = '$carcase' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($size != $car['size']){
    $sql = "UPDATE `cars` SET `size` = '$size' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($typeEngine != $car['typeEngine']){
    $sql = "UPDATE `cars` SET `typeEngine` = '$typeEngine' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}

$photo1 = $_FILES["photo1"];
$photo2 =  $_FILES["photo2"];
$photo3 =  $_FILES["photo3"];
$photo4 =  $_FILES["photo4"];
$photo5 =  $_FILES["photo5"];

if($_FILES["photo1"]["name"] != NULL){
    $photo1 = 'img/cars/' .time(). $_FILES["photo1"]["name"];
    move_uploaded_file($_FILES["photo1"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo1); 

    $photo1_del = 'B:/OpenServer/domains/autodealer/'.$car['photo1'];
    if(file_exists($photo1_del)) unlink($photo1_del); 

    $sql = "UPDATE `cars` SET `photo1` = '$photo1' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
    mysqli_query($link, "UPDATE `gallery` SET `photo` = '$photo1' WHERE `id` = '$id'");
}
if($_FILES["photo2"]["name"] != NULL){
    $photo2 = 'img/cars/' .time(). $_FILES["photo2"]["name"];
    move_uploaded_file($_FILES["photo2"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo2); 

    $photo2_del = 'B:/OpenServer/domains/autodealer/'.$car['photo2'];
    if(file_exists($photo2_del)) unlink($photo2_del); 

    $sql = "UPDATE `cars` SET `photo1` = '$photo2' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($_FILES["photo3"]["name"] != NULL){
    $photo3 = 'img/cars/' .time(). $_FILES["photo3"]["name"];
    move_uploaded_file($_FILES["photo3"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo3); 

    $photo3_del = 'B:/OpenServer/domains/autodealer/'.$car['photo3'];
    if(file_exists($photo3_del)) unlink($photo3_del); 

    $sql = "UPDATE `cars` SET `photo1` = '$photo3' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($_FILES["photo4"]["name"] != NULL){
    $photo4 = 'img/cars/' .time(). $_FILES["photo4"]["name"];
    move_uploaded_file($_FILES["photo4"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo4); 

    $photo4_del = 'B:/OpenServer/domains/autodealer/'.$car['photo4'];
    if(file_exists($photo4_del)) unlink($photo4_del); 

    $sql = "UPDATE `cars` SET `photo1` = '$photo4' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}
if($_FILES["photo5"]["name"] != NULL){
    $photo5 = 'img/cars/' .time(). $_FILES["photo5"]["name"];
    move_uploaded_file($_FILES["photo1"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo5); 

    $photo5_del = 'B:/OpenServer/domains/autodealer/'.$car['photo5'];
    if(file_exists($photo5_del)) unlink($photo5_del); 

    $sql = "UPDATE `cars` SET `photo1` = '$photo5' WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}

header('Location:http://autodealer/05_admin.php');
?>
