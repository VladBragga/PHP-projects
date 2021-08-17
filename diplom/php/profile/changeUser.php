<?
session_start();
include "../connect.php";

$full_name = filter_var(trim($_POST['full_name']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$experience = filter_var(trim($_POST['experience']), FILTER_SANITIZE_STRING);
$id = $_SESSION['user']['id'];
     if(mb_strlen($full_name) < 5 || mb_strlen($full_name) > 200){
        $_SESSION['full_name_error'] = 'Недопустима довжина імені';
        header('Location:http://diplom/profile.php');
        exit();
    }
    if(mb_strlen($name) < 3 || mb_strlen($name) > 80){
        $_SESSION['name_error'] = 'Недопустима довжина username';
        header('Location:http://diplom/profile.php');
        exit();
    }
    if(mb_strlen($mail) < 11 || mb_strlen($mail) > 200){
        $_SESSION['mail_error'] = 'Недопустима довжина e-mail';
        header('Location:http://diplom/profile.php');
        exit();
    }
    if(mb_strlen($experience) < 8 || mb_strlen($experience) > 200){
        $_SESSION['experience_error'] = 'Недопустима довжина поля досвід';
        header('Location:http://diplom/profile.php');
        exit();
    } 
if($_FILES["avatar"]["name"]){
     $photo = 'B:/OpenServer/domains/diplom/uploads/avatar/' .time(). $_FILES["avatar"]["name"];
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $photo); 
    unlink($_SESSION['user']['photo']);

        mysqli_query($link, "UPDATE `users` SET `nickname` = '$name', `user_photo`='$photo', `full_name` = '$full_name', `mail` = '$mail', `experience`='$experience' WHERE `id_users` = '$id'");
        
    $user_id = mysqli_query($link, "SELECT * FROM `users` WHERE `id_users` = '$id'");

   $user = mysqli_fetch_assoc($user_id);

   if($user['role'] == 1)  $role='користувач';
    if($user['role'] == 2)  $role='адміністратор'; 
    if($user['role'] == 3)  $role='головний';
        $_SESSION['user'] = [
            "id" => $user['id_users'],
            "name" => $user['nickname'],
            "photo" => $user['user_photo'],
            "mail" => $user['mail'],
            "role" => $role,
            "full_name" => $user['full_name'],
            "experience" => $user['experience']
        ];
        $_SESSION['user']['update_success'] = "Інформація профіля оновлена!";
        header('Location:http://diplom/profile.php');
}
   
    mysqli_query($link, "UPDATE `users` SET  `nickname` = '$name', `full_name` = '$full_name', `mail` = '$mail', `experience`='$experience' WHERE `id_users` = '$id'");
    $user_id = mysqli_query($link, "SELECT * FROM `users` WHERE `id_users` = '$id'");

   $user = mysqli_fetch_assoc($user_id);
   if($user['role'] == 1)  $role='користувач';
   if($user['role'] == 2)  $role='адміністратор'; 
   if($user['role'] == 3)  $role='головний';
        $_SESSION['user'] = [
            "id" => $user['id_users'],
            "name" => $user['nickname'],
            "photo" => $user['user_photo'],
            "mail" => $user['mail'],
            "role" => $role,
            "full_name" => $user['full_name'],
            "experience" => $user['experience']
        ];
        $_SESSION['user']['update_success'] = "Інформація профіля оновлена!";
        header('Location:http://diplom/profile.php');