<?php
    session_start();

    require_once('./connect.php');

    $id_video = $_GET['id'];

    $delete_video = $connect->query("DELETE FROM `comments` WHERE `id` = $id_video");

    header("Location: ../output/adminprofile.php");