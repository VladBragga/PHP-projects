<?
session_start();
include "php/connect.php";
if(!$_SESSION['user']){
  header('Location:http://diplom/error.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Change</title>
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
    <form action="" method="get" class="search">
        <input name="s" placeholder="Шукати тут..." type="search" required>
        <button type="submit" ><i class="fa fa-search" aria-hidden="true"></i> Пошук</button>
      </form>
    </nav>
    </header>
         <?
         $id = $_GET['id'];

include 'php/connect.php';
include 'php/function/getId.php';

$funs = new get_id; 
$riff = $funs->get_riff_one_id($id);
 $options_genre = mysqli_query($link, "SELECT * FROM `genre`"); 
 $option_creator = mysqli_query($link, "SELECT * FROM `creator`"); ?>
       <!--  CONTENT     -->
       <!-- ==============-->
    <div class="form_add_track">  
        <a href="profile.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Назад</a>
        <h1>Редагування рифу</h1>
            <div class="add_riff">
       <?if($_GET['role'] == 'user'){?>     
       <form action="php/profile/changeRiff.php?id=<?=$riff['id_riff']?>" enctype="multipart/form-data" method="POST">
         <?}?>
         <?if($_GET['role'] == 'admin'){?>     
       <form action="php/admin/changeR.php?id=<?=$riff['id_riff']?>" enctype="multipart/form-data" method="POST">
         <?}?>    
              <div class="add_riff_2">
                <label>Назва пісні</label>     
                    <input type="text" value="<?=$riff['riff_name']?>" name="riff_name" required>
                <label>Автор чи Група</label>  
                <select name="id_creator">
                    <?foreach($option_creator as $creator){
                    if($riff['id_creator'] == $creator['id_creator']){?>
                    <option value="<?=$creator['id_creator']?>" selected><?=$creator['c_name']?></option>
                    <?}
                    else{?>
                    <option value="<?=$creator['id_creator']?>"><?=$creator['c_name']?></option>
                    <?}
                    }?>
                    </select> 
                    <br>
                <label>Постер пісні</label>  
                <?$poster = substr($riff['riff_photo'], 59, 200);?>  
                <h4 class="change_file"><? echo $poster ?></h4> 
                    <input type="file" name="riff_photo">
                    <label>Рік випуску пісні</label>  
     

                    <input type="number" value="<?=$riff['god']?>" name="god" min="1700" max="2021" onKeyDown="limitText(this,4);" 
                onKeyUp="limitText(this,4);" />
                    <script language="javascript" type="text/javascript">
                    function limitText(limitField, limitNum) {
                        if (limitField.value.length > limitNum) {
                            limitField.value = limitField.value.substring(0, limitNum);
                        }
                    }
                    </script>
                <label>Аудіофайл (.mp3)</label>    
                <?$audio = substr($riff['riff_audio'], 58, 200);?>
                <h4 class="change_file"><? echo $audio ?></h4>
                    <input type="file" name="riff_audio" value="<?=$audio?>">

                    <label>Назва жанру пісні</label>     
                    <select name="genre_id">
                    <?foreach($options_genre as $genre){
                    if($riff['genre_id'] == $genre['genre_id']){?>
                    <option value="<?=$genre['genre_id']?>" selected><?=$genre['genre_name']?></option>
                    <?}
                    else{?>
                    <option value="<?=$genre['genre_id']?>"><?=$genre['genre_name']?></option>
                    <?}
                    }?>
                    </select>

                <label>Фото табулатури</label>  
                <?$photo_tab = substr($riff['photo_tab'], 62, 200);?>  
                <h4 class="change_file"><? echo $photo_tab ?></h4>    
                    <input type="file" name="photo_tab">
                    
                <label>Табулатура (.pdf, .gp3, .gp)</label>     
                <?$tab = substr($riff['tabulatura'], 56, 200);?>
                <h4 class="change_file"><? echo $tab ?></h4>
                    <input type="file" name="tab" >
                    <div class="riff_description">
                <label>Опис рифу</label>  
                 
                </div>
                </div>
                    <textarea type="text" name="description" cols="44" rows="7" required><? echo $riff['description']?></textarea>  
                <button type="submit">Редагувати</button>
            </form>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>


