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
    
	 $g_name = $_POST['g_name'];
	  $id_vid = $_POST['id_vid'];
   $g_country = $_POST['g_country'];
	  $g_color = $_POST['g_color'];
	   $g_type_corpus = $_POST['g_type_corpus'];
	  $grif = $_POST['grif'];
	  $n_deka = $_POST['n_deka'];
	   $v_deka = $_POST['v_deka'];
	   $g_name_firm = $_POST['g_name_firm'];
	   $g_kol_s = $_POST['g_kol_s'];
	   $g_zvuk = $_POST['g_zvuk'];
	   $g_string = $_POST['g_string'];
	  $target = $_POST['target'];
	 $g_description = $_POST['g_description'];
	 $site = $_POST['site'];

   
   
   $photo = 'images/guitar/' .time(). $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $photo); 
mysqli_query($link, "INSERT INTO `guitar` (`g_id`, `g_name`, `g_photo`, `id_vid`, `g_country`, `g_color`, 
`g_type_corpus`, `grif`,`n_deka`, `v_deka`, `g_name_firm`, `g_kol_s`, `g_zvuk`, `g_string`, `target`, 
`g_description`, `site`) 
 VALUES (NULL, '$g_name', '$photo', ' $id_vid', '$g_country', '$g_color', '$g_type_corpus',
  '$grif', '$n_deka', '$v_deka', '$g_name_firm', '$g_kol_s', '$g_zvuk', 
 '$g_string', '$target', '$g_description', '$site')");
  
  echo '<meta http-equiv="refresh" content="0; url=admin_guitar.php" />';

?>





