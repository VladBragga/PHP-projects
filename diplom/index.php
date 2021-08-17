<?
session_start();
include "php/connect.php";
include "php/function/getId.php"
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
                <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Головна</a></li>
                <li><a href="tracks.php">Рифи</a></li>
             <? if($_SESSION['user'])
              echo  '<li><a href="profile.php">Профіль</a></li>';
              ?>
                <li><a href="about.php">Про нас</a></li>
                <? if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'головний')
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

     <form action="php/search/search.php" method="POST" class="search">
        <input name="search" placeholder="Шукати тут..." type="search" required>
        <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> Пошук</button>
      </form>

    </nav>
    </header>
                    <!--  end header  --> 
                    <?
        if ($_SESSION['users']['success_message']){
        echo '<div class="popup-bg">
                <div class="popup">
                    <img class="close-popup" src="images/close.png" alt="icon">';
                        echo '<p>Ласкаво просимо на сайт для музикантів, ' . $_SESSION['users']['success_message'] . '!</p>';
                echo '</div>
            </div>';  
    ?>
    <script>
        $('.close-popup').click(function() {
        $('.popup-bg').fadeOut(500);
        });
    </script>
    <?php
      unset($_SESSION['users']['success_message']);
    };
        if ($_SESSION['login']){
        echo '<div class="popup-bg">
                <div class="popup">
                    <img class="close-popup" src="images/close.png" alt="icon">';
                        echo '<p>Ви успішно авторизувалися, ' . $_SESSION['login'] . '!</p>';
                echo '</div>
            </div>';  
    ?>
    <script>
        $('.close-popup').click(function() {
        $('.popup-bg').fadeOut(400);
        });
    </script>
    <?php
      unset($_SESSION['login']);
    };
    
   /* ========= SEARCH START ========= */
    if($_SESSION['search_result']){

        $sql = $_SESSION['search_result'];
        $searches = mysqli_query($link, $sql);
        $check =  mysqli_fetch_assoc($searches);
         $funs =	new get_id();
        
        echo '<div class="popup-bg">
        <div class="popup2">
            <img class="close-popup" src="images/close.png" alt="icon">';
            if($check !== NULL){
              foreach($searches as $search){
               $band = $funs->get_creator($search['id_creator']);?>
               <a href="../track_detail.php?id=<?=$search['id_riff']?>"><?=$search['riff_name']?> - <?echo $band['c_name']?></a>
             <? }
             } else {?> <h4>Таких рифів не існує в базі!</h4>  <?}
        echo '</div>
    </div>'; ?>
        
        <script>
          $('.close-popup').click(function() {
          $('.popup-bg').fadeOut(400);
        });
        </script><?
        
          unset($_SESSION['search_result']);
    }  
    /* ======== SEARCH END ========== */?>
                    <!--  slider  --> 
                <div class="slider">
                  <div class="slider-size"><h1>RIFFS</h1></div>
                  <h3>GUITAR CLUB</h3>
                  <? print_r($_SESSION['search']);?>
                </div>
                <div class="back">
                    <!--  end slider  --> 
                    <div class="zagolovok"><h1>Нові    3    рифа</h1></div>

                    <!--  start content  --> 
                    <?	$get_id = new get_id(); 
                        $get_date = new function_time();
                        $riffs = $get_id->get_main_riff();
                         
                    ?>
    <div class="conteiner">
        <div class="row">
          <?foreach($riffs as $riff){
              $band = $get_id->get_creator($riff['id_creator']);
              $genre = $get_id->get_genre($riff['genre_id']);
              $date = $get_date->set_time($riff['date']);  
              $poster = substr($riff['riff_photo'], 29, 200);
              $audio =  substr($riff['riff_audio'], 29, 200);
              $tab = substr($riff['photo_tab'], 29, 200);
              $description = substr($riff['description'], 0, 25);
              $description = $description.'...';
              $ratings = $get_id->get_rating($riff['id_riff']);

                          $rat = mysqli_fetch_assoc($ratings);
                          if($rat !== NULL){
                            foreach ($ratings as $rating)
                            {
                              $kol_rating++;
                              $value_rating += $rating['value'];
                            }
                            $mark = $value_rating/$kol_rating;
                            if($mark < 5 && $mark > 4.5) { $mark = 4.5; }
                            if($mark < 4.5 && $mark > 4) { $mark = 4; }
                            if($mark < 4 && $mark > 3.5) { $mark = 3.5; }
                            if($mark < 3.5 && $mark > 3) { $mark = 3; }
                            if($mark < 3 && $mark > 2.5) { $mark = 2.5; }
                            if($mark < 2.5 && $mark > 2) { $mark = 2; }
                            if($mark < 2 && $mark > 1.5) { $mark = 1.5; }
                            if($mark < 1.5 && $mark > 1) { $mark = 1; }
                            if($mark < 1 && $mark > 0.5) { $mark = 0.5; }

                            $mark = $mark.'/5';
                        }
                        else { $mark = '0/5';}
                        
            ?>
            <div class="col-sm-12">
              <div class=lay1>
               <div class="img_audio_main">
              <img class="image_audio" src="<?=$poster?>" alt=""></div>
              <h3><?=$riff['riff_name']?></h3>
            </div>
                            <!--  -->
                            <div class=lay2>
              <audio controls>
                <source src="<?=$audio?>" type="audio/ogg; codecs=vorbis">
                <source src="<?=$audio?>" type="audio/mpeg">
                Тег audio не підтримується вашим браузером.
                <a href="audio/music.mp3">Скачайте музику</a>.
              </audio>
                            <!--  -->
             <div class="description">
              <p>Виконавець: <?=$band['c_name']?></p>
              <p><?=$description?></p>
              <a href="../track_detail.php?id=<?=$riff['id_riff']?>"><button type="submit">Детальніше</button></a>
                           <fieldset class="rating" name="rating" id="mySelect" onchange="myFunction()" disabled>   
                              <?
                                      if($mark == 5 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 4.5){
                                    echo '<input type="radio" id="star5" name="rating" value="5" checked/><label class = "full" for="star5" title="Awesome - 5 stars"></label>';
                                      }
                                      else{
                                        echo '<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>';  
                                      }
                                      if($mark == 4.5 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 5){
                                       echo  '<input type="radio" id="star4half" name="rating" value="4.5" checked/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>';
                                          }
                                     if($mark == 4 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 5){
                                       echo '<input type="radio" id="star4" name="rating" value="4" checked/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
                                          }
                                 if($mark == 3.5 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star3half" name="rating" value="3.5" checked/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>';
                                          }  
                                   if($mark == 3 && $mark != 1 && $mark != 2 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star3" name="rating" value="3" checked/><label class = "full" for="star3" title="Meh - 3 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3" title="Meh - 3 stars"></label>';
                                          }   
                                     if($mark == 2.5 && $mark != 1 && $mark != 2 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star2half" name="rating" value="2.5" checked/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>';
                                          }   
                                    if($mark == 2 && $mark != 1 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star2" name="rating" value="2" checked/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
                                          }        
                                          if($mark == 1.5 && $mark != 1 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                            echo '<input type="radio" id="star1half" name="rating" value="1.5" checked/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>';
                                               }
                                               else{
                                           echo  '<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>';
                                               }   
                                    if($mark == 1 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                        echo '<input type="radio" id="star1" name="rating" value="1" checked/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
                                               }
                                               else{
                                          echo  '<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
                                               }   
                                         if($mark == 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                        echo '<input type="radio" id="starhalf" name="rating" value="0.5" checked/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
                                               }
                                               else{
                                          echo  '<input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
                                               }                ?>        
                                </fieldset>
                            <h5><?=$mark?></h5>

            </div>
          </div>
        </div>
          <!---->
      <?}?>
   
          </div>
     </div>
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
            <? if($_SESSION['user']['name']){
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