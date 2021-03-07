<?php 
session_start();
include "connect.php";

$login = $_POST['login'];
$password = $_POST['password'];

$check_admin = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$login' and `password` = '$password'");

    if(mysqli_num_rows($check_admin) == false)
{
    $_SESSION['message'] = "Не вірно набраний логін або пароль";
    echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://test/login.php"></HEAD></HTML>';

    
}  
else  {
    echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://test/home.php"></HEAD></HTML>';
                                                                 
    $admin = mysqli_fetch_assoc($check_admin);

    $_SESSION['user'] = [
        "name" => $admin['First_name'],
        "last_name" => $admin['Last_name'],
        "id" => $admin['user_id'],
    ];
    $_SESSION['prava'] = "yes";
}
?>