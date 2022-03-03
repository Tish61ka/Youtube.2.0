<?php
    session_start();

    require_once('./connect.php');

    $comment = $_GET['comment'];
    $id_video = $_GET['id_video'];
    $id_user = $_SESSION['user']['id'];
    $avatar_user = $_SESSION['user']['avatar'];
    $name_user = $_SESSION['user']['nick_name'];
    
    $add_coments = $connect->query("INSERT INTO `comments`(`id`, `comment`, `id_video`, `id_user`, `avatar_user`, `name_user`) 
    VALUES (NULL,'$comment','$id_video','$id_user','$avatar_user','$name_user')");

    header("Location: ../output/go_to_video.php?id=$id_video");