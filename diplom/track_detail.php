<?
session_start();
include "php/connect.php";
include "php/function/getId.php";

	$funs =	new get_id();
  $get_date = new function_time();
	$riffs = $funs->get_riff_one_id($_GET['id']); 
  $ratings = $funs->get_rating($riffs['id_riff']);
  $rat = mysqli_fetch_assoc($ratings);

  $check_me2 = $funs->get_rating_user($_SESSION['user']['id'] , $riffs['id_riff']);
  $rating_user = mysqli_fetch_assoc($check_me2); // если чувак уже головал
    $comments = $funs->get_comment($riffs['id_riff']); // получаем все комменты этого рифа

   $rating_user === NULL ? $access_rating = 'yes' : $access_rating = 'no';
/* ========================= */
$kol_rating = 0;
$value_rating = 0;

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
  }
/* -=========================== */
    $_SESSION['riff']['id'] = $riffs['id_riff'];// чтобы передать ID рифа при создании коммента
    $_SESSION['riff']['id_rating'] = $riffs['id_riff'];
    
  $times = new function_time();
    $datatime = $times->set_time($riffs['date']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Riffs.ua</title>
      <link rel="shortcut icon" href="style/3700480-microphone-radio-recording-sound-technology-vintage-voice_108745.png" type="image/x-icon">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="style/details.css">
      <script src="script/jquery-2.2.3.min.js"></script>
</head>
<body>
   
          <!--  start header  --> 
          <header>
            <nav>
            <img class="logo" src="style/RIFFS.UA.png" alt="logo">
            <div class="nav-items">   
                    <li><a href="index.php">Головна</a></li>
                    <li><a  href="tracks.php"><i class="fa fa-music" aria-hidden="true"></i>  Рифи</a></li>
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
        
        <form action="" method="get" class="search">
            <input name="s" placeholder="Шукати тут..." type="search" required>
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i> Пошук</button>
          </form>
        </nav>
        </header>
                        <!--  end header  --> 

                        <!-- ================================
                        ======================================== -->
            <?      
            $poster = substr($riffs['riff_photo'], 29, 200);
            $audio = substr($riffs['riff_audio'], 29, 200);
            $tab =  substr($riffs['tabulatura'], 29, 200);
            $tab_photo = substr($riffs['photo_tab'], 29, 200);
                $band = $funs->get_creator($riffs['id_creator']);
               $photo_band = substr($band['photo'], 29, 200);
                $genre = $funs->get_genre($riffs['genre_id']); 
               
           /*  echo $tab; */
    
                $avtor = $funs->get_id_creator_riff($riffs['id_riff']);
                ?>          
                        <div class="container-fluid content">
                          <div class="row content">
                            <div class="col-sm-4">
                              <div class="player">
                                <div class="imgBx">
                                  <img src="<?=$poster?>" alt="">
                                </div>
                                <audio controls>
                <source src="<?=$audio?>" type="audio/ogg; codecs=vorbis">
                <source src="<?=$audio?>" type="audio/mpeg">
                Тег audio не поддерживается вашим браузером. 
                <a href="audio/music.mp3">Скачайте музыку</a>.
              </audio>
                              </div>
                            </div>
                        
                        <div class="col-sm-8">
                          <div class="detail">
                            <div class="name_track">
                              <h2><?=$riffs['riff_name']?></h2>
                              <hr>
                            </div>
                              <h2>Автор: <a href="#" class="open-popup2" title="Інформація про гурт"> <?=$band['c_name']?></a></h2>

                               <!--   ========================== -->
                                    <!--   Модальное окно  -->
                                  <div class="popup-bg2">
                                      <div class="popup2">
                                          <img class="close-popup" src="images/close.png" alt="">
                                         <form action="">
                                          <img src="<?=$photo_band?>" alt="">
                                          <p><?=$band['info']?></p>
                                          </form>
                                      </div>
                                  </div>
                                    <script>
                                    $('.open-popup2').click(function(e) {
                                      e.preventDefault();
                                      $('.popup-bg2').fadeIn(300);
                                      $('.rating').hide();
                                      var el = document.getElementsByClassName("comment")[0];
                                      var op = 0;
                                      el.style.opacity = op;
                                    });

                                    $('.close-popup').click(function() {
                                      $('.popup-bg2').fadeOut(50);
                                      $('.rating').show();  
                                      var el = document.getElementsByClassName("comment")[0];
                                      var op = 1;
                                      el.style.opacity = op;
                                    });

                                    function myFunction() {
                                      $('.rating_voice2').show();  
                                    }
                                    </script>
                                <!--   ========================== -->

                             <h5>Виклав: <?=$avtor['nickname']?> (<?=$avtor['experience']?>), <?=$datatime?></h5>
                              <hr>
                              <p><?=$riffs['description']?></p>
                              <!--   ========================== -->
                                    <!--   Модальное окно  -->
                              <div style="float: left;" class="tab_open">
                              <a href="#" title="Відкрити таби" class="open-popup">Таби</a>
                                <!-- <a href="#" class="open-popup">Напишіть мені</a> -->
                            </div>
    
                                  <div class="popup-bg">
                                      <div class="popup">
                                          <img class="close-popup" src="images/close.png" alt="">
                                         <form action="">
                                          <img src="<?=$tab_photo?>" alt="">
                                          </form>
                                      </div>
                                  </div>
                                    <script>
                                    $('.open-popup').click(function(e) {
                                      e.preventDefault();
                                      $('.popup-bg').fadeIn(300);
                                      $('.rating').hide();
                                      var el = document.getElementsByClassName("comment")[0];
                                      var op = 0;
                                      el.style.opacity = op;
                                    });

                                    $('.close-popup').click(function() {
                                      $('.popup-bg').fadeOut(50);
                                      $('.rating').show();  
                                      var el = document.getElementsByClassName("comment")[0];
                                      var op = 1;
                                      el.style.opacity = op;
                                    });

                                    function myFunction() {
                                      $('.rating_voice2').show();  
                                    }
                                    </script>
                                <!--   ========================== -->
                              <a class="download_link" href="<?=$tab?>" download="<?=$tab?>" title="Скачати табулатуру">
                                <button class="">Завантажити табулатуру</button>
                              </a>
                             
                              <hr>
                               <!-- -=============================- -->
                              <form action="php/comment/rating.php" class="" method="POST">
                              <div style="float: left;">
                              <? if($access_rating == 'no' || !$_SESSION['user']){ ?>
                              <fieldset class="rating" name="rating" id="mySelect" onchange="myFunction()" disabled> <!-- disabled --> <!-- checked -->
                             <? }
                              else{?>
                                   <fieldset class="rating" name="rating" id="mySelect" onchange="myFunction()">   
                                <? } 
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
                                </div>
                                <? if($rat !== NULL) {?>
                                <div class="rating_voice">
                               <? if($kol_rating == 1){
                               ?>    <h4><?=$mark?>/5   (<?=$kol_rating?> голос)</h4>  
                               <? } ?>
                                 <? if($kol_rating == 2 || $kol_rating == 3 || $kol_rating == 4){
                               ?>   <h4><?=$mark?>/5   (<?=$kol_rating?> голоси)</h4>  
                               <? } ?>
                                 <? if($kol_rating > 4) {
                               ?>   <h4><?=$mark?>/5   (<?=$kol_rating?> голосів)</h4>  
                                <? } ?>
                                </div>
                                <?}
                                else {?>
                                    <h4>0 оцінок</h4>
                               <? }?>
                                
                                <? if($_SESSION['user']) {?>
                              <button class="rating_voice2">Проголосувати</button>
                              <? } ?>
                              </form> 
                            </div>
                        </div>
                        <!-- ================== COMMENT  ======================== -->
                        <div class="comment">
                          <div class="row">
                          <div class="col-sm-5">
                            <?if(!$_SESSION['user']) {?>
                              <div class="not_auth_comment">
                                    <form action="login.php">
                                      <h5>Для того щоб залишати коментарі треба авторизуватися. </h5>
                                      <h5>Для авторизації перейдіть на сторінку авторизації за посиланням.</h5>
                               
                                      <button type="submit" class="btn btn-success">Авторизуватися</button>
                                    </form>
                                </div>
                            <?} else {?>
                              <h4>Ваш коментар:</h4>
                              <form role="form" action="php/comment/comment.php" method="POST">
                                <div class="form-group vvod">
                                  <textarea class="form-control" name="message" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Викласти</button>
                              </form>
                              <br><br>
                            <?}?>
                            </div>
                            <div class="col-sm-7"> 
                              <div class="comment_view">
                              <!-- ===================== -->
                              <?  
                              if(mysqli_fetch_assoc($comments) === NULL){?>
                                  <h4>На даний момент ніхто не коментував риф. Будьте першим!</h4>
                             <? }
                            else {
                              $kol = 0;  
                              foreach($comments as $comment) {  $kol++;  }
                               
                               if($kol == 1) {
                                ?><p><span class="badge"><?=$kol?></span> Коментар:</p><br>
                               <?}
                               if($kol == 2 || $kol == 3  || $kol == 4) {
                                ?><p><span class="badge"><?=$kol?></span> Коментарі:</p><br>
                               <?}
                               if($kol > 4) {
                                ?><p><span class="badge"><?=$kol?></span> Коментарів:</p><br>
                               <?}?>
                             
                              <div class="row">
                              <?  
                              foreach($comments as $comment) {
                                   $author_comment = $funs->get_id_users_comment($comment['users_id']); 
                                   $photo_user = substr($author_comment['user_photo'], 29, 200);
                                   $date = $get_date->set_time($comment['date']);  
                               ?>
                                <div class="col-sm-2 text-center">
                                  <img src="<?=$photo_user?>" class="img-circle" height="65" width="65" alt="Avatar">
                                </div>
                                <div class="col-sm-10">
                                  <h4><?=$author_comment['nickname']?>, <small><?=$date?></small></h4>
                                  <p><?=$comment['comment']?></p>
                                  <? if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'головний' || $author_comment['nickname'] == $_SESSION['user']['name'])   {
                                  
                                  echo '<a href="./php/comment/del_com.php?id=' .$comment['id'].'&riff='.$riffs['id_riff'].'"><button type="button"  style="margin-bottom: 10px;" class="btn btn-danger">Видалити</button></a>';
                                  
                                  }?>
                                  <br>
                                </div>
                                <? } ?>

                              </div>
                              <? } ?>
                            </div>
                          </div>
                            <!-- ===================== -->
                        </div>
                      </div>
                          <!-- ================== COMMENT  ======================== -->
                        </div>

                        <!-- ================================
                        ======================================== -->
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
            <? if($_SESSION['user']){
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