<?
session_start();
include "php/connect.php";
if($_SESSION['user']) {
    header('Location:http://diplom/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="shortcut icon" href="style/3700480-microphone-radio-recording-sound-technology-vintage-voice_108745.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style_reg.css">
</head>
<body>
    <?php
        if ($_SESSION['full_name_error'] || $_SESSION['username_error'] || $_SESSION['mail_error'] ||
        $_SESSION['password_error'] || $_SESSION['password_confirm_error'] || $_SESSION['register_error']) {
           echo '<div class="form-container">
        <form action="php/log_reg/check_reg.php" class="form-box" enctype="multipart/form-data" method="post">
            <img src="images/avatar.jpg" alt="" class="user">
            <h1>Реєстрація</h1>';
            echo '<input type="text" id="full_name" name="full_name" value="'. $_SESSION['placeholder']['full_name'] .'" required>';
            echo '<input type="text" id="username" name="username" value="'. $_SESSION['placeholder']['username'] .'" required>';
            echo '<input type="file" name="avatar" required>';
            echo '<input type="text" id="mail" name="mail" value="' . $_SESSION['placeholder']['mail'] . '" required>';
            echo '<p>Досвід гри на гітарі</p>
            <select name="timing">
                <option value="Пару місяців">Пару місяців</option>
                <option value="1 рік">1 рік</option>
                <option value="2 роки">2 роки</option>
                <option value="3 роки">3 роки</option>
                <option value="4 роки">4 роки</option>
                <option value="5 років">5 років</option>
                <option value="5+ років">5+ років</option>
                <option value="10+ років">10+ років</option>
            </select>
        <p>Як навчилися грати</p>
            <select name="skill">
                <option value="музична школа">музична школа</option>
                <option value="самоучка">самоучка</option>
                <option value="музичний технікум">музичний технікум</option>
            </select>';
            echo '<input type="password" id="password" name="password" placeholder="Пароль" required>';
            echo '<input type="password" id="password_confirm" name="password_confirm" placeholder="Підтвердження пароля" required>';
            echo '<input type="submit" id="registration"  value="Реєстрація">';
                
                if ($_SESSION['full_name_error']) {
                    echo '<p class = "check_log">' . $_SESSION['full_name_error'] . '</p>';
                } else if ($_SESSION['username_error']) {
                    echo '<p class = "check_log">' . $_SESSION['username_error'] . '</p>';
                } else if ($_SESSION['mail_error']) {
                    echo '<p class = "check_log">' . $_SESSION['mail_error'] . '</p>';
                } else if ($_SESSION['password_error']) {
                    echo '<p class = "check_log">' . $_SESSION['password_error'] . '</p>';
                } else if ($_SESSION['password_confirm_error']) {
                    echo '<p class = "check_log">' . $_SESSION['password_confirm_error'] . '</p>';
                } else if ($_SESSION['register_error']) {
                    echo '<p class = "check_log">' . $_SESSION['register_error'] . '</p>';
                }
                
            echo '<h3>Є акаунт?  <a href="login.php" class="forgot__link">Вхід</a></h3>
            </form>'; 
                unset($_SESSION['placeholder']['full_name']);
                unset($_SESSION['placeholder']['mail']);
                unset($_SESSION['placeholder']['username']);
                unset($_SESSION['placeholder']['password']);
                unset($_SESSION['placeholder']['password_confirm']);  

                unset($_SESSION['full_name_error']);
                unset($_SESSION['mail_error']);
                unset($_SESSION['username_error']);
                unset($_SESSION['password_error']);
                unset($_SESSION['password_confirm_error']); 
                unset($_SESSION['register_error']);   
        }
            else { 
                ?> 
             <div class="form-container">
        <form action="php/log_reg/check_reg.php" class="form-box" enctype="multipart/form-data" method="post">
            <img src="images/avatar.jpg" alt="" class="user">
            <h1>Реєстрація</h1>
                <input type="text" id="full_name" name="full_name" placeholder="Повне ім'я" required>
                <input type="text" id="username" name="username" placeholder="Ім'я користувача" required>
                <input type="file" name="avatar" required>
                <input type="email" id="mail" name="mail" placeholder="Email" required>
                <p>Досвід гри на гітарі</p>
                    <select name="timing">
                        <option value="Пару місяців">Пару місяців</option>
                        <option value="1 рік">1 рік</option>
                        <option value="2 роки">2 роки</option>
                        <option value="3 роки">3 роки</option>
                        <option value="4 роки">4 роки</option>
                        <option value="5 років">5 років</option>
                        <option value="5+ років">5+ років</option>
                        <option value="10+ років">10+ років</option>
                    </select>
                <p>Як навчилися грати</p>
                    <select name="skill">
                        <option value="музична школа">музична школа</option>
                        <option value="самоучка">самоучка</option>
                        <option value="музичний технікум">музичний технікум</option>
                 </select>
                <input type="password" id="password" name="password" placeholder="Пароль" required>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Підтвердження пароля" required>
                <input type="submit" id="registration"  value="Реєстрація">
                <h3>Є акаунт?  <a href="login.php" class="forgot__link">Вхід</a></h3>
            </form>
            </div>
            <?php } ?>
</body>
</html>