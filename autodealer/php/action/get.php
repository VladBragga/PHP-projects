<?php

class get_id{ 
    function get_all_car(){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `cars`");
        return $results;
    }
    function get_users(){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `users`");
        return $results;
    }
    function get_users_one($id){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `users` WHERE id_users = '$id'");
        foreach ($results as $result);
        return $result;
    }
    function get_main_cars(){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM (
            SELECT * 
            FROM `cars`   
            ORDER BY `id` DESC
            LIMIT 4
          ) t ORDER by `id` ASC");
        return $results;
    }
    function get_popular_cars(){
        global $link;
        $results = mysqli_query($link,  "SELECT * FROM `cars` ORDER BY `rating` DESC LIMIT 3");
        return $results;
    }
    function get_car($id){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `cars` WHERE id = '$id'");
        foreach($results as $result);
        return $result;
    }
    function get_mark($id){
            global $link;
            $marks = mysqli_query($link, "SELECT * FROM `mark` WHERE id = '$id'");
            foreach ($marks as $mark);
            return $mark;
    }
    function get_carcase($id){
        global $link;
        $marks = mysqli_query($link, "SELECT * FROM `carcase` WHERE id = '$id'");
        foreach ($marks as $mark);
        return $mark;
    }
    function get_gearbox($id){
        global $link;
        $gears = mysqli_query($link, "SELECT * FROM `gearbox` WHERE id = '$id'");
        foreach ($gears as $gear);
        return $gear;
    }
    function get_rating_user($id_user, $id_car){
        global $link;
        $check_rating2 = mysqli_query($link, "SELECT rating.id_users, rating.id_cars, rating.value
        FROM `rating` WHERE `id_cars` = '$id_car' and `id_users` = '$id_user'");
        return $check_rating2;
    }
    function get_rating($id_car){
        global $link;
        $rating = mysqli_query($link, "SELECT rating.id_users, rating.id_cars, rating.value FROM `rating` 
        WHERE id_cars = '$id_car'");
        return $rating;
    }
    function get_comment($id){
            global $link;
            $comments = mysqli_query($link, "SELECT * FROM `comment` WHERE '$id' = comment.id_cars");
            return $comments;
    }
    function get_id_users_comment($id_user){
        global $link;
        $avtor = mysqli_query($link, "SELECT users.nickname, users.photo FROM `users` 
        WHERE id_users = '$id_user'");
        foreach ($avtor as $result);
        return $result;
    }
    function get_cars_id_pagination($from, $note){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `cars` LIMIT $from, $note");
        return $results;
    }
    function get_cars_id_kol(){
        global $link;
        $results = mysqli_query($link, "SELECT COUNT(*) as count FROM `cars`");
        return $results;
    }
    function get_gallery(){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `gallery`");
        return $results;
    }
}
    class time{
        function time_set($datatime){
                $date = new DateTime($datatime); // получаем объект
                // номер месяца 
                $i = $date->format('m') - 1; // 6
                // месяцы на русском языке
                $months = ['Січня', 'Лютого', 'Березня', 'Квітня', 'Травня', 'Червня', 'Липня', 'Серпня',
                 'Вересня', 'Жовтня', 'Листопада', 'Грудня'];
                //получаем месяц из массива
                $ru_month = $months[$i]; //Июля
                $i = $date->format('d'); // 6 
                //дата на русском языке
               return $new_date = $date->format("$i $ru_month Y"); // 05 Июля 2015
        }
    }