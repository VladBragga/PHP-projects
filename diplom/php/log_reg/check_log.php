<?
session_start();
include "../connect.php";

$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_EMAIL);
$_SESSION['username_place'] = $username;

    if(mb_strlen($username) < 4 || mb_strlen($username) > 200){
        $_SESSION['username_error'] = 'Недопустима довжина імені';
        header('Location:http://diplom/login.php');
        exit();
    }
    if(mb_strlen($pass) < 3 || mb_strlen($pass) > 80){
        $_SESSION['pass_error'] = 'Недопустима довжина паролю';
        header('Location:http://diplom/login.php');
        exit();
    }
$password = md5($pass);

$check_users = mysqli_query($link, "SELECT * FROM `users` WHERE `nickname` = '$username'");

 if (mysqli_num_rows($check_users) > 0){

    $user = mysqli_fetch_assoc($check_users);
    if($user['role'] == 1)  $role='користувач';
    if($user['role'] == 2)  $role='адміністратор'; 
    if($user['role'] == 3)  $role='головний';
    $_SESSION['login'] = $user['nickname'];
    $_SESSION['user'] = [
        "id" => $user['id_users'],
        "name" => $user['nickname'],
        "photo" => $user['user_photo'],
        "mail" => $user['mail'],
        "role" => $role,
        "full_name" => $user['full_name'],
        "experience" => $user['experience']
    ];
    header('Location:http://diplom/index.php');

} else{
    $_SESSION['login_error'] = "Такого користувача не існує!";
    header('Location:http://diplom/login.php');
}
?>
