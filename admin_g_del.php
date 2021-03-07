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
        $gitara_id = $funs->get_gitar_id($id);
        mysqli_query($link, "DELETE FROM `guitar` WHERE `guitar`.`g_id` = '$id'");
        $img = $gitara_id['g_photo'];
        if(file_exists($img)) unlink($img); 
        echo '<meta http-equiv="refresh" content="0; url=admin_guitar.php" />';
?>