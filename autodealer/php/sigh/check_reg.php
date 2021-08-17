<?
session_start();
include "../connect.php";

$full_name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_EMAIL);
$pass_confirm = filter_var(trim($_POST['password_confirm']), FILTER_SANITIZE_EMAIL);

    if(mb_strlen($full_name) < 5 || mb_strlen($full_name) > 80){
        $_SESSION['full_name'] = 'Недопустима довжина логіну';
        header('Location:http://autodealer/13_sigh.php');
        exit();
    }
    if(mb_strlen($username) < 3 || mb_strlen($username) > 70){
        $_SESSION['username'] = 'Недопустима довжина username';
        header('Location:http://autodealer/13_sigh.php');
        exit();
    }
    if(mb_strlen($mail) < 11 || mb_strlen($mail) > 70){
        $_SESSION['mail'] = 'Недопустима довжина e-mail';
        header('Location:http://autodealer/13_sigh.php');
        exit();
    }
    if(mb_strlen($pass) < 4 || mb_strlen($pass) > 30){
        $_SESSION['password'] = 'Недопустима довжина паролю';
        header('Location:http://autodealer/13_sigh.php');
        exit();
    }
    if(mb_strlen($pass_confirm) < 4 || mb_strlen($pass_confirm) > 30 || $pass_confirm !== $pass){
        $_SESSION['password_confirm'] = 'Паролі не збігаються';
        header('Location:http://autodealer/13_sigh.php');
        exit();
    }
    $password = md5($pass);

    $check = 0;
    $check = mysqli_query($link, "SELECT * FROM `users` WHERE `nickname` = '$username'");
    $check_me = mysqli_fetch_assoc($check);

    if($check_me === NULL) {
    $photo = "B:/OpenServer/domains/autodealer/img/users/" .time(). $_FILES["avatar"]["name"];
    move_uploaded_file($_FILES["avatar"]["tmp_name"], $photo); 

    mysqli_query($link, "INSERT INTO `users` (`full_name`, `nickname`,`photo`, `password`, `email`) 
    VALUES('$full_name', '$username', '$photo', '$password', '$mail')");
    $_SESSION['users']['success_message'] = 'Ви успішно зареєструвалися!';
    $_SESSION['users']['$full_name'] = stristr($full_name, ' ', true);
    $_SESSION['users']['username'] = $username;

    $check_users = mysqli_query($link, "SELECT * FROM `users` WHERE `nickname` = '$username' and `password` = '$password'");
   
       $user = mysqli_fetch_assoc($check_users);
       if($user['role'] == 1) 
        $role='користувач';
   
       $_SESSION['login'] = $user['nickname'];
       $full_name_user = stristr($user['full_name'], ' ', true);
       $_SESSION['user'] = [
           "id" => $user['id_users'],
           "name" => $user['nickname'],
           "mail" => $user['email'],
           "role" => $role,
           "full_name" => $full_name_user,
       ];
       header('Location:http://autodealer/13_sigh.php');
    }
    else {
        $_SESSION['register_error'] = 'Такий користувач вже існує!';
       header('Location:http://autodealer/13_sigh.php');
        exit();
    }
  