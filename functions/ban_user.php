<?php
    session_start();

    require_once('./connect.php');

    $id = $_GET['id'];

    $ban_user = $connect->prepare("UPDATE `users` SET `ban` = 1 WHERE `id` = '$id'");
    $ban_user->execute();

    header("Location: ../output/adminprofile.php");