<? session_start();
include "connect.php"; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Phonebook</title>
        
        <link rel="stylesheet" href="style.css">
        <script src="jquery.js"></script>
    <script src="cont.js"></script>
    </head>
    <body>
          <!-- Форма авторизации -->
    <h1>Phonebook</h1>
 <div class="start">
       
    <div class="menu">
    <?
    
    if(!($_SESSION['user']))
{
    echo "<button><a href='login.php'>Login</a></button>";
}
else{
    echo "<button><a href='login.php'>LogOut</a></button>";
}
?>
        <button><a href="book.php">Public Phonebook</a></button>
        <button><a href="index.php">Home</a></button>
    </div>
 </div>
<?
    //--------------АЙДИ СТРАНЫ----------------------
$users = mysqli_query($link, "SELECT * FROM `users` WHERE user_id=1");
foreach ($users as $user1)
$id1=$user1['id_country'];
$users = mysqli_query($link, "SELECT * FROM `users` WHERE user_id=2");
foreach ($users as $user2)
$id2=$user2['id_country'];

$users = mysqli_query($link, "SELECT * FROM `users` WHERE user_id=3");
foreach ($users as $user3)
$id3=$user3['id_country'];

//--------------ТЕЛЕФОН----------------------
    $contacts1 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=1");
    $contacts2 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=2");
    $contacts3 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=3");

//--------------ПОЧТА----------------------
    $mails1 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=1");
    $mails2 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=2");
    $mails3 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=3");
    
//--------------СТРАНЫ----------------------
        $countries = mysqli_query($link, "SELECT * FROM `countries` WHERE id='$id1'");
        foreach ($countries as $country);
        $country1=$country['name'];
        $countries = mysqli_query($link, "SELECT * FROM `countries` WHERE id='$id2'");
        foreach ($countries as $country);
        $country2=$country['name'];
        $countries = mysqli_query($link, "SELECT * FROM `countries` WHERE id='$id3'");
        foreach ($countries as $country);
        $country3=$country['name'];
    
?>

 <div class='conteiner'>
   <div class="fm">
        <h3> <?=$user1['First_name']?> <?=$user1['Last_name']?></h3>
        <button class="user1">view details</button>
    </div>

    <div class= "conteiner1">
    <div id="column-1">
        <h3>Adress</h3>
        <h4>Адреса: <?=$user1['adress']?></h4>
        <h4>Місто: <?=$user1['city']?></h4>
        <h4>Країна: <?=$country1?></h4>

        </div>
        <div id="column-2">
        <h3>Phone number</h3>
        <?
            while($contact1 = mysqli_fetch_assoc($contacts1)){
               echo "<h4>+ ".$contact1['phones']."</h4>";     
            }
                ?>
        </div>
        <div id="column-3">
        <h3>Emails</h3>
        <?
            while($mail1 = mysqli_fetch_assoc($mails1)){
               echo "<h4>".$mail1['mail']."</h4>";     
            }
                ?>
        </div>
    </div>


    <div class="fm">
        <h3> <?=$user2['First_name']?> <?=$user2['Last_name']?></h3>
        <button class="user2">view details</button>
    </div>

    <div class="conteiner2">
        <div id="column-1">
            <h3>Adress</h3>
            <h4>Адрес: <?=$user2['adress']?></h4>
            <h4>Місто: <?=$user2['city']?></h4>
            <h4>Країна: <?=$country2?></h4>
        </div>
        <div id="column-2">
        <h3>Phone number</h3>
        <?
            while($contact2 = mysqli_fetch_assoc($contacts2)){
               echo "<h4>+ ".$contact2['phones']."</h4>";     
            }
                ?>
        </div>
        <div id="column-3">
        <h3>Emails</h3>
        <?
            while($mail2 = mysqli_fetch_assoc($mails2)){
               echo "<h4>".$mail2['mail']."</h4>";     
            }
                ?>
        </div>
    </div>

    <div class="fm">
        <h3> <?=$user3['First_name']?> <?=$user3['Last_name']?></h3>
        <button  class="user3">view details</button>
    </div>
    
        <div class="conteiner3">
            <div id="column-1">
                <h3>Adress</h3>
                <h4>Адрес: <?=$user3['adress']?></h4>
                <h4>Місто: <?=$user3['city']?></h4>
                <h4>Країна: <?=$country3?></h4>
            </div>
            <div id="column-2">
            <h3>Phone number</h3>

            <?
            while($contact3 = mysqli_fetch_assoc($contacts3)){
               echo "<h4>+ ".$contact3['phones']."</h4>";     
            }
                ?>
            
            </div>
            <div id="column-3">
            <h3>Emails</h3>
            <?
            while($mail3 = mysqli_fetch_assoc($mails3)){
               echo "<h4>".$mail3['mail']."</h4>";     
            }
                ?>
            </div>
            </div>
    </div>
</div>      
   
    </body>
</html>