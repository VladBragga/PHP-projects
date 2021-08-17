<?
session_start();
include "../connect.php";
include "../action/get.php";

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
$rating = 0;
$photo1 = $_FILES["photo1"];
$photo2 =  $_FILES["photo2"];
$photo3 =  $_FILES["photo3"];
$photo4 =  $_FILES["photo4"];
$photo5 =  $_FILES["photo5"];

$types_img = ["image/jpeg", "image/png"];

$photo1 = $_FILES["photo1"]["size"] /  1000000;
$photo2 = $_FILES["photo2"]["size"] /  1000000;
$photo3 = $_FILES["photo3"]["size"] /  1000000;
$photo4 = $_FILES["photo4"]["size"] / 1000000;
$photo5 = $_FILES["photo5"]["size"] / 1000000;

$max_size_img_file = 3;

if($god == '0' || $typeEngine == '0' || $carcase == '0' ||$geare_box == '0' ||$mark == '0' || $level == '0' ){
    $_SESSION['error_input'] = 'Оберіть значення в полях select!';
     header('Location:http://autodealer/07_add.php');
    exit();
}

if($photo1 > $max_size_img_file || $photo2 > $max_size_img_file || $photo3 > $max_size_img_file || 
$photo4 > $max_size_img_file || $photo5 > $max_size_img_file){
    $_SESSION['error_size'] = 'Занадто великий розмір файлу фотографії!';
    header('Location:http://autodealer/07_add.php');
    exit();
}
$i = 0;
$func = new get_id();
$results = $func->get_all_car();
foreach($results as $result){
    if($result['name'] == $name){
        $i = 1; }
}

if($i == 1){
    $_SESSION['error_car'] = 'Такий автомобіль вже є в базі!';
    header('Location:http://autodealer/07_add.php');
    exit();
}
if(!in_array($_FILES["photo1"]["type"], $types_img) || !in_array($_FILES["photo2"]["type"], $types_img)
|| !in_array($_FILES["photo3"]["type"], $types_img)  || !in_array($_FILES["photo4"]["type"], $types_img)
|| !in_array($_FILES["photo5"]["type"], $types_img)) {
    $_SESSION['error_type'] = 'Файл неправильного формату для поля фотографії!';
    header('Location:http://autodealer/07_add.php');
    exit();
}

$photo1 = 'img/cars/' .time(). $_FILES["photo1"]["name"];
move_uploaded_file($_FILES["photo1"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo1);
$photo2 = 'img/cars/' .time(). $_FILES["photo2"]["name"];
move_uploaded_file($_FILES["photo2"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo2);
$photo3 = 'img/cars/' .time(). $_FILES["photo3"]["name"];
move_uploaded_file($_FILES["photo3"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo3);
$photo4 = 'img/cars/' .time(). $_FILES["photo4"]["name"];
move_uploaded_file($_FILES["photo4"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo4);
$photo5 = 'img/cars/' .time(). $_FILES["photo5"]["name"];
move_uploaded_file($_FILES["photo5"]["tmp_name"], 'B:/OpenServer/domains/autodealer/'.$photo5);
$date = date("Y-m-d H:i:s");

if(!mysqli_query($link, "INSERT INTO `cars` (`id`, `name`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, 
`engine`, `god`, `price`, `typeEngine`, `id_carcase`, `id_gear`, `date`, `id_mark`, `size`, `power`, `country`, `level`,
 `rating`, `link_of`, `link_no`, `description`) 
VALUES (NULL, '$name', '$photo1', '$photo2', '$photo3', '$photo4', '$photo5', '$engine', '$god', '$price', '$typeEngine',
 '$carcase', '$geare_box', '$date', '$mark', '$size', '$power', '$country', '$level', '$rating', '$link_of',
  '$link_no', '$opis')"))
{
    die('error');
}

mysqli_query($link, "INSERT INTO `gallery`(`id`,`name` `photo`) VALUES (NULL,'$name' ,'$photo1')");

header('Location:http://autodealer/04_catalog.php');
?>
