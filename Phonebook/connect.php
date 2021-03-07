<?php

    $connect = "localhost";
    $username = "root";
    $password = "root";
    $name_db = "phonebook";

    $link = mysqli_connect($connect, $username, $password, $name_db);
     
    if( $link == False)
    {
     die('Error connect to database!');
    }
?>
  