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
      
        
        $p_name = $_POST['p_name'];
       $id_vid = $_POST['id_vid'];
       $p_country = $_POST['p_country'];
       
	   $p_giv = $_POST['p_giv'];
	   $p_vhod = $_POST['p_vhod'];
	   $p_vihod = $_POST['p_vihod'];
	   $p_size = $_POST['p_size'];
	   $p_masa = $_POST['p_masa'];
	   $p_firm = $_POST['p_firm'];
       $p_kol_e = $_POST['p_kol_e'];
	   $p_add = $_POST['p_add'];
	   $p_site = $_POST['p_site'];

	   $photo = 'images/pedal/' .time(). $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $photo);

mysqli_query($link, "INSERT INTO `pedal` (`p_id`, `p_name`, `id_vid`, `p_firm`, `p_kol_e`, `p_vhod`, 
`p_vihod`, `p_giv`, `p_size`, `p_masa`, `p_add`, `p_country`, `p_photo`, `p_site`) 
VALUES (NULL, '$p_name', '$id_vid', '$p_firm',
  '$p_kol_e', '$p_vhod', '$p_vihod', '$p_giv', '$p_size', '$p_masa', '$p_add', '$p_country', '$photo', '$p_site')");

     
   echo '<meta http-equiv="refresh" content="0; url=admin_pedal.php" />';

?>





