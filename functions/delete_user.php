<?php
    session_start();

    require_once('./connect.php');
    $id = $_GET['id'];

    $delete_user = $connect->prepare("DELETE FROM `users` WHERE `id` = '$id'");
    $delete_user->execute();

    header('Location: ../output/adminprofile.php');