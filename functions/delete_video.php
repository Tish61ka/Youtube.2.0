<?php
    session_start();

    require_once('./connect.php');
    $id = $_GET['id'];

    $delete_user = $connect->prepare("DELETE FROM `output_videos` WHERE `id` = '$id'");
    $delete_user->execute();

    header('Location: ../output/adminvideos.php');