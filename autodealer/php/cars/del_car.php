<?php
session_start();
if(!($_SESSION['user']))
{
        header('Location:http://autodealer/index.php');
}
$id = $_GET['id'];
include '../connect.php';
include '../action/get.php';

$func = new get_id();
$car = $func->get_car($id);

        mysqli_query($link, "DELETE FROM `comment` WHERE `id_cars` = '$id'");
        mysqli_query($link, "DELETE FROM `rating` WHERE `id_cars` = '$id'");
        mysqli_query($link, "DELETE FROM `cars` WHERE `id` = '$id'");
        
        $photo1 = 'B:/OpenServer/domains/autodealer/'.$car['photo1']; 
        $photo2 = 'B:/OpenServer/domains/autodealer/'.$car['photo2'];
        $photo3 = 'B:/OpenServer/domains/autodealer/'.$car['photo3'];
        $photo4 = 'B:/OpenServer/domains/autodealer/'.$car['photo4'];
        $photo5 = 'B:/OpenServer/domains/autodealer/'.$car['photo5'];

        if(file_exists($photo1)) unlink($photo1); 
        if(file_exists($photo2)) unlink($photo2); 
        if(file_exists($photo3)) unlink($photo3); 
        if(file_exists($photo4)) unlink($photo4);  
        if(file_exists($photo5)) unlink($photo5);  

        header('Location:http://autodealer/05_admin.php');      
