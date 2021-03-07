<?php 
session_start();
include "connect.php";

$login = $_POST['login'];
$password = md5($_POST['password']);

$check_admin = mysqli_query($link, "SELECT * FROM `varification` WHERE useraname = '$login' and password = '$password'");

if(mysqli_num_rows($check_admin) > 0)
{
    echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://guitarabc/home.php"></HEAD></HTML>';

    $admin = mysqli_fetch_assoc($check_admin);

    $_SESSION['user'] = [
        "name" => $admin['full_name'],
        "login" => $admin['username']
    ];
    $_SESSION['prava'] = "123";
}  
else  {
     $_SESSION['message'] = "Не вірний логін або пароль";
    echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://guitarabc/login.php"></HEAD></HTML>';
}
?>