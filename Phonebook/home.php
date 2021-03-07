<?
    session_start();
    include "connect.php"; 
    if($_SESSION['prava']=="-")
{
	header('Location: /login.php'); die();
}
    if(!($_SESSION['user']))
{
	header('Location: /login.php'); die();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
          <!-- Форма авторизации -->
    <h1>Phonebook</h1>
 <div class="start">
       
    <div class="menu">
       
        <button><a href="exit_admin.php">LogOut</a></button>
       
        <button><a href="book.php">Public Phonebook</a></button>
        <button><a href="home.php">My contact</a></button>
    </div>
 </div>
 <?
    //--------------АЙДИ СТРАНЫ----------------------
$id = $_SESSION['user']['id'];


$users = mysqli_query($link, "SELECT * FROM `users` WHERE user_id=$id");
foreach ($users as $user1)

//--------------ТЕЛЕФОН----------------------
    $contacts1 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=$id");
//--------------ПОЧТА----------------------
    $mails1 = mysqli_query($link, "SELECT * FROM `contact` WHERE id_user=$id");
//--------------СТРАНЫ----------------------
$countries = mysqli_query($link, "SELECT * FROM `countries`");
       
?>
<form action="" method="POST" class="new_form"> 

    <div class='conteiner'>

        <div class= "forma">
        <h1>My Contact</h1>
            <div id="column-1" class="block">
                <h3>Contact</h3>
                <h4>First name: </h4>
                <input required type="text" name="first_name"  value="<?=$user1['First_name']?>">
                <h4>Last name:</h4>
                <input required type="text" name="last_name"  value="<?=$user1['Last_name']?>">
                <h4>Address: </h4>
                <input required type="text" name="adress"  value="<?=$user1['adress']?>">
                <h4>ZIP/City:</h4>
                <input required type="text" name="city"  value="<?=$user1['city']?>">
                <h4>Country:</h4>
                <select  name="id_country">
                <?
               
               while($country = mysqli_fetch_assoc($countries))
               {
                if ($user1['id_country'] == $country['id']) //
                {
                    echo "<option selected value= ".$country['id'].">".$country['name']."</option>";
                    }
                    else {
                echo "<option value=".$country['id'].">".$country['name']."</option>";
                }
               }
              ?>
                </select>
            </div>
            <div id="column-2" class="block">
                <h3>Phone number</h3>
                    <div class="b2">
                    <?
                while($contact1 = mysqli_fetch_assoc($contacts1)){
                 echo "<input required type='text' name='phone' value=+".$contact1['phones'].">"; 
                echo "<input type='checkbox' id='special'>"; 
                }
                    ?>
                    </div>
                    <button type="submit" class="user">Add</button>
            </div>
            <div id="column-3" class="block">
                <h3>Emails</h3>
                <?
                 while($mail1 = mysqli_fetch_assoc($mails1)){  
               echo "<input required type='text' name='email' value=".$mail1['mail'].">";   
               echo "<input type='checkbox' id='special'>"; 
                    }
                ?>
                <button class="user" type="submit">Add</button>
                <div class="save">
            <button type="submit" name="update">Save</button>
                </div>
            </div>
        </div>
    </div>
                </form> 

                <? 
                if(isset($_POST['update']))
                    {
                    $quary = "UPDATE `users` SET `First_name`='$_POST[first_name]', `Last_name`='$_POST[last_name]',
                `adress`='$_POST[adress]', `city`='$_POST[city]', `id_country`='$_POST[id_country]' where `user_id`='$id'";
                    
                    $quary1 = "UPDATE `contact` SET `phones`='$_POST[phone]', `mail`='$_POST[email]'
                     where `id_user`='$id'";
                   
                   $run = mysqli_query($link, $quary);
                   $rub2 = mysqli_query($link, $quary1);
                    }
                    if($run || $run1)
                    {
                        echo "<script type='text/javascript'> alert('Змінення збережено.')</script>";
                    }
                    
                ?>
       
    </body>
</html>