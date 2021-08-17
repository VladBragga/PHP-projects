<?php
session_start();
if(($_SESSION['user']['role'] != "адміністратор") && ($_SESSION['user']['role'] != "головний"))
{
	header('Location:http://diplom/index.php');
}

$id = $_GET['id'];
$riff = $_GET['riff'];
/* echo $riff; */
include '../connect.php';

include '../function/getId.php';

$funs = new get_id; 
$comment = $funs->get_comment_del($id);

$com = mysqli_fetch_assoc($comment);
 $id_com = $com['id'];
        mysqli_query($link, "DELETE FROM `comment` WHERE `id` = '$id_com'");

        header('Location:http://diplom/track_detail.php?id='.$riff.'');