<? session_start();
include "connect.php";
if(($_SESSION['user']))
{
	echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://test/exit_admin.php"></HEAD></HTML>';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

    <!-- Форма авторизации -->
    <h1>Phonebook</h1>
 <div class="start">
       
    <div class="menu">
        <button><a href="login.php">Login</a></button>
        <button><a href="book.php">Public Phonebook</a></button>
        <button><a href="index.php">Home</a></button>

    </div>
 </div>

    <div class='conteiner'>
<form class="box" action="sigh.php" method="POST">
    <h1>Login</h1>
    <label>Username</label>
    <input type='text' name="login" placeholder='Введите свой логин'>
    <label>Password</label>
    <input type='password' name="password" placeholder='Введите пароль'>
    <button type='submit' class='login-btn'>Login</button>
    <?php
						if($_SESSION['message']) {
							echo	'<p class="but">'.$_SESSION['message'].'</p>';
						}
						unset($_SESSION['message']);
						?>
</form>
    </div>
    <!-- <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="form.js"></script> -->
</body>
</html>