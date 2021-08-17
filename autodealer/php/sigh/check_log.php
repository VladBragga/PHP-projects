<?
session_start();
include "../connect.php";
$username_login = filter_var(trim($_POST['username_login']), FILTER_SANITIZE_STRING);
$password_login = filter_var(trim($_POST['password_login']), FILTER_SANITIZE_STRING);


    if(mb_strlen($username_login) < 3 || mb_strlen($username_login) > 200){
        $_SESSION['username_login'] = 'Недопустима довжина логіну';
        header('Location:http://autodealer/13_sigh.php');
    }
    if(mb_strlen($password_login) < 4 || mb_strlen($password_login) > 80){
        $_SESSION['password_login'] = 'Недопустима довжина паролю';
        header('Location:http://autodealer/13_sigh.php');
    }

    $password = md5($password_login);

$check_users = mysqli_query($link, "SELECT * FROM `users` WHERE `nickname` = '$username_login' and `password` = '$password'");

 if (mysqli_num_rows($check_users) > 0){

    $user = mysqli_fetch_assoc($check_users);
    if($user['role'] == 1)  $role='користувач';
    if($user['role'] == 2)  $role='адміністратор';
    if($user['role'] == 3)  $role='творец';
    $full_name_user = stristr($user['full_name'], ' ', true);
    $_SESSION['login'] = $user['nickname'];

    $_SESSION['user'] = [
        "id" => $user['id_users'],
        "name" => $user['nickname'],
        "mail" => $user['email'],
        "role" => $role,
        "full_name" => $full_name_user,
    ];
    header('Location:http://autodealer/13_sigh.php');

} else{
    $_SESSION['login_error'] = "Такого користувача не існує!";
    header('Location:http://autodealer/13_sigh.php');
}
   

