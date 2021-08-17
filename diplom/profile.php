<?
session_start();

include "php/connect.php";
include "php/function/getId.php";

if(!$_SESSION['user']){
  header('Location:http://diplom/error.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="style/3700480-microphone-radio-recording-sound-technology-vintage-voice_108745.png" type="image/x-icon">
    <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="style/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  </head>
    <body>
                        <!--  start header  --> 
    <header>
        <nav>
        <img class="logo" src="style/RIFFS.UA.png" alt="logo">
        <div class="nav-items">   
                <li><a href="index.php">Головна</a></li>
                <li><a href="tracks.php">Рифи</a></li>
                <li><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Профіль</a></li>
                <li><a href="about.php">Про нас</a></li>
                <? if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'головний')
              echo  '<li><a href="admin.php">Адмінка</a></li>';
                ?>
        </div>
        <?if($_SESSION['user'])
            {
             echo' <a class="cta_2" href="php/exit.php"><button><i class="fa fa-sign-out"></i>Вийти</button></a>';
            }?>
    </nav>
    </header>
     <?       
      if ($_SESSION['user']['update_success']){
      echo '<div class="popup-bg">
              <div class="popup">
                  <img class="close-popup" src="images/close.png" alt="icon">';
                      echo '<p>' . $_SESSION['user']['update_success'] .'</p>';
              echo '</div>
          </div>';  
  ?>
  <script>
      $('.close-popup').click(function() {
      $('.popup-bg').fadeOut(800);
      });
  </script>
  <?php
     unset($_SESSION['user']['update_success']);
  };
  ?>
                    <!--  end header  --> 
        <!--content-->
        <?   $phot = $_SESSION['user']['photo']; 
              $avatar = substr($phot, 29, 200); ?>
        <main>
          <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                         <? echo '<img src="'.$avatar.'" alt="" class="">'; ?>
        <form action="php/profile/changeUser.php" method="POST" enctype="multipart/form-data">          
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="avatar"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="profile-head">
                                    <h5>
                                       <?  echo $_SESSION['user']['name'];
                                        ?>
                                    </h5>
                                    <h6>
                                    <?  echo $_SESSION['user']['full_name']; 
                                    ?>
                                    </h6>
                                    <p class="proile-rating">ROLE : <span> <?  echo $_SESSION['user']['role']; ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ваша інформація</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ваші рифи</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="profile-edit-btn" name="btnAddMore" ><a href="add_track.php">Додати риф</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="profile-work">
                            <p>Соціальні мережі</p>
                            <div class="social_link">
                              <a href="https://www.instagram.com/vlad_bragga/"><i class="fa fa-instagram"></i></a> 
                              <a href="https://www.facebook.com/"><i class="fa fa-telegram" aria-hidden="true"></i></a> 
                              <a href="https://www.instagram.com/vlad_bragga/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>  
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Нікнейм</label>
                                            </div>
                                            <div class="col-md-6">
                                             <input name="name" type="text" value="<?=$_SESSION['user']['name']?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Повне ім'я</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input name="full_name" type="text" value="<?=$_SESSION['user']['full_name']?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Пошта</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input name="mail" type="text" value="<?=$_SESSION['user']['mail']?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Досвід</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input name="experience" type="text" value="<?=$_SESSION['user']['experience']?>">
                                            </div>
                                        </div>
                            <?
                            if ($_SESSION['full_name_error']) {
                              echo '<p class = "check_log">' . $_SESSION['full_name_error'] . '</p>';
                              }
                            if ($_SESSION['name_error']) {
                                  echo '<p class = "check_log">' . $_SESSION['name_error'] . '</p>';
                              } 
                            if ($_SESSION['mail_error']) {
                                  echo '<p class = "check_log">' . $_SESSION['mail_error'] . '</p>';
                              } 
                              if ($_SESSION['experience_error']) {
                                echo '<p class = "check_log">' . $_SESSION['experience_error'] . '</p>';
                            }   
                              unset($_SESSION['full_name_error']);
                              unset($_SESSION['name_error']);
                              unset($_SESSION['mail_error']);   
                              unset($_SESSION['experience_error']);   
                              ?>
                              <div class="change_user_info">
                                  <button type="submit">Змінити</button>
                              </div>
                            </div>
                            </form>
                           <? 
                            	$get_id =	new get_id;
                              $set_time = new function_time;

                              $riffs = $get_id->get_riff_id_user($_SESSION['user']['id']);
                              $checker = mysqli_fetch_assoc($riffs);
                              $checker == 0  ? $answer_check = 0 : $answer_check = 1;
                             
                            ?>
                            <!-- =========== PHP получаем все рифы чувачка -->

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                             <? if($answer_check == 1) { ?>
                            <table class="table">
                                <thead>
                                  <tr class="table-dark">
                                    <th scope="col" style="width: 70px;">id</th>
                                    <th scope="col" style="width: 170px;">Назва пісні</th>
                                    <th scope="col"style="width: 150px;">Дата додавання</th>
                                    <th scope="col" style="width: 80px;">Переглянути</th>
                                    <th scope="col" style="width: 80px;">Змінити</th>
                                    <th scope="col" style="width: 80px;">Видалити</th>
                                  </tr>
                                </thead>
                               
                                <tbody>
                                  <?  
                                  $index = 1;
                                   foreach ($riffs as $riff){
                                     
                                  echo '<tr>
                                    <th scope="row">' . $index . '</th>
                                    <td>' . $riff['riff_name'] .'</td>
                                    ';
                                    $datatimes = $set_time->set_time($riff['date']);
                                    echo '<td>' . $datatimes  . '</td>';
                                    echo  '<td><a  class="view_song" href="track_detail.php?id=' . $riff['id_riff']. '"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';
                                    echo  '<td><a class="change_song" href="change_track.php?id='.$riff['id_riff'].'&role=user"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';
                                    echo  '<td><a class="delete_song" href="./php/profile/deleteRiff.php?id=' .$riff['id_riff']. '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';  ?>
                                  </tr>
                                    <? 
                                     $index++; }
                                  ?>
                                </tbody>
                                
                              </table>
                              <? } 
                                else {?> 
                                    <h5>Ви не додали ще жодного рифу.</h5>
                                <? }  ?>
                            </div>
                        </div>
                    </div>
                </div>        
        </div>
        </main>
         <!--end of content-->
  <!--start footer-->
  <footer class="section footer-classic context-dark bg-image" style="background: linear-gradient(to top, #636363, #b4b4b4);">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-4 col-xl-5">
          <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/logo.png" alt="" width="200"></a>
            <div class="citata">
          <p>Музыка — это откровение более высокое, чем муд­рость и философия.</p>
            <!-- Rights-->
            <p class="rights"><span>©  </span><span class="copyright-year">Л. Бетховен</span><span> </span></p>
            </div>
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
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                    
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
               

    </body>
</html>