<?
session_start();
include "../connect.php";

$full_name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$pass_confirm = filter_var(trim($_POST['password_confirm']), FILTER_SANITIZE_STRING);
$first_part = $_POST['timing'];
$second_part = $_POST['skill'];
$experience = $first_part . ',  ' . $second_part;

$_SESSION['placeholder']['full_name'] = $full_name;
$_SESSION['placeholder']['username'] = $username;
$_SESSION['placeholder']['mail'] = $mail;

    if(mb_strlen($full_name) < 5 || mb_strlen($full_name) > 200){
        $_SESSION['full_name_error'] = 'Недопустима довжина імені';
        header('Location:http://diplom/registration.php');
        exit();
    }
    if(mb_strlen($username) < 3 || mb_strlen($username) > 80){
        $_SESSION['username_error'] = 'Недопустима довжина username';
        header('Location:http://diplom/registration.php');
        exit();
    }
    if(mb_strlen($mail) < 11 || mb_strlen($mail) > 200){
        $_SESSION['mail_error'] = 'Недопустима довжина e-mail';
        header('Location:http://diplom/registration.php');
        exit();
    }
    if(mb_strlen($pass) < 4 || mb_strlen($pass) > 220){
        $_SESSION['password_error'] = 'Недопустима довжина паролю';
        header('Location:http://diplom/registration.php');
        exit();
    }
    if(mb_strlen($pass_confirm) < 4 || mb_strlen($pass_confirm) > 220 || $pass_confirm !== $pass){
        $_SESSION['password_confirm_error'] = 'Паролі не збігаються';
        header('Location:http://diplom/registration.php');
        exit();
    }
    
    $check = 0;
    $check = mysqli_query($link, "SELECT * FROM `users` WHERE `nickname` = '$username'");
    $check_me = mysqli_fetch_assoc($check);

    if($check_me === NULL) {
        $password = md5($pass);
        $photo = 'B:/OpenServer/domains/diplom/uploads/avatar/' .time(). $_FILES["avatar"]["name"];
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $photo); 

   mysqli_query($link, "INSERT INTO `users` (`id_users`, `nickname`, `user_photo`, `password`, `full_name`, `mail`, `experience`, `role`) VALUES (NULL, '$username', '$photo', '$password', '$full_name', '$mail', '$experience','1')");
   
   $check_users = mysqli_query($link, "SELECT * FROM `users` WHERE `nickname` = '$username' or `mail` = '$mail'");
   $user = mysqli_fetch_assoc($check_users);

    $_SESSION['users']['$full_name'] = stristr($full_name, ' ', true);
    $_SESSION['users']['username'] = $username;
    $_SESSION['users']['success_message'] = $username;
   
    if($user['role'] == 1)  $role='користувач';
    $avatar =  $user['user_photo']; 
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
}
    else{
        $_SESSION['register_error'] = 'Такий користувач вже існує!';
        header('Location:http://diplom/registration.php');
        exit();
    }