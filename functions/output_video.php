<?php
    session_start();

    require_once('./connect.php');

    $id = $_GET['id'];

    $add_output_video = $connect->prepare("SELECT * FROM `videos` WHERE `id` = '$id'");
    $add_output_video->execute();
    $add_video = $add_output_video->fetch(PDO::FETCH_ASSOC);
      
    $id_v = $add_video['id'];
    $video = $add_video['video'];
    $name_video = $add_video['name_video'];
    $discription = $add_video['discription'];
    $id_user = $add_video['id_user'];
    $name_user = $add_video['name_user'];
    $avatar_user = $add_video['avatar_user'];
    $prewiew = $add_video['prewiew'];
    $ban = $add_video['ban'];

    $add = $connect->query("INSERT INTO `output_videos` (`id`, `video`, `name_video`, `discription`, `id_user`, `name_user`, `avatar_user`, `prewiew`, `ban`) VALUES ('$id_v','$video','$name_video','$discription','$id_user','$name_user','$avatar_user','$prewiew','$ban')");

    $delete_user = $connect->prepare("DELETE FROM `videos` WHERE `id` = '$id'");
    $delete_user->execute();
    header("Location: ../output/adminmoder.php");
    
