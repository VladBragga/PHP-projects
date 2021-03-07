<?php

session_start();

if($_SESSION['prava']=="-")
{
	header('Location: /login.php'); die();
}

if(!($_SESSION['user']))
{
	header('Location: /login.php'); die();
}
		include "connect.php";
        include "functions.php";
        $funs =	new fun();
        $id = $_GET['id'];
           $pedal_id = $funs->get_pedal_id($id);
        mysqli_query($link, "DELETE FROM `pedal` WHERE `pedal`.`p_id` = '$id'");
        $img = $pedal_id['p_photo'];
  if(file_exists($img)) unlink($img); 

        echo '<meta http-equiv="refresh" content="0; url=admin_pedal.php" />';
?>