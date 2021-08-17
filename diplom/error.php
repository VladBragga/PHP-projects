<?
session_start();
include "php/connect.php";

/* if(($_SESSION['user']))
{
	echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://test/exit_admin.php"></HEAD></HTML>';
} */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffs.ua</title>
    <link rel="shortcut icon" href="style/3700480-microphone-radio-recording-sound-technology-vintage-voice_108745.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/index.css">
    <script src="script/jquery-2.2.3.min.js"></script>
</head>
<body>
                     <!--  start header  --> 
    <header>
        <nav>
        <img class="logo" src="style/RIFFS.UA.png" alt="logo">
        <div class="nav-items">   
                <li><a href="index.php">Головна</a></li>
                <li><a href="tracks.php">Рифи</a></li>
             <? if($_SESSION['user'])
              echo  '<li><a href="profile.php">Профіль</a></li>';
              ?>
                <li><a href="about.php">Про нас</a></li>
                <? if($_SESSION['user']['role'] == 'адміністратор')
              echo  '<li><a href="admin.php">Адмінка</a></li>';
              ?>
        </div>
        <?if($_SESSION['user'])
            {
              echo ' <h5 class="users_name">'. $_SESSION['user']['name']. '</h5> ';
             echo' <a class="cta_2" href="php/exit.php"><button><i class="fa fa-sign-out"></i>Вийти</button></a>';
            }
        else{?>
        <form action="login.php">
        <a class="cta" href="registration.html"><button>Авторизація</button></a>
    </form>
       <? }  ?>
    </nav>
    </header>
          
   <div class="error_img">
        <img src="images/kriptown.gif" alt="">
   </div>

   <!--start footer-->

   <footer class="section footer-classic context-dark bg-image" style="background: linear-gradient(to top, #636363, #b4b4b4);">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-4 col-xl-5">
          <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/logo.png" alt="" width="200"></a>
            <p>Музыка — это откровение более высокое, чем муд­рость и философия.</p>
            <!-- Rights-->
            <p class="rights"><span>©  </span><span class="copyright-year">Л. Бетховен</span><span> </span></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contacts">
          <h5>Контакти</h5>
          <dl class="contact-list">
            <dt>Адрес:</dt>
            <dd>Дніпро, вул. Тітова</dd>
          </dl>
          <dl class="contact-list">
            <dt>Пошта:</dt>
            <dd><a href="mailto:vladbragga2005@gmail.com">vladbragga2005@gmail.com</a></dd>
          </dl>
         
        </div>
      </div>
        <div class="col-md-4 col-xl-3">
          <h5>Сторінки</h5>
          <ul class="nav-list">
            <li><a href="index.php">Головна</a></li>
            <li><a href="tracks.php">Рифи</a></li>
            <li><a href="about.php">Про автора</a></li>
            <? if($_SESSION['users']['username']){
              echo' <li><a href="php/exit.php">Вийти</a></li>';
              }
                else{
                  echo '<li><a href="login.php">Авторизація</a></li>
                  <li><a href="registration.php">Реєстрація</a></li>';
                }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="row no-gutters social-container">
      
      <div class="col">
        <a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a> </div>
      <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
      <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>telegram</span></a></div>
    </div>
  </footer>
 
<!--end of footer-->

  
</body>
</html>