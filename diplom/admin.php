<?
session_start();
include "php/connect.php";
include "php/function/getId.php";

if($_SESSION['user']['role'] != 'головний' && $_SESSION['user']['role'] != 'адміністратор'){
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
    </head>
    <body>
                        <!--  start header  --> 
    <header>
        <nav>
        <img class="logo" src="style/RIFFS.UA.png" alt="logo">
        <div class="nav-items">   
                <li><a href="index.php">Головна</a></li>
                <li><a href="tracks.php">Рифи</a></li>
                <li><a href="profile.php">Профіль</a></li>
                <li><a href="about.php">Про нас</a></li>
                <? if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'головний')
              echo  '<li><a href="admin.php"><i class="fa fa-sliders" aria-hidden="true"></i> Адмінка</a></li>';
              ?>
        </div>
        <?if($_SESSION['user'])
            {
                echo ' <h5 class="users_name">'. $_SESSION['user']['name']. '</h5> ';
             echo' <a class="cta_2" href="php/exit.php"> <button><i class="fa fa-sign-out"></i> Вийти</button></a>';
            }?>
    </nav>
    </header>
         <?
         	$get_id = new get_id;
             $get_date = new function_time;
            $riffs = $get_id->get_riff_id();
            $users = $get_id->get_users();
         ?>
       <!--  CONTENT     -->
       <!-- ==============-->
    <div class="form_add_track" style="margin-top: 15px;">  
        <h1>Адміністративна  панель</h1>
            <div class="admin_table">
       <form action="php/profile/addRiff.php" enctype="multipart/form-data" method="post">
       <table class="table table-dark table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">id</th>
                    <th scope="col" style="width: 200px;">Назва пісні</th>
                    <th scope="col"style="width: 170px;">Дата додавання</th>
                    <th scope="col" style="width: 80px;">Переглянути</th>
                    <th scope="col" style="width: 80px;">Змінити</th>
                    <th scope="col" style="width: 80px;">Видалити</th>
                </tr>
            </thead>
            <tbody>
                <? $id = 1;
                foreach($riffs as $riff){    
                $band = $get_id->get_creator($riff['id_creator']);
                $genre = $get_id->get_genre($riff['genre_id']);
                $date = $get_date->set_time($riff['date']);  
                ?>
                <tr>
                    <th scope="row"><?=$id?></th>
                    <td><?=$riff['riff_name']?></td>
                    <td><?=$date?></td>
                 <? echo  '<td><a  class="view_song" href="track_detail.php?id=' . $riff['id_riff']. '"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';
                    echo  '<td><a class="change_song" href="change_track.php?id=' .$riff['id_riff'].'&role=admin"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';
                    echo  '<td><a class="delete_song" href="./php/admin/deleteR.php?id=' .$riff['id_riff']. '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>'; ?>
                </tr>
                <?
            $id++;}?>
            </tbody>
        </table>    
        </form>
    </div>
           <?if($_SESSION['user']['role'] == 'головний'){?>         
    <div class="admin_table">
       <form action="php/profile/addRiff.php" enctype="multipart/form-data" method="post">
       <table class="table table-dark table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col" style="width: 50px;">id</th>
                    <th scope="col" style="width: 140px; ">Username</th>
                    <th scope="col" style="width: 110px; ">Фото</th>
                    <th scope="col" style="width: 80px;">Роль</th>
                    <th scope="col" style="width: 100px;">Змінити</th>
                    <th scope="col" style="width: 80px;">Видалити</th>
                    
                </tr>
            </thead>
            <tbody>
                <? $id_user = 1;
                foreach($users as $user){
                    $photo = $user['user_photo'];
                    $avatar = substr($photo, 29, 200); 
                    if($user['role'] == 1) $role = "Користувач";
                    if($user['role'] == 2) $role = "Адміністратор";
                    if($user['role'] == 3) $role = "Творець";?>
                ?><tr>
                    <th scope="row"><?=$id_user?></th>
                    <td><?=$user['nickname']?></td>
                    <td><img class="photo_avatar" src="<?=$avatar?>"></td>
                    
                    <td><a class="change_song_admin"><?=$role?></a></td>
                        <?if($user['role'] == 1){?>

          <?echo    '<td><a class="change_user" href="php/admin/changeU.php?id='. $user['id_users'].'&bool='."true".'">Зробити</a></td>';?>
          <?echo    '<td><a class="delete_song_admin" href="./php/admin/deleteU.php?id=' .$user['id_users']. '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
                        }
                        if($user['role'] == 2) {?>
          <?echo    '<td><a class="change_user2" href="php/admin/changeU.php?id='. $user['id_users'].'&bool='."false".'">Убрати</a></td>';?>
          <?echo    '<td><a class="delete_song_admin" href="./php/admin/deleteU.php?id=' .$user['id_users']. '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
                         }
                         if($user['role'] == 3) {?>
                         <td><a class="change_song_admin"></a></td> 
                         <td><a class="delete_song_admin"></a></td>
                         <?}?> 
                </tr>
                <? $id_user++;
            }?>
            </tbody>
        </table>    
        </form>
    </div>
    <?}?>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>