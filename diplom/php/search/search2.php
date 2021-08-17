<?
session_start();
include "../connect.php";
$search_result = filter_var(trim( $_POST['search']), FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM `riff` WHERE `riff_name` LIKE '%$search_result%'";
        $_SESSION['search_result'] = $sql;

        header('Location:http://diplom/tracks.php');
