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

        
        $c_name = $_POST['c_name'];
       $id_vid = $_POST['id_vid'];
       $c_country = $_POST['c_country'];
       $c_diam = $_POST['c_diam'];
	   $weight = $_POST['weight'];
	   $power = $_POST['power'];
	   $c_kol_d = $_POST['c_kol_d'];
	   $c_size = $_POST['c_size'];
	   $c_firm = $_POST['c_firm'];
       $c_vhod = $_POST['c_vhod'];
       $c_vihod = $_POST['c_vihod'];
	   $c_imp = $_POST['c_imp'];
       $type_id = $_POST['type_id'];
       
	   $target = $_POST['target'];
	   $c_descripton = $_POST['c_descripton'];
	   $c_site = $_POST['c_site'];

	   $photo = 'images/combo/' .time(). $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $photo);

        mysqli_query($link, "INSERT INTO `combo` (`c_id`, `id_vid`, `c_name`, `c_photo`, `c_kol_d`, `c_vhod`, `c_vihod`, 
`c_size`, `c_diam`, `c_country`, `c_firm`, `c_imp`, `type_id`, `c_descripton`, `power`, `weight`, `c_site`,
 `target`)
 VALUES (NULL, '$id_vid', '$c_name', '$photo', '$c_kol_d', '$c_vhod', '$c_vihod', '$c_size', '$c_diam',
  '$c_country', '$c_firm', '$c_imp', '$type_id', '$c_descripton', '$power', '$weight', '$c_site', '$target')");

  echo '<meta http-equiv="refresh" content="0; url=admin_combik.php" />';

?>





