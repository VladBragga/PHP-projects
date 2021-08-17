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
    <title>Login</title>
    <link rel="shortcut icon" href="style/3700480-microphone-radio-recording-sound-technology-vintage-voice_108745.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style_aut.css">
</head>
<body>
<?   if ($_SESSION['login_error'] || $_SESSION['pass_error']) {
          echo  '<div class="form-container">
            <form action="php/log_reg/check_log.php" class="form-box" method="post">
                <img src="images/avatar.jpg" alt="" class="user">
                <h1>Ласкаво просимо!</h1>
                <input type="text" name="username"  value="'. $_SESSION['username_place'] . '">
                <input type="password" name="password" placeholder="Пароль">
                <input type="submit" value="Вхід">';

                if ($_SESSION['pass_error']) {
                    echo '<p class = "check_log">' . $_SESSION['pass_error'] . '</p>';
                }
             if ($_SESSION['username_error']) {
                    echo '<p class = "check_log">' . $_SESSION['username_error'] . '</p>';
                }
            if ($_SESSION['login_error']) {
                    echo '<p class = "check_log">' . $_SESSION['login_error'] . '</p>';
                }
             echo '<!--   <a href="index.html" class="forgot__link">Забули пароль?</a> -->
                <a href="registration.php" class="forgot__link">Реєстрація</a>
                
            </form>
        </div>';
        unset($_SESSION['login_error']);
        unset($_SESSION['username_error']);
        unset($_SESSION['pass_error']);
        }
        else{?>    
    <div class="form-container">
        <form action="php/log_reg/check_log.php" class="form-box" method="post">
            <img src="images/avatar.jpg" alt="" class="user">
            <h1>Ласкаво просимо!</h1>
            <input type="text" name="username"  placeholder="Ім'я користувача">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" value="Вхід">
            <a href="registration.php" class="forgot__link">Реєстрація</a>
            
        </form>
    </div>
   <? };?>
</body>
</html>
