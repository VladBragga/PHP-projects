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
            $funs = new fun;

        $id = $_GET['id'];
        $comb = $funs->get_combo_id($id);
        mysqli_query($link, "DELETE FROM `combo` WHERE `combo`.`c_id` = '$id'");
        $img = $comb['c_photo'];
  if(file_exists($img)) unlink($img); 

        echo '<meta http-equiv="refresh" content="0; url=admin_combik.php" />';
?>