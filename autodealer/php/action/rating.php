<?
session_start();
include "../connect.php";

$users_id = $_SESSION['user']['id'];
$id_car = $_SESSION['cars']['id_rating'];
$value = $_POST['rating'];

$check_rating = mysqli_query($link, "SELECT rating.id_users, rating.id_cars, rating.value
FROM `rating` WHERE `id_cars` = '$id_car'");

$check = mysqli_fetch_assoc($check_rating);

if($check === NULL) {
    mysqli_query($link, "INSERT INTO `rating` (`id`, `id_users`, `id_cars`, `value`)
     VALUES (NULL, '$users_id', '$id_car', '$value')");
    mysqli_query($link, "UPDATE `cars` SET `rating` = '$value'");
}
else{
    $check_rating2 = mysqli_query($link, "SELECT rating.id_users, rating.id_cars, rating.value
    FROM `rating` WHERE `id_cars` = '$id_car' and `id_users` = '$users_id'");

    $check2 = mysqli_fetch_assoc($check_rating2); 

    if($check2 === NULL) {
        mysqli_query($link, "INSERT INTO `rating` (`id`, `id_users`, `id_cars`, `value`)
        VALUES (NULL, '$users_id', '$id_car', '$value')");
$kol = 0;
$ocenka = 0;
        $kol_mark = mysqli_query($link, "SELECT * FROM `rating` WHERE `id_cars` = '$id_car'");
        foreach($kol_mark as $mark){
            $kol++;
            $ocenka += $mark['value'];
        }
        $result = $ocenka/$kol;
        if($result < 5   && $result > 4.5) { $result = 4.5; }
        if($result < 4.5 && $result > 4) { $result = 4; }
        if($result < 4   && $result > 3.5) { $result = 3.5; }
        if($result < 3.5 && $result > 3) { $result = 3; }
        if($result < 3   && $result > 2.5) { $result = 2.5; }
        if($result < 2.5 && $result > 2) { $result = 2; }
        if($result < 2   && $result > 1.5) { $result = 1.5; }
        if($result < 1.5 && $result > 1) { $result = 1; }
        if($result < 1   && $result > 0.5) { $result = 0.5; }

        mysqli_query($link, "UPDATE `cars` SET `rating` = '$result'");
    }
}
header('Location:http://autodealer/06_product_page.php?id='.$id_car);
unset($_SESSION['cars']['id_rating']);