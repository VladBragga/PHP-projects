<?php

class get_id{ 
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
    function get_riff_id_user($id_users){
            global $link;
            $riffs = mysqli_query($link, "SELECT riff.id_riff, riff.riff_name, riff.date FROM `riff` 
            INNER JOIN `user_riff` on user_riff.users_id = '$id_users' and user_riff.id_riff = riff.id_riff");
            return $riffs;
    }

    function get_id_creator_riff($id_riff){
        global $link;
        $avtor = mysqli_query($link, "SELECT users.nickname, users.experience FROM `users` 
        INNER JOIN `user_riff` on user_riff.users_id = users.id_users and user_riff.id_riff = '$id_riff'");
        foreach ($avtor as $result);
        return $result;
    }

    function get_id_users_comment($id_user){
        global $link;
        $avtor = mysqli_query($link, "SELECT users.nickname, users.user_photo FROM `users` 
        WHERE id_users = '$id_user'");
        foreach ($avtor as $result);
        return $result;
    }
    function get_main_riff(){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM (
            SELECT * 
            FROM `riff`   
            ORDER BY `id_riff` DESC
            LIMIT 3
          ) t ORDER by `id_riff` ASC");
        return $results;
    }
    function get_riff_id(){
            global $link;
            $results = mysqli_query($link, "SELECT * FROM `riff`");
            return $results;
        }
        function get_riff_id_kol(){
            global $link;
            $results = mysqli_query($link, "SELECT COUNT(*) as count FROM `riff`");
            return $results;
        }

        function get_riff_id_pagination($from, $note){
            global $link;
            $results = mysqli_query($link, "SELECT * FROM `riff` LIMIT $from, $note");
            return $results;
        }
    function get_riff_one_id($id){
        global $link;
        $results = mysqli_query($link, "SELECT * FROM `riff` WHERE id_riff = $id");
        foreach ($results as $result);
        return $result;
    }

        function get_creator($id){
            global $link;
            $groups = mysqli_query($link, "SELECT * FROM `creator` WHERE id_creator = $id");
            foreach ($groups as $group);
            return $group;
        }
        function get_genre($id){
            global $link;
            $results = mysqli_query($link, "SELECT * FROM `genre` WHERE `genre_id` = $id");
            foreach ($results as $result);
            return $result;
        }
        function get_comment($id){
            global $link;
            $comments = mysqli_query($link, "SELECT * FROM `comment` WHERE '$id' = comment.id_riff");
            return $comments;
        }
        function get_comment_del($id){
            global $link;
            $comments = mysqli_query($link, "SELECT * FROM `comment` WHERE id = '$id'");
            return $comments;
        }
        function get_rating($id){
            global $link;
            $rating = mysqli_query($link, "SELECT rating.id_users, rating.id_riff, rating.value FROM `rating` 
            WHERE id_riff = '$id'");
            return $rating;
        }
        function get_rating_user($id_user, $id_riff){
            global $link;
            $check_rating2 = mysqli_query($link, "SELECT rating.id_users, rating.id_riff, rating.value
            FROM `rating` WHERE `id_riff` = '$id_riff' and `id_users` = '$id_user'");
            return $check_rating2;
        }
    }

class function_time {

    function set_time($datetime){
        $date = new DateTime($datetime); // получаем объект
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
?>