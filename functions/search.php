<?php
    session_start();

require_once('../functions/connect.php');

$search = $_GET['search'];

$search_video = $connect->prepare("SELECT * FROM `videos` WHERE `name_video` = '$search'");
$search_video->execute();

header('Location: ../output/index.php');
?>