<?
session_start();
include "php/connect.php";
include "php/function/getId.php";

/* SORT */
if(isset($_GET['sort_but'])){

  $sort = $_GET['sortik'];

  if($sort == 0) {
    $sortirovka = mysqli_query($link, "SELECT * FROM `riff`");
}
  if($sort == 'name_riff_up') {
    $sortirovka = mysqli_query($link, "SELECT * FROM `riff` ORDER BY `riff_name`");
}
    if($sort == 'name_riff_down') {
      $sortirovka = mysqli_query($link, "SELECT * FROM `riff` ORDER BY `riff_name` DESC");
    }
      if($sort == 'date_vuhod_up') {
        $sortirovka = mysqli_query($link, "SELECT * FROM `riff` ORDER BY `god`");
      }
      if($sort == 'date_vuhod_down') {
        $sortirovka = mysqli_query($link, "SELECT * FROM `riff` ORDER BY `god` DESC");
      }
        if($sort == 'date_add') {
          $sortirovka = mysqli_query($link, "SELECT * FROM `riff` ORDER BY `date` DESC");
        }
       /*  var_dump($sortirovka); */
}

/* FILTER */
if(isset($_GET['but_genre'])){
    $rock = $_GET['rock'];
    $creator = $_GET['group'];
    $sql = "SELECT * FROM `riff` WHERE ";
    $zapros1; $zapros2;
    if($rock){
        for($i= 0; $i < count($rock); $i++){
            if($i == count($rock)) {   $zapros1 = $zapros1.'`genre_id` ='.$rock[$i];}
            if($i > 0){ $zapros1 = $zapros1.' or `genre_id` ='.$rock[$i]; }
            else $zapros1 = $zapros1.'`genre_id` ='.$rock[$i];
        }
    }
    if($creator){
        for($i= 0; $i < count($creator); $i++){
            if($i == count($creator)){ $zapros2 = $zapros2.'`id_creator` ='.$creator[$i]; }
            if($i > 0){  $zapros2 = $zapros2.' or `id_creator` ='.$creator[$i];  }
            else $zapros2 = $zapros2.'`id_creator` ='.$creator[$i];
        }
    }
    if($rock && $creator){
        $zapros = $zapros.$zapros1.' and '.$zapros2;
        $sql = $sql.$zapros;
        $filters = mysqli_query($link, $sql);
    }
    else if($rock){
        $sql = $sql.$zapros1;
        $filters = mysqli_query($link, $sql);
    }
    else if($creator){
        $sql = $sql.$zapros2;
        $filters = mysqli_query($link, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks</title>
    <link rel="shortcut icon" href="style/3700480-microphone-radio-recording-sound-technology-vintage-voice_108745.png" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style/tracks.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
        ?>
      <form action="php/search/search2.php" method="POST" class="search">
        <input name="search" placeholder="Шукати тут..." type="search" required>
        <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> Пошук</button>
      </form>
    </nav>
  </header>
                        <!--  end header  --> 

                        <!--  start content  --> 
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
          <form class="locations" method="GET">
              <div class="sidebar">
                        <button type="submit" name="but_genre">Фільтрувати</button>

                  <div class="widget">
                      <div class="widget-title widget-collapse">
                          <h6>Жанр</h6>
                          <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                      </div>
                      <div class="collapse show" id="specialism">
                          <div class="widget-content">
                          
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(1, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="1" class="custom-control-input" id="specialism1" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="1" class="custom-control-input" id="specialism1">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism1">Рок</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(2, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="2"  class="custom-control-input" id="specialism2" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="2"  class="custom-control-input" id="specialism2">        
                                    <?}?>
                                  <label class="custom-control-label" for="specialism2">Блюз</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(3, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="3" class="custom-control-input" id="specialism3" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="3" class="custom-control-input" id="specialism3">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism3">Кантри &amp; FingerStyle</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(4, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="4" class="custom-control-input" id="specialism4" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="4" class="custom-control-input" id="specialism4">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism4">Панк рок</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(5, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="5" class="custom-control-input" id="specialism5" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="5" class="custom-control-input" id="specialism5">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism5">Метал</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(6, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="6" class="custom-control-input" id="specialism6" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="6" class="custom-control-input" id="specialism6">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism6">Поп</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(7, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="7" class="custom-control-input" id="specialism7"checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="7" class="custom-control-input" id="specialism7">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism7">Балада</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                              <?if (isset($_GET['but_genre']) && $rock != NULL){
                                    if(in_array(8, $rock)){?>
                                  <input type="checkbox" name = "rock[]" value="8" class="custom-control-input" id="specialism8" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "rock[]" value="8" class="custom-control-input" id="specialism8">
                                    <?}?>
                                  <label class="custom-control-label" for="specialism8">Класика</label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="widget">
                      <div class="widget-title widget-collapse">
                          <h6>Роки пісень</h6>
                          <a class="ml-auto" data-toggle="collapse" href="#yearSong" role="button" aria-expanded="false" aria-controls="jobtype"> <i class="fas fa-chevron-down"></i> </a>
                      </div>
                      <div class="collapse show" id="yearSong">
                          <div class="widget-content">
                              <div class="custom-control custom-checkbox fulltime-job">
                              <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(1, $creator)){?>
                                  <input type="checkbox" name = "group[]" value="1" class="custom-control-input" id="group1" checked>
                                  <?}} else { ?>
                                <input type="checkbox" name = "group[]" value="1" class="custom-control-input" id="group1">
                                    <?}?>
                                  <label class="custom-control-label" for="group1">Metallica</label>
                              </div>
                              <div class="custom-control custom-checkbox parttime-job">
                              <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(2, $creator)){?>
                                <input type="checkbox" name = "group[]" value="2" class="custom-control-input" id="group2" checked>
                                    <?}} else { ?>
                                        <input type="checkbox" name = "group[]" value="2" class="custom-control-input" id="group2"> 
                                        <?}?>
                                  <label class="custom-control-label" for="group2">KALEO</label>
                              </div>
                              <div class="custom-control custom-checkbox freelance-job">
                              <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(3, $creator)){?>
                                  <input type="checkbox" name = "group[]" value="3" class="custom-control-input" id="group3" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "group[]" value="3" class="custom-control-input" id="group3">
                                    <?}?>
                                  <label class="custom-control-label" for="group3">B. B. King</label>
                              </div>
                              <div class="custom-control custom-checkbox temporary-job">
                              <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(4, $creator)){?>
                                  <input type="checkbox" name = "group[]" value="4" class="custom-control-input" id="group4" checked>
                                  <?}} else { ?>
                                    <input type="checkbox" name = "group[]" value="4" class="custom-control-input" id="group4">
                                    <?}?>
                                  <label class="custom-control-label" for="group4">Eric Clapton</label>
                              </div>
                              <div class="custom-control custom-checkbox parttime-job">
                              <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(5, $creator)){?>
                                <input type="checkbox"name = "group[]" value="5" class="custom-control-input" id="group5" checked>
                                <?}} else { ?>
                                    <input type="checkbox"name = "group[]" value="5" class="custom-control-input" id="group5">
                                    <?}?>
                                <label class="custom-control-label" for="group5">Sting</label>
                            </div>
                            <div class="custom-control custom-checkbox freelance-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(6, $creator)){?>
                                <input type="checkbox"name = "group[]" value="6" class="custom-control-input" id="group6" checked>
                                <?}} else { ?>
                                    <input type="checkbox"name = "group[]" value="6" class="custom-control-input" id="group6">
                                    <?}?>
                                <label class="custom-control-label" for="group6">Led Zeppelin</label>
                            </div>
                            <div class="custom-control custom-checkbox fulltime-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(7, $creator)){?>
                                <input type="checkbox"name = "group[]" value="7" class="custom-control-input" id="group7" checked>
                                <?}} else { ?>
                                    <input type="checkbox"name = "group[]" value="7" class="custom-control-input" id="group7">
                                    <?}?>
                                <label class="custom-control-label" for="group7">Rolling Stones</label>
                            </div>
                            <div class="custom-control custom-checkbox  temporary-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(8, $creator)){?>
                                <input type="checkbox" name = "group[]" value="8" class="custom-control-input" id="group8" checked>   
                                <?}} else { ?>
                                <input type="checkbox" name = "group[]" value="8" class="custom-control-input" id="group8">
                                <?}?>
                                <label class="custom-control-label" for="group8">Nirvana</label>
                            </div>
                            <div class="custom-control custom-checkbox parttime-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(9, $creator)){?>
                                <input type="checkbox" name = "group[]" value="9" class="custom-control-input" id="group9" checked>
                                <?}} else { ?>
                                <input type="checkbox" name = "group[]" value="9" class="custom-control-input" id="group9">
                                <?}?>
                                <label class="custom-control-label" for="group9">Queen</label>
                            </div>
                            <div class="custom-control custom-checkbox temporary-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(10, $creator)){?>
                                <input type="checkbox" name = "group[]" value="10" class="custom-control-input" id="group10" checked>   
                                    <?}} else { ?>            
                                <input type="checkbox" name = "group[]" value="10" class="custom-control-input" id="group10">
                                <?}?>
                                <label class="custom-control-label" for="group10">Jimi Hendrix</label>
                            </div>
                            <div class="custom-control custom-checkbox fulltime-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(11, $creator)){?>
                                <input type="checkbox" name = "group[]" value="11" class="custom-control-input" id="group11" checked>
                                <?}} else { ?>      
                                <input type="checkbox" name = "group[]" value="11" class="custom-control-input" id="group11">
                                <?}?>
                                <label class="custom-control-label" for="group11">Marilyn Manson</label>
                            </div>
                            <div class="custom-control custom-checkbox freelance-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(12, $creator)){?>
                                <input type="checkbox" name = "group[]" value="12" class="custom-control-input" id="group12" checked>
                                <?}} else { ?>  
                                    <input type="checkbox" name = "group[]" value="12" class="custom-control-input" id="group12">
                                    <?}?> 
                                <label class="custom-control-label" for="group12">Radiohead</label>
                            </div>
                            <div class="custom-control custom-checkbox  temporary-job">
                            <?if (isset($_GET['but_genre']) && $creator != NULL){
                                    if(in_array(13, $creator)){?>
                                <input type="checkbox" name = "group[]" value="13" class="custom-control-input" id="group13" checked>
                                <?}} else { ?>  
                                    <input type="checkbox" name = "group[]" value="13" class="custom-control-input" id="group13">
                                    <?}?> 
                                <label class="custom-control-label" for="group13">Класичні композитори</label>
                            </div>
                          </div>
                      </div>
                  </div>
             
              </div>
              </form>
          </div>
          <div class="col-lg-9">
              <div class="row mb-4">
                  <div class="col-12">
                      <div class="vivod">
                      <? $get_id = new get_id;
                  $get_date = new function_time;
                      
                      $count_result2 = $get_id->get_riff_id_kol();
                  $count2 = mysqli_fetch_assoc($count_result2)['count'];?>
                      <h6 class="mb-0">Всього <span class="text-primary"><?=$count2?> рифів.</span></h6>
                    </div>
                  </div>
              </div>
              <div class="job-filter mb-4 d-sm-flex align-items-center">
                  <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="tracks.php"><i class="fa fa-times" aria-hidden="true"></i> Відновити фільтр або сортування </a> </div>
                  <div class="job-shortby ml-sm-auto d-flex align-items-center">
                      <form class="form-inline" role="form" method="GET">
                          <div class="form-group mb-0">
                          <form >
                              <div class="sort_za">
                              <label class="justify-content-start mr-2">Сортувати за: </label>
                                </div>
                                
                              <div class="short-by">
                                  <select name="sortik" class="form-control basic-select select2-hidden-accessible activer" data-select2-id="0" tabindex="-1" aria-hidden="true">
                                      <? if($sort == 0){?>
                                      <option data-select2-id="0" value="0" selected >Стандарт</option>
                                      <?} else {?>  <option data-select2-id="0" value="0" selected >Стандарт</option>
                                      <?}?>
                                      <? if($sort == 'name_riff_up'){?>
                                        <option data-select2-id="1" value="name_riff_up" selected>За назвою (А - Я)</option>
                                      <?} else {?>   <option data-select2-id="1" value="name_riff_up">За назвою (А - Я)</option>
                                      <?}?>
                                      <? if($sort == 'name_riff_down'){?>
                                        <option data-select2-id="2" value="name_riff_down" selected>За назвою (Я - А)</option>
                                      <?} else {?>  <option data-select2-id="2" value="name_riff_down">За назвою (Я - А)</option>
                                      <?}?>
                                      <? if($sort == 'date_vuhod_up'){?>
                                        <option data-select2-id="3" value="date_vuhod_up" selected>За датою виходу </option>
                                      <?} else {?>  <option data-select2-id="3" value="date_vuhod_up">За датою виходу</option>
                                      <?}?>
                                      <? if($sort == 'date_vuhod_down'){?>
                                        <option data-select2-id="4" value="date_vuhod_down" selected>За датою виходу</option>
                                      <?} else {?>  <option data-select2-id="4" value="date_vuhod_down">За датою виходу</option>
                                      <?}?>
                                       <? if($sort == 'date_add'){?>
                                        <option data-select2-id="5" value="date_add" selected>Останні додані першими</option>
                                      <?} else {?>  <option data-select2-id="5" value="date_add">Останні додані першими</option>
                                      <?}?>  
                                  </select>
                              </div>
                              <div class="but_sort">
                              <button type="submit" name="sort_but" class="btn btn-success">Сортувати</button>
                            </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="row">
              <?
              	
            /* PAGINATION */
                 
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $noteOnPage = 6;
                $from = ($page - 1) * $noteOnPage;
                /*  */

                  if(isset($_GET['but_genre']) && ($rock != NULL || $creator != NULL )){
                    $riffs = $filters;}
                  else if(isset($_GET['sort_but']) && ($sort != NULL)){
                    $riffs = $sortirovka;
                  }
                  else if($_SESSION['search_result']){
                    $sql = $_SESSION['search_result'];
                    $rif = mysqli_query($link, $sql);
                    $checker = mysqli_fetch_assoc($rif);
                    if($checker != 0){
                      $riffs = $rif;
                    }
                    else {$riffs = $get_id->get_riff_id_pagination($from, $noteOnPage);
                    $search_itog = 1;}
                    
                  }
                    else $riffs = $get_id->get_riff_id_pagination($from, $noteOnPage);
                  
                  $count_result = $get_id->get_riff_id_kol();
                  $count = mysqli_fetch_assoc($count_result)['count'];
                  $pagesCount = ceil($count / $noteOnPage);
                  unset($_SESSION['search_result']);
                  if(mysqli_fetch_assoc($riffs) == NULL || $search_itog == 1){ ?>
                   <h2 style="color: white; margin: 0 auto; margin-top: 20px;">Такі рифи ще не додані <i class="fa fa-smile-o" aria-hidden="true"></i></h2>
                  <?}
                  else{
              foreach($riffs as $riff){    
                $band = $get_id->get_creator($riff['id_creator']);
                $genre = $get_id->get_genre($riff['genre_id']);
                $date = $get_date->set_time($riff['date']);  
                $poster = substr($riff['riff_photo'], 29, 200);
                  ?>
                  <div class="col-sm-6 col-lg-4 mb-4">
                      <div class="candidate-list candidate-grid">
                          <div class="candidate-list-image">
                              <img class="img-fluid" src="<?=$poster?>" alt="">
                          </div>
                          <div class="candidate-list-details">
                              <div class="candidate-list-info">
                                  <div class="candidate-list-title">
                                      <h5><a href="../track_detail.php?id=<?=$riff['id_riff']?>"><?=$riff['riff_name']?></a></h5>
                                  </div>
                                  <div class="candidate-list-option">
                                      <ul class="list-unstyled">
                                      <li><i class="fa fa-music" aria-hidden="true"></i> <?=$genre['genre_name']?> </li>
                                          <li><i class="fa fa-globe"> <?=$band['c_name']?></i></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="candidate-list-favourite-time">
                                  
                                  <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i><?=$date?></span>
                              </div>
                          </div>
                      </div>
                  </div>
                <?   } }  ?>  
              </div>
              <? if(!isset($_GET['but_genre']) && !isset($_GET['sort_but'])){ ?>
              <div class="row">
                  <div class="col-12 text-center mt-4 mt-sm-5" style="margin-bottom: 20px;">
                      <ul class="pagination justify-content-center mb-0">

                      <? if((!isset($_GET['page']) || $_GET['page'] == 1)){ ?> 
                      <li class="page-item disabled"> <span class="page-link">Назад</span> </li> <?}?>

                      <? if((isset($_GET['page']) && $_GET['page'] > 1)){ ?> 
                      <li class="page-item"> <a href="?page=<?=$page - 1 ?>"><span class="page-link">Назад</span> </a></li> <?}?>

                      <?for($i = 1; $i <= $pagesCount; $i++){
                            if((!isset($_GET['page']) && $i == 1) || ( $i == $_GET['page']) && isset($_GET['page'])){?>
                        <li class="page-item active"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                        <?} else {?>
                        <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                        <?}
                      }
                        if((isset($_GET['page']) && $_GET['page'] != $pagesCount)){ ?>   
                         <li class="page-item"> <a class="page-link" href="?page=<?=$page + 1 ?>">Вперед</a> </li>  <?}
                          
                          if(($page == $pagesCount)){ ?>   
                           <li class="page-item disabled"> <a class="page-link" href="?page=<?=$page + 1 ?>">Вперед</a> </li>  
                          <?}?> 
                      </ul>
                  </div>
              </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>