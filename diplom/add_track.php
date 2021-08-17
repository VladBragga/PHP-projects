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
         
       <!--  CONTENT     -->
       <!-- ==============-->
    <div class="form_add_track">  
        <a href="profile.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Назад</a>
        <h1>Додавання нового рифу</h1>
            <div class="add_riff">
       <form action="php/profile/addRiff.php" enctype="multipart/form-data" method="post">
            
              <div class="add_riff_2">
                <label>Назва пісні</label>     
                    <input type="text" name="riff_name" required>
                <label>Автор чи Група</label>     
                    <select name="id_creator">
                        <option value="1">Metallica</option>
                        <option value="2">KALEO</option>
                        <option value="3">B.B. King</option>
                        <option value="4">Eric Clapton</option>
                        <option value="5">Sting</option>
                        <option value="6">Led Zeppelin</option>
                        <option value="7">Rolling Stones</option>
                        <option value="8">Nirvana</option>
                        <option value="9">Queen</option>
                        <option value="10">Jimi Hendrix</option>
                        <option value="11">Marilyn Manson</option>
                        <option value="12">Radiohead</option>
                        <option value="13">Класичний музикант</option>
                    </select>   
                <label>Рік випуску пісні</label>  
     

                    <input type="number" name="god" min="1700" max="2021" onKeyDown="limitText(this,4);" 
                onKeyUp="limitText(this,4);" />
                    <script language="javascript" type="text/javascript">
                    function limitText(limitField, limitNum) {
                        if (limitField.value.length > limitNum) {
                            limitField.value = limitField.value.substring(0, limitNum);
                        }
                    }
                    </script>
               <!--  <input type="number" name="god" min="1700" size="4" maxlength="4">    -->
                <label>Постер пісні</label>     
                    <input type="file" name="riff_photo" required>
                <label>Аудіофайл (.mp3)</label>    
                    <input type="file" name="riff_audio" required>
                    <label>Назва жанру пісні</label>     
                    <select name="genre_id">
                        <option value="1">Рок</option>
                        <option value="2">Блюз</option>
                        <option value="3">Джаз</option>
                        <option value="4">Панк рок</option>
                        <option value="5">Метал</option>
                        <option value="6">Поп</option>
                        <option value="7">Балада</option>
                        <option value="8">Класика</option>
                    </select>
                <label>Фото табулатури</label>     
                    <input type="file" name="photo_tab" required>
                <label>Табулатура (.pdf, .gp3, .gp)</label>     
                    <input type="file" name="tab" required>
                    <div class="riff_description">
                <label>Опис рифу</label>   
                </div>
                </div>
                    <textarea type="text" name="description" cols="44" rows="7" required></textarea>  
                <button type="submit">Додати</button>
            </form>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>